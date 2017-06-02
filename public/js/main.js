$(function(){
    // MEMBRE
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
    testModelMembre.isValid();
    console.log("Erreurs Membre: " + testModelMembre.validationError);
    testModelMembre.log()
    $(".content").html(JST['membre'](testModelMembre.toJSON()));

    // RESEAU SOCIAL
    var testModelReseauSocial = new ModelReseauSocial({
        nom : "Face de bouk",
        url: "facebook.com"
    })

    testModelReseauSocial.isValid();
    console.log("Erreurs ReseauSocial: " + testModelReseauSocial.validationError);
    testModelReseauSocial.log()
    $(".content").html(JST['reseauSocial'](testModelReseauSocial.toJSON()));

    // UTILISATEUR
    var testModelUtilisateur = new ModelUtilisateur({
        nomComplet : "Léa Soukouti",
        adresseMail: "lea.soukout@gmail.com",
        motDePasse: "123456"
    })

    testModelUtilisateur.isValid();
    console.log("Erreurs Utilisateur: " + testModelUtilisateur.validationError);
    testModelUtilisateur.log()
    $(".content").html(JST['utilisateur'](testModelUtilisateur.toJSON()));
});
