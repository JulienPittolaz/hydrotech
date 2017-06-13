<!DOCTYPE html>
<html>

<head>
    <base href="@php
        echo public_path();
    @endphp/" target="_parent">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{url("back_office/plugins/bootstrap/css/bootstrap.css")}}" rel="stylesheet">
    <!-- Dropzone Css -->
    <link href="{{url("back_office/plugins/dropzone/dropzone.css")}}" rel="stylesheet">
    <!-- Animation Css -->
    <link href="{{url("back_office/plugins/animate-css/animate.css")}}" rel="stylesheet" />

    <link href="{{url("back_office/plugins/multi-select/css/multi-select.css")}}" rel="stylesheet">
    <!-- Colorpicker Css -->
    <link href="{{url("back_office/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css")}}" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="{{url("back_office/plugins/node-waves/waves.css")}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{url("back_office/plugins/animate-css/animate.css")}}" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="{{url("back_office/plugins/morrisjs/morris.css")}}" rel="stylesheet" />
    <link href="{{url("back_office/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css")}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url("back_office/css/style.css")}}" rel="stylesheet">
    <link href="{{url("back_office/css/custom.css")}}" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{url("back_office/css/themes/all-themes.css")}}" rel="stylesheet" />
</head>

<body class="theme-blue">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="preloader">
            <div class="spinner-layer pl-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
        <p>Please wait...</p>
    </div>
</div>
<!-- #END# Page Loader -->
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<!-- #END# Overlay For Sidebars -->
<!-- Search Bar -->
<div class="search-bar">
    <div class="search-icon">
        <i class="material-icons">search</i>
    </div>
    <input type="text" placeholder="START TYPING...">
    <div class="close-search">
        <i class="material-icons">close</i>
    </div>
</div>
<!-- #END# Search Bar -->
<!-- Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" target="_parent" href="{{ url('/admin/prix') }}">HYDRO.HEIG-VD.CH</a>
        </div>
    </div>
</nav>
<!-- #Top Bar -->
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="active">
                    <a href="{{url('/admin/edition')}}">
                        <i class="material-icons">dashboard</i>
                        <span>Edition</span>
                    </a>
                </li>
                <li>
                    <a  target="_parent" href="{{url('/admin/prix')}}">
                        <i class="material-icons">grade</i>
                        <span>Prix</span>
                    </a>
                </li>
                <li>
                    <a  target="_parent" href="{{url('/admin/actualite')}}">
                        <i class="material-icons">import_contacts</i>
                        <span>Actualités</span>
                    </a>
                </li>
                <li>
                    <a  target="_parent" href="{{url('/admin/media')}}">
                        <i class="material-icons">collections</i>
                        <span>Médias</span>
                    </a>
                </li>
                <li>
                    <a  target="_parent" href="{{url('/admin/categorie')}}">
                        <i class="material-icons">clear_all</i>
                        <span>Catégories de sponsors</span>
                    </a>
                </li>
                <li>
                    <a  target="_parent" href="{{url('/admin/sponsor')}}">
                        <i class="material-icons">monetization_on</i>
                        <span>Sponsors</span>
                    </a>
                </li>
                <li>
                    <a  target="_parent" href="{{url('/admin/membre')}}">
                        <i class="material-icons">people</i>
                        <span>Membres</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">link</i>
                        <span>Associations</span>
                    </a>
                    <ul class="ml-menu">
                        <li>
                            <a href="{{url('admin/associationedition/media')}}">Medias</a>
                        </li>
                        <li>
                            <a href="{{url('admin/associationedition/presse')}}">Articles de presse</a>
                        </li>
                        <li>
                            <a href="{{url('admin/associationedition/membre')}}">Membres</a>
                        </li>
                        <li>
                            <a href="{{url('admin/associationedition/actualite')}}">Actualites</a>
                        </li>
                        <li>
                            <a href="{{url('admin/associationedition/prix')}}">Prix</a>
                        </li>
                        <li>
                            <a href="{{url('admin/associationsponsor')}}">Sponsors</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a  target="_parent" href="{{url('/admin/press')}}">
                        <i class="material-icons">event_note</i>
                        <span>Articles de presse</span>
                    </a>
                </li>
                <li>
                    <a  target="_parent" href="{{url('/admin/social')}}">
                        <i class="material-icons">share</i>
                        <span>Réseaux sociaux</span>
                    </a>
                </li>
                <li>
                    <a  target="_parent" href="{{url('/admin/user')}}">
                        <i class="material-icons">person</i>
                        <span>Utilisateurs</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>
    </section>
    <!-- Jquery Core Js -->
    <script src="{{url("back_office/plugins/jquery/jquery.min.js")}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{url("back_office/plugins/bootstrap/js/bootstrap.js")}}"></script>

    <!-- Select Plugin Js -->
    <script src="{{url("back_office/plugins/bootstrap-select/js/bootstrap-select.js")}}"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="{{url("back_office/plugins/jquery-slimscroll/jquery.slimscroll.js")}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{url("back_office/plugins/node-waves/waves.js")}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{url("back_office/plugins/jquery-countto/jquery.countTo.js")}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{url("back_office/plugins/raphael/raphael.min.js")}}"></script>
    <script src="{{url("back_office/plugins/morrisjs/morris.js")}}"></script>

    <!-- ChartJs -->
    <script src="{{url("back_office/plugins/chartjs/Chart.bundle.js")}}"></script>

