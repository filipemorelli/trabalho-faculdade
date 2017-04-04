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
                        'required' => false,
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
                        'required' => false,
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
            <div class="form-group col-xs-12 col-sm-6">
                <?php
                    echo $this->Form->input('Vaga.endereco', array(
                        'label' => false,
                        'autofocus' => false,
                        'placeholder' => 'Endereço do local de trabalho',
                        'required' => false,
                        'class' => 'form-control',
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
                        'required' => false,
                        'class' => 'form-control selectpicker',
                        'options' => array(
                            'abaixo de 10' => 'Full time',
                            'abaixo de 50' => 'Part time',
                            'abaixo de 200' => 'Internship',
                            'abaixo de 500' => 'Freelance',
                            'abaixo de 1000' => 'Remote',
                        ),
                        'empty' => '(Escolha um)',
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
                        'required' => false,
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
                        'required' => false,
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
                        'required' => false,
                        'class' => 'form-control selectpicker',
                        'options' => array(
                            'abaixo de 10' => 'Ph.D.',
                            'abaixo de 50' => 'Mestrado',
                            'abaixo de 200' => 'Superior',
                            'abaixo de 201' => 'Superior Incompleto/Cursando',
                            'abaixo de 500' => 'Tecnico',
                            'abaixo de 1000' => 'Ensino Médio',
                            'abaixo de 1000' => 'Ensino Médio Incompleto/Cursando',
                            'abaixo de 1001' => 'Ensino Fundamental',
                            'abaixo de 1002' => 'Indiferente',
                        ),
                        'empty' => '(Escolha um)',
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
                    'default' => '<p>O Google é e sempre será uma empresa de engenharia. Contratamos pessoas com um amplo conjunto de habilidades técnicas que estão prontas para enfrentar alguns dos maiores desafios da tecnologia e causar impacto em milhões, se não bilhões, de usuários. No Google, os engenheiros não apenas revolucionam a pesquisa, como também trabalham rotineiramente em escalabilidade e soluções de armazenamento em grande escala, aplicações em grande escala e plataformas inteiramente novas para desenvolvedores de todo o mundo. Do Google AdWords ao Google Chrome, do Android ao YouTube, do Google Social ao Local, os engenheiros do Google estão mudando o mundo de uma conquista tecnológica após a outra.</p><p><br></p><h2>Responsabilidades</h2><p><br></p><p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non.</p><p><br></p><p>Crie aplicações web de próxima geração com foco no lado do cliente.</p><p>Redesenhar as UIs, implementar novas UIs e pegar o Java como necessário.</p><p>Explore e crie experiências de consumo dinâmicas e convincentes.</p><p>Crie e construa uma estrutura escalável para aplicações web.</p><p><br></p><h2>Qualificações mínimas</h2><p><br></p><p>BA / BS em um campo técnico ou experiência prática equivalente.</p><p>2 anos de experiência de trabalho relevante em desenvolvimento de software.</p><p>Experiência de programação em C, C ++ ou Java.</p><p>Experiência com AJAX, HTML e CSS.</p><p><br></p><h2>Qualificações preferenciais</h2><p><br></p><p>Interesse no projeto da interface do usuário.</p><p>Experiência de desenvolvimento de aplicações Web.</p><p>Experiência de trabalho em plataformas cross-browser.</p><p>Experiência em desenvolvimento de JavaScript orientado a objetos.</p><p>Experiência com frameworks de interface de usuário como XUL, Flex e XAML.</p><p>Conhecimento do design da interface do usuário.</p>',
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
