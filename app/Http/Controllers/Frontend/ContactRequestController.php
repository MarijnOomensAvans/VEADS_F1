<?php

namespace App\Http\Controllers\Frontend;

use App\Ambassador;
use App\ContactForm;
use App\Http\Requests\StoreContactFormRequest;
use App\TeamMember;
use App\Http\Controllers\Controller;

class ContactRequestController extends Controller
{
    public function index(){
        return view('front/contactRequest');
    }

    public function store(StoreContactFormRequest $request) {
        $contact_form = new ContactForm($request->validated());
        $contact_form->save();

        session()->flash('contact_send', 'Uw contact aanvraag is opgeslagen. Er wordt zo spoedig mogelijk contact opgenomen.');

        return redirect(action('Frontend\ContactRequestController@index'));
    }
}