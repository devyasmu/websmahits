@extends('layouts.admin')

@section('title', 'Manajemen Pengumuman')
@section('page-title', 'Manajemen Pengumuman')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Pengumuman</h5>
                <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Pengumuman
                </a>
            </div>
            <div class="card-body">
                @if($announcements->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Prioritas</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($announcements as $announcement)
                                <tr>
                                    <td>{{ $announcement->title }}</td>
                                    <td>
                                        @switch($announcement->priority)
                                            @case('urgent')
                                                <span class="badge bg-danger">Urgent</span>
                                                @break
                                            @case('high')
                                                <span class="badge bg-warning">Tinggi</span>
                                                @break
                                            @case('normal')
                                                <span class="badge bg-primary">Normal</span>
                                                @break
                                            @case('low')
                                                <span class="badge bg-secondary">Rendah</span>
                                                @break
                                        @endswitch
                                    </td>
                                    <td>{{ $announcement->start_date ? $announcement->start_date->format('d/m/Y') : '-' }}</td>
                                    <td>{{ $announcement->end_date ? $announcement->end_date->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        @if($announcement->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.announcements.edit', $announcement) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.announcements.destroy', $announcement) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengumuman ini?')">
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
                        <i class="bi bi-megaphone fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada pengumuman</h5>
                        <p class="text-muted">Mulai dengan menambahkan pengumuman pertama Anda.</p>
                        <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Pengumuman
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
