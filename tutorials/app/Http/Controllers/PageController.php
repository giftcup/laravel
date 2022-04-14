<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showContactPage() {
        return view('contact');
    }

    public function showAboutPage() {
        return view('about');
    }

    public function showProfileMePage() {
        return view('profile');
    }
}
