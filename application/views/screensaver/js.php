<script>
var csrfName = '<?php echo $this->security->get_csrf_token_name(); ?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash(); ?>';

$(() => {
	var table = $('#example').DataTable({
        language: {
            search: "_INPUT_",
            searchPlaceholder: "Search records"
        },
        lengthChange: false,
        ajax: {
        	url: "<?= base_url(); ?>screensaver/dt_table"
        },
        columnDefs: [
        	{targets: 0, data: 'no'},
        	{targets: 1, data: 'file'},
        	{targets: 2, data: 'action'}
        ]
    });

	$('form').submit(function(e) {
		e.preventDefault();
		blockModal();

		var formData = new FormData($(this)[0]);
		formData.append(csrfName, csrfHash);

		$.ajax({
			url: `<?= base_url() ?>screensaver/add`,
			data: formData,
			dataType: 'json',
			type: 'post',
			contentType: false,
			processData: false
		})
		.done(function(data) {
			unBlockModal();

			if (data.status == 1) {
				$("#notification").html(create_notif(
					'success', 
					data.message
				));

				$("#tambahModal").modal('hide');
			} else {
				$("#submit_results").html(create_notif(
					'danger', 
					data.message
				));
			}

			csrfName = data.csrf.csrfName;
			csrfHash = data.csrf.csrfHash;

			table.ajax.reload(null, false);
		})
		.fail(function(err) {
			unBlockModal();
			$("#submit_results").html(create_notif(
				'danger', 
				'Terjadi kesalahan saat menyimpan data'
			));
		});

		return false;
	});

	$("#btnAdd").click(function(e) {
		e.preventDefault();

		$("#notification").html('');
		$("#submit_results").html('');
		$("#id").val('');

		$("#btn-save").html('Tambah');
	});

	var deleteId;
	$(document).on('click', '.btn-delete', function(e) {
		e.preventDefault();
		deleteId = $(this).data('id');

		$("#hapusModal").modal('show');
	});

	$("#no").click(function(e) {
		e.preventDefault();
		$("#hapusModal").modal('hide');
	});

	$("#yes").click(function(e) {
		e.preventDefault();
		$("#hapusModal").modal('hide');

		var formData = new FormData();

		if (deleteId) {
			blockUI();

			formData.append('id', deleteId);
			formData.append(csrfName, csrfHash);

			$.ajax({
				url: `<?= base_url() ?>screensaver/delete`,
				data: formData,
				dataType: 'json',
				type: 'post',
				contentType: false,
				processData: false
			})
			.done(function(data) {
				unBlockUI();

				if (data.status == 1) {
					$("#notification").html(create_notif(
						'success', 
						data.message
					));
				} else {
					$("#notification").html(create_notif(
						'danger', 
						data.message
					));
				}

				csrfName = data.csrf.csrfName;
				csrfHash = data.csrf.csrfHash;

				table.ajax.reload(null, false);
			})
			.fail(function(err) {
				unBlockUI();
				$("#notification").html(create_notif(
					'danger', 
					'Terjadi kesalahan saat menghapus data'
				));
			})
		}
	});

	$(document).on('click', '.btn-edit', function(e) {
		e.preventDefault();
		var id = $(this).data('id');
		blockUI();

		$("#btn-save").html('Ubah');

		$.get("<?= base_url() ?>screensaver/edit?id=" + id)
			.done(function(data) {
				$("#id").val(data.id);
				(data.file_type == 'video') ? $("#flexRadioDefault2").prop('checked', true) : $("#flexRadioDefault1").prop('checked', true);
				$("#tambahModal").modal('show');
				unBlockUI();
			})
			.fail(function(err) {
				unBlockUI();
			});
	});
});
</script>