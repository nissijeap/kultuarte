<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-email|edit-email|delete-email', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-email', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-email', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-email', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emails = Email::all();
        return view('emails.index', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $emails = Email::all();
        return view('emails.create', compact('emails'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
            'send_email' => 'nullable|email|max:255',
            'send_name' => 'nullable|string|max:255',
            'rcpt_name' => 'nullable|string|max:255',
            'rcpt_email' => 'required|email|max:255',
        ]);

        // Get the authenticated user's name and email
        $userName = Auth::user()->name;
        $userEmail = Auth::user()->email;

        if (!empty($request->rcpt_email)) {
            $email = new Email();
            $email->send_name = $userName;
            $email->send_email = $userEmail;
            $email->subject = $request->subject;
            $email->message = $request->message;
            $email->rcpt_name = $request->rcpt_name;
            $email->rcpt_email = $request->rcpt_email;
            $email->save();

            // Send the email with dynamic subject and body
            $mailData = [
                'title' => $email->subject,
                'body' => $email->message,   
            ];

            Mail::to($email->rcpt_email)->send(new DemoMail($mailData));
            // Mail::to($email->send_email)->send(new DemoMail($mailData));

            return redirect()->route('emails.index')->with('success', 'Email sent successfully!');
        } else {
            // Handle the case where the recipient email address is empty
            return redirect()->back()->with('error', 'Recipient email address is required.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $email = email::findOrFail($id);
        $email->delete();

        return redirect()->route('emails.index')->with('success', 'Email deleted successfully');
    }
}
