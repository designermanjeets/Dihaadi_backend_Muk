@extends('landing-page.layouts.default')


@section('content')

<div class="section-padding position-relative px-0">
    <div class="container">
      <div class="row">
         <div class="col-lg-4">
            <div class="sticky">
               <div class="position-relative bg-primary p-5 provider-profile-card">
                  <div class="position-absolute start-0 top-0 h-100 w-100">
                     <img src="{{ asset('landing-images/Vector-bg-1.png') }}"class="img-fluid h-100 w-100" alt="image">
                  </div>
                  <div class="mt-3 text-center position-relative">
                     <img src="{{ $handymanData['data']['profile_image'] }}" alt="provider"
                         class="avatar-180 img-fluid rounded-circle object-cover border border-5 border-white">
                     <div class="d-flex align-items-center justify-content-center gap-2 mt-3">
                        <h5 class="m-0 text-white text-capitalize">{{ $handymanData['data']['display_name'] }}</h5>
                        <span class="text-primary">
                           <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path
                                 d="M21.1871 10.507C20.8623 10.3182 20.5705 10.0777 20.3231 9.795C20.3481 9.40141 20.4418 9.01525 20.6001 8.654C20.8911 7.833 21.2201 6.903 20.6921 6.18C20.1641 5.457 19.1671 5.48 18.2921 5.5C17.9054 5.53978 17.5148 5.5134 17.1371 5.422C16.9358 5.09451 16.7921 4.73498 16.7121 4.359C16.4641 3.514 16.1811 2.559 15.3121 2.273C14.4741 2.003 13.6981 2.597 13.0121 3.119C12.7161 3.38932 12.3731 3.60317 12.0001 3.75C11.6232 3.60437 11.2764 3.39046 10.9771 3.119C10.2931 2.6 9.52007 2 8.67807 2.274C7.81107 2.556 7.52807 3.514 7.27807 4.359C7.1982 4.73376 7.05588 5.09243 6.85707 5.42C6.47859 5.51116 6.0875 5.5382 5.70007 5.5C4.82207 5.476 3.83307 5.45 3.30007 6.18C2.76707 6.91 3.10007 7.833 3.39207 8.653C3.55251 9.01371 3.64765 9.40003 3.67307 9.794C3.42615 10.0771 3.13464 10.3179 2.81007 10.507C2.07807 11.007 1.24707 11.576 1.24707 12.5C1.24707 13.424 2.07807 13.991 2.81007 14.493C3.13457 14.6818 3.42607 14.9223 3.67307 15.205C3.65033 15.5988 3.55789 15.9855 3.40007 16.347C3.11007 17.167 2.78207 18.097 3.30907 18.82C3.83607 19.543 4.83007 19.52 5.70907 19.5C6.09604 19.4602 6.48696 19.4866 6.86507 19.578C7.06545 19.9058 7.20881 20.2653 7.28907 20.641C7.53707 21.486 7.82007 22.441 8.68907 22.727C8.82839 22.7717 8.97376 22.7946 9.12007 22.795C9.82328 22.6941 10.4769 22.3743 10.9881 21.881C11.2841 21.6107 11.6271 21.3968 12.0001 21.25C12.377 21.3956 12.7238 21.6095 13.0231 21.881C13.7081 22.404 14.4841 23.001 15.3231 22.726C16.1901 22.444 16.4731 21.486 16.7231 20.642C16.8032 20.2665 16.9466 19.9074 17.1471 19.58C17.5241 19.4882 17.914 19.4612 18.3001 19.5C19.1781 19.521 20.1671 19.55 20.7001 18.82C21.2331 18.09 20.9001 17.167 20.6081 16.346C20.4487 15.9856 20.3536 15.6001 20.3271 15.207C20.5741 14.9237 20.866 14.6828 21.1911 14.494C21.9231 13.994 22.7541 13.424 22.7541 12.5C22.7541 11.576 21.9201 11.008 21.1871 10.507Z"
                                 fill="#EFEFF8" />
                              <path
                                 d="M11.0001 15.25C10.9016 15.2502 10.804 15.2308 10.7131 15.1931C10.6221 15.1553 10.5395 15.0999 10.4701 15.03L8.47009 13.03C8.33761 12.8878 8.26549 12.6998 8.26892 12.5055C8.27234 12.3112 8.35106 12.1258 8.48847 11.9884C8.62588 11.851 8.81127 11.7723 9.00557 11.7688C9.19987 11.7654 9.38792 11.8375 9.53009 11.97L11.0701 13.51L14.5501 10.9C14.7092 10.7807 14.9092 10.7294 15.1062 10.7575C15.3031 10.7857 15.4807 10.8909 15.6001 11.05C15.7194 11.2091 15.7707 11.4092 15.7426 11.6061C15.7144 11.803 15.6092 11.9807 15.4501 12.1L11.4501 15.1C11.3202 15.1973 11.1624 15.2499 11.0001 15.25Z"
                                 fill="currentColor" />
                           </svg>
                        </span>
                     </div>
                     <div class="d-flex align-items-center justify-content-center gap-1 mt-2">
                        <div>
                           <rating-component :readonly="true" :showrating="false" :ratingvalue="{{ $handymanData['data']['handyman_rating'] }}" />
                        </div>
                        <h6 class="h6 text-white">{{ $handymanData['data']['handyman_rating'] }} ({{ $total_handyman_rating }} {{__('messages.reviews')}})</h6>
                     </div>
                     @if(isset($why_choose_me))
                     <div class="mt-2">
                        <a href="javascipt:void(0);" class="btn btn-primary fw-bold" data-bs-toggle="modal" data-bs-target="#chooseme">{{__('landingpage.why_choose_me')}}</a>
                     </div>
                     @endif
                     <div class="table-responsive mt-5">
                        <table class="table table-borderless text-start mb-0">
                           <tbody>
                              <tr>
                                 <td class="px-0">
                                    <h6 class="text-white m-0 lh-base">{{__('auth.email')}}:</h6>
                                 </td>
                                 <td class="text-end pe-0">
                                    <a href="mailto:{{$handymanData['data']['email']}}" class="text-white">{{ $handymanData['data']['email'] }}</a>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="px-0">
                                    <h6 class="text-white m-0 lh-base">{{__('landingpage.projects')}}:</h6>
                                 </td>
                                 <td class="text-end pe-0">
                                    <span class="text-white">{{ $completed_services }} {{__('landingpage.project_completed')}}</span>
                                 </td>
                              </tr>
                              <tr>
                                 <td class="px-0">
                                    <h6 class="text-white m-0 lh-base">{{__('messages.customer')}}:</h6>
                                 </td>
                                 <td class="text-end pe-0">
                                    <span class="text-white">{{ $satisfy_customers }} {{__('landingpage.satisfy_customers')}}</span>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-8 mt-lg-0 mt-5">
            <h3 class="text-capitalize mb-3">{{__('landingpage.handyman_personal_info')}}</h3>
            <p class="mt-0 mb-3">
               {{ $handymanData['data']['description'] }}
            </p>
            <div class="table-responsive mt-5 mb-5">
               <table class="table text-start mb-0">
                  <tbody>
                     <tr>
                        <td class="py-3 px-0 border-top border-bottom">
                           <h5 class="m-0 text-capitalize font-size-18">{{__('landingpage.member_since')}}</h5>
                        </td>
                        <td class="py-3 border-top border-bottom">
                           <span class="font-size-18">{{ date("$datetime->date_format", strtotime($handymanData['data']['created_at'] )) }}</span>
                        </td>
                     </tr>
                     @if(!empty($handymanData['data']['known_languages']))
                     <tr>
                        <td class="py-3 px-0 border-bottom">
                           <h5 class="m-0 text-capitalize font-size-18">{{__('landingpage.languages')}}</h5>
                        </td>
                        <td class="py-3 border-bottom">
                           <span class="font-size-18">{{ implode(', ', json_decode($handymanData['data']['known_languages'])) }}</span>
                        </td>
                     </tr>
                     @endif
                     
                  </tbody>
               </table>
            </div>

            <div class="row align-items-center">
                  <div class="col-sm-9">
                     <h4 class="mb-5 mt-5">{{ $total_handyman_rating }} {{__('landingpage.reviews_for')}} {{$handymanData['data']['display_name']}}</h4>
                  </div>
                  @if($total_handyman_rating !== 0)          
                     <div class="col-sm-3 mt-sm-0 mt-3 text-sm-end">
                        <a href="{{route('rating.all', ['handyman_id' => $handymanData['data']['id']])}}">{{__('messages.view_all')}}</a>
                     </div>
                  @endif
            </div>

             <ul class="comment-list list-inline m-0">
             @php $counter=1; @endphp
             @foreach($handyman_rating as $ratingData)
               @if($counter <= 10)
                  <li class="comment mb-5 pb-5 border-bottom">
                     <div class="comment-box">
                        <div
                              class="d-flex align-items-sm-center align-items-start flex-sm-row flex-column justify-content-between gap-3">
                              <div
                                 class="d-inline-flex align-items-sm-center align-items-start flex-sm-row flex-column gap-3">
                                 <div class="user-image flex-shrink-0">
                                    <img src="{{ getSingleMedia($ratingData->customer, 'profile_image',null) }}"
                                          class="avatar-70 object-cover rounded-circle" alt="comment-user" />
                                 </div>
                                 <div class="comment-user-info">
                                    <h6 class="font-size-18 text-capitalize mb-2">{{ $ratingData->customer->display_name }}</h6>
                                    <span class="text-primary">
                                          <rating-component :readonly = true :showrating ="false" :ratingvalue="{{ $ratingData['rating'] }}" />
                                    </span>
                                 </div>
                              </div>
                              <div class="date text-capitalize">{{ date("$datetime->date_format", strtotime($ratingData['created_at'])) }}</div>
                        </div>
                        <div class="mt-4">
                              <p class="commnet-content m-0">
                                 {{ $ratingData['review'] }}
                              </p>
                        </div>
                     </div>
                  </li>
               @endif
               @php $counter++; @endphp
             @endforeach
             </ul>
            

         </div>
      </div>
    </div>
   
 </div>
 <!-- Modal -->
