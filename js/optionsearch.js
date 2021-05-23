let btnSearchDisabled = $('#btnSearchMobile');

$(function() {
    let formSearch = $('.search');

    btnSearchDisabled.on('click', function() {
        if (formSearch.is(':hidden')) {
            formSearch.slideToggle();
            document.getElementById('txtSearch').focus();
            btnSearchDisabled.attr('disabled', true);
            setTimeout(activateClick, 1000);
        } else {
            formSearch.slideToggle();
            btnSearchDisabled.attr('disabled', true);
            setTimeout(activateClick, 1000);
        }
    });
});

function activateClick() {
    btnSearchDisabled.attr('disabled', false);
}