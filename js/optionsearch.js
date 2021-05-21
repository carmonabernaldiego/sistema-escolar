let botonMostrar = $("#btnSearchMobile");

$(function() {
    let formSearch = $(".search");

    botonMostrar.on("click", function() {
        if (formSearch.is(':hidden')) {
            formSearch.slideToggle();
            document.getElementById("txtSearch").focus();
            botonMostrar.attr("disabled", true);
            setTimeout(activateClick, 1500);
        } else {
            formSearch.slideToggle();
        }
    });
});

function activateClick() {
    botonMostrar.attr("disabled", false);
}