<div class="modal fade" id="chooseme" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content overflow-visible">
         <span class="text-primary custom-btn-close" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="41" viewBox="0 0 40 41" fill="none">
               <rect x="12" y="11.8381" width="17" height="17" fill="white"></rect>
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M12.783 4.17017H27.233C32.883 4.17017 36.6663 8.13683 36.6663 14.0368V27.6552C36.6663 33.5385 32.883 37.5035 27.233 37.5035H12.783C7.13301 37.5035 3.33301 33.5385 3.33301 27.6552V14.0368C3.33301 8.13683 7.13301 4.17017 12.783 4.17017ZM25.0163 25.8368C25.583 25.2718 25.583 24.3552 25.0163 23.7885L22.0497 20.8218L25.0163 17.8535C25.583 17.2885 25.583 16.3552 25.0163 15.7885C24.4497 15.2202 23.533 15.2202 22.9497 15.7885L19.9997 18.7535L17.033 15.7885C16.4497 15.2202 15.533 15.2202 14.9663 15.7885C14.3997 16.3552 14.3997 17.2885 14.9663 17.8535L17.933 20.8218L14.9663 23.7718C14.3997 24.3552 14.3997 25.2718 14.9663 25.8368C15.2497 26.1202 15.633 26.2718 15.9997 26.2718C16.383 26.2718 16.7497 26.1202 17.033 25.8368L19.9997 22.8885L22.9663 25.8368C23.2497 26.1385 23.6163 26.2718 23.983 26.2718C24.3663 26.2718 24.733 26.1202 25.0163 25.8368Z"
                  fill="currentColor">
               </path>
            </svg>
         </span>
         @if(isset($why_choose_me))
         <div class="modal-body">
            <h6 class="text-capitalize mb-2">{{__('landingpage.why_choose_me_title')}}</h6>
            <p class="m-0">
               {{$why_choose_me['about_description']}}
            </p>
            <h6 class="mt-3">Reasons</h6>
            <ul class="list-inline mt-2 mb-0 p-0">
               @foreach($why_choose_me['reason'] as $reason)
               <li>
                  <div class="d-flex gap-2">
                     <span class="text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                           <g>
                              <path d="M5.5 8.5L7 10L10.5 6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                 stroke-linejoin="round"></path>
                              <path
                                 d="M8 14C11.3137 14 14 11.3137 14 8C14 4.68629 11.3137 2 8 2C4.68629 2 2 4.68629 2 8C2 11.3137 4.68629 14 8 14Z"
                                 stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                           </g>
                        </svg>
                     </span>
                     <span>{{ $reason }}</span>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
         @endif
      </div>
   </div>
</div>
@endsection
