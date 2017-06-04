$(function () {
    // MEMBRE
    var testModelMembre = new ModelMembre({
        adresseMail: "lea.soukouti@gmail.com",
        nom: "Soukouti",
        prenom: "Léa",
        dateNaissance: "29/03/1994",
        section: "Media",
        description: "je suis trop belle",
        role: "admin",
        photoProfil: "moi.jpg"

    });
    testModelMembre.isValid();
    console.log("Erreurs Membre: " + testModelMembre.validationError);
    testModelMembre.log()


    $(".content").html(JST['membre'](testModelMembre.toJSON()));

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

    // ACTUALITE
    var testModelActualite = new ModelActualite({
        titre: "test",
        datePublication: new Date(),
        dateModification: new Date()
    })

    testModelActualite.isValid();
    console.log("Erreurs actualite: " + testModelActualite.validationError);
    testModelActualite.log()
    $(".content").html(JST['actualite'](testModelActualite.toJSON()));

// MEDIA
    var testModelMedia = new ModelMedia({
        url: "test",
        titre: "ma photo"
    })

    testModelMedia.isValid();
    console.log("Erreurs media: " + testModelMedia.validationError);
    testModelMedia.log()
    $(".content").html(JST['media'](testModelMedia.toJSON()));

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
        annee: 2016,
        nomEquipe: "Tests",
        urlImageMedia: "bla",
        urlImageEquipe: "bla2",
        lieu: "Cossonay",
        dateDebut: new Date("2017-09-30"),
        dateFin: new Date("2017-09-31"),
        description: "This is a test",
        publie: true

    })

    testModelEdition.isValid();
    console.log("Erreurs Edition: " + testModelEdition.validationError);
    testModelEdition.log()
    $(".content").html(JST['edition'](testModelEdition.toJSON()));
});