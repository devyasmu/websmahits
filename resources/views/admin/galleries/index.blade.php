@extends('layouts.admin')

@section('title', 'Manajemen Galeri')
@section('page-title', 'Manajemen Galeri')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Galeri</h5>
                <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Galeri
                </a>
            </div>
            <div class="card-body">
                @if($galleries->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tipe</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($galleries as $gallery)
                                <tr>
                                    <td>
                                        @if($gallery->image)
                                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}" 
                                                 class="img-thumbnail" style="width: 80px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 80px; height: 60px;">
                                                <i class="bi bi-image text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $gallery->title }}</td>
                                    <td>
                                        @if($gallery->category)
                                            <span class="badge" style="background-color: {{ $gallery->category->color }}">
                                                {{ $gallery->category->name }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($gallery->type === 'video')
                                            <span class="badge bg-danger">Video</span>
                                        @else
                                            <span class="badge bg-primary">Gambar</span>
                                        @endif
                                    </td>
                                    <td>{{ $gallery->order }}</td>
                                    <td>
                                        @if($gallery->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.galleries.destroy', $gallery) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus galeri ini?')">
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
                        <i class="bi bi-images fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada galeri</h5>
                        <p class="text-muted">Mulai dengan menambahkan galeri pertama Anda.</p>
                        <a href="{{ route('admin.galleries.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Galeri
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
