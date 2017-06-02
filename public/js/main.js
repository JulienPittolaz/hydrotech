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
// RESEAU SOCIAL
    var testModelReseauSocial = new ModelReseauSocial({
        nom : "Face de bouk",
        url: "facebook.com"
    })
    console.log("Erreurs: " + testModelReseauSocial.validationError);
    testModelReseauSocial.log()
    $(".content").html(JST['reseauSocial'](testModelReseauSocial.toJSON()));
});
