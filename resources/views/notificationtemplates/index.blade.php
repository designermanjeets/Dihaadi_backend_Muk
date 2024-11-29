@extends('backend.layouts.app')

@section('title') {{ __($module_action) }} {{ __($module_title) }} @endsection



@section('content')
<div class="card">
    <div class="card-body">

        <x-backend.section-header>
            <i class="{{ $module_icon }}"></i> {{ $module_title }} <small class="text-muted">{{ __($module_action) }}</small>

            <x-slot name="subtitle">
                @lang(":module_name Management Dashboard", ['module_name'=>Str::title($module_name)])
            </x-slot>
            <x-slot name="toolbar">
                @can('add_'.$module_name)
                <x-buttons.create route='{{ route("backend.notification-templates.create") }}' title="{{__('Create')}} {{ __($module_title) }}" />
                @endcan

                @can('restore_'.$module_name)
                <div class="btn-group">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" data-bs-target="#module-dropdown-01" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                    </button>
                    <ul class="dropdown-menu" id="module-dropdown-01">
                        <li>
                            <a class="dropdown-item" href='{{ route("backend.notification-templates.trashed") }}'>
                                <i class="fas fa-eye-slash"></i> View trash
                            </a>
                        </li>
                    </ul>
                </div>
                @endcan
            </x-slot>
        </x-backend.section-header>
        <div class="row mt-4">
          <div class="col">
              <table id="datatable" class="table table-striped border table-responsive">
                  <tbody>
                      @foreach($$module_name as $module_name_singular)
                      <tr>
                          <td>
                              {{ $module_name_singular->id }}
                          </td>
                          <td>
                              <a href="{{ url("app/$module_name", $module_name_singular->id) }}">{{ $module_name_singular->name }}</a>
                          </td>
                          <td>
                              {{ $module_name_singular->updated_at->diffForHumans() }}
                          </td>
                          <td>
                              {{ $module_name_singular->created_by }}
                          </td>
                          <td class="text-end">
                              <a href='{!!route("backend.$module_name.edit", $module_name_singular)!!}' class='btn btn-sm btn-primary mt-1' data-bs-toggle="tooltip" title="Edit {{ __($module_title) }}"><i class="fas fa-wrench"></i></a>
                              <a href='{!!route("backend.$module_name.show", $module_name_singular)!!}' class='btn btn-sm btn-success mt-1' data-bs-toggle="tooltip" title="Show {{ __($module_title) }}"><i class="fas fa-tv"></i></a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <div class="card-footer">
      <div class="row">
          <div class="col-7">
              <div class="float-left">
                  Total {{ $$module_name->total() }} {{ __($module_name) }}
              </div>
          </div>
          <div class="col-5">
              <div class="float-end">
                  {!! $$module_name->render() !!}
              </div>
          </div>
      </div>
  </div>
</div>
@endsection

