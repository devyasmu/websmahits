@extends('layouts.admin')

@section('title', 'Manajemen Menu')
@section('page-title', 'Manajemen Menu')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Menu</h5>
                <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Menu
                </a>
            </div>
            <div class="card-body">
                @if($menus->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>URL</th>
                                    <th>Target</th>
                                    <th>Parent</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($menus as $menu)
                                <tr>
                                    <td>{{ $menu->title }}</td>
                                    <td>{{ $menu->url ?? '-' }}</td>
                                    <td>
                                        @if($menu->target === '_blank')
                                            <span class="badge bg-info">Tab Baru</span>
                                        @else
                                            <span class="badge bg-secondary">Tab Sama</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($menu->parent)
                                            {{ $menu->parent->title }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $menu->order }}</td>
                                    <td>
                                        @if($menu->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus menu ini?')">
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
                        <i class="bi bi-list fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada menu</h5>
                        <p class="text-muted">Mulai dengan menambahkan menu pertama Anda.</p>
                        <a href="{{ route('admin.menus.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Menu
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
