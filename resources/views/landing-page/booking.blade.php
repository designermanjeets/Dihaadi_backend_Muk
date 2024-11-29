@extends('landing-page.layouts.default')


@section('content')
<div class="section-padding booking">
    <div class="container">
        <booking-page link="{{ route('booking.data') }}"></booking-page>
    </div>
</div>
@endsection
