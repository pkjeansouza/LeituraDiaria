// Notifications - Config
(function($) {

    'use strict';

    // use font awesome icons if available
    if ( typeof PNotify != 'undefined' ) {
        PNotify.prototype.options.styling = "fontawesome";

        $.extend(true, PNotify.prototype.options, {
            shadow: false,
            stack: {
                spacing1: 15,
                spacing2: 15
            }
        });

        $.extend(PNotify.styling.fontawesome, {
            // classes
            container: "notification",
            notice: "notification-warning",
            info: "notification-info",
            success: "notification-success",
            error: "notification-danger",

            // icons
            notice_icon: "fa fa-exclamation",
            info_icon: "fa fa-info",
            success_icon: "fa fa-check",
            error_icon: "fa fa-times"
        });
    }

}).apply(this, [jQuery]);

$.extend(true, $.fn.dataTable.defaults, {
    "language": {
        "lengthMenu": "<span style='margin-right: 10px;'>Exibir</span> _MENU_ resultados por página",
        "zeroRecords": "Nenhum resultado encontrado",
        "infoEmpty": "Nenhum resultado encontrado",
        "infoFiltered": "(filtrado de _MAX_ registros)",
        "loadingRecords": "<div class='text-center'><i class='fa fa-refresh fa-spin fa-2x'></i></div>",
        "emptyTable": "Nenhum registro encontrado",
        "processing": '<i class="fa fa-spinner fa-spin"></i> Carregando',
        "paginate": {
            "next": "Próximo",
            "first": "Primeiro",
            "last": "Último",
            "previous": "Anterior"
        },
        "info": "Mostrando <strong>_START_</strong>-<strong>_END_</strong> de <strong>_TOTAL_</strong> registros",
    },
    "displayLength": 10,
    "bProcessing": true,
    "ServerSide": true,
    fnDrawCallback: function (oSettings) {
        if ($.isFunction($.fn['tooltip'])) {
            $('[data-toggle=tooltip],[rel=tooltip]').tooltip({container: 'body'});
        }
    },
    initComplete: function () {
        ajustarTabela($(this));
    },
    "aaSorting": [
        [0, "asc"]
    ],
    "dom": "<'row datatables-header form-inline'<'col-sm-6 col-xs-5'l><'col-sm-6 col-xs-7'f>r>t<'row'<'col-sm-5 hidden-xs'i><'col-sm-7 col-xs-12 clearfix'p>>"
});


function ajustarTabela(nomeTabela) {
    nomeTabela.each(function () {
        var datatable = $(this);
        var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
        search_input.attr('placeholder', 'Buscar');
        search_input.addClass('form-control input-sm');
        var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
        $(length_sel[0]).select2({
            minimumResultsForSearch: -1
        });
    });
};

$(document.body).on('click', $('[data-toggle=tooltip],[rel=tooltip]'), function (e) {
    $('[data-toggle=tooltip],[rel=tooltip]').tooltip('hide');
});
/*
$.extend(true, $.fn.dataTable.defaults, {
    "language": {
        "lengthMenu": "_MENU_",
        "zeroRecords": "Nenhum resultado encontrado",
        "infoEmpty": "Nenhum resultado encontrado",
        "infoFiltered": "(filtrado de _MAX_ registros)",
        "loadingRecords": "<div class='text-center'><i class='fa fa-refresh fa-spin fa-2x'></i></div>",
        "emptyTable": "Nenhum registro encontrado",
        "processing": "<h4><p align='center'><i class='fa fa-refresh fa-spin'></i> <span class='themed-color-portal-cassems'>Carregando...</span></p></h4>",
        "paginate": {
            "next": "Próximo",
            "first": "Primeiro",
            "last": "Último",
            "previous": "Anterior"
        },
        "search": "<div class=\"input-group\">_INPUT_<span class=\"input-group-addon\"><i class=\"fa fa-search\"></i></span></div>",
        "info": "<strong>_START_</strong>-<strong>_END_</strong> de <strong>_TOTAL_</strong>",
    },
    "displayLength": 10,
    "bProcessing": true,
    "ServerSide": true,
    "paginationType": "bootstrap",
    fnDrawCallback: function (oSettings) {
        if ($.isFunction($.fn['tooltip'])) {
            $('[data-toggle=tooltip],[rel=tooltip]').tooltip({container: 'body'});
        }
    },
    initComplete: function () {
        ajustarTabela($(this));
    },
    "aaSorting": [
        [0, "asc"]
    ],
    "dom": "<'row'<'col-sm-6 col-xs-5'l><'col-sm-6 col-xs-7'f>r>t<'row'<'col-sm-5 hidden-xs'i><'col-sm-7 col-xs-12 clearfix'p>>"
});
*/


$(document).ajaxStart(function () {
    var body = $('#body');
    if (!body.hasClass('loading-overlay-showing')) {
        body.addClass('loading-overlay-showing');
    }
});

$(document).ajaxStop(function () {
    var body = $('#body');

    if (body.hasClass('loading-overlay-showing')) {
        body.removeClass('loading-overlay-showing');
    }
});

//Page Loading
window.onbeforeunload = function () {
    var body = $('#body');

    if (!body.hasClass('loading-overlay-showing')) {
        body.addClass('loading-overlay-showing');
    }
};


$.extend($.validator, {
    messages: {
        required: "Campo Obrigatório.",
        remote: "Por favor ajuste este campo.",
        email: "Por favor digite um e-mail válido.",
        url: "Por favor digite uma URL válida.",
        date: "Por favor digite uma data válida.",
        dateISO: "Por favor digite uma data válida (ISO).",
        number: "Por favor digite um número válido.",
        digits: "Por favor apenas dígitos.",
        creditcard: "Please enter a valid credit card number.",
        equalTo: "Por favor coloque um valor igual.",
        maxlength: $.validator.format("Por favor digite no máximo {0} caracteres."),
        minlength: $.validator.format("Por favor digite no mínimo {0} caracteres."),
        rangelength: $.validator.format("Please enter a value between {0} and {1} characters long."),
        range: $.validator.format("Por favor digite um valor entre {0} e {1}."),
        max: $.validator.format("Por favor digite um valor menor ou igual a {0}."),
        min: $.validator.format("Por favor digite um valor maior ou igual a {0}."),
        zipcode: 'test'
    }
});

jQuery.validator.setDefaults({
    errorClass: 'error appear-animation animated fadeIn',
    onfocusout: function (element) {
        $(element).valid();
    },
    highlight: function (label) {
        if (!$(label).attr('disabled')) {
            $(label).closest('.form-group').removeClass('has-success').addClass('has-error');
        } else {
            $(label).closest('.form-group').removeClass('has-success').removeClass('has-error');
            var errorLabel = $(label).closest('.form-group').find('label.error').get(0);
            if(errorLabel){
                errorLabel.remove();
            }
        }
    },
    success: function (label, element) {
        $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        label.remove();
    },
    errorPlacement: function (error, element) {
        if (!element.attr('disabled')) {
            var placement = element.closest('.input-group');
            if (!placement.get(0)) {
                placement = element;
            }
            if (error.text() !== '') {
                if (placement.is('select')) {
                    placement = placement.closest('div').last();
                }
                placement.after(error);
            }
        }
    }
});

$.validator.methods.email = function( value, element ) {
    return this.optional( element ) || /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test( value );
};

$.fn.select2.defaults.set('language', 'pt-BR');
$('[data-plugin-maxlength]').on('blur', function() {
    $('.bootstrap-maxlength').remove();
});