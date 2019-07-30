<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Feb 2019 15:49:55 GMT -->
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title>Neptune</title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">

    <!-- Neptune CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/core.css')}}">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="img-cover" style="background-image: url({{asset('admin/img/photos-1/2.jpg')}}">

<div class="container-fluid">
    <div class="sign-form">
        <div class="row">
            <div class="col-md-4 offset-md-4 px-3">
                <div class="box b-a-0">
                    <div class="p-2 text-xs-center">
                        <h5>Welcome</h5>
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="form-material mb-1">
                        @csrf
                        <div class="form-group">

                            <input id="exampleInputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group">

                            <input id="exampleInputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="px-2 form-group mb-0">
                            <button type="submit" class="btn btn-purple btn-block text-uppercase">Sign in</button>
                        </div>
                    </form>
{{--                    <div class="px-2">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-xs-6">--}}
{{--                                <button type="button" class="btn bg-facebook btn-block label-left mb-0-25">--}}
{{--                                    <span class="btn-label"><i class="ti-facebook"></i></span>--}}
{{--                                    Facebook--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                            <div class="col-xs-6">--}}
{{--                                <button type="button" class="btn bg-googleplus btn-block label-left mb-0-25">--}}
{{--                                    <span class="btn-label"><i class="ti-google"></i></span>--}}
{{--                                    Google+--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="p-2 text-xs-center text-muted">
{{--                        Don't have an account? <a class="text-black" href="#"><span class="underline">Sign up</span></a>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vendor JS -->
<script type="text/javascript" src="{{asset('admin/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendor/tether/js/tether.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/vendor/bootstrap4/js/bootstrap.min.js')}}"></script>
</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/pages-sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Feb 2019 15:49:55 GMT -->
</html>