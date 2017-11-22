<?php
/**
 * @property Lembrete $Lembrete
 * @property Livro $Livro
 */

class LembretesController extends AppController
{
    public function beforeFilter()
    {
        parent::beforeFilter();

        $lembretes = 'active';
        $this->set('lembretes', $lembretes);
    }

    public function meus_lembretes()
    {
        $lembretes = $this->Lembrete->find('all');

        $this->set('lembretes', $lembretes);
    }

    public function novo_lembrete($id = null)
    {
        if ($this->request->is('post')) {

            if ($this->request->data['Lembrete']['repetir']) {
                $this->request->data['Lembrete']['dias_semana'] =
                    $this->request->data['Lembrete']['checkboxDomingo'] .
                    $this->request->data['Lembrete']['checkboxSegunda'] .
                    $this->request->data['Lembrete']['checkboxTerca'] .
                    $this->request->data['Lembrete']['checkboxQuarta'] .
                    $this->request->data['Lembrete']['checkboxQuinta'] .
                    $this->request->data['Lembrete']['checkboxSexta'] .
                    $this->request->data['Lembrete']['checkboxSabado'];
            } else {
                $this->request->data['Lembrete']['data_lembrete'] = $this->converterData($this->request->data['Lembrete']['data_lembrete']);
            }

            $this->request->data['Lembrete']['hora_lembrete'] = $this->request->data['Lembrete']['hora_lembrete'] . ':00';

            $this->Lembrete->create();
            if ($this->Lembrete->save($this->request->data)) {
                $this->Flash->success('O novo lembrete foi cadastrado com sucesso.');
                return $this->redirect(['controller' => 'Lembretes', 'action' => 'meus_lembretes']);
            } else {
                $this->Flash->danger('Ocorreu um erro e o lembrete não foi cadastrado, por favor tente novamente mais tarde.');
                return $this->redirect($this->referer());
            }
        } else {
            $this->loadModel('Livro');
            $listaLivros = $this->Livro->find('list', [
                'fields' => [
                    'Livro.id', 'Livro.nome'
                ]
            ]);

            if ($id != null) {
                $this->set('idLivroSelecionado', $id);
            }

            $this->set('listaLivros', $listaLivros);
        }
    }

    public function editar_lembrete($id = null)
    {
        if ($this->request->is('put')) {

            if ($this->request->data['Lembrete']['repetir']) {
                $this->request->data['Lembrete']['dias_semana'] =
                    $this->request->data['Lembrete']['checkboxDomingo'] .
                    $this->request->data['Lembrete']['checkboxSegunda'] .
                    $this->request->data['Lembrete']['checkboxTerca'] .
                    $this->request->data['Lembrete']['checkboxQuarta'] .
                    $this->request->data['Lembrete']['checkboxQuinta'] .
                    $this->request->data['Lembrete']['checkboxSexta'] .
                    $this->request->data['Lembrete']['checkboxSabado'];
            } else {
                $this->request->data['Lembrete']['data_lembrete'] = $this->converterData($this->request->data['Lembrete']['data_lembrete']);
            }

            $this->request->data['Lembrete']['hora_lembrete'] = $this->request->data['Lembrete']['hora_lembrete'] . ':00';
            $this->request->data['Lembrete']['data_lembrete'] = null;

            if ($this->Lembrete->save($this->request->data)) {
                $this->Flash->success('O lembrete foi editado com sucesso.');
                return $this->redirect(['controller' => 'Lembretes', 'action' => 'meus_lembretes']);
            } else {
                $this->Flash->danger('Ocorreu um erro e o lembrete não foi editado, por favor tente novamente mais tarde.');
                return $this->redirect(['controller' => 'Lembretes', 'action' => 'meus_lembretes']);
            }
        } else {
            $this->loadModel('Livro');
            $listaLivros = $this->Livro->find('list', [
                'fields' => [
                    'Livro.id', 'Livro.nome'
                ]
            ]);

            $this->request->data = $this->Lembrete->find('first', [
                'conditions' => [
                    'Lembrete.id' => $id
                ],
                'recursive' => -1
            ]);

            $this->request->data['Lembrete']['hora_lembrete'] = date('H:i', strtotime($this->request->data['Lembrete']['hora_lembrete']));
            $this->request->data['Lembrete']['data_lembrete'] = date('d/m/Y', strtotime($this->request->data['Lembrete']['data_lembrete']));

            if ($this->request->data['Lembrete']['repetir']) {
                $arrayDiasSemana = str_split($this->request->data['Lembrete']['dias_semana']);

                if ($arrayDiasSemana[0]) {
                    $this->request->data['Lembrete']['checkboxDomingo'] = 1;
                }
                if ($arrayDiasSemana[1]) {
                    $this->request->data['Lembrete']['checkboxSegunda'] = 1;
                }
                if ($arrayDiasSemana[2]) {
                    $this->request->data['Lembrete']['checkboxTerca'] = 1;
                }
                if ($arrayDiasSemana[3]) {
                    $this->request->data['Lembrete']['checkboxQuarta'] = 1;
                }
                if ($arrayDiasSemana[4]) {
                    $this->request->data['Lembrete']['checkboxQuinta'] = 1;
                }
                if ($arrayDiasSemana[5]) {
                    $this->request->data['Lembrete']['checkboxSexta'] = 1;
                }
                if ($arrayDiasSemana[6]) {
                    $this->request->data['Lembrete']['checkboxSabado'] = 1;
                }
            }

            $this->set('id', $id);
            $this->set('listaLivros', $listaLivros);
        }
    }

