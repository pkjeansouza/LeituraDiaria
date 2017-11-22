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

<?php if (count($primeirosQuatroLivros)) { ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 center">
                <ul id="portfolioLoadMoreWrapper" class="portfolio-list sort-destination sort-source"
                    data-total-pages="<?= $quantidadePaginasCarregamento ?>" style="position: relative;">

                    <?php foreach ($primeirosQuatroLivros as $livro) { ?>
                        <li class="col-md-3 col-sm-6 col-xs-12 isotope-item livro" data-id="<?= $livro['Livro']['id'] ?>"
                            style="height: 480px; left: 0; top: 0;">
                            <div class="portfolio-item">
                                <?= $this->Html->link(
                                    '<span class="thumb-info thumb-info-lighten thumb-info-no-zoom">
                                    <span class="thumb-info-wrapper">' .
                                    $this->Html->image($livro['Livro']['caminho_imagem'] ? $livro['Livro']['caminho_imagem'] : 'LeituraDiaria/Icones/agenda.svg',
                                        ['class' => 'img-responsive'])
                                    . '</span>
								</span>
                                <div class="center">' .
                                    $livro['Livro']['nome'] . '<br>' .
                                    $livro['Livro']['total_de_paginas'] . ' páginas
                                </div>',
                                    ['controller' => 'Lembretes', 'action' => 'novo_lembrete', $livro['Livro']['id']],
                                    ['escape' => false, 'class' => 'text-decoration-none']) ?>
                            </div>
                        </li>
                    <?php } ?>
                </ul>
            </div>

            <div class="col-md-12">

                <div id="portfolioLoadMoreLoader" class="portfolio-load-more-loader">
                    <div class="bounce-loader">
                        <div class="bounce1"></div>
                        <div class="bounce2"></div>
                        <div class="bounce3"></div>
                    </div>
                </div>

                <button id="portfolioLoadMore" type="button"
                        class="btn-portfolio-infinite-scroll btn btn-3d btn-default btn-lg btn-block font-size-xs text-uppercase outline-none p-md mb-xl">
                    Load More...
                </button>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container">
        <div class="row center">
            <h2 class="font-weight-semibold">Você não tem livros cadastrados no momento.</h2>
        </div>
    </div>
<?php } ?>

<?= $this->Html->script('LeituraDiaria/Livros/meus_livros', ['block' => 'script']) ?>
