@extends('layouts.app')

@section('content')
    <section class="authsection">
        <h3 class="text-center text-white">RESET PASSWORD</h3>
        <p class="text-center text-white"> A password reset link will be sent to your Email</a></p>
        <div class="container regform">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="email" class="">{{ __('E-Mail') }}</label>


                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
