$(function () {
    var MaRoute = new MainRouter;
    Backbone.history.start();


    // GESTION MENU HAMBURGER
    $("#popup").on("click", "nav.edition_menu",  function () {
        if($("body nav.edition_menu ul").hasClass('isHidden')) {
            $("body nav.edition_menu ul").removeClass('isHidden');
        }
        $("html").toggleClass("isNoScroll")
        $("body nav.edition_menu ul").toggleClass("isBlock")

        })


    /**
  //Article de Presse

  var testArticle = new ModelArticleDePresse({
    url: "Michelle",
    titreArticle: "Un bolomey dans l'espace",
    description: "coucou",
    date: new Date("2017-03-21"),
    nomPresse: "One FM"
  });

  testArticle.log();


  // RESEAU SOCIAL
  var testModelReseauSocial = new ModelReseauSocial({
    nom: "Face de bouk",
    url: "facebook.com"
  })


  testModelReseauSocial.isValid();
  console.log("Erreurs Social: " + testModelReseauSocial.validationError);
  testModelReseauSocial.log()
  $(".content").html(JST['reseauSocial'](testModelReseauSocial.toJSON()));

  //Prix
  var testPrix = new ModelPrix({
    nom: "Prix d'innovation Poney",
    description: "Ce prix récompense l'innovation en matière de Poney",
    montant: 200
  });
  testPrix.log();

// RESEAU SOCIAL
var testModelReseauSocial = new ModelReseauSocial({
    nom: "Face de bouk",
    url: "facebook.com"
})

testModelReseauSocial.isValid();
console.log("Erreurs Social: " + testModelReseauSocial.validationError);
testModelReseauSocial.log()
$(".content").html(JST['reseauSocial'](testModelReseauSocial.toJSON()));

// UTILISATEUR
var testModelUtilisateur = new ModelUtilisateur({
    nomComplet: "Léa Soukouti",
    adresseMail: "lea.soukout@gmail.com",
    motDePasse: "123456"
});

testModelUtilisateur.isValid();
console.log("Erreurs Utilisateur: " + testModelUtilisateur.validationError);
testModelUtilisateur.log()
$(".content").html(JST['utilisateur'](testModelUtilisateur.toJSON()));

//CATEGORIE SPONSOR
    var testCategorie = new ModelCategorieSponsor({
        nom:"Papier",
        description:"Papier"
    });
    testCategorie.log();
    testCategorie.isValid();
    console.log(testCategorie.validationError);

  // UTILISATEUR
  var testModelUtilisateur = new ModelUtilisateur({
    nomComplet: "Léa Soukouti",
    adresseMail: "lea.soukout@gmail.com",
    motDePasse: "123456"
  })

  testModelUtilisateur.isValid();
  console.log("Erreurs Utilisateur: " + testModelUtilisateur.validationError);
  testModelUtilisateur.log()
  $(".content").html(JST['utilisateur'](testModelUtilisateur.toJSON()));

    // GROUPE
    var testModelGroupe = new ModelGroupe({
        nom: "admin",
        description: "peut modifier tout ce qu'il veut"
    })

    testModelGroupe.isValid();
    console.log("Erreurs groupe: " + testModelGroupe.validationError);
    testModelGroupe.log()
    $(".content").html(JST['groupe'](testModelGroupe.toJSON()));

    // RESSOURCE
    var testModelResssource = new ModelRessource({
        nom: "Jean Jacques",
    })

    testModelResssource.isValid();
    console.log("Erreurs ressource: " + testModelGroupe.validationError);
    testModelResssource.log()
    $(".content").html(JST['ressource'](testModelResssource.toJSON()));


    // SPONSOR
    var testModelSponsor = new ModelSponsor({
        nom: "sponsor",
        urlLogo: "log.jpg",
        urlSponsor: "sponsor.com"
    })

    testModelSponsor.isValid();
    console.log("Erreurs sponsor: " + testModelSponsor.validationError);
    testModelSponsor.log()
    $(".content").html(JST['sponsor'](testModelSponsor.toJSON()));

    // EDITION
    var testModelEdition = new ModelEdition({
        annee: "2017",

    })

    testModelEdition.isValid();
    console.log("Erreurs sponsor: " + testModelEdition.validationError);
    testModelEdition.log()
    $(".content").html(JST['edition'](testModelEdition.toJSON()));


    // ACTUALITE
    var testModelActualite = new ModelActualite({
        titre: "titre de l'actu",
        auteur: "Jean Claude",
        datePublication: new Date(),
        contenu: "blablabla blablablblablablblablabl blablablblablabl blablabl blablabl blablabl blablabl blablabl blablabl blablabl blablabl blablabl "
    })
    var mesActualites= new ModelActualites({
        template: "actualites"
    });

    testModelActualite.isValid();
    console.log("Erreurs actualite: " + testModelActualite.validationError);
    testModelActualite.log()
    $(".content").html(JST['actualite'](testModelActualite.toJSON()));


// MEDIA
    var mesMedias= new ModelMedias([
        {
            url: "blap"
        },
        {
            url: "michel"
        },
        {
            url: "josé"
        }
    ]);
    $(".content").html(JST['medias']({medias:mesMedias.toJSON()}));

    var mesArticles = new ModelArticlesDePresse();
    mesArticles.fetch({
        success: function () {
            $("#timeline").html(JST['articlesPresse']({articlesPresse:mesArticles.toJSON()}));

        }
    })



    // MEMBRE
    var mesMembres = new ModelMembres();
    mesMembres.fetch({
        success: function () {
            $("#popup").html(JST['membres']({membres:mesMembres.toJSON()}));

        }

    });

     **/
    // // SPONSOR
    // var mesSponsors = new ModelSponsors();
    // mesSponsors.fetch({
    //     success: function () {
    //         $("#popup").html(JST['sponsors']({sponsors:mesSponsors.toJSON()}));
    //         $(".owl-carousel").owlCarousel();
    //
    //     }
    // });







































































































































































































































































































































































































/**



    var actualitesSite = new ModelActualites();
    actualitesSite.fetch({
        success: function(){
            $("#globalNews").html(JST['actualites']({actualites:actualitesSite.toJSON()}));
        }
    });
 **/











































































































































































//
// var mediasTests = new ModelMedias();
//     mediasTests.fetch({
//         success: function(){
//             $("#popup").html(JST['medias']({medias:mediasTests.toJSON()}));
//
//         }
//     });
//
//
//
//
//
//
//
//




































    //
    // var presseTests = new ModelArticlesDePresse();
    // presseTests.fetch({
    //     success: function(){
    //         $("#popup").html(JST['articlesPresse']({articlesPresse:presseTests.toJSON()}));
    //
    //         // Call Gridder
    //         $('.gridder').gridderExpander({
    //             scroll: true,
    //             scrollOffset: 30,
    //             scrollTo: "panel", // panel or listitem
    //             animationSpeed: 400,
    //             animationEasing: "easeInOutExpo",
    //             showNav: true, // Show Navigation
    //             nextText: "", // Next button text
    //             prevText: "", // Previous button text
    //             closeText: "", // Close button text
    //             onStart: function () {
    //                 //Gridder Inititialized
    //                 console.log('On Gridder Initialized...');
    //             },
    //             onContent: function () {
    //                 //Gridder Content Loaded
    //                 console.log('On Gridder Expand...');
    //             },
    //             onClosed: function () {
    //                 //Gridder Closed
    //                 console.log('On Gridder Closed...');
    //             }
    //         });
    //     }
    // });








    // var actuZoomTests = new ModelActualite();
    // actuZoomTests.fetch({
    //      success: function(){
    //          $("#popup").html(JST['actualite_zoom']({actualite:actuZoomTests.toJSON()}));
    //
    //      }
    //  });













});
