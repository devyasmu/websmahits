@extends('layouts.admin')

@section('title', 'Manajemen Running Text')
@section('page-title', 'Manajemen Running Text')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Running Text</h5>
                <a href="{{ route('admin.running-texts.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Running Text
                </a>
            </div>
            <div class="card-body">
                @if($runningTexts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Text</th>
                                    <th>Link</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($runningTexts as $runningText)
                                <tr>
                                    <td>{{ $runningText->text }}</td>
                                    <td>
                                        @if($runningText->link)
                                            <a href="{{ $runningText->link }}" target="_blank" class="text-decoration-none">
                                                {{ $runningText->link }}
                                            </a>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                    <td>{{ $runningText->order }}</td>
                                    <td>
                                        @if($runningText->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.running-texts.edit', $runningText) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.running-texts.destroy', $runningText) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus running text ini?')">
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
                        <i class="bi bi-text-paragraph fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada running text</h5>
                        <p class="text-muted">Mulai dengan menambahkan running text pertama Anda.</p>
                        <a href="{{ route('admin.running-texts.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Running Text
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
