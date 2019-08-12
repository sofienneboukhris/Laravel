@extends('layouts.register')

@section('content')
<div class="page-content">
    <div class="form-v9-content" style="background-image: url('https://c-parity.com/wp-content/uploads/2017/02/claims-background.jpg') ;
    background-repeat: no-repeat;">
        <form class="form-detail" action="#" method="post">
                <h2>Registration Form</h2>
                @csrf
				<div class="form-row-total">
					<div class="form-row">
						<input type="text" name="name" id="name" class=" input-text form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Your Name" name="name" value="{{ old('name') }}" required>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>
					<div class="form-row">
						<input  name="email" id="email" type="email"  class="input-text form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  placeholder="Your Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                    </div>
                    @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
				</div>
				<div class="form-row-total">
					<div class="form-row">
						<input type="password" name="password" id="password" class="input-text form-control{{ $errors->has('password') ? ' is-invalid' : '' }} " class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Your Password" required>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    </div>
					<div class="form-row">
						<input type="password" name="password_confirmation" id="password-confirm" class="input-text" placeholder="Comfirm Password" required>
					</div>
				</div>
				<div class="form-row-last">
                        <input type="submit" name="register" class="register" value="Register">
				</div>
			</form>
    </div>
</div>
@endsection
