<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="/css/form.css">
</head>
<body>

    <div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form" action="{{ route('register') }}">
                 <!--generates token for every user that signs up using the application
                    using their session-->
                            @csrf 

                               <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

              
                        </div>
                            <div class="form-group">
                                
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" class=" @error('name') is-invalid @enderror" name="name" id="name" placeholder="Your First Name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                              <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                              <input type="text" class=" @error('name') is-invalid @enderror" name="name" id="name" placeholder="Your Last Name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                            
                              @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          </div>
                          <div class="form-group">
                            <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                            <input type="text" name="name" id="name" class="@error('email') is_invalid @enderror"  value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Your UserName "/>
                        
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" class="@error('email') is_invalid @enderror" placeholder="Your Email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                                
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" class="@error('pass') is_invalid @enderror" id="pass" placeholder="Password" value="{{ old('pass') }}" required autocomplete="new-password"/>
                               
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat your password"/>
                            </div>
                           
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"  {{ __('Register') }}/>
                            </div>
                           
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="/images/signup-image.jpg" alt="sing up image"></figure>
                        <a href="/login" class="signup-image-link">I have an account already</a>
                    </div>
                </div>
            </div>
        </section>

       
    
    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>

