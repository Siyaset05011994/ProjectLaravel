@extends('layouts.admin.master')

@section('head_assets')
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap4/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/animate.css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/jscrollpane/jquery.jscrollpane.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/waves/waves.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/switchery/dist/switchery.min.css')}}">

    <!-- Neptune CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/core.css')}}">

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
@endsection


@section('footer_assets')

    <!-- Vendor JS -->
    <script type="text/javascript" src="{{asset('admin/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/tether/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/bootstrap4/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/detectmobilebrowser/detectmobilebrowser.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/jscrollpane/jquery.mousewheel.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/jscrollpane/mwheelIntent.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/jscrollpane/jquery.jscrollpane.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/waves/waves.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/switchery/dist/switchery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/demo.js')}}"></script>


@endsection

@section('content')
    <div class="content-area py-1">
        <div class="container-fluid">
            <h4>Material Form</h4>
            <ol class="breadcrumb no-bg mb-1">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active">Material Form</li>
            </ol>
            <div class="box box-block bg-white">
                <h5>Material Form</h5>
                <p class="font-90 text-muted mb-1">Just add the <code>.form-material</code> class to the form.</p>
                <form class="form-material">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box box-block bg-white">
                <h5>Colors</h5>
                <p class="font-90 text-muted mb-1">To use, add <code>.material-*</code> to the form.</p>
                <form class="form-material material-primary">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Primary</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Primary">
                        </div>
                    </div>
                </form>
                <form class="form-material material-info">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Info</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Info">
                        </div>
                    </div>
                </form>
                <form class="form-material material-success">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Success</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Success">
                        </div>
                    </div>
                </form>
                <form class="form-material material-warning">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Warning</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Warning">
                        </div>
                    </div>
                </form>
                <form class="form-material material-danger">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Danger</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Danger">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection