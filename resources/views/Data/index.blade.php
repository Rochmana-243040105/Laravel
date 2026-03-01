<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .action-buttons {
            white-space: nowrap;
        }
        .action-buttons a {
            color:#000;
            text-decoration:none;
        }
        .table-responsive {
            margin-top: 20px;
        }
        h1 {
            color: #333;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Daftar Mahasiswa</h1>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                 {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
       <ul class="mb-0">
        @foreach ($errors->all() as $item) 
            <li>{{ $item }}</li>
        @endforeach 
         </ul>
    </div>
    @endif 
        <!-- Tabel Data Mahasiswa -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Program Studi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item) 
                        <tr> 
                        <td>{{ $loop->iteration }} </td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->nim}}</td>
                        <td>{{$item->program_studi}}</td>
                        <td class="action-buttons">
                            <button class="btn btn-sm btn-warning">
                                <a href="{{ route('data.edit', ['id' => $item->id]) }}">
                                <i class="fas fa-edit"></i> Edit
                                </a>
                            </button>
                            <form action="{{ route('data.delete', ['id' => $item->id]) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> Hapus
                                </button> 
                            
                            </form>
                        </td>
                    </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>

        <!-- Form Tambah Data (opsional) -->
        <div class="mt-4 p-3 bg-light rounded">
            <h3>{{ isset($dataDetail)?'Edit Data':'Tambah Data' }}</h3>
            <form action="{{ isset($dataDetail) ? route('data.update', ['id' => $dataDetail->id]) : route('data.store') }}" method="post">
                @csrf
                @if (isset($dataDetail))
                    @method('PUT')
                @endif
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $dataDetail->nama??'') }}" required>
                </div>
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim', $dataDetail->nim??'') }}" required>
                </div>
                <div class="mb-3">
                    <label for="program_studi" class="form-label">Program Studi</label>
                    <input type="text" class="form-control" id="program_studi" name="program_studi" value="{{ old('program_studi', $dataDetail->program_studi??'') }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>