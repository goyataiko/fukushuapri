<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\FormSubmissionRequest;
use App\Models\Image;

class ContactController extends Controller
{
    //
    public function index(){
        // $users = Contact::paginate(3);  //5개 데이터를 2개씩 페이지를 나눠라..
        $users = Contact::get();
        $images = Image::get();

        return view('contact.index', compact('users', 'images'));
    }

    public function store(FormSubmissionRequest $request){
        Contact::create([
            'name' => $request -> get('name'),
            'gender' => $request -> get('gender')
        ]);

        return redirect('/contacts')->with('success','컨텍트가 작성됨');
    }

    public function show(Contact $contact){
        dd($contact);

        return view('.contact.show', compact('contact')); //라우터 name과 연동
    }

    public function upload(Request $request){

        $this -> validate($request, [
            'avatar' => 'required|mimes:jpeg,jpg,png|max:2048',
        ]);

        if($request->hasFile('avatar')){ 
            $fileName = $request->file('avatar')->store('public/image');

            Image::create([
                'image' => $fileName
            ]);
            return back();
        }
    }
}
