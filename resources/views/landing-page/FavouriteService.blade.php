@extends('landing-page.layouts.default')


@section('content')
<div class="section-padding">
    <div class="container">
        <service-page  link="{{ route('favouriteservice.data') }}" :is-empty="{{ $isEmpty ? 'true' : 'false' }}"/>
    </div>
</div>
@endsection
