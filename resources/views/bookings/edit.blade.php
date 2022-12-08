@extends('layouts.master')
@section('title', 'Slot Booking')
@section('pageTitle', 'Book a slot')
<style>
    .form-group {
        margin-bottom: 10px;
    }
</style>
@section('content')
<div class="new_bookings">
    <div class="information"></div>
    <form action="{{route('booking.update', $booking->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{$booking->name}}" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email_address" id="email" class="form-control" value="{{$booking->email_address}}" required>
        </div>
        <div class="form-group">
            <label for="booking_date">Booking date</label>
            <input type="date" name="booking_date" id="booking_date" class="form-control" value="{{$booking->booking_date}}" required disabled>
        </div>
        <div class="append_div">
            <div class="form-group">
                <label for="booking_type">Booking Type</label>
                <select name="booking_type" id="booking_type" class="form-control" required disabled>
                    <option value="">Please Select</option>
                    @foreach(\App\Models\Booking::BOOKING_TYPE as $key => $type)
                    <option value="{{$key}}" {{($key == $booking->booking_type) ? 'selected' : ''}}>{{$type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="booking_slot">Booking Slot</label>
                <select name="booking_slot" id="booking_slot" class="form-control" required disabled>
                    <option value="">Please Select</option>
                    @foreach(\App\Models\Booking::BOOKING_SLOT as $key => $slot)
                    <option value="{{$key}}" {{($key == $booking->booking_slot) ? 'selected' : ''}}>{{$slot}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="booking_time">Booking time</label>
            <input type="time" name="booking_time" id="booking_time" class="form-control" value="{{$booking->booking_time}}" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn_class">Submit</button>
            <a href="{{route('booking.index')}}" class="btn btn-secondary">Back to listing</a>
        </div>
    </form>
</div>
@stop

<!-- @section('scripts')
<script>
    jQuery(document).ready(function ($) {
        $(document).on('change', '#booking_date', function() {
            let date = $(this).val();
            $.ajax({
                type: "POST",
                url: "{{route('booking.checkBooking')}}",
                data: {"date": date, _token: "{{csrf_token()}}"},
                dataType: 'json',
                success: function (response) {
                    if(response.bookings_allowed && !response.no_record) {
                        $('.btn_class').show();
                        let booking_type = '@php echo json_encode(App\Models\Booking::BOOKING_TYPE); @endphp';
                        let booking_slot = '@php echo json_encode(App\Models\Booking::BOOKING_SLOT); @endphp';
                        booking_type = {'1': 'Half Day'};
                        booking_slot = JSON.parse(booking_slot);
                        $('.append_div').empty();
                        $('.information').empty();
                        delete booking_slot[response.booking_slot];
                        let html = renderOptions(booking_type, booking_slot);
                        $('.append_div').html(html);
                        return;
                    } 
                    
                    if(!response.bookings_allowed && !response.no_record) {
                        $('.append_div').empty();
                        $('.information').html(`<span class="text-danger">No slots available. Kindly select different date for booking.</span>`);
                        $('.btn_class').hide();
                        return;
                    }

                    if(response.bookings_allowed && response.no_record) {
                        $('.btn_class').show();
                        let booking_type = '@php echo json_encode(App\Models\Booking::BOOKING_TYPE); @endphp';
                        let booking_slot = '@php echo json_encode(App\Models\Booking::BOOKING_SLOT); @endphp';
                        booking_type = JSON.parse(booking_type);
                        booking_slot = JSON.parse(booking_slot);
                        $('.append_div').empty();
                        $('.information').empty();
                        let html = renderOptions(booking_type, booking_slot);
                        $('.append_div').html(html);
                        return;
                    }
                }
            });
        })

        function renderOptions(type, slot) {
            let html = `<div class="form-group">
                            <label for="booking_type">Booking Type</label>
                                <select name="booking_type" id="booking_type" class="form-control" required>
                                    <option value="">Please Select</option>`;
                                    $.each(type, function (typeIndex, typeValue) { 
                                        html += `<option value="${typeIndex}">${typeValue}</option>`;
                                    });
                html += `</select>
                        </div>
                        <div class="form-group">
                            <label for="booking_slot">Booking Slot</label>
                                <select name="booking_slot" id="booking_slot" class="form-control" required>
                                    <option value="">Please Select</option>`;
                                    $.each(slot, function (slotIndex, slotValue) { 
                                        html += `<option value="${slotIndex}">${slotValue}</option>`;
                                    });
                html += `</select>
                        </div>`;
            return html;
        }
    });
</script>
@stop -->