<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\ContactForm;
use Illuminate\Support\Carbon;
class ContactController extends Controller
{



    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function AdminContact()
    {
        $contacts = Contact::all();
        return view('admin.contact.index',compact('contacts'));
    }
    public function AddContact()
    {
        return view('admin.contact.create');
    }
    public function StoreContact(Request $request)
    {
        Contact::insert([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return redirect()->route('all.contact')->with('success','Berhasil Menambah Contact');
    
    }


    public function Edit($id)
    {
      $contact  =  Contact::find($id);
      return view('admin.contact.edit',compact('contact'));
    }

    public function Update(Request $request,$id)
    {
        $update = Contact::find($id)->update([
            'address' => $request->address,
            'email'=> $request->email,
            'phone' => $request->phone
        ]);
        return redirect()->route('all.contact')->with('success','Contact Berhasil di UPDATE');
    }

    public function Delete($id)
    {
        Contact::find($id)->Delete();
        return redirect()->back()->with('success','Berhasil Menghapus Contact');
    }


    public function Contact()
    {
        // $contact = Contact::
        $contact = Contact::first();
        // dd($contact->address);
        return view('pages.contact',compact('contact'));
    }


    public function ContactForm(Request $request)
    {
        ContactForm::insert([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
            'created_at' => Carbon::now(),
        ]);
        return redirect()->route('contact')->with('success','Pesan anda berhasil di kirim!');
    }

    public function AdminMessage()
    {
        $ContactMessage = ContactForm::all();
        return view('admin.contact.message',compact('ContactMessage'));
    }
    public function DeleteMessage($id)
    {
        ContactForm::find($id)->Delete();
        return redirect()->back()->with('success','Message Berhasil di Hapus!');

    }
}
