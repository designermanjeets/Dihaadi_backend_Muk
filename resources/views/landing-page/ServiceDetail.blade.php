@extends('landing-page.layouts.default')

@section('content')
@php
   
@endphp

<div class="section-padding service-detail">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pe-xxl-5">
                <h3 class="text-capitalize mb-2">{{ $serviceData['service_detail']['name'] }}</h3>
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                    <ul class="service-meta-list list-inline m-0 d-flex align-items-center flex-wrap">
                        <li>
                            <div class="d-flex align-items-center gap-2">
                                @if($serviceData['service_detail']['total_rating'] > 0 && $serviceData['service_detail']['total_review'] > 0)
                                <span class="ratting">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14"
                                        fill="none">
                                        <path
                                            d="M8.3819 0.452137L10.0821 3.74897C10.2074 3.98783 10.4465 4.1537 10.7222 4.19056L14.5412 4.72726C14.7642 4.75748 14.9666 4.87102 15.1033 5.04426C15.2385 5.2153 15.2966 5.43204 15.2637 5.64509C15.237 5.82202 15.1507 5.98569 15.0186 6.11101L12.2513 8.69938C12.0489 8.88 11.9573 9.14761 12.0061 9.40932L12.6874 13.0482C12.76 13.4876 12.4583 13.9019 12.0061 13.9852C11.8198 14.014 11.6288 13.9838 11.4608 13.9012L8.05423 12.1886C7.80141 12.0655 7.50277 12.0655 7.24995 12.1886L3.8434 13.9012C3.42484 14.1157 2.90622 13.9697 2.67326 13.5716C2.58695 13.4131 2.5564 13.2325 2.58466 13.0563L3.26597 9.41669C3.31485 9.15572 3.22243 8.88664 3.02079 8.70602L0.25354 6.11912C-0.0756579 5.81244 -0.0855873 5.30745 0.23139 4.98971C0.238264 4.98307 0.245902 4.9757 0.25354 4.96833C0.384914 4.83931 0.557533 4.75748 0.7439 4.7361L4.5629 4.19867C4.83787 4.16108 5.07694 3.99668 5.20297 3.75634L6.84208 0.452137C6.98797 0.169045 7.29043 -0.00714949 7.61887 0.000222678H7.72122C8.00611 0.0333974 8.25435 0.203695 8.3819 0.452137Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <h6>{{ round($serviceData['service_detail']['total_rating'],1) }}<span class="text-body"> <a href="{{route('rating.all', ['service_id' => $serviceData['service_detail']['id']])}}"> ({{ $serviceData['service_detail']['total_review'] }} {{__('messages.reviews')}})</span></a></h6>
                                @endif
                            </div>
                        </li>
                        @if(!empty($serviceData['service_detail']['duration']))
                            <li>
                                <h6 class="text-body">
                                @php
               
                $durationParts = explode(':', $serviceData['service_detail']['duration']);
                $hours = intval($durationParts[0]);
                $minutes = intval($durationParts[1]);
            @endphp

            @if($hours > 0)
                ({{ $hours }} hrs @if($minutes > 0) {{ $minutes }} min @endif)
            @else
                ({{ $minutes }} min)
            @endif
        
                               

                                </h6>
                            </li>
                        @endif
                    </ul>
                    <div>
                        <span class="text-capitalize">{{__('landingpage.created_by')}}: </span>
                        <a class="d-inline-block text-capitalize m-0" href="{{ route('provider.detail', $serviceData['provider']['id']) }}">{{ $serviceData['provider']['display_name'] }}</a>
                    </div>
                </div>
                @if(!empty($serviceData['service_detail']['attchments']))
                    <div class="mt-5">
                        <section-thumbnail-section :attachments="{{ json_encode($serviceData['service_detail']['attchments']) }}"></section-thumbnail-section>
                    </div>
                @else
                    <img src="{{ asset('images/default.png') }}" alt="" class="img-fluid object-cover rounded-3 mt-4 w-100"/>
                @endif
                @if(!empty($serviceData['service_detail']['description']))
                    <div class="mt-5 pt-lg-5 pt-3">
                        <h5 class="mb-3">{{__('landingpage.about_service')}}</h5>
                        <p class="m-0">
                            {{ $serviceData['service_detail']['description'] }}
                        </p>
                    </div>
                @endif
                
                <div class="mt-5 pt-lg-5 pt-3">
                    <h5 class="mb-3">{{__('landingpage.about_provider')}}</h5>
                    <div class="p-5 border rounded-3 about-provider-box">
                        <div
                            class="mb-4 pb-4 border-bottom d-flex align-items-sm-center aling-items-start flex-sm-row flex-column gap-5">
                            <div class="flex-shrink-0 provider-image-container">
                                <img src="{{ $serviceData['provider']['profile_image'] }}" alt="provider-user"
                                    class="img-fluid w-100">
                            </div>
                            <div>
                                <a href="{{ route('provider.detail', $serviceData['provider']['id']) }}"><h5 class="text-capitalize mb-1">{{ $serviceData['provider']['display_name'] }}</h5></a>

                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <div class="star-rating">
                                        <rating-component :readonly="true" :showrating="false" :ratingvalue="{{ $serviceData['provider']['providers_service_rating'] }}" />
                                    </div>
                                    <h6 class="lh-sm">{{ round($serviceData['provider']['providers_service_rating'],1) }}</h6><a href="{{route('rating.all', ['provider_id' => $serviceData['provider']['id']])}}">({{ $serviceData['provider']['total_service_rating'] }} {{__('messages.reviews')}})</a>
                                </div>

                                <p class="mt-3 mb-0">
                                    {{ $serviceData['provider']['description'] }}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <h6 class="mb-1">{{__('landingpage.member_since')}}:</h6>
                                <p class="m-0">{{ date("$date_time->date_format", strtotime($serviceData['provider']['created_at'])) }}</p>
                            </div>
                            <div class="col-md-4 col-sm-6 mt-sm-0 mt-3">

                                <h6 class="mb-1">{{__('landingpage.complet_project')}}:</h6>
                                <p class="m-0">{{ $completed_services }} {{__('landingpage.msg_complete_project')}}</p>
                            </div>
                           
                            @if(!empty($knownLanguageArray))
                                <div class="col-md-4 mt-md-0 mt-3">
                                    <h6 class="mb-1">{{__('landingpage.languages')}}:</h6>
                                    <p class="m-0">{{ implode(', ', $knownLanguageArray) }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                @if($serviceData['serviceaddon'])
                    <div class="mt-5 pt-lg-5 pt-3">
                    <h5 class="mb-3">{{__('landingpage.Add-ons')}}</h5>
                        @foreach($serviceData['serviceaddon'] as $serviceaddon)
                            <div class="mb-4 pb-4 border-bottom d-flex align-items-sm-center aling-items-center justify-content-between flex-sm-row flex-column gap-2">
                                <div class="d-flex align-items-sm-center flex-sm-row flex-column gap-3">
                                    <div class="flex-shrink-0 provider-image-container">
                                    @if(isset($serviceaddon['serviceaddon_image']) && $serviceaddon['serviceaddon_image'])
                                        <img src="{{ $serviceaddon['serviceaddon_image'] }}" alt="service-image" class="img-fluid object-fit-cover" style="width: 100px; height:100px;">
                                    @else
                                        <img src="{{ asset('images/default.png') }}" alt="placeholder-image" class="img-fluid object-fit-cover" style="width: 100px; height:100px;">
                                    @endif
                                    </div>
                                    <div>
                                        <h5 class="text-capitalize mb-1">{{ $serviceaddon['name'] }}</h5>
                                        <h6>{{ getPriceFormat($serviceaddon['price']) }}</h6>
                                    </div>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input service-addon-checkbox" type="checkbox" value="" id="serviceaddon" data-addon-id="{{ $serviceaddon['id'] }}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
                @if($serviceData['service_detail']['price'] > 0)
                <div class="mt-5 pt-lg-5 pt-3">
                    <h5 class="mb-3 text-capitalize">{{__('landingpage.order_detail')}}</h5>
                    <div class="p-5 border rounded-3">
                        <h6 class="mb-1">{{__('messages.service')}}</h6>
                        <p class="m-0 text-capitalize">{{ $serviceData['service_detail']['name'] }}
                        </p>
                        
                        <div class="mt-5 border-top">
                            <div class="table-responsive">
                                <table class="table mb-5">
                                    <tbody>
                                        <tr>
                                            <td class="ps-0 py-2">
                                                <label class="text-capitalize"><h6>{{__('messages.price')}}</h6></label> 
                                            </td>
                                            <td class="pe-0 py-2 text-end">
                                                <h6 class="text-primary">+{{ getPriceFormat($serviceData['service_detail']['price']) }}</h6>
                                            </td>
                                        </tr>
                                        @if(!empty($serviceData['service_detail']['discount']))
                                        <tr>
                                            <td class="ps-0 py-2">
                                                <label class="text-capitalize"><h6>{{__('messages.discount')}} <span class="text-success">({{$serviceData['service_detail']['discount']}}% Off)</span></h6></label>
                                            </td>
                                            <td class="pe-0 py-2 text-end">
                                                <span class="text-success">-{{getPriceFormat($serviceData['service_detail']['price']*$serviceData['service_detail']['discount']/100)}}</span>
                                            </td>
                                        </tr>
                                        @endif
                                        <tr>
                                            <td class="ps-0 py-2">
                                                <h6 class="text-capitalize m-0">{{__('messages.Subtotal')}}</h6>
                                            </td>
                                            <td class="pe-0 py-2 text-end">

                                                <h6 class="text-primary">{{ getPriceFormat($subtotal) }}</h6>
                                            </td>
                                        </tr>
                                        @php 
                                               
                                        $total = $subtotal;
                                        @endphp

                                        @php
                                          $totalTaxAmount = 0; 
                                        @endphp

                                        @if(!empty($serviceData['taxes']))
                                            @php 
                                               
                                                foreach($serviceData['taxes'] as $tax){
                                                    if($tax['type'] == 'percent'){
                                                        $totalTaxAmount += ($subtotal * $tax['value']) / 100;
                                                    }
                                                    else {
                                                        $totalTaxAmount += $tax['value'];
                                                    }
                                                }
                                                $total = $subtotal + $totalTaxAmount;
                                            @endphp
                                          @endif
                                             
                                            <tr>
                                                <td class="ps-0 py-2">
                                                    <label class="text-capitalize"><h6>{{__('messages.tax')}}</h6></label>
                                                </td>
                                                <td class="pe-0 py-2 text-end">
                                                @if($totalTaxAmount>0)
                                                  <span class="text-danger"><i type="button" class="fa fa-info-circle text-body" aria-hidden="true" data-bs-toggle="modal" data-bs-target="#taxModal"></i> +{{getPriceFormat($totalTaxAmount)}}</span>
                                                @else
                                                  <span class="text-danger"> +{{getPriceFormat(0)}}</span>
                                                @endif
                                                </td>
                                            </tr>
                                      

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
                                                     @if(!empty($serviceData['taxes']))
                                                        @foreach($serviceData['taxes'] as $tax)
                                                            <div class="d-flex justify-content-between">
                                                                <p>{{ $tax['title'] }}</p>
                                                                @if($tax['type'] == 'percent')
                                                                    <p>{{ getPriceFormat($tax['value']*$subtotal/100) }}</p>
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

                                    </tbody>
                                </table>
                            </div>
                            <div class="text-end">
                            @if(auth()->check() && auth()->user()->user_type == 'user')
                                <a href="{{ route('book.service', ['id' => $serviceData['service_detail']['id']]) }}" class="btn btn-lg btn-primary continue-button">{{__('messages.continue')}}({{ getPriceFormat($total) }})</a>
                            @else
                                <a href="{{ route('user.login', ['service_id' =>$serviceData['service_detail']['id']]) }}" class="btn btn-lg btn-primary">{{__('messages.continue')}}({{ getPriceFormat($total) }})</a>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @if(!empty($serviceData['service_detail']['servicePackage']))
                    <div class="mt-5 pt-lg-5 pt-3">
                        <div class="row align-item-center">
                            <div class="col-sm-6">
                                <h5 class="text-capitalize">{{__('landingpage.select_service_package')}}</h5>
                            </div>
                            @if(count($serviceData['service_detail']['servicePackage']) > 3)
                                <div class="col-sm-6 mt-sm-0 mt-3 text-sm-end">
                                    <a href="{{route('service.package',['id' => $serviceData['service_detail']['id']] )}}">{{__('messages.view_all')}}</a>
                                </div>
                            @endif
                        </div>
                        <div class="mt-5">
                            <div class="position-relative overflow-hidden swiper swiper-general our-service" >
                            @auth
                                <service-package-section
                                    :servicepackage="{{ json_encode($serviceData['service_detail']['servicePackage']) }}"
                                    :service_id="{{ $serviceData['service_detail']['id'] }}"
                                    :auth_user_id="{{ auth()->id() }}"
                                ></service-package-section>
                            @else
                                <service-package-section
                                    :servicepackage="{{ json_encode($serviceData['service_detail']['servicePackage']) }}"
                                    :service_id="{{ $serviceData['service_detail']['id'] }}"
                                    :auth_user_id="null"
                                ></service-package-section>
                            @endauth
                            </div>
                        </div>
                    </div>
                @endif

                @if(!empty($serviceData['service_faq']))
                    <div class="mt-5 pt-lg-5 pt-3">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-capitalize">{{__('landingpage.any_question')}}</h5>
                            </div>
                            <div class="col-12 mt-2">
                                <div class="service-accordian accordion" id="service-accordion">
                                    @foreach($serviceData['service_faq'] as $service_faq)
                                        <div class="accordion-item">
                                            <div class="accrodion-title collapsed" data-bs-toggle="collapse" data-bs-target="#q-{{$service_faq['id']}}" aria-expanded="false" aria-controls="q-{{$service_faq['id']}}">
                                                <div class="d-flex gap-2">
                                                    <h6 class="question text-primary flex-shrink-0">Q:</h6>
                                                    <h6 class="title m-0">{{ $service_faq['title'] }}</h6>
                                                </div>
                                                <span class="icon-accrodion icon-inactive">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 448 512"><path d="M416 208H272V64c0-17.7-14.3-32-32-32h-32c-17.7 0-32 14.3-32 32v144H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h144v144c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V304h144c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z" fill="currentColor"/></svg>
                                                </span>
                                                <span class="icon-accrodion icon-active">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14" viewBox="0 0 448 512"><path d="M416 208H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z" fill="currentColor"/></svg>
                                                </span>
                                            </div>
                                            <div id="q-{{$service_faq['id']}}" class="accordion-collapse collapse" data-bs-parent="#service-accordion">
                                                <div class="accordion-body">{{ $service_faq['description'] }}</div>
                                            </div>
                                        </div>
                                    @endforeach

                                  
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if($total_ratings->isNotEmpty())
                    <div class="section-padding px-0 pb-0">
                        <div class="row align-items-center mb-5">
                            <div class="col-sm-9">
                                <h5 class="mb-0">{{ count($total_ratings) }} {{__('landingpage.reviews_for')}} {{$serviceData['service_detail']['name']}}</h5>
                            </div>
                            @if(count($total_ratings)!== 0)          
                                <div class="col-sm-3 mt-sm-0 mt-3 text-sm-end">
                                    <a href="{{route('rating.all', ['service_id' => $serviceData['service_detail']['id']])}}">{{__('messages.view_all')}}</a>
                                </div>
                            @endif
                        </div>

                        <ul class="comment-list list-inline m-0">
                            @foreach($serviceData['rating_data'] as $ratingData)
                                <li class="comment mb-5 pb-5 border-bottom">
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
                                            <div class="date text-capitalize">{{ date("$date_time->date_format", strtotime($ratingData['created_at'])) }}</div>
                                        </div>
                                        <div class="mt-4">
                                            <p class="commnet-content m-0">
                                                {{ $ratingData['review'] }}
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                @endif

                <div class="mt-5 pt-lg-5 pt-3">
                    <div class="d-flex align-items-center justify-content-between gap-3 flex-wrap">
                        <h5 class="text-capitalize">{{__('landingpage.related_services')}}</h5>
                        <a href="{{route('service.list', ['category_id' => $serviceData['service_detail']['category_id']])}}">{{__('messages.view_all')}}</a>
                     
                    </div>
                    <div class="position-relative overflow-hidden swiper swiper-general our-service" data-slide="2"
                        data-laptop="2" data-tab="2" data-mobile="1" data-mobile-sm="1" data-autoplay="true"
                        data-loop="true" data-navigation="false" data-pagination="false">
                        
                        <landing-servicedetailsection-section :service="{{ json_encode($serviceData['related_service']) }}" :user_id="{{$userId}}" :favourite="{{json_encode($favouriteServiceData)}}"></landing-servicedetailsection-section>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 ps-xxl-5 mt-lg-0 mt-5">
                <div class="bg-light p-5 rounded-3">
                    <div class="d-flex align-items-center justify-content-between gap-3 mb-3">
                        <div class="div">
                            {{-- <h5 class="font-size-14 m-0">{{$serviceData['service_detail']['name']}}</h5> --}}
                            @if($serviceData['service_detail']['price']==0)
                            <h4 class="mt-2 text-primary">Free</h4>
                            @else
                             <h4 class="mt-2 text-primary">{{ getPriceFormat($serviceData['service_detail']['price']) }}</h4>

                            @endif
                        </div>
                        <div class="flex-shrink-0">
                            @if(auth()->check() && auth()->user()->hasRole('user'))
                                @if(empty($favouriteService))
                                    <form method="POST" id="favoriteForm">
                                    @csrf

                                    <input type="hidden" name="service_id" class="service_id" value="{{ $serviceData['service_detail']['id'] }}" data-service-id="{{ $serviceData['service_detail']['id'] }}">
                                    @if(!empty(auth()->user()))
                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                    @endif
                                    
                                    <button type="button" class="btn btn-light bg-white rounded-circle serv-whishlist text-primary p-0 avatar-30 save_fav">
                                        <svg width="16" height="16" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </button>
                                    </form>
                                @else
                                    <form method="POST" id="favoriteForm">
                                    @csrf

                                    <input type="hidden" name="service_id" class="service_id" value="{{ $serviceData['service_detail']['id'] }}" data-service-id="{{ $serviceData['service_detail']['id'] }}">
                                    @if(!empty(auth()->user()))
                                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
                                    @endif
                                    <button type="button" class="btn btn-light bg-white rounded-circle serv-whishlist text-primary p-0 avatar-30 delete_fav">
                                        <svg width="16" height="16" viewBox="0 0 12 13" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                    </form>
                                @endif
                            @else
                                <form method="GET" id="favoriteForm" action="{{ route('user.login') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-light bg-white rounded-circle serv-whishlist text-primary p-0 avatar-30">
                                    <svg width="16" height="16" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    </button>
                                </form>
                            @endif


                        </div>
                    </div>
                    @if(!empty($serviceData['service_detail']['description']))
                        <p class="m-0 readmore-text">
                            {{$serviceData['service_detail']['description']}}
                        </p>
                        <a href="javascript:void(0);" class="readmore-btn">{{__('landingpage.read_more')}}</a>
                    @endif

                    <div class="mt-4 pt-4 border-top">
                        @if(auth()->check() && auth()->user()->user_type == 'user')
                            <a href="{{ route('book.service', ['id' => $serviceData['service_detail']['id']]) }}" class="btn btn-primary w-100 continue-button">{{__('messages.continue')}}</a>
                        @else
                            <a href="{{ route('user.login',['service_id' =>$serviceData['service_detail']['id']]) }}" class="btn btn-primary w-100">{{__('messages.continue')}}</a>
                        @endif
                    </div>

                </div>
                 
                @if($serviceData['service_detail']['is_slot'] == 1)
                    <div class="bg-light p-5 rounded-3 mt-5">
                        <h5 class="mb-2">{{__('landingpage.available_days')}}</h5>
                        <ul class="list-inline m-0 p-0 d-flex align-items-center gap-2 flex-wrap">
                            @foreach($serviceData['service_detail']['slots'] as $slots)
                            <li>
                                <span class="btn btn-sm btn-outline-primary text-capitalize cursor-default">{{ $slots['day'] }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="bg-light p-5 rounded-3 mt-5">
                    <h5 class="mb-2">{{__('landingpage.available_location')}}</h5>
                    <ul class="list-inline m-0 p-0 d-flex align-items-center gap-2 flex-wrap">
                        @foreach($serviceData['service_detail']['service_address_mapping'] as $service_address)
                            <li>
                                <span class="btn btn-sm btn-outline-primary text-capitalize cursor-default">{{ $service_address['provider_address_mapping']['address'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Share Modal -->
<div class="modal fade" id="share-modal" tabindex="-1" aria-labelledby="share-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-capitalize">{{__('landingpage.share_this_service')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="input-group copy-link-form">
                    <input id="copy-link-input" type="text" class="form-control copy-link-input" readonly>
                    <button id="copy-link-btn" class="btn btn-primary copy-link-btn">{{__('landingpage.copy_link')}}</button>
                </div>
                <div class="social-login mt-3">
                    <ul class="list-inline d-flex flex-wrap align-items-center justify-content-center gap-3 m-0">
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <g>
                                        <path
                                            d="M16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 11.993 2.92547 15.3027 6.75 15.9028V10.3125H4.71875V8H6.75V6.2375C6.75 4.2325 7.94438 3.125 9.77172 3.125C10.6467 3.125 11.5625 3.28125 11.5625 3.28125V5.25H10.5538C9.56 5.25 9.25 5.86672 9.25 6.5V8H11.4688L11.1141 10.3125H9.25V15.9028C13.0745 15.3027 16 11.993 16 8Z"
                                            fill="#3F53A5" />
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="17" viewBox="0 0 16 17"
                                    fill="none">
                                    <path
                                        d="M14.5377 7.19425H14.0007V7.16659H8.00065V9.83325H11.7683C11.2187 11.3856 9.74165 12.4999 8.00065 12.4999C5.79165 12.4999 4.00065 10.7089 4.00065 8.49992C4.00065 6.29092 5.79165 4.49992 8.00065 4.49992C9.02032 4.49992 9.94798 4.88459 10.6543 5.51292L12.54 3.62725C11.3493 2.51759 9.75665 1.83325 8.00065 1.83325C4.31898 1.83325 1.33398 4.81825 1.33398 8.49992C1.33398 12.1816 4.31898 15.1666 8.00065 15.1666C11.6823 15.1666 14.6673 12.1816 14.6673 8.49992C14.6673 8.05292 14.6213 7.61659 14.5377 7.19425Z"
                                        fill="#FFC107" />
                                    <path
                                        d="M2.10156 5.39692L4.2919 7.00325C4.88456 5.53592 6.3199 4.49992 7.99956 4.49992C9.01923 4.49992 9.9469 4.88459 10.6532 5.51292L12.5389 3.62725C11.3482 2.51759 9.75556 1.83325 7.99956 1.83325C5.4389 1.83325 3.21823 3.27892 2.10156 5.39692Z"
                                        fill="#FF3D00" />
                                    <path
                                        d="M7.99945 15.1667C9.72145 15.1667 11.2861 14.5077 12.4691 13.436L10.4058 11.69C9.73645 12.197 8.90445 12.5 7.99945 12.5C6.26545 12.5 4.79312 11.3943 4.23845 9.85132L2.06445 11.5263C3.16779 13.6853 5.40845 15.1667 7.99945 15.1667Z"
                                        fill="#4CAF50" />
                                    <path
                                        d="M14.537 7.19441H14V7.16675H8V9.83341H11.7677C11.5037 10.5791 11.024 11.2221 10.4053 11.6904C10.4057 11.6901 10.406 11.6901 10.4063 11.6897L12.4697 13.4357C12.3237 13.5684 14.6667 11.8334 14.6667 8.50008C14.6667 8.05308 14.6207 7.61675 14.537 7.19441Z"
                                        fill="#1976D2" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                    fill="none">
                                    <g>
                                        <path
                                            d="M16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 11.993 2.92547 15.3027 6.75 15.9028V10.3125H4.71875V8H6.75V6.2375C6.75 4.2325 7.94438 3.125 9.77172 3.125C10.6467 3.125 11.5625 3.28125 11.5625 3.28125V5.25H10.5538C9.56 5.25 9.25 5.86672 9.25 6.5V8H11.4688L11.1141 10.3125H9.25V15.9028C13.0745 15.3027 16 11.993 16 8Z"
                                            fill="#3F53A5" />
                                    </g>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('after_script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
<script>
    $(document).ready(function() {
        $('.service-addon-checkbox').on('change', function() {
            updateContinueButtonHref();
        });

        function updateContinueButtonHref() {
            var selectedAddonIds = $('.service-addon-checkbox:checked').map(function() {
                return $(this).data('addon-id');
            }).get();

            var baseUrl = `{{ route('book.service', ['id' => $serviceData['service_detail']['id']]) }}`;

            var updatedHref = baseUrl + '&addons=' + selectedAddonIds.join(',');

            $('.continue-button').attr('href', updatedHref);
        }
        const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
    $('.save_fav').off('click').on('click', function () {

       const form = $(this).closest('form');

       const serviceId = form.find('.service_id').data('service-id');
       const userId = $('#user_id').val();

       $.ajax({
            url: baseUrl + '/api/save-favourite',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                service_id: serviceId,
                user_id: userId,
            },
            success: function (response) {
               Swal.fire({
               title: 'Done',
               text: response.message,
               icon: 'success',
               iconColor: '#5F60B9'
               }).then((result) => {
                  if (result.isConfirmed) {
                     window.location.reload();
                  }
               })
            },
            error: function (error) {
                console.error('Error:', error);
            }
        });
    });

    $('.delete_fav').off('click').on('click', function () {
       const form = $(this).closest('form');

       const serviceId = form.find('.service_id').data('service-id');
       const userId = $('#user_id').val();

       $.ajax({
            url: baseUrl + '/api/delete-favourite',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                service_id: serviceId,
                user_id: userId,
            },
            success: function (response) {
               Swal.fire({
               title: 'Done',
               text: response.message,
               icon: 'success',
               iconColor: '#5F60B9'
               }).then((result) => {
                  if (result.isConfirmed) {
                     window.location.reload();
                  }
               })
            },
            error: function (error) {
                console.error('Error', error);
            }
        });
    });
    });

    document.addEventListener("DOMContentLoaded", function() {
        var description = document.querySelector('.readmore-text');
        var readmoreBtn = document.querySelector('.readmore-btn');

        if (description.offsetHeight < description.scrollHeight) {
            readmoreBtn.style.display = 'block';
        } else {
            readmoreBtn.style.display = 'none';
        }
    });

   
</script>

@endsection