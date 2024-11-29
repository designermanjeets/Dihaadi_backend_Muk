

@extends('landing-page.layouts.default')

@section('content')
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <!-- Tab panes -->
                <service-page link="{{ route('service.data', ['id' => $id, 'type' => $type, 'latitude' => $latitude, 'longitude' => $longitude]) }}"></service-page>


            </div>
        </div>
    </div>
</div>

@endsection
