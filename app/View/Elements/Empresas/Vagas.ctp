    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-lg-3">
                <div class="form-group">
                    <?php
                        echo $this->Form->input('Vaga.url_imagem', array(
                            'label' => false,
                            'type' => 'file',
                            'autofocus' => false,
                            'placeholder' => 'Sua logo aqui.',
                            'required' => false,
                            'class' => 'dropify',
                            'data-default-file' => isset($this->request->data['Vaga']['url_imagem']) && !is_array($this->request->data['Vaga']['url_imagem']) ? $this->Html->url('/upload/img/vaga/'.$this->request->data['Vaga']['url_imagem']) : '',
                            'accept' => "image/*",
                            'data-max-file-size' => "2M",
                            'after' => '<span class="help-block">Sua logo aqui.</span>',
                            'error' => array('attributes' => array( 'class' => 'text-danger')),
                        ));
                    ?>
                </div>
            </div>
            <div class="form-group col-xs-12 col-sm-8 col-lg-9">
                <?php
                    echo $this->Form->input('Vaga.nome', array(
                        'label' => false,
                        'autofocus' => true,
                        'placeholder' => 'Título da vaga. Ex: (Administrador, Desenvolvedor, Pedreiro, etc...)',
                        'required' => true,
                        'class' => 'form-control input-lg',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-8 col-lg-9">
                <?php
                    echo $this->Form->input('Vaga.descricao_rapida', array(
                        'label' => false,
                        'type' => 'textarea',
                        'rows' => '3',
                        'autofocus' => false,
                        'placeholder' => 'Rápida descrição sobre vaga',
                        'required' => true,
                        'maxlength' => 10,
                        'class' => 'form-control',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-8 col-lg-9">
                <?php
                    echo $this->Form->input('Vaga.site', array(
                        'label' => false,
                        'type' => 'url',
                        'autofocus' => false,
                        'placeholder' => 'Site da empresa que oferece a vaga.',
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
                        <div class="form-group col-xs-12 col-sm-6">
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
            <div class="form-group col-xs-12 col-sm-6">
                <?php
                    echo $this->Form->input('Vaga.periodo_trabalho', array(
                        'label' => false,
                        'required' => true,
                        'class' => 'form-control selectpicker',
                        'options' => array(
                            'integral' => 'Tempo Integral',
                            'meio-horário' => 'Meio Horario',
                            'diaria' => 'Diaria',
                            'estagio' => 'Estágio',
                            'frelancer' => 'Freelancer',
                            'remoto' => 'Remote',
                            'outro' => 'Outro'
                        ),
                        'empty' => 'Jornada de Trabalho',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-briefcase"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'text-danger')),
                    ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12 col-sm-6">
                <?php
                    echo $this->Form->input('Vaga.salario', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Digite o salário Ex: (R$ 2000,00 ou R$ 2000,00 - 3000,00)',
                        'required' => false,
                        'class' => 'form-control',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-money"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
                <?php
                    echo $this->Form->input('Vaga.horario_trabalho', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Horas Semanais de trabalho. Ex: 40, 48, 12/36',
                        'required' => true,
                        'class' => 'form-control',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-clock-o"></i></span>',
                        'after' => '<span class="input-group-addon">Horas Semanais</span> </div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-xs-12 col-sm-6">
                <?php
                    echo $this->Form->input('Vaga.experiencia', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Experiência. Ex: Indiferente, Sem Experiência, 2 anos, 3 anos, etc.',
                        'required' => true,
                        'class' => 'form-control',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-flask"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array( 'class' => 'text-danger')),
                    ));
                ?>
            </div>
            <div class="form-group col-xs-12 col-sm-6">
                <?php
                    echo $this->Form->input('Vaga.escolaridade', array(
                        'label' => false,
                        'required' => true,
                        'class' => 'form-control selectpicker',
                        'options' => array(
                            '0' => 'Indiferente',
                            '1' => 'Ensino Fundamental incompleto',
                            '2' => 'Ensino Fundamental cursando',
                            '3' => 'Ensino Fundamental completo',
                            '4' => 'Ensino Médio incompleto',
                            '5' => 'Ensino Médio cursando',
                            '6' => 'Ensino Médio completo',
                            '7' => 'Ensino Médio completo Profissionalizante cursando',
                            '8' => 'Ensino Médio completo Profissionalizante completo',
                            '9' => 'Ensino Superior incompleto',
                            '10' => 'Ensino Superior cursando',
                            '11' => 'Ensino Superior completo',
                            '12' => 'Pos-graduação',
                            '13' => 'Mestrado',
                            '14' => 'Doutorado',
                            '15' => 'Ph.D.',
                        ),
                        'empty' => 'Escolaridade',
                        'before' => '<div class="input-group input-group-sm"><span class="input-group-addon"><i class="fa fa-certificate"></i></span>',
                        'after' => '</div>',
                        'error' => array('attributes' => array('wrap' => 'span', 'class' => 'text-danger')),
                    ));
                ?>
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
            <header class="section-header"> <span>Descrição Complete</span>
                <h2>Detalhes da Vagas</h2>
                <p>Escreva sobre a empresa, descrição do cargo, habilidades necessárias, benefícios, etc.</p>
            </header>
            <?php
                echo $this->Form->input('Vaga.descricao_completa', array(
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
    <section class="bg-alt">
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
