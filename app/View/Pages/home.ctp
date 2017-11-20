<?= $this->start('pageHeader'); ?>
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?= 'Home' ?></h1>
                </div>
            </div>
        </div>
    </section>
<?= $this->end(); ?>

    <section>
        <div class="container">
            <div class="col-md-12 center">
                <span class="icon-featured"><span class="fa-agenda"></span></span>
                <p style="font-size: 1.6em; font-weight: 600; margin-bottom: 0 !important;">Bem Vindo ao Leitura Diária!</p>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="col-md-12 center" style="display: inline !important;">
                <span class="icon-featured pull-left"><span class="fa-livro"></span></span>
                <p class="TextoIntroducao" style="font-size: 1.6em; font-weight: 600; margin-bottom: 0 !important;">
                    Aqui, você só se perde em meio as histórias
                    lidas, pois dos lembretes nós tomamos conta.
                </p>
            </div>
        </div>

        <hr>

        <div class="container">
            <div class="col-md-12 center" style="display: inline !important;">
                <span class="icon-featured pull-right"><span class="fa-livro-marcado"></span></span>
                <p class="TextoObjetivo" style="font-size: 1.6em; font-weight: 600; margin-bottom: 0 !important;">
                    Nosso objetivo é facilitar sua programação, permitindo que adicione os livros lidos
                    no momento e a eles, lembretes de dia e horário para não se perder.<br>
                </p>
            </div>
        </div>

        <hr style="margin-bottom: 26px">

        <div class="container">
            <div class="col-md-12 center">
                <?= $this->Html->link('<i class="fa fa-chevron-right IconeVamosComecar"></i> Vamos Começar ?',
                    ['controller' => 'Livros', 'action' => 'novo_livro'], ['class' => ['text-decoration-none VamosComecar'],
                        'style' => 'font-size: 1.6em; font-weight: 600;', 'escape' => false]) ?>
            </div>
        </div>
        <hr>
    </section>

    <footer id="footer" class="narrow">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p style="color: #CCC">Desenvolvido por Jean Carlo de Souza para fins avaliativos.</p>
                </div>
                <div class="col-md-4">
                    <div class="contact-details">
                        <h4 style="color: #FFF">Informações</h4>
                        <ul class="contact">
                            <li><p"><i class="fa fa-map-marker"></i> <strong>Endereço:</strong> Rua Antônio Mário G. da
                                Silva, 65 - Vila Alba</p></li>
                            <li><p><i class="fa fa-phone"></i> <strong>Telefone:</strong> (67) 99211-1191</p></li>
                            <li><p><i class="fa fa-envelope"></i> <strong>Email:</strong> <a
                                            href="mailto:pkjeansouza@gmail.com">pkjeansouza@gmail.com</a>
                                </p></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

<?= $this->Html->script('LeituraDiaria/Pages/home', ['block' => 'script']) ?>