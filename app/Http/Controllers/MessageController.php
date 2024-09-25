<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;

class MessageController extends Controller
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
     * @param  StoreMessageRequest $request
     * @return void
     */
    public function store(StoreMessageRequest $request)
    {
        // Your Code Here...
    }

    /**
     * Display the specified resource
     * @param  Message $message
     * @return void
     */
    public function show(Message $message)
    {
        // Your Code Here...
    }

    /**
     * Show the form for editing the specified resource
     * @param  Message $message
     * @return void
     */
    public function edit(Message $message)
    {
        // Your Code Here...
    }

    /**
     * Update the specified resource in storage
     * @param  UpdateMessageRequest $request
     * @param  Message              $message
     * @return void
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        // Your Code Here...
    }

    /**
     * Remove the specified resource from storage
     * @param  Message $message
     * @return void
     */
    public function destroy(Message $message)
    {
        // Your Code Here...
    }
}
