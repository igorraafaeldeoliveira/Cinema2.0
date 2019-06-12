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
        $this->load->model('Filmes_model', 'f');
        $this->load->model('Cinemas_model');
        $this->load->model('Status_model');
        $this->load->model('Classificacoes_model');
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $data['filmes'] = $this->f->getALL();
        $this->load->view('Header');
        $this->load->view('ListaFilmes', $data);
        $this->load->view('Footer');
    }

    public function cadastrar() {
        $this->form_validation->set_rules('nomeCinema', 'nomeCinema', 'required');
        $this->form_validation->set_rules('cinema', 'cinema', 'required');
        $this->form_validation->set_rules('classificacaoIndicativa', 'classificacaoIndicativa', 'required');
        $this->form_validation->set_rules('genero', 'genero', 'required');
        $this->form_validation->set_rules('diretor', 'diretor', 'required');
        $this->form_validation->set_rules('tx_descricao ', 'tx_descricao ', 'required');
        $this->form_validation->set_rules('duracaoFilme', 'duracaoFilme', 'required');
        $this->form_validation->set_rules('sinopse', 'sinopse', 'required');
        $this->form_validation->set_rules('companhia', 'companhia', 'required');
        $this->form_validation->set_rules('atores', 'atores', 'required');
        //$this->form_validation->set_rules('bannerFilme', 'bannerFilme', 'required');


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
                'cinema' => $this->input->post('nomeCinema'),
               /* 'classificacao' => $this->input->post('classificacaoIndicativa'),
                'genero' => $this->input->post('genero'),
                'diretor' => $this->input->post('diretor'),
                'status' => $this->input->post('tx_descricao'),
                'duracaoFilme' => $this->input->post('duracaoFilme'),
                'sinopse' => $this->input->post('sinopse'),
                'companhia' => $this->input->post('companhia'),
                'atores' => $this->input->post('atores'), */
                    //'bannerFilme' => $this->input->post('bannerFilme'), 
            );
   print_r($data); exit;
            if ($this->Cinemas_model->insert($data)) {
                redirect('Filme/listar');
            } else {
                redirect('Filme/cadastrar');
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
            // $this->form_validation->set_rules('bannerFilme', 'bannerFilme', 'required');

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
