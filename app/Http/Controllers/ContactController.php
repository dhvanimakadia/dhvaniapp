<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact.contact');
    }

    public function submitContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:2000',
        ]);

        // Save to database
        $contact = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Send email
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::send('emails.contact', $data, function ($mail) use ($request) {
            $mail->from($request->email, $request->name);
            $mail->to('dhvanimakadia252@gmail.com')->subject('Contact Form Submission');
        });

        return back()->with('success', 'Thank you for contacting us!');
    }
}
