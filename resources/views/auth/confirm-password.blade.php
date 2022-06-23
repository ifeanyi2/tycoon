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
    <title>{{ config('app.name') }} :: Confirm Password</title>
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
                                    <div class="mb-4 text-sm text-center p-3 text-secondary">
                                        {{ __('This is a secure area of the application. Please confirm your password
                                        before continuing.') }}
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('password.confirm') }}">
                                        @csrf


                                        <div class="form-floating mb-3">

                                            <input id="password" class="form-control" name="password" required
                                                autocomplete="current-password" type="password"
                                                placeholder="Password" autofocus/>


                                            <label for="Password">Password</label>
                                        </div>

                                        
                                            <button type="submit" class="btn btn-primary">Confirm</button>
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