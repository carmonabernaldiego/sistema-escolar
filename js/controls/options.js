/*-------------------------------------------
  options.js
  By Diego Carmona Bernal - CBDX
  www.diegocarmonabernal.com
  www.mysoftup.com
-------------------------------------------*/

let btnSearchMobile = $('#btnSearchMobile');
let btnSearch = $('#btnSearch');

function activateSearchMobile() {
    btnSearchMobile.attr('disabled', false);
}

function activateSearch() {
    btnSearch.attr('disabled', false);
}

function disabledSearch() {
    btnSearch.attr('disabled', true);
}

$(function() {
    let formSearch = $('.search');

    btnSearchMobile.on('click', function() {
        if (formSearch.is(':hidden')) {
            formSearch.slideToggle();
            document.getElementById('txtSearch').focus();
            btnSearchMobile.attr('disabled', true);
            setTimeout(activateSearchMobile, 800);
        } else {
            formSearch.slideToggle();
            btnSearchMobile.attr('disabled', true);
            setTimeout(activateSearchMobile, 800);
        }
    });

    btnSearch.on('click', function() {
        setTimeout(disabledSearch, 300);
        setTimeout(activateSearch, 800);
    });
});