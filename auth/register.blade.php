@extends('layouts.app')

@section('content')

  
    
<div class="container">
    <div class="signup-content">
        <div class="signup-form">
            
            <h2 class="form-title">Sign up</h2>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card"> --}}
                {{-- <div class="card-header">{{ __('Register') }}</div> --}}

                <div class="card-body">
                    <form method="POST"  class="register-form" id="register-form" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                            <label for="firstname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" class=" @error('firstname') is-invalid @enderror" name="firstname" id="firstname" placeholder="Your First Name" value="{{ old('firstname') }}" required autocomplete="name" autofocus/>
                          
                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="lastname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" class=" @error('lastname') is-invalid @enderror" name="lastname" id="lastname" placeholder="Your Last Name" value="{{ old('firstname') }}" required autocomplete="name" autofocus/>
                          
                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" class=" @error('username') is-invalid @enderror" name="username" id="username" placeholder="Your User Name" value="{{ old('firstname') }}" required autocomplete="name" autofocus/>
                          
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
       

                 
                        <div class="form-group ">
                            <label for="email" ><i class="zmdi zmdi-email"></i></label>

                           
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"  placeholder="Your Email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        <div class="form-group">
                            <label for="phone"><i class="zmdi zmdi-phone"></i></label>

                           
                                <input id="phone" type="text" class="@error('phone') is-invalid @enderror" name="phone" placeholder="Your Phone Number" value="{{ old('phone') }}" required autocomplete="name" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group">
                            <label for="password"><i class="zmdi zmdi-lock-outline"></i></label>

                            
                                <input id="password" type="password" class=" @error('password') is-invalid @enderror" placeholder="Your Password" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                        

                        <div class="form-group">
                            <label for="password-confirm"><i class="zmdi zmdi-lock"></i></label>

                            
                                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            
                        </div>
                       

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="signup-image">
                <figure><img src="/images/signup-image.jpg" alt="sing up image"></figure>
                <a href="/login" class="signup-image-link">I have an account already</a>
            </div>
        </div>
    </div>
</div>
@endsection
