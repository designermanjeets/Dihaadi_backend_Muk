<div class="iq-blog blog-standard position-relative">
    <div class="blog-image position-relative">
        <a href="{{ route('blog.detail', $data->id) }}" class="d-block overflow-hidden">
            <img src="{{ getSingleMedia($data,'blog_attachment', null) }}" alt="blog-image"
                class="img-fluid w-100 blog-image rounded-3" loading="lazy">
        </a>
        <span class="d-inline-flex align-items-center gap-1 px-2 bg-primary border border-2 border-white rounded-5 text-white font-size-14 fw-500 position-absolute top-0 end-0 mt-3 me-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                <path
                    d="M15.4569 7.7975C15.435 7.74813 14.9056 6.57375 13.7287 5.39687C12.1606 3.82875 10.18 3 7.99999 3C5.81999 3 3.83937 3.82875 2.27124 5.39687C1.09437 6.57375 0.562494 7.75 0.543119 7.7975C0.51469 7.86144 0.5 7.93064 0.5 8.00062C0.5 8.0706 0.51469 8.1398 0.543119 8.20375C0.564994 8.25312 1.09437 9.42688 2.27124 10.6038C3.83937 12.1713 5.81999 13 7.99999 13C10.18 13 12.1606 12.1713 13.7287 10.6038C14.9056 9.42688 15.435 8.25312 15.4569 8.20375C15.4853 8.1398 15.5 8.0706 15.5 8.00062C15.5 7.93064 15.4853 7.86144 15.4569 7.7975ZM7.99999 12C6.07624 12 4.39562 11.3006 3.00437 9.92188C2.43352 9.35418 1.94786 8.70685 1.56249 8C1.94776 7.29309 2.43343 6.64574 3.00437 6.07812C4.39562 4.69938 6.07624 4 7.99999 4C9.92374 4 11.6044 4.69938 12.9956 6.07812C13.5676 6.6456 14.0543 7.29295 14.4406 8C13.99 8.84125 12.0269 12 7.99999 12ZM7.99999 5C7.40665 5 6.82663 5.17595 6.33328 5.50559C5.83994 5.83524 5.45542 6.30377 5.22835 6.85195C5.00129 7.40013 4.94188 8.00333 5.05764 8.58527C5.17339 9.16721 5.45912 9.70176 5.87867 10.1213C6.29823 10.5409 6.83278 10.8266 7.41472 10.9424C7.99667 11.0581 8.59987 10.9987 9.14804 10.7716C9.69622 10.5446 10.1648 10.1601 10.4944 9.66671C10.824 9.17336 11 8.59334 11 8C10.9992 7.2046 10.6828 6.44202 10.1204 5.87959C9.55797 5.31716 8.79539 5.00083 7.99999 5ZM7.99999 10C7.60443 10 7.21775 9.8827 6.88885 9.66294C6.55996 9.44318 6.30361 9.13082 6.15223 8.76537C6.00086 8.39991 5.96125 7.99778 6.03842 7.60982C6.11559 7.22186 6.30607 6.86549 6.58578 6.58579C6.86548 6.30608 7.22185 6.1156 7.60981 6.03843C7.99778 5.96126 8.39991 6.00087 8.76536 6.15224C9.13081 6.30362 9.44317 6.55996 9.66293 6.88886C9.8827 7.21776 9.99999 7.60444 9.99999 8C9.99999 8.53043 9.78928 9.03914 9.41421 9.41421C9.03913 9.78929 8.53043 10 7.99999 10Z"
                    fill="currentColor" />
            </svg>
            {{$data->total_views}}
        </span>
    </div>
    <div class="iq-post-details position-relative">
        <div class="blog-meta-data bg-light rounded">
            <div class="d-flex align-items-center justify-content-center gap-3">
            @php
            $sitesetup = App\Models\Setting::where('type','site-setup')->where('key', 'site-setup')->first();
            $datetime = $sitesetup ? json_decode($sitesetup->value) : null;
            @endphp
                <div class="blog-publish-date">
                    <span>{{date("$datetime->date_format", strtotime($data->created_at))}}</span>
                </div>


            </div>
        </div>
        <div class="blog-title text-start mb-2">
            <a href="{{ route('blog.detail', $data->id) }}">
                <h5 class="text-capitalize line-count-2">{{ $data->title }}</h5>
            </a>
        </div>

        <div class="iq-blog-meta-bottom d-flex align-items-center justify-content-between mt-5">
            <div class="author-block">
                <img src="{{ getSingleMedia($data->author,'profile_image', null) }}" alt="blog-image"
                    class="img-fluid rounded-circle avatar-30 object-cover" loading="lazy">
                <a href="{{ route('provider.detail', ($data->author)->id) }}"><span class="ps-1 fw-500 text-capitalize">{{ ($data->author)->display_name }}</span></a>
            </div>
            <div class="iq-btn-container">
                <a class="btn btn-link p-0 text-capitalize" href="{{ route('blog.detail', $data->id) }}">
                    {{__('landingpage.read_more')}}
                    <span class="btn-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path d="M2.5 9.5L9.5 2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                            <path d="M5.5 2.5H9.5V6.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>
