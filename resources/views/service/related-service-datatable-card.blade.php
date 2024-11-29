@extends('landing-page.layouts.default')

@section('content')
<div class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12">
@php
$serviceData = json_decode($service->content(), true);
@endphp

    <div class="iq-image position-relative">
        @foreach ($serviceData['related_service'] as $relatedService)
        <a href="#" class="service-img">
            <img src="{{ $relatedService['attchments'][0] }}" alt="service"
            class="service-img w-100 object-cover img-fluid rounded-3">
        </a>
    </div>
    <div
       class="d-flex align-items-start align-items-md-center justify-content-between mt-4 flex-column flex-sm-row flex-sm-wrap gap-2">
       <a href="#" class="service-heading">
        <h5 class="service-heading service-title font-size-18 line-count-2">{{ $relatedService['name'] }}</h5>
     </a>
       {{-- <div class="d-flex align-items-center gap-2">
          <img src="{{ getSingleMedia($data->providers,'profile_image', null) }}" alt="service" class="img-fluid rounded-3 object-cover avatar-24">
          <a href="{{ route('provider.detail', ($data->providers)->id) }}">
             <span class="font-size-14 service-user-name">{{ ($data->providers)->display_name }}</span>
          </a>
       </div> --}}
       {{-- <div class="d-flex align-items-center gap-1 f-none">
          <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"
             class="service-rating">
             <path
                d="M6.58578 0.85525L7.92167 3.44562C8.02009 3.63329 8.20793 3.76362 8.42458 3.79259L11.4252 4.21427C11.6005 4.23802 11.7595 4.32723 11.8669 4.46335C11.9731 4.59773 12.0187 4.76803 11.9929 4.93543C11.9719 5.07445 11.9041 5.20304 11.8003 5.30151L9.62603 7.33523C9.467 7.47714 9.39498 7.68741 9.43339 7.89304L9.96871 10.7522C10.0257 11.0974 9.78867 11.4229 9.43339 11.4884C9.28696 11.511 9.13693 11.4872 9.0049 11.4224L6.32833 10.0768C6.12968 9.98005 5.89503 9.98005 5.69639 10.0768L3.01982 11.4224C2.69094 11.5909 2.28346 11.4762 2.10042 11.1634C2.0326 11.0389 2.0086 10.897 2.0308 10.7585L2.56612 7.89883C2.60453 7.69378 2.53191 7.48236 2.37348 7.34044L0.19921 5.30788C-0.0594455 5.06692 -0.0672472 4.67014 0.181806 4.42048C0.187207 4.41527 0.193209 4.40948 0.19921 4.40369C0.302432 4.30232 0.438061 4.23802 0.584493 4.22123L3.58514 3.79896C3.80118 3.76942 3.98902 3.64025 4.08805 3.45141L5.37592 0.85525C5.49055 0.632821 5.7282 0.494383 5.98625 0.500175H6.06667C6.29052 0.526241 6.48556 0.660046 6.58578 0.85525Z"
                fill="currentColor" />
          </svg>
          <h6 class="font-size-14">{{$totalRating }}
             <a href="#" class="text-body ms-1">({{$totalReviews }} {{__('messages.reviews')}})</a></h6>
       </div> --}}
    {{-- </div>
    <a href="{{ route('service.detail', $data->id) }}" class="service-heading">
       <h5 class="service-heading service-title font-size-18 line-count-2">{{ $data->name }}</h5>
    </a>
    <ul class="list-inline p-0 m-0 price-content">
       <li class="text-primary fw-500 d-inline-block position-relative font-size-18">{{ getPriceFormat($data->price) }}</li>
       <li class="d-inline-block fw-500 position-relative service-price">({{ $data->duration }} min)</li>
    </ul> --}}
    @endforeach
 </div>

</div>
</div>
</div>
</div>

@endsection

 
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
 <script>
    $(document).ready(function () {
    
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
 
     $('.service-heading, .service-img').on('click', function (e) {
     e.preventDefault();
     var serviceId = $(this).closest('.service-box-card').data('service-id');
 
     // Local Storage
     var storedServiceIds = JSON.parse(localStorage.getItem('recentlyViewed')) || [];
     if (!storedServiceIds.includes(serviceId)) {
         storedServiceIds.unshift(serviceId);
         storedServiceIds = storedServiceIds.slice(0, 10);
         localStorage.setItem('recentlyViewed', JSON.stringify(storedServiceIds));
     }
 
     // Laravel Session
     $.ajax({
         url: '/save-recently-viewed/' + serviceId,
         type: 'POST',
         data: {
             _token: '{{ csrf_token() }}',
         },
         success: function (response) {
             console.log(response);
         },
         error: function (error) {
             console.error('Error storing recently viewed service:', error);
         }
     });
 
     window.location.href = $(this).attr('href');
 });
 });
 </script>