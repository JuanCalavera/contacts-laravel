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
            $post['slug'] = strtolower($request->name . "-" . $request->subname);
            $post['email'] = implode(';', $request->email);
            $post['phone'] = implode(';', $request->phone);
            $post['description'] = $request->description;
            $post['favorite'] = $request->favorite != 0 ? true : false;

            Contact::create([
                'name' => $post['name'],
                'last_name' => $post['subname'],
                'slug' => $post['slug'],
                'email' => $post['email'],
                'phone' => $post['phone'],
                'description' => $post['description'],
                'favorite' => $post['favorite'],
                'img_profile' => $request->file('img_profile')->store('uploads'),
            ]);

            session()->flash(
                'message',
                "{$post['name']} {$post['subname']} adicionado(a) com sucesso!!!"
            );

            return redirect()->route('home');

    }

    function update(Request $request){
        $contact = Contact::find($request->id);

        $contact->name = !empty($request->name) ? $request->name : $contact->name;
        $contact->last_name = !empty($request->subname) ? $request->subname : $contact->last_name;
        $contact->slug = strtolower($contact->name . "-" . $contact->last_name);
        $contact->email = !empty($request->email) ? $request->email : $contact->email;
        $contact->phone = !empty($request->phone1) ? $request->phone1 : $contact->phone;
        $contact->description = !empty($request->description) ? $request->description : $contact->description;
        $contact->favorite = $request->favorite != 0 ? true : false;
        $contact->save();

        session()->flash(
            'edited',
            "{$contact} foi editado(a) com sucesso"
        );

        return redirect()->route('home');
    }

    function show(Request $request){
        $contact = Contact::query()->where('slug', $request->slug)->get()[0];

        return view('single', compact('contact'));
    }

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
