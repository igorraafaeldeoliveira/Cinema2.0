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
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaUsuario();
        $this->load->model('Cinemas_model');
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {

        $data['cinemas'] = $this->Cinemas_model->getALL();
        $this->load->view('Header');
        $this->load->view('ListaCinemas', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nomeCinema', 'Nome do cinema', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('Header');
            $this->load->view('FormCinema');
            $this->load->view('Footer');
        } else {
            $this->load->model('Cinemas_model');
            $data = array(
                'nomeCinema' => $this->input->post('nomeCinema'),
            );
            if ($this->Cinemas_model->insert($data)) {
                redirect('Cinema/listar');
            } else {
                redirect('Cinema/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->load->model('Cinemas_model');
            $this->form_validation->set_rules('nomeCinema', 'nome do cinema', 'required');

            if ($this->form_validation->run() == false) {
                $data['cinemas'] = $this->Cinemas_model->getONE($id);
                $this->load->view('Header');
                $this->load->view('FormCinema', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nomeCinema' => $this->input->post('nomeCinema'),
                );
                if ($this->Cinemas_model->update($id, $data)) {
                    redirect('Cinema/listar');
                } else {
                    redirect('Cinema/alterar' . $id);
                }
            }
        } else {
            redirect('Cinema/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            $this->load->model('Cinemas_model');
            if ($this->Cinemas_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Cinema deletado com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar cinema...');
            }
        }
        redirect('Cinema/listar');
    }

}
