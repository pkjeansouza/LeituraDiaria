<?= $this->start('pageHeader'); ?>
<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?= 'Livros' ?></h1>
            </div>
        </div>
    </div>
</section>
<?= $this->end(); ?>


<div class="container">
    <?= $this->Form->create('Livro', ['type' => 'file', 'class' => 'form-horizontal form-bordered', 'id' => 'AddLivroForm']); ?>
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Adicionar Livro</h2>
            <p class="panel-subtitle">
                Aqui você pode escrever algumas informações sobre seu livro, vamos lá?
            </p>
        </header>
        <div class="panel-body">

            <div id="campo-notificacao" style="padding-bottom: 0;">
                <div id="notificacao-classe" style="margin-left: 15px; margin-right: 15px;">
                    <i id="notificacao-icone"></i><span id="notificacao-mensagem"></span>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <div class="checkbox-custom">
                        <?= $this->Form->input('adicionar_imagem', ['type' => 'checkbox', 'class' => 'form-control', 'label' => 'Inserir Imagem', 'div' => false]) ?>
                    </div>
                </div>
            </div>

            <div class="form-group" id="campo-imagem" hidden>
                <label class="col-md-3 control-label">Imagem</label>
                <div class="col-md-6">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="input-append">
                            <div class="uneditable-input">
                                <i class="fa fa-file fileupload-exists"></i>
                                <span class="fileupload-preview"></span>
                            </div>
                            <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Trocar</span>
                                        <span class="fileupload-new">Selecionar</span>
                                        <input type="file" accept="image/jpg, image/jpeg, image/png, image/gif"
                                               name="data[Livro][imagem]" id="LivroImagem"/>
                                    </span>
                            <a href="#" class="btn btn-default fileupload-exists"
                               data-dismiss="fileupload">Remover</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Nome <span
                            class="text-danger">*</span></label>
                <div class="col-md-6">
                    <?= $this->Form->input('nome', [
                        'data-plugin-maxlength',
                        'div' => false,
                        'class' => 'form-control',
                        'label' => false,
                        'required'
                    ]) ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3 control-label">Total de Páginas <span
                            class="text-danger">*</span></label>
                <div class="col-md-6">
                    <?= $this->Form->input('total_de_paginas', [
                        'max' => 99999999999,
                        'min' => 0,
                        'label' => false,
                        'class' => 'form-control',
                        'required']) ?>
                </div>
            </div>
        </div>
        <footer class="panel-footer">
            <div class="row">
                <div class="col-sm-9 col-sm-offset-3">
                    <?= $this->Form->button('Cadastrar', ['type' => 'submit', 'class' => ['btn btn-primary']]) ?>
                    <?= $this->Form->button('Limpar', ['type' => 'reset', 'class' => ['btn btn-default'], 'id' => 'BtnLimparFormulario']) ?>
                </div>
            </div>
        </footer>
    </section>
    <?= $this->Form->end(); ?>
</div>

<?= $this->Html->script('LeituraDiaria/Livros/novo_livro', ['block' => 'script']) ?>
