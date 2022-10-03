{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>register</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="{{asset('fonts/linearicons/style.css')}}">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('css/admin/register.css')}}">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<form method="POST" action="{{ route('register') }}">
                    @csrf
					<h3>New Account?</h3>
					<div class="form-holder">
						<span class="lnr lnr-user"></span>
						<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name">
                        
                        <div style="position: relative; margin-top: 10px">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: #c33838">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-envelope"></span>
						<input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email">
                        <div style="position: relative; margin-top: 10px">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: #c33838">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						<input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">                      
                        <div style="position: relative; margin-top: 10px">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong style="color: #c33838">{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
					</div>
					<div class="form-holder">
						<span class="lnr lnr-lock"></span>
						{{-- <input type="password" class="form-control" placeholder="Confirm Password"> --}}
                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation">
					</div>
					<button>
						<span>Register</span>
					</button>
				</form>
			</div>
			
		</div>
	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>