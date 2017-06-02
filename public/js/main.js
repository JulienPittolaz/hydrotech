$(function(){

    var testModelMembre = new ModelMembre({
        adresseMail: "lea.soukouti@gmail.com",
        nom: "Soukouti",
        prenom: "Léa",
        dateNaissance: "29.03.1994",
        section: "Media",
        description: "je suis trop belle",
        role: "admin",
        photoProfil:""

    });


    testModelMembre.log()
  $(".content").html(JST['membre'](testModelMembre.toJSON()));


    //Article de Presse

    var testArticle = new ModelArticleDePresse({
        url: "Michelle",
        titreArticle: "Un bolomey dans l'espace",
        url: "http://bliche.ch",
        description: "coucou",
        date: new Date("2017-03-21"),
        nomPresse: "One FM"
    });

    testArticle.log();

});
