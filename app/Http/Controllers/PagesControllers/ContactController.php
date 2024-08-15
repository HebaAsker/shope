<?php

namespace App\Http\Controllers\PagesControllers;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function viewContactPage()
    {
        $category=Category::paginate(20); //to show all categories in header
        return view('pages.contact',compact('category'));
    }


    public function contact(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'required'
        ]);

        $contact = new Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->comment = $request->comment;

        $contact->save();

        return back()->with('success', 'Thank you for contact us!');

    }
}
