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
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

    <link rel="stylesheet" href="{{asset('admin/vendor/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/multi-select/css/multi-select.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css')}}">

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

    <script type="text/javascript" src="{{asset('admin/vendor/select2/dist/js/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/multi-select/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/bootstrap-maxlength/src/bootstrap-maxlength.js')}}"></script>

    <script type="text/javascript" src="{{asset('admin/vendor/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/clockpicker/dist/jquery-clockpicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- Neptune JS -->
    <script type="text/javascript" src="{{asset('admin/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/demo.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/forms-plugins.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/forms-pickers.js')}}"></script>
@endsection


@section('content')
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                <h5>Add User</h5>

                <form action="{{route('create_user')}}" method="POST" class="form-material" autocomplete="off">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Full Name">
                            @if($errors->has('name'))
                                <span class="error_tag">{{$errors->first('name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Email">
                            @if($errors->has('email'))
                                <span class="error_tag">{{$errors->first('email')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Password">
                            @if($errors->has('password'))
                                <span class="error_tag">{{$errors->first('password')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">Password Confirmation</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_confirmation" value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="Password Confirmation">
                            @if($errors->has('password_confirmation'))
                                <span class="error_tag">{{$errors->first('password_confirmation')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="father_name" class="col-sm-2 col-form-label">Father Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="father_name" name="father_name" value="{{old('father_name')}}" placeholder="Father Name">
                            @if($errors->has('father_name'))
                                <span class="error_tag">{{$errors->first('father_name')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-sm-2 col-form-label">Dob</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control mydatepicker" id="dob" value="{{old('dob')}}" name="dob" placeholder="mm/dd/yyyy">
                            @if($errors->has('dob'))
                                <span class="error_tag">{{$errors->first('dob')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="address" value="{{old('address')}}" name="address" placeholder="Address">
                            @if($errors->has('address'))
                                <span class="error_tag">{{$errors->first('address')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Select Role</label>
                        <div class="col-sm-10">
                           <select class="form-control" id="role" name="role">
                               @foreach($roles as $role_id=>$role_name)
                                     <option value="{{$role_id}}" {{old('role')==$role_id?'selected':''}} >{{$role_name}}</option>
                               @endforeach
                           </select>
                            @if($errors->has('role'))
                                <span class="error_tag">{{$errors->first('role')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" style="float: right">Create</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection