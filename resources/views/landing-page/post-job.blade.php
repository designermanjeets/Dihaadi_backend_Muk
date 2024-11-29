@extends('landing-page.layouts.default')


@section('content')
<div class="section-padding booking">
    <div class="container">
        <post-job-page link="{{ route('post.job.data') }}"></post-job-page>
    </div>
</div>
@endsection
