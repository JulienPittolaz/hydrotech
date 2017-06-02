$(function(){
  var test1 = new ModelTest({
    name: "Website",
    agency: "Hydrotech"
  });
    var testModelMembre = new ModelMembre({
        adresseMail: "lea.soukouti@gmail.com",
        nom: "Soukouti",
        prenom: "Léa",
        dateNaissance: "29.03.1994",
        section: "Media",
        description: "je suis trop belle",
        role: "admin",

    });
    testModelMembre.log()
  test1.log();
  $(".content").html(JST['test'](test1.toJSON()));
  $(".content").html(JST['membre'](testModelMembre.toJSON()));
});
