<div class="login-block">
    <?php echo $this->Html->image('/template/img/logo.png', array('alt' => 'logo')); ?>
    <h1>Cadastro</h1>

    <?php echo $this->Form->create('User', array('class' => '')); ?>

        <?php echo $this->Form->input('nome', array(
            'class' => 'form-control',
            'placeholder' => __("Seu nome"),
            'label' => false,
            'required' => true,
            'autofocus' => true,
            'before' => '<div class="input-group"><span class="input-group-addon"><i class="ti-user"></i></span>',
            'after' => '</div><hr class="hr-xs">',
            'div' => array('class' => "form-group"),
            'error' => array('attributes' => array( 'class' => 'text-danger')),
        ));?>
        
        <?php echo $this->Form->input('email', array(
            'class' => 'form-control',
            'placeholder' => __("Seu email"),
            'label' => false,
            'required' => true,
            'before' => '<div class="input-group"><span class="input-group-addon"><i class="ti-email"></i></span>',
            'after' => '</div><hr class="hr-xs">',
            'div' => array('class' => "form-group"),
            'error' => array('attributes' => array( 'class' => 'text-danger')),
        ));?>

        <?php echo $this->Form->input('senha', array(
            'class' => 'form-control',
            'placeholder' => __("Sua senha"),
            'label' => false,
            'required' => true,
            'type' => 'password',
            'before' => '<div class="input-group"><span class="input-group-addon"><i class="ti-unlock"></i></span>',
            'after' => '</div><hr class="hr-xs">',
            'div' => array('class' => "form-group"),
            'error' => array('attributes' => array( 'class' => 'text-danger')),
        ));?>

        <?php echo $this->Form->input('tipo', array(
            'class' => 'form-control',
            'placeholder' => __("Escolha o Tipo"),
            'label' => false,
            'required' => true,
            'empty' => 'Escolha o tipo de cadastro',
                'title' => 'Escolha o tipo de cadastro',
                'options' => array(
                    'trabalhador' => 'Procurando emprego (trabalhador)',
                    'empregador' => 'Oferecendo emprego (empregador)',
                ),
            'div' => array('class' => "form-group"),
            'error' => array('attributes' => array( 'class' => 'text-danger')),
        ));?>

        <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>

    <?php echo $this->Form->end(); ?>
</div>

<div class="login-links">
    <p class="text-center">Já tem uma conta? <?php echo $this->Html->link(__("login"), array("controller" => "users", "action" => 'login'), array("class" => "txt-brand", "escape" => false)); ?></p>
</div>