<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="../images/favicon.ico">
    <title>Interface Admin | Hydrocontest HEIG-VD</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{ url('back_office/plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="{{ url('back_office/plugins/node-waves/waves.css')}}" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="{{ url('back_office/plugins/animate-css/animate.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{url("back_office/css/style.css")}}" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin</a>
    </div>
    <div class="card">
        <div class="body">
            @if (session('error'))
                <div> ERREUR: mauvais mot de passe ou nom</div>
            @endif
            <form id="sign_in" method="POST" action="{{ action('AuthController@check') }}">
                <div class="msg">Connectez-vous pour accèder à l'interface d'administration</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Mot de pass" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">SE CONNECTER</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="{{url('back_office/plugins/jquery/jquery.min.js')}}"></script>

<!-- Bootstrap Core Js -->
<script src="{{url('back_office/plugins/bootstrap/js/bootstrap.js')}}"></script>

<!-- Waves Effect Plugin Js -->
<script src="{{url('back_office/plugins/node-waves/waves.js')}}"></script>

<!-- Validation Plugin Js -->
<script src="{{url('back_office/plugins/jquery-validation/jquery.validate.js')}}"></script>

<!-- Custom Js -->
<script src="{{url('back_office/js/admin.js')}}"></script>
<script src="{{url('back_office/js/pages/examples/sign-in.js')}}"></script>
</body>

</html>

