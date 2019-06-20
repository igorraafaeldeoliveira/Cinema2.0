<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct scrip acess allowed');

class Funcionario extends CI_Controller {

    public function __construct() {
        //chama o construtor da calsse pai (CI_Controller)
        parent:: __construct();
        //chama o metodo que faz a validção de login de usuario
        $this->load->model('Usuario_model');
        $this->Usuario_model->verificaLogin();
        $this->load->model('Funcionarios_model');
        $this->load->model('Cinemas_model');
        $this->load->model('Filmes_model');
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $data['funcionarios'] = $this->Funcionarios_model->getALL();
        $this->load->view('Header');
        $this->load->view('ListaFuncionarios', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nome', 'O nome', 'required');
        $this->form_validation->set_rules('sal_funcionario', 'salario do funcionario', 'required');
        $this->form_validation->set_rules('cd_cinema', 'O cinema que o funcionario trabalha', 'required');
        $this->form_validation->set_rules('TempoDeServico', 'A quantia de dias trabalhados no mês', 'required');

        if ($this->form_validation->run() == false) {
            $data['cinema'] = $this->Cinemas_model->getALL();
            $this->load->view('Header');
            $this->load->view('FormFuncionario', $data);
            $this->load->view('Footer');
        } else {
            $this->load->model('Funcionarios_model');
            $data = array(
                'nome' => $this->input->post('nome'),
                'sal_funcionario' => $this->input->post('sal_funcionario'),
                'cd_cinema' => $this->input->post('cd_cinema'),
                'TempoDeServico' => $this->input->post('TempoDeServico'),
            );

            if ($this->Funcionarios_model->insert($data)) {
                $this->session->set_flashdata('mensagem');
                redirect('Funcionarios/listar');
            } else {
                redirect('Funcionarios/cadastrar');
                $this->session->set_flashdata('mensagem');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('nome', 'O nome', 'required');
            $this->form_validation->set_rules('sal_funcionario', 'salario do funcionario', 'required');
            $this->form_validation->set_rules('cd_cinema', 'O cinema que o funcionario trabalha', 'required');
            $this->form_validation->set_rules('TempoDeServico', 'A quantia de dias trabalhados no mês', 'required');

            if ($this->form_validation->run() == false) {
                $data['funcionarios'] = $this->Funcionarios_model->getONE($id);
                $this->load->view('Header');
                $this->load->view('FormFuncionario', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nome' => $this->input->post('nome'),
                    'sal_funcionario' => $this->input->post('sal_funcionario'),
                    'cd_cinema' => $this->input->post('cd_cinema'),
                    'TempoDeServico' => $this->input->post('TempoDeServico'),
                );
                if ($this->Funcionarios_model->update($id, $data)) {
                    redirect('Funcionarios/listar');
                } else {
                    redirect('Funcionarios/alterar' . $id, $data);
                }
            }
        } else {
            redirect('Funcionarios/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {
            if ($this->Funcionarios_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Funcionario deletado com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar funcionario...');
            }
        }
        redirect('Funcionarios/listar');
    }

}
