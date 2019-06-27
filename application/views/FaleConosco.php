

<?php
$mensagem = $this->session->flashdata('mensagem');
echo (isset($mensagem) ? '<div class="alert alert-success" role="alert"> ' . $mensagem . '</div>' : '');
 echo validation_errors();
 ?>

<br>
<br>
<br>
<div class="container" style="min-height:400px;">

    <form action=""  class="card-header" method="post">

        <h2 class="text-center">Nos de sua sugestão ou melhoria!</h2>
        <div class="form-group">
            <label for="email">Seu mail:</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
        </div>

        <div class="form-group">
            <label for="mensagem">Informe aqui sua mensagem:</label>
            <textarea class="form-control" id="mensagem" name="mensagem" rows="3"></textarea>
            <br>
            <div class="text-center">
                <button type = "submit" style="font-size:18px;" class = "btn btn-large btn-outline-success">Enviar</button>
            </div>
        </div>
    </form>
</div>