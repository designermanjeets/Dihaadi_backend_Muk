{{#compare isBgLight '==' 'true'}}
<div class="booking-service-box p-5 bg-light rounded-3">
    <div class="py-2">
        <div class="d-flex flex-sm-row justify-content-between flex-column gap-3">
            <div class="service-info">
                <h6 class="mb-3 font-size-18 text-capitalize service-title">{{service-title}}</h6>
                <ul class="booking-service-meta list-inline m-0 d-flex align-items-center flex-wrap">
                    <li>
                        <h6 class="m-0 service-price lh-1">{{$service-price}}</h6>
                    </li>
                    <li>
                        <span class="service-time">{{$service-time}}</span>
                    </li>
                </ul>
                <p class="mt-sm-4 mt-3 mb-0 font-size-14 fw-500 text-capitalize">{{$service-desc}}</p>
            </div>
            <div class="service-image flex-shrink-0 text-center">
                <img src="{{path}}assets/images/{{service-image}}" class="service-image object-cover rounded-2"
                    alt="service-image" />
                <div class="rating-box px-3 py-1 d-inline-block bg-body rounded-3">
                    <div class="d-flex align-items-center gap-1">
                        <span class="text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12"
                                fill="none">
                                <path
                                    d="M7.18449 0.387546L8.64182 3.2134C8.74919 3.41814 8.9541 3.56032 9.19045 3.59191L12.4639 4.05194C12.655 4.07784 12.8285 4.17516 12.9457 4.32365C13.0616 4.47025 13.1114 4.65603 13.0832 4.83865C13.0603 4.99031 12.9863 5.13059 12.8731 5.23801L10.5011 7.45661C10.3276 7.61143 10.2491 7.84081 10.291 8.06513L10.875 11.1842C10.9371 11.5608 10.6785 11.9159 10.291 11.9873C10.1312 12.012 9.96756 11.9861 9.82353 11.9153L6.90363 10.4474C6.68693 10.3419 6.43094 10.3419 6.21424 10.4474L3.29434 11.9153C2.93558 12.0992 2.49104 11.9741 2.29137 11.6328C2.21739 11.497 2.1912 11.3422 2.21542 11.1911L2.7994 8.07145C2.8413 7.84776 2.76208 7.61712 2.58925 7.4623L0.21732 5.24496C-0.0648496 4.98209 -0.0733605 4.54924 0.198334 4.27689C0.204226 4.2712 0.210773 4.26489 0.21732 4.25857C0.329926 4.14798 0.477885 4.07784 0.637628 4.05952L3.91106 3.59886C4.14675 3.56664 4.35166 3.42572 4.45968 3.21972L5.86464 0.387546C5.98969 0.144896 6.24894 -0.00612814 6.53046 0.000190867H6.61818C6.86238 0.0286264 7.07516 0.174595 7.18449 0.387546Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <h6 class="m-0 font-size-14">{{$service-rating}}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 pt-sm-0 pt-3">
            <ul class="list-inline m-0">
                <li class="mb-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="text-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <g>
                                    <path d="M5.5 8.5L7 10L10.5 6.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M8 14C11.3137 14 14 11.3137 14 8C14 4.68629 11.3137 2 8 2C4.68629 2 2 4.68629 2 8C2 11.3137 4.68629 14 8 14Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                            </svg>
                        </span>
                        <span class="text-capitalize">{{$list-item-1}}</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex align-items-center gap-2">
                        <span class="text-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <g>
                                    <path d="M5.5 8.5L7 10L10.5 6.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M8 14C11.3137 14 14 11.3137 14 8C14 4.68629 11.3137 2 8 2C4.68629 2 2 4.68629 2 8C2 11.3137 4.68629 14 8 14Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                            </svg>
                        </span>
                        <span class="text-capitalize">{{$list-item-2}}</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mt-5">
            <a href="{{button-url}}" class="fw-500">{{$button-text}}</a>
        </div>
    </div>
</div>
{{else}}
<div class="booking-service-box p-5 bg-white rounded-3">
    <div class="py-2">
        <div class="d-flex flex-sm-row justify-content-between flex-column gap-3">
            <div class="service-info">
                <h6 class="mb-3 font-size-18 text-capitalize service-title">{{$service-title}}</h6>
                <ul class="booking-service-meta list-inline m-0 d-flex align-items-center flex-wrap">
                    <li>
                        <h6 class="m-0 service-price lh-1">{{$service-price}}</h6>
                    </li>
                    <li>
                        <span class="service-time">{{$service-time}}</span>
                    </li>
                </ul>
                <p class="mt-sm-4 mt-3 mb-0 font-size-14 fw-500 text-capitalize">{{$service-desc}}</p>
            </div>
            <div class="service-image flex-shrink-0 text-center">
                <img src="{{path}}assets/images/{{service-image}}" class="service-image object-cover rounded-2"
                    alt="service-image" />
                <div class="rating-box px-3 py-1 d-inline-block bg-light rounded-3">
                    <div class="d-flex align-items-center gap-1">
                        <span class="text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" viewBox="0 0 14 12"
                                fill="none">
                                <path
                                    d="M7.18449 0.387546L8.64182 3.2134C8.74919 3.41814 8.9541 3.56032 9.19045 3.59191L12.4639 4.05194C12.655 4.07784 12.8285 4.17516 12.9457 4.32365C13.0616 4.47025 13.1114 4.65603 13.0832 4.83865C13.0603 4.99031 12.9863 5.13059 12.8731 5.23801L10.5011 7.45661C10.3276 7.61143 10.2491 7.84081 10.291 8.06513L10.875 11.1842C10.9371 11.5608 10.6785 11.9159 10.291 11.9873C10.1312 12.012 9.96756 11.9861 9.82353 11.9153L6.90363 10.4474C6.68693 10.3419 6.43094 10.3419 6.21424 10.4474L3.29434 11.9153C2.93558 12.0992 2.49104 11.9741 2.29137 11.6328C2.21739 11.497 2.1912 11.3422 2.21542 11.1911L2.7994 8.07145C2.8413 7.84776 2.76208 7.61712 2.58925 7.4623L0.21732 5.24496C-0.0648496 4.98209 -0.0733605 4.54924 0.198334 4.27689C0.204226 4.2712 0.210773 4.26489 0.21732 4.25857C0.329926 4.14798 0.477885 4.07784 0.637628 4.05952L3.91106 3.59886C4.14675 3.56664 4.35166 3.42572 4.45968 3.21972L5.86464 0.387546C5.98969 0.144896 6.24894 -0.00612814 6.53046 0.000190867H6.61818C6.86238 0.0286264 7.07516 0.174595 7.18449 0.387546Z"
                                    fill="currentColor" />
                            </svg>
                        </span>
                        <h6 class="m-0 font-size-14">{{$service-rating}}</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 pt-sm-0 pt-3">
            <ul class="list-inline m-0">
                <li class="mb-2">
                    <div class="d-flex align-items-center gap-2">
                        <span class="text-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <g>
                                    <path d="M5.5 8.5L7 10L10.5 6.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M8 14C11.3137 14 14 11.3137 14 8C14 4.68629 11.3137 2 8 2C4.68629 2 2 4.68629 2 8C2 11.3137 4.68629 14 8 14Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                            </svg>
                        </span>
                        <span class="text-capitalize">{{$list-item-1}}</span>
                    </div>
                </li>
                <li>
                    <div class="d-flex align-items-center gap-2">
                        <span class="text-body">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"
                                fill="none">
                                <g>
                                    <path d="M5.5 8.5L7 10L10.5 6.5" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                    <path
                                        d="M8 14C11.3137 14 14 11.3137 14 8C14 4.68629 11.3137 2 8 2C4.68629 2 2 4.68629 2 8C2 11.3137 4.68629 14 8 14Z"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                            </svg>
                        </span>
                        <span class="text-capitalize">{{$list-item-2}}</span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="mt-5">
            <a href="{{button-url}}" class="fw-500">{{$button-text}}</a>
        </div>
    </div>
</div>
{{/compare}}