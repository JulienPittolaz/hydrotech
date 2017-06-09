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
        <div id="socialNetworks">
            <ul>
                <li class="facebook"></li>
                <li class="instagram"></li>
                <li class="youtube"></li>
            </ul>
        </div>
        <div id="contact"> Contact</div>
    </div>
    <div class="home_presentation">
        <div class="home_team"> Team <br> Heig-Vd</div>
        <div class="home_participants"> Participants <br> au concours <br> Hydrocontest</div>

    </div>

    <div class="home_descConcours">
        Le concours — II s’agit d’une des problématiques actuelles et communes liées au développement industriel et
        technologique de notre ère. Avec 90% des échanges commerciaux opérés par la mer,

        le transport maritime est un enjeu économique et environnemental majeur. En effet, si le bateau reste le moyen
        de transport le plus écologique, en matière d’emissions de CO2 par tonne transportée, il représente tout de même
        la 5ème source de pollution mondiale..


    </div>

    <footer class="home_scroll">
        <div>Scroll</div>
        <div class="home_arrow"></div>
    </footer>

</section>
<section id="globalNews" class="container is-fluid">
</section>
<section id="timeline" class="container is-fluid">

<h1>TIMELINE PROVISOIRE SUSU</h1>
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
    <div class="popup_cross"><a href="/#timeline">X</a></div>
    <div class="popup_content">

    </div>
</section>

{{--<section class="formulaire">
{{--

<!--

<section class="formulaire">

    <div class="formulaireContact ">
        <div class="container">
            <h1>Bonjour, <br> peut-on vous aider?</h1>

            <div class=" formulaire_choix">
                <div class="button is-large is-primary is-outlined">Je veux soutenir</div>

                <div class="button is-large is-primary is-outlined">J'ai une question</div>

                <div class="button is-large is-primary is-outlined">Je veux m'inscrire</div>

                <div class="reponseD">
                    <div class="button is-large is-primary is-outlined">La réponse D?</div>
                </div>
            </div>
        </div>
    </div>
    <div class="formulaireContactSuite">


        <div class="container">
            <h1>Titre dynamique yo!</h1>
            <div class="form1 ">
                <div class="columns">

                    <div class="field column is-half
">
                        <p class="control">
                            <input class="input is-medium" type="text" placeholder="*Nom">
                        </p>
                    </div>
                    <div class="field column is-half
">
                        <p class="control">
                            <input class="input is-medium" type="text" placeholder="*Prénom">
                        </p>
                    </div>
                </div>
            </div>
            <div class="columns">

                <div class="field column is-half
">
                    <p class="control">
                        <input class="input is-medium" type="text" placeholder="Entreprise">
                    </p>
                </div>

                <div class="field column is-half
">
                    <p class="control">
                        <input class="input is-medium" type="email" placeholder="*Email">
                    </p>
                </div>
            </div>

            <div class="form2">
                <div class="field">
                    <p class="control">
                        <input class="input is-medium" type="text" placeholder="*Objet">
                    </p>
                </div>

                <div class="field">
                    <p class="control">
                        <textarea class="textarea is-medium" placeholder="*Message"></textarea>
                    </p>
                </div>
            </div>
            <a class="button is-medium is-primary is-outlined">Envoyer!</a>

        </div>

    </div>

    </div>

</section>--}}
</body>
</html>
