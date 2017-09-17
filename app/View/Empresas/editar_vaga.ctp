<?php
echo $this->Form->create('Empresa', array('type' => 'file'));
?>
<header class="page-header">
    <div class="container page-name">
        <h1 class="text-center">Editar Vaga de Emprego - <?php echo $this->request->data['Vaga']['nome']; ?></h1>
    </div>
    <?php
    echo $this->element('Empresas/vagas');
    ?>
    </form>