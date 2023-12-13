<?php

namespace App\Http\Controllers;

use App\Chair as AppChair;
use App\Http\Requests\StoreOrderRequest;
use App\Models\Chair;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->simplePaginate(5);

        return view('order.index', ['type_menu' => 'order', 'orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create', ['type_menu' => 'order']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $year = now()->format('Y');
        $day = now()->format('d');
        $month = now()->format('m');
        $shift = AppChair::getShift($request->shift);

        $from = Carbon::create($year, $month, $day, $shift['from']);
        $to = Carbon::create($year, $month, $day, $shift['to']);

        if( auth()->user()->hasNewOrder() ) {

            if( AppChair::hasNewOrder($request->chair->id, $request->shift) ) {

                auth()->user()->orders()->create([
                    'chair_id' => $request->chair->id,
                    'from' => $from,
                    'to' => $to,
                    'shift' => $request->shift,
                    'status' => 'approved',
                ]);

                return redirect()->route('order.index');
            }

            return 'Kursi sudah booking pengguna lain!'; 

        }

        return 'Anda sudah tidak bisa booking lagi, booking besok lagi!';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order, Request $request)
    {
        $chairs = collect(Chair::all())->groupBy('category');

        return view('order.show', ['type_menu' => 'chair', 'order' => $order, 'chairs' => $chairs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function cancel(Order $order)
    {
        $order->status = 'canceled';
        $order->save();

        if( now() > $order->from ) {
            return back()->with(['message' => 'Sudah lewat jam, tidak bisa di batalkan!']);
        }

        return redirect()->route('order.index');
    }

    public function selectChair(Request $request)
    {
        $request->validate([
            'shift' => 'required|in:a,b,c,d'
        ]);

        $shiftAt = AppChair::getShiftAt($request->shift);

        if(now() > $shiftAt['from']) {
            return back()->with(['message' => 'Sudah lewat jam, pesan lebih awal besok!']);
        }

        $orders = collect( Order::whereDate('created_at', now()->today())
            ->whereBetween('from', [$shiftAt['from'], AppChair::create(23, 59)])
            ->where('shift', $request->shift)
            ->where('from', '>', now())
            ->where('status', 'approved')
            ->get()
        );

        $chairs = collect( Chair::all() )->map( function($chair) use ($orders) {
            $chair->is_active = true;

            if( $orders->where('chair_id', $chair->id)->first() ) {
                $chair->is_active = false;
            }

            return $chair;
        })->groupBy('category');

        if($request->chair) {
            $activeChair = Chair::where('id', $request->chair)->first();
        }

        return view('order.select-chair', ['type_menu' => 'order', 'chairs' => $chairs, 'activeChair' => $activeChair ?? null]);
    }
}
