$(function() {
    var botonMostrar = $("#btnSearchMobile"),
        formSearch = $(".search");

    botonMostrar.on("click", function() {
        if (formSearch.is(':hidden')) {
            formSearch.slideToggle();
            document.getElementById("txtSearch").focus();
        } else {
            formSearch.slideToggle();
        }
    });
});