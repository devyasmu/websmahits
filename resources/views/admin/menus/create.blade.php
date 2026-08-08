@extends('layouts.admin')

@section('title', 'Tambah Menu')
@section('page-title', 'Tambah Menu')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Tambah Menu Baru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.menus.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Menu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Menu Parent</label>
                        <select class="form-control @error('parent_id') is-invalid @enderror" 
                                id="parent_id" name="parent_id">
                            <option value="">-- Pilih Menu Parent (Kosongkan untuk menu utama) --</option>
                            @foreach(\App\Models\Menu::whereNull('parent_id')->where('is_active', true)->orderBy('order')->get() as $parentMenu)
                                <option value="{{ $parentMenu->id }}" {{ old('parent_id') == $parentMenu->id ? 'selected' : '' }}>
                                    {{ $parentMenu->title }}
                                </option>
                            @endforeach
                        </select>
                        <div class="form-text">Pilih menu parent untuk membuat sub menu. Kosongkan untuk menu utama.</div>
                        @error('parent_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control @error('url') is-invalid @enderror" 
                               id="url" name="url" value="{{ old('url') }}" placeholder="contoh: /about, /contact, https://example.com">
                        <div class="form-text">Untuk sub menu, URL akan relatif terhadap parent menu.</div>
                        @error('url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="target" class="form-label">Target</label>
                                <select class="form-control @error('target') is-invalid @enderror" 
                                        id="target" name="target">
                                    <option value="_self" {{ old('target', '_self') == '_self' ? 'selected' : '' }}>Tab Sama</option>
                                    <option value="_blank" {{ old('target') == '_blank' ? 'selected' : '' }}>Tab Baru</option>
                                </select>
                                @error('target')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="order" class="form-label">Urutan</label>
                                <input type="number" class="form-control @error('order') is-invalid @enderror" 
                                       id="order" name="order" value="{{ old('order', 0) }}">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                   value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Aktif
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="show_in_bottom_nav" name="show_in_bottom_nav" 
                                   value="1" {{ old('show_in_bottom_nav') ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_in_bottom_nav">
                                Tampil di navbar bawah (mobile)
                            </label>
                        </div>
                        <div class="form-text">Centang agar menu ini muncul di bar navigasi bawah saat tampilan mobile.</div>
                        @error('show_in_bottom_nav')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="icon" class="form-label">Ikon (untuk navbar bawah)</label>
                        <input type="text" class="form-control @error('icon') is-invalid @enderror" 
                               id="icon" name="icon" value="{{ old('icon') }}" placeholder="bi-house-door">
                        <div class="form-text mb-1">Kelas ikon Bootstrap Icons. Gunakan format: <code>bi-nama-ikon</code> (contoh: bi-house-door, bi-newspaper, bi-images). Kosongkan = ikon default.</div>
                        <a href="https://icons.getbootstrap.com/" target="_blank" rel="noopener noreferrer" class="form-text d-inline-flex align-items-center">
                            <i class="bi bi-box-arrow-up-right me-1"></i> Lihat daftar kode ikon Bootstrap Icons <span class="ms-1">(buka di tab baru)</span>
                        </a>
                        <div class="form-text mt-1">Contoh cepat: bi-house-door (Beranda), bi-newspaper (Berita), bi-images (Galeri), bi-download (Download), bi-envelope (Kontak), bi-info-circle (Tentang).</div>
                        @error('icon')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
