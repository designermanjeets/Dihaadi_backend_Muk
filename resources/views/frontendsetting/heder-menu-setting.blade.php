{{ Form::model($landing_page_data, ['method' => 'POST', 'route' => ['heading_page_settings'], 'enctype' => 'multipart/form-data', 'data-toggle' => 'validator', 'id' => 'myForm']) }}

{{ Form::hidden('id', null, ['placeholder' => 'id', 'class' => 'form-control']) }}
{{ Form::hidden('type', $page, ['placeholder' => 'id', 'class' => 'form-control']) }}
<div class="row">
    <div class="form-group col-md-12 d-flex justify-content-between">
        <label for="enable_header_setting">{{__('messages.enable_header_setting')}}</label>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input header_setting" name="status" id="header_setting" data-type="header_setting" {{ !empty($landing_page_data) && $landing_page_data->status ? 'checked' : '' }}>
            <label class="custom-control-label" for="header_setting"></label>
        </div>
    </div>
</div>

<div class="row" id='enable_header_setting'>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body setting-pills">
                <div class="row">
                    <div class="col-sm-12 col-lg-12">
                    @if(!empty($landing_page_data) && $landing_page_data->status)
                    
                            <ul class="nav flex-column nav-pills nav-fill tabslink list" id="tabs-text" role="tablist">
                                @php
                                    $valueArray = json_decode($landing_page_data->value, true);
                                @endphp

                                @foreach($valueArray as $key => $value)
                                    @if(in_array($key, ['home', 'service', 'provider', 'categories', 'bookings']))
                                        <li class="nav-item list-item" data-section="{{ $key }}" draggable=true>
                                            <div class="form-group d-flex justify-content-between mb-0">
                                                <label for="{{ $key }}" class="mb-0">{{ __('messages.' . $key) }}</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" name="{{ $key }}" id="{{ $key }}" {{ $value ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="{{ $key }}"></label>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @else
                        <ul class="nav flex-column nav-pills nav-fill tabslink list" id="tabs-text" role="tablist">
                            <li class="nav-item list-item" data-section="home" draggable=true>
                                <div class="form-group d-flex justify-content-between mb-0">
                                    <label for="home" class="mb-0">{{ __('messages.home') }}</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="home" id="home" {{ !empty($landing_page_data->home) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="home"></label>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item list-item" data-section="service" draggable=true>
                                <div class="form-group d-flex justify-content-between mb-0">
                                    <label for="service" class="mb-0">{{ __('messages.services') }}</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="service" id="service" {{ !empty($landing_page_data->service) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="service"></label>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item list-item" data-section="provider" draggable=true>
                                <div class="form-group d-flex justify-content-between mb-0">
                                    <label for="provider" class="mb-0">{{ __('messages.providers') }}</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="provider" id="provider" {{ !empty($landing_page_data->provider) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="provider"></label>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item list-item" data-section="categories" draggable=true>
                                <div class="form-group d-flex justify-content-between mb-0">
                                    <label for="categories" class="mb-0">{{ __('messages.categories') }}</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="categories" id="categories" {{ !empty($landing_page_data->categories) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="categories"></label>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item list-item" data-section="blogs" draggable=true>
                                <div class="form-group d-flex justify-content-between mb-0">
                                    <label for="blogs" class="mb-0">{{ __('messages.blogs') }}</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="blogs" id="blogs" {{ !empty($landing_page_data->blogs) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="blogs"></label>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item list-item" data-section="bookings" draggable=true>
                                <div class="form-group d-flex justify-content-between mb-0">
                                    <label for="blogs" class="mb-0">{{ __('messages.bookings') }}</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="bookings" id="bookings" {{ !empty($landing_page_data->bookings) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="bookings"></label>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item list-item" data-section="post_job" draggable=true>
                                <div class="form-group d-flex justify-content-between mb-0">
                                    <label for="blogs" class="mb-0">{{ __('messages.post_job') }}</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="post_job" id="post_job" {{ !empty($landing_page_data->job_post) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="post_job"></label>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        @endif
                        <div class="form-padding-box mt-3">
                            <div class="form-group d-flex justify-content-between mb-1">
                                <label for="enable_language">{{__('messages.enable_language')}}</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="enable_language" id="enable_language" {{ !empty($landing_page_data->enable_language) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="enable_language"></label>
                                </div>
                            </div>
                            <div class="form-group mb-0 d-flex justify-content-between mb-1">
                                <label for="enable_darknight_mode" class="mb-0">{{__('messages.enable_darknight_mode')}}</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="enable_darknight_mode" id="enable_darknight_mode" {{ !empty($landing_page_data->enable_darknight_mode) ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="enable_darknight_mode"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{ Form::submit(__('messages.save'), ['class' => "btn btn-md btn-primary float-md-right"]) }}
{{ Form::close() }}

<script>
        var enable_header_setting = $("input[name='status']").prop('checked');
    checkSection1(enable_header_setting);

    $('#header_setting').change(function () {
        value = $(this).prop('checked') == true ? true : false;
        checkSection1(value);
    });

    function checkSection1(value) {
        if (value == true) {
            $('#enable_header_setting').removeClass('d-none');
        } else {
            $('#enable_header_setting').addClass('d-none');
        }
    }

    const listItems = document.querySelectorAll('.list-item');

    listItems.forEach(function (item) {
        item.addEventListener('dragstart', function (e) {
            e.dataTransfer.setData('text', e.target.id);
        });

        item.addEventListener('dragover', function (e) {
            e.preventDefault();
            const dragging = document.querySelector('.dragging');
            const bounding = this.getBoundingClientRect();
            const offset = e.clientY - bounding.top - bounding.height / 2;
            const next = offset > 0 ? this : this.previousElementSibling;

            if (next && dragging !== next) {
                dragging.parentNode.removeChild(dragging);
                next.parentNode.insertBefore(dragging, offset > 0 ? next.nextSibling : next);
            }
        });
    });

    document.addEventListener('dragstart', function (e) {
        if (e.target.classList.contains('list-item')) {
            e.target.classList.add('dragging');
        }
    });

    document.addEventListener('dragend', function (e) {
        if (e.target.classList.contains('list-item')) {
            e.target.classList.remove('dragging');
            updateOrder();
        }
    });

    function updateOrder() {
        const sections = ['home', 'service', 'provider', 'categories', 'blogs'];
        const order = {};
        sections.forEach(function (section) {
            const sectionItems = Array.from(document.querySelectorAll(`.list-item[data-section="${section}"]`));
            const itemOrder = sectionItems.map(function (item) {
                return item.id;
            });
            order[section] = itemOrder;
        });

        // console.log(order); 
    }
    $('#myForm').submit(function () {
        $(':checkbox').each(function () {
            $(this).after('<input type="hidden" name="' + this.name + '" value="' + ($(this).is(':checked') ? 'on' : 'off') + '">');
        });
    });
</script>