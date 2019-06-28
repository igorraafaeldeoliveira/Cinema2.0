<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct scrip acess allowed');

class ExibicaoFilme extends CI_Controller {

    public function __construct() {
        //chama o construtor da calsse pai (CI_Controller)
        parent:: __construct();
        //chama o metodo que faz a validção de login de usuario 
        $this->load->helper('text');
        $this->load->model('Filmes_model');
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $data['filmes'] = $this->Filmes_model->getALL();
        $this->load->view('TelaInicial/Header');
        $this->load->view('Exibicao', $data);
        $this->load->view('TelaInicial/Footer');
    }
}