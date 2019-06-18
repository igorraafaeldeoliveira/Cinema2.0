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
        $this->load->model('Filmes_model');
        $this->load->model('Cinemas_model');
        $this->load->model('Status_model');
        $this->load->model('Classificacoes_model');
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $data['filmes'] = $this->Filmes_model->getALL();
        $this->load->view('Header');
        $this->load->view('ListaFilmes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nomeFilme', 'Nome do Filme', 'required');
        $this->form_validation->set_rules('cinema', 'Nome do Cinema', 'required');
        $this->form_validation->set_rules('classificacao', 'classificacao', 'required');
        $this->form_validation->set_rules('genero', 'Gênero', 'required');
        $this->form_validation->set_rules('diretor', 'Diretor', 'required');
        $this->form_validation->set_rules('status', 'O status atual do filme', 'required');
        $this->form_validation->set_rules('duracaoFilme', 'Duração do Filme', 'required');
        $this->form_validation->set_rules('sinopse', 'Sinopse', 'required');
        $this->form_validation->set_rules('companhia', 'Companhia', 'required');
        $this->form_validation->set_rules('atores', 'Atores', 'required');


        if ($this->form_validation->run() == false) {
            $data['status'] = $this->Status_model->getALL();
            $data['cinema'] = $this->Cinemas_model->getALL();
            $data['classificacao'] = $this->Classificacoes_model->getALL();
            $this->load->view('Header');
            $this->load->view('FormFilme', $data);
            $this->load->view('Footer');
        } else {

            $data = array(
                'nomeFilme' => $this->input->post('nomeFilme'),
                'cinema' => $this->input->post('cinema'),
                'classificacao' => $this->input->post('classificacao'),
                'genero' => $this->input->post('genero'),
                'diretor' => $this->input->post('diretor'),
                'status' => $this->input->post('status'),
                'duracaoFilme' => $this->input->post('duracaoFilme'),
                'sinopse' => $this->input->post('sinopse'),
                'companhia' => $this->input->post('companhia'),
                'atores' => $this->input->post('atores'),
            );
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_whidth'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);



            if (!$this->upload->do_upload('userFile')) {
                $error = $this->upload->display_errors();
                //cria uma sessão com o error e redireciona
                $this->session->set_flashdata('mensagem', $error);
                redirect('Filme/listar'); //se der certo manda para a lista
                exit();
            } else {
                $data['bannerFilme'] = $this->upload->data('file_name');
            }

            if ($this->Filmes_model->insert($data)) {
                $this->session->set_flashdata('mensagem', 'Cadastrado com sucesso!');
                redirect('Filme/listar'); //se der certo manda para a lista
            } else {
                unlink('./uploads/' . $data['bannerFilme']);
                $this->session->set_flashdata('mensagem', 'Erro');
                redirect('Filme/cadastrar');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {
            $this->form_validation->set_rules('nomeFilme', 'Nome do Filme', 'required');
            $this->form_validation->set_rules('cinema', 'Nome do Cinema', 'required');
            $this->form_validation->set_rules('classificacao', 'classificacao', 'required');
            $this->form_validation->set_rules('genero', 'Gênero', 'required');
            $this->form_validation->set_rules('diretor', 'Diretor', 'required');
            $this->form_validation->set_rules('status', 'O status atual do filme', 'required');
            $this->form_validation->set_rules('duracaoFilme', 'Duração do Filme', 'required');
            $this->form_validation->set_rules('sinopse', 'Sinopse', 'required');
            $this->form_validation->set_rules('companhia', 'Companhia', 'required');
            $this->form_validation->set_rules('atores', 'Atores', 'required');

            if ($this->form_validation->run() == false) {
                $data['filmes'] = $this->Filmes_model->getONE($id);
                $this->load->view('Header');
                $this->load->view('FormFilme', $data);
                $this->load->view('Footer');
            } else {
                $data = array(
                    'nomeFilme' => $this->input->post('nomeFilme'),
                    'cinema' => $this->input->post('cinema'),
                    'classificacao' => $this->input->post('classificacao'),
                    'genero' => $this->input->post('genero'),
                    'diretor' => $this->input->post('diretor'),
                    'status' => $this->input->post('status'),
                    'duracaoFilme' => $this->input->post('duracaoFilme'),
                    'sinopse' => $this->input->post('sinopse'),
                    'companhia' => $this->input->post('companhia'),
                    'atores' => $this->input->post('atores'),
                ); 
            }
        } else {
            redirect('Filme/listar');
        }
    }

    public function deletar($id) {
        if ($id > 0) {

            if ($this->Filmes_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Filme deletado com sucesso!');
                unlink('./uploads/' . $id->bannerFilme);
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar filme...');
            }
        }
        redirect('Filme/listar');
    }

}
