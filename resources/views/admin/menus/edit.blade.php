@extends('layouts.admin')

@section('title', 'Edit Menu')
@section('page-title', 'Edit Menu')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Edit Menu</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Menu <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $menu->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Menu Parent</label>
                        <select class="form-control @error('parent_id') is-invalid @enderror" 
                                id="parent_id" name="parent_id">
                            <option value="">-- Pilih Menu Parent (Kosongkan untuk menu utama) --</option>
                            @foreach(\App\Models\Menu::whereNull('parent_id')->where('is_active', true)->where('id', '!=', $menu->id)->orderBy('order')->get() as $parentMenu)
                                <option value="{{ $parentMenu->id }}" {{ old('parent_id', $menu->parent_id) == $parentMenu->id ? 'selected' : '' }}>
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
                               id="url" name="url" value="{{ old('url', $menu->url) }}" placeholder="contoh: /about, /contact, https://example.com">
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
                                    <option value="_self" {{ old('target', $menu->target) == '_self' ? 'selected' : '' }}>Tab Sama</option>
                                    <option value="_blank" {{ old('target', $menu->target) == '_blank' ? 'selected' : '' }}>Tab Baru</option>
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
                                       id="order" name="order" value="{{ old('order', $menu->order) }}">
                                @error('order')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" 
                                   value="1" {{ old('is_active', $menu->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">
                                Aktif
                            </label>
                        </div>
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
