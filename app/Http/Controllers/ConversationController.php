<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Http\Requests\StoreConversationRequest;
use App\Http\Requests\UpdateConversationRequest;

class ConversationController extends Controller
{
    /**
     * Display a listing of the resource
     * @return void
     */
    public function index()
    {
        // Your Code Here...
    }

    /**
     * Show the form for creating a new resource
     * @return void
     */
    public function create()
    {
        // Your Code Here...
    }

    /**
     * Store a newly created resource in storage
     * @param  StoreConversationRequest $request
     * @return void
     */
    public function store(StoreConversationRequest $request)
    {
        // Your Code Here...
    }

    /**
     * Display the specified resource
     * @param  Conversation $conversation
     * @return void
     */
    public function show(Conversation $conversation)
    {
        // Your Code Here...
    }

    /**
     * Show the form for editing the specified resource
     * @param  Conversation $conversation
     * @return void
     */
    public function edit(Conversation $conversation)
    {
        // Your Code Here...
    }

    /**
     * Update the specified resource in storage
     * @param  UpdateConversationRequest $request
     * @param  Conversation              $conversation
     * @return void
     */
    public function update(UpdateConversationRequest $request, Conversation $conversation)
    {
        // Your Code Here...
    }

    /**
     * Remove the specified resource from storage
     * @param  Conversation $conversation
     * @return void
     */
    public function destroy(Conversation $conversation)
    {
        // Your Code Here...
    }
}
