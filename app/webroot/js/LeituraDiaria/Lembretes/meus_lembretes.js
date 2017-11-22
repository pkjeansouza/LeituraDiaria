var tabelaLembretes = $('#tabelaLembretes');
var modalExcluirLembrete = $('#modalExcluirLembrete');
var idLembrete;
var answer;

createDatatable();

function createDatatable() {
    tabelaLembretes.dataTable({
        "ajax": {
            "type": 'POST',
            "url": baseUrl + 'Lembretes/carregar_lembretes_ajax.json',
            "error": function () {
                notificacao('danger', 'Ocorreu um erro ao carregar os dados. Por favor volte novamente mais tarde.')
            }
        },
        columns: [
            {data: "Lembrete.id"},
            {data: "Livro.nome"},
            {data: "Lembrete.hora_lembreteMostrar"},
            {data: "Lembrete.data_lembrete"},
            {data: "Lembrete.data_lembreteMostrar"},
            {
                data: "Lembrete.repetir",
                render: function (data) {
                    if (data === '1') {
                        return '<i class="fa fa-check" style="color: #47a447;"></i>';
                    }
                    return '';
                }
            },
            {data: "Lembrete.dias_semanaMostrar"},
            {
                render: function (data, type, row) {
                    return "<a href='" + baseUrl + "Lembretes/editar_lembrete/" + row.Lembrete.id + "' data-toggle='tooltip' data-placement='bottom' title='Editar'><i class='fa fa-pencil'></i></a>" +
                        " " +
                        "<a href='javascript:void(0)' class='btnExcluir' data-id='" + row.Lembrete.id + "' data-toggle='tooltip' data-placement='bottom' title='Excluir'><i class='fa fa-trash-o'></i></a>";
                }
            }
        ],
        "columnDefs": [
            {
                "targets": '_all',
                "className": 'text-center'
            },
            {
                "targets": [7],
                "sorting": false
            },
            {
                "targets": [0, 3],
                "visible": false,
                "searchable": false
            },
            {
                'iDataSort': 3,
                'targets': 4
            }
        ],
        "aaSorting": [
            [4, "desc"]
        ]
    });
}

$(document).on('click', '.btnExcluir', function (e) {
    e.preventDefault();
    var elemento = $(this);
    idLembrete = elemento.attr('data-id');
    abrirModal(modalExcluirLembrete);
});

$('#dialogConfirm').on('click', function (e) {
    e.preventDefault();

    $.ajax({
        type: 'DELETE',
        url: baseUrl + 'Lembretes/excluir_lembrete_ajax.json',
        data: {
            'data[id]': idLembrete
        },
        success: function (response) {
            if (response.Erro === false) {
                notificacao('success', 'Lembrete excluído com sucesso.');
                tabelaLembretes.api().ajax.reload();
            } else {
                notificacao('error', 'Não foi possível excluir o lembrete. Por favor tente novamente mais tarde.');
            }
        },
        error: function () {
            notificacao('error', 'Não foi possível excluir o lembrete. Por favor tente novamente mais tarde.');
        },
        complete: function () {
            fecharModal(modalExcluirLembrete);
        }
    });
});

$('#dialogCancel').on('click', function (e) {
    e.preventDefault();
    fecharModal(modalExcluirLembrete);
});

function abrirModal(modal) {
    $.magnificPopup.open({
        items: {
            src: modal,
            type: 'inline'
        },
        mainClass: 'my-mfp-slide-bottom'
    });
}

function fecharModal(modal) {
    $.magnificPopup.close({
        items: {
            src: modal,
            type: 'inline'
        }
    });
}