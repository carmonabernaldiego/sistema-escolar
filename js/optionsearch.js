$(function() {
    var botonMostrar = $("#btnSearchMobile"),
        formSearch = $(".search");

    botonMostrar.on("click", function() {
        if (formSearch.is(':hidden')) {
            formSearch.show('slow');
            document.getElementById("txtSearch").focus();
        } else {
            formSearch.hide('slow');
        }
    });
});