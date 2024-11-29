@extends('landing-page.layouts.default')


@section('content')
<div class="section-padding">
    <div class="container">
<!-- <landing-category-section></landing-category-section> -->
    <category-page link="{{ route('category.data') }}"></category-page>
    </div>
</div>
@endsection
