@extends('layouts.admin')

@section('title', 'Detail Statistik')
@section('page-title', 'Detail Statistik')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Detail Statistik</h5>
                <div>
                    <a href="{{ route('admin.statistics.edit', $statistic) }}" class="btn btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">
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
                                <td>{{ $statistic->title }}</td>
                            </tr>
                            <tr>
                                <th>Nilai:</th>
                                <td><strong>{{ $statistic->value }}</strong></td>
                            </tr>
                            <tr>
                                <th>Icon:</th>
                                <td>
                                    @if($statistic->icon)
                                        <i class="{{ $statistic->icon }}"></i> {{ $statistic->icon }}
                                    @else
                                        <span class="text-muted">Tidak ada icon</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Urutan:</th>
                                <td>{{ $statistic->order }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>
                                    @if($statistic->is_active)
                                        <span class="badge bg-success">Aktif</span>
                                    @else
                                        <span class="badge bg-secondary">Tidak Aktif</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-6">
                        @if($statistic->description)
                        <h6>Deskripsi:</h6>
                        <p>{{ $statistic->description }}</p>
                        @endif
                        
                        <h6>Preview:</h6>
                        <div class="stat-card-modern" style="background: rgba(255, 255, 255, 0.1); border-radius: 20px; padding: 2rem; text-align: center; backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.2);">
                            <div class="stat-icon" style="font-size: 3rem; color: white; margin-bottom: 1rem;">
                                <i class="{{ $statistic->icon ?? 'bi bi-graph-up' }}"></i>
                            </div>
                            <div class="stat-content">
                                <div class="stat-number" style="font-size: 2.5rem; font-weight: 800; color: white; margin-bottom: 0.5rem;">{{ $statistic->value }}</div>
                                <div class="stat-label" style="font-size: 1rem; color: rgba(255, 255, 255, 0.9); font-weight: 500;">{{ $statistic->title }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
