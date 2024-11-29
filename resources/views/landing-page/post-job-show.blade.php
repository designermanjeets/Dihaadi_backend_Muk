@extends('landing-page.layouts.default')

@section('content')

<div class="section-padding">
    <div class="container">
    <post-job-form :user_id="{{$user_id}}"></post-job-form>
    </div>
</div>

@endsection

