<?php

namespace App\Http\Controllers\Backend;

use App\ContactForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contact_forms = ContactForm::query();
        $q = $request->get('q');

        if (!empty($q)) {
            $contact_forms = $contact_forms->where('name', 'like', "%$q%");
        }

        $contact_forms = $contact_forms->paginate(15);

        return view('contact_form.index', compact('contact_forms', 'q'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactForm  $contact_form
     * @return \Illuminate\Http\Response
     */
    public function show(ContactForm $contact_form)
    {
        return view('contact_form.show', compact('contact_form'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactForm  $contact_form
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactForm $contact_form)
    {
        $contact_form->delete();

        return redirect(action('Backend\ContactFormController@index'));
    }
}
