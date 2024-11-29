@extends('landing-page.layouts.default')


@section('content')

<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="p-5 bg-light rounded-3">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                <p class="m-0 text-success text-capitalize">{{ $bookingData['booking_detail']['status_label'] }}</p>
                                <a href="javascript:void(0);"
                                class="d-inline-block letter-spacing-1 text-capitalize text-decoration-underline h6 text-primary"
                                data-bs-toggle="modal" data-bs-target="#statusModal">{{__('landingpage.check_status')}}</a>
                            </div>
                           
                            @if($bookingData['bookingpackage'] == null)
                                <h5 class="mt-2 mb-2 text-capitalize">#{{ $bookingData['booking_detail']['id'] }} <a href="{{ route('service.detail', $bookingData['booking_detail']['service_id']) }}"> {{ $bookingData['booking_detail']['service_name'] }}</a></h5>
                            @else
                                <h5 class="mt-2 mb-2 text-capitalize">#{{ $bookingData['booking_detail']['id'] }} {{ $bookingData['bookingpackage']['name'] }}</h5>
                            @endif
                            <p class="mb-2 text-capitalize font-size-18 fw-500">{{ $bookingData['booking_detail']['booking_date'] }}</p>
                            <!-- <div class="d-flex align-items-center gap-1 lh-1">
                                {{-- {{> components/widgets/filter-rating rating="4"}}<span class="h6 lh-1">(4.3)</span> --}}
                            </div> -->
                          


                            <h6 class="m-0 text-capitalize text-body">{{__('landingpage.service_total_time')}}: <span
                                    class="text-primary"> 
                                        @if(!empty( $bookingData['service']['duration']))
                                           @php
                                              $durationParts = explode(':',  $bookingData['service']['duration']);
                                              $hours = intval($durationParts[0]);
                                              $minutes = intval($durationParts[1]);
                                           @endphp
                                           <li class="d-inline-block fw-500 position-relative service-price">
                                     
                                              @if($hours > 0)
                                                 {{ $hours }} hrs @if($minutes > 0) {{ $minutes }} min @endif
                                              @else
                                                 {{ $minutes }} min
                                              @endif
                                           </li>
                                           @endif
                                    
                                          {{-- {{ $bookingData['service']['duration'] }} --}}
                                          </span></h6>
                                     <div>
                                <input type="hidden" id="booking_id" name="id" value="{{ $bookingData['booking_detail']['id'] }}">

                                @if($bookingData['service']['is_enable_advance_payment']==0 && $bookingData['booking_detail']['status'] === 'pending' && ($bookingData['booking_detail']['payment_status'] !== 'failed' || $bookingData['booking_detail']['payment_status'] === 'pending' || $bookingData['booking_detail']['payment_status'] === 'advanced_paid') || $bookingData['booking_detail']['status'] === 'accept')
                                    <div class="mt-5">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#cancelModal" class="btn btn-primary text-capitalize">{{__('landingpage.cancel_booking')}}</button>
                                    </div>
                                @endif

                                @if($bookingData['booking_detail']['status'] === 'completed' && ($bookingData['booking_detail']['payment_status'] === null || $bookingData['booking_detail']['payment_status'] === 'failed' || $bookingData['booking_detail']['payment_status'] === 'advanced_paid') &&  $bookingData['booking_detail']['total_amount'] != 0)
                                    <div id="payment-component" style="display: none;">
                                        <payment
                                            :booking_id="{{ $bookingData['booking_detail']['id'] }}"
                                            :customer_id="{{ auth()->user()->id }}"
                                            :discount="{{ $bookingData['booking_detail']['final_discount_amount'] }}"
                                            :total_amount="{{ $bookingData['booking_detail']['total_amount'] }}"
                                            :wallet_amount="{{$wallet_amount}}"
                                        ></payment>
                                    </div>
                                    <div class="mt-5">
                                        <a onclick="togglePayment()" id="pay_advance" class="btn btn-primary text-capitalize">{{__('landingpage.pay_now')}} ({{ getPriceFormat($bookingData['booking_detail']['total_amount']) }})</a>
                                    </div>
                                @endif

                                @if($bookingData['booking_detail']['status'] === 'on_going')
                                    <div class="mt-5">
                                        <button type="button" id="startBooking" onclick="startBooking()" class="btn btn-success text-capitalize">{{__('landingpage.start')}}</button>
                                    </div>    
                                @endif

                                @if($bookingData['booking_detail']['status'] === 'in_progress')
                                    <input type="hidden" id="start_at" value = "{{ $bookingData['booking_detail']['start_at'] }}">
                                    <input type="hidden" id="duration_diff" value = "{{ $bookingData['booking_detail']['duration_diff'] }}">
                                    <div class="d-flex align-items-center mt-5 flex-wrap gap-3">
                                        @if($bookingData['service']['visit_type'] !== 'ONLINE')
                                            <button type="button" data-bs-toggle="modal" data-bs-target="#reasonModal" class="btn btn-warning text-capitalize">{{__('landingpage.hold')}}</button>
                                        @endif
                                        <button type="button" onclick="doneBooking()" class="btn btn-primary text-capitalize">{{__('landingpage.done')}}</button>
                                    </div>
                                @endif

                                @if($bookingData['booking_detail']['status'] === 'hold')
                                    <input type="hidden" id="duration_diff" value = "{{ $bookingData['booking_detail']['duration_diff'] }}">
                                    <div class="d-flex align-items-center mt-5 flex-wrap gap-3">
                                        <button type="button" onclick="resumeBooking()" class="btn btn-primary text-capitalize">{{__('landingpage.resume')}}</button>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#cancelModal" class="btn btn-danger text-capitalize">{{__('landingpage.cancel')}}</button>
                                    </div>
                                @endif

                                @if($bookingData['booking_detail']['status'] === 'pending_approval')
                                    <div class="d-block mt-5">
                                        <span class="text-dark bg-light">{{__('landingpage.waiting_for_response')}}...</span>
                                    </div>
                                @endif
                            </div>        

                        </div>
                        <div class="col-md-4 text-md-end mt-5 mt-md-0">
                            @php
                                $imageSource = null;

                                if ($bookingData['bookingpackage'] == null) {
                                    $imageSource = !empty($bookingData['service']['attchments'])
                                        ? $bookingData['service']['attchments'][0]
                                        : null;
                                } else {
                                    $imageSource = !empty($bookingData['bookingpackage']['package_image'])
                                        ? $bookingData['bookingpackage']['package_image']
                                        : null;
                                }
                            @endphp
                            <img src="{{ $imageSource ?? asset('images/default.png') }}" width="357" height="253" class="mw-100 rounded-3 object-cover" alt="service-detail">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if(!empty($bookingData['booking_detail']['booking_package']))
            <div class="py-lg-5 my-lg-5 py-3 my-3">
                <div class="row">
                    <div class="col-lg-6 py-5 position-relative pe-xl-5">
                        <h6 class="mt-0 mb-4 font-size-18 text-capitalize">{{__('landingpage.include_package')}}</h6>
                        @foreach($bookingData['booking_detail']['booking_package']['services'] as $servicepackage)
                            @php 
                                $category = App\Models\Category::where('id', $servicepackage['category_id'])->first();
                                $subcategory = App\Models\SubCategory::where('id', $servicepackage['subcategory_id'])->first();
                            @endphp
                            <div class="mb-4 pb-4 border-bottom d-flex align-items-sm-center aling-items-start flex-sm-row flex-column gap-5">
                                <div class="flex-shrink-0 provider-image-container">
                                    <img src="{{ $servicepackage['attchments'][0] ?? asset('images/default.png')}}" alt="service-image"
                                        class="img-fluid object-fit-cover rounded-3" style="width: 100px; height:100px;">
                                </div>
                                <div>
                                    <h5 class="text-capitalize mb-1">{{ $servicepackage['name'] }}</h5>
                                    <div class="d-sm-flex gap-2 my-3">
                                        <ul class="list-inline mt-sm-0 mt-2 mb-0 p-0 d-flex align-items-center flex-wrap category-list lh-1">
                                            <li class="me-2">{{ $category->name }}</li>
                                            <li class="text-primary">{{ $subcategory ? $subcategory->name : null }}</li>
                                        </ul>
                                    </div>
                                    <h6>{{ getPriceFormat($servicepackage['price']) }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div> 
        @endif

        @if($bookingData['booking_detail']['BookingAddonService'])
            <div class="py-lg-5 my-lg-5 py-3 my-3">
                <div class="row">
                    <div class="col-lg-6 py-5 position-relative pe-xl-5">
                        <h6 class="mt-0 mb-4 font-size-18 text-capitalize">{{__('landingpage.Add-ons')}}</h6>
                        @foreach($bookingData['booking_detail']['BookingAddonService'] as $serviceaddon)
                            <div class="mb-4 pb-4 border-bottom d-flex align-items-sm-center aling-items-start flex-sm-row flex-column gap-5">
                                <div class="flex-shrink-0 provider-image-container">
                                    <img src="{{ $serviceaddon['serviceaddon_image'] }}" alt="service-image"
                                        class="img-fluid object-fit-cover rounded-3" style="width: 100px; height:100px;">
                                </div>
                                <div>
                                    <h5 class="text-capitalize mb-1">{{ $serviceaddon['name'] }}</h5>
                                    <h6>{{ getPriceFormat($serviceaddon['price']) }}</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>        
        @endif

        <div class="py-lg-5 my-lg-5 py-3 my-3">
            <div class="row">
                <div class="col-lg-6 col-md-7 position-relative">
                    @if(!empty($bookingData['handyman_data']))
                        <span class="vr position-absolute top-0 end-0 h-100 d-md-block d-none"></span>
                    @endif
                    <div class="row">
                        <div class="col-lg-5 col-sm-6 position-relative">
                            <h6 class="mt-0 mb-4 font-size-18 text-capitalize">{{__('landingpage.about_provider')}}</h6>
                                <div class="img flex-shrink-0 mb-4">
                                <a href="{{ route('provider.detail', $bookingData['provider_data']['id']) }}">
                                    <img src="{{ $bookingData['provider_data']['profile_image'] }}" width="208" height="208"
                                        class="mw-100 rounded-3 object-cover" alt="about-provider">
                                        </a>
                                </div>
                                <div class="content">
                                    <a href="{{ route('provider.detail', $bookingData['provider_data']['id']) }}">
                                        <h5 class="mt-0 mb-1 text-capitalize">{{ $bookingData['provider_data']['display_name'] }}</h5>
                                    </a>
                                    <div class="d-flex align-items-center gap-1 flex-wrap">
                                        <div>
                                            <rating-component :readonly = true :showrating ="false" :ratingvalue="{{ $bookingData['provider_data']['providers_service_rating'] }}" />
                                        </div>
                                        <a href="{{route('rating.all', ['provider_id' => $bookingData['provider_data']['id']])}}"><span class="h6 lh-1">({{ round($bookingData['provider_data']['providers_service_rating'],1) }})</span></a>
                                    </div>
                                    <ul class="list-inline mt-3 mb-0 p-0">
                                        @if(!empty($bookingData['provider_data']['email']))
                                            <li class="mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="text-body flex-shrink-0">
                                                        <svg width="18" height="18" viewBox="0 0 16 16" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M7.8514 8.9765C7.4054 8.9765 6.96073 8.82916 6.58873 8.5345L3.59873 6.12383C3.3834 5.9505 3.35007 5.63516 3.52273 5.4205C3.69673 5.2065 4.0114 5.1725 4.22607 5.34516L7.2134 7.75316C7.58873 8.0505 8.1174 8.0505 8.4954 7.7505L11.4527 5.3465C11.6674 5.17116 11.9821 5.2045 12.1567 5.41916C12.3307 5.63316 12.2981 5.94783 12.0841 6.1225L9.1214 8.5305C8.74673 8.82783 8.29873 8.9765 7.8514 8.9765Z"
                                                                fill="currentColor"></path>
                                                            <mask style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0"
                                                                y="1" width="15" height="14">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M0.666748 1.33325H15V14.3333H0.666748V1.33325Z"
                                                                    fill="white"></path>
                                                            </mask>
                                                            <g>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M4.55941 13.3333H11.1061C11.1074 13.3319 11.1127 13.3333 11.1167 13.3333C11.8774 13.3333 12.5521 13.0613 13.0694 12.5446C13.6701 11.9466 14.0001 11.0873 14.0001 10.1253V5.54659C14.0001 3.68459 12.7827 2.33325 11.1061 2.33325H4.56075C2.88408 2.33325 1.66675 3.68459 1.66675 5.54659V10.1253C1.66675 11.0873 1.99741 11.9466 2.59741 12.5446C3.11475 13.0613 3.79008 13.3333 4.55008 13.3333H4.55941ZM4.54808 14.3333C3.51941 14.3333 2.60075 13.9599 1.89141 13.2533C1.10141 12.4653 0.666748 11.3546 0.666748 10.1253V5.54659C0.666748 3.14459 2.34075 1.33325 4.56075 1.33325H11.1061C13.3261 1.33325 15.0001 3.14459 15.0001 5.54659V10.1253C15.0001 11.3546 14.5654 12.4653 13.7754 13.2533C13.0667 13.9593 12.1474 14.3333 11.1167 14.3333H11.1061H4.56075H4.54808Z"
                                                                    fill="currentColor"></path>
                                                            </g>
                                                        </svg>
                                                    </span>
                                                    <span class="h6 text-body"><a
                                                            href="mailto:{{ $bookingData['provider_data']['email'] }}">{{ $bookingData['provider_data']['email'] }}</a></span>
                                                </div>
                                            </li>
                                        @endif
                                        @if(!empty($bookingData['provider_data']['address']))
                                            <li class="mb-1">
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="text-body flex-shrink-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="17"
                                                            viewBox="0 0 14 15" fill="none">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M8.875 6.37538C8.875 5.33943 8.03557 4.5 7.00038 4.5C5.96443 4.5 5.125 5.33943 5.125 6.37538C5.125 7.41057 5.96443 8.25 7.00038 8.25C8.03557 8.25 8.875 7.41057 8.875 6.37538Z"
                                                                stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M6.99963 14.25C6.10078 14.25 1.375 10.4238 1.375 6.42247C1.375 3.28998 3.89283 0.75 6.99963 0.75C10.1064 0.75 12.625 3.28998 12.625 6.42247C12.625 10.4238 7.89849 14.25 6.99963 14.25Z"
                                                                stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="h6 text-body">{{ $bookingData['provider_data']['address'] }}</span>
                                                </div>
                                            </li>
                                        @endif
                                        @if(!empty($bookingData['provider_data']['contact_number']))
                                            <li>
                                                <div class="d-flex align-items-center gap-2">
                                                    <span class="text-body flex-shrink-0">
                                                        <svg width="18" height="18" viewBox="0 0 26 27" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <mask style="mask-type:luminance" maskUnits="userSpaceOnUse" x="15"
                                                                y="2" width="10" height="10">
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M15.55 2.66699H24.8006V11.9109H15.55V2.66699Z"
                                                                    fill="white"></path>
                                                            </mask>
                                                            <g>
                                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                                    d="M23.9878 11.9109C23.5794 11.9109 23.2284 11.6043 23.1818 11.1894C22.7712 7.53204 19.9307 4.69371 16.2723 4.28746C15.8271 4.23762 15.5053 3.83679 15.5551 3.39046C15.6039 2.94521 16.0015 2.61696 16.4521 2.67329C20.87 3.16404 24.3009 6.59062 24.796 11.0074C24.8458 11.4537 24.5251 11.8556 24.0799 11.9055C24.0496 11.9087 24.0181 11.9109 23.9878 11.9109Z"
                                                                    fill="currentColor"></path>
                                                            </g>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M20.1528 11.9225C19.7715 11.9225 19.4324 11.6538 19.3566 11.266C19.0446 9.66267 17.8085 8.42659 16.2073 8.11567C15.7664 8.03009 15.4793 7.60434 15.5649 7.16342C15.6505 6.72251 16.0838 6.43434 16.5171 6.52101C18.7716 6.95867 20.5125 8.69851 20.9512 10.954C21.0368 11.396 20.7497 11.8218 20.3099 11.9073C20.2568 11.9171 20.2048 11.9225 20.1528 11.9225Z"
                                                                fill="currentColor"></path>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M3.56286 4.92859L3.64145 4.84645C5.72949 2.75822 7.08925 2.20472 8.54007 3.03901C8.95741 3.27899 9.34865 3.61492 9.88067 4.15526L11.5126 5.84745C12.4139 6.83101 12.6188 7.77443 12.3253 8.87929L12.2849 9.02556L12.24 9.17099L12.0219 9.81105C11.5549 11.2464 11.7499 12.0563 13.4112 13.7172C15.1388 15.4443 15.9452 15.5856 17.4913 15.0453L17.7669 14.9495L18.1001 14.8413L18.2459 14.8009C19.4203 14.4875 20.4123 14.7376 21.4644 15.789L22.7793 17.059L23.1663 17.4397C23.5954 17.8773 23.879 18.224 24.0885 18.5905C24.9176 20.0409 24.3635 21.3999 22.2153 23.5401L22.0109 23.7472C21.6901 24.0563 21.3905 24.2778 20.9502 24.4868C20.2113 24.8377 19.3382 24.9699 18.3238 24.8289C15.824 24.4812 12.6536 22.5089 8.63628 18.4926C8.30927 18.1656 7.99606 17.845 7.69635 17.5306L7.11485 16.91C1.66584 10.9898 1.18513 7.35312 3.41819 5.07229L3.56286 4.92859ZM8.56536 5.13775C8.21242 4.78979 7.95604 4.57768 7.73001 4.4477C7.23002 4.16019 6.6902 4.28172 5.69115 5.1416L5.37724 5.42204C5.32248 5.47258 5.26647 5.52505 5.20916 5.57949L4.8492 5.93009L4.81677 5.97061L4.57273 6.21578C3.98302 6.81813 3.70368 7.55327 3.94439 8.81756C4.33939 10.8922 6.14737 13.7065 9.78519 17.3434C13.5756 21.1329 16.4637 22.9295 18.5476 23.2194C19.7625 23.3883 20.3821 23.0941 21.0141 22.4467L21.496 21.9603C21.722 21.7239 21.9151 21.5095 22.0781 21.3137L22.3005 21.0335C22.8689 20.2764 22.9208 19.8222 22.6778 19.397C22.5853 19.2352 22.4507 19.0578 22.2549 18.841L21.9892 18.5604L21.832 18.403L20.1731 16.8012C19.6188 16.29 19.24 16.2175 18.6648 16.3709L18.4987 16.4187L17.8116 16.652C15.8181 17.2958 14.38 16.9836 12.2623 14.8664C10.0689 12.6736 9.81166 11.2092 10.5466 9.10085L10.5937 8.96537L10.7241 8.57258L10.7882 8.32221C10.9018 7.77733 10.7721 7.39742 10.1863 6.81159C10.1622 6.78747 10.1353 6.7603 10.1059 6.73055L8.56536 5.13775Z"
                                                                fill="currentColor"></path>
                                                        </svg>
                                                    </span>
                                                    <span class="h6 text-body"><a href="tel: {{ $bookingData['provider_data']['contact_number'] }}">{{ $bookingData['provider_data']['contact_number'] }}</a></span>
                                                </div>
                                            </li>
                                        @endif        
                                    </ul>
                                </div>
                        </div>
                        
                        @if(!empty($bookingData['handyman_data']))
                        <div class="col-lg-5 col-sm-6 mt-sm-0 mt-5">
                            <h6 class="mt-0 mb-4 font-size-18 text-capitalize">{{__('landingpage.about_handyman')}}</h6>
                            @foreach($bookingData['handyman_data'] as $handyman)
                            <div class="img flex-shrink-0 mb-4">
                            <a href="{{ route('handyman-detail', $handyman['id']) }}">
                                <img src="{{ $handyman['profile_image'] }}" width="208" height="208"
                                    class="mw-100 rounded-3 object-cover" alt="about-handyman">
                                    </a>
                            </div>
                            
                            <div class="content">
                                <a href="{{ route('handyman-detail', $handyman['id']) }}">
                                    <h5 class="mt-0 mb-1 text-capitalize">{{ $handyman['display_name'] }}</h5>
                                </a>
                                <div class="d-flex align-items-center gap-1 flex-wrap">
                                    <div>
                                        <rating-component :readonly = true :showrating ="false" :ratingvalue="{{ $handyman['handyman_rating'] }}" />
                                    </div>
                                    <a href="{{route('rating.all', ['handyman_id' => $handyman['id']])}}">
                                    <span class="h6 lh-1">({{ round($handyman['handyman_rating'],1) }})</span>
                                    </a>
                                </div>
                                <ul class="list-inline mb-0 mt-3">
                                    @if(!empty($handyman['contact_number']))
                                    <li class="mb-1">
                                        <div class="d-flex align-items-center gap-2">
                                            <span class="text-body flex-shrink-0">
                                                <svg width="18" height="18" viewBox="0 0 26 27" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <mask style="mask-type:luminance" maskUnits="userSpaceOnUse" x="15"
                                                        y="2" width="10" height="10">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M15.55 2.66699H24.8006V11.9109H15.55V2.66699Z"
                                                            fill="white"></path>
                                                    </mask>
                                                    <g>
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M23.9878 11.9109C23.5794 11.9109 23.2284 11.6043 23.1818 11.1894C22.7712 7.53204 19.9307 4.69371 16.2723 4.28746C15.8271 4.23762 15.5053 3.83679 15.5551 3.39046C15.6039 2.94521 16.0015 2.61696 16.4521 2.67329C20.87 3.16404 24.3009 6.59062 24.796 11.0074C24.8458 11.4537 24.5251 11.8556 24.0799 11.9055C24.0496 11.9087 24.0181 11.9109 23.9878 11.9109Z"
                                                            fill="currentColor"></path>
                                                    </g>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M20.1528 11.9225C19.7715 11.9225 19.4324 11.6538 19.3566 11.266C19.0446 9.66267 17.8085 8.42659 16.2073 8.11567C15.7664 8.03009 15.4793 7.60434 15.5649 7.16342C15.6505 6.72251 16.0838 6.43434 16.5171 6.52101C18.7716 6.95867 20.5125 8.69851 20.9512 10.954C21.0368 11.396 20.7497 11.8218 20.3099 11.9073C20.2568 11.9171 20.2048 11.9225 20.1528 11.9225Z"
                                                        fill="currentColor"></path>
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M3.56286 4.92859L3.64145 4.84645C5.72949 2.75822 7.08925 2.20472 8.54007 3.03901C8.95741 3.27899 9.34865 3.61492 9.88067 4.15526L11.5126 5.84745C12.4139 6.83101 12.6188 7.77443 12.3253 8.87929L12.2849 9.02556L12.24 9.17099L12.0219 9.81105C11.5549 11.2464 11.7499 12.0563 13.4112 13.7172C15.1388 15.4443 15.9452 15.5856 17.4913 15.0453L17.7669 14.9495L18.1001 14.8413L18.2459 14.8009C19.4203 14.4875 20.4123 14.7376 21.4644 15.789L22.7793 17.059L23.1663 17.4397C23.5954 17.8773 23.879 18.224 24.0885 18.5905C24.9176 20.0409 24.3635 21.3999 22.2153 23.5401L22.0109 23.7472C21.6901 24.0563 21.3905 24.2778 20.9502 24.4868C20.2113 24.8377 19.3382 24.9699 18.3238 24.8289C15.824 24.4812 12.6536 22.5089 8.63628 18.4926C8.30927 18.1656 7.99606 17.845 7.69635 17.5306L7.11485 16.91C1.66584 10.9898 1.18513 7.35312 3.41819 5.07229L3.56286 4.92859ZM8.56536 5.13775C8.21242 4.78979 7.95604 4.57768 7.73001 4.4477C7.23002 4.16019 6.6902 4.28172 5.69115 5.1416L5.37724 5.42204C5.32248 5.47258 5.26647 5.52505 5.20916 5.57949L4.8492 5.93009L4.81677 5.97061L4.57273 6.21578C3.98302 6.81813 3.70368 7.55327 3.94439 8.81756C4.33939 10.8922 6.14737 13.7065 9.78519 17.3434C13.5756 21.1329 16.4637 22.9295 18.5476 23.2194C19.7625 23.3883 20.3821 23.0941 21.0141 22.4467L21.496 21.9603C21.722 21.7239 21.9151 21.5095 22.0781 21.3137L22.3005 21.0335C22.8689 20.2764 22.9208 19.8222 22.6778 19.397C22.5853 19.2352 22.4507 19.0578 22.2549 18.841L21.9892 18.5604L21.832 18.403L20.1731 16.8012C19.6188 16.29 19.24 16.2175 18.6648 16.3709L18.4987 16.4187L17.8116 16.652C15.8181 17.2958 14.38 16.9836 12.2623 14.8664C10.0689 12.6736 9.81166 11.2092 10.5466 9.10085L10.5937 8.96537L10.7241 8.57258L10.7882 8.32221C10.9018 7.77733 10.7721 7.39742 10.1863 6.81159C10.1622 6.78747 10.1353 6.7603 10.1059 6.73055L8.56536 5.13775Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                            <span class="h6 text-body"><a href="tel: {{ $handyman['contact_number'] }}">{{ $handyman['contact_number'] }}</a></span>
                                        </div>
                                    </li>
                                    @endif
                                    @if(!empty($handyman['email']))
                                    <li class="mb-1">
                                        <div class="d-flex align-items-center gap-2">
                                                <span class="text-body flex-shrink-0">
                                                    <svg width="18" height="18" viewBox="0 0 16 16" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M7.8514 8.9765C7.4054 8.9765 6.96073 8.82916 6.58873 8.5345L3.59873 6.12383C3.3834 5.9505 3.35007 5.63516 3.52273 5.4205C3.69673 5.2065 4.0114 5.1725 4.22607 5.34516L7.2134 7.75316C7.58873 8.0505 8.1174 8.0505 8.4954 7.7505L11.4527 5.3465C11.6674 5.17116 11.9821 5.2045 12.1567 5.41916C12.3307 5.63316 12.2981 5.94783 12.0841 6.1225L9.1214 8.5305C8.74673 8.82783 8.29873 8.9765 7.8514 8.9765Z"
                                                            fill="currentColor"></path>
                                                        <mask style="mask-type:luminance" maskUnits="userSpaceOnUse"
                                                            x="0" y="1" width="15" height="14">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M0.666748 1.33325H15V14.3333H0.666748V1.33325Z"
                                                                fill="white"></path>
                                                        </mask>
                                                        <g>
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                d="M4.55941 13.3333H11.1061C11.1074 13.3319 11.1127 13.3333 11.1167 13.3333C11.8774 13.3333 12.5521 13.0613 13.0694 12.5446C13.6701 11.9466 14.0001 11.0873 14.0001 10.1253V5.54659C14.0001 3.68459 12.7827 2.33325 11.1061 2.33325H4.56075C2.88408 2.33325 1.66675 3.68459 1.66675 5.54659V10.1253C1.66675 11.0873 1.99741 11.9466 2.59741 12.5446C3.11475 13.0613 3.79008 13.3333 4.55008 13.3333H4.55941ZM4.54808 14.3333C3.51941 14.3333 2.60075 13.9599 1.89141 13.2533C1.10141 12.4653 0.666748 11.3546 0.666748 10.1253V5.54659C0.666748 3.14459 2.34075 1.33325 4.56075 1.33325H11.1061C13.3261 1.33325 15.0001 3.14459 15.0001 5.54659V10.1253C15.0001 11.3546 14.5654 12.4653 13.7754 13.2533C13.0667 13.9593 12.1474 14.3333 11.1167 14.3333H11.1061H4.56075H4.54808Z"
                                                                fill="currentColor"></path>
                                                        </g>
                                                    </svg>
                                                </span>
                                                <span class="h6 text-body">
                                                    <a href="mailto:{{ $handyman['email'] }}">{{ $handyman['email'] }}</a>
                                                </span>
                                        </div>
                                    <li>
                                    @endif
                                </ul>
    
                                   
                                @php 
                                    $handymanrating = App\Models\HandymanRating::where('booking_id', $bookingData['booking_detail']['id'])->where('customer_id', auth()->user()->id)->where('handyman_id',$handyman['id'])->first();
                                @endphp
                                @if($bookingData['booking_detail']['status'] == 'completed')
                                    <handyman-rating 
                                        :booking_id="{{ $bookingData['booking_detail']['id'] }}" 
                                        :service_id="{{ $bookingData['service']['id'] }}" 
                                        :customer_id="{{ auth()->user()->id }}"
                                        :handyman_id="{{ $handyman['id'] }}"
                                        :handymanrating="{{ isset($handymanrating) ? $handymanrating : '' }}"
                                    ></handyman-rating>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @endif
                        <div class="col-lg-2 d-lg-block d-none"></div>
                    </div>
                </div>
                @if($bookingData['booking_detail']['amount'] > 0)
                <div class="col-lg-6 col-md-5 mt-md-0 mt-5">
                    <div class="position-relative px-lg-3">
                        <h6 class="mt-0 mb-3 font-size-18 text-capitalize">{{__('landingpage.price_detail')}}</h6>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="text-capitalize">{{__('messages.price')}}</span>
                                        </td>
                                        <td>
                                            <span class="d-block text-end">{{ getPriceFormat($bookingData['booking_detail']['amount']) }}</span>
                                        </td>
                                    </tr>
                                    @if(!empty($bookingData['booking_detail']['final_discount_amount']))
                                    <tr>
                                        <td>
                                            <span class="text-capitalize">{{__('messages.discount')}} <span class="text-success">({{$bookingData['booking_detail']['discount']}}%
                                            {{__('landingpage.off')}})</span></span>
                                        </td>
                                        <td>
                                            <span class="d-block text-end text-success">-{{ getPriceFormat($bookingData['booking_detail']['final_discount_amount']) }}</span>
                                            <!-- <span class="d-block text-end text-success">-{{ getPriceFormat($bookingData['booking_detail']['discount']/100) }}</span> -->
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <span class="text-capitalize">{{__('landingpage.subtotal')}}</span>
                                        </td>
                                        <td>
                                            <span class="d-block text-end">{{ getPriceFormat($bookingData['booking_detail']['amount']) }}</span>
                                        </td>
                                    </tr>
                                    @if(!empty($bookingData['booking_detail']['extra_charges_value']))
                                    <tr>
                                        <td>
                                            <span class="text-capitalize">{{__('landingpage.total_extra_charges')}}</span>
                                        </td>
                                        <td>
                                            <span class="d-block text-end">{{ getPriceFormat($bookingData['booking_detail']['extra_charges_value']) }}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    @if($bookingData['coupon_data'])
                                    <tr>
                                        <td>
                                            <span class="text-capitalize">{{__('landingpage.coupon')}}<span class="text-primary"> ({{$bookingData['coupon_data']['code']}})</span></span>
                                        </td>
                                        <td>
                                            <span class="d-block text-end text-success">-{{ getPriceFormat($bookingData['coupon_data']['discount']) }}</span>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td>
                                            <span class="text-capitalize">{{__('landingpage.tax')}}</span>
                                        </td>
                                        <td>
                                        @if($bookingData['booking_detail']['final_total_tax']>0)
                                         <span class=" d-block text-end text-danger"><i type="button" class="fa fa-info-circle text-body" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#taxModal"></i> +{{ getPriceFormat($bookingData['booking_detail']['final_total_tax']) }}</span>
                                         @else
                                          <span class=" d-block text-end text-danger">+{{ getPriceFormat($bookingData['booking_detail']['final_total_tax']) }}</span>

                                         @endif  
                                    </tr>
        
                                    <tr class="bg-light">
                                        <td class="py-2">
                                            <h6 class="text-capitalize m-0">{{__('landingpage.total')}}</h6>
                                        </td>
                                        <td class="py-2">
                                            <h6 class="text-end m-0">{{ getPriceFormat($bookingData['booking_detail']['total_amount'] + $bookingData['booking_detail']['extra_charges_value']) }}</h6>
                                        </td>
                                    </tr>
        
                                   @if($bookingData['service']['is_enable_advance_payment']==1)  
        
                                     <tr class="bg-light">
                                        <td class="py-2">
                                            <h6 class="text-capitalize m-0">{{__('landingpage.advance_payment')}}</h6>
                                        </td>
                                        <td class="py-2">
                                            @php 
                                                $advance_payment_amount = ($bookingData['booking_detail']['total_amount']* $bookingData['service']['advance_payment_amount'])/100;
                                                $advance_payment_amount = round($advance_payment_amount, 2);
                                            @endphp
                                            <h6 class="text-end m-0">{{ getPriceFormat(($bookingData['booking_detail']['total_amount']* $bookingData['service']['advance_payment_amount'])/100) }}</h6>
                                        </td>
                                    </tr>
        
                                   @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- @if(count($bookingData['booking_detail']['extra_charges']) > 0 || !empty($bookingData['booking_detail']['payment_id']) )
                            <span class="vr position-absolute top-0 end-0 h-100 d-lg-block d-none"></span>
                        @endif -->
                    </div>
                    <div class="px-lg-3 mt-5">
                        @if(count($bookingData['booking_detail']['extra_charges']) > 0)
                        <h6 class="mt-0 mb-3 font-size-18 text-capitalize">{{__('landingpage.extra_charges')}}</h6>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    @foreach($bookingData['booking_detail']['extra_charges'] as $charge)
                                    <tr>
                                        <td class="ps-0">
                                            {{$charge['title']}}
                                        </td>
                                        <td class="pd-0">
                                            <h6 class="text-end"><span class="font-size-14 text-body">{{ getPriceFormat($charge['price']) }}*{{ $charge['qty'] }} =</span> {{ getPriceFormat($charge['price']*$charge['qty']) }}
                                            </h6>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @endif
        
                        @if(!empty($bookingData['booking_detail']['payment_id']))
                        <h6 class="mt-5 mb-3 font-size-18 text-capitalize">{{__('landingpage.payment_detail')}}</h6>
                        <div class="table-responsive">
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="ps-0">
                                            <span class="text-capitalize">{{__('landingpage.id')}}</span>
                                        </td>
                                        <td class="pd-0">
                                            <span class="d-block text-end">#{{ $bookingData['booking_detail']['payment_id'] }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0">
                                            <span class="text-capitalize">{{__('messages.method')}}</span>
                                        </td>
                                        <td class="pd-0">
                                            <span class="d-block text-end text-capitalize">{{ $bookingData['booking_detail']['payment_method'] }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="ps-0">
                                            <span class="text-capitalize">{{__('messages.status')}}</span>
                                        </td>
                                        <td class="pd-0">
                                            <span class="d-block text-end text-capitalize">{{ str_replace("_"," ",$bookingData['booking_detail']['payment_status']) }}</span>
                                        </td>
                                    </tr>
                                    @if($bookingData['booking_detail']['txn_id'])
                                    <tr>
                                        <td class="ps-0">
                                            <span class="text-capitalize">{{__('landingpage.transaction_id')}}</span>
                                        </td>
                                        <td class="pd-0">
                                            <span class="d-block text-end">{{ $bookingData['booking_detail']['txn_id'] }}</span>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @endif
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 d-lg-block d-none"></div>
            <div class="col-lg-4 col-sm-5">
                <div class="text-center">
                    @if($bookingData['booking_detail']['payment_id'] !== null && $bookingData['booking_detail']['payment_status']=='paid' && $bookingData['booking_detail']['status']=='completed')
                        <a href="{{route('invoice_pdf',$bookingData['booking_detail']['id'])}}" class="btn btn-primary text-capitalize w-100"
                            download>{{__('landingpage.request_invoice')}}</a>
                    @endif
                </div>

                 <div class="text-center">
                    @if(($bookingData['service']['is_enable_advance_payment']==1 && $bookingData['booking_detail']['payment_id'] == null) || ($bookingData['service']['is_enable_advance_payment']==1 && $bookingData['booking_detail']['payment_status'] == 'failed' || $bookingData['booking_detail']['payment_status'] == 'pending')) 
                    <div id="payment-component" style="display: none;">
                            <payment
                                :booking_id="{{ $bookingData['booking_detail']['id'] }}"
                                :customer_id="{{ auth()->user()->id }}"
                                :discount="{{ $bookingData['booking_detail']['final_discount_amount'] }}"
                                :total_amount="{{ $bookingData['booking_detail']['total_amount'] }}"
                                :advance_payment_amount="{{ $bookingData['booking_detail']['advance_payment_amount']}}"
                                :wallet_amount="{{$wallet_amount}}"
                            ></payment>
                        </div>
                        <a onclick="togglePayment()" id="pay_advance" class="btn btn-primary text-capitalize w-100" style="display: block;">{{__('landingpage.pay_advance')}}</a>
                    @endif

                    @if($bookingData['service']['visit_type'] == 'ONLINE' && $bookingData['booking_detail']['status'] == 'completed' && ($bookingData['booking_detail']['payment_id'] == null || $bookingData['booking_detail']['payment_status'] == 'failed' || $bookingData['booking_detail']['payment_status'] == 'pending'))
                        <div id="payment-component" style="display: none;">
                            <payment
                                :booking_id="{{ $bookingData['booking_detail']['id'] }}"
                                :customer_id="{{ auth()->user()->id }}"
                                :discount="{{ $bookingData['booking_detail']['final_discount_amount'] }}"
                                :total_amount="{{ $bookingData['booking_detail']['total_amount'] }}"
                                :wallet_amount="{{$wallet_amount}}"
                            ></payment>
                        </div>
                        <a onclick="togglePayment()" id="pay_advance" class="btn btn-primary text-capitalize w-100" style="display: block;">{{__('landingpage.pay_now')}}</a>
                    @endif
                </div>
            </div>
            <div class="col-lg-4 d-lg-block d-none"></div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                @php 
                    $bookingRating = App\Models\BookingRating::where('booking_id', $bookingData['booking_detail']['id'])->where('customer_id', auth()->user()->id)->first();
                    if(!empty($bookingRating)){
                        $bookingRating->display_name = $bookingRating->customer->display_name;
                        $bookingRating->profile_image = getSingleMedia($bookingRating->customer, 'profile_image',null);
                        $bookingRating->date = date($date_time['date_format'], strtotime($bookingRating->created_at));
                    }
                @endphp
                @if($bookingData['booking_detail']['status'] == 'completed')
                    <booking-rating :booking_id="{{ $bookingData['booking_detail']['id'] }}" :service_id="{{ $bookingData['service']['id'] }}" :customer_id="{{ auth()->user()->id }}" :bookingrating="{{ json_encode($bookingRating) }}"></booking-rating>
                @endif
                
                @if(count($bookingData['rating_data']) !== 0)
                    <div class="pt-lg-5 pt-3 mt-lg-5 mt-3">
                        <div class="mt-3">
                            <h5 class="mb-5">{{ count($bookingData['rating_data']) }} {{__('landingpage.review_for')}} {{$bookingData['booking_detail']['service_name']}}</h5>
                            <ul class="comment-list list-inline m-0">
                            @php $counter = 1; @endphp
                            @foreach($bookingData['rating_data'] as $ratingData)
                                <li class="comment mb-5 pb-5 border-bottom">
                                    @if($counter % 2 == 0)
                                        <ul class="child-comment-list list-inline m-0">
                                            <li class="comment">
                                    @endif
                                    <div class="comment-box">
                                        <div
                                            class="d-flex align-items-sm-center align-items-start flex-sm-row flex-column justify-content-between gap-3">
                                            <div
                                                class="d-inline-flex align-items-sm-center align-items-start flex-sm-row flex-column gap-3">
                                                <div class="user-image flex-shrink-0">
                                                    <img src="{{ $ratingData['profile_image'] }}"
                                                        class="avatar-70 object-cover rounded-circle" alt="comment-user" />
                                                </div>
                                                <div class="comment-user-info">
                                                    <h6 class="font-size-18 text-capitalize mb-2">{{ $ratingData['customer_name'] }}</h6>
                                                    <span class="text-primary">
                                                        <rating-component :readonly = true :showrating ="false" :ratingvalue="{{ $ratingData['rating'] }}" />
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="date text-capitalize">{{ date($date_time['date_format'], strtotime($ratingData['created_at'])) }}</div>
                                        </div>
                                        <div class="mt-4">
                                            <p class="commnet-content m-0">
                                                {{ $ratingData['review'] }}
                                            </p>
                                        </div>
                                    </div>
                                    @if($counter % 2 == 0)
                                            </li>
                                        </ul>
                                    @endif
                                </li>
                                @php $counter++; @endphp
                            @endforeach

                        </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-4 d-lg-block d-none"></div>
        </div>
    </div>
</div>


<!-- ===================
Review Modal
========================== -->
<div class="modal fade" id="ratingModal" aria-labelledby="ratingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize" id="ratingModalLabel">{{__('landingpage.your_review')}}</h5>
                <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                        <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z"
                            fill="currentColor">
                        </path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-4">
                        <label class="form-label text-capitalize">{{__('landingpage.your_rating')}}</label>
                        <rating-component />
                        {{-- {{> components/widgets/filter-rating rating="0"}} --}}
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-capitalize">{{__('messages.description')}}</label>
                        <textarea class="form-control" rows="4" placeholder="Write Here..."></textarea>
                    </div>
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary">{{__('messages.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- tax modal --}}

    <div class="modal fade" id="taxModal" aria-labelledby="taxModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="taxModalLabel">{{__('messages.applied_taxes')}}</h5>
                    <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                            <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z"
                                fill="currentColor">
                            </path>
                        </svg>
                    </span>
                </div>
                <div class="modal-body">
                    @if($bookingData['booking_detail']['taxes'] !== null)
                    @foreach($bookingData['booking_detail']['taxes'] as $tax)
                        <div class="d-flex justify-content-between">
                            <p>{{ $tax['title'] }}</p>
                            @if($tax['type'] == 'percent')
                                <p>{{ getPriceFormat($tax['value']*$bookingData['booking_detail']['amount']/100) }}</p>
                            @else
                                <p>{{ getPriceFormat($tax['value']) }}</p>
                            @endif
                        </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>

<!-- ===================
Status Modal
========================== -->
<div class="modal fade" id="statusModal" aria-labelledby="statusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
        <div class="modal-content overflow-visible">
            <div class="modal-header border-bottom-0 gap-2">
                <h5 class="modal-title text-capitalize" id="statusModalLabel">{{__('landingpage.booking_history')}}</h5>
                <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                        <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z"
                            fill="currentColor">
                        </path>
                    </svg>
                </span>
                <span class="text-primary text-uppercase">ID: #{{ $bookingData['booking_detail']['id'] }}</span>
            </div>
            <div class="modal-body">
                <ul class="list-inline m-o status-timeline position-relative">
                    @foreach($bookingData['booking_activity'] as $bookingactivity)
                        @php 
                            $datetime = new DateTime($bookingactivity['datetime']);
                            $date = $datetime->format('d F Y');
                            $time = $datetime->format('h:i A');
                        @endphp
                        <li class="done">
                            <div class="status-timeline-wrapper position-relative">
                                <div class="timeline-time-block text-md-end">
                                    <h6 class="text-uppercase m-0 time">{{ date($date_time['time_format'], strtotime($time )) }}</h6>
                                    <p class="text-capitalize m-0 date">{{ date($date_time['date_format'], strtotime($date)) }}</p>
                                </div>
                                <div class="timeline-content-block text-md-start">
                                    <h6 class="text-capitalize m-0 title">{{ $bookingactivity['activity_type'] }}</h6>
                                    <p class="text-capitalize m-0 description">{{ $bookingactivity['activity_message'] }}</p>
                                </div>
                                <div class="timline-border">
                                    <span class="icon icon-fill">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.67 0H14.34C17.73 0 20 2.38 20 5.92V14.091C20 17.62 17.73 20 14.34 20H5.67C2.28 20 0 17.62 0 14.091V5.92C0 2.38 2.28 0 5.67 0ZM9.43 12.99L14.18 8.24C14.52 7.9 14.52 7.35 14.18 7C13.84 6.66 13.28 6.66 12.94 7L8.81 11.13L7.06 9.38C6.72 9.04 6.16 9.04 5.82 9.38C5.48 9.72 5.48 10.27 5.82 10.62L8.2 12.99C8.37 13.16 8.59 13.24 8.81 13.24C9.04 13.24 9.26 13.16 9.43 12.99Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <span class="icon icon-outline">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                            fill="none">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M5.665 1.5C3.135 1.5 1.5 3.233 1.5 5.916V14.084C1.5 16.767 3.135 18.5 5.665 18.5H14.333C16.864 18.5 18.5 16.767 18.5 14.084V5.916C18.5 3.233 16.864 1.5 14.334 1.5H5.665ZM14.333 20H5.665C2.276 20 0 17.622 0 14.084V5.916C0 2.378 2.276 0 5.665 0H14.334C17.723 0 20 2.378 20 5.916V14.084C20 17.622 17.723 20 14.333 20Z"
                                                fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M8.8132 13.1229C8.6222 13.1229 8.4292 13.0499 8.2832 12.9029L5.9092 10.5299C5.6162 10.2369 5.6162 9.76295 5.9092 9.46995C6.2022 9.17695 6.6762 9.17695 6.9692 9.46995L8.8132 11.3119L13.0292 7.09695C13.3222 6.80395 13.7962 6.80395 14.0892 7.09695C14.3822 7.38995 14.3822 7.86395 14.0892 8.15695L9.3432 12.9029C9.1972 13.0499 9.0052 13.1229 8.8132 13.1229Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- ===================
Reason Modal
========================== -->
<div class="modal fade" id="reasonModal" aria-labelledby="reasonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-capitalize fw-bold" id="ratingModalLabel">{{__('landingpage.reason_modal_msg')}}</h6>
                <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                        <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z"
                            fill="currentColor">
                        </path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-4">
                        <label class="form-label text-capitalize">{{__('landingpage.reason')}}</label>
                        <textarea class="form-control" id="reason" rows="4" placeholder="Specify your reason here..."></textarea>
                    </div>
                    <div class="mb-4">
                        <button type="button" onclick="holdBooking()" class="btn btn-primary">{{__('messages.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="cancelModal" aria-labelledby="reasonModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-capitalize fw-bold" id="ratingModalLabel">{{__('landingpage.cancel_modal_msg')}}</h6>
                <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
                        <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z"
                            fill="currentColor">
                        </path>
                    </svg>
                </span>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-4">
                        <label class="form-label text-capitalize">{{__('landingpage.reason')}}</label>
                        <textarea class="form-control" id="cancel_reason" rows="4" placeholder="Specify your reason here..."></textarea>
                    </div>
                    <div class="mb-4">
                        <button type="button" onclick="cancelBooking()" class="btn btn-primary">{{__('messages.submit')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('after_script')

<script>
    function togglePayment() {
        const paymentComponent = document.getElementById('payment-component');

        paymentComponent.style.display = (paymentComponent.style.display === 'none') ? 'block' : 'none';
        document.getElementById('pay_advance').style.display = 'none';
    }

    const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');

    const updateBookingStatus = (status, start_at = '', end_at = '', duration_diff = 0, reason = '', payment_status = '') => {
        const bookingId = document.getElementById('booking_id').value;
        fetch(baseUrl + '/api/booking-update', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                id: bookingId,
                status: status,
                start_at: start_at,
                end_at: end_at,
                duration_diff: duration_diff,
                reason: reason,
                payment_status: payment_status
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Something went wrong');
            }
            return response.json();
        })
        .then(data => {
            Swal.fire({
                title: 'Done',
                text: data.message,
                icon: 'success',
                iconColor: '#5F60B9'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.reload();
                }
            });
        })
        .catch(error => {
            console.error('Error:', error);
        });
    };

    function currentDateTime(){
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        const formattedDate = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
        return formattedDate;
    }

    function cancelBooking(){
        status = "cancelled";
        start_at = "";
        end_at = "";
        duration_diff = "";
        reason = document.getElementById('cancel_reason').value;
        updateBookingStatus(status,start_at,end_at,duration_diff,reason);
    }
    function startBooking(){
        status = "in_progress";
        start_at = currentDateTime();
        updateBookingStatus(status,start_at);
    }
    function holdBooking(){
        status = "hold";
        start_at = document.getElementById('start_at').value;
        end_at = currentDateTime();
        duration_diff = Math.floor((new Date(end_at) - new Date(start_at)) / (1000 * 60));
        reason = document.getElementById('reason').value;
        updateBookingStatus(status,start_at,end_at,duration_diff,reason);
    }
    function resumeBooking(){
        status = "in_progress";
        start_at = currentDateTime();
        end_at = " ";
        duration_diff = document.getElementById('duration_diff').value;
        updateBookingStatus(status,start_at,end_at,duration_diff);
    }
    function doneBooking() {
        Swal.fire({
            title: 'Done',
            text: 'Do you want to end this service?',
            icon: 'warning',  
            showCancelButton: true,
            confirmButtonColor: '#5F60B9',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes',
            cancelButtonText: 'No'
        }).then((result) => {
            if (result.isConfirmed) {
                status = "pending_approval";
                start_at = document.getElementById('start_at').value;
                end_at = currentDateTime();
                const duration = document.getElementById('duration_diff').value;
                duration_diff = parseInt(duration) + Math.floor((new Date(end_at) - new Date(start_at)) / (1000 * 60));
                reason = "Done";
                updateBookingStatus(status, start_at, end_at, duration_diff, reason);
            }
        });
    }


</script>


@endsection