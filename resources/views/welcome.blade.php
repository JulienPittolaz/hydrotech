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
    <script>
        $(function(){
            var austDay = new Date();
            austDay = new Date(CURRENT_ED.dateDebut);
            $('#defaultCountdown').countdown({until: austDay});
            $('#year').text(austDay.getFullYear());

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


    <div class="home_presentation">
        <div class="home_team"> Team <br> Heig-Vd</div>
        <div class="home_participants"> Participants <br> au concours <br> Hydrocontest</div>
        <div id="defaultCountdown"></div>
    </div>

    <div class="home_descConcours">
        <p> <span class="concours"> Le concours </span> <br> L’HydroContest est l’événement phare
            de la Fondation Hydros ; il est le premier
            concours étudiant international dédié
            à l’efficience énergétique nautique et
            maritime.
            Ce concours permet de sensibiliser,
            et développer de nouvelles idées en
            rassemblant les futurs ingénieurs
            du monde entier autour de cette
            problématique d’actualité. Ces étudiants
            doivent concevoir, fabriquer et piloter le
            bateau le plus rapide et le moins gourmand
            en matière d’énergie.
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
<section id="timeline" class="container is-fluid">

    <ul>
        <li><a href="#/editions/2016/membres">Équipe</a></li>
        <li><a href="#/editions/2016/membres">Équipe</a></li>
        <li><a href="#/editions/2016/membres">Équipe</a></li>
        <li><a href="#/editions/2016/membres">Équipe</a></li>
        <li><a href="#/editions/2016/membres">Équipe</a></li>
        <li><a href="#/editions/2016/membres">Équipe</a></li>
        <li><a href="#/editions/2016/membres">Équipe</a></li>
        <li><a href="#/editions/2016/membres">Équipe</a></li>
        <li><a href="#/editions/2016/membres">Équipe</a></li>
    </ul>
    <ul>
        <li><a href="#/editions/2017/membres">Équipe</a></li>
    </ul>
</section>
<section id="popup" class="container is-fluid">

    <div class="popup_content">

    </div>
</section>
</body>
</html>
