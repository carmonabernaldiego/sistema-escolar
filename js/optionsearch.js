let botonMostrar = $("#btnSearchMobile");

$(function() {
    let formSearch = $(".search");

    botonMostrar.on("click", function() {
        if (formSearch.is(':hidden')) {
            formSearch.slideToggle();
            document.getElementById("txtSearch").focus();
            botonMostrar.attr("disabled", true);
            setTimeout(activateClick, 1000);
        } else {
            formSearch.slideToggle();
            botonMostrar.attr("disabled", true);
            setTimeout(activateClick, 1000);
        }
    });
});

function activateClick() {
    botonMostrar.attr("disabled", false);
}