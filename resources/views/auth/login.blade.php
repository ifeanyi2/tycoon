@php
    $setting =  DB::table('settings')->select('about', 'logo')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="{{ $setting->about }}" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset($setting->logo) }}" type="image/x-icon">
    <title>{{ config('app.name') }} :: Login</title>
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3><br>
                                     <x-jet-validation-errors class="mb-4 text-danger" />
                                    @if (session('status'))
                                    <div class="mb-4 font-medium text-sm text-green-600">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf


                                        <div class="form-floating mb-3">

                                            <input name="email" class="form-control" id="inputEmail" type="email"
                                                placeholder="name@example.com" value="{{ old('email') }}" autofocus
                                                required />


                                            <label for="inputEmail">Email address</label>
                                        </div>


                                        <div class="form-floating mb-3">

                                            <input id="password" class="form-control" name="password" required
                                                autocomplete="current-password" type="password"
                                                placeholder="Password" />


                                            <label for="password">Password</label>
                                        </div>

                                        <div class="form-check mb-3">

                                            <input class="form-check-input" id="remember_me" name="remember"
                                                type="checkbox" />

                                            <label class="form-check-label" for="remember_me">Remember me</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                            @if (Route::has('password.request'))
                                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                href="{{ route('password.request') }}">
                                                {{ __('Forgot your password?') }}
                                            </a>
                                            @endif


                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
</body>

</html>