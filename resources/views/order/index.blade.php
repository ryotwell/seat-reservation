@extends('layouts.app')

@section('title', 'Kursi Yang Di Booking')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kursi Yang Di Booking</h1>
            </div>

            <div class="section-body">

                <div class="card">
                    <div class="card-body">
                        
                        <div>
                            <table class="table table-responsive mb-4">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kursi</th>
                                        <th>Tanggal/Waktu</th>
                                        <th>Tanggal Booking</th>
                                        <th>-</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $key => $order)
                                        <tr>
                                            <td>{{ $orders->firstItem() + $key }}</td>
                                            <td>
                                                Baris {{ $order->chair->category }} kolom {{ $order->chair->name }}
                                            </td>
                                            <td>
                                                {{ $order->from->format('d F, Y')}} / {{ $order->from->format('H:i') }} - {{ $order->to->format('H:i') }}
                                            </td>
                                            <td>
                                                {{ $order->created_at->diffForHumans() }}
                                            </td>
                                            <td>
                                                <a href="{{ route('order.show', $order->id) }}" class="btn btn-primary">Detail</a>

                                                @if ($order->status === 'approved')

                                                    @if (now() < $order->from)
                                                    <form action="{{ route('order.show.cancel', $order->id) }}" method="post" class="d-inline-flex">

                                                        @csrf
                                                        @method('DELETE')

                                                        <button class="btn btn-danger">
                                                            Cancel
                                                        </button>
                                                    </form>
                                                    @endif
                                                @else
                                                <span class="mx-2 text-sm">{{ $order->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="d-flex justify-content-start">
                                {{ $orders->links() }}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script>
        $(document).ready(() => {
        })
    </script>
@endpush
