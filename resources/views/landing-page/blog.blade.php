@extends('landing-page.layouts.default')


@section('content')

<div class="blog-list section-padding ">
    <div class="container">
                <blog-page link="{{ route('blog.data') }}"></blog-page>
            </div>
          </div>
</div>
@endsection
