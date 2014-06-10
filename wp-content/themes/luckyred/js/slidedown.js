$(document).ready(function(){
    $(".toggle_container").hide();
    $("a.hide").toggle(function(){
        $(this).removeClass("active");
        }, function () {
        $(this).addClass("active");
    })
    $("a.hide").click(function(){
        $(this).next(".toggle_container").slideToggle("slow");
    })
})