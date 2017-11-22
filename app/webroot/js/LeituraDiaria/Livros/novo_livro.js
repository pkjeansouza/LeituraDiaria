var formularioAdicionarLivro = $("#AddLivroForm");
var checkboxAdicionarImagem = $("#LivroAdicionarImagem");
var campoAdicionarImagem = $('#campo-imagem');
var livroImagem = $('#LivroImagem');
var btnLimparFormulario = $("#BtnLimparFormulario");

(function () {
    formularioAdicionarLivro.validate();
}).apply(this, [jQuery]);

checkboxAdicionarImagem.on('change', function (e) {
    e.preventDefault();
    if (checkboxAdicionarImagem.prop('checked')) {
        campoAdicionarImagem.attr('hidden', false);
    } else {
        campoAdicionarImagem.attr('hidden', true);
    }
});

livroImagem.on('change', function () {
    var file_ext = livroImagem.val().split('.').pop();

    if (file_ext !== 'png' && file_ext !== 'jpeg' && file_ext !== 'jpg' && file_ext !== 'gif' && file_ext !== '') {
        notificacao('warning', 'Só são aceitas imagens do tipo png, jpg, jpeg e gif.');
        livroImagem.val('');
    }
});

formularioAdicionarLivro.on('submit', function (e) {
    if (formularioAdicionarLivro.valid()) {
        if (checkboxAdicionarImagem.prop('checked')) {
            if (!livroImagem.val().trim().length > 0) {
                notificacao('warning', 'Por favor, insira uma foto.');
                e.preventDefault();
                return false;
            } else {
                return true;
            }
        } else {
            return true;
        }
    } else {
        e.preventDefault();
        return false;
    }
});

btnLimparFormulario.on('click', function () {
    checkboxAdicionarImagem.prop('checked', false);
    campoAdicionarImagem.attr('hidden', true);
    $('#LivroImagem').val('');
    $('#LivroNome').val('');
    $('#LivroTotalDePaginas').val('');
    limparValidation($('#LivroNome'));
    limparValidation($('#LivroTotalDePaginas'));
});