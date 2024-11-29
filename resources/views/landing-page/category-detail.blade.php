@extends('landing-page.layouts.default')


@section('content')
<div class="section-padding">
    <div class="container">

        <div class="category-tab-list">
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="mb-2 text-capitalize">{{ $category->name }}</h4>
                    <p class="readmore-text m-0">{{ $category->description }}</p>
                    <a href="javascript:void(0);" class="readmore-btn">{{__('landingpage.read_more')}}</a>
                    <ul class="nav nav-tabs align-items-start gap-5 bg-transparent pb-0 mt-5 mb-0">
                        <li class="nav-item">
                            <a class="nav-link rounded-3 active" data-bs-toggle="tab" href="#all">
                                <div class="category-tabs-image">
                                    <img src="{{asset('landing-images/category/all.webp') }}" alt="service" class="img-fluid avatar-45">
                                </div>
                                <span class="category-title d-block mt-2 font-size-14">{{__('landingpage.all')}}</span>
                            </a>
                        </li>
    
                        @foreach($sub_category as $subCategory)
                            <li class="nav-item">
                                <a class="nav-link rounded-3" data-bs-toggle="tab" href="#id-{{ $subCategory->id }}">
                                    <div class="category-tabs-image">
                                        <img src="{{getSingleMedia($subCategory,'subcategory_image', null)}}" alt="service" class="img-fluid avatar-45">
                                    </div>
                                    <span class="category-title d-block mt-2 font-size-14">{{ $subCategory->name }}</span>
                                </a>
                            </li>
                        @endforeach
                        @if(count($sub_category) == 5)
                        <li class="nav-item">
                            <a href="{{ route('subcategory.list', ['category_id' => $category->id]) }}" class="nav-link rounded-3">
                                <div class="category-tabs-image">
                                    <svg class="svg-icon" height="45" width="45" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M602.763636 512L442.181818 351.418182c-13.963636-13.963636-13.963636-34.909091 0-48.872727 13.963636-13.963636 34.909091-13.963636 48.872727 0l186.181819 186.181818c13.963636 13.963636 13.963636 34.909091 0 48.872727l-186.181819 186.181818c-13.963636 13.963636-34.909091 13.963636-48.872727 0-13.963636-13.963636-13.963636-34.909091 0-48.872727l160.581818-162.909091zM512 1024C228.072727 1024 0 795.927273 0 512S228.072727 0 512 0s512 228.072727 512 512-228.072727 512-512 512z m0-46.545455c256 0 465.454545-209.454545 465.454545-465.454545S768 46.545455 512 46.545455 46.545455 256 46.545455 512s209.454545 465.454545 465.454545 465.454545z" fill="currentColor"></path>
                                    </svg>
                                </span>
                                <span class="category-title text-center d-block mt-2 font-size-14">{{__('landingpage.view_more')}}</span>
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-8 mt-lg-0 mt-5">
                    <div class="tab-content">
                        @php 
                            if(!empty(auth()->user()) && auth()->user()->hasRole('user')){
                                $auth_user_id=auth()->user()->id;
                                $favourite = App\Models\UserFavouriteService::where('user_id',$auth_user_id)->get();
                            }
                            else{
                                $auth_user_id=null;
                                $favourite=null;
                            }
 
                            $serviceData = array_slice($service, 0, 6); 
                        @endphp
        
                        <div class="tab-pane active show" id="all">
                                <service-list-section :user_id="{{json_encode($auth_user_id)}}" :service="{{ json_encode($serviceData) }}" :favourite="{{json_encode($favourite)}}" ></service-list-section>
                        </div>
                        @foreach($sub_category as $subCategory)
                            @php
                                $filteredServices = array_filter($service, function ($item) use ($subCategory) {
                                    return $item->subcategory_id == $subCategory->id;
                                });
                            @endphp
        
                            <div class="tab-pane" id="id-{{ $subCategory->id }}">
                                <service-list-section :user_id="{{json_encode($auth_user_id)}}" :service="{{ json_encode(array_values($filteredServices)) }}" :favourite="{{json_encode($favourite)}}"></service-list-section>
                            </div>
                        @endforeach
        
                    </div>
                    @if(count($service)>6)
                    <div class="text-center mt-5">
                        <a href="{{route('service.list', ['category_id' => $category->id])}}" class="btn btn-primary text-capitalize">{{__('messages.view_all')}}</a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
