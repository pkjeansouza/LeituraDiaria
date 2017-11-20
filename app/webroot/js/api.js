function limparValidation(elemento) {
    if (elemento.closest('div[class=form-group has-success]').hasClass('has-success')) {
        elemento.closest('div[class=form-group has-success]').removeClass('has-success');
        $('#' + elemento.attr('id') + '-success').remove();
        return true;
    }

    if (elemento.closest('div[class=form-group has-error]').hasClass('has-error')) {
        elemento.closest('div[class=form-group has-error]').removeClass('has-error');
        $('#' + elemento.attr('id') + '-error').remove();
        return true;
    }

    return false;
}