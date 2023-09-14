@extends('layouts.app')

@section('content')

<!-- <div class="container reset-container">
    <div class="row justify-content-center reset-row">
        <div class="col-md-8 reset-col">
            <div class="card reset-card">
                <div class="card-header reset-header">{{ __('Reset Password') }}</div>

                <div class="card-body reset-body">
                    @if (session('status'))
                    <div class="alert alert-success reset-alert" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="reset-form" method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 reset-formgroup">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary reset-button">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->

<main id="content" role="main" class="w-full  max-w-md mx-auto p-6">
    <div class="mt-7 bg-white  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700 border-2 border-indigo-300">
        <div class="p-4 sm:p-7">
            <div class="text-center">
                <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">{{ __('Forgot Password?') }}</h1>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                    Remember your password?
                    <a class="text-blue-600 decoration-2 hover:underline font-medium reset-text" href="https://printo/login">
                        Login here
                    </a>
                </p>
            </div>

            <div class="mt-5">
                @if (session('status'))
                <div class="alert alert-success reset-alert" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                <form class="reset-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="grid gap-y-4">
                        <div>
                            <label for="email" class="block text-sm font-bold ml-1 mb-2 dark:text-white">{{ __('E-Mail Address') }}</label>
                            <div class="relative">
                                <input id="email" type="email" class="py-3 px-4 block w-full border-2 border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 shadow-sm form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="email-error">
                            </div>
                            <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email
                                address so we can get back to you</p>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <button type="submit" class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800 reset-button">
                            {{ __('Reset Password') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection