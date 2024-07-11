@extends('admin.main')
@section('main')
<main id="main" class="main">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Data Paket</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			color: #566787;
			background: #f5f8ff;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
			overflow-x: hidden; /* Disable horizontal scroll */
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
			overflow-x: auto; /* Enable horizontal scroll for this container only if necessary */
		}

		.table-title {
			padding-bottom: 15px;
			background: #0087ff;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 5px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 150px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #fcfcfc;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #f5f5f5;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		.custom-checkbox input[type="checkbox"]:checked+label:before {
			border-color: #03A9F4;
			background: #03A9F4;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			border-color: #fff;
		}

		.custom-checkbox input[type="checkbox"]:disabled+label:before {
			color: #b8b8b8;
			cursor: auto;
			box-shadow: none;
			background: #ddd;
		}

		/* Modal styles */
		.modal .modal-dialog {
			max-width: 400px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}

		/* Center the footer */
		.footer {
			text-align: center;
			padding: 10px 0;
			background-color: #f5f5f5;
			border-top: 1px solid #e9e9e9;
			margin-top: 20px;
		}
	</style>
	<script>
		$(document).ready(function () {
			$('body').on('click', '#edit', function () {
				var id = $(this).data('id');
				console.log(id);
				$.ajax({
					url: '/paket/' + id,
					type: 'GET',
					success: function (data) {
						console.log(data);
						$('#edtnama').val(data.data.nama);
						$('#edthari').val(data.data.hari);
						$('#edtgrup').val(data.data.grup);
						$('#edtharga').val(data.data.harga);
						$('#formEdit').attr('action', '/paket/' + id);
						$('#editEmployeeModal').modal('show');
					},
					error: function (error) {
						console.log('Error:', error);
					}
				});
			});

			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function () {
				if (this.checked) {
					checkbox.each(function () {
						this.checked = true;
					});
				} else {
					checkbox.each(function () {
						this.checked = false;
					});
				}
			});
			checkbox.click(function () {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
</head>

<body>
	<div class="container-xl">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-sm-6">
							<h2>Data <b>Paket</b></h2>
						</div>
						<div class="col-sm-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Tambah Data</span></a>
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>No</th>
							<th>ID Paket</th>
							<th>Nama Paket</th>
							<th>Jumlah Hari</th>
							<th>Grup</th>
							<th>Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($paket as $key => $item)
							<tr>
								<td>{{ $key + 1 }}</td>
								<td>{{ $item->id }}</td>
								<td>{{ $item->nama }}</td>
								<td>{{ $item->hari }}</td>
								<td>{{ $item->grup }}</td>
								<td>{{ $item->harga }}</td>
								<td>
									<div class="d-flex">
										<button id='edit' class="btn btn-warning btn-sm me-2" data-id="{{ $item->id }}"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
										<form action="{{ route('paket.destroy', $item->id) }}" method="POST">
											@csrf
											@method("DELETE")
											<button type="submit" class="btn btn-danger btn-sm"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></button>
										</form>
									</div>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="{{ route('paket.store') }}" method="post">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title">Tambah Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Paket</label>
							<input class="form-control" name="nama" id="nama" required>
						</div>
						<div class="form-group">
							<label>Hari</label>
							<input type="number" class="form-control" name="hari" id="hari" required>
						</div>
						<div class="form-group">
							<label>Jumlah Grup</label>
							<input type="number" class="form-control" name="grup" id="grup" required>
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input type="number" name="harga" id="harga" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Kembali">
						<input type="submit" class="btn btn-success" value="Tambah">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="formEdit" method="POST" action="">
					@csrf
					@method("PUT")
					<div class="modal-header">
						<h4 class="modal-title">Edit Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Paket</label>
							<input class="form-control" name="nama" id="edtnama" required>
						</div>
						<div class="form-group">
							<label>Hari</label>
							<input type="number" class="form-control" name="hari" id="edthari" required>
						</div>
						<div class="form-group">
							<label>Jumlah Grup</label>
							<input type="number" class="form-control" name="grup" id="edtgrup" required>
						</div>
						<div class="form-group">
							<label>Harga</label>
							<input type="number" name="harga" id="edtharga" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Kembali">
						<input type="submit" class="btn btn-info" value="Simpan">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Hapus Data</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<p>Apakah anda yakin untuk menghapus data ini?</p>
						<p class="text-warning"><small>Tindakan ini tidak bisa dibatalkan.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Kembali">
						<input type="submit" class="btn btn-danger" value="Hapus">
					</div>
				</form>
			</div>
		</div>
	</div>

	<!-- Footer -->
	<div class="footer text-center">
		<p>&copy; 2024 Reishinta. All Rights Reserved.</p>
	</div>

</body>
</html>

@endsection
