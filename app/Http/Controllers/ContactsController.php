<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactsController extends Controller
{
    function index(){
     $contacts = Contact::orderBy('favorite', 'desc')->get();

     return view('index', compact('contacts'));
    }

    function store(ContactFormRequest $request){


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

            session()->flash(
                'message',
                "{$post['name']} {$post['subname']} adicionado(a) com sucesso!!!"
            );

            return redirect()->route('home');

    }
    function update(Request $request){}
    function show(Request $request){}
    function destroy(Request $request){
        $contact = Contact::find($request->id)->name;
        Contact::destroy($request->id);
        session()->flash(
            'destroy',
            "{$contact} foi removido(a)"
        );

        return redirect()->route('home');
    }

}
