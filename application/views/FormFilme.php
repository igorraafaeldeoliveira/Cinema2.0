<div class="container-expand ">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url(); ?>">Pré-Visualização</a></li>
            <li class="breadcrumb-item active" aria-current="page">Cadastro de Filmes </li>
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
                <h3>Cadastro de filmes em cartaz</h3>
                <form enctype="multipart/form-data" action = "" method = "post">
                    <input type = "hidden" name = "id" value = "<?= (isset($cliente)) ? $cliente->id : ''; ?>">

                    <div class = "form-group">
                        <label for="nomeFilme"> Nome do filme:</label>
                        <input type="text" class="form-control" name="nomeFilme" id="nomeFilme" value="<?= (isset($filmes)) ? $filmes->nomeFilme : ''; ?>">                   
                    </div>

                    <!-- ------------------------------------------------------------CINEMA------------------------------------------------------------ -->
                    <div class = "form-group">
                        <label for = "cinema"> Cinema que deseja exibir:</label>
                        <select class="form-control" name="cinema">
                            <option value=""> O cinema se encontra em:</option>
                            <?php
                            foreach ($cinema as $ci) {
                                echo '<option ';
                                echo ' value=' . $ci->id_cinema . ' >' . $ci->nomeCinema . '</option>';
                            }
                            ?>
                        </select>
                    </div>


                    <!-- ------------------------------------------------------------CLASSSIFICAÇÃO INDICATIVA------------------------------------------------------------ -->
                    <div class = "form-group">
                        <label for = " classificacao">Classificação indicativa:</label>
                        <select class="form-control" name="classificacao">
                            <option>O filme é indicado para:</option>
                            <?php
                            foreach ($classificacao as $c) {
                                echo '<option ';

                                echo ' value=' . $c->id . ' >' . $c->classificacaoIndicativa . '</option>';
                            }
                            ?>
                        </select>
                    </div>


                    <div class = "form-group">
                        <label for = " classificacaoIndicativa">Gênero:</label>
                        <input type = "text" class = "form-control" name = "genero" id = "genro" value = "<?= (isset($filmes)) ? $filmes->genero : ''; ?>">
                    </div>

                    <div class = "form-group">
                        <label for = "diretor"> Diretor:</label>
                        <input type = "text" class = "form-control" name = "diretor" id = "genero" value = "<?= (isset($filmes)) ? $filmes->diretor : ''; ?>">
                    </div>

                    <!-- ------------------------------------------------------------STATUS------------------------------------------------------------ -->
                    <div class = "form-group">
                        <label for = "status"> Estado do filme:</label>
                        <select class="form-control" name="status">
                            <option>O filme está:</option>
                            <?php
                            foreach ($status as $s) {
                                echo '<option ';
                                echo ' value=' . $s->id_status . ' >' . $s->tx_descricao . '</option>';
                            }
                            ?>
                        </select>
                    </div>


                    <div class = "form-group">
                        <label for = "duracaoFilme"> Duração do filme:</label>
                        <input type = "time" class = "form-control" name = "duracaoFilme" id = "duracaoFilme" value = "<?= (isset($filmes)) ? $filmes->duracaoFilme : ''; ?>">
                    </div>

                    <div class = "form-group">
                        <label for = "sinopse">Sinopse:</label>
                        <input type = "text" class = "form-control" name = "sinopse" id = "sinopse" value = "<?= (isset($filmes)) ? $filmes->sinopse : ''; ?>">
                    </div>

                    <div class = "form-group">
                        <label for = "companhia">Companhia produtora:</label>
                        <input type = "text" class = "form-control" name = "companhia" id = "companhia" value = "<?= (isset($filmes)) ? $filmes->companhia : ''; ?>">
                    </div>

                    <div class = "form-group">
                        <label for = "atores">Elenco do filme:</label>
                        <input type = "text" class = "form-control" name = "atores" id = "atores" value = "<?= (isset($filmes)) ? $filmes->atores : ''; ?>">
                    </div>


                    <div class="form-group">
                        <label for = "bannerFilme"> Banner do filme :</label>
                        <input type="file" name="userFile"  class="form-control" id="userFile">
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
