<a href="ListaCinemas.php"></a>
<div class="container-expand">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url() . 'Cinema/cadastrar'; ?>">Ir para cadastrar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Cinemas </li>
        </ol>
    </nav>

    <?php
    $mensagem = $this->session->flashdata('mensagem');
    echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
    ?>
</div>

<h1 style="text-align:center;"><i class=""></i> Lista de Cinemas <i class=""></i></h1>
<br>
<div class="table-responsive">
    <table class='table' border="1">
        <thead class="thead-dark">
            <tr>
                <th>Nome:</th>  
                <th>Opções</th>

            </tr> 
        </thead>
        <tbody>
            <?php
            foreach ($cinemas as $c) {
                echo '<tr>';
                echo '<td>' . $c->nomeCinema . '</td>';
                echo '<td>' . '<a href="' . $this->config->base_url()
                . 'Cinema/alterar/'
                . $c->id_cinema . '"> <i class="fas fa-pen"></i> Alterar </a>'
                . ' / '
                . '<a href="' . $this->config->base_url()
                . 'Cinema/deletar/'
                . $c->id_cinema . '"> <i class="fas fa-trash"></i> Deletar </a>'
                . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

