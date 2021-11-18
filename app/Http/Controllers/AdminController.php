<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class AdminController extends Controller
{
    public function index()
    {
        $title = "Посмотреть обращения";
        $feedbacks = Feedback::orderByDesc('created_at')->get();
        return view('admin.feedback', compact('title','feedbacks'));
    }

    public function store()
    {

        $this->validate(request(), [
            'email' => 'required|email:rfc,dns',
            'message' => 'required|max:255',
        ]);

        Feedback::create([
            'email' => request('email'),
            'message' => request('message'),
        ]);

        return redirect('/contacts');

    }
}
