<?php

namespace App\Http\Controllers\Auth;
use App\Models\SiteSetting;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
     
      
    public function __invoke(Request $request)
    {
           $setting = SiteSetting::first();
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email', compact('setting'));
    }
}
