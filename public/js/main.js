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
        titreArticle: "Un bolomey dans l'espace"
    });

    testArticle.log();
    console.log(testArticle.isValid());
    testArticle.set("url",123);
    testArticle.log();
    console.log(testArticle.isValid());
    testArticle.set("titreArticle","2"+123);
    testArticle.set({
        url: "http://bliche.ch",
        description: "coucou",
        date: new Date("2017-03-21"),
        nomPresse: ""
    });
    testArticle.log();
    console.log(testArticle.isValid());
    console.log(testArticle.validationError);
    console.log(testArticle.attributes.date);

});
