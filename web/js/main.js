$(document).ready(function() {
    $('#grid').addClass('active');
    $('#list').click(function(event) {
        event.preventDefault();
        $('.catalog__item').removeClass('catalog__item--grid-view');
        $('.catalog__item').addClass('catalog__item--list-view');
        $('#list').addClass('active');
        $('#grid').removeClass('active');
    });
    $('#grid').click(function(event) {
        event.preventDefault();
        $('.catalog__item').removeClass('catalog__item--list-view');
        $('.catalog__item').addClass('catalog__item--grid-view');
        $('#grid').addClass('active');
        $('#list').removeClass('active');
    });

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

    $('.catalog__card').each(function() {
        var card = $(this);

        redistributeText(card);
        card.find('.catalog__content').hover(handlerCollapseIn, handlerCollapseOut);
    });

    /* Responsive table */
    var addDataHeadersToTable = function () {
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
                    col.setAttribute('data-th', headerText[j]);
                }
            }
        }
    };

    if ($('table.table').length !== 0) {
        addDataHeadersToTable();
    }
    /* /Responsive table */
});
