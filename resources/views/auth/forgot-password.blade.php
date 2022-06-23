@php
$setting = DB::table('settings')->select('about', 'logo')->first();
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
    <title>{{ config('app.name') }} :: Forgot Password</title>
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
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <div class="mb-4 p-3 text-center text-sm text-secondary">
                                        {{ __('Forgot your password? No problem. Just let us know your email address and
                                        we will email you a password reset link that will allow you to choose a new
                                        one.') }}
                                    </div>
                                    @if (session('status'))
                                    <div class="mb-4 text-center text-sm text-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                    <h3 class="text-center font-weight-light my-4">Forgot Password</h3>
                                    <br>
                                    <x-jet-validation-errors class="mb-4 text-danger" />
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf

                                        <div class="form-floating mb-3">

                                            <input class="form-control" id="email" name="email" type="email"
                                                placeholder="name@example.com" autocomplete="email" required
                                                value="{{ old('email') }}" />

                                            <label for="email">Email address</label>
                                        </div>

                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-block">
                                                    {{ __('Email Password Reset Link') }}

                                                </button>
                                            </div>
                                        </div>
                                    </form>
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