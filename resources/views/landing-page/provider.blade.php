@extends('landing-page.layouts.default')


@section('content')
<div class="blog-list section-padding ">
    <div class="container">
        <provider-page link="{{ route('provider.data') }}"></provider-page>
    </div>
</div>
@endsection
