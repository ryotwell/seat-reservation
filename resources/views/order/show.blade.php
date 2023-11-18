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

                    @csrf

                    <div class="card-body">
                        <div class="mb-4">
                            <table>
                                <tr>
                                    <td>
                                        <button class="btn btn-success p-2"></button>
                                    </td>
                                    <td class="pl-2">
                                        Tempat duduk yang anda booking
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="mb-4">
                            <table>
                                <tr>
                                    <td>
                                        Tempat Duduk
                                    </td>
                                    <td class="pl-2">
                                        Baris ke {{ $order->chair->category }} kolom ke {{ $order->chair->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal/Waktu
                                    </td>
                                    <td class="pl-2">
                                        {{ $order->from->format('d F, Y')}} / {{ $order->from->format('H:i') }} - {{ $order->to->format('H:i') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Di Booking
                                    </td>
                                    <td class="pl-2">
                                        {{ $order->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Status
                                    </td>
                                    <td class="pl-2">
                                        <span class="badge text-white mx-2 text-sm {{ ($order->status === 'approved') ? 'bg-success' : 'bg-danger' }}">{{ $order->status }}</span>
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
                                                @if ($x->id === $order->chair->id)
                                                <button class="btn {{ !empty($order->chair) && $order->chair->id === $x->id ? 'btn-success' : 'btn-primary' }}">{{ $x->name }}</button>
                                                @else
                                                    <button type="button" class="btn btn-secondary disabled"  disabled>{{ $x->name }}</a>
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        @if ($order->chair)
                        <div class="mb-4">
                            Tempat duduk yang di pilih baris ke {{ $order->chair->category }} kolom ke {{ $order->chair->name }}
                        </div>
                        @endif
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
