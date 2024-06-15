<?php
use Carbon\Carbon;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ $site_settings->site_name ?? '' }} | {{ $title }}</title>

    <!-- Google Font: Source Sans Pro -->
    @foreach ($css as $path)
        <link rel="stylesheet" href="{{ config('site-specific.live-path') . $path }}">
    @endforeach
    <script>
        var token = "{{ csrf_token() }}";
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/logout" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                {{-- <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li> --}}

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" href="/mailbox" data-toggle="tooltip" data-placement="left" title="Mails">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge d-none" id="message_count">0</span>
                    </a>
                </li>
                <!-- Notifications Dropdown Menu -->
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#"
                        role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link">
                <img src="{{ getUploadImage( $site_settings->logo ?? '', 'site_assets' )}}" alt="Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">{{ $site_settings->site_name ?? '' }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ getAuthImage('user_image') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                           with font-awesome or any other icon font library -->
                        @foreach (getAllPermissions() as $group)
                            @if ($group['type'] == 'single')
                                @if (isPermissions($group['data'][0]['permission']))
                                    <li class="nav-item single">
                                        <a href="{{ route($group['data'][0]['permission']) }}" class="nav-link">
                                            <i class="{{ $group['icon'] }}"></i>
                                            <p class="text-capitalize">{{ $group['group'] }} </p>
                                        </a>
                                    </li>
                                @endif
                            @else
                                <?php $links = '';
                                foreach ($group['data'] as $item) {
                                    if ($item['show_in_sidebar'] && isPermissions($item['permission'])) {
                                        $links .=
                                            ' <li class="nav-item">
                                                                                                                                                                                                                                                                                                                                                                                                                            <a href="' .
                                            route($item['permission']) .
                                            '" class="nav-link">
                                                                                                                                                                                                                                                                                                                                                                                                                              <i class="far fa-circle nav-icon"></i>
                                                                                                                                                                                                                                                                                                                                                                                                                              <p class="text-capitalize">' .
                                            $item['title'] .
                                            '</p>
                                                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                                                          </li>';
                                    }
                                }
                                ?>
                                @if ($links != '')
                                    <li class="nav-item ">
                                        <a href="#" class="nav-link">
                                            <i class="{{ $group['icon'] }}"></i>
                                            <p class="text-capitalize">
                                                {{ $group['group'] }}
                                                <i class="right fas fa-angle-left"></i>
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <?php echo $links; ?>
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endforeach
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">{{ $title }}</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    @include($view)
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; {{ Carbon::now()->year }} <a href="https://idksolution.ooo.pe">IDK
                    solution</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    @foreach ($script as $path)
        <script src="{{ config('site-specific.live-path') . $path }}"></script>
    @endforeach

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script>
        $(function() {
            var url = window.location;
            $('.select2').select2();
            // for single sidebar menu
            $('ul.nav-sidebar li ul a').filter(function() {
                return this.href == url;
            }).find('i').addClass('fa-dot-circle');

            $('ul.nav-sidebar .single a').filter(function() {
                return this.href == url;
            }).addClass('active');

            // for sidebar menu and treeview
            $('ul.nav-treeview a').filter(function() {
                    return this.href == url;
                }).parentsUntil(".nav-sidebar > .nav-treeview")
                .css({
                    'display': 'block'
                })
                .addClass('menu-open').prev('a')
                .addClass('active');
        });
        $(document).ready(function() {
            navbarDetails();
            setInterval(navbarDetails, 60000);
        });

        function navbarDetails() {
            $.ajax({
                type: "GET",
                url: "/get-navbar-details",
                dataType: "json",
                success: function(response) {
                    if (response.success == true) {
                        if (response.data.unreaded_count > 0) {
                            $("#message_count").removeClass("d-none");
                            $("#message_count").html(response.data.unreaded_count);
                        } else {
                            $("#message_count").addClass("d-none");
                        }
                    }
                },
            });
        }
    </script>
    @if (session('temp-success'))
        <script>
            $(document).ready(function() {
                var successMessage = "{{ session('message') }}";

                if (successMessage) {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        icon: 'success',
                        title: successMessage
                    });
                }
            });
        </script>
    @endif

    @if (session('temp-error'))
        <script>
            $(document).ready(function() {
                var errorMessage = "{{ session('message') }}";

                if (errorMessage) {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });

                    Toast.fire({
                        icon: 'error',
                        title: errorMessage
                    });
                }
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            $(document).ready(function() {
                var successMessage = "{{ session('message') }}";

                if (successMessage) {
                    Swal.fire("Good Job !", successMessage, "success");
                }
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            $(document).ready(function() {
                var errorMessage = "{{ session('message') }}";
                var title = "{{ session('title') }}";

                if (!title) {
                    title = 'Oops!';
                }

                if (errorMessage) {
                    Swal.fire(title, errorMessage, "error");
                }
            });
        </script>
    @endif
    <script>
        function ajaxSwal(icon, msg) {
            Swal.fire({
                title: (icon === 'success') ? 'Success !' : 'Oops !',
                text: msg,
                icon: icon,
                confirmButtonText: "Ok",
            });
        }
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
            $('.dropify').dropify();
        })
    </script>
</body>

</html>
