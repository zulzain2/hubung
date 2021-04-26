{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}


@extends('layouts.empty')

@push('styles')

@endpush

@section('content')

<div id="page">
    <div class="page-content">

<table style="width:100%;height:100vh">
    <tr>
        <td>
            <div class="card card-style">
                <div class="content mt-4 mb-0">
                
                    <div class="custom-control scale-switch ios-switch" style="text-align: right;margin-right: unset;position: unset;padding-left: unset;">
                        <input data-toggle-theme="" type="checkbox" class="ios-input" id="switch-dark-mode">
                        <label class="custom-control-label" for="switch-dark-mode"></label>
                    </div>
            
                    <h1 class="text-center font-900 font-40 text-uppercase mb-0">Login</h1>

                    <p class="bottom-0 text-center color-highlight font-11">Let's get you logged in</p>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4 color-highlight" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4 color-highlight" :errors="$errors" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="input-style no-borders has-icon validate-field mb-4">
                            <i class="fa fa-user"></i>
                            <input type="email" class="form-control validate-text" id="email" name="email" placeholder="Email">
                            <label class="color-blue-dark font-10 mt-1">Email</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>

                        <div class="input-style no-borders has-icon validate-field mb-4">
                            <i class="fa fa-lock"></i>
                            <input type="password" class="form-control validate-password" id="password" name="password" placeholder="Password">
                            <label class="color-blue-dark font-10 mt-1">Password</label>
                            <i class="fa fa-times disabled invalid color-red-dark"></i>
                            <i class="fa fa-check disabled valid color-green-dark"></i>
                            <em>(required)</em>
                        </div>

                        <button type="submit" class="btn btn-m mt-2 mb-4 btn-full bg-green-dark text-uppercase font-900 w-100">Login</button>
                    </form>

                    <div class="divider mt-4 mb-3"></div>

                    <div class="d-flex">
                        <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-start"><a href="{{URL::to('register')}}" class="color-theme">Create Account</a></div>
                        @if (Route::has('password.request'))
                            <div class="w-50 font-11 pb-2 color-theme opacity-60 pb-3 text-end"><a href="{{URL::to('forgot-password')}}" class="color-theme">Forgot Credentials</a></div>
                        @endif
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>
    


</div>
</div>

    
@endsection


@push('scripts')

@endpush
