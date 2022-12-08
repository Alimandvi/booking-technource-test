<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Booking::create($request->all());
        return redirect()->route('booking.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking = Booking::find($id);
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::find($id);
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        unset($data['_method']);
        unset($data['_token']);
        Booking::where('id', $id)->update($data);
        return redirect()->route('booking.index');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::where('id', $id)->delete();
        return redirect()->route('booking.index');

    }

    public function checkBooking(Request $request) {
        $data = $request->all();
        $checkBooking = Booking::where('booking_date', $data['date'])->get();
        if(count($checkBooking) > 0) {
            if(count($checkBooking) > 1) {
                $response = json_encode(array('no_record' => false, 'bookings_allowed' => false));
                echo $response;exit;
            }
            
            $checkBookingAllowed = $checkBooking[0]->booking_type == 1 ? true : false;
            $response = json_encode(
                array('booking_type' => $checkBooking[0]->booking_type, 
                    'booking_slot' => $checkBooking[0]->booking_slot, 
                    'no_record' => false,
                    'bookings_allowed' => $checkBookingAllowed
                )
            );
            echo $response;exit;
        }
        $response = json_encode(array('no_record' => true, 'bookings_allowed' => true));
        echo $response;exit;
    }
}
