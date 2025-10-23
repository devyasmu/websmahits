@extends('layouts.admin')

@section('title', 'Manajemen Testimoni')
@section('page-title', 'Manajemen Testimoni')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar Testimoni</h5>
                <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah Testimoni
                </a>
            </div>
            <div class="card-body">
                @if($testimonials->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Posisi</th>
                                    <th>Perusahaan</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($testimonials as $testimonial)
                                <tr>
                                    <td>
                                        @if($testimonial->photo)
                                            <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" 
                                                 class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover; border-radius: 50%;">
                                        @else
                                            <div class="bg-light d-flex align-items-center justify-content-center" 
                                                 style="width: 60px; height: 60px; border-radius: 50%;">
                                                <i class="bi bi-person text-muted"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->position ?? '-' }}</td>
                                    <td>{{ $testimonial->company ?? '-' }}</td>
                                    <td>
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $testimonial->rating)
                                                <i class="bi bi-star-fill text-warning"></i>
                                            @else
                                                <i class="bi bi-star text-muted"></i>
                                            @endif
                                        @endfor
                                    </td>
                                    <td>
                                        @if($testimonial->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                        @if($testimonial->is_featured)
                                            <span class="badge bg-primary">Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimoni ini?')">
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
                        <i class="bi bi-chat-quote fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada testimoni</h5>
                        <p class="text-muted">Mulai dengan menambahkan testimoni pertama Anda.</p>
                        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah Testimoni
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
