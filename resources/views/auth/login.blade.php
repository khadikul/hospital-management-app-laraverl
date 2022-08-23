<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5">SignIn</h2>
            <div class="text-center mb-5 text-dark">Made Your Juerney</div>
            <div class="card my-5">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}" class="card-body cardbody-color p-lg-5">
                    @csrf
                    @method('POST')
                    
                    <div class="text-center">
                    <img src="{{asset('assets/img/logo.webp')}}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                        width="200px" alt="profile">
                    </div>
        
                    <div class="mb-3">
                        <label for="email" value="{{ __('Email') }}"></label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required autofocus autocomplete="email" aria-describedby="emailHelp" placeholder="User Email">
                        <small id="emailHelp" class="form-text text-muted mt-1">
                            @error('email')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="mb-3">
                        <label for="password" value="{{ __('Password') }}"></label>
                        <input type="password" class="form-control" name="password" id="passowrd" value="{{old('passowrd')}}" required autofocus autocomplete="password" placeholder="Enter Password">
                        <small id="emailHelp" class="form-text text-muted mt-1">
                            @error('password')
                                {{$message}}
                            @enderror
                        </small>
                    </div>

                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">SignIn</button></div>
                        <div class="text-center">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>