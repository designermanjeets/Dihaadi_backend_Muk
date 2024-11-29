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
                                    <h4 class="text-capitalize">{{__('auth.signup')}}</h4>
                                </div>
                                <div class="iq-login-form">
                                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                    <form id="providerregisterForm" method="POST"  data-toggle="validator">
                                        {{csrf_field()}}
                                        <div class="form-group icon-right mb-5 custom-form-field">
                                            <label>{{__('auth.first_name')}} <span class="text-danger">*</span></label>
                                            <input type="text" id="first_name" name="first_name" class="form-control" placeholder="{{__('placeholder.first_name')}}" aria-label="firstname"
                                            aria-describedby="basic-addon1" required>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>


                                        <div class="form-group icon-right mb-5 custom-form-field">
                                            <label>{{__('auth.last_name')}} <span class="text-danger">*</span></label>
                                            <input type="text" id="last_name" name="last_name" class="form-control" placeholder="{{__('placeholder.last_name')}}" aria-label="lastname" aria-describedby="basic-addon2" required>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>


                                        <div class="form-group icon-right mb-5 custom-form-field">
                                            <label>{{__('landingpage.user_name')}} <span class="text-danger">*</span></label>
                                            <input type="text" id="username" name="username" class="form-control" placeholder="{{__('placeholder.user_name')}}" aria-label="Username" aria-describedby="basic-addon3" required>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>

                                        <div class="form-group icon-right mb-5 custom-form-field">
                                            <label>{{__('landingpage.email')}} <span class="text-danger">*</span></label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="{{__('placeholder.email')}}" aria-label="Email Address" aria-describedby="basic-addon4" required>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>

                                        <div class="form-group icon-right mb-5 custom-form-field">
                                            <label>{{__('landingpage.your')}} {{__('auth.login_password')}} <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" id="password" name="password" class="form-control" placeholder="{{__('placeholder.login_password')}}" aria-label="Password" aria-describedby="togglePasswordIcon" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" onclick="togglePassword('password', 'togglePasswordIcon')">
                                                        <i class="fa fa-eye-slash" id="togglePasswordIcon" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>

                                        <div class="form-group icon-right mb-5 custom-form-field">
                                            <label>{{__('auth.confirm_password')}}<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="{{__('placeholder.login_password')}}" aria-label="Password" aria-describedby="toggleConfirmPasswordIcon" data-match="#password" data-match-error="Password not match" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" onclick="togglePassword('password_confirmation', 'toggleConfirmPasswordIcon')">
                                                        <i class="fa fa-eye-slash" id="toggleConfirmPasswordIcon" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>


                                        <div class="form-group icon-right mb-5 custom-form-field">
                                            <label>{{__('auth.contact_number')}} <span class="text-danger">*</span></label>
                                            <input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="{{__('placeholder.contact_number')}} " aria-label="cnumber"
                                            aria-describedby="basic-addon6" required>
                                            <small class="help-block with-errors text-danger"></small>
                                        </div>


                                        <div class="custom-form-field">
                                            <label>{{__('messages.user_type')}}</label>
                                            <select name="user_type" class="form-control select2 mb-5" id="status" style="width:100%">
                                                <option value="provider">{{__('messages.provider')}}</option>
                                                <option value="handyman">{{__('messages.handyman')}}</option>
                                            </select>
                                        </div>

                                        <div class="form-group icon-right mb-5 custom-form-field">
                                            <label>{{__('messages.designation')}}</label>
                                            <input type="text" id="designation" name="designation" class="form-control" placeholder="{{__('placeholder.designation')}}" aria-label="designation"
                                            aria-describedby="basic-addon6" required>
                                        </div>

                                        <!-- <input type="hidden" name="register" value="user_register"> -->

                                        <div class="login-submit">
                                            <button class="btn btn-primary w-100 text-capitalize" type="submit">{{__('messages.register')}}</button>
                                        </div>
                                    </form>

                                    <div class="text-center mt-4 text-signup">
                                        <label class="m-0 text-capitalize"> {{__('auth.already_have_account')}}</label>
                                        <a href="{{route('user.login')}}" class="btn-link align-baseline">{{__('auth.sign_in')}}</a>
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>

$(document).ready(function() {
        const baseUrl = document.querySelector('meta[name="baseUrl"]').getAttribute('content');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $('#providerregisterForm').submit(function(e) {

            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                method: 'post',
                url: baseUrl+'/api/register',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if(response.data){

                         var email = $('input[name="email"]').val();
                         var password = $('input[name="password"]').val();

                        $.ajax({
                            method: 'post',
                            url: baseUrl+'/api/login',
                           data: {
                                   _token: csrfToken,
                                  email: email,
                                  password: password,
                                },
                            dataType: 'json',
                            success: function(response) {
                                if(response.data){

                                  window.location.href = baseUrl+'/';

                                }
                            },
                            error: function(xhr, status, error) {

                                 $('#error').removeClass('d-none')

                                 $('#error').text(xhr.responseJSON.message)

                            }
                        });

                    }
                },
                error: function(error) {

                     $('#error').removeClass('d-none')

                     $('#error').text(error.responseJSON.message)

                }
            });
        });
    });



    function togglePassword(passwordInputId, iconId) {
    const passwordInput = document.getElementById(passwordInputId);
    const icon = document.getElementById(iconId);
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
    icon.className = type === 'password' ? 'fa fa-eye-slash' : 'fa fa-eye';
}
</script>
