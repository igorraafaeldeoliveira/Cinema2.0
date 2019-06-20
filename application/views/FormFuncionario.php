<div class="container-expand ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url() . 'Funcionario/listar'; ?>">Ir para lista</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Funcionarios</li>
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
        <div class = "card-header col-6 offset-md-3 ">
            <div>
                <h3>Cadastro de Funcionario</h3>
                <form enctype="multipart/form-data" action = "" method = "post">
                    <input type = "hidden" name = "id" value = "<?= (isset($cliente)) ? $cliente->id : ''; ?>">

                    <div class = "form-group">
                        <label for="nome"> Nome do funcionario:</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="<?= (isset($funcionarios)) ? $funcionarios->nome : ''; ?>">                   
                    </div>

                    <div class = "form-group">
                        <label for = "sal_funcionario" > Salario do funcionario:</label>                    
                        <input type = "text" class = "form-control "  placeholder="R$" name = "sal_funcionario" id = "sal_funcionario" value = "<?= (isset($funcionarios)) ? $funcionarios->sal_funcionario : ''; ?>">
                    </div>                 
                    
                    <!-- ------------------------------------------------------------CINEMA------------------------------------------------------------ -->
                    <div class = "form-group">
                        <label for = "cd_cinema"> Cinema que o funcionário está empregado:</label>
                        <select class="form-control" name="cd_cinema">
                            <option>o funcionário está empregado em:</option>
                            <?php
                            foreach ($cinema as $ci) {
                                echo '<option ';
                                echo ' value=' . $ci->id_cinema . ' >' . $ci->nomeCinema . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class = "form-group">
                        <label for = "TempoDeServico">Dias trabalhados(p/mês):</label>
                        <input type = "number" class = "form-control" name = "TempoDeServico" id = "TempoDeServico" value = "<?= (isset($funcionarios)) ? $funcionarios->TempoDeServico : ''; ?>">
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
