<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css" type="text/css">
    <script>
        var CURRENT_ED = {!!$current_ed !!};
    </script>

    <script src="js/packJs.php" charset="utf-8"></script>

</head>
<body>
<section id="home">
    <div class="home_menu home_menu_deroule">
        <div id="logo_equipe">
            <a href="">
                <img src="images/logo.svg" alt="logo de l'équipe">
            </a>
        </div>
        <div id="socials">

        </div>
        <div id="contact"> Contact</div>
    </div>


    <div class="home_presentation">
        <div class="home_team"> Team <br> Heig-Vd</div>
        <div class="home_participants"> Participants <br> au concours <br> Hydrocontest</div>
    </div>

    <div class="home_descConcours">
        <p>Le concours — II s’agit d’une des problématiques actuelles et communes liées au développement industriel et
        technologique de notre ère. Avec 90% des échanges commerciaux opérés par la mer,

        le transport maritime est un enjeu économique et environnemental majeur. En effet, si le bateau reste le moyen
        de transport le plus écologique, en matière d’emissions de CO2 par tonne transportée, il représente tout de même
        la 5ème source de pollution mondiale...
        </p>
        <p class="home_more"><a href="http://www.hydrocontest.org/fr/">+ En savoir plus</a></p>
    </div>

    <footer class="home_scroll">
        <div>Scroll</div>
        <div class="home_arrow"></div>
    </footer>

</section>
<section id="globalNews" class="container is-fluid">
</section>

<section id="timeline" class=""></div>

</section>
</body>
</html>
