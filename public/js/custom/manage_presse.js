/**
 * Created by timdlp on 11.06.17.
 */
function managePresse(){
    // Call Gridder
    $('.gridder').gridderExpander({
        scroll: true,
        scrollOffset: 30,
        scrollTo: "panel", // panel or listitem
        animationSpeed: 400,
        animationEasing: "easeInOutExpo",
        closeText: "", // Close button text
        onStart: function () {
            //Gridder Inititialized
            console.log("loaded");
        },
        onContent: function () {
            //Gridder Content Loaded

            console.log('On Gridder Expand...');
        },
        onClosed: function () {
            //Gridder Closed
            console.log('On Gridder Closed...');
        }
    },function () {
        $('#popup > div > div.container > div > ul > li:nth-child(1)').trigger('click');
    });
}