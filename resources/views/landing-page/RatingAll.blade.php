@extends('landing-page.layouts.default')


@section('content')
<div class="section-padding rating-all-page">
    <div class="container">
        <rating-all-page link="{{ route('rating.data', ['id' => $id, 'type' => $type]) }}" review_count={{$review_count}} ></rating-all-page>
    </div>
</div>
@endsection
