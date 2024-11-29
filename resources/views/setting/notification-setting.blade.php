{{ Form::model($data,['method' => 'POST','route' => ['notificationtemplates.settings.update'],'enctype'=>'multipart/form-data','data-toggle'=>'validator']) }}

{{ Form::hidden('id', null, array('placeholder' => 'id','class' => 'form-control')) }}
{{ Form::hidden('page', $page, array('placeholder' => 'id','class' => 'form-control')) }}

    <div class="col-md-12 mt-10 w-100">
        <div class="table-responsive notification-setting-table">
            <table class="table table-condensed">
                <thead>
                <tr>
                    <th>{{__('messages.type')}}</th>
                    <th>{{__('messages.template')}}</th>
                    @foreach($notificationChannels as $key => $value)
                        <th>{{ $value }}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                    @foreach($data as $templateData)
                        <tr>
                            <td>{{ $templateData['type'] }}</td>
                            <td>{{ $templateData['template'] }}</td>
                            <td>
                                <input type="hidden" name="template_channels[{{ $templateData['id'] }}][IS_MAIL]" value="0">
                                <input type="checkbox" name="template_channels[{{ $templateData['id'] }}][IS_MAIL]" value="1" {{ $templateData['channels']['IS_MAIL'] ? 'checked' : '' }}>
                            </td>
                            <td>
                                <input type="hidden" name="template_channels[{{ $templateData['id'] }}][PUSH_NOTIFICATION]" value="0">
                                <input type="checkbox" name="template_channels[{{ $templateData['id'] }}][PUSH_NOTIFICATION]" value="1" {{ $templateData['channels']['PUSH_NOTIFICATION'] ? 'checked' : '' }}>
                            </td>
    
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

{{ Form::submit(__('messages.save'), ['class'=>"btn btn-md btn-primary float-md-right"]) }}
{{ Form::close() }}
