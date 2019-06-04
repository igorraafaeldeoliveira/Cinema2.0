<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct scrip acess allowed');

class Filme extends CI_Controller {

    public function __construct() {
        //chama o construtor da calsse pai (CI_Controller)
        parent:: __construct();
        //chama o metodo que faz a validção de login de usuario
        //$this->load->model('Usuario_model');
       // $this->Usuario_model->verificaLogin();
    }
   
 
    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->cadastrar();
    }

    public function listar() {
        $this->load->model('Filmes_model', 'f');
        $data['filmes'] = $this->f->getALL();
    }

    
    
    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'nome', 'required');

        if ($this->form_validation->run() == false) {
         
            $this->load->view('FormFilme');
              $this->load->view('Footer');
           
        } else {
            $this->load->model('Filmes_model');
            $data = array(
                'nome' => $this->input->post('nome'),
             
            );
            if ($this->Filmes_model->insert($data)) {
                redirect('Filme/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Filmes_model');
            $this->form_validation->set_rules('nome', 'nome', 'required');
       

            if ($this->form_validation->run() == false) {
                $data['filmes'] = $this->Filmes_model->getONE($id);        
                $this->load->view('FormFilme', $data);
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
               
                );
                if ($this->Filmes_model->update($id, $data)) {
                    redirect('Filme/listar');
                } else {
                    redirect('Filme/alterar' . $id);
                }
            }
        } else {
            redirect('Filme/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            $this->load->model('Filmes_model');
            if ($this->Filmes_model     ->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Filme deletado com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar filme...');
            }
        }
        redirect('Filme/listar');
    }

}