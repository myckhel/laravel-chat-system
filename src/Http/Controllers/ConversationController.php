<?php

namespace Myckhel\ChatSystem\Http\Controllers;

use Illuminate\Http\Request;
use Myckhel\ChatSystem\Http\Requests\PaginableRequest;
use DB;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaginableRequest $request)
    {
      $request->validate([]);
      $user     = $request->user();
      $pageSize = $request->pageSize;
      $page     = $request->page;
      $order    = $request->order;
      $orderBy  = $request->orderBy;

      $conversations = $user->conversations()
      ->whereHasLastMessage($user)
      ->withCount([
        'messages as latest_message_at' => fn ($q) => $q->select(DB::raw('max(created_at)')),
        'unread',
      ])
      ->orderByDesc('latest_message_at')
      ->with([
        'delivery' => fn ($q) => $q->select('id', 'maker_id', 'made_type', 'made_id', 'created_at')->notMessanger($user->id)->where('maker_id', '!=', $user->id),
        'read' => fn ($q) => $q->select('id', 'maker_id', 'made_type', 'made_id', 'created_at')->notMessanger($user->id)->where('maker_id', '!=', $user->id),
        'trashed' => fn ($q) => $q->select('id', 'maker_id', 'made_type', 'made_id', 'created_at')->whereMakerId($user->id),
        'last_message' => fn ($q) => $q->select(['id','user_id','message','conversation_id', 'created_at'])
          ->with([
            // 'latestMedia' => fn ($q) => $q->select('id', 'model_type', 'model_id', 'name'),
            'trashed' => fn ($q) => $q->withTrashed($user)
          ]),
        'participant' => fn ($q) => $q->select('id', 'user_id', 'conversation_id')->where('user_id', '!=', $user->id),
        'participant.user' => fn ($q) => $q,//->withUrls(['avatar']),
      ])->paginate($pageSize);

      $conversations->makeDelivered($user);

      // $conversations->map(fn ($conversation) =>
      //   $conversation->participant
      //     && $conversation->participant->user->withUrls('avatar')
      // );

      return $conversations;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'string',
      ]);
      $user     = $request->user();

      return $user->conversations()->create([
        'user_id' => $user->id,
        'name'    => $request->name,
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $conversation)
    {
      $conversation = config('chat-system.models.conversation')::findOrFail($conversation);
      $this->authorize('view', $conversation);
      $user = $request->user();

      $conversation->load([
        'otherParticipant:id,conversation_id,user_id',
        'otherParticipant.user'
      ])
      ->unread($user->id)->get()->makeRead($user);

      return $conversation;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $conversation)
    {
      $conversation = config('chat-system.models.conversation')::findOrFail($conversation);
      $this->authorize('update', $conversation);
      $request->validate([]);
      $user     = $request->user();
      $conversation->update(array_filter($request->only($conversation->getFillable())));
      return $conversation;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Myckhel\ChatSystem\Models\Conversation  $conversation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $conversation)
    {
      $conversation = config('chat-system.models.conversation')::findOrFail($conversation);
      $this->authorize('delete', $conversation);
      $user = $request->user();
      return ['status' => $conversation->makeDelete($user)];
    }

    function count(PaginableRequest $request) {
      $request->validate([
        'type' => 'in:unread,undelivered'
      ]);

      $user = $request->user();
      $type = $request->type;

      return $user->conversations()
      ->whereNotTrashed($user->id)
      ->whereHasLastMessage($user)
      ->when($type, fn ($q) => $q->whereHas('unread'))
      ->count();
    }
}
