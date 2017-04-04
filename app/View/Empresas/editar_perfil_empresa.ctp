<?php
    echo $this->Form->create('Empresa', array('type' => 'file'));
?>
<header class="page-header">
    <div class="container page-name">
        <h1 class="text-center">Perfil da Empresa</h1>
        <p class="lead text-center">Crie um perfil para sua empresa e coloque-a on-line.</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <?php echo $this->Session->flash(); ?>
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-lg-3">
                        <div class="form-group">
                            <?php
                                echo $this->Form->input('Empresa.url_imagem', array(
                                    'label' => false,
                                    'type' => 'file',
                                    'autofocus' => false,
                                    'placeholder' => 'Sua logo aqui.',
                                    'required' => false,
                                    'class' => 'dropify',
                                    'data-default-file' => isset($this->request->data['Empresa']['url_imagem']) && !is_array($this->request->data['Empresa']['url_imagem'])? $this->Html->url('/upload/img/empresa/'.$this->request->data['Empresa']['url_imagem']) : '',
                                    'accept' => "image/*",
                                    'data-max-file-size' => "2M",
                                    'after' => '<span class="help-block">Sua logo aqui.</span>',
                                    'error' => array('attributes' => array( 'class' => 'text-danger')),
                                ));
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8 col-lg-9">
                        <div class="form-group">
                            <?php
                                echo $this->Form->input('Empresa.nome', array(
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
                                echo $this->Form->input('Empresa.ramo', array(
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
                                echo $this->Form->input('Empresa.descricao_rapida', array(
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
                    <div class="form-group col-xs-12 col-md-6">
                        <?php
                            echo $this->Form->input('Empresa.qtde_empregados', array(
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
                                'empty' => '(Escolha um)',
                                'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-users"></i></span>',
                                'after' => '<span class="input-group-addon" title="Funcionários">Func.</span></div>',
                                'error' => array('attributes' => array('wrap' => 'span', 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                    <div class="form-group col-xs-12 col-md-6">  
                        <?php
                            echo $this->Form->input('Empresa.site', array(
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
                            echo $this->MyForm->input('Empresa.aniversario_empresa', array(
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
                            echo $this->Form->input('Empresa.telefone', array(
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
                            echo $this->Form->input('Empresa.email', array(
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
            <header class="section-header">
                <h2>Redes Sociais</h2>
            </header>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <?php
                            echo $this->Form->input('Empresa.url_facebook', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'url',
                                'placeholder' => 'Url do Facebook',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-facebook"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $this->Form->input('url_google_plus', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'url',
                                'placeholder' => 'Url do Google +',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-google-plus"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $this->Form->input('Empresa.url_twitter', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'url',
                                'placeholder' => 'Url do Twitter',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-twitter"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <?php
                            echo $this->Form->input('Empresa.url_instagram', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'url',
                                'placeholder' => 'Url do Instagram',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-instagram"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $this->Form->input('url_pinterest', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'url',
                                'placeholder' => 'Url do Pinterest',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-pinterest"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                            echo $this->Form->input('Empresa.url_youtube', array(
                                'label' => false,
                                'autofocus' => false,
                                'type' => 'url',
                                'placeholder' => 'Url do Youtube',
                                'required' => false,
                                'class' => 'form-control',
                                'before' => '<div class="input-group"><span class="input-group-addon"><i class="fa fa-youtube"></i></span>',
                                'after' => '</div>',
                                'error' => array('attributes' => array( 'class' => 'text-danger')),
                            ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class=" bg-alt">
        <div class="container">
            <header class="section-header"> <span>Sobre</span>
                <h2>Detalhes da empresa</h2>
                <p>Escreva sobre sua empresa, cultura, benefícios de trabalhar lá, etc.</p>
            </header>
            <?php
                echo $this->Form->input('Empresa.descricao_completa', array(
                    'label' => false,
                    'autofocus' => false,
                    'type' => 'textarea',
                    'placeholder' => 'Digite a descrição completa da empresa',
                    'required' => false,
                    'class' => 'summernote-editor',
                    'error' => array('attributes' => array( 'class' => 'text-danger')),
                ));
            ?>
        </div>
    </section>
    <section>
        <div class="container">
            <header class="section-header"> <span>Você acabou?</span>
                <h2>Enviar agora</h2>
                <p>Revise suas informações mais uma vez e pressione o botão abaixo para colocar sua empresa online.</p>
            </header>
            <p class="text-center">
                <button class="btn btn-success btn-xl btn-round"><i class="fa fa-send"></i> Salvar Dados</button>
            </p>
        </div>
    </section>
</main>
</form>