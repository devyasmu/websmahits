@extends('layouts.admin')

@section('title', 'Manajemen Guru')
@section('page-title', 'Manajemen Guru')

@section('content')
<div class="row">
    <div class="col-12">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Guru</h5>
                <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Guru
                </a>
            </div>
            <div class="card-body">
                @if($teachers->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jabatan / Mata Pelajaran</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($teachers as $teacher)
                                <tr>
                                    <td>
                                        @if($teacher->photo)
                                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" 
                                                 class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;"
                                                 onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2260%22 height=%2260%22%3E%3Crect fill=%22%23e9ecef%22 width=%2260%22 height=%2260%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 fill=%22%236c757d%22 font-size=%228%22 text-anchor=%22middle%22 dy=%22.3em%22%3ENo image%3C/text%3E%3C/svg%3E';">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 60px; height: 60px; border-radius: 50%;">
                                                <i class="bi bi-person text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $teacher->name }}</td>
                                    <td>{{ $teacher->position ?? '-' }}</td>
                                    <td>{{ $teacher->order }}</td>
                                    <td>
                                        @if($teacher->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.teachers.edit', $teacher) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.teachers.destroy', $teacher) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus guru ini?')">
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
                    <div class="text-center py-5">
                        <i class="bi bi-person-badge fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada data guru</h5>
                        <p class="text-muted">Mulai dengan menambahkan guru pertama.</p>
                        <a href="{{ route('admin.teachers.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Guru
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
