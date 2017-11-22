<?= $this->start('pageHeader'); ?>
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= 'Lembretes' ?></h1>
            </div>
        </div>
    </div>
</section>
<?= $this->end(); ?>

<div class="container">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Meus Lembretes</h2>
        </header>
        <div class="panel-body">
            <div style="border: none;" class="table-responsive">
                <table class="table table-bordered table-hover table-striped mb-none" cellspacing="0px" width="100%"
                       id="tabelaLembretes">
                    <thead>
                    <tr>
                        <th style="text-align: center; vertical-align: middle;">ID</th>
                        <th style="text-align: center; vertical-align: middle;">Livro</th>
                        <th style="text-align: center; vertical-align: middle;">Hora</th>
                        <th style="text-align: center; vertical-align: middle;">Data</th>
                        <th style="text-align: center; vertical-align: middle;">Data</th>
                        <th style="text-align: center; vertical-align: middle;">Repetir</th>
                        <th style="text-align: center; vertical-align: middle;">Dias</th>
                        <th style="text-align: center; vertical-align: middle;">Ações</th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>

<div id="modalExcluirLembrete" class="modal-block mfp-hide">
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Excluir Lembrete</h2>
        </header>
        <div class="panel-body">
            <div class="modal-wrapper">
                <div class="modal-text">
                    <p>Você tem certeza que deseja excluir este lembrete?</p>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button id="dialogConfirm" class="btn btn-primary">Confirmar</button>
                    <button id="dialogCancel" class="btn btn-default">Cancelar</button>
                </div>
            </div>
        </footer>
    </section>
</div>

<?= $this->Html->script('LeituraDiaria/Lembretes/meus_lembretes', ['block' => 'script']) ?>
