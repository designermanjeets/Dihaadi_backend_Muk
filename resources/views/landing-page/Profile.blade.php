@extends('landing-page.layouts.default')


@section('content')
<div class="section-padding">
    <div class="container">
        <div class="bg-light profile-block">
            <div class="text-center">
                <h3 class="text-capitalize">edit profile</h3>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="flex-shrink-0 d-inline-block position-relative">
                    <img src="{{asset('landing-images/user/user.png')}}" class="img-fluid avatar-80 rounded object-cover" alt="icon">
                    <span class="bg-success p-1 rounded-circle position-absolute end-0 bottom-0 border border-3 border-white me-1 mb-1"></span>
                </div>
                <div class="profile-desc">
                    <h5>Amine Steward</h5>
                    <p class="m-0">Upload A New Image.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-5 mb-3">
                    <h5 class="text-capitalize">personal detail</h5>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-capitalize">first name</h6>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="17" viewBox="0 0 14 17" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.98918 11.0095C4.08847 11.0095 1.61133 11.4481 1.61133 13.2045C1.61133 14.9609 4.07276 15.4152 6.98918 15.4152C9.8899 15.4152 12.3663 14.9759 12.3663 13.2202C12.3663 11.4645 9.90561 11.0095 6.98918 11.0095Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99013 8.50441C8.8937 8.50441 10.4366 6.96084 10.4366 5.05727C10.4366 3.1537 8.8937 1.61084 6.99013 1.61084C5.08656 1.61084 3.54299 3.1537 3.54299 5.05727C3.53656 6.95441 5.06942 8.49798 6.96585 8.50441H6.99013Z" stroke="currentColor" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        </span>
                        <input type="text" class="form-control text-capitalize" placeholder="enter first name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-capitalize">last name</h6>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="17" viewBox="0 0 14 17" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.98918 11.0095C4.08847 11.0095 1.61133 11.4481 1.61133 13.2045C1.61133 14.9609 4.07276 15.4152 6.98918 15.4152C9.8899 15.4152 12.3663 14.9759 12.3663 13.2202C12.3663 11.4645 9.90561 11.0095 6.98918 11.0095Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99013 8.50441C8.8937 8.50441 10.4366 6.96084 10.4366 5.05727C10.4366 3.1537 8.8937 1.61084 6.99013 1.61084C5.08656 1.61084 3.54299 3.1537 3.54299 5.05727C3.53656 6.95441 5.06942 8.49798 6.96585 8.50441H6.99013Z" stroke="currentColor" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        </span>
                        <input type="text" class="form-control text-capitalize" placeholder="enter last name" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-capitalize">username</h6>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="basic-addon1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="17" viewBox="0 0 14 17" fill="none">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.98918 11.0095C4.08847 11.0095 1.61133 11.4481 1.61133 13.2045C1.61133 14.9609 4.07276 15.4152 6.98918 15.4152C9.8899 15.4152 12.3663 14.9759 12.3663 13.2202C12.3663 11.4645 9.90561 11.0095 6.98918 11.0095Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.99013 8.50441C8.8937 8.50441 10.4366 6.96084 10.4366 5.05727C10.4366 3.1537 8.8937 1.61084 6.99013 1.61084C5.08656 1.61084 3.54299 3.1537 3.54299 5.05727C3.53656 6.95441 5.06942 8.49798 6.96585 8.50441H6.99013Z" stroke="currentColor" stroke-width="1.42857" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        </span>
                        <input type="text" class="form-control text-capitalize" placeholder="enter username" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-capitalize">email address</h6>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="basic-addon1">
                        <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Message">
                            <path id="Stroke 1" d="M13.426 5.13843L10.0936 7.84821C9.46395 8.34771 8.5781 8.34771 7.94848 7.84821L4.58789 5.13843" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path id="Stroke 3" fill-rule="evenodd" clip-rule="evenodd" d="M12.6816 14.25C14.9627 14.2563 16.5 12.3822 16.5 10.0788V4.92751C16.5 2.62412 14.9627 0.75 12.6816 0.75H5.31835C3.03734 0.75 1.5 2.62412 1.5 4.92751V10.0788C1.5 12.3822 3.03734 14.2563 5.31835 14.25H12.6816Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                        </span>
                        <input type="email" class="form-control text-capitalize" placeholder="enter email" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                <div class="col-lg-4">
                    <h6 class="text-capitalize">contact number</h6>
                    <div class="input-group mb-5">
                        <span class="input-group-text" id="basic-addon1">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Calling">
                            <path id="Stroke 1" d="M10.7656 1.375C13.5414 1.68325 15.7344 3.87325 16.0456 6.649" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path id="Stroke 3" d="M10.7656 4.03223C12.0939 4.29023 13.1319 5.32898 13.3906 6.65723" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path id="Stroke 5" fill-rule="evenodd" clip-rule="evenodd" d="M8.27364 8.85429C11.2654 11.8453 11.9441 8.38504 13.8489 10.2886C15.6854 12.1246 16.7417 12.4924 14.4141 14.8185C14.1227 15.0528 12.2709 17.8707 5.76335 11.3647C-0.745055 4.858 2.07117 3.00433 2.30546 2.71296C4.63782 0.380384 5.00012 1.44204 6.83654 3.278C8.7406 5.18237 5.2819 5.86331 8.27364 8.85429Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                        </span>
                        <input type="text" class="form-control text-capitalize" placeholder="enter contact number" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                </div>
                    <div class="col-12 mt-5 mb-3">
                    <h5 class="text-capitalize">country detail</h5>
                </div>
                <div class="col-lg-4 mb-4">
                    <h6 class="text-capitalize">select country</h6>
                    <select class="form-control select2-basic-single js-states">
                        <option>United States</option>
                        <option>Caneda</option>
                        <option>Indis</option>
                        <option>London</option>
                        <option>Africa</option>
                        <option>Nepal</option>
                    </select>
                </div>
                <div class="col-lg-4 mb-4">
                    <h6 class="text-capitalize">select state</h6>
                    <select class="form-control select2-basic-single js-states">
                        <option>Gujrat</option>
                        <option>Maharashtra</option>
                        <option>Rajasthan</option>
                        <option>Kerala</option>
                        <option>Haryana</option>
                        <option>Karnataka</option>
                    </select>
                </div>
                <div class="col-lg-4 mb-4">
                    <h6 class="text-capitalize">select city</h6>
                    <select class="form-control select2-basic-single js-states">
                        <option>Navsari</option>
                        <option>Ahemdabad</option>
                        <option>Vadodra</option>
                        <option>Surat</option>
                        <option>Valsad</option>
                        <option>Mumbai</option>
                    </select>
                </div>
                <div class="col-12">
                    <h6 class="text-capitalize">address</h6>
                    <div class="input-group custom-form-field">
                        <span class="input-group-text align-items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 14 15"
                                fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M8.875 6.37538C8.875 5.33943 8.03557 4.5 7.00038 4.5C5.96443 4.5 5.125 5.33943 5.125 6.37538C5.125 7.41057 5.96443 8.25 7.00038 8.25C8.03557 8.25 8.875 7.41057 8.875 6.37538Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M6.99963 14.25C6.10078 14.25 1.375 10.4238 1.375 6.42247C1.375 3.28998 3.89283 0.75 6.99963 0.75C10.1064 0.75 12.625 3.28998 12.625 6.42247C12.625 10.4238 7.89849 14.25 6.99963 14.25Z"
                                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </span>
                        <textarea class="form-control text-capitalize" rows="5" placeholder="write here..."></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
