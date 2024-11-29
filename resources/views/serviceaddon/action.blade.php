
<?php
    $auth_user= authSession();
?>
{{ Form::open(['route' => ['serviceaddon.destroy', $serviceaddon->id], 'method' => 'delete','data--submit'=>'serviceaddon'.$serviceaddon->id]) }}
@if(auth()->user()->hasAnyRole(['admin','provider','demo_admin']))
<div class="d-flex justify-content-end align-items-center">
        <a class="mr-2" href="{{ route('serviceaddon.destroy', $serviceaddon->id) }}" data--submit="serviceaddon{{$serviceaddon->id}}"
            data--confirmation='true'
            data--ajax="true"
            data-datatable="reload"
            data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.service_addon') ]) }}"
            title="{{ __('messages.delete_form_title',['form'=>  __('messages.service_addon') ]) }}"
            data-message='{{ __("messages.delete_msg") }}'>
            <i class="far fa-trash-alt text-danger"></i>
        </a>
    </div>
@endif
{{ Form::close() }}
