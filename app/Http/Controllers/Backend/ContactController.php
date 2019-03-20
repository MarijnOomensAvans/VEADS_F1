<?php

namespace App\Http\Controllers\Backend;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contact.index', ['contacts' => new LengthAwarePaginator([], 0, 10), 'q' => '']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contact.show', compact('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        return view('contact.destroy', compact('contact'));
    }

    public function delete(Request $request, Contact $contact) {
        if (!empty($confirm = $request->post('confirm')) && $confirm == 1) {
            $contact->delete();
        }

        return redirect('admin/contacts');
    }
}
