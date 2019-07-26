'use strict';

var handlerCatalogContrlos = function () {
    var grid = $('#grid');
    var list = $('#list');
    var item = $('.catalog__item');

    grid.addClass('active');

    list.on('click', function (event) {
        event.preventDefault();
        item.removeClass('catalog__item--grid-view');
        item.addClass('catalog__item--list-view');
        list.addClass('active');
        grid.removeClass('active');
    });

    grid.on('click', function (event) {
        event.preventDefault();
        item.removeClass('catalog__item--list-view');
        item.addClass('catalog__item--grid-view');
        grid.addClass('active');
        list.removeClass('active');
    });
};

var handlerCollapseIn = function () {
    var description = $(this).find('.catalog__description');
    var text = $(this).find('.catalog__text');

    if ( ! text.hasClass('show') && ! text.hasClass('collapsing') ) {
        description.click();
    }
};

var handlerCollapseOut = function () {
    var description = $(this).find('.catalog__description');
    var text = $(this).find('.catalog__text');

    if ( text.hasClass('show') || text.hasClass('collapsing') ) {
        description.click();
    }
};

var redistributeText = function (item) {
    var MIN_NUMBER = 0;
    var MAX_NUMBER = 255;
    var description = item.find('.catalog__description')[0];
    var text = item.find('.catalog__text')[0];
    var topContent = text.textContent.substr(MIN_NUMBER, MAX_NUMBER);
    var bottomContent = text.textContent.substr(MAX_NUMBER);

    description.textContent = topContent;
    text.textContent = bottomContent;
};


var handlerCards = function () {
    $('.catalog__card').each(function() {
        var card = $(this);

        redistributeText(card);
        card.find('.catalog__content').hover(handlerCollapseIn, handlerCollapseOut);
    });
};

/* Responsive table */
var addDataHeaderToTableCell = function () {
    var headerText = [];
    var headers = document.querySelectorAll('table.table thead tr th');
    var tableBody = document.querySelector('table.table tbody');

    for(var i = 0; i < headers.length; i++) {
        var current = headers[i];
        headerText.push(current.textContent.replace(/\r?\n|\r/, ""));
    }

    for (var k = 0, row; row = tableBody.rows[k]; k++) {
        for (var j = 0, col; col = row.cells[j]; j++) {
            if (headerText[j] !== ' ' && headerText[j] !== undefined) {
                col.setAttribute('data-cell-header', headerText[j]);
            }
        }
    }
};
/* /Responsive table */

var main = function () {
    handlerCatalogContrlos();

    handlerCards();

    if ($('table.table').length !== 0) {
        addDataHeaderToTableCell();
    }
};

document.addEventListener('DOMContentLoaded', function () {
    main();
});

$(document).on('pjax:complete', function() {
    main();
});
