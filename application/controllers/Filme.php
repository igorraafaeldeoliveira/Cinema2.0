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
        $this->load->model('Filmes_model', 'f');
        $data['filmes'] = $this->f->getALL();
        $this->load->view('Header');
        $this->load->view('ListaFilmes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nomeFilme', 'nomeFilme', 'required');
    /*  $this->form_validation->set_rules('cinema', 'cinema', 'required');
         $this->form_validation->set_rules('classificacao', 'classificacao', 'required');
        $this->form_validation->set_rules('genero', 'genero', 'required');
        $this->form_validation->set_rules('diretor', 'diretor', 'required');
        $this->form_validation->set_rules('status ', 'status ', 'required');
        $this->form_validation->set_rules('duracaoFilme', 'duracaoFilme', 'required');
        $this->form_validation->set_rules('sinopse', 'sinopse', 'required');
        $this->form_validation->set_rules('companhia', 'companhia', 'required');
        $this->form_validation->set_rules('atores', 'atores', 'required');
       $this->form_validation->set_rules('bannerFilme', 'bannerFilme', 'required');*/


        if ($this->form_validation->run() == false) {           
            $data['status'] = $this->Status_model->getALL();
            $data['cinema'] = $this->Cinemas_model->getALL();
            $data['classificacao'] = $this->Classificacoes_model->getALL();
            $this->load->view('Header');
            $this->load->view('FormFilme', $data);
            $this->load->view('Footer');
        } else {
            echo 'teste'; exit;
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
                'bannerFilme' => $this->input->post('bannerFilme'),
            );
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_width'] = 1024;
            $config['max_height'] = 768;
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('bannerFilme')) {
                $error = $this->upload->display_errors();
                //cria uma sessão com o error e o redireciona
                $this->session->set_flashdata('mensagem');
                redirect('Filme/listar'); //Se der certo manda para a lista 
                exit();
            } else {
                //pega o nome do arquivo que foi enviado e adiciona no array $data que
                $data['bannerFilme'] = $this->upload->data('file_name');
            }
            if ($this->Filmes_model->insert($data)) {
                $this->session->set_flashdata('mensagem', '<div class="alert alert sucees>Sucesso</div>"');
                redirect('Filme/listar');
            } else {
                redirect('Filme/cadastrar');
                $this->session->set_flashdata('mensagem', '<div class="alert alert danger>Sucesso</div>"');
            }
        }
    }

    public function alterar($id) {
        if ($id > 0) {

            $this->form_validation->set_rules('nomeFilme', 'nomeFilme', 'required');
            $this->form_validation->set_rules('cinema', 'cinema', 'required');
            $this->form_validation->set_rules('classificacao', 'classificacao', 'required');
            $this->form_validation->set_rules('genero', 'genero', 'required');
            $this->form_validation->set_rules('diretor', 'diretor', 'required');
            $this->form_validation->set_rules('status ', 'status ', 'required');
            $this->form_validation->set_rules('duracaoFilme', 'duracaoFilme', 'required');
            $this->form_validation->set_rules('sinopse', 'sinopse', 'required');
            $this->form_validation->set_rules('companhia', 'companhia', 'required');
            $this->form_validation->set_rules('atores', 'atores', 'required');
            $this->form_validation->set_rules('bannerFilme', 'bannerFilme', 'required');

            if ($this->form_validation->run() == false) {
                $data['filmes'] = $this->Filmes_model->getONE($id);
                $this->load->view('FormFilme', $data);
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
                    'bannerFilme' => $this->input->post('bannerFilme'),
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

            if ($this->Filmes_model->delete($id)) {
                $this->session->set_flashdata('mensagem', 'Filme deletado com sucesso!');
            } else {
                $this->session->set_flashdata('mensagem', 'Falha ao deletar filme...');
            }
        }
        redirect('Filme/listar');
    }

}
