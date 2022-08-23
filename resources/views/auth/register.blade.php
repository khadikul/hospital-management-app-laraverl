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
            <h2 class="text-center text-dark mt-5">SignUp Form</h2>
            <div class="text-center mb-5 text-dark">Made Your Juerney</div>
            <div class="card my-5">
                <form method="POST" action="{{ route('register') }}" class="card-body cardbody-color p-lg-5">
                    @csrf
                    @method('POST')
                    
                    <div class="text-center">
                    <img src="{{asset('assets/img/logo.webp')}}" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                        width="200px" alt="profile">
                    </div>
        
                    <div class="mb-3">
                        <label for="name" value="{{ __('Name') }}"></label>
                        <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" required autofocus autocomplete="name" placeholder="User Name">
                    </div>

                    <div class="mb-3">
                        <label for="email" value="{{ __('Email') }}"></label>
                        <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}" required autofocus autocomplete="email" aria-describedby="emailHelp" placeholder="User Email">
                    </div>

                    <div class="mb-3">
                        <label for="number" value="{{ __('Number') }}"></label>
                        <input type="text" class="form-control" name="number" id="number" value="{{old('number')}}" required autofocus autocomplete="number" placeholder="Enter Number">
                    </div>

                    <div class="mb-3">
                        <label for="address" value="{{ __('Address') }}"></label>
                        <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" required autofocus autocomplete="address" placeholder="Enter Address">
                    </div>

                    <div class="mb-3">
                        <label for="password" value="{{ __('Password') }}"></label>
                        <input type="password" class="form-control" name="password" id="passowrd" value="{{old('passowrd')}}" required autofocus autocomplete="password" placeholder="Enter Password">
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" value="{{ __('Confrime Password') }}"></label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" value="{{old('password_confirmation')}}" required autofocus autocomplete="new-password" placeholder="Confrime Password">
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-jet-label for="terms">
                                <div class="flex items-center">
                                    <x-jet-checkbox name="terms" id="terms"/>

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-jet-label>
                        </div>
                    @endif

                    <div class="text-center"><button type="submit" class="btn btn-color px-5 mb-5 w-100">Sign Up</button></div>
                        <div id="" class="form-text text-center mb-5 text-dark">Already Sign Up? <a href="{{ route('login') }}" class="text-dark fw-bold"> Login</a>
                    </div>
                </form>
            </div>
          </div>
        </div>
      </div>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>