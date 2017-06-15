<html>
<head></head>
<body>
<div><strong>De : </strong>{{$first_name}} {{$name}}</div>
<div><strong>Email : </strong>{{$email}}</div>
<div><strong>Entreprise : </strong>{{$entreprise or 'pas d\'entreprise spécifiée'}}</div>
<div><strong>Objet : </strong>Hydrocontest {{$topic}} : {{$subject}}</div>
<hr>
<p>{{$email_corps}}</p>
<br>
<p><em>Ce message a été envoyé à l'aide du formulaire de contact hydro.heig-vd.ch</em></p>
</body>
</html>