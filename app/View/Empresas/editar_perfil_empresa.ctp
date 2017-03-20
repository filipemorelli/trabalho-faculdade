<?php
    echo $this->form->create('Empresa', array('type' => 'file'));
    echo $this->Form->input('id', array('type' => 'hidden'));
?>
<header class="page-header">
    <div class="container page-name">
        <h1 class="text-center">Add your company</h1>
        <p class="lead text-center">Create a profile for your company and put it online.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php echo $this->Session->flash(); ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-lg-2">
                        <div class="form-group">
                            <input type="file" class="dropify" data-default-file="<?php echo $this->html->url('/template/img/logo-default.png');?>"> 
                            <span class="help-block">Sua logo aqui.</span> 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-lg-10">
                        <div class="form-group">
                            <?php
                                echo $this->form->input('nome', array(
                                    'label' => false,
                                    'autofocus' => true,
                                    'placeholder' => 'Informe o nome da empresa',
                                    'required' => false,
                                    'class' => 'form-control input-lg',
                                    'error' => array('attributes' => array( 'class' => 'text-danger')),
                                ));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                                echo $this->form->input('ramo', array(
                                    'label' => false,
                                    'autofocus' => false,
                                    'placeholder' => 'Informe o ramo da empresa',
                                    'required' => false,
                                    'class' => 'form-control',
                                    'error' => array('attributes' => array( 'class' => 'text-danger')),
                                ));
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                                echo $this->form->input('descricao_rapida', array(
                                    'label' => false,
                                    'autofocus' => false,
                                    'type' => 'textarea',
                                    'rows' => 3,
                                    'cols' => 30,
                                    'placeholder' => 'Descreva sua empresa de forma rápida',
                                    'required' => false,
                                    'class' => 'form-control',
                                    'error' => array('attributes' => array( 'class' => 'text-danger')),
                                ));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-4">
                        <div class="input-group input-group-sm"> <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                            <input type="text" class="form-control" placeholder="Location, e.g. Melon Park, CA"> </div>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4">
                        <?php
                            echo $this->form->input('qtde_empregados', array(
                                'label' => false,
                                'required' => false,
                                'class' => 'form-control selectpicker',
                                'options' => array(
                                    'abaixo de 10' => '0 - 9',
                                    'abaixo de 50' => '10 - 50',
                                    'abaixo de 200' => '51 - 200',
                                    'abaixo de 500' => '201 - 500',
                                    'abaixo de 1000' => '501 - 1000',
                                    'acima de 1000' => 'acima de 1000'
                                ),
                                'selected' => 'abaixo de 10',
                                'empty' => '(Escolha um)',
                                'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-users"></i></span>',
                                'after' => '<span class="input-group-addon" title="Funcionários">Func.</span></div>',
                                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4">  
                        <?php
                            echo $this->form->input('site', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'url',
                                'placeholder' => 'Informe o site da empresa',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-globe"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-6 col-md-4">
                        <?php
                            echo $this->MyForm->input('aniversario_empresa', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'customDate',
                                'placeholder' => 'Informe a data de aniversário da da empresa',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4">
                        <?php
                            echo $this->form->input('telefone', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'tel',
                                'placeholder' => 'Informe o telefone para contato',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-phone"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                    <div class="form-group col-xs-12 col-sm-6 col-md-4">
                        
                        <?php
                            echo $this->form->input('email', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'tel',
                                'placeholder' => 'Informe o email para contato',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        /*
        <div class="button-group">
            <div class="action-buttons">
                <div class="upload-button">
                    <button class="btn btn-block btn-primary">Choose a cover image</button>
                    <input id="cover_img_file" type="file"> </div>
            </div>
        </div>
        */
        ?>
    </div>
</header>
<main>
    <section>
        <div class="container">
            <header class="section-header"> <span>Get connected</span>
                <h2>Social media</h2> </header>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                            <input type="text" class="form-control" placeholder="Profile URL"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                            <input type="text" class="form-control" placeholder="Profile URL"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-dribbble"></i></span>
                            <input type="text" class="form-control" placeholder="Profile URL"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-pinterest"></i></span>
                            <input type="text" class="form-control" placeholder="Profile URL"> </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                            <input type="text" class="form-control" placeholder="Profile URL"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-github"></i></span>
                            <input type="text" class="form-control" placeholder="Profile URL"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-instagram"></i></span>
                            <input type="text" class="form-control" placeholder="Profile URL"> </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group"> <span class="input-group-addon"><i class="fa fa-youtube"></i></span>
                            <input type="text" class="form-control" placeholder="Profile URL"> </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" bg-alt">
        <div class="container">
            <header class="section-header"> <span>About</span>
                <h2>Company detail</h2>
                <p>Write about your company, culture, benefits of working there, etc.</p>
            </header>
            <textarea class="summernote-editor"></textarea>
        </div>
    </section>
    <section>
        <div class="container">
            <header class="section-header"> <span>Are you done?</span>
                <h2>Submit it</h2>
                <p>Please review your information once more and press the below button to put your company online.</p>
            </header>
            <p class="text-center">
                <button class="btn btn-success btn-xl btn-round">Submit your company</button>
            </p>
        </div>
    </section>
</main>
</form>