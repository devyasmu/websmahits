@extends('layouts.public')

@section('title', 'Guru Kami - ' . ($siteSettings?->site_name ?? config('app.name')))

@section('content')
<div class="container py-5">
    <!-- Header Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="text-center">
                <h1 class="display-4 fw-bold mb-3" style="color: var(--primary-color);">
                    <i class="bi bi-person-badge me-3"></i>Guru Kami
                </h1>
                <p class="lead text-muted">Tenaga pendidik yang berdedikasi untuk membimbing siswa dengan nilai-nilai Islam</p>
            </div>
        </div>
    </div>

    <!-- Search Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form method="GET" action="{{ route('teachers.index') }}" class="row g-3">
                        <div class="col-md-10">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-search"></i></span>
                                <input type="text" class="form-control" name="search" value="{{ request('search') }}" placeholder="Cari nama, jabatan, atau mata pelajaran...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">
                                <i class="bi bi-search me-1"></i>Cari
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Teachers Grid -->
    <div class="row g-4">
        @forelse($teachers as $teacher)
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card h-100 shadow-sm border-0 modern-card text-center">
                <div class="card-body p-4 d-flex flex-column">
                    <div class="teacher-avatar mx-auto mb-3">
                        @if($teacher->photo)
                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}" 
                                 class="rounded-circle" style="width: 120px; height: 120px; object-fit: cover; border: 4px solid var(--primary-color, #667eea);"
                                 onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22120%22 height=%22120%22%3E%3Crect fill=%22%23e9ecef%22 width=%22120%22 height=%22120%22/%3E%3Ctext x=%2250%25%22 y=%2250%25%22 fill=%22%236c757d%22 font-size=%2212%22 text-anchor=%22middle%22 dy=%22.3em%22%3ENo image%3C/text%3E%3C/svg%3E';">
                        @else
                            <div class="rounded-circle d-inline-flex align-items-center justify-content-center bg-light" style="width: 120px; height: 120px; border: 4px solid var(--primary-color, #667eea);">
                                <i class="bi bi-person text-muted" style="font-size: 3rem;"></i>
                            </div>
                        @endif
                    </div>
                    <h5 class="card-title fw-bold mb-1" style="color: var(--primary-color);">{{ $teacher->name }}</h5>
                    @if($teacher->position)
                        <p class="text-muted small mb-2">{{ $teacher->position }}</p>
                    @endif
                    @if($teacher->short_bio)
                        <p class="card-text small flex-grow-1" style="color: var(--section-text-color);">{{ Str::limit($teacher->short_bio, 100) }}</p>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="text-center py-5">
                <i class="bi bi-person-badge display-1 text-muted"></i>
                <h3 class="mt-3">Tidak ada guru ditemukan</h3>
                <p class="text-muted">@if(request('search')) Coba kata kunci lain. @else Belum ada data guru. @endif</p>
                @if(request('search'))
                    <a href="{{ route('teachers.index') }}" class="btn btn-primary mt-2">Tampilkan Semua</a>
                @endif
            </div>
        </div>
        @endforelse
    </div>

    @if($teachers->hasPages())
    <div class="row mt-5">
        <div class="col-12">
            <nav aria-label="Guru pagination">
                {{ $teachers->withQueryString()->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    </div>
    @endif
</div>

<style>
.modern-card {
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}
.modern-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.1) !important;
}
.pagination .page-link {
    color: var(--primary-color);
    border-color: var(--primary-color);
    border-radius: 50px;
    margin: 0 0.25rem;
}
.pagination .page-link:hover {
    background-color: var(--primary-color);
    color: white;
}
.pagination .page-item.active .page-link {
    background-color: var(--primary-color);
    border-color: var(--primary-color);
    color: white;
}
</style>
@endsection
