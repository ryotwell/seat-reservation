@extends('layouts.app')

@section('title', 'Booking Kursi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Booking Kursi</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Default Input Text</label>
                            <input type="text"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Default Input Text</label>
                            <input type="text"
                                class="form-control">
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
