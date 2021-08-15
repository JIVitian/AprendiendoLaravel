<?php

namespace App\Http\Controllers;

use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactanosController extends Controller
{
    // Show the form
    public function index()
    {
        return view('contactanos.index');
    }

    // Process and send the form in a mail.
    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'mail' => 'required|email',
            'message' => 'required'
        ]);
        $correo =new ContactanosMailable($request->all());
        Mail::to('jivitian@gmail.com')->send($correo);

        // Redirect to the contact page and return a session variable with info.
        return redirect()->route('contactanos.index')->with('info', 'Mensaje Enviado!');
    }
}
