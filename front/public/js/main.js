$(document).ready(function() {
	$('#confirm_action').on('shown.bs.modal', function(e) {
		const btnTarget = e.relatedTarget;
		const modal = $(this);
		modal.find("#confirm_action_title").html($(btnTarget).data('bs-title'));
		modal.find(".modal-body").html($(btnTarget).data('bs-body'));
		modal.find("#href-confirm-yes").attr("href", $(btnTarget).data('bs-href-yes'));
	});

	$('#detail_modal').on('shown.bs.modal', function(e) {
		const btnTarget = e.relatedTarget;
		const modal = $(this);
		modal.find('#detail_modal_title').html($(btnTarget).data('bs-title'));
		$.ajax({
			type: 'GET',
			url: $(btnTarget).data('url-account-detail'),
			success: function(response) {
				modal.find(".modal-body").html(response);
			}
		})
	});
});
