<?php
$auth_user= authSession();
?>

{{ Form::open(['route' => ['notification-templates.destroy',$data->id], 'method' => 'delete','data--submit'=>'notificationtemplates'.$data->id]) }}
<div class="d-flex justify-content-end align-items-center">
    
<a class="mr-2" href="{{ route('notification-templates.edit', ['notification_template' => $data->id]) }}" title="{{ __('messages.update_form_title',['form' => __('messages.notification_templates') ]) }}"><i class="fas fa-pen text-secondary"></i></a>

@if(auth()->user()->hasAnyRole(['admin']))
    <a class="mr-3" href="{{ route('notification-templates.destroy', $data->id) }}" data--submit="notificationtemplates{{$data->id}}" 
        data--confirmation='true' 
        data--ajax="true"
        data-datatable="reload"
        data-title="{{ __('messages.delete_form_title',['form'=>  __('messages.payment') ]) }}"
        title="{{ __('messages.delete_form_title',['form'=>  __('messages.payment') ]) }}"
        data-message='{{ __("messages.delete_msg") }}'>
        <i class="far fa-trash-alt text-danger"></i>
    </a>
@endif
</div>
{{ Form::close() }}
