@extends('layouts.register')

@section('content')
<div class="page-content">
    <div class="form-v9-content" style="background-image: url('https://c-parity.com/wp-content/uploads/2017/02/claims-background.jpg') ;
    background-repeat: no-repeat;">
                    <form method="POST" class="form-detail" action="{{ route('login.custom') }}">
                            @if(session('error'))
                            <div class="container">
                                <div class="alert alert-danger">
                                    {{session ('error')}}
                                </div>
                            </div>
                        @endif
                        <h2>Login Admins</h2>
                         @csrf
                         <div class="form-row-total">
                            <div class="form-row">
                             <div class="col-md-6">
                             
                                <input id="email" type="email" placeholder="Your Email" class="input-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                    
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <input id="password" placeholder="Your Password" type="password" class="input-text form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                
                                <div class="form-row-last">
                                        <input type="submit" name="login" class="register" value="Login">
                                </div>
                                @if(session('failed'))
                              <div class="container">
                                      <div class="alert alert-danger">
                                                 {{session ('failed')}}
                                      </div>
                             </div>
                             @endif
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        'Forgot Your Password?'
                                    </a>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