<!-- Bootstrap Colorpicker Js -->
<script src="{{url("back_office/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js")}}"></script>

    <!-- DropzoneJs -->
    <script src="{{url("back_office/plugins/dropzone/dropzone.js")}}"></script>

<!-- Input Mask Plugin Js -->
<script src="{{url("back_office/plugins/jquery-inputmask/jquery.inputmask.bundle.js")}}"></script>

<!-- Multi Select Plugin Js -->
<script src="{{url("back_office/plugins/multi-select/js/jquery.multi-select.js")}}"></script>

<!-- noUISlider Plugin Js -->
<script src="{{url("back_office/plugins/nouislider/nouislider.js")}}"></script>

    <!-- Flot Charts Plugin Js -->
    <!-- Flot Charts Plugin Js -->
    <script src="{{url("back_office/plugins/flot-charts/jquery.flot.js")}}"></script>
    <script src="{{url("back_office/plugins/flot-charts/jquery.flot.resize.js")}}"></script>
    <script src="{{url("back_office/plugins/flot-charts/jquery.flot.pie.js")}}"></script>
    <script src="{{url("back_office/plugins/flot-charts/jquery.flot.categories.js")}}"></script>
    <script src="{{url("back_office/plugins/flot-charts/jquery.flot.time.js")}}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{url("back_office/plugins/jquery-sparkline/jquery.sparkline.js")}}"></script>
    <script src="{{url("back_office/plugins/jquery-sparkline/jquery.sparkline.js")}}"></script>


    <script src="{{url("back_office/plugins/jquery-datatable/jquery.dataTables.js")}}"></script>
    <script src="{{url("back_office/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js")}}"></script>
    <script src="{{url("back_office/plugins/autosize/autosize.js")}}"></script>
    <script src="{{url("back_office/plugins/jquery-validation/jquery.validate.js")}}"></script>


    <script src="{{url("back_office/js/cropit.js")}}"></script>

<!-- Autosize Plugin Js -->
<script src="{{url("back_office/plugins/autosize/autosize.js")}}"></script>
<!-- Moment Plugin Js -->
<script src="{{url("back_office/plugins/momentjs/moment.js")}}"></script>
<script src="{{url("back_office/plugins/multi-select/js/jquery.multi-select.js")}}"></script>
<!-- Bootstrap Material Datetime Picker Plugin Js -->
<script src="{{url("back_office/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js")}}"></script>
<!-- Custom Js -->
<script src="{{url("back_office/js/admin.js")}}"></script>
<script src="{{url("back_office/js/pages/forms/basic-form-elements.js")}}"></script>

    <!-- Demo Js -->
    <script src="{{url("back_office/js/demo.js")}}"></script>
    <script src="{{url("back_office/js/script.js")}}"></script>
</body>
</html>