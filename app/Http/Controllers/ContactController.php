<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    //
    public function index(){
        $users = Contact::paginate(3);  //5개 데이터를 2개씩 페이지를 나눠라..
        
        return view('contact.index', compact('users'));
    }

    public function store(Request $request){        
        Contact::create([
            'name' => $request -> get('name'),
            'gender' => $request -> get('gender')
        ]);
        return redirect('/contacts');
    }
}
