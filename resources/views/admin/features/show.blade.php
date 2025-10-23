@extends('layouts.admin')

@section('title', 'Detail Fitur')
@section('page-title', 'Detail Fitur')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Fitur</h5>
                <div>
                    <a href="{{ route('admin.features.edit', $feature) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="{{ route('admin.features.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-borderless">
                            <tr>
                                <th width="30%">Judul:</th>
                                <td>{{ $feature->title }}</td>
                            </tr>
                            <tr>
                                <th>Icon:</th>
                                <td>
                                    @if($feature->icon)
                                        <i class="{{ $feature->icon }}"></i> {{ $feature->icon }}
                                    @else
                                        <span class="text-muted">Tidak ada icon</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Urutan:</th>
                                <td>{{ $feature->order }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($feature->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <h6>Deskripsi:</h6>
                        <p>{{ $feature->description }}</p>
                        
                        <h6>Preview:</h6>
                        <div class="feature-card-modern" style="background: white; border-radius: 20px; padding: 2.5rem 2rem; text-align: center; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1); border: 1px solid rgba(0, 0, 0, 0.05);">
                            <div class="feature-icon" style="width: 80px; height: 80px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem; color: white;">
                                <i class="{{ $feature->icon ?? 'bi bi-star' }}"></i>
                            </div>
                            <h3 class="feature-title" style="font-size: 1.5rem; font-weight: 700; color: #333; margin-bottom: 1rem;">{{ $feature->title }}</h3>
                            <p class="feature-description" style="color: #666; line-height: 1.6; font-size: 1rem;">{{ $feature->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
