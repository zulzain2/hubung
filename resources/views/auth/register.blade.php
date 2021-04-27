{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
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
                        <div class="content mb-0">

                            <div class="custom-control scale-switch ios-switch" style="text-align: right;margin-right: unset;position: unset;padding-left: unset;">
                                <input data-toggle-theme="" type="checkbox" class="ios-input" id="switch-dark-mode">
                                <label class="custom-control-label" for="switch-dark-mode"></label>
                            </div>

                            <h1 class="text-center font-900 font-40 text-uppercase mb-0">Register</h1>

                            <p class="text-center color-highlight font-11">Don't have an account? Register here.</p>

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4 color-highlight" :errors="$errors" />

                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="input-style no-borders has-icon validate-field">
                                    <i class="fa fa-user"></i>
                                    <input type="text" class="form-control validate-name" id="name" name="name" placeholder="Name">
                                    <label class="color-blue-dark font-10 mt-1">Name</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style no-borders has-icon validate-field mt-2">
                                    <i class="fa fa-at"></i>
                                    <input type="email" class="form-control validate-email" id="email" name="email" placeholder="Email">
                                    <label class="color-blue-dark font-10 mt-1">Email</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style no-borders has-icon validate-field mt-2">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control validate-password" id="password" name="password" placeholder="Choose a Password">
                                    <label class="color-blue-dark font-10 mt-1">Choose a Password</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>

                                <div class="input-style no-borders has-icon validate-field mt-2">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" class="form-control validate-password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your Password">
                                    <label class="color-blue-dark font-10 mt-1">Confirm your Password</label>
                                    <i class="fa fa-times disabled invalid color-red-dark"></i>
                                    <i class="fa fa-check disabled valid color-green-dark"></i>
                                    <em>(required)</em>
                                </div>

                                <button type="submit" class="btn btn-m btn-full w-100 rounded-s shadow-l bg-green-dark text-uppercase font-900 mt-4">Create account</button>

                            </form>

                            <div class="divider"></div>

                            <p class="text-center">
                                <a href="login" class="color-theme opacity-50 font-12">Already Registered? Sign in Here</a>
                            </p>
                            <br>

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
