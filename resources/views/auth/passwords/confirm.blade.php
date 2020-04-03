@extends('layouts.app')

@section('content')
    <section class="authsection">
        <h3 class="text-center text-white">Confirm Password</h3>
        <p class="text-center text-white">Please confirm your password before continuing.</p>
        <div class="container regform">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">

                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="password" class="">{{ __('Password') }}</label>


                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                </div>

                                <div class="form-group">

                                        <button type="submit" class="btn btn-primary btn-block">
                                            {{ __('Confirm Password') }}
                                        </button>
                                        <center>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                        </center>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
