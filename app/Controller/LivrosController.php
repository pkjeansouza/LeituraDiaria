<?php
/**
 * @property Livro $Livro
 */

class LivrosController extends AppController
{
    public function meus_livros()
    {
        $primeirosQuatroLivros = $this->Livro->find('all', [
            'order' => ['Livro.id' => 'DESC'],
            'limit' => 4,
            'recursive' => -1
        ]);

        $quantidadePaginasCarregamento = ceil($this->Livro->find('count') / 4);

        $this->set('primeirosQuatroLivros', $primeirosQuatroLivros);
        $this->set('quantidadePaginasCarregamento', $quantidadePaginasCarregamento);
    }

    public function carregar_livros_ajax()
    {
        $this->layout = '';
        $ultimoId = $this->request->query('ultimoId');

        $livros = $this->Livro->find('all', [
            'conditions' => ['Livro.id <' => $ultimoId],
            'order' => ['Livro.id' => 'DESC'],
            'limit' => 4,
            'recursive' => -1
        ]);

        $this->set('livros', $livros);
    }

    public function novo_livro()
    {
        if ($this->request->is('post')) {
            $this->Livro->create();

            if ($this->Livro->save($this->request->data)) {

                if (isset($this->request->data['Livro']['imagem']['name'])) {
                    if ($this->request->data['Livro']['imagem']['name'] != null) {
                        $caminhoTemporarioDaImagem = $this->request->data['Livro']['imagem']['tmp_name'];
                        $tipoDaImagem = pathinfo($this->request->data['Livro']['imagem']['name'], PATHINFO_EXTENSION);
                        $nomeDaImagem = 'Livro_' . $this->Livro->id . '.' . $tipoDaImagem;

                        move_uploaded_file($caminhoTemporarioDaImagem, WWW_ROOT . $this->Livro->caminhoImagens . $nomeDaImagem);

                        $livroAtualizar = [
                            'id' => $this->Livro->id,
                            'caminho_imagem' => $this->Livro->caminhoImagens . $nomeDaImagem
                        ];

                        $this->Livro->save($livroAtualizar);
                    }
                }

                $this->Flash->success('O livro ' . $this->request->data['Livro']['nome'] . ' foi cadastrado.');
                return $this->redirect(['controller' => 'Livros', 'action' => 'meus_livros']);
            } else {
                $this->Flash->danger('Ocorreu um erro e o livro não foi cadastrado, por favor tente novamente mais tarde.');
                return $this->redirect($this->referer());
            }
        }
    }
}