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

function notificacao(classe, icone, mensagem) {
    limpar_notificacao();

    $('#campo-notificacao').addClass('form-group');
    $('#notificacao-classe').addClass('alert alert-' + classe);
    $('#notificacao-icone').addClass('fa fa-' + icone);
    $('#notificacao-mensagem').text(mensagem);

    $('#campo-notificacao').attr('hidden', false);
}

function limpar_notificacao() {
    $('#campo-notificacao').removeAttr('class');
    $('#notificacao-classe').removeAttr('class');
    $('#notificacao-icone').removeAttr('class');
    $('#notificacao-mensagem').removeAttr('class');

    $('#campo-notificacao').attr('hidden', true);
}