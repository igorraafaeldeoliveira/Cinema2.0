<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    </head>
    <body>     
        <div class="container-expand">
            <img class="img-fluid" style="border:4px solid #B4030C;" src="<?= base_url() . '\IMAGENS\CABEÇALHO(PRINT).png' ?>">

            <nav  class="navbar navbar-dark bg-dark navbar-expand-md" >

                <img src="" alt=""/>
                <a class="navbar-brand" href="<?= $this->config->base_url(); ?>">
                    <font color='white'>Cine Star</font>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                        <!-------------------------------------------------------- FILME -------------------------------------------------------->
                        <li class="nav-item dropdown">
                            <a href="#" id="menuProva" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <font color="white">Filme</font> 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="menuFilme">
                                <a href="<?= $this->config->base_url() . 'Filme/listar'; ?>" class="dropdown-item">Pré-Visualização</a>
                                <a href="<?= $this->config->base_url() . 'Filme/cadastrar'; ?>"  class="dropdown-item">Cadastro</a>   
                            </div>
                        </li>

                        <!-------------------------------------------------------- CINEMA -------------------------------------------------------->
                        <li class="nav-item dropdown">
                            <a href="#" id="menuProva" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <font color="white">Cinema</font> 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="menuCinema">
                                <a href="<?= $this->config->base_url() . 'Cinema/listar'; ?>" class="dropdown-item">Lista</a>
                                <a href="<?= $this->config->base_url() . 'Cinema/cadastrar'; ?>"  class="dropdown-item">Cadastro</a>   
                            </div>
                        </li>

                        <!-------------------------------------------------------- FUNCIONARIOS -------------------------------------------------------->


                        <li class="nav-item dropdown">
                            <a href="#" id="menuFuncionario" class="nav-link dropdown-toggle" data-toggle="dropdown">
                                <font color="white">Funcionarios</font> 
                            </a>
                            <div class="dropdown-menu" aria-labelledby="menuFuncionario">
                                <a href="<?= $this->config->base_url() . 'Funcionario/listar'; ?>" class="dropdown-item">Lista</a>
                                <a href="<?= $this->config->base_url() . 'Funcionario/cadastrar'; ?>"  class="dropdown-item">Cadastro</a>   
                            </div>
                        </li>






                </div>
                <!-------------------------------------------------------- LOGIN -------------------------------------------------------->
                <?php
                if ($this->session->userdata('status') < 1) {
                    echo '<a class="nav-link btn btn-info" href="' . base_url('Usuario/login') . '">Login</a>';
                } else {
                    ?>      
                    <!-------------------------------------------------------- Campo de  Usuario -------------------------------------------------------->
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item dropdown pull-left">
                            <a href="#" id="menuCliente" class="nav-link dropdown-toggle text-light" data-toggle="dropdown"><i class="fas fa-user username"></i> <?= $this->session->userdata('nome'); ?></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="menuCliente">
                                <a class="dropdown-item" href="<?= base_url() . 'Cliente/promocoes' ?>"><i class="fas fa-gift"></i> Promoções para clientes <i class="fas fa-gift"></i></a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url() . 'Usuario/sair' ?>"><i class="fas fa-sign-out-alt"></i> Sair</a>
                            </div>
                        </li>
                    </ul>
                <?php } ?>
                <!-------------------------------------------------------- LOGIN -------------------------------------------------------->

            </nav>
        </div>
