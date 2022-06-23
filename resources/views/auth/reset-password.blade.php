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
    <title>{{ config('app.name') }} :: Reset Password</title>
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
                                    <h3 class="text-center font-weight-light my-4">Reset Password</h3>
                                    <br>
                                    <x-jet-validation-errors class="mb-4 text-danger" />
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('password.update') }}">
                                        @csrf

                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                                        <div class="row mb-3">
                                            <div class="col-md-12">
                                                <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="email" type="text"
                                                       name="email" value="old('email', $request->email)" required autofocus />
                                                    <label for="email">Email</label>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input class="form-control" id="password" type="password"
                                                        name="password" placeholder="Create a password"
                                                        autocomplete="new-password" />

                                                    <label for="password">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">

                                                    <input name="password_confirmation" class="form-control"
                                                        id="password_confirmation" type="password"
                                                        placeholder="Confirm password" required
                                                        autocomplete="new-password" />

                                                    <label for="password_confirmation">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 mb-0">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
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