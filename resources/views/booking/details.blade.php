<x-master-layout>
    <!-- {{ Form::open(['route' => ['provider.destroy', $providerdata->id], 'method' => 'delete','data--submit'=>'provider'.$providerdata->id]) }}
    {{ Form::close() }}-->
    <div class="container-fluid">
    @include('partials._provider')
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-block card-stretch">
                    <div class="card-body p-0">
                        <div class="d-flex justify-content-between align-items-center p-3 flex-wrap gap-3">
                            <h5 class="font-weight-bold">{{ $pageTitle ?? trans('messages.list') }}</h5>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="float-right ">
                                <div class="d-flex justify-content-end">
                                    
                                    <div class="input-group ml-auto">
                                        <span class="input-group-text" id="addon-wrapping"><i class="fas fa-search"></i></span>
                                        <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search" aria-describedby="addon-wrapping" aria-controls="dataTableBuilder">
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                    <table id="datatable" class="table table-striped border">

                                    </table>
                            </div>
                        </div>
                    </div>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {

        window.renderedDataTable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                dom: '<"row align-items-center"><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" l><"col-md-6" p>><"clear">',
                ajax: {
                  "type"   : "GET",
                  "url" : '{{ route("booking.details", ["id" => $providerdata->id]) }}',
                  "data"   : function( d ) {
                    d.search = {
                      value: $('.dt-search').val()
                    };
                    d.filter = {
                      column_status: $('#column_status').val()
                    }
                  },
                },
                columns: [
                    { 
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        title: "{{__('messages.id')}}",
                        
                    },
                    {
                        data: 'provider_name',
                        name: 'provider_name',
                        title: "{{__('messages.provider_name')}}"
                    },
                    {
                        data: 'provider_contact',
                        name: 'provider_contact',
                        title: "{{__('messages.provider_contact')}}"
                    },
                    {
                        data: 'amount',
                        name: 'amount',
                        title: "{{__('messages.amount')}}"
                    },
                    {
                        data: 'payment_status',
                        name: 'payment_status',
                        title: "{{__('messages.payment_status')}}"
                    },
                    {
                        data: 'start_at',
                        name: 'start_at',
                        title: "{{__('messages.start_at')}}"
                    },
                    {
                        data: 'end_at',
                        name: 'end_at',
                        title: "{{__('messages.end_at')}}"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        title: "{{__('messages.action')}}"
                    }
                    
                ]
                
            });
      });

    

    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</x-master-layout>