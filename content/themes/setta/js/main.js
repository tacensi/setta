jQuery(document).ready(function($){
	// on modal open, call get modulo to get the relative post
	$('#modal').on('show.bs.modal', function (relatedTarget) {
		var moduloId = $(relatedTarget.relatedTarget).data('modulo');

		console.log(moduloId);

		getModulo(moduloId);
	});


	$(document).on('click', '.modulo-navigation', function(ev) {
		ev.preventDefault();
		var moduloId = $(this).attr('data-id');
		getModulo(moduloId);
	});

	$(document).on('click', '.atividade-navigation', function(ev) {
		ev.preventDefault();
		var moduloId = $(this).attr('data-modulo');
		var page = $(this).attr('data-page');
		getAtividades(moduloId, page);
	});

	// $('.modulo-navigation').click(function(ev) {
	// 	ev.preventDefault();
	// 	var moduloId = $(this).data('id');
	// 	getModulo(moduloId);
	// });

	getModulo = function (moduloId) {

		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: setta.ajaxUrl,
			data: {
				action: 'setta_get_modulo',
				mod_id: moduloId,
			},
			success: function(data){
				if (data){
					updateModulo(data);
				}
			},
			error: function(data){
				window.alert("Houve um erro. Caso persista, contate o administrador.");
			}
		});
	}

	updateModulo = function (data) {
		if (data.title) {
			$('#modal-title').text(data.title);
		}

		if (data.body) {
			$('#modal-body').html(data.body);
		}

		if (data.previous.id) {
			$('.modulo-navigation.previous').attr('data-id', data.previous.id);
			$('.modulo-navigation.previous').attr('title', data.previous.title);
			$('.modulo-navigation.previous').attr('disabled', false );
		} else {
			$('.modulo-navigation.previous').attr('disabled', true );
		}

		if (data.next.id) {
			$('.modulo-navigation.next').attr('data-id', data.next.id);
			$('.modulo-navigation.next').attr('title', data.next.title);
			$('.modulo-navigation.next').attr('disabled', false );
		} else {
			$('.modulo-navigation.next').attr('disabled', true );
		}
	}

	getAtividades = function (moduloId, page) {

		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: setta.ajaxUrl,
			data: {
				action: 'setta_get_atividades',
				mod_id: moduloId,
				page: page,
			},
			success: function(data){
				if (data){
					updateAtividades(data);
				}
			},
			error: function(data){
				window.alert("Houve um erro. Caso persista, contate o administrador.");
			}
		});
	}



	updateAtividades = function (data) {
		if (data.body) {
			$('#atividades-list').html(data.body);
			console.log (data.body);
		}

		if (data.page > 1) {
			$('.atividade-navigation.previous').attr('data-page', parseInt(data.page)-1);
			$('.atividade-navigation.previous').attr('disabled', false );
		} else {
			$('.atividade-navigation.previous').attr('disabled', true );
		}

		if (data.page < data.total_pages) {
			$('.atividade-navigation.next').attr('data-page', parseInt(data.page)+1);
			$('.atividade-navigation.next').attr('disabled', false );
		} else {
			$('.atividade-navigation.next').attr('disabled', true );
		}
	}

});
