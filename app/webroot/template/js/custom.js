"use strict";

$(function () {

	$(document).on("keyup", ".cep", function (e) {
		e.preventDefault();
		var valor = $(this).val();
		if (!isNaN(valor) && valor.length == 8) {
			$.get("http://viacep.com.br/ws/" + valor + "/json/", {}, function (data) {
				$(document).find(".endereco").val(data.logradouro);
				$(document).find(".bairro").val(data.bairro);
				$(document).find(".cidade").val(data.localidade);
				$(document).find(".estado").val(data.uf);
				$(document).find(".complemento").val(data.complemento);
				$(document).find(".numero").focus();
			}, "json");
		}
	})

	$(document).on("click", ".btn-more", function (e) {
		e.preventDefault();
		var b = $(this).parent().siblings(".duplicateable-content");
		var clone = b.clone();
		var qtde = $(this).parent().parent().children().not(".duplicateable-content").find(".item-form").length;
		clone.find('input, textarea, select, button').each(function () {
			$(this).attr("disabled", false).removeClass("disabled");
			if ($(this)[0].hasAttribute("name")) {
				var name = $(this).attr("name");
				name = name.replace("][", "][" + qtde + "][");
				$(this).attr("name", name);
			}

			if($(this)[0].hasAttribute("id")){
				var id = $(this).attr("id");
				var name = $(this).attr("name");
				var vetor = name.split(/[\[\]]+/).filter(function(e) { return e; });
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
				b.remove()
			});
		});
	})
});


//
// Draw map in page-contact
//
function initMap() {
	var mapDiv = document.getElementById('contact-map');
	var map = new google.maps.Map(mapDiv, {
		center: { lat: 44.540, lng: -78.546 },
		zoom: 14
	});

	var marker = new google.maps.Marker({
		position: { lat: 44.540, lng: -78.546 },
		map: map
	});

	var infowindow = new google.maps.InfoWindow({
		content: "<strong>Our office</strong><br>3652 Seventh Avenue, Los Angeles, CA"
	});

	marker.addListener('click', function () {
		infowindow.open(map, marker);
	});

	infowindow.open(map, marker);

	map.set('styles', [{ "featureType": "landscape", "stylers": [{ "hue": "#FFBB00" }, { "saturation": 43.400000000000006 }, { "lightness": 37.599999999999994 }, { "gamma": 1 }] }, { "featureType": "road.highway", "stylers": [{ "hue": "#FFC200" }, { "saturation": -61.8 }, { "lightness": 45.599999999999994 }, { "gamma": 1 }] }, { "featureType": "road.arterial", "stylers": [{ "hue": "#FF0300" }, { "saturation": -100 }, { "lightness": 51.19999999999999 }, { "gamma": 1 }] }, { "featureType": "road.local", "stylers": [{ "hue": "#FF0300" }, { "saturation": -100 }, { "lightness": 52 }, { "gamma": 1 }] }, { "featureType": "water", "stylers": [{ "hue": "#0078FF" }, { "saturation": -13.200000000000003 }, { "lightness": 2.4000000000000057 }, { "gamma": 1 }] }, { "featureType": "poi", "stylers": [{ "hue": "#00FF6A" }, { "saturation": -1.0989010989011234 }, { "lightness": 11.200000000000017 }, { "gamma": 1 }] }]);
}