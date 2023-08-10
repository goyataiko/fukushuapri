<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\FormSubmissionRequest;

class ContactController extends Controller
{
    //
    public function index(){
        // $users = Contact::paginate(3);  //5개 데이터를 2개씩 페이지를 나눠라..
        $users = Contact::get();
        
        return view('contact.index', compact('users'));
    }

    public function store(FormSubmissionRequest $request){
        Contact::create([
            'name' => $request -> get('name'),
            'gender' => $request -> get('gender')
        ]);

        return redirect('/contacts')->with('success','컨텍트가 작성됨');
    }
}
