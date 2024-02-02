<?php defined('BASEPATH') || exit('No direct script access allowed'); ?>

<div class="box-def">
	<div class="box-def-inner">
		<div class="c-flex" style="margin:20px 0 20px;text-align:center;width:100%;">
			<h1>Informasi Publik</h1>
		</div>
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered customtables" id="tabeldata">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th><center>Judul Informasi</center></th>
						<th><center>Tahun</center></th>
						<th><center>Kategori</center></th>
						<th><center>Tanggal</center></th>
						<th><center>Aksi</center></th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
<script src="<?= asset('js/sweetalert2/sweetalert2.all.min.js') ?>"></script>
<link rel="stylesheet" href="<?= asset('js/sweetalert2/sweetalert2.min.css') ?>">
<script>
    $(document).ready(function() {
        $(document).ready(function() {
            var url = "<?= site_url('informasi-publik/data') ?>";
            table = $('#tabeldata').DataTable({
                'processing': true,
                'serverSide': true,
                "pageLength": 10,
                'order': [],
                "ajax": {
                    "url": url,
                    "type": "POST"
                },
                //Set column definition initialisation properties.
                "columnDefs": [{
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                }],
                'language': {
                    'url': BASE_URL + '/assets/bootstrap/js/dataTables.indonesian.lang'
                },
                'drawCallback': function(event) {
                    $('.dataTables_paginate > .pagination').addClass('pagination-sm no-margin');
                    if (event.iDraw == 1) {
                        $('#info_publik_wrapper').on('click', 'table tr a.pdf', function(e) {
                            e.preventDefault();
                            var attr = $(this).attr('href');
                            Swal.fire({
                            customClass: {
                                popup: 'swal-lg',
                            },
                            title: 'Lihat',
                            html: `<object data="${attr}" style="width: 100%; min-height: 400px;" ></object>`,
                            showCancelButton: true,
                            cancelButtonText: 'Tutup',
                            showConfirmButton: false,
                            })
                        })
                    }
                }
            });
        });
    });
</script>

