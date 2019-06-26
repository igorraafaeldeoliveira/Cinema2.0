<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

defined('BASEPATH') OR exit('No direct scrip acess allowed');

class FaleConosco extends CI_Controller {

    public function __construct() {
        //chama o construtor da calsse pai (CI_Controller)
        parent:: __construct();
    }

    public function index() {
        // echo'Hello World!!'; envés disso chama-se:
        $this->listar();
    }

    public function listar() {
        $this->load->view('Telainicial/Header');
        $this->load->view('FaleConosco');
        $this->load->view('Telainicial/Footer');
    }

    public function FaleConosco() {
        $this->form_validation->set_rules('email', 'O e-mail é requirido', 'required');
        $this->form_validation->set_rules('mensagem', 'A mensagem é requirida', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('TelaInicial/Header');
            $this->load->view('FaleConosco');
            $this->load->view('TelaInicial/Footer');
        } else {
            //configuracao para mandar email
            $this->load->library("email");
            $config = array(
                'mailtype' => "html",
            );
            $this->email->initialize($config);

            $this->email->from($this->input->post('email'), 'Cliente');
            $this->email->to('igor.oliveira@aluno.sc.senac.br');
            $this->email->subject('UM NOVO E-MAIL DE AVALIAÇÃO DA REDE CINE STAR');
            $this->email->message($this->input->post('mensagem'));
            if ($this->email->send()) {
                $this->session->set_flashdata('mensagem', 'Seu e-mail foi enviado com sucesso!');
                redirect('FaleConosco/FaleConosco');
            } else {
                show_error($this->email->print_debugger());
                $this->session->set_flashdata('mensagem', 'Seu e-mail não pode ser enviado, tente novamente ou espere alguns minutos.');
                redirect('FaleConosco/FaleConosco');
            }
        }
    }

}
