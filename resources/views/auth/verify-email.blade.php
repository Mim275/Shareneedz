@extends('layouts.app')
@section('content')

        <div class="mb-8 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-500 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-5 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <button>
                        {{ __('Resend Verification Email') }}
                    </button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
        
        
        <div>
           <img src="{{'frontend/images/logo.png'}}">
        </div>
    
            
        
@endsection