<div class="login-block">
    <?php echo $this->Html->image('/template/img/logo.png', array('alt' => 'logo')); ?>
    <h1>Faça o login</h1>   

    <?php echo $this->Form->create('User'); ?>

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="ti-email"></i></span>
                <?php echo $this->Form->input('email', array(
                    'class' => 'form-control',
                    'placeholder' => __("Seu email"),
                    'label' => false,
                    'required' => true,
                    'autofocus' => 'true',
                    'div' => false
                ));?>
            </div>
        </div>
        
        <hr class="hr-xs">

        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><i class="ti-unlock"></i></span>
                <?php echo $this->Form->input('senha', array(
                    'type' => 'password',
                    'class' => 'form-control',
                    'placeholder' => __("Senha"),
                    'label' => false,
                    'required' => true,
                    'div' => false
                ));?>
            </div>
        </div>

        <button type="submit" class="btn btn-primary btn-block"><?php echo __("Entrar"); ?></button>

    <?php echo $this->Form->end(); ?>
</div>

<div class="login-links">
    <?php echo $this->html->link(__("Esqueceu a senha?"), array("controller" => "users", "action" => 'forgot'), array("class" => "pull-left", "escape" => false)); ?>
    <?php echo $this->html->link(__("Fazer Cadastro."), array("controller" => "users", "action" => 'add'), array("class" => "pull-right", "escape" => false)); ?>
</div>