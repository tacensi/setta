jQuery(document).ready(function($){
	// on modal open, call get modulo to get the relative post
	$('#modal').on('show.bs.modal', function (relatedTarget) {
		var moduloId = $(relatedTarget.relatedTarget).data('modulo');

		getModulo(moduloId);
	});

	getModulo = function (moduloId) {
		var id = moduloId;

		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: setta.ajaxUrl,
			data: {
				action: 'setta_get_modulo',
				mod_id: id,
			},
			success: function(data){
				if (data){
					updateModulo(data);
				}
			},
			error: function(data){
				window.alert("Houve um erro com seu pedido. Se o erro persistir, contate o administrador.");
			}
		});
	}

	updateModulo = function (data) {
		if (data.title) {
			$('#modal-title').text(data.title);
		}

		if (data.body) {
			$('#modal-body').text(data.body);
		}
	}

});
