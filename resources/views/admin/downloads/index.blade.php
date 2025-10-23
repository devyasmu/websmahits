@extends('layouts.admin')

@section('title', 'Manajemen Download')
@section('page-title', 'Manajemen Download')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Download</h5>
                <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Download
                </a>
            </div>
            <div class="card-body">
                @if($downloads->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>File</th>
                                    <th>Ukuran</th>
                                    <th>Download</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($downloads as $download)
                                <tr>
                                    <td>{{ $download->title }}</td>
                                    <td>
                                        @if($download->category)
                                            <span class="badge" style="background-color: {{ $download->category->color }}">
                                                {{ $download->category->name }}
                                            </span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>
                                        <i class="bi bi-file-earmark"></i>
                                        {{ $download->file_name }}
                                    </td>
                                    <td>{{ number_format($download->file_size / 1024, 2) }} KB</td>
                                    <td>
                                        <span class="badge bg-info">{{ $download->download_count }}</span>
                                    </td>
                                    <td>
                                        @if($download->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.downloads.edit', $download) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.downloads.destroy', $download) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus download ini?')">
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
                        <i class="bi bi-download fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada file download</h5>
                        <p class="text-muted">Mulai dengan menambahkan file download pertama Anda.</p>
                        <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Download
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
