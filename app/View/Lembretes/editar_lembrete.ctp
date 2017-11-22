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
    <?= $this->Form->create('Lembrete', ['class' => 'form-horizontal form-bordered', 'id' => 'EditLembreteForm']); ?>
    <?= $this->Form->hidden('id'); ?>

    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Editar Lembrete</h2>
        </header>
        <div class="panel-body">

            <div id="campo-notificacao" style="padding-bottom: 0;">
                <div id="notificacao-classe" style="margin-left: 15px; margin-right: 15px;">
                    <span id="notificacao-mensagem"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Livro <span
                        class="text-danger">*</span></label>
                <div class="col-md-6">
                    <?= $this->Form->input('livro_id', ['type' => 'select',
                        'empty' => 'Selecione',
                        'options' => $listaLivros,
                        'style' => ['width: 100%;'],
                        'div' => true,
                        'data-plugin-selectTwo',
                        'class' => 'form-control',
                        'label' => false,
                        'required'
                    ]); ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Tipo de Lembrete <span
                            class="text-danger">*</span></label>
                <div class="col-md-6">
                    <?= $this->Form->input('repetir', ['type' => 'select',
                        'empty' => 'Selecione o tipo de lembrete',
                        'options' => [
                            '0' => 'Data (Apenas uma vez)',
                            '1' => 'Dia da Semana (Repetição)'
                        ],
                        'style' => ['width: 100%;'],
                        'div' => true,
                        'data-plugin-selectTwo',
                        'class' => 'form-control',
                        'label' => false,
                        'required'
                    ]); ?>
                </div>
            </div>

            <div class="form-group" id="campo-dia-da-semana" hidden>
                <label class="col-md-3 control-label">Dia da Semana <span
                            class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div>
                        <div class="checkbox-custom checkbox-inline">
                            <?= $this->Form->input('checkboxDomingo', ['type' => 'checkbox', 'class' => 'form-control', 'label' => 'Domingo', 'div' => false]) ?>
                        </div>

                        <div class="checkbox-custom checkbox-inline">
                            <?= $this->Form->input('checkboxSegunda', ['type' => 'checkbox', 'class' => 'form-control', 'label' => 'Segunda', 'div' => false]) ?>
                        </div>

                        <div class="checkbox-custom checkbox-inline">
                            <?= $this->Form->input('checkboxTerca', ['type' => 'checkbox', 'class' => 'form-control', 'label' => 'Terça', 'div' => false]) ?>
                        </div>

                        <div class="checkbox-custom checkbox-inline">
                            <?= $this->Form->input('checkboxQuarta', ['type' => 'checkbox', 'class' => 'form-control', 'label' => 'Quarta', 'div' => false]) ?>
                        </div>

                        <div class="checkbox-custom checkbox-inline">
                            <?= $this->Form->input('checkboxQuinta', ['type' => 'checkbox', 'class' => 'form-control', 'label' => 'Quinta', 'div' => false]) ?>
                        </div>

                        <div class="checkbox-custom checkbox-inline">
                            <?= $this->Form->input('checkboxSexta', ['type' => 'checkbox', 'class' => 'form-control', 'label' => 'Sexta', 'div' => false]) ?>
                        </div>

                        <div class="checkbox-custom checkbox-inline" style="margin-left: 0">
                            <?= $this->Form->input('checkboxSabado', ['type' => 'checkbox', 'class' => 'form-control', 'label' => 'Sábado', 'div' => false]) ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group" id="campo-data" hidden>
                <label class="col-md-3 control-label">Data <span
                            class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </span>
                        <?= $this->Form->input('data_lembrete', [
                            'type' => 'text',
                            'div' => false,
                            'label' => false,
                            'data-date-language' => 'pt-BR',
                            'data-plugin-datepicker',
                            'class' => 'form-control',
                            'minlength' => '10',
                            'maxlength' => '10',
                            'required'
                        ]) ?>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Hora <span
                            class="text-danger">*</span></label>
                <div class="col-md-6">
                    <div class="input-group">
                            <span class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </span>
                        <?= $this->Form->input('hora_lembrete', [
                            'type' => 'text',
                            'div' => false,
                            'label' => false,
                            'data-plugin-timepicker',
                            'data-plugin-options' => '{"showMeridian": false }',
                            'class' => 'form-control',
                            'required'
                        ]) ?>
                    </div>
                </div>
            </div>

        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <?= $this->Form->button('Salvar', ['type' => 'submit', 'class' => ['btn btn-primary']]) ?>
                    <?= $this->Html->link('Voltar', ['controller' => 'Lembretes', 'action' => 'meus_lembretes'], ['class' => ['btn btn-default']]) ?>
                </div>
            </div>
        </footer>
    </section>
    <?= $this->Form->end(); ?>
</div>

<?= $this->Html->script('LeituraDiaria/Lembretes/editar_lembrete', ['block' => 'script']) ?>
