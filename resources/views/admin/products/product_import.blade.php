@extends('layout.master')

@section('title', 'Importación de productos')

@section('main_content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📥 Importación de productos</h5>
                    <div>
                        <a href="{{ route('download.sample.file') }}" class="btn btn-light btn-sm me-2">
                            📄 Descargar archivo de muestra
                        </a>
                        <a href="{{ route('products.list') }}" class="btn btn-warning btn-sm">
                            <i class="fa fa-reply"></i> Volver a la lista
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Errores detectados:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Elija el archivo para importar:</label>
                            <input type="file" name="file" class="form-control" id="file"
                                   accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            🚀 Importar
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
