<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    public function __construct() {
        parent :: __construct();
        $this->load->model('Usuario_model');
    }

    public function index() {
        $this->load->view('Login');
    }

    public function login() {

        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('senha', 'senha', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('Login');
        } else {
            $usuario = $this->Usuario_model->getUsuario(
                    $this->input->post('email'), $this->input->post('senha')
            );
            if ($usuario) {
                $data = array(
                    'idUsuario' => $usuario->id,
                    'email' => $usuario->email,
                    'logado' => TRUE,
                    'status' => $usuario->status
                );
                $this->session->set_userdata($data);
                if ($this->session->userdata('status') == 2) {
                    redirect($this->config->base_url('Filme/index'));
                } else {
                    redirect($this->config->base_url());
                }
            } else {
                $this->session->set_flashdata('mensagem', 'Usuário e Senha INCORRETOS!');
                redirect($this->config->base_url() . 'Usuario/login');
            }
        }
    }

    public function cadastro() {

        $this->form_validation->set_rules('email', 'email', 'required|is_unique[usuario.email]');
        $this->form_validation->set_rules('senha', 'senha', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('CadastroLogin');
        } else {
            $this->load->model('Usuario_model');
            $data = array(
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha'),
            );
            if ($this->Usuario_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Você foi cadastrado com sucesso, faça login para continuar!!');
                redirect('Usuario/login');
            } else {
                redirect('Usuario/cadastro');
            }
        }
    }

    public function sair() {
        $this->session->sess_destroy();
        redirect($this->config->base_url());
    }

}
