@php
$url = '';

$MyNavBar = \Menu::make('MenuList', function ($menu) use($url){

$menu->add('<span>'.__('messages.main').'</span>', ['class' => 'category-main']);

$menu->add('<span>'.__('messages.dashboard').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.dashboard').'</span></span>', ['route' => 'home'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M13.5 15.5C13.5 13.6144 13.5 12.6716 14.0858 12.0858C14.6716 11.5 15.6144 11.5 17.5 11.5C19.3856 11.5 20.3284 11.5 20.9142 12.0858C21.5 12.6716 21.5 13.6144 21.5 15.5V17.5C21.5 19.3856 21.5 20.3284 20.9142 20.9142C20.3284 21.5 19.3856 21.5 17.5 21.5C15.6144 21.5 14.6716 21.5 14.0858 20.9142C13.5 20.3284 13.5 19.3856 13.5 17.5V15.5Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M2 8.5C2 10.3856 2 11.3284 2.58579 11.9142C3.17157 12.5 4.11438 12.5 6 12.5C7.88562 12.5 8.82843 12.5 9.41421 11.9142C10 11.3284 10 10.3856 10 8.5V6.5C10 4.61438 10 3.67157 9.41421 3.08579C8.82843 2.5 7.88562 2.5 6 2.5C4.11438 2.5 3.17157 2.5 2.58579 3.08579C2 3.67157 2 4.61438 2 6.5V8.5Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M13.5 5.5C13.5 4.56812 13.5 4.10218 13.6522 3.73463C13.8552 3.24458 14.2446 2.85523 14.7346 2.65224C15.1022 2.5 15.5681 2.5 16.5 2.5H18.5C19.4319 2.5 19.8978 2.5 20.2654 2.65224C20.7554 2.85523 21.1448 3.24458 21.3478 3.73463C21.5 4.10218 21.5 4.56812 21.5 5.5C21.5 6.43188 21.5 6.89782 21.3478 7.26537C21.1448 7.75542 20.7554 8.14477 20.2654 8.34776C19.8978 8.5 19.4319 8.5 18.5 8.5H16.5C15.5681 8.5 15.1022 8.5 14.7346 8.34776C14.2446 8.14477 13.8552 7.75542 13.6522 7.26537C13.5 6.89782 13.5 6.43188 13.5 5.5Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M2 18.5C2 19.4319 2 19.8978 2.15224 20.2654C2.35523 20.7554 2.74458 21.1448 3.23463 21.3478C3.60218 21.5 4.06812 21.5 5 21.5H7C7.93188 21.5 8.39782 21.5 8.76537 21.3478C9.25542 21.1448 9.64477 20.7554 9.84776 20.2654C10 19.8978 10 19.4319 10 18.5C10 17.5681 10 17.1022 9.84776 16.7346C9.64477 16.2446 9.25542 15.8552 8.76537 15.6522C8.39782 15.5 7.93188 15.5 7 15.5H5C4.06812 15.5 3.60218 15.5 3.23463 15.6522C2.74458 15.8552 2.35523 16.2446 2.15224 16.7346C2 17.1022 2 17.5681 2 18.5Z" stroke="currentColor" stroke-width="1.5"/>
</svg>')
->link->attr(['class' => '']);

$menu->add('<span>'.__('messages.booking').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.booking').'</span></span>', ['route' => 'booking.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M18 16L16 16M16 16L14 16M16 16L16 14M16 16L16 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M7 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M17 4V2.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M2.5 9H21.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->nickname('booking')
->data('permission', 'booking list');

$menu->add(__('messages.sidebar_form_title',['form' => trans('messages.service')]), ['class' => 'category-main'])
->data('permission', ['category list','subcategory list','service list']);

$menu->add('<span>'.__('messages.category').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.category').'</span></span>', ['route' => 'category.index', ])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M3.70588 12.9268H9.11765C10.1979 12.9268 11.0735 13.8024 11.0735 14.8826V20.2944C11.0735 21.3746 10.1979 22.2503 9.11765 22.2503H3.70588C2.62568 22.2503 1.75 21.3746 1.75 20.2944V14.8826C1.75 13.8024 2.62568 12.9268 3.70588 12.9268Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M23.2498 17.5885C23.2498 20.1631 21.1627 22.2503 18.588 22.2503C16.0134 22.2503 13.9263 20.1631 13.9263 17.5885C13.9263 15.0139 16.0134 12.9268 18.588 12.9268C21.1627 12.9268 23.2498 15.0139 23.2498 17.5885Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M8.59018 10.0734L8.58914 10.0734C8.25935 10.0738 7.9357 9.98415 7.65316 9.81405C7.37063 9.64394 7.13994 9.39987 6.98603 9.1082C6.83212 8.81653 6.76083 8.48834 6.77988 8.1591C6.79892 7.82986 6.90756 7.51208 7.09407 7.2401L7.09497 7.23878L10.9739 1.55643L10.9739 1.5563C11.1435 1.30781 11.3711 1.10448 11.6371 0.963963C11.9031 0.823448 12.1994 0.75 12.5002 0.75C12.801 0.75 13.0973 0.823448 13.3632 0.963963C13.6291 1.10443 13.8567 1.30766 14.0262 1.55602C14.0262 1.55605 14.0263 1.55608 14.0263 1.55612C14.0263 1.55618 14.0264 1.55624 14.0264 1.5563L17.9047 7.24584C17.9047 7.24595 17.9048 7.24606 17.9049 7.24616C18.0897 7.51803 18.197 7.8351 18.2152 8.16333C18.2334 8.49169 18.1618 8.81881 18.0081 9.10954C17.8543 9.40026 17.6243 9.64361 17.3427 9.81342C17.061 9.98324 16.7385 10.0731 16.4096 10.0734L8.59018 10.0734Z" stroke="currentColor" stroke-width="1.5"/>
</svg>')
->data('permission', 'category list')
->link->attr(['class' => '']);

$menu->add('<span>'.__('messages.subcategory').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.subcategory').'</span></span>', ['route' => 'subcategory.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M20.24 5.17977L17.83 2.76977C17.5 2.43977 17.05 2.25977 16.59 2.25977H13C12.04 2.25977 11.25 3.04977 11.25 4.00977V9.00977C11.25 9.96977 12.04 10.7598 13 10.7598H19C19.96 10.7598 20.75 9.96977 20.75 9.00977V6.41977C20.75 5.95977 20.56 5.50977 20.24 5.17977ZM19.25 8.99977C19.25 9.13977 19.14 9.24977 19 9.24977H13C12.86 9.24977 12.75 9.13977 12.75 8.99977V3.99977C12.75 3.85977 12.86 3.74977 13 3.74977H16.59C16.66 3.74977 16.72 3.77977 16.77 3.81977L19.18 6.22977C19.18 6.22977 19.25 6.33977 19.25 6.40977V8.99977Z" fill="currentColor"/>
<path d="M17.8202 13.76C17.4902 13.43 17.0402 13.25 16.5802 13.25H12.9902C12.0302 13.25 11.2402 14.04 11.2402 15V20C11.2402 20.96 12.0302 21.75 12.9902 21.75H18.9902C19.9502 21.75 20.7402 20.96 20.7402 20V17.41C20.7402 16.95 20.5502 16.5 20.2302 16.17L17.8202 13.76ZM19.2502 20C19.2502 20.14 19.1402 20.25 19.0002 20.25H13.0002C12.8602 20.25 12.7502 20.14 12.7502 20V15C12.7502 14.86 12.8602 14.75 13.0002 14.75H16.5902C16.6602 14.75 16.7202 14.78 16.7702 14.82L19.1802 17.23C19.1802 17.23 19.2502 17.34 19.2502 17.41V20Z" fill="currentColor"/>
<path d="M9 7.75C9.41 7.75 9.75 7.41 9.75 7C9.75 6.59 9.41 6.25 9 6.25H4.75V3C4.75 2.59 4.41 2.25 4 2.25C3.59 2.25 3.25 2.59 3.25 3V15C3.25 16.52 4.48 17.75 6 17.75H9C9.41 17.75 9.75 17.41 9.75 17C9.75 16.59 9.41 16.25 9 16.25H6C5.31 16.25 4.75 15.69 4.75 15V7.75H9Z" fill="currentColor"/>
</svg>')
->data('permission', 'subcategory list')
->link->attr(['class' => '']);

$menu->add('<span>'.trans('messages.service').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.service').'</span></span>', ['class' => ''])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.5 6.5C2.5 4.29086 4.29086 2.5 6.5 2.5C8.70914 2.5 10.5 4.29086 10.5 6.5V9.16667C10.5 9.47666 10.5 9.63165 10.4659 9.75882C10.3735 10.1039 10.1039 10.3735 9.75882 10.4659C9.63165 10.5 9.47666 10.5 9.16667 10.5H6.5C4.29086 10.5 2.5 8.70914 2.5 6.5Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M13.5 14.8333C13.5 14.5233 13.5 14.3683 13.5341 14.2412C13.6265 13.8961 13.8961 13.6265 14.2412 13.5341C14.3683 13.5 14.5233 13.5 14.8333 13.5H17.5C19.7091 13.5 21.5 15.2909 21.5 17.5C21.5 19.7091 19.7091 21.5 17.5 21.5C15.2909 21.5 13.5 19.7091 13.5 17.5V14.8333Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M2.5 17.5C2.5 15.2909 4.29086 13.5 6.5 13.5H8.9C9.46005 13.5 9.74008 13.5 9.95399 13.609C10.1422 13.7049 10.2951 13.8578 10.391 14.046C10.5 14.2599 10.5 14.5399 10.5 15.1V17.5C10.5 19.7091 8.70914 21.5 6.5 21.5C4.29086 21.5 2.5 19.7091 2.5 17.5Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M13.5 6.5C13.5 4.29086 15.2909 2.5 17.5 2.5C19.7091 2.5 21.5 4.29086 21.5 6.5C21.5 8.70914 19.7091 10.5 17.5 10.5H14.6429C14.5102 10.5 14.4438 10.5 14.388 10.4937C13.9244 10.4415 13.5585 10.0756 13.5063 9.61196C13.5 9.55616 13.5 9.48982 13.5 9.35714V6.5Z" stroke="currentColor" stroke-width="1.5"/>
</svg>')
->nickname('services')
->data('permission', 'service list')
->link->attr(["class" => ""])
->href('#services');

$menu->services->add('<span>'.trans('messages.list_form_title',['form' => trans('messages.service')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'service.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#currentColor" stroke-width="1.5"/>
<path d="M6 15.8L7.14286 17L10 14" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M6 8.8L7.14286 10L10 7" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M13 9L18 9" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M13 16L18 16" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->data('permission', 'service list')
->link->attr(['class' => '']);


$settings = App\Models\Setting::whereIn('type', ['service-configurations','OTHER_SETTING'])
            ->whereIn('key', ['service-configurations', 'OTHER_SETTING'])
            ->get()
            ->keyBy('type');

$servicesetting = $settings->has('service-configurations') ? json_decode($settings['service-configurations']->value) : null;
$othersetting = $settings->has('OTHER_SETTING') ? json_decode($settings['OTHER_SETTING']->value) : null;

if(optional($servicesetting)->service_packages == 1){
$menu->services->add('<span>'.trans('messages.list_form_title',['form' => trans('messages.service_package')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'servicepackage.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5777 3.38197L17.5777 4.43152C19.7294 5.56066 20.8052 6.12523 21.4026 7.13974C22 8.15425 22 9.41667 22 11.9415V12.0585C22 14.5833 22 15.8458 21.4026 16.8603C20.8052 17.8748 19.7294 18.4393 17.5777 19.5685L15.5777 20.618C13.8221 21.5393 12.9443 22 12 22C11.0557 22 10.1779 21.5393 8.42229 20.618L6.42229 19.5685C4.27063 18.4393 3.19479 17.8748 2.5974 16.8603C2 15.8458 2 14.5833 2 12.0585V11.9415C2 9.41667 2 8.15425 2.5974 7.13974C3.19479 6.12523 4.27063 5.56066 6.42229 4.43152L8.42229 3.38197C10.1779 2.46066 11.0557 2 12 2C12.9443 2 13.8221 2.46066 15.5777 3.38197Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M21 7.5L17 9.5M12 12L3 7.5M12 12V21.5M12 12C12 12 14.7426 10.6287 16.5 9.75C16.6953 9.65237 17 9.5 17 9.5M17 9.5V13M17 9.5L7.5 4.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>
')
->data('permission', 'servicepackage list' )
->link->attr(['class' => '']);
}

if(optional($servicesetting)->service_addons == 1){
$menu->services->add('<span>'.trans('messages.list_form_title',['form' => trans('messages.service_addon')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'serviceaddon.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.5 6.5H17.5M17.5 6.5H20.5M17.5 6.5V9.5M17.5 6.5V3.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M2.5 6.5C2.5 4.61438 2.5 3.67157 3.08579 3.08579C3.67157 2.5 4.61438 2.5 6.5 2.5C8.38562 2.5 9.32843 2.5 9.91421 3.08579C10.5 3.67157 10.5 4.61438 10.5 6.5C10.5 8.38562 10.5 9.32843 9.91421 9.91421C9.32843 10.5 8.38562 10.5 6.5 10.5C4.61438 10.5 3.67157 10.5 3.08579 9.91421C2.5 9.32843 2.5 8.38562 2.5 6.5Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M13.5 17.5C13.5 15.6144 13.5 14.6716 14.0858 14.0858C14.6716 13.5 15.6144 13.5 17.5 13.5C19.3856 13.5 20.3284 13.5 20.9142 14.0858C21.5 14.6716 21.5 15.6144 21.5 17.5C21.5 19.3856 21.5 20.3284 20.9142 20.9142C20.3284 21.5 19.3856 21.5 17.5 21.5C15.6144 21.5 14.6716 21.5 14.0858 20.9142C13.5 20.3284 13.5 19.3856 13.5 17.5Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M2.5 17.5C2.5 15.6144 2.5 14.6716 3.08579 14.0858C3.67157 13.5 4.61438 13.5 6.5 13.5C8.38562 13.5 9.32843 13.5 9.91421 14.0858C10.5 14.6716 10.5 15.6144 10.5 17.5C10.5 19.3856 10.5 20.3284 9.91421 20.9142C9.32843 21.5 8.38562 21.5 6.5 21.5C4.61438 21.5 3.67157 21.5 3.08579 20.9142C2.5 20.3284 2.5 19.3856 2.5 17.5Z" stroke="currentColor" stroke-width="1.5"/>
</svg>
')
->data('permission', ['service add on list'])
->link->attr(['class' => '']);
}


if(optional($servicesetting)->post_services == 1){
$menu->add(__('messages.sidebar_form_title',['form' => trans('messages.custom_job')]), ['class' => 'category-main'])->data('permission', 'postjob');

$menu->add('<span>'.__('messages.custom_job_request').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.subcategory').'</span></span>', ['route' => 'post-job-request.index'])
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M17.283,5.549h-5.26V4.335c0-0.222-0.183-0.404-0.404-0.404H8.381c-0.222,0-0.404,0.182-0.404,0.404v1.214h-5.26c-0.223,0-0.405,0.182-0.405,0.405v9.71c0,0.223,0.182,0.405,0.405,0.405h14.566c0.223,0,0.404-0.183,0.404-0.405v-9.71C17.688,5.731,17.506,5.549,17.283,5.549 M8.786,4.74h2.428v0.809H8.786V4.74z M16.879,15.26H3.122v-4.046h5.665v1.201c0,0.223,0.182,0.404,0.405,0.404h1.618c0.222,0,0.405-0.182,0.405-0.404v-1.201h5.665V15.26z M9.595,9.583h0.81v2.428h-0.81V9.583zM16.879,10.405h-5.665V9.19c0-0.222-0.183-0.405-0.405-0.405H9.191c-0.223,0-0.405,0.183-0.405,0.405v1.215H3.122V6.358h13.757V10.405z" fill="#6C757D" />
</svg>')
->nickname('post_job')
->data('permission', 'postjob');

$menu->add('<span>'.__('messages.job_service_list').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.subcategory').'</span></span>', ['route' => 'service.user-service-list'])
->prepend('<svg width="15" height="12" class="sidebar-menu-icon" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M2 4.875C1.3775 4.875 0.875 5.3775 0.875 6C0.875 6.6225 1.3775 7.125 2 7.125C2.6225 7.125 3.125 6.6225 3.125 6C3.125 5.3775 2.6225 4.875 2 4.875ZM2 0.375C1.3775 0.375 0.875 0.8775 0.875 1.5C0.875 2.1225 1.3775 2.625 2 2.625C2.6225 2.625 3.125 2.1225 3.125 1.5C3.125 0.8775 2.6225 0.375 2 0.375ZM2 9.375C1.3775 9.375 0.875 9.885 0.875 10.5C0.875 11.115 1.385 11.625 2 11.625C2.615 11.625 3.125 11.115 3.125 10.5C3.125 9.885 2.6225 9.375 2 9.375ZM4.25 11.25H14.75V9.75H4.25V11.25ZM4.25 6.75H14.75V5.25H4.25V6.75ZM4.25 0.75V2.25H14.75V0.75H4.25Z" fill="#6C757D" />
</svg>')
->data('permission', 'userservice list')
->link->attr(['class' => '']);
}

$menu->add(__('messages.sidebar_form_title',['form' => trans('messages.user')]), ['class' => 'category-main'])->data('permission', ['provider list','handyman list','user list']);


$menu->add('<span>'.__('messages.provider').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.provider').'</span></span>', ['class' => ''])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
<ellipse cx="12" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"/>
</svg>')
->nickname('provider')
->data('permission', 'provider list')
->link->attr(["class" => ""])
->href('#providers');

$menu->provider->add('<span>'.__('messages.list_form_title',['form' => __('messages.provider')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'provider.index'])
->data('permission', 'provider list')
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M2 4.875C1.3775 4.875 0.875 5.3775 0.875 6C0.875 6.6225 1.3775 7.125 2 7.125C2.6225 7.125 3.125 6.6225 3.125 6C3.125 5.3775 2.6225 4.875 2 4.875ZM2 0.375C1.3775 0.375 0.875 0.8775 0.875 1.5C0.875 2.1225 1.3775 2.625 2 2.625C2.6225 2.625 3.125 2.1225 3.125 1.5C3.125 0.8775 2.6225 0.375 2 0.375ZM2 9.375C1.3775 9.375 0.875 9.885 0.875 10.5C0.875 11.115 1.385 11.625 2 11.625C2.615 11.625 3.125 11.115 3.125 10.5C3.125 9.885 2.6225 9.375 2 9.375ZM4.25 11.25H14.75V9.75H4.25V11.25ZM4.25 6.75H14.75V5.25H4.25V6.75ZM4.25 0.75V2.25H14.75V0.75H4.25Z" fill="#6C757D" />
</svg>')
->link->attr(['class' => '']);

$menu->provider->add('<span>'.__('messages.list_form_title',['form' => __('messages.providerrequest')]).'</span>', ['class' => 'sidebar-layout' ,'route' => ['provider.pending','pending']])
->data('permission', 'pending provider')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M4.21533 16.0148C4.21533 16.4737 4.58728 16.8456 5.0461 16.8456H10.0307C10.4895 16.8456 10.8615 16.4737 10.8615 16.0148C10.8615 15.556 10.4895 15.1841 10.0307 15.1841H5.0461C4.58728 15.1841 4.21533 15.556 4.21533 16.0148ZM4.21533 11.0302C4.21533 11.489 4.58728 11.861 5.0461 11.861H15.0153C15.4741 11.861 15.8461 11.489 15.8461 11.0302C15.8461 10.5714 15.4741 10.1995 15.0153 10.1995H5.0461C4.58728 10.1995 4.21533 10.5714 4.21533 11.0302ZM4.21533 6.04561C4.21533 6.50443 4.58728 6.87638 5.0461 6.87638H15.0153C15.4741 6.87638 15.8461 6.50443 15.8461 6.04561C15.8461 5.58679 15.4741 5.21484 15.0153 5.21484H5.0461C4.58728 5.21484 4.21533 5.58679 4.21533 6.04561Z" fill="currentColor"/>
<path d="M18.7671 13.1096V11.3835C18.7671 7.43151 18.7671 5.45548 17.9005 4.22774C17.0338 3 15.639 3 12.8493 3H7.9178C5.12812 3 3.73328 3 2.86664 4.22774C2 5.45548 2 7.43151 2 11.3835C2 15.3356 2 17.3116 2.86664 18.5394C3.73328 19.7671 5.12812 19.7671 7.9178 19.7671H12.8493H16.5479" stroke="currentColor" stroke-width="1.47945"/>
<path d="M18.5216 21.0774H18.5217C19.7185 21.0759 20.8659 20.5996 21.7121 19.7532C22.5582 18.9068 23.0342 17.7593 23.0354 16.5625V16.5624C23.0354 15.6693 22.7706 14.7963 22.2744 14.0538C21.7783 13.3113 21.073 12.7326 20.2479 12.3909C19.4229 12.0492 18.515 11.9598 17.6391 12.1342C16.7632 12.3085 15.9587 12.7386 15.3273 13.3702C14.6959 14.0017 14.266 14.8063 14.0919 15.6823C13.9179 16.5582 14.0074 17.466 14.3494 18.291C14.6913 19.116 15.2702 19.8211 16.0128 20.3171C16.7555 20.8131 17.6285 21.0777 18.5216 21.0774ZM16.7501 13.9125C17.2744 13.5623 17.8909 13.3756 18.5215 13.3758L18.5215 13.3758C19.3664 13.3767 20.1764 13.7127 20.7738 14.3101C21.3712 14.9076 21.7073 15.7176 21.7082 16.5625C21.7084 17.193 21.5216 17.8095 21.1714 18.3339C20.8212 18.8583 20.3234 19.267 19.7408 19.5085C19.1583 19.7499 18.5172 19.8131 17.8988 19.6901C17.2803 19.5672 16.7122 19.2635 16.2663 18.8176C15.8204 18.3718 15.5168 17.8036 15.3938 17.1852C15.2708 16.5667 15.3341 15.9256 15.5755 15.3431C15.8169 14.7606 16.2257 14.2627 16.7501 13.9125Z" fill="currentColor" stroke="currentColor" stroke-width="0.153424"/>
<path d="M18.0562 17.9518C17.9345 17.952 17.8165 17.9096 17.7227 17.832C17.6289 17.7544 17.5653 17.6464 17.5427 17.5267C17.5202 17.4071 17.5402 17.2833 17.5993 17.1769C17.6584 17.0704 17.7528 16.988 17.8663 16.9439L18.4924 16.6997V15.4914C18.4924 15.3531 18.5473 15.2204 18.6452 15.1225C18.743 15.0247 18.8757 14.9697 19.0141 14.9697C19.1524 14.9697 19.2851 15.0247 19.383 15.1225C19.4808 15.2204 19.5358 15.3531 19.5358 15.4914V17.0566C19.5359 17.1616 19.5042 17.2642 19.445 17.351C19.3858 17.4377 19.3018 17.5046 19.204 17.5428L18.2461 17.9174C18.1855 17.9405 18.1211 17.9521 18.0562 17.9518Z" fill="currentColor"/>
</svg>')
->link->attr(['class' => '']);



$menu->provider->add('<span>'.__('messages.list_form_title',['form' => __('messages.providertype')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'providertype.index'])
->data('permission', 'providertype list')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="9" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
<path d="M15 9C16.6569 9 18 7.65685 18 6C18 4.34315 16.6569 3 15 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<ellipse cx="9" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"/>
<path d="M18 14C19.7542 14.3847 21 15.3589 21 16.5C21 17.5293 19.9863 18.4229 18.5 18.8704" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->link->attr(['class' => '']);


if(default_earning_type() === 'subscription'){
$menu->provider->add('<span>'.__('messages.list_form_title',['form' => __('messages.subscribe')]).'</span>', ['class' => 'sidebar-layout' ,'route' => ['provider.pending','subscribe']])
->data('role', 'admin')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14.5711 10.8021C15.5021 11.7331 15.9676 12.1987 15.9979 12.7734C16.0007 12.826 16.0007 12.8787 15.9979 12.9312C15.9676 13.506 15.5021 13.9715 14.5711 14.9026C12.5452 16.9284 11.5323 17.9414 10.6584 17.6578C10.5832 17.6334 10.5102 17.6031 10.4398 17.5673C9.62132 17.1498 9.62132 15.7173 9.62132 12.8523C9.62132 9.98736 9.62132 8.55487 10.4398 8.13743C10.5102 8.10154 10.5832 8.07127 10.6584 8.0469C11.5323 7.76332 12.5452 8.77624 14.5711 10.8021Z" stroke="currentColor" stroke-width="1.5"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M9.67688 3.25L9.75 3.25H14.75L14.8231 3.25C16.1749 3.24995 17.2951 3.2499 18.1821 3.41885C19.1403 3.60135 19.9065 3.99408 20.484 4.81229C21.0359 5.59409 21.2726 6.56239 21.3868 7.76574C21.5 8.95853 21.5 10.4902 21.5 12.4587V12.5V12.5413C21.5 14.5098 21.5 16.0415 21.3868 17.2343C21.2726 18.4376 21.0359 19.4059 20.484 20.1877C19.9065 21.0059 19.1403 21.3987 18.1821 21.5812C17.2951 21.7501 16.1749 21.7501 14.8231 21.75L14.75 21.75H9.75L9.67689 21.75C8.32508 21.7501 7.20487 21.7501 6.31786 21.5812C5.35967 21.3987 4.59351 21.0059 4.01595 20.1877C3.46409 19.4059 3.22739 18.4376 3.11319 17.2343C2.99999 16.0415 2.99999 14.5098 3 12.5413L3 12.5L3 12.4587C2.99999 10.4902 2.99999 8.95853 3.11319 7.76574C3.22739 6.56239 3.46409 5.59409 4.01595 4.81229C4.59351 3.99408 5.35967 3.60135 6.31786 3.41885C7.20487 3.2499 8.32507 3.24995 9.67688 3.25ZM6.59851 4.89236C5.92282 5.02105 5.54253 5.25073 5.24141 5.67731C4.91459 6.14031 4.71195 6.79614 4.60648 7.90746C4.5008 9.021 4.5 10.4815 4.5 12.5C4.5 14.5185 4.5008 15.979 4.60648 17.0926C4.71195 18.2039 4.91459 18.8597 5.24141 19.3227C5.54253 19.7493 5.92282 19.979 6.59851 20.1076C7.32944 20.2469 8.30615 20.25 9.75 20.25H14.75C16.1938 20.25 17.1706 20.2469 17.9015 20.1076C18.5772 19.979 18.9575 19.7493 19.2586 19.3227C19.5854 18.8597 19.7881 18.2039 19.8935 17.0926C19.9992 15.979 20 14.5185 20 12.5C20 10.4815 19.9992 9.021 19.8935 7.90746C19.7881 6.79614 19.5854 6.14031 19.2586 5.67731C18.9575 5.25073 18.5772 5.02105 17.9015 4.89236C17.1706 4.75314 16.1938 4.75 14.75 4.75H9.75C8.30615 4.75 7.32944 4.75314 6.59851 4.89236Z" fill="currentColor"/>
<path d="M18 2C16.8298 2 16.3453 2 14.3041 2H10.6959C8.65469 2 8.89154 2 7 2" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->link->attr(['class' => '']);
}


$menu->add('<span>'.__('messages.handyman').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.handyman').'</span></span>', ['class' => ''])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
<circle cx="17" cy="18" r="4" stroke="currentColor" stroke-width="1.5"/>
<path d="M17 16.667V19.3337" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15.6665 18L18.3332 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M14 20.8344C13.3663 20.9421 12.695 21 12 21C8.13401 21 5 19.2091 5 17C5 14.7909 8.13401 13 12 13C13.7135 13 15.2832 13.3518 16.5 13.9359" stroke="currentColor" stroke-width="1.5"/>
</svg>')
->nickname('handyman')
->data('permission', 'handyman list')
->link->attr(["class" => ""])
->href('#handyman');

$menu->handyman->add('<span>'.__('messages.list_form_title',['form' => __('messages.handyman')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'handyman.index'])
->data('permission', 'handyman list')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M4.21533 16.0148C4.21533 16.4737 4.58728 16.8456 5.0461 16.8456H10.0307C10.4895 16.8456 10.8615 16.4737 10.8615 16.0148C10.8615 15.556 10.4895 15.1841 10.0307 15.1841H5.0461C4.58728 15.1841 4.21533 15.556 4.21533 16.0148ZM4.21533 11.0302C4.21533 11.489 4.58728 11.861 5.0461 11.861H15.0153C15.4741 11.861 15.8461 11.489 15.8461 11.0302C15.8461 10.5714 15.4741 10.1995 15.0153 10.1995H5.0461C4.58728 10.1995 4.21533 10.5714 4.21533 11.0302ZM4.21533 6.04561C4.21533 6.50443 4.58728 6.87638 5.0461 6.87638H15.0153C15.4741 6.87638 15.8461 6.50443 15.8461 6.04561C15.8461 5.58679 15.4741 5.21484 15.0153 5.21484H5.0461C4.58728 5.21484 4.21533 5.58679 4.21533 6.04561Z" fill="currentColor"/>
<path d="M18.7671 13.1096V11.3835C18.7671 7.43151 18.7671 5.45548 17.9005 4.22774C17.0338 3 15.639 3 12.8493 3H7.9178C5.12812 3 3.73328 3 2.86664 4.22774C2 5.45548 2 7.43151 2 11.3835C2 15.3356 2 17.3116 2.86664 18.5394C3.73328 19.7671 5.12812 19.7671 7.9178 19.7671H12.8493H17.4061" stroke="currentColor" stroke-width="1.47945"/>
<circle cx="18.5" cy="14.25" r="1.5" stroke="currentColor" stroke-width="1.5"/>
<ellipse cx="18.5" cy="18.375" rx="2.625" ry="1.5" stroke="currentColor" stroke-width="1.5"/>
</svg>')
->link->attr(['class' => '']);

$menu->handyman->add('<span>'.__('messages.list_form_title',['form' => __('messages.handymanrequest')]).'</span>', ['class' => 'sidebar-layout' ,'route' => ['handyman.pending','request']])
->data('permission', 'pending handyman')
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0_2357_772)">
        <path d="M12.75 9C10.68 9 9 10.68 9 12.75C9 14.82 10.68 16.5 12.75 16.5C14.82 16.5 16.5 14.82 16.5 12.75C16.5 10.68 14.82 9 12.75 9ZM13.9875 14.5125L12.375 12.9V10.5H13.125V12.5925L14.5125 13.98L13.9875 14.5125ZM13.5 2.25H11.115C10.8 1.38 9.975 0.75 9 0.75C8.025 0.75 7.2 1.38 6.885 2.25H4.5C3.675 2.25 3 2.925 3 3.75V15C3 15.825 3.675 16.5 4.5 16.5H9.0825C8.64 16.0725 8.28 15.5625 8.0175 15H4.5V3.75H6V6H12V3.75H13.5V7.56C14.0325 7.635 14.535 7.7925 15 8.01V3.75C15 2.925 14.325 2.25 13.5 2.25ZM9 3.75C8.5875 3.75 8.25 3.4125 8.25 3C8.25 2.5875 8.5875 2.25 9 2.25C9.4125 2.25 9.75 2.5875 9.75 3C9.75 3.4125 9.4125 3.75 9 3.75Z" fill="#6C757D" />
    </g>
    <defs>
        <clipPath id="clip0_2357_772">
            <rect width="18" height="18" fill="white" />
        </clipPath>
    </defs>
</svg>')
->link->attr(['class' => '']);

$menu->handyman->add('<span>'.__('messages.unassigned_list_form_title',['form' => __('messages.handyman')]).'</span>', ['class' => 'sidebar-layout' ,'route' => ['handyman.pending','unassigned']])
->data('permission', 'pending handyman')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M4.21533 16.0148C4.21533 16.4737 4.58728 16.8456 5.0461 16.8456H10.0307C10.4895 16.8456 10.8615 16.4737 10.8615 16.0148C10.8615 15.556 10.4895 15.1841 10.0307 15.1841H5.0461C4.58728 15.1841 4.21533 15.556 4.21533 16.0148ZM4.21533 11.0302C4.21533 11.489 4.58728 11.861 5.0461 11.861H15.0153C15.4741 11.861 15.8461 11.489 15.8461 11.0302C15.8461 10.5714 15.4741 10.1995 15.0153 10.1995H5.0461C4.58728 10.1995 4.21533 10.5714 4.21533 11.0302ZM4.21533 6.04561C4.21533 6.50443 4.58728 6.87638 5.0461 6.87638H15.0153C15.4741 6.87638 15.8461 6.50443 15.8461 6.04561C15.8461 5.58679 15.4741 5.21484 15.0153 5.21484H5.0461C4.58728 5.21484 4.21533 5.58679 4.21533 6.04561Z" fill="currentColor"/>
<path d="M18.7671 13.1096V11.3835C18.7671 7.43151 18.7671 5.45548 17.9005 4.22774C17.0338 3 15.639 3 12.8493 3H7.9178C5.12812 3 3.73328 3 2.86664 4.22774C2 5.45548 2 7.43151 2 11.3835C2 15.3356 2 17.3116 2.86664 18.5394C3.73328 19.7671 5.12812 19.7671 7.9178 19.7671H12.8493H16.5479" stroke="currentColor" stroke-width="1.47945"/>
<path d="M18.5216 21.0774H18.5217C19.7185 21.0759 20.8659 20.5996 21.7121 19.7532C22.5582 18.9068 23.0342 17.7593 23.0354 16.5625V16.5624C23.0354 15.6693 22.7706 14.7963 22.2744 14.0538C21.7783 13.3113 21.073 12.7326 20.2479 12.3909C19.4229 12.0492 18.515 11.9598 17.6391 12.1342C16.7632 12.3085 15.9587 12.7386 15.3273 13.3702C14.6959 14.0017 14.266 14.8063 14.0919 15.6823C13.9179 16.5582 14.0074 17.466 14.3494 18.291C14.6913 19.116 15.2702 19.8211 16.0128 20.3171C16.7555 20.8131 17.6285 21.0777 18.5216 21.0774ZM16.7501 13.9125C17.2744 13.5623 17.8909 13.3756 18.5215 13.3758L18.5215 13.3758C19.3664 13.3767 20.1764 13.7127 20.7738 14.3101C21.3712 14.9076 21.7073 15.7176 21.7082 16.5625C21.7084 17.193 21.5216 17.8095 21.1714 18.3339C20.8212 18.8583 20.3234 19.267 19.7408 19.5085C19.1583 19.7499 18.5172 19.8131 17.8988 19.6901C17.2803 19.5672 16.7122 19.2635 16.2663 18.8176C15.8204 18.3718 15.5168 17.8036 15.3938 17.1852C15.2708 16.5667 15.3341 15.9256 15.5755 15.3431C15.8169 14.7606 16.2257 14.2627 16.7501 13.9125Z" fill="currentColor" stroke="currentColor" stroke-width="0.153424"/>
<path d="M18.0562 17.9518C17.9345 17.952 17.8165 17.9096 17.7227 17.832C17.6289 17.7544 17.5653 17.6464 17.5427 17.5267C17.5202 17.4071 17.5402 17.2833 17.5993 17.1769C17.6584 17.0704 17.7528 16.988 17.8663 16.9439L18.4924 16.6997V15.4914C18.4924 15.3531 18.5473 15.2204 18.6452 15.1225C18.743 15.0247 18.8757 14.9697 19.0141 14.9697C19.1524 14.9697 19.2851 15.0247 19.383 15.1225C19.4808 15.2204 19.5358 15.3531 19.5358 15.4914V17.0566C19.5359 17.1616 19.5042 17.2642 19.445 17.351C19.3858 17.4377 19.3018 17.5046 19.204 17.5428L18.2461 17.9174C18.1855 17.9405 18.1211 17.9521 18.0562 17.9518Z" fill="currentColor"/>
</svg>')
->link->attr(['class' => '']);

$menu->handyman->add('<span>'.__('messages.list_form_title',['form' => __('messages.handyman_earning')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'handymanEarning'])
->data('role', 'provider')
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <g clip-path="url(#clip0_2357_751)">
        <path d="M8.84999 8.175C7.14749 7.7325 6.59999 7.275 6.59999 6.5625C6.59999 5.745 7.35749 5.175 8.62499 5.175C9.95999 5.175 10.455 5.8125 10.5 6.75H12.1575C12.105 5.46 11.3175 4.275 9.74999 3.8925V2.25H7.49999V3.87C6.04499 4.185 4.87499 5.13 4.87499 6.5775C4.87499 8.31 6.30749 9.1725 8.39999 9.675C10.275 10.125 10.65 10.785 10.65 11.4825C10.65 12 10.2825 12.825 8.62499 12.825C7.07999 12.825 6.47249 12.135 6.38999 11.25H4.73999C4.82999 12.8925 6.05999 13.815 7.49999 14.1225V15.75H9.74999V14.1375C11.2125 13.86 12.375 13.0125 12.375 11.475C12.375 9.345 10.5525 8.6175 8.84999 8.175Z" fill="#6C757D" />
    </g>
    <defs>
        <clipPath id="clip0_2357_751">
            <rect width="18" height="18" fill="white" />
        </clipPath>
    </defs>
</svg>')
->link->attr(['class' => '']);

$menu->handyman->add('<span>'.__('messages.list_form_title',['form' => __('messages.handymantype')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'handymantype.index'])
->data('permission', 'handymantype list')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14 20.8344C13.3663 20.9421 12.695 21 12 21C8.13401 21 5 19.2091 5 17C5 14.7909 8.13401 13 12 13C13.7135 13 15.2832 13.3518 16.5 13.9359" stroke="currentColor" stroke-width="1.5"/>
<g clip-path="url(#clip0_10_6123)">
<circle cx="17" cy="18" r="1.25" stroke="currentColor" stroke-width="1.36364"/>
<path d="M17.7358 13.8974C17.5826 13.834 17.3885 13.834 17.0002 13.834C16.6119 13.834 16.4178 13.834 16.2646 13.8974C16.0604 13.982 15.8982 14.1442 15.8136 14.3484C15.775 14.4416 15.7599 14.55 15.754 14.7081C15.7453 14.9405 15.6261 15.1556 15.4248 15.2719C15.2234 15.3881 14.9775 15.3838 14.772 15.2751C14.6321 15.2012 14.5306 15.1601 14.4306 15.1469C14.2115 15.1181 13.9899 15.1774 13.8145 15.312C13.683 15.4129 13.5859 15.581 13.3918 15.9173C13.1977 16.2536 13.1006 16.4217 13.079 16.586C13.0501 16.8052 13.1095 17.0268 13.244 17.2021C13.3054 17.2821 13.3917 17.3494 13.5257 17.4336C13.7226 17.5573 13.8493 17.7681 13.8493 18.0007C13.8493 18.2332 13.7226 18.444 13.5257 18.5677C13.3917 18.6518 13.3054 18.7191 13.244 18.7992C13.1094 18.9745 13.0501 19.1961 13.0789 19.4152C13.1005 19.5796 13.1976 19.7477 13.3918 20.084C13.5859 20.4202 13.683 20.5884 13.8145 20.6893C13.9898 20.8238 14.2114 20.8832 14.4306 20.8544C14.5306 20.8412 14.632 20.8001 14.7719 20.7262C14.9775 20.6175 15.2234 20.6131 15.4247 20.7294C15.6261 20.8457 15.7453 21.0608 15.754 21.2932C15.7599 21.4513 15.775 21.5597 15.8136 21.6529C15.8982 21.8571 16.0604 22.0193 16.2646 22.1039C16.4178 22.1673 16.6119 22.1673 17.0002 22.1673C17.3885 22.1673 17.5826 22.1673 17.7358 22.1039C17.94 22.0193 18.1022 21.8571 18.1868 21.6529C18.2254 21.5597 18.2405 21.4513 18.2464 21.2931C18.2551 21.0608 18.3742 20.8457 18.5756 20.7294C18.777 20.6131 19.0229 20.6175 19.2285 20.7261C19.3684 20.8001 19.4698 20.8412 19.5698 20.8543C19.7889 20.8832 20.0105 20.8238 20.1859 20.6893C20.3174 20.5884 20.4145 20.4202 20.6086 20.084C20.8027 19.7477 20.8998 19.5796 20.9214 19.4152C20.9503 19.1961 20.8909 18.9745 20.7564 18.7991C20.695 18.7191 20.6086 18.6518 20.4747 18.5677C20.2778 18.4439 20.1511 18.2332 20.1511 18.0006C20.1511 17.7681 20.2778 17.5574 20.4747 17.4336C20.6087 17.3495 20.695 17.2822 20.7564 17.2021C20.891 17.0268 20.9503 16.8052 20.9215 16.5861C20.8999 16.4217 20.8028 16.2536 20.6086 15.9173C20.4145 15.5811 20.3174 15.4129 20.1859 15.312C20.0106 15.1775 19.789 15.1181 19.5698 15.1469C19.4698 15.1601 19.3684 15.2012 19.2285 15.2751C19.0229 15.3838 18.777 15.3882 18.5757 15.2719C18.3743 15.1556 18.2551 14.9405 18.2464 14.7081C18.2405 14.55 18.2254 14.4416 18.1868 14.3484C18.1022 14.1442 17.94 13.982 17.7358 13.8974Z" stroke="currentColor" stroke-width="1.5"/>
</g>
<circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
<defs>
<clipPath id="clip0_10_6123">
<rect x="12" y="13" width="10" height="10" rx="4.54545" fill="white"/>
</clipPath>
</defs>
</svg>')
->link->attr(['class' => '']);

$menu->add('<span>'.__('messages.list_form_title',['form' => trans('messages.unverified') ]).'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.customer').'</span></span>', ['route' => ['user.all','unverified']])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
<path d="M15 13.3271C14.0736 13.1162 13.0609 13 12 13C7.58172 13 4 15.0147 4 17.5C4 19.9853 4 22 12 22C17.6874 22 19.3315 20.9817 19.8068 19.5" stroke="currentColor" stroke-width="1.5"/>
<circle cx="18" cy="16" r="4" stroke="currentColor" stroke-width="1.5"/>
<path d="M16.6665 14.6665L19.3332 17.3332M19.3335 14.6665L16.6668 17.3332" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
')
->nickname('user')
->data('permission', 'user list');

$menu->add('<span>'.__('messages.list_form_title',['form' => trans('messages.customer') ]).'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.customer').'</span></span>', ['route' => 'user.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="9" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
<path d="M15 9C16.6569 9 18 7.65685 18 6C18 4.34315 16.6569 3 15 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<ellipse cx="9" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"/>
<path d="M18 14C19.7542 14.3847 21 15.3589 21 16.5C21 17.5293 19.9863 18.4229 18.5 18.8704" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->nickname('user')
->data('permission', 'user list');

$menu->add('<span>'.__('messages.list_form_title',['form' => trans('messages.all_user')]).'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.users').'</span></span>', ['route' => ['user.all','all']])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"/>
<path d="M18 9C19.6569 9 21 7.88071 21 6.5C21 5.11929 19.6569 4 18 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M6 9C4.34315 9 3 7.88071 3 6.5C3 5.11929 4.34315 4 6 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<ellipse cx="12" cy="17" rx="6" ry="4" stroke="currentColor" stroke-width="1.5"/>
<path d="M20 19C21.7542 18.6153 23 17.6411 23 16.5C23 15.3589 21.7542 14.3847 20 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M4 19C2.24575 18.6153 1 17.6411 1 16.5C1 15.3589 2.24575 14.3847 4 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>
')
->nickname('user')
->data('permission', 'user list');


$menu->add('Transactions', ['class' => 'category-main'])->data('permission', ['tax list','payment list','earning list']);



$menu->add('<span>'.__('messages.payment').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.payment').'</span></span>', ['route' => 'payment.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M10 16H6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M14 16H12.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M2 10L22 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>
')
->nickname('payment')
->data('permission', 'payment list');



$menu->add('<span>'.__('messages.earning').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.earning').'</span></span>', ['route' => 'earning'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
<path d="M12 6V18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M15 9.5C15 8.11929 13.6569 7 12 7C10.3431 7 9 8.11929 9 9.5C9 10.8807 10.3431 12 12 12C13.6569 12 15 13.1193 15 14.5C15 15.8807 13.6569 17 12 17C10.3431 17 9 15.8807 9 14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>
')
->nickname('earning')
->data('permission', 'earning list');

if(optional($othersetting)->wallet == 1){
$menu->add('<span>'.__('messages.wallet').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.wallet').'</span></span>', ['route' => 'wallet.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M6 8H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M20.8333 9H18.2308C16.4465 9 15 10.3431 15 12C15 13.6569 16.4465 15 18.2308 15H20.8333C20.9167 15 20.9583 15 20.9935 14.9979C21.5328 14.965 21.9623 14.5662 21.9977 14.0654C22 14.0327 22 13.994 22 13.9167V10.0833C22 10.006 22 9.96726 21.9977 9.9346C21.9623 9.43384 21.5328 9.03496 20.9935 9.00214C20.9583 9 20.9167 9 20.8333 9Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M20.965 9C20.8873 7.1277 20.6366 5.97975 19.8284 5.17157C18.6569 4 16.7712 4 13 4L10 4C6.22876 4 4.34315 4 3.17157 5.17157C2 6.34315 2 8.22876 2 12C2 15.7712 2 17.6569 3.17157 18.8284C4.34315 20 6.22876 20 10 20H13C16.7712 20 18.6569 20 19.8284 18.8284C20.6366 18.0203 20.8873 16.8723 20.965 15" stroke="currentColor" stroke-width="1.5"/>
<path d="M17.9912 12H18.0002" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
')
->nickname('wallet')
->data('permission', 'wallet list');
}


$menu->add(__('messages.promotion'), ['class' => 'category-main'])->data('permission', 'coupon list');

$menu->add('<span>'.__('messages.coupon').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.coupon').'</span></span>', ['class' => ''])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M14 11C14 10.4477 14.4477 10 15 10C15.5523 10 16 10.4477 16 11V13C16 13.5523 15.5523 14 15 14C14.4477 14 14 13.5523 14 13V11Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M14.0079 19.0029L13.2579 19.0007V19.0007L14.0079 19.0029ZM14.0137 17L14.7637 17.0022V17H14.0137ZM3.14958 18.8284L2.61991 19.3594H2.61991L3.14958 18.8284ZM3.14958 5.17157L2.61991 4.64058L2.61991 4.64058L3.14958 5.17157ZM2.95308 10.2537L2.58741 10.9085H2.58741L2.95308 10.2537ZM2.01058 8.98947L1.26124 8.95797L2.01058 8.98947ZM2.95308 13.7463L2.58741 13.0915L2.58741 13.0915L2.95308 13.7463ZM2.01058 15.0105L2.75992 14.979L2.01058 15.0105ZM21.0469 10.2537L21.4126 10.9085L21.0469 10.2537ZM21.9894 8.98947L22.7388 8.95797V8.95797L21.9894 8.98947ZM20.8504 5.17157L21.3801 4.64058L21.3801 4.64058L20.8504 5.17157ZM21.0469 13.7463L20.6812 14.4012V14.4012L21.0469 13.7463ZM21.9894 15.0105L22.7388 15.042V15.042L21.9894 15.0105ZM20.8504 18.8284L21.3801 19.3594L21.3801 19.3594L20.8504 18.8284ZM21.9437 14.332L22.5981 13.9656L22.5981 13.9656L21.9437 14.332ZM21.9437 9.66803L22.5981 10.0344L22.5981 10.0344L21.9437 9.66803ZM2.05634 14.332L1.4019 13.9656L1.4019 13.9656L2.05634 14.332ZM2.05634 9.66802L2.71079 9.30168L2.71078 9.30168L2.05634 9.66802ZM14.0137 7H14.7637L14.7637 6.99782L14.0137 7ZM14.0064 4.49855L13.2564 4.50073V4.50073L14.0064 4.49855ZM16.5278 4.0189L16.5471 3.26915L16.5278 4.0189ZM17.0336 19.9642L17.0653 20.7135H17.0653L17.0336 19.9642ZM13.8595 19.8541L13.3299 19.323L13.3299 19.323L13.8595 19.8541ZM14.7579 19.0051L14.7637 17.0022L13.2637 16.9978L13.2579 19.0007L14.7579 19.0051ZM15.0162 16.75C15.1574 16.75 15.2687 16.8637 15.2687 17H16.7687C16.7687 16.0317 15.9823 15.25 15.0162 15.25V16.75ZM15.0162 15.25C14.0501 15.25 13.2637 16.0317 13.2637 17H14.7637C14.7637 16.8637 14.875 16.75 15.0162 16.75V15.25ZM9.99502 4.75H13.5052V3.25H9.99502V4.75ZM13.0079 19.25H9.99502V20.75H13.0079V19.25ZM9.99502 19.25C8.08355 19.25 6.72521 19.2484 5.69469 19.1102C4.68554 18.9749 4.10384 18.721 3.67925 18.2974L2.61991 19.3594C3.3698 20.1074 4.32051 20.4393 5.4953 20.5969C6.64871 20.7516 8.12585 20.75 9.99502 20.75V19.25ZM9.99502 3.25C8.12585 3.25 6.64871 3.24841 5.4953 3.4031C4.32051 3.56066 3.3698 3.89255 2.61991 4.64058L3.67925 5.70256C4.10384 5.27902 4.68554 5.02513 5.69469 4.88979C6.72521 4.75159 8.08355 4.75 9.99502 4.75V3.25ZM2.58741 10.9085C2.97311 11.1239 3.23007 11.533 3.23007 12H4.73007C4.73007 10.9664 4.1586 10.0678 3.31876 9.59884L2.58741 10.9085ZM2.75992 9.02097C2.83795 7.16494 3.09146 6.28889 3.67925 5.70256L2.61991 4.64058C1.59036 5.66758 1.34012 7.08185 1.26124 8.95797L2.75992 9.02097ZM3.23007 12C3.23007 12.467 2.97311 12.8761 2.58741 13.0915L3.31876 14.4012C4.1586 13.9322 4.73007 13.0336 4.73007 12H3.23007ZM1.26124 15.042C1.34012 16.9182 1.59036 18.3324 2.61991 19.3594L3.67925 18.2974C3.09146 17.7111 2.83795 16.8351 2.75992 14.979L1.26124 15.042ZM20.7699 12C20.7699 11.533 21.0269 11.1239 21.4126 10.9085L20.6812 9.59884C19.8414 10.0678 19.2699 10.9664 19.2699 12H20.7699ZM22.7388 8.95797C22.6599 7.08185 22.4096 5.66758 21.3801 4.64058L20.3207 5.70256C20.9085 6.28889 21.1621 7.16494 21.2401 9.02097L22.7388 8.95797ZM21.4126 13.0915C21.0269 12.8761 20.7699 12.467 20.7699 12H19.2699C19.2699 13.0336 19.8414 13.9322 20.6812 14.4012L21.4126 13.0915ZM21.2401 14.979C21.1621 16.8351 20.9085 17.7111 20.3207 18.2974L21.3801 19.3594C22.4096 18.3324 22.6599 16.9182 22.7388 15.042L21.2401 14.979ZM20.6812 14.4012C20.9652 14.5597 21.1507 14.6636 21.2761 14.7427C21.3379 14.7817 21.3653 14.8024 21.3735 14.8093C21.388 14.8213 21.3375 14.7846 21.2892 14.6983L22.5981 13.9656C22.5153 13.8177 22.4043 13.7154 22.3304 13.6542C22.2503 13.5878 22.1613 13.5276 22.0764 13.4741C21.9087 13.3683 21.6804 13.2411 21.4126 13.0915L20.6812 14.4012ZM22.7388 15.042C22.746 14.8706 22.7541 14.6937 22.7476 14.5458C22.741 14.3959 22.7178 14.1795 22.5981 13.9656L21.2892 14.6983C21.2386 14.6079 21.2461 14.5457 21.249 14.6117C21.2503 14.6404 21.2505 14.6822 21.2488 14.7464C21.2472 14.8104 21.244 14.8847 21.2401 14.979L22.7388 15.042ZM21.4126 10.9085C21.6804 10.7589 21.9087 10.6317 22.0764 10.5259C22.1613 10.4724 22.2503 10.4122 22.3304 10.3458C22.4043 10.2846 22.5153 10.1823 22.5981 10.0344L21.2892 9.30168C21.3375 9.21543 21.388 9.17871 21.3735 9.19072C21.3653 9.19756 21.3379 9.21832 21.2761 9.25725C21.1507 9.33637 20.9652 9.44028 20.6812 9.59884L21.4126 10.9085ZM21.2401 9.02097C21.244 9.11528 21.2472 9.18961 21.2488 9.25357C21.2505 9.31779 21.2503 9.35964 21.249 9.38827C21.2461 9.45428 21.2386 9.39206 21.2892 9.30169L22.5981 10.0344C22.7178 9.82054 22.741 9.60408 22.7476 9.45419C22.7541 9.30634 22.746 9.12945 22.7388 8.95797L21.2401 9.02097ZM2.58741 13.0915C2.31959 13.2411 2.0913 13.3683 1.92358 13.4741C1.83872 13.5276 1.74971 13.5878 1.66957 13.6542C1.59566 13.7154 1.48474 13.8177 1.4019 13.9656L2.71078 14.6983C2.6625 14.7846 2.61198 14.8213 2.62648 14.8093C2.63474 14.8024 2.66215 14.7817 2.72387 14.7427C2.84929 14.6636 3.03482 14.5597 3.31876 14.4012L2.58741 13.0915ZM2.75992 14.979C2.75595 14.8847 2.75285 14.8104 2.7512 14.7464C2.74954 14.6822 2.74973 14.6404 2.75099 14.6117C2.75389 14.5457 2.76137 14.6079 2.71078 14.6983L1.4019 13.9656C1.28221 14.1795 1.25903 14.3959 1.25244 14.5458C1.24593 14.6937 1.25403 14.8706 1.26124 15.042L2.75992 14.979ZM3.31876 9.59884C3.03482 9.44028 2.84929 9.33637 2.72386 9.25725C2.66214 9.21832 2.63474 9.19756 2.62648 9.19072C2.61198 9.17871 2.66251 9.21543 2.71079 9.30168L1.4019 10.0344C1.48473 10.1823 1.59565 10.2846 1.66956 10.3458C1.74971 10.4122 1.83872 10.4724 1.92357 10.5259C2.0913 10.6317 2.31959 10.7589 2.58741 10.9085L3.31876 9.59884ZM1.26124 8.95797C1.25403 9.12945 1.24593 9.30634 1.25244 9.45419C1.25903 9.60408 1.28221 9.82054 1.4019 10.0344L2.71078 9.30168C2.76137 9.39206 2.75389 9.45428 2.75099 9.38827C2.74973 9.35964 2.74954 9.31779 2.7512 9.25357C2.75285 9.18961 2.75595 9.11528 2.75992 9.02097L1.26124 8.95797ZM14.7637 6.99782L14.7564 4.49637L13.2564 4.50073L13.2637 7.00218L14.7637 6.99782ZM15.0162 7.25C14.875 7.25 14.7637 7.13631 14.7637 7H13.2637C13.2637 7.96826 14.0501 8.75 15.0162 8.75V7.25ZM15.2687 7C15.2687 7.13631 15.1574 7.25 15.0162 7.25V8.75C15.9823 8.75 16.7687 7.96826 16.7687 7H15.2687ZM15.2687 4.51618V7H16.7687V4.51618H15.2687ZM16.5084 4.76865C18.6966 4.82509 19.6778 5.06124 20.3208 5.70256L21.3801 4.64058C20.2676 3.53084 18.6939 3.32452 16.5471 3.26915L16.5084 4.76865ZM16.7687 4.51618C16.7687 4.656 16.6534 4.77239 16.5084 4.76865L16.5471 3.26915C15.8429 3.25099 15.2687 3.81835 15.2687 4.51618H16.7687ZM13.5052 4.75C13.3698 4.75 13.2568 4.64027 13.2564 4.50073L14.7564 4.49637C14.7544 3.80569 14.1931 3.25 13.5052 3.25V4.75ZM17.0653 20.7135C18.9399 20.6343 20.353 20.384 21.3801 19.3594L20.3208 18.2974C19.7336 18.8831 18.8563 19.1365 17.002 19.2148L17.0653 20.7135ZM15.2687 17V18.9765H16.7687V17H15.2687ZM13.2579 19.0007C13.2575 19.121 13.2572 19.2136 13.255 19.2926C13.2528 19.3721 13.249 19.4192 13.245 19.4481C13.2411 19.4764 13.2396 19.4669 13.2513 19.4387C13.2654 19.4045 13.2911 19.3617 13.3299 19.323L14.389 20.3852C14.6246 20.1502 14.701 19.8709 14.7311 19.6521C14.7582 19.4548 14.7573 19.219 14.7579 19.0051L13.2579 19.0007ZM13.0079 20.75C13.2218 20.75 13.4576 20.7516 13.6549 20.7251C13.8739 20.6957 14.1534 20.6201 14.389 20.3852L13.3299 19.323C13.3687 19.2843 13.4116 19.2587 13.4458 19.2447C13.4741 19.2331 13.4836 19.2346 13.4553 19.2384C13.4264 19.2423 13.3792 19.246 13.2998 19.248C13.2208 19.25 13.1282 19.25 13.0079 19.25V20.75ZM17.002 19.2148C16.8812 19.2199 16.7889 19.2238 16.7101 19.225C16.631 19.2262 16.5849 19.2244 16.5575 19.2217C16.5309 19.2191 16.5426 19.2175 16.5734 19.2292C16.6103 19.2433 16.6536 19.2685 16.6917 19.305L15.6536 20.3878C15.8978 20.6219 16.183 20.6921 16.4108 20.7145C16.6127 20.7344 16.8518 20.7225 17.0653 20.7135L17.002 19.2148ZM15.2687 18.9765C15.2687 19.1953 15.267 19.4374 15.295 19.6397C15.3263 19.8655 15.407 20.1514 15.6536 20.3878L16.6917 19.305C16.7313 19.343 16.7584 19.3863 16.7737 19.4221C16.7863 19.4516 16.7848 19.4622 16.7808 19.4337C16.7768 19.4046 16.7729 19.3566 16.7708 19.2753C16.7687 19.1945 16.7687 19.0997 16.7687 18.9765H15.2687Z" fill="currentColor"/>
</svg>')
->nickname('coupon')
->data('permission', 'coupon list')
->link->attr(["class" => ""])
->href('#coupon');

$menu->coupon->add('<span>'.__('messages.list_form_title',['form' => __('messages.coupon')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'coupon.index'])
->data('permission', 'coupon list')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#currentColor" stroke-width="1.5"/>
<path d="M6 15.8L7.14286 17L10 14" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M6 8.8L7.14286 10L10 7" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M13 9L18 9" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M13 16L18 16" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->link->attr(['class' => '']);

$menu->coupon->add('<span>'.__('messages.add_form_title',['form' => __('messages.coupon')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'coupon.create'])
->data('permission', 'coupon add')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
<path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->link->attr(['class' => '']);

$menu->add('<span>'.__('messages.slider').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.slider').'</span></span>', ['class' => ''])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M1.75 19.5C1.34 19.5 1 19.16 1 18.75V3.75C1 3.34 1.34 3 1.75 3C2.16 3 2.5 3.34 2.5 3.75V18.75C2.5 19.16 2.16 19.5 1.75 19.5Z" fill="currentColor"/>
<path d="M21.75 19.5C21.34 19.5 21 19.16 21 18.75V3.75C21 3.34 21.34 3 21.75 3C22.16 3 22.5 3.34 22.5 3.75V18.75C22.5 19.16 22.16 19.5 21.75 19.5Z" fill="currentColor"/>
<path d="M4.75 11.5C4.75 7.02166 4.75 4.78249 5.47362 3.39124C6.19724 2 7.36188 2 9.69118 2H13.8088C16.1381 2 17.3028 2 18.0264 3.39124C18.75 4.78249 18.75 7.02166 18.75 11.5C18.75 15.9783 18.75 18.2175 18.0264 19.6088C17.3028 21 16.1381 21 13.8088 21H9.69118C7.36188 21 6.19724 21 5.47362 19.6088C4.75 18.2175 4.75 15.9783 4.75 11.5Z" stroke="currentColor" stroke-width="1.5"/>
</svg>')
->nickname('sliders')
->data('permission', 'slider list')
->link->attr(["class" => ""])
->href('#sliders');

$menu->sliders->add('<span>'.__('messages.list_form_title',['form' => __('messages.slider')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'slider.index'])
->data('permission', 'slider list')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="#currentColor" stroke-width="1.5"/>
<path d="M6 15.8L7.14286 17L10 14" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M6 8.8L7.14286 10L10 7" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M13 9L18 9" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M13 16L18 16" stroke="#currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->link->attr(['class' => '']);

$menu->sliders->add('<span>'.__('messages.add_form_title',['form' => __('messages.slider')]).'</span>', ['class' => 'sidebar-layout' ,'route' => 'slider.create'])
->data('permission', 'slider add')
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
<path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->link->attr(['class' => '']);


$menu->add('Ratings', ['class' => 'category-main'])->data('permission', ['userrating list','handymanrating list']);

$menu->add('<span>'.trans('messages.list_form_title',['form' => trans('messages.user_ratings')]).'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.user_ratings').'</span></span>', ['route' => 'booking-rating.index'])
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.94,10.179l-2.437-0.325l1.62-7.379c0.047-0.235-0.132-0.458-0.372-0.458H5.25c-0.241,0-0.42,0.223-0.373,0.458l1.634,7.376L4.06,10.179c-0.312,0.041-0.446,0.425-0.214,0.649l2.864,2.759l-0.724,3.947c-0.058,0.315,0.277,0.554,0.559,0.401l3.457-1.916l3.456,1.916c-0.419-0.238,0.56,0.439,0.56-0.401l-0.725-3.947l2.863-2.759C16.388,10.604,16.254,10.22,15.94,10.179M10.381,2.778h3.902l-1.536,6.977L12.036,9.66l-1.655-3.546V2.778z M5.717,2.778h3.903v3.335L7.965,9.66L7.268,9.753L5.717,2.778zM12.618,13.182c-0.092,0.088-0.134,0.217-0.11,0.343l0.615,3.356l-2.938-1.629c-0.057-0.03-0.122-0.048-0.184-0.048c-0.063,0-0.128,0.018-0.185,0.048l-2.938,1.629l0.616-3.356c0.022-0.126-0.019-0.255-0.11-0.343l-2.441-2.354l3.329-0.441c0.128-0.017,0.24-0.099,0.295-0.215l1.435-3.073l1.435,3.073c0.055,0.116,0.167,0.198,0.294,0.215l3.329,0.441L12.618,13.182z" fill="#6C757D" />
</svg>')
->nickname('user_ratings')
->data('permission', 'userrating list');

$menu->add('<span>'.trans('messages.list_form_title',['form' => trans('messages.handyman_ratings')]).'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.handyman_ratings').'</span></span>', ['route' => 'handyman-rating.index'])
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M15.94,10.179l-2.437-0.325l1.62-7.379c0.047-0.235-0.132-0.458-0.372-0.458H5.25c-0.241,0-0.42,0.223-0.373,0.458l1.634,7.376L4.06,10.179c-0.312,0.041-0.446,0.425-0.214,0.649l2.864,2.759l-0.724,3.947c-0.058,0.315,0.277,0.554,0.559,0.401l3.457-1.916l3.456,1.916c-0.419-0.238,0.56,0.439,0.56-0.401l-0.725-3.947l2.863-2.759C16.388,10.604,16.254,10.22,15.94,10.179M10.381,2.778h3.902l-1.536,6.977L12.036,9.66l-1.655-3.546V2.778z M5.717,2.778h3.903v3.335L7.965,9.66L7.268,9.753L5.717,2.778zM12.618,13.182c-0.092,0.088-0.134,0.217-0.11,0.343l0.615,3.356l-2.938-1.629c-0.057-0.03-0.122-0.048-0.184-0.048c-0.063,0-0.128,0.018-0.185,0.048l-2.938,1.629l0.616-3.356c0.022-0.126-0.019-0.255-0.11-0.343l-2.441-2.354l3.329-0.441c0.128-0.017,0.24-0.099,0.295-0.215l1.435-3.073l1.435,3.073c0.055,0.116,0.167,0.198,0.294,0.215l3.329,0.441L12.618,13.182z" fill="#6C757D" />
</svg>')
->nickname('handyman_ratings')
->data('permission', 'handymanrating list');


$menu->add(__('messages.sidebar_form_title',['form' => trans('messages.system')]), ['class' => 'category-main'])
->data('permission', ['terms condition','privacy policy','help support','refund cancellation policy','document list']);
if(default_earning_type() === 'subscription'){
$menu->add('<span>'.__('messages.plan').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.plan').'</span></span>', ['route' => 'plans.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16.755 2H7.24502C6.08614 2 5.50671 2 5.03939 2.16261C4.15322 2.47096 3.45748 3.18719 3.15795 4.09946C3 4.58055 3 5.17705 3 6.37006V20.3742C3 21.2324 3.985 21.6878 4.6081 21.1176C4.97417 20.7826 5.52583 20.7826 5.8919 21.1176L6.375 21.5597C7.01659 22.1468 7.98341 22.1468 8.625 21.5597C9.26659 20.9726 10.2334 20.9726 10.875 21.5597C11.5166 22.1468 12.4834 22.1468 13.125 21.5597C13.7666 20.9726 14.7334 20.9726 15.375 21.5597C16.0166 22.1468 16.9834 22.1468 17.625 21.5597L18.1081 21.1176C18.4742 20.7826 19.0258 20.7826 19.3919 21.1176C20.015 21.6878 21 21.2324 21 20.3742V6.37006C21 5.17705 21 4.58055 20.842 4.09946C20.5425 3.18719 19.8468 2.47096 18.9606 2.16261C18.4933 2 17.9139 2 16.755 2Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M9.5 10.4L10.9286 12L14.5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M7.5 15.5H16.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>
')
->nickname('plan')
->data('permission', 'plan list');
}
$menu->add('<span>'.__('messages.tax').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.tax').'</span></span>', ['route' => 'tax.index'])
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M5.17194 7.17188C5.5675 7.17188 5.95418 7.05458 6.28308 6.83482C6.61198 6.61505 6.86832 6.3027 7.0197 5.93724C7.17107 5.57179 7.21068 5.16966 7.13351 4.7817C7.05634 4.39373 6.86586 4.03737 6.58615 3.75766C6.30645 3.47796 5.95008 3.28748 5.56212 3.21031C5.17416 3.13314 4.77202 3.17274 4.40657 3.32412C4.04112 3.47549 3.72876 3.73184 3.509 4.06074C3.28924 4.38963 3.17194 4.77631 3.17194 5.17188C3.17252 5.70213 3.38342 6.2105 3.75836 6.58545C4.13331 6.9604 4.64168 7.1713 5.17194 7.17188V7.17188ZM5.17194 4.50521C5.30379 4.50521 5.43269 4.54431 5.54232 4.61756C5.65195 4.69082 5.7374 4.79494 5.78786 4.91675C5.83832 5.03857 5.85152 5.17262 5.82579 5.30194C5.80007 5.43126 5.73658 5.55005 5.64334 5.64328C5.55011 5.73652 5.43132 5.80001 5.302 5.82573C5.17268 5.85146 5.03863 5.83825 4.91682 5.7878C4.795 5.73734 4.69088 5.65189 4.61762 5.54226C4.54437 5.43262 4.50527 5.30373 4.50527 5.17188C4.50539 4.9951 4.57567 4.8256 4.70066 4.7006C4.82566 4.5756 4.99516 4.50533 5.17194 4.50521V4.50521ZM10.8282 8.82813C10.4326 8.82813 10.0459 8.94543 9.71705 9.16519C9.38815 9.38495 9.13181 9.69731 8.98043 10.0628C8.82906 10.4282 8.78945 10.8303 8.86662 11.2183C8.94379 11.6063 9.13427 11.9626 9.41398 12.2423C9.69368 12.522 10.05 12.7125 10.438 12.7897C10.826 12.8669 11.2281 12.8273 11.5936 12.6759C11.959 12.5245 12.2714 12.2682 12.4911 11.9393C12.7109 11.6104 12.8282 11.2237 12.8282 10.8281C12.8276 10.2979 12.6167 9.7895 12.2418 9.41456C11.8668 9.03961 11.3584 8.82871 10.8282 8.82813V8.82813ZM10.8282 11.4948C10.6963 11.4948 10.5674 11.4557 10.4578 11.3824C10.3482 11.3092 10.2627 11.2051 10.2123 11.0833C10.1618 10.9614 10.1486 10.8274 10.1743 10.6981C10.2001 10.5687 10.2636 10.45 10.3568 10.3567C10.45 10.2635 10.5688 10.2 10.6981 10.1743C10.8275 10.1485 10.9615 10.1618 11.0833 10.2122C11.2051 10.2627 11.3093 10.3481 11.3825 10.4577C11.4558 10.5674 11.4949 10.6963 11.4949 10.8281C11.4947 11.0049 11.4245 11.1744 11.2995 11.2994C11.1745 11.4244 11.005 11.4947 10.8282 11.4948V11.4948ZM13.1381 2.862C13.0762 2.80008 13.0027 2.75096 12.9218 2.71745C12.8409 2.68394 12.7543 2.66669 12.6667 2.66669C12.5792 2.66669 12.4925 2.68394 12.4116 2.71745C12.3307 2.75096 12.2572 2.80008 12.1954 2.862L2.86202 12.1953C2.79949 12.2571 2.74978 12.3306 2.71577 12.4117C2.68175 12.4927 2.6641 12.5797 2.66382 12.6676C2.66355 12.7554 2.68066 12.8425 2.71416 12.9238C2.74767 13.005 2.79692 13.0789 2.85907 13.141C2.92122 13.2031 2.99505 13.2524 3.0763 13.2859C3.15755 13.3194 3.24463 13.3365 3.33252 13.3362C3.42041 13.3359 3.50738 13.3183 3.58842 13.2843C3.66946 13.2503 3.74298 13.2005 3.80473 13.138L13.1381 3.80467C13.2 3.74278 13.2491 3.6693 13.2826 3.58843C13.3161 3.50756 13.3334 3.42088 13.3334 3.33334C13.3334 3.2458 13.3161 3.15911 13.2826 3.07824C13.2491 2.99737 13.2 2.92389 13.1381 2.862V2.862Z" fill="#6C757D" />
</svg>')
->nickname('tax')
->data('permission', 'tax list');



if(optional($othersetting)->blog == 1){
$menu->add('<span>'.__('messages.blog').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.blog').'</span></span>', ['route' => 'blog.index'])
->data('role', ['admin','demo_admin'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M18.18 8.03933L18.6435 7.57589C19.4113 6.80804 20.6563 6.80804 21.4241 7.57589C22.192 8.34374 22.192 9.58868 21.4241 10.3565L20.9607 10.82M18.18 8.03933C18.18 8.03933 18.238 9.02414 19.1069 9.89309C19.9759 10.762 20.9607 10.82 20.9607 10.82M18.18 8.03933L13.9194 12.2999C13.6308 12.5885 13.4865 12.7328 13.3624 12.8919C13.2161 13.0796 13.0906 13.2827 12.9882 13.4975C12.9014 13.6797 12.8368 13.8732 12.7078 14.2604L12.2946 15.5L12.1609 15.901M20.9607 10.82L16.7001 15.0806C16.4115 15.3692 16.2672 15.5135 16.1081 15.6376C15.9204 15.7839 15.7173 15.9094 15.5025 16.0118C15.3203 16.0986 15.1268 16.1632 14.7396 16.2922L13.5 16.7054L13.099 16.8391M13.099 16.8391L12.6979 16.9728C12.5074 17.0363 12.2973 16.9867 12.1553 16.8447C12.0133 16.7027 11.9637 16.4926 12.0272 16.3021L12.1609 15.901M13.099 16.8391L12.1609 15.901" stroke="currentColor" stroke-width="1.5"/>
<path d="M8 13H10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M8 9H14.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M8 17H9.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M19.8284 3.17157C18.6569 2 16.7712 2 13 2H11C7.22876 2 5.34315 2 4.17157 3.17157C3 4.34315 3 6.22876 3 10V14C3 17.7712 3 19.6569 4.17157 20.8284C5.34315 22 7.22876 22 11 22H13C16.7712 22 18.6569 22 19.8284 20.8284C20.7715 19.8853 20.9554 18.4796 20.9913 16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>
')
->link->attr(['class' => '']);
}

$menu->add('<span>'.__('messages.pushnotification_settings').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.pushnotification_settings').'</span></span>', ['route' => 'pushNotification.index'])
->data('role', ['admin','provider','demo_admin'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<circle cx="19" cy="5" r="3" stroke="currentColor" stroke-width="1.5"/>
<path d="M7 14H16" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M7 17.5H13" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>
')
->link->attr(['class' => '']);

$menu->add('<span>'.__('messages.pages').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.pages').'</span></span>', ['class' => ''])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5 8C5 5.17157 5 3.75736 5.87868 2.87868C6.75736 2 8.17157 2 11 2H13C15.8284 2 17.2426 2 18.1213 2.87868C19 3.75736 19 5.17157 19 8V16C19 18.8284 19 20.2426 18.1213 21.1213C17.2426 22 15.8284 22 13 22H11C8.17157 22 6.75736 22 5.87868 21.1213C5 20.2426 5 18.8284 5 16V8Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M5 4.07617C4.02491 4.17208 3.36857 4.38885 2.87868 4.87873C2 5.75741 2 7.17163 2 10.0001V14.0001C2 16.8285 2 18.2427 2.87868 19.1214C3.36857 19.6113 4.02491 19.828 5 19.9239" stroke="currentColor" stroke-width="1.5"/>
<path d="M19 4.07617C19.9751 4.17208 20.6314 4.38885 21.1213 4.87873C22 5.75741 22 7.17163 22 10.0001V14.0001C22 16.8285 22 18.2427 21.1213 19.1214C20.6314 19.6113 19.9751 19.828 19 19.9239" stroke="currentColor" stroke-width="1.5"/>
<path d="M9 13H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M9 9H15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M9 17H12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>
')
->nickname('pages')
->link->attr(["class" => ""])
->href('#pages');

$menu->pages->add('<span>'.__('messages.terms_condition').'</span>', ['class' => 'sidebar-layout' ,'route' => 'term-condition'])
->data('permission', 'terms condition')
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M14 1.5H8L6.5 0H2C1.175 0 0.5075 0.675 0.5075 1.5L0.5 10.5C0.5 11.325 1.175 12 2 12H14C14.825 12 15.5 11.325 15.5 10.5V3C15.5 2.175 14.825 1.5 14 1.5ZM14 10.5H2V1.5H5.8775L7.3775 3H14V10.5ZM12.5 6H3.5V4.5H12.5V6ZM9.5 9H3.5V7.5H9.5V9Z" fill="#6C757D" />
</svg>')
->link->attr(['class' => '']);

$menu->pages->add('<span>'.__('messages.privacy_policy').'</span>', ['class' => 'sidebar-layout' ,'route' => 'privacy-policy'])
->data('permission', 'privacy policy')
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M7 0.75L0.25 3.75V8.25C0.25 12.4125 3.13 16.305 7 17.25C10.87 16.305 13.75 12.4125 13.75 8.25V3.75L7 0.75ZM12.25 8.25C12.25 11.64 10.015 14.7675 7 15.6975C3.985 14.7675 1.75 11.64 1.75 8.25V4.725L7 2.3925L12.25 4.725V8.25ZM3.5575 8.6925L2.5 9.75L5.5 12.75L11.5 6.75L10.4425 5.685L5.5 10.6275L3.5575 8.6925Z" fill="#6C757D" />
</svg>')
->link->attr(['class' => '']);

$menu->pages->add('<span>'.__('messages.help_support').'</span>', ['class' => 'sidebar-layout' ,'route' => 'help-support'])
->data('permission', 'Help and support')
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M2 3.5H0.5V14C0.5 14.825 1.175 15.5 2 15.5H12.5V14H2V3.5ZM14 0.5H5C4.175 0.5 3.5 1.175 3.5 2V11C3.5 11.825 4.175 12.5 5 12.5H14C14.825 12.5 15.5 11.825 15.5 11V2C15.5 1.175 14.825 0.5 14 0.5ZM14 11H5V2H14V11ZM9.1325 6.62C9.44 6.0725 10.0175 5.75 10.355 5.27C10.715 4.76 10.5125 3.815 9.5 3.815C8.84 3.815 8.51 4.3175 8.375 4.7375L7.3475 4.31C7.6325 3.47 8.39 2.75 9.4925 2.75C10.415 2.75 11.0525 3.17 11.375 3.695C11.6525 4.145 11.81 4.9925 11.3825 5.6225C10.91 6.32 10.46 6.53 10.2125 6.98C10.115 7.16 10.0775 7.28 10.0775 7.865H8.9375C8.945 7.5575 8.8925 7.055 9.1325 6.62ZM8.7125 9.4625C8.7125 9.02 9.065 8.6825 9.5 8.6825C9.9425 8.6825 10.28 9.02 10.28 9.4625C10.28 9.8975 9.95 10.25 9.5 10.25C9.065 10.25 8.7125 9.8975 8.7125 9.4625Z" fill="#6C757D" />
</svg>')
->link->attr(['class' => '']);

$menu->pages->add('<span>'.__('messages.refund_cancellation_policy').'</span>', ['class' => 'sidebar-layout' ,'route' => 'refund-cancellation-policy'])
->data('permission', 'Refund and Cancellation Policy')
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M6.4075 14H1.75V6.5H12.25V9.785L13.75 8.285V3.5C13.75 2.675 13.075 2 12.25 2H11.5V0.5H10V2H4V0.5H2.5V2H1.75C0.9175 2 0.2575 2.675 0.2575 3.5L0.25 14C0.25 14.825 0.9175 15.5 1.75 15.5H7.9075L6.4075 14ZM1.75 3.5H12.25V5H1.75V3.5ZM10.405 15.875L7.75 13.22L8.8075 12.1625L10.3975 13.7525L13.5775 10.5725L14.635 11.63L10.405 15.875ZM5.8075 9.5L7 10.6925L5.9425 11.75L4.75 10.5575L3.5575 11.75L2.5 10.6925L3.6925 9.5L2.5 8.3075L3.5575 7.25L4.75 8.4425L5.9425 7.25L7 8.3075L5.8075 9.5Z" fill="#6C757D" />
</svg>')
->link->attr(['class' => '']);

$menu->pages->add('<span>'.__('messages.data_deletion_request').'</span>', ['class' => 'sidebar-layout' ,'route' => 'data-deletion-request'])
->prepend('<svg width="15" height="15" class="sidebar-menu-icon" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M6.4075 14H1.75V6.5H12.25V9.785L13.75 8.285V3.5C13.75 2.675 13.075 2 12.25 2H11.5V0.5H10V2H4V0.5H2.5V2H1.75C0.9175 2 0.2575 2.675 0.2575 3.5L0.25 14C0.25 14.825 0.9175 15.5 1.75 15.5H7.9075L6.4075 14ZM1.75 3.5H12.25V5H1.75V3.5ZM10.405 15.875L7.75 13.22L8.8075 12.1625L10.3975 13.7525L13.5775 10.5725L14.635 11.63L10.405 15.875ZM5.8075 9.5L7 10.6925L5.9425 11.75L4.75 10.5575L3.5575 11.75L2.5 10.6925L3.6925 9.5L2.5 8.3075L3.5575 7.25L4.75 8.4425L5.9425 7.25L7 8.3075L5.8075 9.5Z" fill="#6C757D" />
</svg>')
->link->attr(['class' => '']);


$menu->add('<span>'.__('messages.document').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.document').'</span></span>', ['class' => ''])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"/>
<path d="M7 17H11.9846M7 7.03078H16.9692M7 12.0154H16.9692" stroke="currentColor" stroke-width="1.66154" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
</svg>')
->nickname('document')
->data('permission', 'document list')
->link->attr(["class" => ""])
->href('#document');

$menu->document->add('<span>'.__('messages.list_form_title',['form' => trans('messages.document') ]).'</span>', [ 'class' => 'sidebar-layout' , 'route' => ['document.index']])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M16 4.00195C18.175 4.01406 19.3529 4.11051 20.1213 4.87889C21 5.75757 21 7.17179 21 10.0002V16.0002C21 18.8286 21 20.2429 20.1213 21.1215C19.2426 22.0002 17.8284 22.0002 15 22.0002H9C6.17157 22.0002 4.75736 22.0002 3.87868 21.1215C3 20.2429 3 18.8286 3 16.0002V10.0002C3 7.17179 3 5.75757 3.87868 4.87889C4.64706 4.11051 5.82497 4.01406 8 4.00195" stroke="currentColor" stroke-width="1.5"/>
<path d="M10.5 14L17 14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M7 14H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M7 10.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M7 17.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M10.5 10.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M10.5 17.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z" stroke="currentColor" stroke-width="1.5"/>
</svg>
')
->data('permission', 'document list')
->link->attr(array('class' => ''));

$menu->document->add('<span>'.__('messages.add_form_title',['form' => trans('messages.document')]).'</span>', array( 'class' => 'sidebar-layout', 'route' => 'document.create'))
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5"/>
<path d="M15 12L12 12M12 12L9 12M12 12L12 9M12 12L12 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
</svg>')
->data('permission', 'document add')
->link->attr(['class' => '']);


$menu->add('<span>'.__('messages.frontend_setting').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.frontend_setting').'</span></span>', ['route' => 'frontend_setting.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M15.5 9L15.6716 9.17157C17.0049 10.5049 17.6716 11.1716 17.6716 12C17.6716 12.8284 17.0049 13.4951 15.6716 14.8284L15.5 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M13.2939 7.16992L11.9998 11.9996L10.7058 16.8292" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M8.50019 9L8.32861 9.17157C6.99528 10.5049 6.32861 11.1716 6.32861 12C6.32861 12.8284 6.99528 13.4951 8.32861 14.8284L8.50019 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
<path d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z" stroke="currentColor" stroke-width="1.5"/>
</svg>')
->nickname('frontend_setting')
->data('role', ['admin','demo_admin'])
->link->attr(["class" => ""]);


$menu->add('<span>'.__('messages.setting').'</span><span class="custom-tooltip"><span class="tooltip-text">'.__('messages.setting').'</span></span>', ['route' => 'setting.index'])
->prepend('<svg class="mr-2" width="15" height="15" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5"/>
<path d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z" stroke="currentColor" stroke-width="1.5"/>
</svg>
')
->nickname('setting')
->data('role',  ['admin','demo_admin']);




})->filter(function ($item) {
return checkMenuRoleAndPermission($item);
});

@endphp
<div class="iq-sidebar sidebar-default">
    <div class="iq-sidebar-logo">
        <a href="{{ route('home') }}" class="header-logo">
            <img src="{{ getSingleMedia(imageSession('get'),'logo',null) }}" class="img-fluid rounded-normal light-logo site_logo_preview" alt="logo">
            <img src="{{ getSingleMedia(imageSession('get'),'logo',null) }}" class="img-fluid rounded-normal darkmode-logo site_logo_preview" alt="logo">
            <span class="white-space-no-wrap">{{ ucfirst(str_replace("_"," ",auth()->user()->user_type)) }}</span>
        </a>
        <div class="side-menu-bt-sidebar-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="text-light wrapper-menu" width="30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
    </div>
    <div class="side-menu-bt-sidebar wide-device-toggle">
        <span class="iq-toggle-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon arrow-active wrapper-menu" height="14" width="15" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </span>
    </div>
    <div class="data-scrollbar" data-scroll="1">
        <div class="user-profile">
            <div class="avatar">
            <img class="avatar-50 rounded-circle bg-light" alt="user-icon" src="{{ getSingleMedia(auth()->user(),'profile_image', null) }}">
            </div>
            <div class="user-info">
                <h5 class="user-email">{{auth()->user()->email}}</h5>
                <span class="user-name">{{auth()->user()->display_name}}</span>
            </div>
        </div>
        <nav class="iq-sidebar-menu">
            <ul id="iq-sidebar-toggle" class="side-menu">
                @include(config('laravel-menu.views.bootstrap-items'), ['items' => $MyNavBar->roots()])
            </ul>
        </nav>
        <div class="pt-5 pb-5"></div>
    </div>
</div>
