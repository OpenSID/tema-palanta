@extends('theme::layouts.right-sidebar')
@include('theme::commons.asset_sweetalert')

@section('content')
<div class="heading-module l-flex">
    <div class="heading-module-inner l-flex">
        <i class="fa fa-edit"></i>
        <h1>Informasi</h1>
    </div>
</div>
<div class="box-def">
	<div class="box-def-inner">
		<div class="c-flex" style="margin:20px 0 20px;text-align:center;width:100%;">
			<h1>Produk Hukum</h1>
		</div>
	
		<div class="row">
			<div class="col-md-6" style="margin-bottom:10px;">
				<label style="font-size:95%;margin:0;padding:0;line-height:1.2;">Tahun</label>
				<select class="form-control" id="list_tahun" name="tahun">
                    <option selected="" value="">Semua</option>
                </select>
			</div>
			<div class="col-md-6" style="margin-bottom:10px;">
				<label style="font-size:95%;margin:0;padding:0;line-height:1.2;"> Kategori</label>
				<select class="form-control" id="list_kategori" name="kategori">
                    <option selected="" value="">Semua</option>
                </select>
			</div>
		</div>
		
		<div class="table-responsive">
			<table class="table table-striped table-bordered customtables" id="tabelData">
				<thead>
					<tr>
						<th><center>No</center></th>
						<th><center>Judul Produk Hukum</center></th>
						<th><center>Kategori</center></th>
						<th><center>Tahun</center></th>
						<th><center>Aksi</center></th>
					</tr>
				</thead>
                <tbody></tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        var apiTahun = '{{ route("api.tahun-produk-hukum") }}';
        $.get(apiTahun, function (data) {
            var dataTahun = data.data;
            var selectTahun = $('#list_tahun');
            dataTahun.forEach(function (item) {
                selectTahun.append('<option value="' + item + '">' + item + '</option>');
            });
        });

        var routeKategoriProdukHukum = '{{ route("api.kategori-produk-hukum") }}';
        $.get(routeKategoriProdukHukum, function (data) {
            var dataKategori = data.data;
            var selectKategori = $('#list_kategori');
            dataKategori.forEach(function (item) {
                selectKategori.append('<option value="' + item.id + '">' + item.attributes.nama + '</option>');
            });
        });

        var routeProdukHukum = `{{ route('api.produk-hukum') }}`;

        var tabelData = $('#tabelData').DataTable({
            processing: true,
            serverSide: true,
            autoWidth: false,
            ordering: true,
            ajax: {
                url: `{{ route('api.produk-hukum') }}`,
                method: 'GET',
                data: function(row) {
                    var tahun = $('#list_tahun').val();
                    var kategori = $('#list_kategori').val();
                    var params = {
                        "page[size]": row.length,
                        "page[number]": (row.start / row.length) + 1,
                        "filter[search]": row.search.value,
                        "sort": `${row.order[0]?.dir === "asc" ? "" : "-"}${row.columns[row.order[0]?.column]?.name}`
                    };

                    if (tahun) {
                        params['filter[tahun]'] = tahun;
                    }

                    if (kategori) {
                        params['filter[kategori]'] = kategori;
                    }

                    return params;
                },
                dataSrc: function(json) {
                    json.recordsTotal = json.meta.pagination.total;
                    json.recordsFiltered = json.meta.pagination.total;
                    return json.data;
                },
                error: function(xhr) {
                    console.error('AJAX Error:', xhr.responseText);
                    Swal.fire('Error', 'Terjadi kesalahan saat memuat data.', 'error');
                }
            },
            columnDefs: [
                { targets: '_all', className: 'text-nowrap' },
            ],
            columns: [
                { data: null, searchable: false, orderable: false, className: 'text-center' },
                { data: 'nama', name: 'nama', render: (data, type, row) => row.attributes.nama },
                { data: 'kategori', name: 'kategori', render: (data, type, row) => row.attributes.kategori },
                { data: 'tahun', name: 'tahun', render: (data, type, row) => row.attributes.tahun, className: 'text-center' },
                {
                    data: null,
                    searchable: false,
                    orderable: false,
                    render: (data, type, row) => {                        
                        return `<button class="btn btn-success btn-xs lihat-dokumen"
                                    data-nama="${row.attributes.nama}"
                                    data-file="${row.attributes.satuan}">Lihat</button>`;
                    }
                }
            ],
            order: [[3, 'desc']],
            drawCallback: function(settings) {
                var api = this.api();
                api.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
                    cell.innerHTML = api.page.info().start + i + 1;
                });
            }
        });

        $(document).on('change', '#list_tahun, #list_kategori', function() {
            tabelData.ajax.reload();
        });

        $(document).on('click', '.lihat-dokumen', function() {
            var nama = $(this).data('nama');
            var base64 = $(this).data('file');

            nama = nama.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');

            if (!base64) {
                Swal.fire('Error', 'File tidak ditemukan.', 'error');
                return;
            }

            Swal.fire({
                title: '<h4 style="margin-bottom: 10px;">Lihat</h4>',
                html: `
                    <div style="display: flex; flex-direction: column; align-items: center; width: 100%; gap: 15px;">
                        <iframe src="${base64}" style="width: 100%; height: 500px; border: 1px solid #ddd; border-radius: 5px;"></iframe>
                        <button class="btn btn-primary btn-sm unduh-dokumen" data-nama="${nama}" data-base64="${base64}"
                            style="padding: 8px 20px; font-size: 14px; border-radius: 5px; cursor: pointer;">
                            Unduh File
                        </button>
                    </div>
                `,
                width: '60%',
                heightAuto: true,
                showCloseButton: true,
                showConfirmButton: false,
                showCancelButton: false,
            });
        });

        $(document).on('click', '.unduh-dokumen', function() {
            const base64 = $(this).data('base64');
            const fileName = $(this).data('nama');

            downloadFile(base64, fileName);
        });

        // TODO:: Pindahkan ke file terpisah
        function downloadFile(base64Data, fileName) {
            const mimeTypeMatch = base64Data.match(/^data:([^;]+);base64,/);
            const mimeType = mimeTypeMatch ? mimeTypeMatch[1] : 'application/octet-stream';

            const base64WithoutPrefix = base64Data.split(',')[1];

            const byteCharacters = atob(base64WithoutPrefix);
            const byteNumbers = new Array(byteCharacters.length);
            for (let i = 0; i < byteCharacters.length; i++) {
                byteNumbers[i] = byteCharacters.charCodeAt(i);
            }
            const byteArray = new Uint8Array(byteNumbers);
            const blob = new Blob([byteArray], { type: mimeType });

            const blobUrl = URL.createObjectURL(blob);

            const link = document.createElement('a');
            link.href = blobUrl;
            link.download = fileName;

            link.click();

            URL.revokeObjectURL(blobUrl);
        }
    });
</script>
@endpush