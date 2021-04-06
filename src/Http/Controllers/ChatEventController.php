<?php

namespace Myckhel\ChatSystem\Http\Controllers;

use Myckhel\ChatSystem\Models\ChatEvent;
use Illuminate\Http\Request;
use Myckhel\ChatSystem\Http\Requests\PaginableRequest;

class ChatEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaginableRequest $request)
    {
      $request->validate([
        'orderBy'     => '',
        'search'      => 'min:3',
        'order'       => 'in:asc,desc',
        'pageSize'    => 'int',
        'type'        => 'in:read,delete,deliver',
        'made_type'   => 'string',
        'made_id'     => 'int',
      ]);
      $user       = $request->user();
      $pageSize   = $request->pageSize;
      $order      = $request->order;
      $orderBy    = $request->orderBy;
      $search     = $request->search;
      $type       = $request->type;
      $made_type  = $request->made_type;
      $made_id    = $request->made_id;

      return $user->chatEventMakers(null, null, $type, $made_id, $made_type)
      ->orderBy($orderBy ?? 'id', $order ?? 'asc')
      ->paginate($pageSize);
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
        'made_type'   => 'required|string',
        'made_id'     => 'required|int',
        'type'        => 'required|in:read,delete,deliver',
      ]);
      $user     = $request->user();
      return $user->chatEventMakers()
      ->create($request->only([
        'made_type', 'made_id', 'type'
      ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Myckhel\ChatSystem\Models\ChatEvent  $chatEvent
     * @return \Illuminate\Http\Response
     */
    public function show(ChatEvent $chatEvent)
    {
      $this->authorize('view', $chatEvent);
      return $chatEvent;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Myckhel\ChatSystem\Models\ChatEvent  $chatEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatEvent $chatEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Myckhel\ChatSystem\Models\ChatEvent  $chatEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatEvent $chatEvent)
    {
      $this->authorize('update', $chatEvent);
      $request->validate([]);
      $user     = $request->user();
      $chatEvent->update(array_filter($request->only($chatEvent->getFillable())));
      return $chatEvent;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Myckhel\ChatSystem\Models\ChatEvent  $chatEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ChatEvent $chatEvent)
    {
      $user     = $request->user();
      return ['status' =>
        $user->chatEventMakers($chatEvent)->firstOrFail()->delete()
      ];
    }
}
