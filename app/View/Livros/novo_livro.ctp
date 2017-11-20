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

<?= $this->Html->script('LeituraDiaria/Livros/novo_livro', ['block' => 'script']) ?>
