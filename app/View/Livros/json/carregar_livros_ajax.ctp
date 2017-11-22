<?php foreach ($livros as $livro) { ?>
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