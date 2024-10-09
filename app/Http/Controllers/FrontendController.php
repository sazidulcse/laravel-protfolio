<?php

namespace App\Http\Controllers;

use App\Mail\MailSent;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Protfolio;
use App\Models\Service;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $experiences = Experience::whereHas('user', function ($query) {
            $query->where('is_active', 1);
        })->with('user')->latest()->get();

        $skills = Skill::whereHas('user', function ($query) {
            $query->where('is_active', 1);
        })->with('user')->latest()->get();

        $services = Service::whereHas('user', function ($query) {
            $query->where('is_active', 1);
        })->with('user')->latest()->get();

        $skills = Skill::whereHas('user', function ($query) {
            $query->where('is_active', 1);
        })->with('user')->latest()->get();

        $profile = Profile::whereHas('user', function ($query) {
            $query->where('is_active', 1);
        })->with('user')->first();

        $protfolios = Protfolio::whereHas('user', function ($query) {
            $query->where('is_active', 1);
        })->with('user')->latest()->get();

        return view('frontend', compact('experiences', 'profile', 'services', 'skills', 'protfolios'));
    }


    public function emailSent(Request $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $messageContent = $request->input('message');

        // Send the mail
        Mail::to('salman.bdtask@gmail.com')->send(new MailSent($name, $email, $messageContent));
        return redirect()->back()->with('success', 'Mail Send successfully.');
    }
}
