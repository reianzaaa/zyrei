@extends('admin.main')
@section('main')
<main id="main" class="main">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Perhitungan SAW</title>
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
            overflow-x: auto;
        }

        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
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
            white-space: nowrap; /* Ensure no word-wrapping */
        }

        table.table tr th:first-child {
            width: 60px;
        }

        table.table tr th:last-child {
            width: 100px;
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

        /* Tambahkan aturan CSS ini */
        table.table tr th,
        table.table tr td {
            border: 1px solid #ddd;
            text-align: center;
            padding: 8px;
            white-space: nowrap; /* Ensure no word-wrapping */
        }

        /* Aturan CSS untuk mengatur lebar kolom */
        .table th.benefit,
        .table td.benefit {
            width: 20%;
        }

        .table th.cost-hari,
        .table td.cost-hari {
            width: 15%;
        }

        .table th.cost-grup,
        .table td.cost-grup {
            width: 15%;
        }
    </style>
    <script>
        $(document).ready(function () {
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
                            <h2>Perhitungan <b>SAW</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{route('hitung')}}" class="btn btn-success"><i
                                    class="material-icons">&#xE147;</i> <span>Hitung</span></a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th colspan="3">Hitung</th>
                                <th rowspan="2">Hasil</th>
                                <th rowspan="2">Nama Paket</th>
                                <th rowspan="2">Jumlah Hari</th>
                                <th rowspan="2">Keterangan</th>
                            </tr>
                            <tr>
                                <th class="benefit">Benefit (Harga 50%)</th>
                                <th class="cost-hari">Cost (Hari 30%)</th>
                                <th class="cost-grup">Cost (Grup 20%)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td class="benefit">{{$item->harga}}</td>
                                <td class="cost-hari">{{$item->hari}}</td>
                                <td class="cost-grup">{{$item->grup}}</td>
                                <td>{{$item->hasil}}</td>
                                <td>{{$item->nama_paket}}</td>
                                <td>{{$item->hari_paket}}</td>
                                <td>{{$item->keterangan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Edit Modal HTML -->
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Tambah Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Paket</label>
                                <select class="form-control" required>
                                    <option value="Lite">Lite</option>
                                    <option value="Miles">Miles</option>
                                    <option value="Gwen">Gwen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hari">Total Hari</label>
                                <select class="form-control" id="hari" required>
                                    <option value="1">1 Hari</option>
                                    <option value="3">3 Hari</option>
                                    <option value="7">7 Hari</option>
                                    <option value="15">15 Hari</option>
                                    <option value="30">30 Hari</option>
                                    <option value="60">60 Hari</option>
                                    <option value="90">90 Hari</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hari">Paket</label>
                                <select class="form-control" id="hari" required>
                                    <option value="1">Lite</option>
                                    <option value="3">Miles</option>
                                    <option value="7">Gwen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="email" class="form-control" required>
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
                    <form>
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Data</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Paket</label>
                                <select class="form-control" required>
                                    <option value="Lite">Lite</option>
                                    <option value="Miles">Miles</option>
                                    <option value="Gwen">Gwen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hari">Total Hari</label>
                                <select class="form-control" id="hari" required>
                                    <option value="1">1 Hari</option>
                                    <option value="3">3 Hari</option>
                                    <option value="7">7 Hari</option>
                                    <option value="15">15 Hari</option>
                                    <option value="30">30 Hari</option>
                                    <option value="60">60 Hari</option>
                                    <option value="90">90 Hari</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hari">Paket</label>
                                <select class="form-control" id="hari" required>
                                    <option value="1">Lite</option>
                                    <option value="3">Miles</option>
                                    <option value="7">Gwen</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="email" class="form-control" required>
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
    </div>
    <!-- Footer -->
	<div class="footer text-center">
		<p>&copy; 2024 Reishinta. All Rights Reserved.</p>
	</div>

</body>
</html>

@endsection