$(function(){

    var testModelMembre = new ModelMembre({
        adresseMail: "lea.soukouti@gmail.com",
        nom: "Soukouti",
        prenom: "Léa",
        dateNaissance: "29/03/1994",
        section: "Media",
        description: "je suis trop belle",
        role: "admin",
        photoProfil:"moi.jpg"

    });

    console.log(testModelMembre.validationError);
    testModelMembre.log()
  $(".content").html(JST['membre'](testModelMembre.toJSON()));
// RESEAU SOCIAL
    var testModelReseauSocial = new ModelReseauSocial({
        nom : "Face de bouk",
        url: "facebook.com"
    })
    console.log("Erreurs: " + testModelReseauSocial.validationError);
    testModelReseauSocial.log()
    $(".content").html(JST['reseauSocial'](testModelReseauSocial.toJSON()));



//Prix
    var testPrix = new ModelPrix({
        nom: "Prix d'innovation Poney",
        description: "Ce prix récompense l'innovation en matière de Poney",
        montant: 200
    });
    testPrix.log();
    console.log(testPrix.isValid());


});





