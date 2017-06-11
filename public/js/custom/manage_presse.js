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
        showNav: false, // Show Navigation
        nextText: "", // Next button text
        prevText: "", // Previous button text
        closeText: "", // Close button text
        onStart: function () {
            //Gridder Inititialized
            console.log('On Gridder Initialized...');
        },
        onContent: function () {
            //Gridder Content Loaded
            console.log('On Gridder Expand...');
        },
        onClosed: function () {
            //Gridder Closed
            console.log('On Gridder Closed...');
        }
    });
}