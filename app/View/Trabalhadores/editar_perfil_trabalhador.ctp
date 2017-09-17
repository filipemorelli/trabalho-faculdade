<?php
echo $this->Form->create('Trabalhadores', array(
    'type'  => 'file',
    'class' => 'editarPerfilTrabalhadoresForm'
));
?>
<header class="page-header">
    <div class="container page-name">
        <h1 class="text-center">Seu perfil profissional</h1>
        <p class="lead text-center">Crie seu currículo e coloque na internet.</p>
    </div>
    <div class="container">
        <?php echo $this->Session->flash(); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <?php
                    echo $this->Form->input('Trabalhador.url_imagem', array(
                        'label'                        => false,
                        'type'                         => 'file',
                        'autofocus'                    => false,
                        'placeholder'                  => 'Por favor escolha uma foto para seu perfil.',
                        'required'                     => false,
                        'class'                        => 'dropify',
                        'data-allowed-file-extensions' => 'png jpg jpeg gif',
                        'data-default-file'            => isset($this->request->data['Trabalhadores']['url_imagem']) && !is_array($this->request->data['Trabalhadores']['url_imagem']) ? $this->Html->url('/upload/img/trabalhador/' . $this->request->data['Trabalhadores']['url_imagem']) : '',
                        'accept'                       => "image/*",
                        'data-max-file-size'           => "2M",
                        'after'                        => '<span class="help-block">Por favor escolha uma foto para seu perfil.</span>',
                        'error'                        => array('attributes' => array('class' => 'text-danger')),
                    ));
                    ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                    <?php
                    echo $this->Form->input('Trabalhador.nome', array(
                        'label'       => false,
                        'autofocus'   => true,
                        'placeholder' => 'Informe o seu nome',
                        'required'    => true,
                        'class'       => 'form-control input-lg',
                        'error'       => array('attributes' => array('class' => 'text-danger')),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo $this->Form->input('Trabalhador.profissao', array(
                        'label'       => false,
                        'autofocus'   => true,
                        'placeholder' => 'Informe a seu profissão.',
                        'required'    => true,
                        'class'       => 'form-control input-lg',
                        'error'       => array('attributes' => array('class' => 'text-danger')),
                    ));
                    ?>
                </div>
                <div class="form-group">
                    <?php
                    echo $this->Form->input('Trabalhador.descricao_rapida', array(
                        'label'       => false,
                        'autofocus'   => false,
                        'type'        => 'textarea',
                        'rows'        => 3,
                        'cols'        => 30,
                        'minLength'   => 10,
                        'placeholder' => 'Descreva você de uma forma rápida.',
                        'required'    => true,
                        'class'       => 'form-control',
                        'error'       => array('attributes' => array('class' => 'text-danger')),
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
                echo $this->Form->input('Trabalhador.telefone', array(
                    'label'       => false,
                    'type'        => 'tel',
                    'autofocus'   => false,
                    'placeholder' => 'Informe o Telefone para contato',
                    'required'    => true,
                    'class'       => 'form-control telefone',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-phone"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                <?php
                echo $this->Form->input('Trabalhador.email', array(
                    'label'       => false,
                    'type'        => 'email',
                    'autofocus'   => false,
                    'placeholder' => 'Informe o Email para contato',
                    'required'    => true,
                    'class'       => 'form-control email',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                <?php
                echo $this->MyForm->input('Trabalhador.data_nascimento', array(
                    'label'       => false,
                    'autofocus'   => false,
                    'type'        => 'customDate',
                    'placeholder' => 'Informe sua data de aniversário',
                    'required'    => true,
                    'class'       => 'form-control',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-3">
                <?php
                echo $this->Form->input('Trabalhador.site', array(
                    'label'       => false,
                    'type'        => 'url',
                    'autofocus'   => false,
                    'placeholder' => 'Informe o seu site se tiver',
                    'required'    => false,
                    'class'       => 'form-control',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-globe"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
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
                    'label'       => false,
                    'autofocus'   => false,
                    'placeholder' => 'Informe o CEP do local de trabalho',
                    'required'    => true,
                    'class'       => 'form-control cep',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                echo $this->Form->input('Endereco.endereco', array(
                    'label'       => false,
                    'autofocus'   => false,
                    'placeholder' => 'Endereço do local de trabalho',
                    'required'    => true,
                    'class'       => 'form-control endereco',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                echo $this->Form->input('Endereco.bairro', array(
                    'label'       => false,
                    'autofocus'   => false,
                    'placeholder' => 'Bairro do local de trabalho',
                    'required'    => true,
                    'class'       => 'form-control bairro',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                echo $this->Form->input('Endereco.cidade', array(
                    'label'       => false,
                    'autofocus'   => false,
                    'placeholder' => 'Cidade do local de trabalho',
                    'required'    => true,
                    'class'       => 'form-control cidade',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                echo $this->Form->input('Endereco.estado', array(
                    'label'       => false,
                    'autofocus'   => false,
                    'placeholder' => 'Estado do local de trabalho',
                    'required'    => true,
                    'class'       => 'form-control estado',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-4">
                <?php
                echo $this->Form->input('Endereco.numero', array(
                    'label'       => false,
                    'autofocus'   => false,
                    'placeholder' => 'Número do local de trabalho',
                    'required'    => true,
                    'class'       => 'form-control numero',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12">
                <?php
                echo $this->Form->input('Endereco.complemento', array(
                    'label'       => false,
                    'autofocus'   => false,
                    'placeholder' => 'Complemento do local de trabalho',
                    'required'    => false,
                    'class'       => 'form-control complemento',
                    'before'      => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-map-marker"></i></span>',
                    'after'       => '</div>',
                    'error'       => array('attributes' => array('class' => 'text-danger')),
                ));
                ?>
            </div>
        </div>
        <hr class="hr-lg">
        <h6>Habilidades e Caracteristicas</h6>
        <div class="form-group">
            <?php
            echo $this->Form->input('Trabalhador.habilidades', array(
                'label'       => false,
                'type'        => 'text',
                'autofocus'   => false,
                'placeholder' => 'Digite sua Habilidade',
                'required'    => false,
                //porque submit nao funciona
                'class'       => 'habilidades',
                'data-role'   => "tagsinput",
                'after'       => '<span class="help-block">Digite a habilidade e pressione a tecla Enter</span>',
                'error'       => array('attributes' => array('class' => 'text-danger')),
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
                        echo $this->Form->input('Trabalhador.url_linkedin', array(
                            'label'       => false,
                            'type'        => 'url',
                            'autofocus'   => false,
                            'placeholder' => 'Digite a url do seu linkedin se quiser.',
                            'required'    => false,
                            'class'       => 'form-control',
                            'before'      => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-linkedin"></i></span>',
                            'after'       => '</div>',
                            'error'       => array('attributes' => array('class' => 'text-danger')),
                        ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php
                    echo $this->Form->input('Trabalhador.url_facebook', array(
                        'label'       => false,
                        'type'        => 'url',
                        'autofocus'   => false,
                        'placeholder' => 'Digite a url do seu facebook se quiser.',
                        'required'    => false,
                        'class'       => 'form-control',
                        'before'      => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-facebook"></i></span>',
                        'after'       => '</div>',
                        'error'       => array('attributes' => array('class' => 'text-danger')),
                    ));
                    ?>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <?php
                    echo $this->Form->input('Trabalhador.url_google_plus', array(
                        'label'       => false,
                        'type'        => 'url',
                        'autofocus'   => false,
                        'placeholder' => 'Digite a url do seu Google + se quiser.',
                        'required'    => false,
                        'class'       => 'form-control',
                        'before'      => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-google-plus"></i></span>',
                        'after'       => '</div>',
                        'error'       => array('attributes' => array('class' => 'text-danger')),
                    ));
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class=" bg-alt">
        <div class="container">
            <header class="section-header">
                <h2>Formação / Escolaridade</h2>
            </header>
            <div class="row escolaridade">
                <?php
                $i = 0;
                // para que em produtos possa rodar pelo menos 1 linha para criacao
                if (isset($this->request->data['TrabalhadorEscolaridade'])) {
                    $logic = count($this->request->data['TrabalhadorEscolaridade']) > 0;
                }
                else {
                    $logic = 0;
                }

                $trabalhadorEscolaridades = isset($this->request->data['TrabalhadorEscolaridade']) && $logic ? $this->request->data['TrabalhadorEscolaridade'] : array(array());
                foreach ($trabalhadorEscolaridades as $escolaridade) {
                    ?>
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
                                            <?php
                                            echo $this->Form->input("TrabalhadorEscolaridade.$i.nivel", array(
                                                'label'    => false,
                                                'required' => true,
                                                'class'    => 'form-control selectpicker',
                                                'options'  => array(
                                                    '1'  => 'Ensino Fundamental incompleto',
                                                    '2'  => 'Ensino Fundamental cursando',
                                                    '3'  => 'Ensino Fundamental completo',
                                                    '4'  => 'Ensino Médio incompleto',
                                                    '5'  => 'Ensino Médio cursando',
                                                    '6'  => 'Ensino Médio completo',
                                                    '7'  => 'Ensino Médio completo Profissionalizante cursando',
                                                    '8'  => 'Ensino Médio completo Profissionalizante completo',
                                                    '9'  => 'Ensino Superior incompleto',
                                                    '10' => 'Ensino Superior cursando',
                                                    '11' => 'Ensino Superior completo',
                                                    '12' => 'Pos-graduação',
                                                    '13' => 'Mestrado',
                                                    '14' => 'Doutorado',
                                                    '15' => 'Ph.D.',
                                                ),
                                                'empty'    => 'Escolaridade',
                                                'error'    => array(
                                                    'attributes' => array(
                                                        'wrap'  => 'span',
                                                        'class' => 'text-danger'
                                                    )
                                                ),
                                            ));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->input("TrabalhadorEscolaridade.$i.curso", array(
                                                'label'       => false,
                                                'autofocus'   => false,
                                                'placeholder' => 'Digite o curso. (Caso não seja curso superior basta repetir)',
                                                'required'    => false,
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->input("TrabalhadorEscolaridade.$i.instituicao", array(
                                                'label'       => false,
                                                'autofocus'   => false,
                                                'placeholder' => 'Digite o nome da instituição.',
                                                'required'    => true,
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <?php
                                                echo $this->MyForm->input("TrabalhadorEscolaridade.$i.data_inicio", array(
                                                    'label'       => false,
                                                    'div'         => false,
                                                    'type'        => 'customDate',
                                                    'autofocus'   => false,
                                                    'placeholder' => 'Digite a data de início.',
                                                    'required'    => true,
                                                    'before'      => '<span class="input-group-addon">Data Início</span>',
                                                    'class'       => 'form-control',
                                                    'error'       => array('attributes' => array('class' => 'text-danger')),
                                                ));
                                                echo $this->MyForm->input("TrabalhadorEscolaridade.$i.data_fim", array(
                                                    'label'       => false,
                                                    'div'         => false,
                                                    'type'        => 'customDate',
                                                    'autofocus'   => false,
                                                    'placeholder' => 'Digite a data de fim caso tenha finalizado.',
                                                    'required'    => false,
                                                    'title'       => 'Caso não saiba o fim não precisa digitar nada',
                                                    'before'      => '<span class="input-group-addon">Data Fim</span>',
                                                    'class'       => 'form-control',
                                                    'error'       => array('attributes' => array('class' => 'text-danger')),
                                                ));
                                                ?>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->input("TrabalhadorEscolaridade.$i.descricao_rapida", array(
                                                'label'       => false,
                                                'type'        => 'textarea',
                                                'rows'        => "3",
                                                'autofocus'   => false,
                                                'placeholder' => 'Descrição do curso caso queira.',
                                                'required'    => true,
                                                'minLength'   => '10',
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                }
                ?>
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
                                        <?php
                                        echo $this->Form->input('TrabalhadorEscolaridade.nivel', array(
                                            'label'    => false,
                                            'required' => true,
                                            'disabled' => true,
                                            'class'    => 'form-control selectpicker',
                                            'options'  => array(
                                                '1'  => 'Ensino Fundamental incompleto',
                                                '2'  => 'Ensino Fundamental cursando',
                                                '3'  => 'Ensino Fundamental completo',
                                                '4'  => 'Ensino Médio incompleto',
                                                '5'  => 'Ensino Médio cursando',
                                                '6'  => 'Ensino Médio completo',
                                                '7'  => 'Ensino Médio completo Profissionalizante cursando',
                                                '8'  => 'Ensino Médio completo Profissionalizante completo',
                                                '9'  => 'Ensino Superior incompleto',
                                                '10' => 'Ensino Superior cursando',
                                                '11' => 'Ensino Superior completo',
                                                '12' => 'Pos-graduação',
                                                '13' => 'Mestrado',
                                                '14' => 'Doutorado',
                                                '15' => 'Ph.D.',
                                            ),
                                            'empty'    => 'Escolaridade',
                                            'error'    => array(
                                                'attributes' => array(
                                                    'wrap'  => 'span',
                                                    'class' => 'text-danger'
                                                )
                                            ),
                                        ));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->input('TrabalhadorEscolaridade.curso', array(
                                            'label'       => false,
                                            'disabled'    => true,
                                            'autofocus'   => false,
                                            'placeholder' => 'Digite o curso.',
                                            'required'    => false,
                                            'class'       => 'form-control',
                                            'error'       => array('attributes' => array('class' => 'text-danger')),
                                        ));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->input('TrabalhadorEscolaridade.instituicao', array(
                                            'label'       => false,
                                            'disabled'    => true,
                                            'autofocus'   => false,
                                            'placeholder' => 'Digite o nome da instituição.',
                                            'required'    => true,
                                            'class'       => 'form-control',
                                            'error'       => array('attributes' => array('class' => 'text-danger')),
                                        ));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <?php
                                            echo $this->MyForm->input('TrabalhadorEscolaridade.data_inicio', array(
                                                'label'       => false,
                                                'div'         => false,
                                                'disabled'    => true,
                                                'type'        => 'customDate',
                                                'autofocus'   => false,
                                                'placeholder' => 'Digite a data de início.',
                                                'required'    => true,
                                                'before'      => '<span class="input-group-addon">Data Início</span>',
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            echo $this->MyForm->input('TrabalhadorEscolaridade.data_fim', array(
                                                'label'       => false,
                                                'div'         => false,
                                                'disabled'    => true,
                                                'type'        => 'customDate',
                                                'autofocus'   => false,
                                                'placeholder' => 'Digite a data de fim caso tenha finalizado.',
                                                'required'    => false,
                                                'before'      => '<span class="input-group-addon">Data Fim</span>',
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->input('TrabalhadorEscolaridade.descricao', array(
                                            'label'       => false,
                                            'disabled'    => true,
                                            'type'        => 'textarea',
                                            'rows'        => "3",
                                            'autofocus'   => false,
                                            'placeholder' => 'Descrição do curso caso queira.',
                                            'minLength'   => 10,
                                            'required'    => true,
                                            'class'       => 'form-control',
                                            'error'       => array('attributes' => array('class' => 'text-danger')),
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-center">
                    <br>
                    <button class="btn btn-primary btn-more">Adicionar Formação / Escolaridade</button>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <header class="section-header">
                <span>Últimos Cargos</span>
                <h2>Experiência de Trabalho</h2>
            </header>
            <div class="row">
                <?php
                $j = 0;
                // para que em produtos possa rodar pelo menos 1 linha para criacao
                if (isset($this->request->data['TrabalhadorExperiencia'])) {
                    $logic = count($this->request->data['TrabalhadorExperiencia']) > 0;
                }
                else {
                    $logic = 0;
                }
                $TrabalhadorExperiencias = isset($this->request->data['TrabalhadorExperiencia']) && $logic ? $this->request->data['TrabalhadorExperiencia'] : array(array());
                foreach ($TrabalhadorExperiencias as $experiencia) {
                    ?>
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
                                            <?php
                                            echo $this->Form->input("TrabalhadorExperiencia.$j.cargo", array(
                                                'label'       => false,
                                                'autofocus'   => false,
                                                'placeholder' => 'Digite o cargo ocupado.',
                                                'required'    => true,
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->input("TrabalhadorExperiencia.$j.instituicao", array(
                                                'label'       => false,
                                                'autofocus'   => false,
                                                'placeholder' => 'Digite o nome da empresa.',
                                                'required'    => true,
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            ?>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <?php
                                                echo $this->MyForm->input("TrabalhadorExperiencia.$j.data_inicio", array(
                                                    'label'       => false,
                                                    'div'         => false,
                                                    'type'        => 'customDate',
                                                    'autofocus'   => false,
                                                    'placeholder' => 'Digite o nome da instituição.',
                                                    'required'    => true,
                                                    'before'      => '<span class="input-group-addon">Data Início</span>',
                                                    'class'       => 'form-control',
                                                    'error'       => array('attributes' => array('class' => 'text-danger')),
                                                ));
                                                echo $this->MyForm->input("TrabalhadorExperiencia.$j.data_fim", array(
                                                    'label'       => false,
                                                    'div'         => false,
                                                    'type'        => 'customDate',
                                                    'empty'       => true,
                                                    'autofocus'   => false,
                                                    'placeholder' => 'Digite o nome da instituição.',
                                                    'required'    => false,
                                                    'before'      => '<span class="input-group-addon">Data Fim</span>',
                                                    'class'       => 'form-control',
                                                    'error'       => array('attributes' => array('class' => 'text-danger')),
                                                ));
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <?php
                                            echo $this->Form->input("TrabalhadorExperiencia.$j.descricao", array(
                                                'label'       => false,
                                                'type'        => 'textarea',
                                                'autofocus'   => false,
                                                'placeholder' => 'Digite a descrição de seu cargo caso queira.',
                                                'required'    => true,
                                                'minLength'   => 10,
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $j++;
                }
                ?>
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
                                        <?php
                                        echo $this->Form->input('TrabalhadorExperiencia.cargo', array(
                                            'label'       => false,
                                            'disabled'    => 'disabled',
                                            'autofocus'   => false,
                                            'placeholder' => 'Digite o cargo ocupado.',
                                            'required'    => true,
                                            'class'       => 'form-control',
                                            'error'       => array('attributes' => array('class' => 'text-danger')),
                                        ));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->input('TrabalhadorExperiencia.instituicao', array(
                                            'label'       => false,
                                            'disabled'    => 'disabled',
                                            'autofocus'   => false,
                                            'placeholder' => 'Digite o nome da empresa.',
                                            'required'    => true,
                                            'class'       => 'form-control',
                                            'error'       => array('attributes' => array('class' => 'text-danger')),
                                        ));
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <?php
                                            echo $this->MyForm->input('TrabalhadorExperiencia.data_inicio', array(
                                                'label'       => false,
                                                'div'         => false,
                                                'disabled'    => 'disabled',
                                                'type'        => 'customDate',
                                                'autofocus'   => false,
                                                'placeholder' => 'Digite o nome da instituição.',
                                                'required'    => true,
                                                'before'      => '<span class="input-group-addon">Data Início</span>',
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            echo $this->MyForm->input('TrabalhadorExperiencia.data_fim', array(
                                                'label'       => false,
                                                'div'         => false,
                                                'disabled'    => 'disabled',
                                                'type'        => 'customDate',
                                                'autofocus'   => false,
                                                'placeholder' => 'Digite o nome da instituição.',
                                                'required'    => false,
                                                'before'      => '<span class="input-group-addon">Data Fim</span>',
                                                'class'       => 'form-control',
                                                'error'       => array('attributes' => array('class' => 'text-danger')),
                                            ));
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <?php
                                        echo $this->Form->input('TrabalhadorExperiencia.descricao', array(
                                            'label'       => false,
                                            'type'        => 'textarea',
                                            'disabled'    => 'disabled',
                                            'rows'        => '3',
                                            'autofocus'   => false,
                                            'placeholder' => 'Digite a descrição de seu cargo caso queira.',
                                            'required'    => true,
                                            'minLength'   => 10,
                                            'class'       => 'form-control',
                                            'error'       => array('attributes' => array('class' => 'text-danger')),
                                        ));
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 text-center">
                    <br>
                    <button class="btn btn-primary btn-more">Adicionar Experiência de Trabalho</button>
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
    <section class=" bg-img"
             style="background-image: url(<?php echo $this->Html->url('/template/img/bg-facts.jpg'); ?>);">
        <div class="container">
            <header class="section-header"><span>Você terminou?</span>
                <h2>Salve agora</h2>
                <p>Por favor, reveja suas informações mais uma vez e pressione o botão abaixo para colocar seu currículo
                    on-line.</p>
                <p>Você poderá alterar sempre que quiser.</p>
            </header>
            <p class="text-center">
                <button class="btn btn-success btn-xl btn-round">Salvar agora!</button>
            </p>
        </div>
    </section>
</main>