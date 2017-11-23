<?php

class PagesController extends AppController
{
    public function beforeFilter()
    {
        parent::beforeFilter();

        $homeAtivo = 'active';
        $this->set('homeAtivo', $homeAtivo);
    }

    public function home() {

    }
}