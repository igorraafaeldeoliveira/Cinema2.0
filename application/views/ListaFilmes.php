<a href="ListaFilmes.php"></a>
<div class="container-expand">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item "><a href="<?= $this->config->base_url() . 'Filme/cadastrar'; ?>">Ir para cadastrar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Pré-visualização </li>
        </ol>
    </nav>

    <?php
    $mensagem = $this->session->flashdata('mensagem');
    echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
    ?>
</div>

<br>
<div>
    <h1 class="text-center FilmeCartazHome"><font color="#12278a">Filmes na rede:</font></h1>
</div>
<br>

<div class="row">
    <div class="col-md-4">
        <?php
        echo $this->session->userdata('status');
        echo $this->session->userdata('email');

        foreach ($filmes as $f) {

            echo'<div class="col-2 offset-1 ">';
            echo ' <div class="card bg-dark text-white" style="width:25rem; border:3px solid #000000;">';
            echo '<div class="text-center"> <img class="card-img-top  img-fluid imagemigor"   src="' . base_url('uploads/' . $f->bannerFilme) . '"  ></div>';
            echo '<hr>';
            echo '<h5 class="card-header text-center">' . $f->nomeFilme . '</h5>';
            echo '<hr>';
            echo '<div class="sinopse"> <p>' . $f->sinopse . '</p></div>';
            echo '<hr>';
            echo '<ul class="">';
            echo'<div class=""> <p>Agora: ' . $f->tx_descricao . ' em ' . $f->nomeCinema . '</p></div>';
            echo'<div class=""> <p>Classificação indicativa: ' . $f->classificacaoIndicativa . '</p></div>';
            echo '<div class=""> <p>Gênero: ' . $f->genero . '</p></div>';
            echo '<div class=""> <p>Diretor: ' . $f->diretor . ' </p></div>';
            echo '<div class=""> <p>O filme dura: ' . $f->duracaoFilme . ' min</p></div>';
            echo '<div class=""> <p>Feito por: ' . $f->companhia . '</p></div>';
            echo '<div class=""> <p>Com a presença de: ' . $f->atores . '</p></div>';
            '</ul>';
            echo '<td>' . '<a href="' . $this->config->base_url()
            . 'Filme/alterar/'
            . $f->nomeFilme . '"> <i class="fas fa-pen"></i> Alterar </a>'
            . ' / '
            . '<a href="' . $this->config->base_url()
            . 'Filme/deletar/'
            . $f->nomeFilme . '"> <i class="fas fa-trash"></i> Deletar </a>'
            . '</td>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</div>
</body>
</html>

