<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\User;
use Illuminate\View\View;
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
     */public function index()
    {
        $emails = Email::all();
        $inbox = Email::where('rcpt_email', auth()->user()->email)->get();
        $inboxCount = Email::where('rcpt_email', auth()->user()->email)->count();
        $unread = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->get();
        $unreadCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->count();
        $read = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->get();
        $readCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->count();
        $sent = Email::where('send_email', auth()->user()->email)->get();
        $sentCount = Email::where('send_email', auth()->user()->email)->count();
        $users = User::all();
        return view('emails.index', compact('emails', 'inbox', 'users', 'inboxCount', 'sent', 'sentCount', 'unread', 'unreadCount', 'read', 'readCount'));
    }

    public function read()
    {
        $emails = Email::all();
        $inbox = Email::where('rcpt_email', auth()->user()->email)->get();
        $inboxCount = Email::where('rcpt_email', auth()->user()->email)->count();
        $unread = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->get();
        $unreadCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->count();
        $read = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->get();
        $readCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->count();
        $sent = Email::where('send_email', auth()->user()->email)->get();
        $sentCount = Email::where('send_email', auth()->user()->email)->count();
        $users = User::all();
        return view('emails.read', compact('emails', 'inbox', 'users', 'inboxCount', 'sent', 'sentCount', 'unread', 'unreadCount', 'read', 'readCount'));
    }


    public function unread()
    {
        $emails = Email::all();
        $inbox = Email::where('rcpt_email', auth()->user()->email)->get();
        $inboxCount = Email::where('rcpt_email', auth()->user()->email)->count();
        $unread = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->get();
        $unreadCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->count();
        $read = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->get();
        $readCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->count();
        $sent = Email::where('send_email', auth()->user()->email)->get();
        $sentCount = Email::where('send_email', auth()->user()->email)->count();
        $users = User::all();
        return view('emails.unread', compact('emails', 'inbox', 'users', 'inboxCount', 'sent', 'sentCount', 'unread', 'unreadCount', 'read', 'readCount'));
    }


    public function sent()
    {
        $emails = Email::all();
        $inbox = Email::where('rcpt_email', auth()->user()->email)->get();
        $inboxCount = Email::where('rcpt_email', auth()->user()->email)->count();
        $unread = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->get();
        $unreadCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->count();
        $read = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->get();
        $readCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->count();
        $sent = Email::where('send_email', auth()->user()->email)->get();
        $sentCount = Email::where('send_email', auth()->user()->email)->count();
        $users = User::all();
        return view('emails.sent', compact('emails', 'inbox', 'users', 'inboxCount', 'sent', 'sentCount', 'unread', 'unreadCount', 'read', 'readCount'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $emails = Email::all();
        $rcpt_email = $request->query('rcpt_email');
        $defaultMessage = $request->query('message'); 
        $subject = $request->query('subject'); 
        $inbox = Email::where('rcpt_email', auth()->user()->email)->get();
        $inboxCount = Email::where('rcpt_email', auth()->user()->email)->count();
        $unread = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->get();
        $unreadCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->count();
        $read = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->get();
        $readCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->count();
        $sent = Email::where('send_email', auth()->user()->email)->get();
        $sentCount = Email::where('send_email', auth()->user()->email)->count();
        $users = User::all();
        return view('emails.create', compact('defaultMessage','subject', 'rcpt_email', 'emails', 'inbox', 'users', 'inboxCount', 'sent', 'sentCount', 'unread', 'unreadCount', 'read', 'readCount'));
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
    public function show($id): View
    {
        $email = Email::findOrFail($id);
        // Mark the email as read
        $email->update(['status' => 1]);

        $emails = Email::all();
        $inbox = Email::where('rcpt_email', auth()->user()->email)->get();
        $inboxCount = Email::where('rcpt_email', auth()->user()->email)->count();
        $unread = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->get();
        $unreadCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 0)->count();
        $read = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->get();
        $readCount = Email::where('rcpt_email', auth()->user()->email)->where('status', 1)->count();
        $sent = Email::where('send_email', auth()->user()->email)->get();
        $sentCount = Email::where('send_email', auth()->user()->email)->count();

        // Get the user's photo for each email sender
        foreach ($inbox as $email) {
            $user = User::where('email', $email->send_email)->first();
            if ($user) {
                $email->sender_photo = $user->photo;
            }
        }


        $users = User::all();
        return view('emails.show', compact('user', 'email', 'emails', 'inbox', 'users', 'inboxCount', 'sent', 'sentCount', 'unread', 'unreadCount', 'read', 'readCount'));
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

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroyInbox(Request $request, $id)
    {
        $selectedIds = $request->input('ids', []);

        if (!empty($selectedIds)) {
            Email::whereIn('id', $selectedIds)->delete();

            return response()->json(['message' => 'Selected emails deleted successfully']);
        } else {
            return response()->json(['error' => 'No emails selected for deletion'], 400);
        }
    }

    /**
     * Mark selected emails as status.
     */
    public function markAsRead(Request $request)
    {
        $selectedIds = $request->input('ids', []);

        if (!empty($selectedIds)) {
            Email::whereIn('id', $selectedIds)->update(['status' => 1]);

            return response()->json(['message' => 'Selected emails marked as read successfully']);
        } else {
            return response()->json(['error' => 'No emails selected'], 400);
        }
    }

    /**
     * Mark selected emails as unread.
     */
    public function markAsUnread(Request $request)
    {
        $selectedIds = $request->input('ids', []);

        if (!empty($selectedIds)) {
            Email::whereIn('id', $selectedIds)->update(['status' => 0]);

            return response()->json(['message' => 'Selected emails marked as unread successfully']);
        } else {
            return response()->json(['error' => 'No emails selected'], 400);
        }
    }
}
