<?php
    echo $this->Form->create('Trabalhadores', array('type' => 'file'));
?>
<header class="page-header">
    <div class="container page-name">
        <h1 class="text-center">Add your resume</h1>
        <p class="lead text-center">Create your resume and put it online.</p>
    </div>
    <div class="container">
        <?php echo $this->Session->flash(); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <?php
                        echo $this->Form->input('Trabalhadores.url_imagem', array(
                            'label' => false,
                            'type' => 'file',
                            'autofocus' => false,
                            'placeholder' => 'Por favor escolha uma foto para seu perfil.',
                            'required' => false,
                            'class' => 'dropify',
                            'data-default-file' => isset($this->request->data['Trabalhadores']['url_imagem']) && !is_array($this->request->data['Trabalhadores']['url_imagem'])? $this->Html->url('/upload/img/trabalhador/'.$this->request->data['Trabalhadores']['url_imagem']) : '',
                            'accept' => "image/*",
                            'data-max-file-size' => "2M",
                            'after' => '<span class="help-block">Por favor escolha uma foto para seu perfil.</span>',
                            'error' => array('attributes' => array( 'class' => 'text-danger')),
                        ));
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                    <?php
                        echo $this->Form->input('Trabalhadores.nome', array(
                            'label' => false,
                            'autofocus' => true,
                            'placeholder' => 'Informe o seu nome',
                            'required' => false,
                            'class' => 'form-control input-lg',
                            'error' => array('attributes' => array( 'class' => 'text-danger')),
                        ));
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo $this->Form->input('Trabalhadores.profissao', array(
                            'label' => false,
                            'autofocus' => true,
                            'placeholder' => 'Informe a seu profissão.',
                            'required' => false,
                            'class' => 'form-control input-lg',
                            'error' => array('attributes' => array( 'class' => 'text-danger')),
                        ));
                    ?>
                </div>
                <div class="form-group">
                    <?php
                        echo $this->Form->input('Trabalhadores.descricao_rapida', array(
                            'label' => false,
                            'autofocus' => false,
                            'type' => 'textarea',
                            'rows' => 3,
                            'cols' => 30,
                            'placeholder' => 'Descreva você de uma forma rápida.',
                            'required' => false,
                            'class' => 'form-control',
                            'error' => array('attributes' => array( 'class' => 'text-danger')),
                        ));
                    ?>
                </div>
            </div>
        </div>
        <hr class="hr-lg">
        <h6>Informações basicas</h6>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-3">
                <?php
                    echo $this->Form->input('Trabalhadores.telefone', array(
                        'label' => false,
                        'type' => 'tel',
                        'autofocus' => false,
                        'placeholder' => 'Informe o Telefone para contato',
                        'required' => false,
                        'class' => 'form-control cep',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-phone"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                <?php
                    echo $this->Form->input('Trabalhadores.email', array(
                        'label' => false,
                        'type' => 'email',
                        'autofocus' => false,
                        'placeholder' => 'Informe o Email para contato',
                        'required' => false,
                        'class' => 'form-control cep',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                <?php
                    echo $this->MyForm->input('Trabalhadores.data_nascimento', array(
                        'label' => false,
                        'autofocus' => false,
                        'type' => 'customDate',
                        'placeholder' => 'Informe sua data de aniversário',
                        'required' => false,
                        'class' => 'form-control',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                <?php
                    echo $this->Form->input('Trabalhadores.site', array(
                        'label' => false,
                        'type' => 'url',
                        'autofocus' => false,
                        'placeholder' => 'Informe o seu site se tiver',
                        'required' => false,
                        'class' => 'form-control cep',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-globe"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
        </div>

        <hr class="hr-lg">
        <h6>Endereco</h6>
        <div class="row">
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                    echo $this->Form->input('Endereco.cep', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Informe o CEP do local de trabalho',
                        'required' => false,
                        'class' => 'form-control cep',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                    echo $this->Form->input('Endereco.endereco', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Endereço do local de trabalho',
                        'required' => false,
                        'class' => 'form-control endereco',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                    echo $this->Form->input('Endereco.bairro', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Bairro do local de trabalho',
                        'required' => false,
                        'class' => 'form-control bairro',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                    echo $this->Form->input('Endereco.cidade', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Cidade do local de trabalho',
                        'required' => false,
                        'class' => 'form-control cidade',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                    echo $this->Form->input('Endereco.estado', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Estado do local de trabalho',
                        'required' => false,
                        'class' => 'form-control estado',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                    echo $this->Form->input('Endereco.numero', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Número do local de trabalho',
                        'required' => false,
                        'class' => 'form-control numero',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12">
                <?php
                    echo $this->Form->input('Endereco.complemento', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Complemento do local de trabalho',
                        'required' => false,
                        'class' => 'form-control complemento',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
        </div>
        <hr class="hr-lg">
        <h6>Habilidades</h6>
        <div class="form-group">
            <?php
                echo $this->Form->input('Trabalhadores.habilidades', array(
                    'label' => false,
                    'autofocus' => false,
                    'placeholder' => 'Digite sua Habilidade',
                    'required' => false,
                    'data-role' => "tagsinput",
                    'after' => '<span class="help-block">Digite a habilidade e pressione a tecla Enter</span>',
                    'error' => array('attributes' => array( 'class' => 'text-danger')),
                ));
            ?>
        </div>
        <?php
        /*
        <div class="button-group">
            <div class="action-buttons">
                <div class="upload-button">
                    <button class="btn btn-block btn-gray">Choose a resume file</button>
                    <input type="file"> </div>
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
            <header class="section-header">
                <h2>Redes Sociais</h2> 
            </header>
            <div class="row">
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <?php
                            echo $this->Form->input('Trabalhadores.url_linkedin', array(
                                'label' => false,
                                'type' => 'url',
                                'autofocus' => false,
                                'placeholder' => 'Digite a url do seu linkedin se quiser.',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-linkedin"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php
                        echo $this->Form->input('Trabalhadores.url_facebook', array(
                            'label' => false,
                            'type' => 'url',
                            'autofocus' => false,
                            'placeholder' => 'Digite a url do seu facebook se quiser.',
                            'required' => false,
                            'class' => 'form-control',
                            'before' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-facebook"></i></span>',
                            'after' => '</div>',
                            'error' => array('attributes' => array( 'class' => 'text-danger')),
                        ));
                    ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php
                        echo $this->Form->input('Trabalhadores.url_google_plus', array(
                            'label' => false,
                            'type' => 'url',
                            'autofocus' => false,
                            'placeholder' => 'Digite a url do seu Google + se quiser.',
                            'required' => false,
                            'class' => 'form-control',
                            'before' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-google-plus"></i></span>',
                            'after' => '</div>',
                            'error' => array('attributes' => array( 'class' => 'text-danger')),
                        ));
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class=" bg-alt">
        <div class="container">
            <header class="section-header">
                <h2>Escolaridade</h2>
            </header>
            <div class="row">
                <div class="col-xs-12">
                    <div class="item-block">
                        <div class="item-form">
                            <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i>
                            </button>
                            <div class="row">
                                <?php
                                /*
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <input type="file" class="dropify" data-default-file="<?php echo $this->Html->url('/template/img/logo-default.png');?>"> <span class="help-block">Please choose a square logo</span>
                                    </div>
                                </div>
                                */
                                ?>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Degree, e.g. Bachelor"> </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Major, e.g. Computer Science"> </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="School name, e.g. Massachusetts Institute of Technology"> </div>
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon">Date from</span>
                                            <input type="text" class="form-control" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span>
                                            <input type="text" class="form-control" placeholder="e.g. 2016"> </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Short description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 duplicateable-content">
                    <div class="item-block">
                        <div class="item-form">
                            <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i>
                            </button>
                            <div class="row">
                                <?php
                                /*
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <input type="file" class="dropify" data-default-file="<?php echo $this->Html->url('/template/img/logo-default.png');?>"> <span class="help-block">Please choose a square logo</span> </div>
                                </div>
                                */
                                ?>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Degree, e.g. Bachelor"> </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Major, e.g. Computer Science"> </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="School name, e.g. Massachusetts Institute of Technology"> </div>
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon">Date from</span>
                                            <input type="text" class="form-control" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span>
                                            <input type="text" class="form-control" placeholder="e.g. 2016"> </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Short description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-center">
                    <br>
                    <button class="btn btn-primary btn-duplicator">Add education</button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <header class="section-header"> <span>Past positions</span>
                <h2>Work Experience</h2> </header>
            <div class="row">
                <div class="col-xs-12">
                    <div class="item-block">
                        <div class="item-form">
                            <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i>
                            </button>
                            <div class="row">
                                <?php
                                /*
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <input type="file" class="dropify" data-default-file="<?php echo $this->Html->url('/template/img/logo-default.png');?>"> <span class="help-block">Please choose a square logo</span> </div>
                                </div>
                                */
                                ?>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Company name"> </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Position, e.g. UI/UX Researcher"> </div>
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon">Date from</span>
                                            <input type="text" class="form-control" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span>
                                            <input type="text" class="form-control" placeholder="e.g. 2016"> </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <textarea class="summernote-editor"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 duplicateable-content">
                    <div class="item-block">
                        <div class="item-form">
                            <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i>
                            </button>
                            <div class="row">
                                <?php
                                /*    
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group">
                                        <input type="file" class="dropify" data-default-file="<?php echo $this->Html->url('/template/img/logo-default.png');?>"> <span class="help-block">Please choose a square logo</span> </div>
                                </div>
                                */
                                ?>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Company name"> </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Position, e.g. UI/UX Researcher"> </div>
                                    <div class="form-group">
                                        <div class="input-group"> <span class="input-group-addon">Date from</span>
                                            <input type="text" class="form-control" placeholder="e.g. 2012"> <span class="input-group-addon">Date to</span>
                                            <input type="text" class="form-control" placeholder="e.g. 2016"> </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <textarea class="summernote-editor"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-center">
                    <br>
                    <button class="btn btn-primary btn-duplicator">Add experience</button>
                </div>
            </div>
        </div>
    </section>
    <?php
    /*
    <section class=" bg-alt">
        <div class="container">
            <header class="section-header"> <span>Expertise Areas</span>
                <h2>Skills</h2> </header>
            <div class="row">
                <div class="col-xs-12">
                    <div class="item-block">
                        <div class="item-form">
                            <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i>
                            </button>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Skill name, e.g. HTML"> </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Skill proficiency, e.g. 90"> <span class="input-group-addon">%</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 duplicateable-content">
                    <div class="item-block">
                        <div class="item-form">
                            <button class="btn btn-danger btn-float btn-remove"><i class="ti-close"></i>
                            </button>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Skill name, e.g. HTML"> </div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Skill proficiency, e.g. 90"> <span class="input-group-addon">%</span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-center">
                    <br>
                    <button class="btn btn-primary btn-duplicator">Add experience</button>
                </div>
            </div>
        </div>
    </section>
    */
    ?>
    <section class=" bg-img" style="background-image: url(<?php echo $this->Html->url('/template/img/bg-facts.jpg');?>);">
        <div class="container">
            <header class="section-header"> <span>Are you done?</span>
                <h2>Submit resume</h2>
                <p>Please review your information once more and press the below button to put your resume online.</p>
            </header>
            <p class="text-center">
                <button class="btn btn-success btn-xl btn-round">Submit your resume</button>
            </p>
        </div>
    </section>
</main>