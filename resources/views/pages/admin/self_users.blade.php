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
    <link rel="stylesheet" href="{{asset('admin/vendor/DataTables/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/DataTables/Responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/DataTables/Buttons/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/vendor/DataTables/Buttons/css/buttons.bootstrap4.min.css')}}">

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
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/js/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/Responsive/js/dataTables.responsive.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/Buttons/js/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/Buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/JSZip/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/pdfmake/build/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/pdfmake/build/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/Buttons/js/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/Buttons/js/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/vendor/DataTables/Buttons/js/buttons.colVis.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('admin/js/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/demo.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/js/tables-datatable.js')}}"></script>


@endsection


@section('content')
    <div class="content-area py-1">
        <div class="container-fluid">
            <div class="box box-block bg-white">
                <h5 class="mb-1">Users created by {{\App\Models\User::find(request('id'))->name}}</h5>

                <div style="min-height: 33px">
                    <a href="{{route('get_create_user')}}" class="btn btn-success" style="float: right;color: white">Add</a>
                </div>

                <div class="overflow-x-auto">

                    <table class="table table-hover my-table">
                        <thead>
                        <tr>
                            <form action="{{route('self_users',request('id'))}}" method="GET">
                                @csrf
                                <th>#</th>
                                <th>
                                    Name
                                    <br>
                                    <input type="text" placeholder="Name" name="name">
                                </th>
                                <th>
                                    Email
                                    <br>
                                    <input type="text" placeholder="Email" name="email">
                                </th>
                                <th>
                                    Role
                                    <br>
                                    <input type="text" placeholder="Role" name="role">
                                </th>
                                <th>
                                    Father Name
                                    <br>
                                    <input type="text" placeholder="Father Name" name="father_name">
                                </th>
                                <th>
                                    Dob
                                    <br>
                                    <input type="text" placeholder="Dob" name="dob">
                                </th>
                                <th>
                                    Address
                                    <br>
                                    <input type=`"text" placeholder="Address" name="address">
                                </th>
                                <th>
                                    Created At
                                    <br>
                                    <input type="text" placeholder="Created At" name="created_at">
                                </th>
                                <th>
                                    Updated At
                                    <br>
                                    <input type="text" placeholder="Updated At" name="updated_at">
                                </th>
                                <th>
                                    <input type="submit" value="Search">
                                </th>
                            </form>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($self_users as $user)
                            <tr>
                                <td>{{$user->user_id}}</td>
                                <td>
                                    <a href="{{route('self_users',$user->user_id)}}">
                                        {{$user->full_name}}
                                    </a>
                                </td>
                                <td> {{$user->email}}</td>
                                <td>{{$user->role_name}}</td>
                                <td>{{$user->father_name}}</td>
                                <td>{{$user->dob}}</td>
                                <td>{{$user->address}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <td>

                                    <a href="{{route('edit_user',$user->user_id)}}" class="btn btn-success" ><i class="ti-pencil-alt"></i></a>


                                    <a href="{{route('status_user',[$user->user_id,$user->status])}}" class="btn btn-{{$user->status==0?'success':'danger'}}" >
                                        @if($user->status==0)
                                            Activate
                                        @else
                                            Deactivate
                                        @endif
                                    </a>

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>


                    <br>


                    @if($self_users->total()==0)
                        <h6 style="color: red;font-family: Roboto;font-weight: bold;text-align: center"> Axtarış üzrə heç bir nəticə tapılmadı !</h6>
                    @else
                        <div>
                            <span>{{$self_users->total()}} məlumatdan {{$self_users->firstItem()}} - {{$self_users->lastItem()}} aralığı .</span>
                        </div>
                        <div style="float: right">
                            {{$self_users->links()}}
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </div>
@endsection