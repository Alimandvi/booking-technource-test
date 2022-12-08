@extends('layouts.master')
@section('title', 'Booking list')
@section('pageTitle', 'List of bookings')

@section('content')
<div class="row mb-3">
    <div class="col-lg-12">
        <a href="{{route('booking.create')}}" class="btn btn-primary">New booking</a>
    </div>
</div>
<div class="bookings_table">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Booking date</th>
                <th>Booking time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>{{date('d/m/Y', strtotime($value->booking_date))}}</td>
                <td>{{date('H:i', strtotime($value->booking_time))}}</td>
                <td>
                    <a href="{{route('booking.edit', $value->id)}}" class="btn btn-sm btn-warning">Edit</a>&nbsp;
                    <a href="{{route('booking.show', $value->id)}}" class="btn btn-sm btn-info">View</a>&nbsp;
                    <form action="{{route('booking.destroy', $value->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record ?');" style="display: inline-block;">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="{{ $value->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-sm btn-danger" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@stop