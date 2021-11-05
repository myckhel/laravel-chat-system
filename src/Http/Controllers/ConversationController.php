<?php

namespace Myckhel\ChatSystem\Http\Controllers;

use Illuminate\Http\Request;
use Myckhel\ChatSystem\Http\Requests\PaginableRequest;
use DB;
use Myckhel\ChatSystem\Traits\Config;

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

      $eventColumns = ['id', 'maker_id', 'made_type', 'made_id', 'created_at'];

      $queryEvent = fn ($q) => $q->select($eventColumns)->notMessenger($user->id);

      $conversations = $user->conversations()
      ->whereHasLastMessage($user)
      ->withCount([
        'messages as latest_message_at' => fn ($q) => $q->select(DB::raw('max(created_at)')),
        'participant as isParticipant'  => fn ($q) => $q->whereUserId($user->id),
        'unread' => fn ($q) => $q->whereNotSender($user->id),
      ])
      ->orderByDesc('latest_message_at')
      ->with([
        // 'chatEvents' => fn ($q) => $q->groupBy('chat_events.id', 'chat_events.maker_type', 'chat_events.maker_id', 'chat_events.made_type', 'chat_events.made_id', 'chat_events.all', 'chat_events.created_at', 'chat_events.updated_at'),
        'delivery'      => fn ($q) => $queryEvent($q)->where('maker_id', '!=', $user->id),
        'read'          => fn ($q) => $queryEvent($q)->where('maker_id', '!=', $user->id),
        'trashed'       => $queryEvent,
        'last_message' => fn ($q) => $q->select(['id','user_id','message','conversation_id', 'created_at'])
          ->with([
            // 'latestMedia' => fn ($q) => $q->select('id', 'model_type', 'model_id', 'name'),
            'trashed' => fn ($q) => $q->withAll($user)
          ]),
        'participant' => fn ($q) => $q->select('id', 'user_id', 'conversation_id')->where('user_id', '!=', $user->id),
        'participant.user' => fn ($q) => $q,//->withUrls(['avatar']),
      ])->paginate($pageSize);

      $conversations->makeDeliver($user);

      $conversations->map(function ($conversation) {
        if ($conversation->type == 'private')
          $conversation->name = $conversation->participant?->user?->name;
      });

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
      @[
        'name'    => $name,
        'type'    => $type,
      ] = $request->validate([
        'name' => 'string',
        'type' => 'in:private,group,issue',
      ]);

      $user     = $request->user();

      return $user->conversations()->create([
        'user_id' => $user->id,
        'name'    => $name,
        'type'    => $type,
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
      $conversation = Config::config('models.conversation')::findOrFail($conversation);
      $this->authorize('view', $conversation);
      $user = $request->user();

      $conversation
        ->unread($user->id)->get()->makeRead($user);

      if($conversation->type === 'private'){
        $conversation->load([
          'participant' => fn ($q) => $q->select(['id', 'conversation_id', 'user_id'])->where('user_id', '!=', $user->id),
          'participant.user:id,name'
        ]);

        if ($conversation->participant?->user) {
          $conversation->name = $conversation->participant?->user?->name;
        }
      }

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
      $conversation = Config::config('models.conversation')::findOrFail($conversation);
      $this->authorize('update', $conversation);

      @[
        'name'    => $name,
        'type'    => $type,
      ] = $request->validate([
        'name' => 'string',
        'type' => 'in:private,group,issue',
      ]);

      $user     = $request->user();

      $conversation->update(array_filter([
        'name'    => $name,
        'type'    => $type,
      ]));

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
      $conversation = Config::config('models.conversation')::findOrFail($conversation);
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
      ->when($type, fn ($q) => $q->whereHas($type))
      ->count();
    }

    function join(Request $request, $conversation) {
      $conversation = Config::config('models.conversation')::findOrFail($conversation);
      $this->authorize('join', $conversation);
      $user = $request->user();
      return $conversation->addParticipant($user);
    }

    function leave(Request $request, $conversation) {
      $conversation = Config::config('models.conversation')::findOrFail($conversation);
      $this->authorize('join', $conversation);
      $user = $request->user();
      return $conversation->removeParticipant($user);
    }
}
