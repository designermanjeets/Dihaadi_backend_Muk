@extends('landing-page.layouts.default')

@section('content')

@php $postJobData = json_decode($postJob->content(), true);@endphp

<div class="section-padding">
    <div class="container">
    <booking-post-job :post_job="{{ json_encode($postJobData) }}" :user_id="{{$user_id}}"></booking-post-job>
    </div>
</div>

@endsection

