<section class="body-error error-outside">
    <div class="center-error">
        <div class="row">
            <div class="col-md-8">
                <div class="main-error mb-xlg">
                    <h2 class="error-code text-dark text-center text-weight-semibold m-none">404 <i
                                class="fa fa-file"></i></h2>
                    <p class="error-explanation text-center">Ooops! A página que você está procurando não
                        existe.</p>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text">Aqui estão alguns links úteis</h4>
                <ul class="nav nav-list primary">
                    <li>
                        <?= $this->Html->link('<i class="fa fa-caret-right text-dark"></i> Home',
                            ['controller' => 'Pages', 'action' => 'home'], ['escape' => false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('<i class="fa fa-caret-right text-dark"></i> Meus Livros',
                            ['controller' => 'Livros', 'action' => 'meus_livros'], ['escape' => false]) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('<i class="fa fa-caret-right text-dark"></i> Meus Lembretes',
                            ['controller' => 'Lembretes', 'action' => 'meus_lembretes'], ['escape' => false]) ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>