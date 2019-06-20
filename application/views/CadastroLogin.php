<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container mt-5">
            <div class="card mx-auto" style="max-width:300px;">
                <div class="card-header">
                    <div class="text-center"><i class="far fa-user"></i>   Cadastro de Usuário  <i class="far fa-user"></i></div>
                </div>        
                
                <div class="card-body">
                    <?php
                    $mensagem = $this->session->flashdata('mensagem');
                    echo (isset($mensagem) ? '<div class="alert alert-warning" role="alert"> ' . $mensagem . '</div>' : '');
                    ?>

                    <form action="" method="POST" name="login">
                        <label for="email">E-mail:</label>
                        <input type="text" class="form-control"  name="email" id="email">


                        <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="password" class="form-control"  name="senha" id="senha">
                        </div>   
                     <button type = "submit" class = "btn btn-outline-success">Enviar</button>
                        </button>                
                    </form>
                </div>
            </div>
        </div> 
</body>
</html>
