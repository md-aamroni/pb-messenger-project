<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;

class ContactController extends Controller
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
     * @param  StoreContactRequest $request
     * @return void
     */
    public function store(StoreContactRequest $request)
    {
        // Your Code Here...
    }

    /**
     * Display the specified resource
     * @param  Contact $contact
     * @return void
     */
    public function show(Contact $contact)
    {
        // Your Code Here...
    }

    /**
     * Show the form for editing the specified resource
     * @param  Contact $contact
     * @return void
     */
    public function edit(Contact $contact)
    {
        // Your Code Here...
    }

    /**
     * Update the specified resource in storage
     * @param  UpdateContactRequest $request
     * @param  Contact              $contact
     * @return void
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        // Your Code Here...
    }

    /**
     * Remove the specified resource from storage
     * @param  Contact $contact
     * @return void
     */
    public function destroy(Contact $contact)
    {
        // Your Code Here...
    }
}
