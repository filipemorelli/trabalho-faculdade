<?php
echo $this->Form->create('Empresa', array('type' => 'file'));
?>
<header class="page-header">
    <div class="container page-name">
        <h1 class="text-center">Criar Vaga de Emprego</h1>
        <p class="lead text-center">Crie uma nova vaga de emprego.</p>
    </div>
    <?php
    echo $this->element('Empresas/vagas');
    ?>
    </form>