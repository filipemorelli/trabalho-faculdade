/* global $, document */
"use strict";

/**
 * Funcao principal do site onde contem todos os arquivos js necessarios para boa execucao do programa
 * 
 * @returns {void}
 */
$(function () {

    /**
     * gera mascara nos campos de cep
     */
    $(".cep").mask("99.999-999");

    /**
     * gera mascara nos campos de telefone
     */
    $('.telefone').mask(SPMaskBehavior, spOptions);

    /**
     * Cria a funcao de capitalize
     * 
     * @returns {string}
     */
    String.prototype.capitalize = function () {
        return this.charAt(0).toUpperCase() + this.slice(1);
    };

    /**
     * busca cep generico para endereço
     */
    $(document).on("keyup", ".cep", function (e) {
        e.preventDefault();
        var valor = $(this).val();
        if (!isNaN(valor) && valor.length === 8) {
            $.get("http://viacep.com.br/ws/" + valor + "/json/", {}, function (data) {
                $(document).find(".endereco").val(data.logradouro);
                $(document).find(".bairro").val(data.bairro);
                $(document).find(".cidade").val(data.localidade);
                $(document).find(".estado").val(data.uf);
                $(document).find(".complemento").val(data.complemento);
                $(document).find(".numero").focus();
            }, "json");
        }
    });

    /**
     * Adiciona conteudos que normalmente são duplicados como escolaridade, etc.
     */
    $(document).on("click", ".btn-more", function (e) {
        e.preventDefault();
        var b = $(this).parent().siblings(".duplicateable-content");
        var clone = b.clone();
        var qtde = $(this).parent().parent().children().not(".text-center .duplicateable-content").find(".item-form").length;
        clone.find('input, textarea, select, button').each(function () {
            $(this).attr("disabled", false).removeClass("disabled");
            var name;
            if ($(this)[0].hasAttribute("name")) {
                name = $(this).attr("name");
                name = name.replace("][", "][" + qtde + "][");
                $(this).attr("name", name);
            }

            if ($(this)[0].hasAttribute("id")) {
                var id = $(this).attr("id");
                name = $(this).attr("name");
                var vetor = name.split(/[\[\]]+/).filter(function (e) {
                    return e;
                });
                vetor[3] = vetor[3].charAt(0).toUpperCase() + vetor[3].slice(1); //capitalize
                id = vetor[1] + qtde + vetor[3]; // new id
                $(this).attr("id", id);
            }
        });
        var c = $("<div>").append(clone).html();
        $(c).insertBefore(b);
        var d = b.prev(".duplicateable-content");
        d.fadeIn(600).removeClass("duplicateable-content");
        d.find(".btn-remove").on("click", function (a) {
            a.preventDefault();
            var b = $(this).parents(".item-block").parent("div");
            b.fadeOut(600, function () {
                b.remove();
            });
        });
    });

    /**
     * Gera autocomplete de endereco
     */
    $(".endereco-rapido").autocomplete({
        minLength: 2,
        selectFirst: true,
        source: function (request, response) {
            $.ajax({
                url: getUrl() + "/endereco-rapido",
                dataType: "json",
                data: {
                    q: $(".endereco-rapido").val()
                },
                success: function (data) {
                    var dados = $.map(data.options, function (el, i) {
                        return {
                            value: el.Endereco.cidade + ', ' + el.Endereco.estado,
                            cidade: el.Endereco.cidade,
                            estado: el.Endereco.estado
                        };
                    });
                    return response(dados);
                }
            });
        },
        select: function (event, ui) {
            $(".cidade").val(ui.item.cidade);
            $(".estado").val(ui.item.estado);
        },
        change: function (event, ui) {
            if (ui.item === null) {
                $(this).val((ui.item ? ui.item.id : ""));
            }
        }
    }).keyup(function (e) {
        if ($(this).val() === "") {
            $(".cidade, .estado").val("");
        }
    });

    /**
     * Autocomplete para titulo das vagas
     */
    $(".titulo-vagas-rapido").autocomplete({
        minLength: 2,
        source: function (request, response) {
            $.ajax({
                url: getUrl() + "/titulo-vagas-rapido",
                dataType: "json",
                data: {
                    q: $(".titulo-vagas-rapido").val()
                },
                success: function (data) {
                    var dados = $.map(data.options, function (el, i) {
                        return {
                            value: el.Vaga.nome.capitalize()
                        };
                    });
                    return response(dados);
                }
            });
        }
    });

    /**
     * Arrasta e solta das imagens
     */
    $('.dropify').dropify({
        messages: {
            'default': 'Arraste e solte seu arquivo aqui ou clique aqui',
            'replace': 'Arraste e solte ou clique para substituir',
            'remove': 'Remover',
            'error': 'Opa, Algo errado aconteceu, tente novamente.'
        },
        error: {
            'fileSize': 'O tamanho do arquivo é muito grande ({{ value }} máx).',
            'minWidth': 'A largura da imagem é muito pequena ({{ value }}}px min).',
            'maxWidth': 'A largura da imagem é muito grande ({{ value }}}px máx).',
            'minHeight': 'A altura da imagem é muito pequena ({{ value }}}px min).',
            'maxHeight': 'A altura da imagem é muito grande ({{ value }}px máx).',
            'imageFormat': 'O formato da imagem não é permitido ({{ value }} only).'
        }
    });

    $('.escolaridade .btn-remove').unbind('click');
    $(document).on('click', '.escolaridade .btn-remove', function (e) {
        e.preventDefault();
        var b = $(this).parents(".item-block").parent("div");
        if ($(this).parents('.row').parents('.row').length > 1) {
            b.fadeOut(600, function () {
                b.remove();
            });
        }
    });
});


/**
 * Funcoes e variavaies mask input
 */
var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

/**
 * Get URL
 * 
 * @returns {String}
 */
function getUrl() {
    if (window.location.hostname === "localhost")
    {
        var protocol = window.location.protocol;
        var host = window.location.host;
        return protocol + "//" + host + "/freejobs";
    }
    return "";
}