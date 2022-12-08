@extends('layouts.master')
@section('title', 'Booking detail')
@section('pageTitle', 'Booking Information')

@section('content')
<div class="booking_show">
    <table class="table table-bordered">
        <tr>
            <th>Name</th>
            <td>{{$booking->name}}</td>
        </tr>
        <tr>
            <th>Email address</th>
            <td>{{$booking->email_address}}</td>
        </tr>
        <tr>
            <th>Booking Type</th>
            <td>{{\App\Models\Booking::BOOKING_TYPE[$booking->booking_type]}}</td>
        </tr>
        <tr>
            <th>Booking Slot</th>
            <td>{{\App\Models\Booking::BOOKING_SLOT[$booking->booking_slot]}}</td>
        </tr>
        <tr>
            <th>Booking date</th>
            <td>{{date('d/m/Y', strtotime($booking->booking_date))}}</td>
        </tr>
        <tr>
            <th>Booking time</th>
            <td>{{date('H:i', strtotime($booking->booking_time))}}</td>
        </tr>
    </table>
</div>
<div class="row">
    <div class="col-lg-12">
        <a href="{{route('booking.index')}}" class="btn btn-primary">Back to listing</a>
    </div>
</div>
@stop