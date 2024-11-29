<div class="bg-light padding-50 rounded-3 position-relative mb-5">
   <div class="row align-items-center">
      <div class="col-lg-4">
         @if(!isset($data->bookingPackage))
            <img src="{{ $serviceimage }}" alt="booking" class="img-fluid rounded-3 object-cover w-100 booking-img">
         @else
            <img src="{{ $data->bookingPackage->package->getFirstMedia('package_attachment')->getUrl() }}" alt="booking" class="img-fluid rounded-3 object-cover w-100 booking-img">
         @endif
      </div>
      <div class="col-lg-8 mt-5 mt-lg-0">
         <h5 class="booking-title text-capitalize line-count-1">
            @if(!isset($data->bookingPackage))
               <a href="{{ route('booking.detail', $data->id) }}">#{{$data->id}} {{($data->service)->name}}</a>
            @else
               <a href="{{ route('booking.detail', $data->id) }}">#{{$data->id}} {{($data->bookingPackage)->name}}</a>
            @endif
         </h5>
         <div class="d-flex align-items-center gap-1 mt-3">
            <div class="ratting d-flex gap-1 align-items-center">
               @php $rating = round($total_rating, 1); @endphp
      
               @foreach(range(1,5) as $i)                                               
                  <span class="fa-stack" style="width:1em">
                        <i class="far fa-star fa-stack-1x"></i>
                        @if($rating >0)
                        @if($rating >0.5)
                        <i class="fas fa-star fa-stack-1x"></i>
                        @else
                        <i class="fas fa-star-half fa-stack-1x"></i>
                        @endif
                        @endif
                        @php $rating--; @endphp
                  </span>                                                
               @endforeach
               <!-- <rating-component :readonly="true" :showrating="false" :ratingvalue="{{$total_rating}}" /> -->
            </div>
            <h6 class="font-size-14">({{ round($total_rating,1) }})</h6>
         </div>
         <div class="booking-date bg-primary-subtle text-primary font-size-14 d-flex align-items-center gap-1 position-absolute top-0">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="15" viewBox="0 0 14 15" fill="none">
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M12.7772 6.10303H0.894531C0.618531 6.10303 0.394531 5.87903 0.394531 5.60303C0.394531 5.32703 0.618531 5.10303 0.894531 5.10303H12.7772C13.0532 5.10303 13.2772 5.32703 13.2772 5.60303C13.2772 5.87903 13.0532 6.10303 12.7772 6.10303Z"
                  fill="currentColor" />
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M9.80052 8.70654C9.52452 8.70654 9.29785 8.48254 9.29785 8.20654C9.29785 7.93054 9.51852 7.70654 9.79452 7.70654H9.80052C10.0765 7.70654 10.3005 7.93054 10.3005 8.20654C10.3005 8.48254 10.0765 8.70654 9.80052 8.70654Z"
                  fill="currentColor" />
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M6.84251 8.70654C6.56651 8.70654 6.33984 8.48254 6.33984 8.20654C6.33984 7.93054 6.56051 7.70654 6.83651 7.70654H6.84251C7.11851 7.70654 7.34251 7.93054 7.34251 8.20654C7.34251 8.48254 7.11851 8.70654 6.84251 8.70654Z"
                  fill="currentColor" />
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M3.87736 8.70654C3.60136 8.70654 3.37402 8.48254 3.37402 8.20654C3.37402 7.93054 3.59536 7.70654 3.87136 7.70654H3.87736C4.15336 7.70654 4.37736 7.93054 4.37736 8.20654C4.37736 8.48254 4.15336 8.70654 3.87736 8.70654Z"
                  fill="currentColor" />
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M9.80052 11.2976C9.52452 11.2976 9.29785 11.0736 9.29785 10.7976C9.29785 10.5216 9.51852 10.2976 9.79452 10.2976H9.80052C10.0765 10.2976 10.3005 10.5216 10.3005 10.7976C10.3005 11.0736 10.0765 11.2976 9.80052 11.2976Z"
                  fill="currentColor" />
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M6.84251 11.2976C6.56651 11.2976 6.33984 11.0736 6.33984 10.7976C6.33984 10.5216 6.56051 10.2976 6.83651 10.2976H6.84251C7.11851 10.2976 7.34251 10.5216 7.34251 10.7976C7.34251 11.0736 7.11851 11.2976 6.84251 11.2976Z"
                  fill="currentColor" />
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M3.87736 11.2976C3.60136 11.2976 3.37402 11.0736 3.37402 10.7976C3.37402 10.5216 3.59536 10.2976 3.87136 10.2976H3.87736C4.15336 10.2976 4.37736 10.5216 4.37736 10.7976C4.37736 11.0736 4.15336 11.2976 3.87736 11.2976Z"
                  fill="currentColor" />
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M9.52832 3.36075C9.25232 3.36075 9.02832 3.13675 9.02832 2.86075V0.666748C9.02832 0.390748 9.25232 0.166748 9.52832 0.166748C9.80432 0.166748 10.0283 0.390748 10.0283 0.666748V2.86075C10.0283 3.13675 9.80432 3.36075 9.52832 3.36075Z"
                  fill="currentColor" />
               <path fill-rule="evenodd" clip-rule="evenodd"
                  d="M4.14355 3.36075C3.86755 3.36075 3.64355 3.13675 3.64355 2.86075V0.666748C3.64355 0.390748 3.86755 0.166748 4.14355 0.166748C4.41955 0.166748 4.64355 0.390748 4.64355 0.666748V2.86075C4.64355 3.13675 4.41955 3.36075 4.14355 3.36075Z"
                  fill="currentColor" />
               <mask id="mask0_952_171" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="1"
                  width="14" height="14">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                     d="M0.333008 1.21948H13.333V14.5001H0.333008V1.21948Z" fill="white" />
               </mask>
               <g mask="url(#mask0_952_171)">
                  <path fill-rule="evenodd" clip-rule="evenodd"
                     d="M4.01367 2.21948C2.28501 2.21948 1.33301 3.14148 1.33301 4.81548V10.8481C1.33301 12.5588 2.28501 13.5001 4.01367 13.5001H9.65234C11.381 13.5001 12.333 12.5761 12.333 10.8988V4.81548C12.3357 3.99215 12.1143 3.35215 11.675 2.91215C11.223 2.45882 10.5263 2.21948 9.65834 2.21948H4.01367ZM9.65234 14.5001H4.01367C1.74367 14.5001 0.333008 13.1008 0.333008 10.8481V4.81548C0.333008 2.59682 1.74367 1.21948 4.01367 1.21948H9.65834C10.7977 1.21948 11.7397 1.56082 12.383 2.20548C13.0077 2.83282 13.3363 3.73482 13.333 4.81682V10.8988C13.333 13.1201 11.9223 14.5001 9.65234 14.5001Z"
                     fill="#5F60B9" />
               </g>
            </svg>
            @php
            $sitesetup = App\Models\Setting::where('type','site-setup')->where('key', 'site-setup')->first();
            $datetime = $sitesetup ? json_decode($sitesetup->value) : null;
            @endphp
            <span class="text-capitalize font-size-14 fw-500">{{date("$datetime->date_format / $datetime->time_format", strtotime($data->date))}}</span>
         </div>
         <div class="row mt-5">
            <div class="col-lg-6 col-md-5">
               <h6 class="font-size-18 text-capitalize mb-3">{{__('landingpage.booking_detail')}}</h6>
               <ul class="list-inline m-0">
                  <li class="mb-2">
                     <span class="d-flex gap-3">
                        <span class="d-inline-block w-25 fw-bold">{{__('landingpage.location')}}:</span>
                        <span class="d-inline-block w-75">{{$data->address}}</span>
                     </span>
                  </li>
                  <li class="mb-2">
                     <span class="d-flex gap-3">
                        <span class="d-inline-block w-25 fw-bold">{{__('landingpage.provider')}}:</span>
                        <span class="d-inline-block w-75">{{($data->provider)->display_name}}</span>
                     </span>
                  </li>
                  <li>
                     <span class="d-flex gap-3">
                        <span class="d-inline-block w-25 fw-bold">{{__('messages.status')}}:</span>
                        <span class="d-inline-block w-75 status-text text-success text-capitalize">{{str_replace("_"," ",$data->status) ?? '-'}}</span>
                     </span>
                  </li>
               </ul>
            </div>
            @if($data->total_amount > 0)

            <div class="col-lg-2 col-md-2 position-relative d-none d-md-block">
               <div class="vr h-100 position-absolute start-50"></div>
            </div>
            <div class="col-lg-4 col-md-5 mt-5 mt-md-0">
               <h6 class="font-size-18 text-capitalize mb-3">{{__('landingpage.payment_detail')}}</h6>
               <ul class="list-inline m-0">
                  <li class="mb-2">
                     <span class="d-flex gap-3">
                        <span class="d-inline-block w-25 fw-bold">{{__('landingpage.total')}}:</span>
                        <span class="d-inline-block w-75">{{getPriceFormat($data->total_amount)}}</span>
                     </span>
                  </li>
                  <li class="mb-2">
                     <span class="d-flex gap-3">
                        <span class="d-inline-block w-25 fw-bold">{{__('messages.method')}}:</span>
                        <span class="d-inline-block w-75 text-capitalize">{{ optional($data->payment)->payment_type ?? '-' }}</span>
                     </span>
                  </li>
                  <li>
                     <span class="d-flex gap-3">
                        <span class="d-inline-block w-25 fw-bold">{{__('messages.status')}}:</span>
                        @if(!empty($data->payment))
                           <span class="d-inline-block w-75 status-text text-success text-capitalize">{{ str_replace("_"," ",optional($data->payment)->payment_status) ?? '-' }}</span>
                        @else
                           <span class="d-inline-block w-75 status-text text-success text-capitalize">Pending</span>
                        @endif
                     </span>
                  </li>
               </ul>
            </div>
            @endif
         </div>
      </div>
   </div>
</div>
