<a href="ListaFuncionarios.php"></a>
<div class="container-expand">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= $this->config->base_url() . 'Funcionario/cadastrar'; ?>">Ir para cadastrar</a></li>
            <li class="breadcrumb-item active" aria-current="page">Lista de Funcionarios </li>
        </ol>
    </nav>

    <?php
    $mensagem = $this->session->flashdata('mensagem');
    echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
    ?>
</div>

<h1 style="text-align:center;"><i class=""></i> Lista de Funcionarios <i class=""></i></h1>
<br>
<div class="table-responsive">
    <table class='table' border="1">
        <thead class="thead-dark">
            <tr>
                <th>Nome:</th>  
                <th>Salario do funcionario:</th>
                <th>Trabalha em:</th>   
                <th>Horas de trabalho(dia):</th>
                <th>Opções</th>

            </tr> 
        </thead>
        <tbody>
            <?php
            foreach ($funcionarios as $f) {
                echo '<tr>';
                echo '<td>' . $f->nome . '</td>';
                echo '<td>' . $f->sal_funcionario . '</td>';
                echo '<td>' . $f->nomeCinema . '</td>';
                echo '<td>' . $f->TempoDeServico . '</td>';
                echo '<td>' . '<a href="' . $this->config->base_url()
                . 'Funcionario/alterar/'
                . $f->id_funcionario . '"> <i class="fas fa-pen"></i> Alterar </a>'
                . ' / '
                . '<a href="' . $this->config->base_url()
                . 'Funcionario/deletar/'
                . $f->id_funcionario . '"> <i class="fas fa-trash"></i> Deletar </a>'
                . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>

