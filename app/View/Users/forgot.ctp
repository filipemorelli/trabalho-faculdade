<div class="login-block">
    <?php echo $this->Html->image('/template/img/logo.png', array('alt' => 'logo')); ?>
    <h1>Esqueceu a Senha</h1>

    <?php echo $this->Form->create('User', array('class' => '')); ?>

    <div class="form-group">
        <div class="input-group">
            <span class="input-group-addon"><i class="ti-email"></i></span>
            <?php echo $this->Form->input('email', array(
                'class'       => 'form-control',
                'placeholder' => __("Seu email"),
                'label'       => false,
                'required'    => true,
                'autofocus'   => 'true',
                'div'         => false
            )); ?>
        </div>
    </div>

    <button class="btn btn-primary btn-block" type="submit">Mudar a senha</button>
    <?php echo $this->Form->end(); ?>
</div>

<div class="login-links">
    <?php echo $this->Html->link(__("Fazer Login?"), array(
        "controller" => "users",
        "action"     => 'login'
    ), array(
        "class"  => "pull-left",
        "escape" => false
    )); ?>
    <?php echo $this->Html->link(__("Fazer Cadastrar."), array(
        "controller" => "users",
        "action"     => 'add'
    ), array(
        "class"  => "pull-right",
        "escape" => false
    )); ?>
</div>