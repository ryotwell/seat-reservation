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

                <form action="{{ route('order.store', ['shift' => request()->shift, 'chair' => $activeChair?->id ]) }}" method="POST" class="card">

                    @csrf

                    <div class="card-body">
                        <div class="mb-4">
                            <table>
                                <tr>
                                    <td>
                                        <button class="btn btn-primary p-2"></button>
                                    </td>
                                    <td class="pl-2">
                                        Kursi belum di booking
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button class="btn btn-secondary p-2 disabled"></button>
                                    </td>
                                    <td class="pl-2">
                                        Kursi sudah di booking
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div>
                            <label>Tempat Duduk</label>
                            <table class="table table-responsive">
                                @foreach ($chairs as $category => $chair)
                                    <tr>
                                        <td>{{ $category }}</td>
                                        @foreach ($chair as $x)
                                            <td class="p-1">
                                                @if ($x->is_active)
                                                <a class="btn {{ !empty($activeChair) && $activeChair->id === $x->id ? 'btn-success' : 'btn-primary' }}" href="{{ route('order.create.selectchair', ['shift' => request()->shift, 'chair' => $x->id]) }}">{{ $x->name }}</a>
                                                @else
                                                    <button type="button" class="btn btn-secondary disabled"  disabled>{{ $x->name }}</a>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @if ($activeChair)
                        <div class="mb-4">
                            Tempat duduk yang di pilih baris ke {{ $activeChair->category }} kolom ke {{ $activeChair->name }}
                        </div>
                        @endif
                        <div>
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
