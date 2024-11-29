@extends('landing-page.layouts.default')


@section('content')

<div class="blog-detail">
    <div class="blog-image position-relative">
         @if(isset($blog->attchments[0]) && $blog->attchments[0])
            <img src="{{ $blog->attchments[0] }}" alt="blog-image" class="img-fluid object-cover w-100 blog-image" loading="lazy">
         @else
            <img src="{{ asset('images/default.png') }}" alt="placeholder-image" class="img-fluid object-cover w-100 blog-image" loading="lazy" >
         @endif
    </div>
    <div class="blog-heading-part">
       <div class="container">
          <div class="blog-heading-box position-relative border-bottom text-center">
             <div class="blog-title">
                <h3 class="line-count-2">{{ $blog->title }}</h3>
             </div>
             <div class="blog-meta pt-5">
                <ul class="list-inline d-flex flex-wrap align-items-center mb-0 justify-content-center gap-4">
                   <li>
                      <a href="{{ route('provider.detail', $blog->author_id) }}" class="author-block">
                         <div class="d-flex align-items-center">
                            <img src="{{ $blog->author_image }}" alt="author-image"
                               class="img-fluid rounded-circle avatar-30 object-cover" loading="lazy">
                            <h6 class="ps-2 font-size-14 text-capitalize">{{ $blog->author_name }}</h6>
                         </div>
                      </a>
                   </li>
                   <li>
                      <div class="d-flex align-items-center">
                         <i class="far fa-calendar-alt text-body icon-18" aria-hidden="true"></i>
                         <h6 class="ps-2 font-size-14 text-capitalize">{{ $blog->publish_date }}</h6>
                      </div>
                   </li>
                   <li>
                      <div class="d-flex align-items-center">
                         <svg xmlns="http://www.w3.org/2000/svg" width="19" height="18" viewBox="0 0 19 18"
                            fill="none">
                            <g clip-path="url(#clip0_314_389)">
                               <path
                                  d="M9.5 6.1875C9.5 5.59076 9.73705 5.01847 10.159 4.59651C10.581 4.17455 11.1533 3.9375 11.75 3.9375H16.25C16.3992 3.9375 16.5423 3.99676 16.6477 4.10225C16.7532 4.20774 16.8125 4.35082 16.8125 4.5V13.5C16.8125 13.6492 16.7532 13.7923 16.6477 13.8977C16.5423 14.0032 16.3992 14.0625 16.25 14.0625H11.75C11.1533 14.0625 10.581 14.2996 10.159 14.7215C9.73705 15.1435 9.5 15.7158 9.5 16.3125"
                                  stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                  stroke-linejoin="round" />
                               <path
                                  d="M2.1875 13.5C2.1875 13.6492 2.24676 13.7923 2.35225 13.8977C2.45774 14.0032 2.60082 14.0625 2.75 14.0625H7.25C7.84674 14.0625 8.41903 14.2996 8.84099 14.7215C9.26295 15.1435 9.5 15.7158 9.5 16.3125V6.1875C9.5 5.59076 9.26295 5.01847 8.84099 4.59651C8.41903 4.17455 7.84674 3.9375 7.25 3.9375H2.75C2.60082 3.9375 2.45774 3.99676 2.35225 4.10225C2.24676 4.20774 2.1875 4.35082 2.1875 4.5V13.5Z"
                                  stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                  stroke-linejoin="round" />
                               <path d="M11.75 6.75H14.5625" stroke="currentColor" stroke-width="1.2"
                                  stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M11.75 9H14.5625" stroke="currentColor" stroke-width="1.2"
                                  stroke-linecap="round" stroke-linejoin="round" />
                               <path d="M11.75 11.25H14.5625" stroke="currentColor" stroke-width="1.2"
                                  stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                               <clipPath id="clip0_314_389">
                                  <rect width="18" height="18" fill="currentColor"
                                     transform="translate(0.5)" />
                               </clipPath>
                            </defs>
                         </svg>
                         <h6 class="ps-2 font-size-14 text-capitalize">{{ $blog->read_time }} {{__('landingpage.min_read')}}</h6>
                      </div>
                   </li>
                   <li>
                      <div class="d-flex align-items-center">
                        @if(isset($blog->tags))
                         <svg xmlns="http://www.w3.org/2000/svg" width="17" height="16" viewBox="0 0 17 16"
                            fill="none">
                            <g clip-path="url(#clip0_314_382)">
                               <path
                                  d="M3.14625 8.64625C3.05266 8.55255 3.00006 8.42556 3 8.29313V2.5H8.79313C8.92556 2.50006 9.05255 2.55266 9.14625 2.64625L15.3538 8.85375C15.4474 8.94751 15.5001 9.07464 15.5001 9.20719C15.5001 9.33974 15.4474 9.46687 15.3538 9.56063L10.0625 14.8538C9.96874 14.9474 9.84161 15.0001 9.70906 15.0001C9.57651 15.0001 9.44938 14.9474 9.35563 14.8538L3.14625 8.64625Z"
                                  stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                  stroke-linejoin="round" />
                               <path
                                  d="M5.75 6C6.16421 6 6.5 5.66421 6.5 5.25C6.5 4.83579 6.16421 4.5 5.75 4.5C5.33579 4.5 5 4.83579 5 5.25C5 5.66421 5.33579 6 5.75 6Z"
                                  fill="currentColor" />
                            </g>
                            <defs>
                               <clipPath id="clip0_314_382">
                                  <rect width="16" height="16" fill="currentColor"
                                     transform="translate(0.5)" />
                               </clipPath>
                            </defs>
                         </svg>
                         <ul class="list-inline m-0 d-flex blog-tag ps-2 flex-wrap justify-content-center">
                              @foreach ($blog->tags as $index => $tags)
                                 @if ($index < 3)
                                    <li class="position-relative">
                                       <h6 class="font-size-14 text-capitalize d-inline-block">{{ $tags }}</h6>
                                    </li>
                                 @endif
                              @endforeach
                         </ul>
                        @endif
                      </div>
                   </li>
                </ul>
             </div>
          </div>
       </div>
    </div>
    <div class="blog-content-part">
       <div class="container">
          <div class="blog-inner bg-body mb-3">
             <div class="row align-items-center">
                <div class="col-lg-12">
                  <p class="description">{!! $blog->description !!}</p>
                </div>
             </div>
             <div class="row align-items-center padding-top-bottom-70 blog-more-images">
               @if (count($blog->attchments) > 0)
                  @foreach ($blog->attchments as $index => $attachment)
                        @if ($index > 0)
                           <div class="col-md-4">
                              <img src="{{ asset($attachment) }}" alt="blog" class="img-height-415 img-fluid object-cover w-100 rounded-3 mb-5 mb-md-0" loading="lazy">
                           </div>
                        @endif
                  @endforeach
               @endif
             </div>
          </div>

          <div class="d-flex gap-2 justify-content-between align-items-start align-items-md-center flex-column flex-md-row px-3 px-md-0">
             <ul class="list-inline d-flex gap-3 flex-wrap align-items-start align-items-md-center flex-column flex-md-row">
               @if(isset($blog->tags))
                <li class="text-secondary">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                      <g clip-path="url(#clip0_293_1173)">
                         <path d="M2.64625 8.64625C2.55266 8.55255 2.50006 8.42556 2.5 8.29313V2.5H8.29313C8.42556 2.50006 8.55255 2.55266 8.64625 2.64625L14.8538 8.85375C14.9474 8.94751 15.0001 9.07464 15.0001 9.20719C15.0001 9.33974 14.9474 9.46687 14.8538 9.56063L9.5625 14.8538C9.46874 14.9474 9.34161 15.0001 9.20906 15.0001C9.07651 15.0001 8.94938 14.9474 8.85563 14.8538L2.64625 8.64625Z" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/>
                         <path d="M5.25 6C5.66421 6 6 5.66421 6 5.25C6 4.83579 5.66421 4.5 5.25 4.5C4.83579 4.5 4.5 4.83579 4.5 5.25C4.5 5.66421 4.83579 6 5.25 6Z" fill="currentColor"/>
                      </g>
                      <defs>
                         <clipPath id="clip0_293_1173">
                            <rect width="16" height="16" fill="white"/>
                         </clipPath>
                      </defs>
                   </svg>
                   Tags :
                </li>
                  @foreach($blog->tags as $tags)
                     <li class="iq-blogcat border bg-light text-capitalize fw-500 rounded"><a class="blog-category.html">{{ $tags }}</a></li>
                  @endforeach
               @endif
             </ul>
             <ul class="list-inline d-flex align-items-center gap-3 social-share">
                <li>
                   <a href="https://www.facebook.com/">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                         <path d="M16 8C16 3.6 12.4 0 8 0C3.6 0 0 3.6 0 8C0 12 2.9 15.3 6.7 15.9V10.3H4.7V8H6.7V6.2C6.7 4.2 7.9 3.1 9.7 3.1C10.6 3.1 11.5 3.3 11.5 3.3V5.3H10.5C9.5 5.3 9.2 5.9 9.2 6.5V8H11.4L11 10.3H9.1V16C13.1 15.4 16 12 16 8Z" fill="currentColor"/>
                      </svg>
                   </a>
                </li>
                <li>
                   <a href="https://twitter.com/">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="14" viewBox="0 0 16 14" fill="none">
                         <path d="M16 2C15.4 2.3 14.8 2.4 14.1 2.5C14.8 2.1 15.3 1.5 15.5 0.7C14.9 1.1 14.2 1.3 13.4 1.5C12.8 0.9 11.9 0.5 11 0.5C8.9 0.5 7.3 2.5 7.8 4.5C5.1 4.4 2.7 3.1 1 1.1C0.1 2.6 0.6 4.5 2 5.5C1.5 5.5 1 5.3 0.5 5.1C0.5 6.6 1.6 8 3.1 8.4C2.6 8.5 2.1 8.6 1.6 8.5C2 9.8 3.2 10.8 4.7 10.8C3.5 11.7 1.7 12.2 0 12C1.5 12.9 3.2 13.5 5 13.5C11.1 13.5 14.5 8.4 14.3 3.7C15 3.3 15.6 2.7 16 2Z" fill="currentColor"/>
                      </svg>
                   </a>
                </li>
                <li>
                   <a href="https://linkedin.com/">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                         <path d="M3.60001 16H0.199997V5.3H3.60001V16ZM1.9 3.8C0.800002 3.8 0 3 0 1.9C0 0.8 0.900002 0 1.9 0C3 0 3.8 0.8 3.8 1.9C3.8 3 3 3.8 1.9 3.8ZM16 16H12.6V10.2C12.6 8.5 11.9 8 10.9 8C9.89999 8 8.89999 8.8 8.89999 10.3V16H5.5V5.3H8.7V6.8C9 6.1 10.2 5 11.9 5C13.8 5 15.8 6.1 15.8 9.4V16H16Z" fill="currentColor"/>
                      </svg>
                   </a>
                </li>
                <li>
                   <a href="https://in.pinterest.com/">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                         <path d="M8.04929 0.151917C3.62218 0.151917 0 3.7741 0 8.2012C0 11.5215 2.01233 14.3388 4.82958 15.5462C4.82958 14.9425 4.82957 14.3388 4.93018 13.7351C5.13141 13.0308 5.93634 9.30798 5.93634 9.30798C5.93634 9.30798 5.63451 8.8049 5.63451 7.99997C5.63451 6.79258 6.33882 5.88703 7.14375 5.88703C7.84806 5.88703 8.25052 6.39011 8.25052 7.09443C8.25052 7.79874 7.74744 8.90552 7.54621 9.91168C7.34498 10.7166 7.94867 11.4209 8.85422 11.4209C10.3635 11.4209 11.3696 9.50921 11.3696 7.09443C11.3696 5.28334 10.1622 3.97533 8.04929 3.97533C5.6345 3.97533 4.12527 5.78642 4.12527 7.79874C4.12527 8.50305 4.3265 9.00613 4.62835 9.4086C4.72896 9.60983 4.82957 9.60983 4.72895 9.81106C4.72895 9.91168 4.62834 10.3141 4.52772 10.4148C4.42711 10.616 4.3265 10.7166 4.12527 10.616C3.01849 10.1129 2.5154 8.90552 2.5154 7.49689C2.5154 5.18272 4.4271 2.46609 8.25052 2.46609C11.3696 2.46609 13.3819 4.67964 13.3819 7.09443C13.3819 10.2135 11.6715 12.6283 9.05545 12.6283C8.1499 12.6283 7.34498 12.1252 7.04313 11.6222C7.04313 11.6222 6.54004 13.4332 6.43942 13.8357C6.23819 14.4394 5.93636 15.0431 5.63451 15.5462C6.33882 15.7474 7.14374 15.848 7.94867 15.848C12.3758 15.848 15.998 12.2258 15.998 7.79874C16.0986 3.7741 12.4764 0.151917 8.04929 0.151917Z" fill="currentColor"/>
                      </svg>
                   </a>
                </li>
             </ul>
          </div>
          <div class="navigation d-flex align-items-center justify-content-between my-5 border-top border-bottom py-5 gap-2">
            @php
               $allBlogPosts = $blog_data->toArray();
               $currentIndex = array_search($blog->id, array_column($allBlogPosts, 'id'));  

               if ($currentIndex !== false && $currentIndex > 0) {
                  $nextBlog = $allBlogPosts[$currentIndex - 1];
               } else {
                  $nextBlog = null;
               }

               if ($currentIndex !== false && $currentIndex < count($allBlogPosts) - 1) {
                  $previousBlog = $allBlogPosts[$currentIndex + 1];
               } else {
                  $previousBlog = null;
               }
            @endphp

            <a href="{{ $previousBlog ? route('blog.detail', $previousBlog['id']) : '' }}" class="previous line-count-3 text-capitalize">
               <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                  <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
               {{__('landingpage.previous')}}{{__('landingpage.post')}}
               <h6 class="blog-title mt-2">{{ $previousBlog ? $previousBlog['title'] : __('landingpage.no_previous_post') }}</h6>
            </a>

            <a href="{{ $nextBlog ? route('blog.detail', $nextBlog['id']) : '' }}" class="next line-count-3 text-capitalize">
               <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                  <path d="M19.75 12.2744L4.75 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                  <path d="M13.7002 18.2988L19.7502 12.2748L13.7002 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
               </svg>
               {{__('landingpage.next')}}{{__('landingpage.post')}}
               <h6 class="blog-title mt-2">{{ $nextBlog ? $nextBlog['title'] : __('landingpage.no_next_post')}}</h6>
            </a>

          </div>
       </div>
    </div>
 </div>
 <div class="section-padding-bottom pt-5">
    <div class="container">
       <div class="row">
          <div class="col-12">
             <div class="position-relative overflow-hidden  swiper swiper-general" data-slide="3" data-laptop="3" data-tab="2" data-mobile="1" data-mobile-sm="1" data-autoplay="true" data-loop="true" data-navigation="false" data-pagination="true">
               <blog-slider-section></blog-slider-section>
             </div>
          </div>
       </div>
    </div>
 </div>
@endsection

