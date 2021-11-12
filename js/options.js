/*-------------------------------------------
  options.js
  By Diego Carmona Bernal
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

let btnSearchMobileDisabled = $('#btnSearchMobile');
let btnSearchDisabled = $('#btnSearch');

function activateSearchMobileClick() {
    btnSearchMobileDisabled.attr('disabled', false);
}

function activateSearchClick() {
    btnSearchDisabled.attr('disabled', false);
}

function disabledSearchClick() {
    btnSearchDisabled.attr('disabled', true);
}

$(function() {
    let formSearch = $('.search');

    btnSearchMobileDisabled.on('click', function() {
        if (formSearch.is(':hidden')) {
            formSearch.slideToggle();
            document.getElementById('txtSearch').focus();
            btnSearchMobileDisabled.attr('disabled', true);
            setTimeout(activateSearchMobileClick, 800);
        } else {
            formSearch.slideToggle();
            btnSearchMobileDisabled.attr('disabled', true);
            setTimeout(activateSearchMobileClick, 800);
        }
    });

    btnSearchDisabled.on('click', function() {
        setTimeout(disabledSearchClick, 300);
        setTimeout(activateSearchClick, 800);
    });
});