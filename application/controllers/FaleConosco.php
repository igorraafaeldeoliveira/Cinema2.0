<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct scrip acess allowed');

class Cinema extends CI_Controller {

    public function __construct() {
        //chama o construtor da calsse pai (CI_Controller)
        parent:: __construct();
        //chama o metodo que faz a validção de login de usuario
       // $this->load->model('Usuario_model');
       // $this->Usuario_model->verificaLogin();
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $this->load->model('FaleConosco_model', 'cm');
        $data['faleconosco'] = $this->cm->getALL();
        $this->load->view('Header');
        $this->load->view('FaleConosco', $data);
        $this->load->view('Footer');
    }

    
}
