@extends('layouts.admin')

@section('title', 'Manajemen Program')
@section('page-title', 'Manajemen Program')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Program</h5>
                <a href="{{ route('admin.admin-programs.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Program
                </a>
            </div>
            <div class="card-body">
                @if($programs->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Durasi</th>
                                    <th>Kelompok Usia</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($programs as $program)
                                <tr>
                                    <td>
                                        @if($program->featured_image)
                                            <img src="{{ asset('storage/' . $program->featured_image) }}" alt="{{ $program->title }}" 
                                                 class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;"
                                                 onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%2280%22 height=%2260%22%3E%3Crect fill=%22%23e9ecef%22 width=%2280%22 height=%2260%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 fill=%22%236c757d%22 font-size=%2210%22 text-anchor=%22middle%22 dy=%22.3em%22 font-family=%22sans-serif%22%3ENo image%3C/text%3E%3C/svg%3E';">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 80px; height: 60px;">
                                                <i class="bi bi-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $program->title }}</td>
                                    <td>{{ $program->duration ?? '-' }}</td>
                                    <td>{{ $program->age_group ?? '-' }}</td>
                                    <td>
                                        @if($program->price)
                                            Rp {{ number_format($program->price, 0, ',', '.') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if($program->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                        @if($program->is_featured)
                                            <span class="badge bg-primary">Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.admin-programs.edit', $program) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.admin-programs.destroy', $program) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus program ini?')">
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
                        <i class="bi bi-book fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada program</h5>
                        <p class="text-muted">Mulai dengan menambahkan program pertama Anda.</p>
                        <a href="{{ route('admin.admin-programs.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Program
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
