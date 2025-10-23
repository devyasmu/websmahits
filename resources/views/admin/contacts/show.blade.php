@extends('layouts.admin')

@section('title', 'Detail Pesan Kontak')
@section('page-title', 'Detail Pesan Kontak')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">Detail Pesan Kontak</h5>
                <div>
                    @if(!$contact->is_read)
                        <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-check"></i> Tandai Sudah Dibaca
                            </button>
                        </form>
                    @endif
                    <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama:</label>
                            <p class="form-control-plaintext">{{ $contact->name }}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email:</label>
                            <p class="form-control-plaintext">
                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Telepon:</label>
                            <p class="form-control-plaintext">
                                @if($contact->phone)
                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                @else
                                    -
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Tanggal:</label>
                            <p class="form-control-plaintext">{{ $contact->created_at->format('d F Y, H:i') }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Subjek:</label>
                    <p class="form-control-plaintext">{{ $contact->subject }}</p>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Pesan:</label>
                    <div class="border rounded p-3 bg-light">
                        {{ $contact->message }}
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Status:</label>
                    <p class="form-control-plaintext">
                        @if($contact->is_read)
                            <span class="badge bg-success">Sudah Dibaca</span>
                        @else
                            <span class="badge bg-warning">Belum Dibaca</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
