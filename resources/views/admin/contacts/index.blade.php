@extends('layouts.admin')

@section('title', 'Manajemen Kontak')
@section('page-title', 'Manajemen Kontak')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Daftar Pesan Kontak</h5>
            </div>
            <div class="card-body">
                @if($contacts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Telepon</th>
                                    <th>Subjek</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($contacts as $contact)
                                <tr class="{{ !$contact->is_read ? 'table-warning' : '' }}">
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone ?? '-' }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>
                                        @if($contact->is_read)
                                            <span class="badge bg-success">Sudah Dibaca</span>
                                        @else
                                            <span class="badge bg-warning">Belum Dibaca</span>
                                        @endif
                                    </td>
                                    <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-eye"></i>
                                            </a>
                                            @if(!$contact->is_read)
                                                <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-success">
                                                        <i class="bi bi-check"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
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
                        <i class="bi bi-envelope fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada pesan kontak</h5>
                        <p class="text-muted">Pesan kontak dari pengunjung akan muncul di sini.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
