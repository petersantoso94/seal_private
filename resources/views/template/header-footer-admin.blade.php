
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Seal - COS</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('public/jquery.dataTables.css')}}">
        <link href="{{ URL::asset('public/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!--<link href="{{ URL::asset('public/bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">-->

        <link rel="stylesheet" href="{{URL::asset('public/css/chosen.css')}}">
        <link href="{{ URL::asset('public/bower_components/Ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/dist/css/AdminLTE.min.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('public/dist/css/skins/skin-blue.min.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{URL::asset('public/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>.cke{visibility:hidden;}</style><script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/config.js?t=HBDF"></script>
        <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/skins/moono-lisa/editor.css?t=HBDF">
        <script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/lang/en.js?t=HBDF"></script>
        <script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/styles.js?t=HBDF"></script>
        <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/plugins/scayt/skins/moono-lisa/scayt.css">
        <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/plugins/scayt/dialogs/dialog.css">
        <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/plugins/tableselection/styles/tableselection.css">
        <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/plugins/wsc/skins/moono-lisa/wsc.css">
        <script type="text/javascript" src="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/plugins/image/dialogs/image.js?t=HBDF"></script>
        <link rel="stylesheet" type="text/css" href="https://adminlte.io/themes/AdminLTE/bower_components/ckeditor/skins/moono-lisa/dialog.css?t=HBDF">
    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="{{url::route('loginadmin')}}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">COS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">Seal-COS</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">{{Session::get('admin')}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->

                                    <!-- Menu Body -->

                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="{{url::route('logoutadmin')}}" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">Admin Panel</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li <?php if (isset($page)) if ($page === 'Approve User') echo 'class="active"'; ?>><a href="{{url('loginadmin')}}"><i class="fa fa-link"></i> <span>Approve User</span></a></li>
                        @if(Session::get('role') == 0)
                        <li <?php if (isset($page)) if ($page === 'Add Admin') echo 'class="active"'; ?>><a href="{{url('addadmin')}}"><i class="fa fa-link"></i> <span>Add Admin</span></a></li>
                        @endif
                        <li <?php if (isset($page)) if ($page === 'Send Cash') echo 'class="active"'; ?>><a href="{{url('sendcash')}}"><i class="fa fa-link"></i> <span>Send Cash</span></a></li>
                        <li <?php if (isset($page)) if ($page === 'Edit Character') echo 'class="active"'; ?>><a href="{{url('editcharacter')}}"><i class="fa fa-link"></i> <span>Edit Character</span></a></li>
                        <li <?php if (isset($page)) if ($page === 'Edit Front Page') echo 'class="active"'; ?>><a href="{{url('editpage')}}"><i class="fa fa-link"></i> <span>Edit Front Page</span></a></li>
                        <li <?php if (isset($page)) if ($page === 'Edit Fan Art') echo 'class="active"'; ?>><a href="{{url('editfanart')}}"><i class="fa fa-link"></i> <span>Edit Fan Art</span></a></li>
                        <li <?php if (isset($page)) if ($page === 'Edit News') echo 'class="active"'; ?>><a href="{{url('editnews')}}"><i class="fa fa-link"></i> <span>Edit News</span></a></li>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        @if(isset($page))
                        {{$page}}
                        @endif
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content container-fluid"                                                         >
                    @yield('main-section')
                    <!---------------                                                         -----------
                    | Your Page Conte                                                         nt Here |
                    -------------------------->

                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the                                                                          right -->
                <div class="pull-right hidden-xs">
                    Anything you want
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#cont                                                                                                                                                                                                   rol-sidebar-settings-tab" data-toggle="tab"><i                                                                                                                                                                                                   class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane active" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Recent Activity</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:;">
                                    <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                        <p>Will be 23 on April 24th</p>
                                        <                                                                                                                                                                                                        /div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:;">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="pull-right-container">
                                            <span class="label label-danger pull-right">70%</span>
                                        </span>
                                    </h4>

                                    <div c                                                                                                                                                                                                        lass="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label                                                                                                                                                                                                        >

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately                                                                                                                                                                                                         after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <script src="{{ URL::asset('public/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ URL::asset('public/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('public/dist/js/adminlte.min.js') }}"></script>
        <script type="text/javascript" src="{{URL::asset('public/js/chosen.jquery.min.js')}}"></script>

        <script type="text/javascript" src="{{URL::asset('public/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('public/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
        <script src="{{URL::asset('public/bower_components/ckeditor/ckeditor.js')}}"></script>
        <script src="{{URL::asset('public/dist/js/demo.js')}}"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
        Both of these plugins are recommended to enhance the
        user experience. -->
        @yield('js-content')
    </body>
</html>