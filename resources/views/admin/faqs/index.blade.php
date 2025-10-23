@extends('layouts.admin')

@section('title', 'Manajemen FAQ')
@section('page-title', 'Manajemen FAQ')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Daftar FAQ</h5>
                <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus"></i> Tambah FAQ
                </a>
            </div>
            <div class="card-body">
                @if($faqs->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Pertanyaan</th>
                                    <th>Jawaban</th>
                                    <th>Urutan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($faqs as $faq)
                                <tr>
                                    <td>{{ $faq->question }}</td>
                                    <td>{{ Str::limit($faq->answer, 100) }}</td>
                                    <td>{{ $faq->order }}</td>
                                    <td>
                                        @if($faq->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Tidak Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('admin.faqs.edit', $faq) }}" class="btn btn-sm btn-outline-primary">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <form action="{{ route('admin.faqs.destroy', $faq) }}" method="POST" 
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?')">
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
                        <i class="bi bi-question-circle fa-3x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada FAQ</h5>
                        <p class="text-muted">Mulai dengan menambahkan FAQ pertama Anda.</p>
                        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">
                            <i class="bi bi-plus"></i> Tambah FAQ
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
