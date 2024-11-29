<div class="col-12">
    <ul class="comment-list list-inline m-0">
        <li class="comment mb-5 pb-5">
            <div class="comment-box">
                <div class="d-flex align-items-sm-center align-items-start flex-sm-row flex-column justify-content-between gap-3">
                    <div class="d-inline-flex align-items-sm-center align-items-start flex-sm-row flex-column gap-3">
                        <div class="user-image flex-shrink-0">
                            <img src="{{getSingleMedia($data->customer, 'profile_image',null)}}" class="avatar-70 object-cover rounded-circle" alt="comment-user">
                        </div>
                        <div class="comment-user-info">
                            <h6 class="font-size-18 text-capitalize mb-2">{{ optional($data->customer)->display_name }}</h6>
                            @php 
                                $rating = round($data->rating, 1); 
                                $sitesetup = App\Models\Setting::where('type','site-setup')->where('key', 'site-setup')->first();
                                $date_time = json_decode($sitesetup->value);
                            @endphp
      
                            @foreach(range(1,5) as $i)                                               
                                <span class="fa-stack" style="width:1em">
                                    <i class="far fa-star fa-stack-1x text-primary"></i>
                                    @if($rating >0)
                                    @if($rating >0.5)
                                    <i class="fas fa-star fa-stack-1x text-primary"></i>
                                    @else
                                    <i class="fas fa-star-half fa-stack-1x text-primary"></i>
                                    @endif
                                    @endif
                                    @php $rating--; @endphp
                                </span>                                                
                            @endforeach
                            <!-- <rating-component :readonly="true" :showrating="false" :ratingvalue="$data->rating" /> -->
                        </div>
                    </div>
                    <div class="date text-capitalize">{{ date("$date_time->date_format", strtotime($data->created_at)) }}</div>
                </div>
                <div class="mt-4"><p class="commnet-content m-0">  {{ $data->review }} </p></div>
            </div>
        </li>
    </ul>
</div>