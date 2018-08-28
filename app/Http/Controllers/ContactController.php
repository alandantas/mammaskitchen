<?php

namespace App\Http\Controllers;

use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendMessage(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required'
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->message = $request->message;
        $contact->save();

        Toastr::success('Mensagem enviada com Sucesso! Em breve entraremos em contato.','Parabéns! ',["positionClass" => "toast-bottom-full-width"]);
        return redirect()->back();

    }
}
