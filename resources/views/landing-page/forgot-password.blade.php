@extends('landing-page.layouts.headerremove')


@section('content')
<div>
    <div class="container-fluid px-lg-0 py-lg-0 pb-5">
        <div class="row min-vh-100 g-lg-0">
            <div class="col-xl-8 col-lg-7 mh-100">
                <div class="py-5 h-100 d-flex flex-column justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="text-center">
                            
                            @if ($sectionData && isset($sectionData['login_register']) && $sectionData['login_register'] == 1)
                                <div class="mb-5">
                                    <h3 class="text-capitalize mb-3">
                                    {{ $sectionData['title'] }}
                                    </h3>
                                    <p class="m-0">
                                    {{$sectionData['description']}}

                                    </p>
                                </div>
                                @php
                                    $loginregisterimage = Spatie\MediaLibrary\MediaCollections\Models\Media::where('collection_name', 'login_register_image')->first();
                                @endphp
                                @if($loginregisterimage)
                                    <img src="{{ url('storage/' . $loginregisterimage->id . '/' . $loginregisterimage->file_name) }}" alt="video-popup" class="img-fluid w-100 rounded">
                                @else
                                    <img src="{{asset('landing-images/general/login.webp ')}}" class="img-fluid" alt="log-in"/>
                                @endif
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 mh-100">
                <div class="py-5 px-3 bg-light h-100 d-flex flex-column justify-content-center">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10">
                            <div class="authontication-forms">
                                <div class="text-center mb-5 pb-lg-5">
                                    <h4 class="text-capitalize">{{__('auth.forgot_password')}}</h4>
                                </div>
                                <div class="iq-login-form">
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    @if(session('status'))
                                       <div class="alert alert-success" role="alert">
                                           {{ session('status') }}
                                       </div>
                                    @endif
                                    <form method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <label>{{__('landingpage.email')}} <span class="text-danger">*</span></label>
                                        <div class="input-group icon-right mb-5 custom-form-field">
                                            <input type="text" id="email" name="email" class="form-control" placeholder="{{__('placeholder.email')}}"
                                                aria-label="Username" aria-describedby="basic-addon1" required>
                                                <small class="help-block with-errors text-danger"></small>
                                        </div>

                                        <div class="login-submit">
                                            <button class="btn btn-primary w-100 text-capitalize" type="submit">{{__('auth.reset_password')}}</button>
                                        </div>
                                    </form>

                                    <div class="text-center mt-4 text-signup">
                                        <label class="m-0 text-capitalize">{{__('auth.already_have_account')}} </label>
                                        <a href="{{route('user.login')}}" class="btn-link p-0 align-baseline ms-1">{{__('auth.sign_in')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
