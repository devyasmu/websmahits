@extends('layouts.admin')

@section('title', 'Manajemen Halaman')
@section('page-title', 'Manajemen Halaman')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Halaman</h5>
                <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Halaman
                </a>
            </div>
            <div class="card-body">
                @if($pages->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Slug</th>
                                    <th>Meta Title</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->title }}</td>
                                    <td>{{ $page->slug }}</td>
                                    <td>{{ $page->meta_title ?? '-' }}</td>
                                    <td>
                                        @if($page->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>{{ $page->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus halaman ini?')">
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
                        <i class="bi bi-file-text fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada halaman</h5>
                        <p class="text-muted">Mulai dengan menambahkan halaman pertama Anda.</p>
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Halaman
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
