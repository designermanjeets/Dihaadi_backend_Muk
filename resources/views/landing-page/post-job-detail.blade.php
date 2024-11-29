@extends('landing-page.layouts.default')


@section('content')
@php
    $postJobData = json_decode($postJob->content(), true);
    $serviceIds = collect($postJobData['post_request_detail']['service'])->pluck('id')->toArray(); 
@endphp
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bg-light p-5 bg-light rounded-3">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <h4 class="mb-3 mt-0">{{ $postJobData['post_request_detail']['title'] }}</h4>
                            <p class="mt-0 mb-4">{{ $postJobData['post_request_detail']['description'] }}</p>
                            <div class="d-flex align-items-center">
                                @if($postJobData['post_request_detail']['status'] == 'assigned')
                                    <h5 class="m-0 text-primary">{{ getPriceFormat($postJobData['post_request_detail']['job_price']) }}</h5>
                                    <span class="text-primary text-capitalize">(job price)</span>
                                @else
                                    <h5 class="m-0 text-primary">{{ getPriceFormat($postJobData['post_request_detail']['price']) }}</h5>
                                    <span class="text-primary text-capitalize">(estimate price)</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                        <div class="col-lg-4">
                            @if(!empty($postJobData['post_request_detail']['service'][0]['attchments']))
                                <img src="{{ $postJobData['post_request_detail']['service'][0]['attchments'][0] }}" class="img-fluid w-100 rounded-3" alt="post-job-image">
                            @else 
                                <img src="{{ asset('images/default.png') }}" alt="" class="img-fluid object-cover rounded-3 mt-4 w-100"/>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="mt-5 pt-3">
                    <h5 class="mt-0 mb-4 text-capitalize">services</h5>
                    
                   
                   @if(count($postJobData['post_request_detail']['service']) < 5)

                    @foreach ($postJobData['post_request_detail']['service'] as $service)

                   <!-- <h1>2432543</h1> -->
                          
                                <div class="text-center d-inline-block">
                                    @if(!empty($service['attchments']))
                                        <img src="{{$service['attchments'][0]}}" class="img-fluid avatar-120 rounded-2 object-fit-cover" alt="booking-service">
                                    @else 
                                        <img src="{{ asset('images/default.png') }}" alt="" class="img-fluid object-fit-cover rounded-3 mt-4 w-100"/>
                                    @endif
                                    <span class="mt-2 d-block">{{ $service['name'] }}</span>
                                </div>
                           
                        @endforeach

                   

    
                    @else

                                       <!-- <h1>1111111</h1> -->

                    <div class="slider"> <!-- === Swiper Slider === -->
                        @foreach ($postJobData['post_request_detail']['service'] as $service)
                            <div class="slider-items"> <!-- === Swiper Slider Slide === -->
                                <div class="text-center d-inline-block">
                                    @if(!empty($service['attchments']))
                                        <img src="{{$service['attchments'][0]}}" class="img-fluid avatar-120 rounded-2 object-fit-cover" alt="booking-service">
                                    @else 
                                        <img src="{{ asset('images/default.png') }}" alt="" class="img-fluid object-fit-cover rounded-3 mt-4 w-100"/>
                                    @endif
                                    <span class="mt-2 d-block">{{ $service['name'] }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                @if($postJobData['post_request_detail']['status'] == 'assigned')
                <div class="mt-5 pt-3 bidder-list">
                    <h5 class="mt-0 mb-4 text-capitalize">Assigned Provider</h5>
                    <div class="row">
                        @foreach($postJobData['bider_data'] as $bidderData)
                            @if($bidderData['provider']['id'] == $postJobData['post_request_detail']['provider_id'])
                            <div class="col-lg-12 position-relative">
                                <ul class="list-inline m-0 p-0">
                                    <li class="mb-4 pb-4 border-bottom">
                                    
                                        <div class="d-flex align-items-center justify-content-between gap-3">
                                            <div class="d-inline-flex align-items-center gap-3">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ $bidderData['provider']['profile_image'] }}" class="avatar-70 rounded-circle object-cover" alt="bidder-image">
                                                </div>
                                                <div class="content">
                                                    <h6 class="mt-0 mb-1 text-capitalize font-size-18">{{ $bidderData['provider']['display_name'] }}</h6>
                                                    <p class="mt-0 mb-2 text-capitalize font-size-14 lh-1">{{ $bidderData['provider']['designation'] }}</p>
                                                    <div>
                                                        <rating-component :readonly="true" :showrating="false" :ratingvalue="{{ $bidderData['provider']['providers_service_rating'] }}" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-button text-end">
                                                <h5 class="text-capitalize text-priamry">{{ getPriceFormat($bidderData['price']) }}</h5>
                                                <div class="mt-2">
                                                    <span class="badge rounded-3 py-2 px-3 text-bg-primary">Assigned</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!empty($postJobData['bider_data']))
                <div class="mt-5 pt-3 bidder-list">
                    <h5 class="mt-0 mb-4 text-capitalize">bidder list</h5>
                    <div class="row">
                        @foreach($postJobData['bider_data'] as $bidderData)

                            <form method="POST" id="updatepostjobForm">
                                <input type="hidden" id="post_request_id" value="{{ $bidderData['post_request_id'] }}">
                                <input type="hidden" id="provider_id" class="provider_id" value="{{ $bidderData['provider_id'] }}" data-provider-id="{{ $bidderData['provider_id'] }}">
                                <input type="hidden" id="price" class="price" value="{{ $bidderData['price'] }}" data-price="{{ $bidderData['price'] }}">
                                 

                                <div class="col-lg-12 position-relative">
                                    <ul class="list-inline m-0 p-0">
                                        <li class="mb-4 pb-4 border-bottom">
                                        
                                            <div class="d-flex align-items-center justify-content-between gap-3">
                                                <div class="d-inline-flex align-items-center gap-3">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ $bidderData['provider']['profile_image'] }}" class="avatar-70 rounded-circle object-cover" alt="bidder-image">
                                                    </div>
                                                    <div class="content">
                                                        <h6 class="mt-0 mb-1 text-capitalize font-size-18">{{ $bidderData['provider']['display_name'] }}</h6>
                                                        <p class="mt-0 mb-2 text-capitalize font-size-14 lh-1">{{ $bidderData['provider']['designation'] }}</p>
                                                        <div>
                                                            <rating-component :readonly="true" :showrating="false" :ratingvalue="{{ $bidderData['provider']['providers_service_rating'] }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="add-button text-end">
                                                    <h5 class="text-capitalize text-priamry">{{ getPriceFormat($bidderData['price']) }}</h5>
                                                    @if($postJobData['post_request_detail']['status'] == 'requested')
                                                        <div class="mt-2">
                                                            <button type="button" class="btn btn-primary px-5 text-capitalize d-block update_post_job" >accept</button>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
                @endif

                @if(!empty($postJobData['post_request_detail']['provider_id']))
                    <div class="text-center my-4">
                        <a href="{{ route('book.post_job', ['id' => $postJobData['post_request_detail']['id']]) }}" class="btn btn-lg btn-primary continue-button">Book Now</a>
                    </div>
                @endif

                <!-- <div class="py-5 px-lg-0 px-5 bg-light rounded-3">
                    <div class="row align-items-center py-5">
                        <div class="col-lg-1 d-lg-block d-none"></div>
                        <div class="col-lg-5">
                            <h5 class="d-flex align-items-center gap-1 lh-1">Post Job:{{ $postJobData['post_request_detail']['title'] }}</h5>
                            <div class="d-flex align-items-center gap-1 lh-1">
                                <h6 class="mt-4 mb-0 text-capitalize text-body">Post Job Description:{{ $postJobData['post_request_detail']['description'] }}</h6>
                            </div>
                            <div class="d-flex align-items-center gap-1 lh-1">
                                <h6 class="mt-4 mb-0 text-capitalize text-body">Job Price:${{ $postJobData['post_request_detail']['price'] }}</h6>
                            </div>
                            
                            <div class="mt-3">
                                <h6>Services</h6>
                                {{-- @foreach ($postJobData['post_request_detail']['service'] as $service) --}}
                                <div class="mt-3">
                                    <h6>Split AC Setup</h6>
                                    <img src="" alt="booking"   width="100" height="100" class="mw-100 rounded-3 object-cover">
                                {{-- <h6>{{ $postJobData['post_request_detail']['service'][0]['name']}}</h6>
                                <img src="{{ $postJobData['post_request_detail']['service'][0]['attchments'][0] }}" alt="booking"   width="100" height="100" class="mw-100 rounded-3 object-cover"> --}}
                                {{-- @endforeach --}}
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6>Assigned Provider</h6>
                                {{-- @if($postJobData['post_request_detail']['status'] == 'assigned')
                                <h6>Assigned Provider</h6>
                                @php
                                $providerId = $postJobData['post_request_detail']['provider_id'];
                                $bidderData = $postJobData['bider_data'];
                                $selectedProvider = collect($bidderData)->firstWhere('provider_id', $providerId);
                            @endphp --}}
                                    {{-- @if($selectedProvider) --}}
                                    <div>
                                        <p>Profile Image: <img src="" width="100" height="100" class="rounded-circle"></p>
                                        <p>Email: demo@provider.com</p>
                                        {{-- <p>Profile Image: <img src="{{ $selectedProvider['provider']['profile_image'] }}" width="100" height="100" class="rounded-circle"></p>
                                        <p>Email: {{ $selectedProvider['provider']['email'] }}</p> --}}
                                    </div>
                                {{-- @else --}}
                                    <p>No provider details found for the assigned job.</p>
                                {{-- @endif
                                @endif --}}
                            </div>
                            <div class="mt-3">
                                {{-- @if(!$postJobData['bider_data'] == null) --}}
                                <h6>Bidder List</h6>
                                {{-- @foreach($postJobData['bider_data'] as $index => $bidder) --}}
                                    <div class="mt-3">
                                        <h6>Felix Harris</h6>
                                        {{-- <h6>{{ $bidder['provider']['first_name'] }} {{ $bidder['provider']['last_name'] }}</h6> --}}
                                    </div>
                                    <div class="mt-3">
                                        <h6>Bid Price: $67</h6>
                                        {{-- <h6>Bid Price: ${{ $bidder['price'] }}</h6> --}}
                                    </div>
                                    <img src="" alt="booking" width="100" height="100" class="rounded-circle">
                                    {{-- <img src="{{ $bidder['provider']['profile_image'] }}" alt="booking" width="100" height="100" class="rounded-circle"> --}}
                        
                                    <div class="mt-3">
                                        <a href="#" class="btn btn-lg btn-primary btn-success btn-sm float-end update-post-job"
                                            >Accept</a>
                                        {{-- @if ($postJobData['post_request_detail']['status'] == 'requested') --}}
                                            {{-- <a href="{{ route('book.service', ['id' => $postJobData['post_request_detail']['service'][0]['id']]) }}" class="btn btn-lg btn-primary btn-success btn-sm float-end" id="update-post-job">Accept</a> --}}
                                            {{-- <a href="#" class="btn btn-lg btn-primary btn-success btn-sm float-end update-post-job"
                                                id="update-post-job-{{ $index }}"
                                                data-post-request-id="{{ $bidder['post_request_id'] }}"
                                                data-provider-id="{{ $bidder['provider_id'] }}"
                                                data-bidder-price="{{ $bidder['price'] }}"
                                            >Accept</a> --}}
                                            {{-- <a href="#" class="btn btn-lg btn-primary btn-success btn-sm float-end" id="update-post-job">Accept</a> --}}
                                        {{-- @elseif ($postJobData['post_request_detail']['status'] == 'assigned')
                                        @endif --}}
                                    </div>
                                {{-- @endforeach --}}
                            {{-- @endif --}}
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

@endsection


@section('bottom_script')
<script>
    $(document).ready(function () {
        const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
        $('.update_post_job').off('click').on('click', function () {

            const form = $(this).closest('form');

            var serviceIds = @json($serviceIds);
            const postRequestId = $('#post_request_id').val();
            const providerId = form.find('.provider_id').data('provider-id');
            const price = form.find('.price').data('price');
             
            $.ajax({
                url: baseUrl + '/api/save-post-job',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: postRequestId,
                    provider_id: providerId,
                    job_price: price,
                    status: 'assigned',
                    post_request_id: postRequestId,
                    service_id: serviceIds
                },
                success: function (response) {
                Swal.fire({
                title: 'Done',
                text: response.message,
                icon: 'success',
                iconColor: '#5F60B9'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const postRequestId = $('#post_request_id').val();
                        window.location.href = `${baseUrl}/post-job-detail/${postRequestId}`;
                    }
                })
                },
                error: function (error) {
                    console.error('Error', error);
                }
            });
            
        });
    });
</script>
@endsection