@extends('auth.layouts.app')

@section('content')
    <div class="login-box">

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1>{{ env('APP_NAME') }}</h1>
            </div>
            <div class="card-body">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group">
                        <input name="login" type="text" @class(['form-control', 'is-invalid' => $errors->has('login')]) placeholder="Login" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span @class(['fas fa-envelope', 'text-danger' => $errors->has('login')])></span>
                            </div>
                        </div>
                    </div>
                    @error('login')
                        <span class="text-danger text-sm">{{ $message }}</span>
                    @enderror

                    <div class="input-group my-4">
                        <input name="password" type="password" @class(['form-control']) placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                        </div>

                    </div>
                </form>

                <p class="mb-1">
                    {{-- <a href="forgot-password.html">I forgot my password</a> --}}
                </p>
                <p class="mb-0">
                    {{-- <a href="register.html" class="text-center">Register a new membership</a> --}}
                </p>
            </div>

        </div>

    </div>
@endsection