    public function excluir_lembrete_ajax()
    {
        if ($this->request->is(['ajax'])) {
            if ($this->Lembrete->delete($this->request->data)) {
                $retorno = ['Erro' => false];
            } else {
                $retorno = ['Erro' => true];
            }

            $this->set('retorno', $retorno);
        }
    }

    public function verificar_lembrete_ajax()
    {
        if ($this->request->is('ajax')) {
            $retorno['Sucesso'] = false;

            $lembretesHoje = [];
            $lembreteRepetir = $this->Lembrete->find('all', [
                'conditions' => [
                    'Lembrete.repetir' => 1,
                    'Lembrete.hora_lembrete' => date('H:i' . ':00')
                ],
                'order' => [
                    'Lembrete.hora_lembrete' => 'ASC'
                ]
            ]);

            if (count($lembreteRepetir)) {
                foreach ($lembreteRepetir as $index => $lembrete) {
                    $posicaoDiaAtual = date('w');
                    $arrayDiasSemana = str_split($lembrete['Lembrete']['dias_semana']);;

                    if ($arrayDiasSemana[$posicaoDiaAtual]) {
                        $lembretesHoje[] = $lembrete;
                    }
                }
            }

            $lembrete = $this->Lembrete->find('first', [
                'conditions' => [
                    'Lembrete.data_lembrete' => date('Y-m-d'),
                    'Lembrete.hora_lembrete' => date('H:i' . ':00')
                ],
                'link' => [
                    'Livro'
                ],
                'recursive' => -1
            ]);

            if (count($lembrete)) {
                $retorno['Lembrete'] = $lembrete;
            }

            if (count($lembretesHoje)) {
                $retorno['LembreteRepetido'] = $lembretesHoje;
            }

            if (count($lembrete) || count($lembretesHoje)) {
                $retorno['Sucesso'] = true;
            }

            $this->set('retorno', $retorno);
        }
    }

    public function carregar_lembretes_ajax()
    {
        $this->layout = '';
        if ($this->request->is('ajax')) {
            $this->paginate = [
                'fields' => ['id', 'livro_id', 'repetir', 'dias_semana', 'data_lembrete', 'hora_lembrete'],
                'link' => ['Livro']
            ];
            $this->DataTable->mDataProp = true;
            $retorno = $this->DataTable->getResponse();

            foreach ($retorno['aaData'] as $index => $obj) {
                $retorno['aaData'][$index]['Lembrete']['data_lembreteMostrar'] = $this->converterData($obj['Lembrete']['data_lembrete']);
                $retorno['aaData'][$index]['Lembrete']['hora_lembreteMostrar'] = date('H:i', strtotime($obj['Lembrete']['hora_lembrete']));

                if ($obj['Lembrete']['repetir']) {
                    $arrayDiasSemana = str_split($obj['Lembrete']['dias_semana']);
                    $textoDiasSemana = '';

                    if ($obj['Lembrete']['dias_semana'] == '1111111') {
                        $textoDiasSemana = 'Diariamente';
                    } else {
                        if ($arrayDiasSemana[0]) {
                            $textoDiasSemana .= 'Domingo<br>';
                        }
                        if ($arrayDiasSemana[1]) {
                            $textoDiasSemana .= 'Segunda<br>';
                        }
                        if ($arrayDiasSemana[2]) {
                            $textoDiasSemana .= 'Terça<br>';
                        }
                        if ($arrayDiasSemana[3]) {
                            $textoDiasSemana .= 'Quarta<br>';
                        }
                        if ($arrayDiasSemana[4]) {
                            $textoDiasSemana .= 'Quinta<br>';
                        }
                        if ($arrayDiasSemana[5]) {
                            $textoDiasSemana .= 'Sexta<br>';
                        }
                        if ($arrayDiasSemana[6]) {
                            $textoDiasSemana .= 'Sábado<br>';
                        }
                    }

                    $retorno['aaData'][$index]['Lembrete']['dias_semanaMostrar'] = $textoDiasSemana;
                } else {
                    $retorno['aaData'][$index]['Lembrete']['dias_semanaMostrar'] = '';
                }
            }

            $this->set('retorno', $retorno);
        }
    }

    public function converterData($data)
    {
        if (preg_match('/([0-9]+)-([0-9]+)-([0-9]+)/', $data))
            return preg_replace('/([0-9]+)-([0-9]+)-([0-9]+)/', '$3/$2/$1', $data);
        else
            return preg_replace('/([0-9]+)\/([0-9]+)\/([0-9]+)/', '$3-$2-$1', $data);
    }
}