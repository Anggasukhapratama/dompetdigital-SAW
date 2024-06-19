<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('contents')
<div class="container-fluid">
    <!-- Welcome Message -->
    @if(session('welcome_message'))
    <div id="welcomeMessage" class="flex items-center justify-between p-4 mb-4 text-green-700 bg-green-100 border border-green-300 rounded">
        <div class="flex items-center">
            <i class="bi bi-check-circle-fill text-2xl mr-2"></i>
            <span>{{ session('welcome_message') }}</span>
        </div>
        <button id="closeWelcomeMessage" class="p-1 text-green-500 hover:text-green-700">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    @endif

    <div class="row">
        <!-- Dashboard Card 1 -->
        <div class="col-lg-3 col-md-6">
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <span class="icon-wrapper bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="bi bi-list-check icon-size mb-0"></i>
                    </span>
                    <div>
                        <h6 class="card-title mb-1">Alternatif</h6>
                        <a href="{{ route('admin.alternatif.index') }}" class="btn btn-primary btn-sm">Go to Alternatif</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Card 2 -->
        <div class="col-lg-3 col-md-6">
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <span class="icon-wrapper bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="bi bi-graph-up icon-size mb-0"></i>
                    </span>
                    <div>
                        <h6 class="card-title mb-1">Kriteria</h6>
                        <a href="{{ route('admin.kriteria.index') }}" class="btn btn-success btn-sm">Go to Kriteria</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Card 3 -->
        <div class="col-lg-3 col-md-6">
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <span class="icon-wrapper bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="bi bi-card-text icon-size mb-0"></i>
                    </span>
                    <div>
                        <h6 class="card-title mb-1">Sub Kriteria</h6>
                        <a href="{{ route('admin.subkriteria.index') }}" class="btn btn-info btn-sm">Go to Sub Kriteria</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Card 4 -->
        <div class="col-lg-3 col-md-6">
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <span class="icon-wrapper bg-warning text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="bi bi-sliders icon-size mb-0"></i>
                    </span>
                    <div>
                        <h6 class="card-title mb-1">Normalisasi</h6>
                        <a href="{{ route('admin.normalisasi') }}" class="btn btn-warning btn-sm">Go to Normalisasi</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Card 5 -->
        <div class="col-lg-3 col-md-6">
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <span class="icon-wrapper bg-danger text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="bi bi-journal-check icon-size mb-0"></i>
                    </span>
                    <div>
                        <h6 class="card-title mb-1">Penilaian</h6>
                        <a href="{{ route('admin.penilaian') }}" class="btn btn-danger btn-sm">Go to Penilaian</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Card 6 -->
        <div class="col-lg-3 col-md-6">
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <span class="icon-wrapper bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="bi bi-trophy icon-size mb-0"></i>
                    </span>
                    <div>
                        <h6 class="card-title mb-1">Perangkingan</h6>
                        <a href="{{ route('admin.perangkingan.index') }}" class="btn btn-secondary btn-sm">Go to Perangkingan</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Card 7 -->
        <div class="col-lg-3 col-md-6">
            <div class="card mb-3">
                <div class="card-body d-flex align-items-center">
                    <span class="icon-wrapper bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                        <i class="bi bi-person-check icon-size mb-0"></i>
                    </span>
                    <div>
                        <h6 class="card-title mb-1">Pengguna</h6>
                        <a href="{{ route('admin.pengguna') }}" class="btn btn-dark btn-sm">Go to Users</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .icon-wrapper {
        width: 40px;
        height: 40px;
    }
    .icon-size {
        font-size: 1.5rem;
    }
    .card-title {
        font-size: 0.9rem;
    }
    .alert {
        border-radius: 5px;
    }
</style>

@endsection
