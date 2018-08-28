<?php

namespace App\Http\Controllers\Admin;

use App\Contact;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);
        return view('admin.contact.index', compact('contacts'));
    }
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('admin.contact.show', compact('contact'));

    }

    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('successMsg','Mensagem Deletada com Sucesso!');
    }
}
