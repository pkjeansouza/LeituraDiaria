var formularioEditarLembrete = $("#EditLembreteForm");
var lembreteRepetir = $('#LembreteRepetir');

var checkboxDomingo = $('#LembreteCheckboxDomingo');
var checkboxSegunda = $('#LembreteCheckboxSegunda');
var checkboxTerca = $('#LembreteCheckboxTerca');
var checkboxQuarta = $('#LembreteCheckboxQuarta');
var checkboxQuinta = $('#LembreteCheckboxQuinta');
var checkboxSexta = $('#LembreteCheckboxSexta');
var checkboxSabado = $('#LembreteCheckboxSabado');

(function () {
    formularioEditarLembrete.validate();
}).apply(this, [jQuery]);

$(document).ready(function () {
    if (lembreteRepetir.val() === '0') {
        $('#campo-data').attr('hidden', false);
        $('#campo-dia-da-semana').attr('hidden', true);
    } else {
        $('#campo-data').attr('hidden', true);
        $('#campo-dia-da-semana').attr('hidden', false);
    }
});

lembreteRepetir.on('change', function (e) {
    e.preventDefault();

    checkboxDomingo.prop('checked', false);
    checkboxSegunda.prop('checked', false);
    checkboxTerca.prop('checked', false);
    checkboxQuarta.prop('checked', false);
    checkboxQuinta.prop('checked', false);
    checkboxSexta.prop('checked', false);
    checkboxSabado.prop('checked', false);
    $('#LembreteDataLembrete').val('');

    if (lembreteRepetir.val() === '0') {
        $('#campo-data').attr('hidden', false);
        $('#campo-dia-da-semana').attr('hidden', true);
    } else if (lembreteRepetir.val() === '1') {
        $('#campo-data').attr('hidden', true);
        $('#campo-dia-da-semana').attr('hidden', false);
    } else {
        $('#campo-data').attr('hidden', true);
        $('#campo-dia-da-semana').attr('hidden', true);
    }

    $(this).valid();
});

formularioEditarLembrete.on('submit', function (e) {
    if (formularioEditarLembrete.valid()) {
        if (lembreteRepetir.val() === '1') {
            if (!validarCheckbox()) {
                notificacao('warning', 'Por favor selecione pelo menos um dia.');
                e.preventDefault();
                return false;
            }
        }

        return true;
    } else {
        e.preventDefault();
        return false;
    }
});

function validarCheckbox() {
    if (checkboxDomingo.prop('checked'))
        return true;

    if (checkboxSegunda.prop('checked'))
        return true;

    if (checkboxTerca.prop('checked'))
        return true;

    if (checkboxQuarta.prop('checked'))
        return true;

    if (checkboxQuinta.prop('checked'))
        return true;

    if (checkboxSexta.prop('checked'))
        return true;

    if (checkboxSabado.prop('checked'))
        return true;


    return false;
}

$('#LembreteLivroId').on('change', function (e) {
    e.preventDefault();
    $(this).valid();
});