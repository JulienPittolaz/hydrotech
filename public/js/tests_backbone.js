$(function(){
  var test1 = new ModelTest({
    name: "Website",
    agency: "Hydrotech"
  });
  test1.log();
  $(".content").html(JST['test'](test1.toJSON()));
});
