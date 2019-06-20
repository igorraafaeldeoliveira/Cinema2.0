<div class="container-expand ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Ir para lista</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Cinema</li>
        </ol>
    </nav>

    <?php
    $mensagem = $this->session->flashdata('mensagem');
    echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
        echo validation_errors();
    ?>
</div>

<br>

<div class="container">
    <div class = "row-md-4">   
        <div  class = " card-header col-6 offset-md-3 ">
            <div>
                <h3>Cadastro de cinema</h3>

                <form action = "" method = "post">
                    <input type = "hidden" name = "id" value = "<?= (isset($cliente)) ? $cliente->id : ''; ?>">

                    <div class = "form-group">
                        <label for = "nomeCinema"> <h6>Nome:</h6></label> <h6 class="text-black-50">EX:Cine Star(SMO)</h6>
                        <input type = "text" class = "form-control" name = "nomeCinema" id = "nomeCinema" value = "<?= (isset($cinemas)) ? $cinemas->nomeCinema : ''; ?>">
                    </div>

                    
                    <button type = "submit" class = "btn btn-outline-success">Enviar</button>
                    <button type = "reset" class="btn btn-outline-danger my-2 my-sm-0">Limpar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
