@extends('layouts.app')

@section('title', 'Booking Kursi')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Booking Kursi</h1>
            </div>

            <div class="section-body">

                <form action="{{ route('order.create.selectchair') }}" method="GET" class="card">
                    <div class="card-body">

                        <x-alert />

                        <div class="form-group">
                            <div class="form-group">
                                <label>Shift</label>
                                <select name="shift" class="form-control select2">
                                    <option value="" @selected(true)>--- SHIFT ---</option>
                                    @foreach (\App\Chair::$shifts as $key => $shift)
                                        <option value="{{ $key }}">{{ $shift['from'] }}:00 - {{ $shift['to'] }}:00</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
