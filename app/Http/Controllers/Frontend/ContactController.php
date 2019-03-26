<?php

namespace App\Http\Controllers\Frontend;

use App\ContactForm;
use App\Http\Requests\StoreContactFormRequest;
use App\TeamMember;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
        $team = TeamMember::get();
        return view('front/contact', compact('team'));
    }

    public function store(StoreContactFormRequest $request) {
        $contact_form = new ContactForm($request->validated());
        $contact_form->save();

        session()->flash('contact_send', 'Uw contact aanvraag is opgeslagen. Er wordt zo spoedig mogelijk contact opgenomen.');

        return redirect(action('Frontend\ContactController@index'));
    }
}