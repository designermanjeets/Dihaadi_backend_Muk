@extends('landing-page.layouts.default')


@section('content')
<div class="section-padding">
    <div class="container">
<!-- <landing-category-section></landing-category-section> -->
    <subcategory-page link="{{ route('subcategory.data' , ['category_id' => $category_id]) }}"></subcategory-page>
    </div>
</div>
@endsection
