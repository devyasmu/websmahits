@extends('layouts.admin')

@section('title', 'Fitur')
@section('page-title', 'Kelola Fitur')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Daftar Fitur</h5>
                <a href="{{ route('admin.features.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Fitur
                </a>
            </div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($features->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Icon</th>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($features as $index => $feature)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($feature->icon)
                                            <i class="{{ $feature->icon }}"></i>
                                        @else
                                            <i class="bi bi-star text-muted"></i>
                                        @endif
                                    </td>
                                    <td>{{ $feature->title }}</td>
                                    <td>{{ Str::limit($feature->description, 50) }}</td>
                                    <td>{{ $feature->order }}</td>
                                    <td>
                                        @if($feature->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.features.show', $feature) }}" class="btn btn-sm btn-outline-info">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-sm btn-outline-warning">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.features.destroy', $feature) }}" method="POST" class="d-inline" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus fitur ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="text-center py-4">
                        <i class="bi bi-star display-1 text-muted"></i>
                        <h5 class="mt-3">Belum ada fitur</h5>
                        <p class="text-muted">Mulai dengan menambahkan fitur pertama Anda.</p>
                        <a href="{{ route('admin.features.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus-circle"></i> Tambah Fitur Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
