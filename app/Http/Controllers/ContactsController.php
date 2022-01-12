<?php

namespace App\Http\Controllers;

use App\Models\Contact;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    function index(){
     $contacts = Contact::all();

     return view('index', compact('contacts'));
    }
    function store(Request $request){
            $post['name'] = $request->name;
            $post['subname'] = $request->subname;
            $post['phone1'] = $request->phone1;
            $post['description'] = $request->description;
            $post['favorite'] = $request->favorite != 0 ? true : false;

            Contact::create([
                'name' => $post['name'],
                'last_name' => $post['subname'],
                'phone' => $post['phone1'],
                'description' => $post['description'],
                'favorite' => $post['favorite']
            ]);

            return redirect('/');

    }
    function update(){}
    function show(){}
    function destroy(){}
}
