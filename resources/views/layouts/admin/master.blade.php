<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/forms-material.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Feb 2019 15:49:23 GMT -->
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Title -->
    <title>Neptune</title>

     @yield('head_assets')

</head>
<body class="fixed-sidebar fixed-header content-appear skin-default">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader"></div>

    <!-- Sidebar -->
    <div class="site-overlay"></div>


     @include('sidebars.admin.left-sidebar')

     @include('sidebars.admin.header')

    <div class="site-content">
        <!-- Content -->
           @yield('content')
        <!-- Footer -->
           @include('sidebars.admin.footer')
    </div>

</div>

@yield('footer_assets')

</body>

<!-- Mirrored from big-bang-studio.com/neptune/neptune-default/forms-material.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Feb 2019 15:49:23 GMT -->
</html>