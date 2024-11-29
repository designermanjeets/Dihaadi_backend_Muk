<footer class="footer text-white">
    @php
    $settings = App\Models\Setting::whereIn('type', ['general-setting', 'social-media', 'site-setup'])
        ->whereIn('key', ['general-setting', 'social-media', 'site-setup'])
        ->get()
        ->keyBy('type');
    $generalsetting = $settings->has('general-setting') ? json_decode($settings['general-setting']->value) : null;
    $socialmedia = $settings->has('social-media') ? json_decode($settings['social-media']->value) : null;
    $appsetting = $settings->has('site-setup') ? json_decode($settings['site-setup']->value) : null;
        $copyright_text = $appsetting ? $appsetting->site_copyright : null;
        $position = strpos($copyright_text, 'by');
        if ($position !== false) {
            $first_part = substr($copyright_text, 0, $position + 2);
            $second_part = substr($copyright_text, $position + 2);
        } else {
            $first_part = $copyright_text;
            $second_part = '';
        }
    @endphp
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="footer-inner-box">
                        @include('landing-page.components.widgets.logo')
                        <p class="mt-5 mb-0 readmore-text">
                            {{ optional($generalsetting)->site_description }}
                        </p>
                        <a href="javascript:void(0);" class="readmore-btn">{{__('landingpage.read_more')}}</a>
                        <div class="mt-5 pt-lg-3">
                            <div
                                class="d-flex align-items-sm-center align-items-start flex-sm-row flex-column gap-xl-5 gap-3">
                                <div
                                    class="d-inline-flex align-items-xl-center align-item-start flex-xl-row flex-column gap-3">
                                    <div class="icon text-primary">
                                        <svg width="26" height="27" viewBox="0 0 26 27" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <mask style="mask-type:luminance" maskUnits="userSpaceOnUse" x="2" y="2"
                                                width="22" height="23">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M2.16675 2.66675H23.8333V24.3334H2.16675V2.66675Z"
                                                    fill="white" />
                                            </mask>
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.30275 4.29175C5.563 4.29175 3.79175 6.16916 3.79175 9.07575V17.9244C3.79175 20.831 5.563 22.7084 8.30275 22.7084H17.6931C20.4361 22.7084 22.2084 20.831 22.2084 17.9244V9.07575C22.2084 6.16916 20.4361 4.29175 17.6952 4.29175H8.30275ZM17.6931 24.3334H8.30275C4.63241 24.3334 2.16675 21.7572 2.16675 17.9244V9.07575C2.16675 5.24291 4.63241 2.66675 8.30275 2.66675H17.6952C21.3667 2.66675 23.8334 5.24291 23.8334 9.07575V17.9244C23.8334 21.7572 21.3667 24.3334 17.6931 24.3334Z"
                                                    fill="currentColor" />
                                            </g>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.9937 18.6458C12.5452 18.6458 12.1812 18.2818 12.1812 17.8333V13.5C12.1812 13.0515 12.5452 12.6875 12.9937 12.6875C13.4422 12.6875 13.8062 13.0515 13.8062 13.5V17.8333C13.8062 18.2818 13.4422 18.6458 12.9937 18.6458Z"
                                                fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M12.9989 10.4711C12.3998 10.4711 11.9102 9.98686 11.9102 9.38778C11.9102 8.78869 12.3901 8.30444 12.9881 8.30444H12.9989C13.598 8.30444 14.0822 8.78869 14.0822 9.38778C14.0822 9.98686 13.598 10.4711 12.9989 10.4711Z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h5 class="text-white">{{__('landingpage.business_inquries')}}</h5>
                                        <a href="mailto: {{ optional($generalsetting)->inquriy_email }}">{{ optional($generalsetting)->inquriy_email }}</a>
                                    </div>
                                </div>
                                <div class="text-white d-md-block d-none">
                                    <div class="vr"></div>
                                </div>
                                <div
                                    class="d-inline-flex align-items-xl-center align-item-start flex-xl-row flex-column gap-3">
                                    <div class="icon text-primary">
                                        <svg width="26" height="27" viewBox="0 0 26 27" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <mask style="mask-type:luminance" maskUnits="userSpaceOnUse" x="15" y="2"
                                                width="10" height="10">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M15.55 2.66699H24.8006V11.9109H15.55V2.66699Z" fill="white" />
                                            </mask>
                                            <g>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M23.9878 11.9109C23.5794 11.9109 23.2284 11.6043 23.1818 11.1894C22.7712 7.53204 19.9307 4.69371 16.2723 4.28746C15.8271 4.23762 15.5053 3.83679 15.5551 3.39046C15.6039 2.94521 16.0015 2.61696 16.4521 2.67329C20.87 3.16404 24.3009 6.59062 24.796 11.0074C24.8458 11.4537 24.5251 11.8556 24.0799 11.9055C24.0496 11.9087 24.0181 11.9109 23.9878 11.9109Z"
                                                    fill="currentColor" />
                                            </g>
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M20.1528 11.9225C19.7715 11.9225 19.4324 11.6538 19.3566 11.266C19.0446 9.66267 17.8085 8.42659 16.2073 8.11567C15.7664 8.03009 15.4793 7.60434 15.5649 7.16342C15.6505 6.72251 16.0838 6.43434 16.5171 6.52101C18.7716 6.95867 20.5125 8.69851 20.9512 10.954C21.0368 11.396 20.7497 11.8218 20.3099 11.9073C20.2568 11.9171 20.2048 11.9225 20.1528 11.9225Z"
                                                fill="currentColor" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.56286 4.92859L3.64145 4.84645C5.72949 2.75822 7.08925 2.20472 8.54007 3.03901C8.95741 3.27899 9.34865 3.61492 9.88067 4.15526L11.5126 5.84745C12.4139 6.83101 12.6188 7.77443 12.3253 8.87929L12.2849 9.02556L12.24 9.17099L12.0219 9.81105C11.5549 11.2464 11.7499 12.0563 13.4112 13.7172C15.1388 15.4443 15.9452 15.5856 17.4913 15.0453L17.7669 14.9495L18.1001 14.8413L18.2459 14.8009C19.4203 14.4875 20.4123 14.7376 21.4644 15.789L22.7793 17.059L23.1663 17.4397C23.5954 17.8773 23.879 18.224 24.0885 18.5905C24.9176 20.0409 24.3635 21.3999 22.2153 23.5401L22.0109 23.7472C21.6901 24.0563 21.3905 24.2778 20.9502 24.4868C20.2113 24.8377 19.3382 24.9699 18.3238 24.8289C15.824 24.4812 12.6536 22.5089 8.63628 18.4926C8.30927 18.1656 7.99606 17.845 7.69635 17.5306L7.11485 16.91C1.66584 10.9898 1.18513 7.35312 3.41819 5.07229L3.56286 4.92859ZM8.56536 5.13775C8.21242 4.78979 7.95604 4.57768 7.73001 4.4477C7.23002 4.16019 6.6902 4.28172 5.69115 5.1416L5.37724 5.42204C5.32248 5.47258 5.26647 5.52505 5.20916 5.57949L4.8492 5.93009L4.81677 5.97061L4.57273 6.21578C3.98302 6.81813 3.70368 7.55327 3.94439 8.81756C4.33939 10.8922 6.14737 13.7065 9.78519 17.3434C13.5756 21.1329 16.4637 22.9295 18.5476 23.2194C19.7625 23.3883 20.3821 23.0941 21.0141 22.4467L21.496 21.9603C21.722 21.7239 21.9151 21.5095 22.0781 21.3137L22.3005 21.0335C22.8689 20.2764 22.9208 19.8222 22.6778 19.397C22.5853 19.2352 22.4507 19.0578 22.2549 18.841L21.9892 18.5604L21.832 18.403L20.1731 16.8012C19.6188 16.29 19.24 16.2175 18.6648 16.3709L18.4987 16.4187L17.8116 16.652C15.8181 17.2958 14.38 16.9836 12.2623 14.8664C10.0689 12.6736 9.81166 11.2092 10.5466 9.10085L10.5937 8.96537L10.7241 8.57258L10.7882 8.32221C10.9018 7.77733 10.7721 7.39742 10.1863 6.81159C10.1622 6.78747 10.1353 6.7603 10.1059 6.73055L8.56536 5.13775Z"
                                                fill="currentColor" />
                                        </svg>
                                    </div>
                                    <div class="content">
                                        <h5 class="text-white">{{__('landingpage.helpline_number')}}</h5>
                                        <a href="tel:{{optional($generalsetting)->helpline_number}}">{{optional($generalsetting)->helpline_number}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 pt-lg-5">
                            <ul class="iq-social-list-text d-flex align-items-center flex-wrap m-0 list-inline">
                                <li class="me-3 pe-3">
                                    <a href="{{ optional($socialmedia)->facebook_url }}" target="_blank">{{__('landingpage.facebook')}}</a>
                                </li>
                                <li class="me-3 pe-3">
                                    <a href="{{ optional($socialmedia)->twitter_url }}" target="_blank">{{__('landingpage.twitter')}}</a>
                                </li>
                                <li class="me-3 pe-3">
                                    <a href="{{ optional($socialmedia)->instagram_url }}" target="_blank">{{__('landingpage.instagram')}}</a>
                                </li>
                                <li>
                                    <a href="{{ optional($socialmedia)->youtube_url }}" target="_blank">{{__('landingpage.youtube')}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @php
                $footerSection = App\Models\FrontendSetting::where('key', 'footer-setting')->first();
                $sectionData = $footerSection ? json_decode($footerSection->value, true) : null;
                @endphp
                @if ($sectionData && isset($sectionData['footer_setting']) && $sectionData['footer_setting'] == 1)
                <div class="col-lg-7 custom-border-left mt-lg-0 mt-5 pt-lg-0 pt-3">
                    @if ($sectionData['footer_setting'] == 1 && isset($sectionData['enable_popular_category']) && $sectionData['enable_popular_category'] == 1)
                    <div class="footer-inner-box position-relative ps-lg-5 h-100">
                        <h5 class="text-white">{{__('landingpage.handyman_category')}}</h5>
                        <div class="mt-3">
                            <ul class="iq-footer-catogery-list d-flex align-items-center flex-wrap m-0 list-inline">
                                @foreach ($sectionData['category_id'] as $categoryId)
                                @php
                                    $category = App\Models\Category::find($categoryId);
                                  
                                @endphp
                                    @if($category)
                                    @if($category->status==1)
                                    <li class="me-3 pe-3">
                                        <a href="{{ route('category.detail', $category->id) }}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                    @endif
                                @endif

                                @endforeach

                            </ul>
                        </div>
                        @endif
                        @php
                        $footerServiceSection = App\Models\FrontendSetting::where('key', 'footer-setting')->first();
                        $sectionData = $footerServiceSection ? json_decode($footerServiceSection->value, true) : null;
                        @endphp
                        
                        @if ($sectionData && isset($sectionData['footer_setting']) && $sectionData['footer_setting'] == 1 && isset($sectionData['enable_popular_service']) && $sectionData['enable_popular_service'] == 1)
                        <div class="mt-5">
                            
                            <h5 class="text-white">{{__('landingpage.popular_services')}}</h5>
                            <ul class="list-inline mt-3 mb-0 d-flex flex-wrap gap-5 popular-service-list">
                                @foreach ($sectionData['service_id'] as $serviceId)
                                @php
                                    $service = App\Models\Service::find($serviceId);
                                
                                    $mediaServiceImages = $service ? $service->getMedia('service_attachment') : null;
                                @endphp
                                @if ($service && $mediaServiceImages->isNotEmpty())

                                <li>
                                    <div class="text-center">
                                        <a href="{{ route('service.detail', $service->id) }}" class="text-body">
                                            <img src="{{ url($mediaServiceImages->first()->getUrl()) }}" alt="service-image" style="width: 100px; height: auto;">
                                            <span class="mt-2 line-count-2 popular-service-text">{{$service->name}}</span>
                                        </a>
                                    </div>
                                </li>
                                @endif

                                @endforeach
                            </ul>
                        </div>
                        @endif

                        {{-- <div class="mt-5 pt-5 border-top">
                            <div class="row">
                                <div class="col-lg-9">
                                    <form>
                                        @csrf
                                        <div class="newsletter-form d-flex align-items-center border-bottom">
                                            <div class="text-white me-3">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.8514 8.9765C7.4054 8.9765 6.96073 8.82916 6.58873 8.5345L3.59873 6.12383C3.3834 5.9505 3.35007 5.63516 3.52273 5.4205C3.69673 5.2065 4.0114 5.1725 4.22607 5.34516L7.2134 7.75316C7.58873 8.0505 8.1174 8.0505 8.4954 7.7505L11.4527 5.3465C11.6674 5.17116 11.9821 5.2045 12.1567 5.41916C12.3307 5.63316 12.2981 5.94783 12.0841 6.1225L9.1214 8.5305C8.74673 8.82783 8.29873 8.9765 7.8514 8.9765Z" fill="currentColor"/>
                                                    <mask style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="1" width="15" height="14">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0.666748 1.33325H15V14.3333H0.666748V1.33325Z" fill="white"/>
                                                    </mask>
                                                    <g>
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.55941 13.3333H11.1061C11.1074 13.3319 11.1127 13.3333 11.1167 13.3333C11.8774 13.3333 12.5521 13.0613 13.0694 12.5446C13.6701 11.9466 14.0001 11.0873 14.0001 10.1253V5.54659C14.0001 3.68459 12.7827 2.33325 11.1061 2.33325H4.56075C2.88408 2.33325 1.66675 3.68459 1.66675 5.54659V10.1253C1.66675 11.0873 1.99741 11.9466 2.59741 12.5446C3.11475 13.0613 3.79008 13.3333 4.55008 13.3333H4.55941ZM4.54808 14.3333C3.51941 14.3333 2.60075 13.9599 1.89141 13.2533C1.10141 12.4653 0.666748 11.3546 0.666748 10.1253V5.54659C0.666748 3.14459 2.34075 1.33325 4.56075 1.33325H11.1061C13.3261 1.33325 15.0001 3.14459 15.0001 5.54659V10.1253C15.0001 11.3546 14.5654 12.4653 13.7754 13.2533C13.0667 13.9593 12.1474 14.3333 11.1167 14.3333H11.1061H4.56075H4.54808Z" fill="currentColor"/>
                                                    </g>
                                                </svg>
                                            </div>
                                            <input type="email" name="email" id="email" class="form-control bg-transparent border-0 text-body" placeholder="Email Address" required>
                                            <button type="button" id="submit_btn" class="submit-btn p-0 bg-transparent border-0 text-primary position-absolute top-50 translate-middle-y">Subscribe</button>
                                        </div>
                                    </form>
                                    <div class="mt-2">
                                        <span>*for any question/query email: <a href="mailto: {{ optional($generalsetting)->inquriy_email }}">{{ optional($generalsetting)->inquriy_email }}</a></span>
                                    </div>
                                </div>
                                <div class="col-lg-3 d-lg-block d-none"></div>
                            </div>
                        </div> --}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom py-3 position-relative">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-start text-center">
                   {{-- <p class="mb-0 text-white">{{ $appsetting->site_copyright }}
                    </p> --}}
                    <p class="mb-0 text-white">{{ $first_part }}
                    <a target="_blank" href="https://iqonic.design/">{{ $second_part }} </a>
                    </p>
                </div>
                <div class="col-md-6 text-md-end text-center">
                    <span class="d-inline-flex align-items-center gap-3 flex-wrap">
                        <a target="_blank" href="{{ route('user.term_conditions') }}" class="text-body link-primary">{{__('landingpage.terms_conditions')}}</a>
                        <a target="_blank" href="{{ route('user.privacy_policy') }}" class="text-body link-primary">{{__('landingpage.privacy_policy')}}</a>
                        <a target="_blank" href="{{ route('user.help_support') }}" class="text-body link-primary">{{__('landingpage.help_support')}}</a>
                        <a target="_blank" href="{{ route('user.refund_policy') }}" class="text-body link-primary">{{__('landingpage.refund_policy')}}</a>
                        <a target="_blank" href="{{ route('user.data_deletion_request') }}" class="text-body link-primary">{{__('landingpage.data_deletion_request')}}</a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</footer>

@include('partials._scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.1/dist/sweetalert2.all.min.js"></script>
<script>
    $('#submit_btn').on('click', function () {
       const email = $('#email').val();

       if (!email.trim()) {
        Swal.fire({
            title: 'Error',
            text: 'Please enter an email address',
            icon: 'error',
            iconColor: '#5F60B9'
        });
        return;
    }
        if (!validateEmail(email)) {
            Swal.fire({
                title: 'Error',
                text: 'Invalid email address',
                icon: 'error',
                iconColor: '#5F60B9'
            });
            return;
        }

       $.ajax({
            url: '/user-subscribe',
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                email: email,
            },
            success: function (response) {
               Swal.fire({
               title: 'Done',
               text: response.message,
               icon: 'success',
               iconColor: '#5F60B9'
               }).then((result) => {
                  if (result.isConfirmed) {
                     document.getElementById('email').value = '';
                     window.location.reload();
                  }
               });
            },
            error: function (error) {
                Swal.fire({
                title: 'Error',
                text: 'Something Went Wrong!',
                icon: 'error',
                iconColor: '#5F60B9'
                }).then((result) => {

                });
                console.error('Error:', error);
            }
        });
    });

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

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
