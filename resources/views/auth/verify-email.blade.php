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
    <title>{{ config('app.name') }} :: Verify Account</title>
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

                                <div class="mb-4 text-sm text-center text-secondary p-4">
                                    {{ __('Before continuing, could you verify your email address by clicking on the
                                    link we just emailed to you? If you didn\'t receive the email, we will gladly send
                                    you another.') }}
                                </div>

                                @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 text-success p-3 text-center">
                                    {{ __('A new verification link has been sent to the email address you provided in
                                    your profile settings.') }}
                                </div>
                                @endif

                                <div class="mt-4 flex items-center justify-between">
                                    <form method="POST" action="{{ route('verification.send') }}">
                                        @csrf

                                        <div class="text-center">
                                            <button class="btn btn-lg btn-secondary" type="submit">
                                                {{ __('Resend Verification Email') }}
                                            </button>
                                        </div>
                                    </form>

                                    <div class="m-5 text-center">
                                   
                                        <form method="POST" action="{{ route('logout') }}" class="inline">
                                            @csrf

                                            <button type="submit"
                                                class="btn btn-primary btn-lg">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </main>
        </div>
    </div>
</body>

</html>