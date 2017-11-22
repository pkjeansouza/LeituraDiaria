$(document).ready(function () {
    checarPermissao();
    setInterval(function () {
        checarNotificacao();
    }, 59000);
});

function checarPermissao() {
    if (Notification.permission !== "granted") {
        Notification.requestPermission();
    }
}

function checarNotificacao() {
    if (Notification.permission !== "granted") {
        Notification.requestPermission();
    } else {
        $.ajax({
            type: "GET",
            url: baseUrl + 'Lembretes/verificar_lembrete_ajax.json',
            success: function (response) {
                if (response.Sucesso) {
                    if (response.Lembrete) {
                        var titulo = "Leitura Diária";
                        var mensagem = "Está na hora de ler seu livro " + response.Lembrete.Livro.nome + ".";
                        var icone = baseUrl + "img/LeituraDiaria/Icones/agenda-notificacao.png";

                        var notificacao = new Notification(titulo, {
                            icon: icone,
                            body: mensagem
                        });

                        notificacao.onclick = function () {
                            notificacao.close();
                        };

                        excluirLembrete(response.Lembrete.Lembrete.id);
                    }

                    if (response.LembreteRepetido) {
                        $.each(response.LembreteRepetido, function (index, valor) {
                            var titulo = "Leitura Diária";
                            var mensagem = "Está na hora de ler seu livro " + valor.Livro.nome + ".";
                            var icone = baseUrl + "img/LeituraDiaria/Icones/agenda-notificacao.png";

                            var notificacao = new Notification(titulo, {
                                icon: icone,
                                body: mensagem
                            });

                            notificacao.onclick = function () {
                                notificacao.close();
                            };
                        });
                    }

                }
            },
            error: function () {
            },
            complete: function () {

            }
        });
    }
}

function excluirLembrete(id) {
    $.ajax({
        type: "DELETE",
        url: baseUrl + 'Lembretes/excluir_lembrete_ajax.json',
        data: {
            'data': id
        }
    });
}