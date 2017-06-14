<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <title>Hydrocontest - HEIG-VD</title>

    <!-- Styles -->
    <link rel="stylesheet" href="css/app.css" type="text/css">
    <script>
        var CURRENT_ED = {!!$current_ed !!};
    </script>

    <script src="js/packJs.php" charset="utf-8"></script>

    <script>
        $(function(){
            initCountdown();
            manageLatestActus();
        });
    </script>
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
        <div id="contact"><a href="/#/contact">Contact</a></div>
    </div>

    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="columns home_presentation">
                    <div class="column is-2 home_participants"> Participant <br> au concours <br> Hydrocontest</div>
                    <div class="column is-10">
                        <span class="home_team">Team <br> Heig-Vd<br></span>
                        <span class="home_sponsors">Yverdon-les-Bains Energies</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="column is-4 is-offset-8">
                <div class="home_englobe">
                    <div id="defaultCountdown"></div>
                    <div class="home_descConcours">
                        <p> <span class="concours"> Le concours </span> <br> L’HydroContest est l’événement phare
                            de la Fondation Hydros ; il est le premier
                            <b> concours étudiant international </b> dédié
                            à l’efficience énergétique nautique et
                            maritime.
                            Des étudiants du monde entier doivent concevoir, <b> fabriquer et piloter le
                                bateau le plus rapide et le moins gourmand
                                en matière d’énergie </b>.
                            La Fondation fournit à chaque équipe un moteur électrique et une batterie identiques. Les navires concourent dans 2 catégories distinctes: celle du <b>Transport de Masse</b>, qui simule le déplacement d'un cargo avec une charge de 200kg et celle des <b>Transports Légers</b>,
                            qui représente le transport de personnes sur un bateau de plaisance (embarcation personnelle) avec seulement 20kg à bord. Une 3ème course, la <b> « Long Distance Race » </b>, attribuera la victoire au navire (léger) ayant parcouru la plus longue distance pendant deux heures de navigation.
                        </p>
                        <p class="home_more"><a target="_blank" href="http://www.hydrocontest.org/fr/">+ En savoir plus</a></p>
                    </div>
                </div>
            </div>
        </div>
        <footer class="home_scroll">
            <div>Scroll</div>
            <div class="home_arrow"></div>
        </footer>
    </div>

</section>
<section id="globalNews" class="container is-fluid">
</section>
<section id="timeline" class="">
</section>
<section id="popup" class="container is-fluid">
    <div class="popup_content"></div>
</section>
</body>
</html>
