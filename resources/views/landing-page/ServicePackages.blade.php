@extends('landing-page.layouts.default')


@section('content')

<div class="section-padding">
    <div class="container">
        <div class="row">
            <service-package-page  :servicepackage="{{ json_encode($serviceData['service_detail']['servicePackage']) }}" 
                                    :service_id="{{ $serviceData['service_detail']['id'] }}"
                                    :auth_user_id="{{ auth()->id() }}"></service-package-page>
        </div>
    </div>
</div>

@endsection
