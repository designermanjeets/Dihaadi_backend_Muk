<div class="service-box-card bg-light rounded-3 mb-5" data-service-id="{{ $data->id }}">
   <div class="iq-image position-relative">
      @if($data->visit_type == 'ONLINE')
         <span class="online-service"></span>
      @endif
      <a href="{{ route('service.detail', $data->id) }}" class="service-img">
         <img src="{{ getSingleMedia($data,'service_attachment', null) }}" alt="service"
         class="service-img w-100 object-cover img-fluid rounded-3"> 
      </a>

      @if(auth()->check() && auth()->user()->hasRole('user'))

         @if($favouriteService->isEmpty())
            <form method="POST" id="favoriteForm">
               @csrf

               <input type="hidden" name="service_id" class="service_id" value="{{ $data->id }}" data-service-id="{{ $data->id }}">
               @if(!empty(auth()->user()))
                  <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
               @endif
               <button type="button" class="btn-link serv-whishlist text-primary save_fav">
                  <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                     <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
               </button>
            </form>
         @else
            <form method="POST" id="favoriteForm">
               @csrf

               <input type="hidden" name="service_id" class="service_id" value="{{ $data->id }}" data-service-id="{{ $data->id }}">
               @if(!empty(auth()->user()))
                  <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
               @endif
               <button type="button" class="btn-link serv-whishlist text-primary delete_fav">
                  <svg width="12" height="13" viewBox="0 0 12 13" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                     <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                     <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
               </button>
            </form>
         @endif
      @else
         <form method="GET" id="favoriteForm" action="{{ route('user.login') }}">
            @csrf
            <button type="submit" class="btn-link serv-whishlist text-primary">
               <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M1.43593 6.29916C0.899433 4.62416 1.52643 2.70966 3.28493 2.14316C4.20993 1.84466 5.23093 2.02066 5.99993 2.59916C6.72743 2.03666 7.78593 1.84666 8.70993 2.14316C10.4684 2.70966 11.0994 4.62416 10.5634 6.29916C9.72843 8.95416 5.99993 10.9992 5.99993 10.9992C5.99993 10.9992 2.29893 8.98516 1.43593 6.29916Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M8 3.84998C8.535 4.02298 8.913 4.50048 8.9585 5.06098" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
            </button>
         </form>
      @endif

   </div>
   <a href="{{ route('service.detail', $data->id) }}" class="service-heading mt-4 d-block p-0">
      <h5 class="service-heading service-title font-size-18 line-count-2">{{ $data->name }}</h5>
   </a>
   <ul class="list-inline p-0 mt-0 mb-0 price-content">
   @if($data->price==0)
      <li class="text-primary fw-500 d-inline-block position-relative font-size-18">Free</li>
      @else
 <li class="text-primary fw-500 d-inline-block position-relative font-size-18">{{ getPriceFormat($data->price) }}</li>
      @endif
      @if(!empty($data->duration))
      @php
         $durationParts = explode(':', $data->duration);
         $hours = intval($durationParts[0]);
         $minutes = intval($durationParts[1]);
      @endphp
      <li class="d-inline-block fw-500 position-relative service-price">
         <!-- ({{ $data->duration }} min) -->
         @if($hours > 0)
            ({{ $hours }} hrs @if($minutes > 0) {{ $minutes }} min @endif)
         @else
            ({{ $minutes }} min)
         @endif
      </li>
      @endif
   </ul>
   <div
      class="mt-3">
      <div class="d-flex align-items-center gap-2">
         <img src="{{ getSingleMedia($data->providers,'profile_image', null) }}" alt="service" class="img-fluid rounded-3 object-cover avatar-24">
         <a href="{{ route('provider.detail', ($data->providers)->id) }}">
            <span class="font-size-14 service-user-name">{{ ($data->providers)->display_name }}</span>
         </a>
      </div>
      <div class="d-flex align-items-center gap-1 f-none mt-2">
         @if($totalRating > 0)
         <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none"
            class="service-rating">
            <path
               d="M6.58578 0.85525L7.92167 3.44562C8.02009 3.63329 8.20793 3.76362 8.42458 3.79259L11.4252 4.21427C11.6005 4.23802 11.7595 4.32723 11.8669 4.46335C11.9731 4.59773 12.0187 4.76803 11.9929 4.93543C11.9719 5.07445 11.9041 5.20304 11.8003 5.30151L9.62603 7.33523C9.467 7.47714 9.39498 7.68741 9.43339 7.89304L9.96871 10.7522C10.0257 11.0974 9.78867 11.4229 9.43339 11.4884C9.28696 11.511 9.13693 11.4872 9.0049 11.4224L6.32833 10.0768C6.12968 9.98005 5.89503 9.98005 5.69639 10.0768L3.01982 11.4224C2.69094 11.5909 2.28346 11.4762 2.10042 11.1634C2.0326 11.0389 2.0086 10.897 2.0308 10.7585L2.56612 7.89883C2.60453 7.69378 2.53191 7.48236 2.37348 7.34044L0.19921 5.30788C-0.0594455 5.06692 -0.0672472 4.67014 0.181806 4.42048C0.187207 4.41527 0.193209 4.40948 0.19921 4.40369C0.302432 4.30232 0.438061 4.23802 0.584493 4.22123L3.58514 3.79896C3.80118 3.76942 3.98902 3.64025 4.08805 3.45141L5.37592 0.85525C5.49055 0.632821 5.7282 0.494383 5.98625 0.500175H6.06667C6.29052 0.526241 6.48556 0.660046 6.58578 0.85525Z"
               fill="currentColor" />
         </svg>
         <h6 class="font-size-14">{{ round($totalRating, 1) }}
            @if($totalReviews>1)
              <a href="{{ route('rating.all', ['service_id' => $data->id]) }}" class="text-body ms-1">({{$totalReviews }} {{__('messages.reviews')}})</a></h6>
            @else
              <a href="{{ route('rating.all', ['service_id' => $data->id]) }}" class="text-body ms-1">({{$totalReviews }} {{__('messages.review')}})</a></h6>
            @endif
         @endif
      </div>
   </div>
</div>

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
                     $('#datatable').DataTable().ajax.reload();
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
                     $('#datatable').DataTable().ajax.reload();
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
        url: baseUrl + '/save-recently-viewed/' + serviceId,
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
        },
        success: function (response) {
            return response;
        },
        error: function (error) {
            console.error('Error storing recently viewed service:', error);
        }
    });

    window.location.href = $(this).attr('href');
});
});
</script>