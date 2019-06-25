<a href="HOME.php"></a>
<div class="container-expand">
    <?php
    $mensagem = $this->session->flashdata('mensagem');
    echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
    ?>
</div>
<div class="row">
    <div class="col">
        <!---------------------------------------------------------CARROUSEL--------------------------------------------------------->

        <!----------indicador--------->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol> 
            <!----------pagina--------->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="<?= base_url('uploads/2.jpg') ?>"  alt="First slide"  height="698">
                    <div class="carousel-caption d-none d-md-block">

                        <h5>Sinta nossa experiência classíca</h5>
                        <p>Nosso cinema possuí mais de 50 cadeiras acolchoadas em couro.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url('uploads/1.jpg') ?>"alt="Second slide"  height="698">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Venha conhecer nosso cinema!</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url('uploads/3.jpg') ?>" alt="Third slide" height="698" >
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Se permita descobrir uma forma mais confortavel de consumir filmes!</h5>
                    </div>
                </div>
            </div>
            <!-- left / right-->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                <hr size=”10″></a> 
        </div>


    </div>
</div>

<hr>

<br>
<div>
    <h1 class="text-center FilmeCartazHome"><font color="#12278a">Filmes na rede:</font></h1>
</div>
<br>

<div class="row">

    <?php
    foreach ($filmes as $f) {

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
        echo'<div class="Limitador"> <p>Classificação indicativa: ' . $f->classificacaoIndicativa . '</p></div>';
        echo '<div class="Limitador"> <p>Gênero: ' . $f->genero . '</p></div>';
        echo '<div class="Limitador"> <p>Diretor: ' . $f->diretor . ' </p></div>';
        echo '<div class="Limitador"> <p>O filme dura: ' . $f->duracaoFilme . ' min</p></div>';
        echo '<div class="Limitador"> <p>Feito por: ' . $f->companhia . '</p></div>';
        echo '<div class="Limitador"> <p>Com a presença de: ' . $f->atores . '</p></div>';
        '</ul>';

        echo'<button type="submit" class="btn btn-outline-success">Programação</button>';


        echo '</div>';
        echo '</div>';
    }
    ?>

</div>
</body>
</html>

