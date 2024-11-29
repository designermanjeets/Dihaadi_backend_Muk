<header>
      @php
         $headerSection = App\Models\FrontendSetting::where('key', 'heder-menu-setting')->first();
         $sectionData = $headerSection ? json_decode($headerSection->value, true) : null;
      @endphp
    <div class="top-header bg-primary d-md-block d-none">
       <div class="container-fluid">
          <div class="row align-items-center">
             <div class="col-lg-6 col-md-7">
                <ul class="top-header-left list-inline d-flex align-items-center gap-3 m-0">
                   <li>
                        @php
                           $appsettings = App\Models\AppSetting::first();
                           $generalsetting = App\Models\Setting::where('type','general-setting')->where('key', 'general-setting')->first();
                           $appsetting = $generalsetting ? json_decode($generalsetting->value) : null;

                        @endphp
                      <a class="text-white d-flex align-items-center" href="tel:{{ optional($appsetting)->helpline_number }}">
                         <svg class="me-2" height="16" width="16" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                               d="M11.5317 12.4724C15.5208 16.4604 16.4258 11.8467 18.9656 14.3848C21.4143 16.8328 22.8216 17.3232 19.7192 20.4247C19.3306 20.737 16.8616 24.4943 8.1846 15.8197C-0.493478 7.144 3.26158 4.67244 3.57397 4.28395C6.68387 1.17385 7.16586 2.58938 9.61449 5.03733C12.1544 7.5765 7.54266 8.48441 11.5317 12.4724Z"
                               stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                            </path>
                         </svg>
                         <span>{{ optional($appsetting)->helpline_number }}</span>
                      </a>
                   </li>
                </ul>
             </div>
             <div class="col-lg-6 col-md-5 text-md-end">
                <div class="d-inline-block">
                  @if ($sectionData && isset($sectionData['header_setting']) && $sectionData['header_setting'] == 1)
                  @if($sectionData['enable_language'] == 1)
                     <a class="dropdown text-white d-flex align-items-center" data-bs-toggle="dropdown" href="#"
                        role="button" aria-haspopup="true" aria-expanded="true">
                        {{strtoupper(app()->getLocale())}}
                        <svg width="8" class="ms-1 transform-up" viewBox="0 0 12 8" fill="none"
                           xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M6 5.08579L10.2929 0.792893C10.6834 0.402369 11.3166 0.402369 11.7071 0.792893C12.0976 1.18342 12.0976 1.81658 11.7071 2.20711L6.70711 7.20711C6.31658 7.59763 5.68342 7.59763 5.29289 7.20711L0.292893 2.20711C-0.0976311 1.81658 -0.0976311 1.18342 0.292893 0.792893C0.683418 0.402369 1.31658 0.402369 1.70711 0.792893L6 5.08579Z"
                              fill="currentColor"></path>
                        </svg>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end">
                        <!-- <a class="dropdown-item d-block" href="#">
                           العربی
                        </a>
                        <a class="dropdown-item d-block" href="https://apps.iqonic.design/frezka/app/language/fr">
                           French
                        </a> -->
                        <?php
                              $language_option = sitesetupSession('get')->language_option ?? ["nl","fr","it","pt","es","en"];
                              if (!empty($language_option)) {
                                 $language_array = languagesArray($language_option);
                              }
                        ?>
                        @if(count($language_array) > 0 )
                        @foreach( $language_array as $lang )
                           <a class="dropdown-item d-block" href="{{ route('switch-language',['locale'=> $lang['id'] ]) }}">
                              {{ $lang['title'] }}
                           </a>
                        @endforeach
                        @endif
                     </div>
                  @endif
                  @endif
                </div>

             </div>
          </div>
       </div>
    </div>
    <nav class="nav navbar navbar-expand-xl navbar-light iq-navbar header-hover-menu py-xl-0 ">
       <div class="container-fluid navbar-inner">
          <div class="d-flex align-items-center justify-content-between w-100 landing-header">
             <div class="d-flex gap-3 gap-xl-0 align-items-center">
                <div>
                   <button data-trigger="navbar_main" id="res_sidebar"
                      class="d-xl-none btn btn-primary rounded-pill p-1 pt-0 toggle-rounded-btn lh-base" type="button">
                      <svg width="20px" class="icon-20" viewBox="0 0 24 24">
                         <path fill="currentColor"
                            d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                      </svg>
                   </button>
                </div>
                <!--Logo -->
                @include('landing-page.components.widgets.header_logo')
             </div>
             <!-- navigation -->
             @include('landing-page.partials._horizontal-nav')

             <div class="right-panel">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                   data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                   aria-label="Toggle navigation">
                   <span class="navbar-toggler-btn">
                      <span class="navbar-toggler-icon"></span>
                   </span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav align-items-center ms-auto mb-2 mb-xl-0 p-0">
                      <!-- Dropdown Notificaton -->
                     @if ($sectionData && isset($sectionData['header_setting']) && $sectionData['header_setting'] == 1)
                     @if($sectionData['enable_darknight_mode'] == 1)
                      <li class="nav-item theme-scheme-dropdown dropdown iq-dropdown">
                         <a href="javascript:void(0)" class="nav-link d-flex align-items-center change-mode">
                            <svg class="mode-icons light-mode" width="18" height="18" fill="currentColor"
                               xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024 1024">
                               <path
                                  d="M512 211c-167.8 0-304.4 136.6-304.4 304.4 0 167.8 136.6 304.4 304.4 304.4 167.8 0 304.4-136.6 304.4-304.4 0-168-136.6-304.4-304.4-304.4zm0 527c-122.8 0-222.8-100-222.8-222.8 0-122.8 100-222.8 222.8-222.8 122.8 0 222.8 100 222.8 222.8C734.8 638 634.8 738 512 738zm0-588.4c22.6 0 40.8-18.2 40.8-40.8v-46c0-22.6-18.2-40.8-40.8-40.8-22.6 0-40.8 18.2-40.8 40.8v46c0 22.6 18.2 40.8 40.8 40.8zm0 724.8c-22.6 0-40.8 18.2-40.8 40.8V961c0 22.6 18.2 40.8 40.8 40.8 22.6 0 40.8-18.2 40.8-40.8v-45.8c0-22.4-18.2-40.8-40.8-40.8zm449.2-403.2h-46c-22.6 0-40.8 18.2-40.8 40.8 0 22.6 18.2 40.8 40.8 40.8h46c22.6 0 40.8-18.2 40.8-40.8 0-22.6-18.2-40.8-40.8-40.8zm-852.4 0h-46C40.2 471.2 22 489.4 22 512c0 22.6 18.2 40.8 40.8 40.8h45.8c22.6 0 40.8-18.2 40.8-40.8.2-22.6-18.2-40.8-40.6-40.8zm692-305.6L768.2 198c-16 16-16 41.8 0 57.8s41.8 16 57.8 0l32.4-32.4c16-16 16-41.8 0-57.8s-41.8-16-57.6 0zM198 768.2l-32.4 32.4c-16 16-16 41.8 0 57.8s41.8 16 57.8 0l32.4-32.4c16-16 16-41.8 0-57.8s-41.8-15.8-57.8 0zm628 0c-16-16-41.8-16-57.8 0s-16 41.8 0 57.8l32.4 32.4c16 16 41.8 16 57.8 0s16-41.8 0-57.8L826 768.2zM198 255.8c16 16 41.8 16 57.8 0s16-41.8 0-57.8l-32.4-32.4c-16-16-41.8-16-57.8 0s-16 41.8 0 57.8l32.4 32.4z" />
                            </svg>
                            <svg class="mode-icons dark-mode" width="18" height="18" fill="currentColor"
                               xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1024.0412 1024">
                               <path
                                  d="M516.087 1006.5c-188.85 0-370.925-104.172-461.077-284.19C-69.442 473.677 23.964 174.315 267.7 40.744L310.13 17.5 297.468 64.19c-30.45 112.387-18.508 231.61 33.62 335.7 56.615 113.086 153.91 197.37 273.916 237.29 120.045 39.92 248.388 30.717 361.495-25.9 5.146-2.572 10.128-5.31 15.11-8.05l42.43-23.262-12.043 46.362C973.643 767.83 876.594 886.54 745.74 952.067 671.954 989 593.434 1006.48 516.087 1006.5zM247.09 101.62C53.3 233.956-15.522 489.426 91.86 703.865c116.897 233.462 401.91 328.267 635.413 211.392C833.38 862.1 915.36 770.897 957.46 660.857c-115.947 49.966-244.62 55.628-365.467 15.4-130.463-43.398-236.2-134.992-297.757-257.92-49.266-98.387-65.51-209.168-47.145-316.717z" />
                            </svg>
                         </a>
                      </li>
                     @endif
                     @endif
                      <!-- Dropdown Notificaton -->
                      <!-- Wishlist -->
                      @if(auth()->check() && auth()->user()->user_type == 'user')
                        <li class="nav-item">
                           <a href="{{route('favourite.service')}}" class="nav-link" id="wishlist">
                              <div class="nav-list-icon">
                                 <div class="btn-inner">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                       xmlns="http://www.w3.org/2000/svg">
                                       <path fill-rule="evenodd" clip-rule="evenodd"
                                          d="M1.39326 8.66527C0.499095 5.8736 1.5441 2.68277 4.47493 1.7386C6.0166 1.2411 7.71826 1.53443 8.99993 2.4986C10.2124 1.5611 11.9766 1.24443 13.5166 1.7386C16.4474 2.68277 17.4991 5.8736 16.6058 8.66527C15.2141 13.0903 8.99993 16.4986 8.99993 16.4986C8.99993 16.4986 2.8316 13.1419 1.39326 8.66527Z"
                                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                       <path d="M12.3334 4.58325C13.225 4.87159 13.855 5.66742 13.9309 6.60158"
                                          stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                          stroke-linejoin="round" />
                                    </svg>
                                 </div>
                              </div>
                           </a>
                        </li>
                      @endif
                      <!-- Wishlist -->
                      @if(empty(auth()->user()) || auth()->user()->user_type !== 'user')
                        <li class="ms-sm-3 ms-2">
                           <!--<a href="{{route('user.login')}}" class="btn btn btn-outline-primary" role="button">-->
                            <a href="{{route('auth.login')}}" class="btn btn btn-outline-primary" role="button">
                              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"
                                 fill="none">
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.98857 10.5095C4.08786 10.5095 1.61072 10.9481 1.61072 12.7045C1.61072 14.461 4.07215 14.9152 6.98857 14.9152C9.88929 14.9152 12.3657 14.476 12.3657 12.7202C12.3657 10.9645 9.905 10.5095 6.98857 10.5095Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                 <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.98854 8.00441C8.89212 8.00441 10.435 6.46084 10.435 4.55727C10.435 2.6537 8.89212 1.11084 6.98854 1.11084C5.08497 1.11084 3.5414 2.6537 3.5414 4.55727C3.53497 6.45441 5.06783 7.99798 6.96426 8.00441H6.98854Z"
                                    stroke="currentColor" stroke-width="1.42857" stroke-linecap="round"
                                    stroke-linejoin="round" />
                              </svg>
                              Login
                           </a>
                        </li>
                      @else

                      @if(auth()->check() && auth()->user()->user_type == 'user')
                           <li class="nav-item dropdown user-dropdown" id="itemdropdown1">
                              <a class="nav-link d-flex align-items-center" href="#" id="navbarDropdown" role="button"
                                 data-bs-toggle="dropdown" aria-expanded="false">
                                 <div class="icon-50">
                                    <span class="btn-inner d-inline-block position-relative">
                                       <img src="{{ getSingleMedia(auth()->user(),'profile_image') }}"
                                          class="img-fluid avatar-50 rounded-circle object-cover" alt="icon">
                                    </span>
                                 </div>
                              </a>
                              <ul class="dropdown-menu dropdown-menu-end user-dropdown-menu p-0"
                                 aria-labelledby="navbarDropdown">
                                 <li class="d-flex align-items-center justify-content-start gap-3">
                                    <img src="{{ getSingleMedia(auth()->user(),'profile_image') }}"
                                       class="img-fluid avatar-30 rounded object-cover" alt="icon">
                                    <h6>{{ auth()->user()->first_name." ".auth()->user()->last_name }}</h6>
                                 </li>
                                 <li>
                                    <hr class="dropdown-divider mt-0 mb-2">
                                 </li>
                                 <li>
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="12" height="15" viewBox="0 0 12 15"
                                          fill="none">
                                          <g id="Profile">
                                             <g id="Group 6">
                                                <g id="Union">
                                                   <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M5.92585 7.91259H5.94718C7.89918 7.91259 9.48651 6.32525 9.48651 4.37325C9.48651 2.42125 7.89918 0.833252 5.94718 0.833252C3.99451 0.833252 2.40652 2.42125 2.40652 4.37125C2.39985 6.31792 3.97785 7.90659 5.92585 7.91259ZM3.35852 4.37325C3.35852 2.94592 4.51985 1.78525 5.94718 1.78525C7.37385 1.78525 8.53451 2.94592 8.53451 4.37325C8.53451 5.79992 7.37385 6.96125 5.94718 6.96125H5.92785C4.50652 6.95592 3.35385 5.79592 3.35852 4.37325Z"
                                                      fill="currentColor" />
                                                   <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M0.666504 11.6155C0.666504 14.0801 4.64117 14.0801 5.94717 14.0801C8.21317 14.0801 11.2265 13.8261 11.2265 11.6288C11.2265 9.16414 7.25317 9.16414 5.94717 9.16414C3.6805 9.16414 0.666504 9.41814 0.666504 11.6155ZM1.6665 11.6155C1.6665 10.6521 3.1065 10.1641 5.94717 10.1641C8.78717 10.1641 10.2265 10.6568 10.2265 11.6288C10.2265 12.5921 8.78717 13.0801 5.94717 13.0801C3.1065 13.0801 1.6665 12.5875 1.6665 11.6155Z"
                                                      fill="currentColor" />
                                                </g>
                                             </g>
                                          </g>
                                       </svg>
                                       <span class="ms-2"> {{__('messages.dashboard')}}</span>
                                    </a>
                                 </li>

                                 <li>
                                    <span class="dropdown-item">
                                       <svg width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z" stroke="currentColor" stroke-width="1.5"></path>
                                          <path d="M18 16L16 16M16 16L14 16M16 16L16 14M16 16L16 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                          <path d="M7 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                          <path d="M17 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                          <path d="M2.5 9H21.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                       </svg>
                                       <span class="ms-2">
                                          @php
                                          $user = auth()->user();
                                          $wallet = $user->wallet;
                                          $wallet_amount=  $wallet->amount;
                                          @endphp
                                          {{__('messages.wallet_balance')}}:
                                          <span class="text-primary">{{getPriceFormat($wallet_amount)}}</span>
                                       </span>
                                    </span>
                                 </li>


                                 <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                       @csrf
                                       <a class="dropdown-item" href="javascript:void(0)" onclick="event.preventDefault();
                                          this.closest('form').submit();">
                                          <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                             <g id="Logout">
                                                <path id="Fill 1" fill-rule="evenodd" clip-rule="evenodd"
                                                   d="M6.54616 14.1666H3.28883C1.6595 14.1666 0.333496 12.8406 0.333496 11.2099V3.79059C0.333496 2.15992 1.6595 0.833252 3.28883 0.833252H6.53883C8.1695 0.833252 9.49616 2.15992 9.49616 3.79059V4.41192C9.49616 4.68792 9.27216 4.91192 8.99616 4.91192C8.72016 4.91192 8.49616 4.68792 8.49616 4.41192V3.79059C8.49616 2.71059 7.61816 1.83325 6.53883 1.83325H3.28883C2.21083 1.83325 1.3335 2.71059 1.3335 3.79059V11.2099C1.3335 12.2893 2.21083 13.1666 3.28883 13.1666H6.54616C7.62083 13.1666 8.49616 12.2919 8.49616 11.2173V10.5886C8.49616 10.3126 8.72016 10.0886 8.99616 10.0886C9.27216 10.0886 9.49616 10.3126 9.49616 10.5886V11.2173C9.49616 12.8439 8.17216 14.1666 6.54616 14.1666Z"
                                                   fill="currentColor" />
                                                <g id="Group 5">
                                                   <mask id="mask0_880_191" style="mask-type:luminance"
                                                      maskUnits="userSpaceOnUse" x="4" y="7" width="11" height="1">
                                                      <path id="Clip 4" fill-rule="evenodd" clip-rule="evenodd"
                                                         d="M4.99731 7H14.0246V8H4.99731V7Z" fill="white" />
                                                   </mask>
                                                   <g mask="url(#mask0_880_191)">
                                                      <path id="Fill 3" fill-rule="evenodd" clip-rule="evenodd"
                                                         d="M13.5246 8H5.49731C5.22131 8 4.99731 7.776 4.99731 7.5C4.99731 7.224 5.22131 7 5.49731 7H13.5246C13.8006 7 14.0246 7.224 14.0246 7.5C14.0246 7.776 13.8006 8 13.5246 8Z"
                                                         fill="currentColor" />
                                                   </g>
                                                </g>
                                                <g id="Group 8">
                                                   <mask id="mask1_880_191" style="mask-type:luminance"
                                                      maskUnits="userSpaceOnUse" x="11" y="5" width="4" height="5">
                                                      <path id="Clip 7" fill-rule="evenodd" clip-rule="evenodd"
                                                         d="M11.073 5.05664H14.0246V9.94381H11.073V5.05664Z" fill="white" />
                                                   </mask>
                                                   <g mask="url(#mask1_880_191)">
                                                      <path id="Fill 6" fill-rule="evenodd" clip-rule="evenodd"
                                                         d="M11.5728 9.94381C11.4448 9.94381 11.3162 9.89514 11.2188 9.79647C11.0242 9.60047 11.0248 9.28447 11.2202 9.08981L12.8162 7.49981L11.2202 5.91047C11.0248 5.71581 11.0235 5.39981 11.2188 5.20381C11.4135 5.00781 11.7295 5.00781 11.9255 5.20247L13.8775 7.14581C13.9722 7.23914 14.0248 7.36714 14.0248 7.49981C14.0248 7.63247 13.9722 7.76047 13.8775 7.85381L11.9255 9.79781C11.8282 9.89514 11.7002 9.94381 11.5728 9.94381Z"
                                                         fill="currentColor" />
                                                   </g>
                                                </g>
                                             </g>
                                          </svg>
                                          <span class="ms-2"> {{__('messages.logout')}}</span>
                                       </a>
                                    </form>
                                 </li>
                              </ul>
                           </li>
                        @endif
                      @endif
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </nav>
 </header>
