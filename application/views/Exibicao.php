<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
?>


<br>
<div>
     <hr class="NomeDetalhes">
    <h1 class="text-center FilmeCartazHome"><font color="#12278a">Filmes em cartaz:</font></h1>
     <hr class="NomeDetalhes">
</div>
<br>
<div class="container-fluid">
    <div class="row">

        <?php
        foreach ($filmes as $f) {
            if ($f->status == 1) {
                echo'<div class="col-4">';
                echo ' <div class="card ml-3 bg-dark text-white" style="width:25rem; border:3px solid #000000;">';
                echo '<div class="text-center"> <img class="card-img-top  img-fluid imagemigor"   src="' . base_url('uploads/' . $f->bannerFilme) . '"  ></div>';
                echo '<hr>';
                echo '<h5 class="card-body text-center Limitador">' . $f->nomeFilme . '</h5>';
                echo '<hr>';
                echo '<div class="text-justify Limitador2 "> <p>' . character_limiter($f->sinopse, 140) . '</p></div>';
                echo '<hr>';
                echo '<ul>';
                echo'<div class="Limitador"> <p>Agora: ' . $f->tx_descricao . ' em ' . $f->nomeCinema . '</p></div>';
                echo'<div class="Limitador"> <p>Classificação: ' . $f->classificacaoIndicativa . '</p></div>';
                echo '<div class="Limitador"> <p>Gênero: ' . $f->genero . '</p></div>';
                echo '<div class="Limitador"> <p>Diretor: ' . $f->diretor . ' </p></div>';
                echo '<div class="Limitador"> <p>Feito por: ' . $f->companhia . '</p></div>';       
                '</ul>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>

    </div>
</div>
</body>
</html>