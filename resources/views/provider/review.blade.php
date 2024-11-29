<x-master-layout>
    {{ Form::open(['route' => ['provider.destroy', $providerdata->id], 'method' => 'delete','data--submit'=>'provider'.$providerdata->id]) }}
    <main class="main-area">
        <div class="main-content">
            <div class="container-fluid">
                @include('partials._provider')
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="review-tab-pane">

                        <div class="card mb-30">
                            <div class="card-body p-30">
                                <div class="row">
                                    <div class="col-lg-5 mb-30 mb-lg-0 d-flex justify-content-center">
                                        <div class="rating-review-wrapper">
                                            <div class="rating-review">
                                                <h2 class="rating-review__title">
                                                    <span class="rating-review__out-of">{{round($providerdata->getServiceRating->avg('rating'), 1)}}</span>{{__('messages./5')}}
                                                </h2>
                                                @php $rating = round($providerdata->getServiceRating->avg('rating'), 1); @endphp
                                                <div class="rating-icons">
                                                    @foreach(range(1,5) as $i)                                               
                                                        <span class="fa-stack" style="width:1em">
                                                            <i class="far fa-star fa-stack-1x"></i>
                                                            @if($rating >0)
                                                            @if($rating >0.5)
                                                            <i class="fas fa-star fa-stack-1x"></i>
                                                            @else
                                                            <i class="fas fa-star-half fa-stack-1x"></i>
                                                            @endif
                                                            @endif
                                                            @php $rating--; @endphp
                                                        </span>                                                
                                                    @endforeach
                                                </div>
                                                <div class="rating-review__info d-flex flex-wrap gap-3">
                                                    <span>{{$providerdata->getServiceRating->sum('rating')}} {{__('messages.rating')}}</span>
                                                    <span>{{count($providerdata->getServiceRating)}} {{__('messages.review')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <ul class="common-list common-list__style2 rating-progress after-none gap-10">
                                            <li class="excellent">
                                                <span class="review-name">{{__('messages.excellent')}}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: {{ $providerdata->getServiceRating->where('rating','5.0')->count('rating') }}%" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="review-count">{{ $providerdata->getServiceRating->where('rating','5.0')->count('rating') }}</span>
                                            </li>
                                            <li class="good">
                                                <span class="review-name">{{__('messages.good')}}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $providerdata->getServiceRating->where('rating','4.0')->count('rating') }}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="review-count">{{ $providerdata->getServiceRating->where('rating','4.0')->count('rating') }}</span>
                                            </li>
                                            <li class="avarage">
                                                <span class="review-name">{{__('messages.avarage')}}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $providerdata->getServiceRating->where('rating','3.0')->count('rating') }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="review-count">{{ $providerdata->getServiceRating->where('rating','3.0')->count('rating') }}</span>
                                            </li>
                                            <li class="below-avarage">
                                                <span class="review-name">{{__('messages.below_avarage')}}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width:  {{ $providerdata->getServiceRating->where('rating','2.0')->count('rating') }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="review-count">{{ $providerdata->getServiceRating->where('rating','2.0')->count('rating') }}</span>
                                            </li>
                                            <li class="poor">
                                                <span class="review-name">{{__('messages.poor')}}</span>
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width:  {{ $providerdata->getServiceRating->where('rating','1.0')->count('rating') }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="review-count">{{ $providerdata->getServiceRating->where('rating','1.0')->count('rating') }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card">
                            <div class="card-body">
                                <div class="row justify-content-between">
                                    <div>
                                        <div class="col-md-12">
                                            <h5 class="card-title">{{__('messages.Review')}}</h5>
                                        </div>
                                    </div>
                                        
                                </div>  
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
                    </div>
                </div>
            </div>
        </div>
    </main>
    {{ Form::close() }}
    @section('bottom_script')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', (event) => {
        window.renderedDataTable = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                autoWidth: false,
                responsive: true,
                dom: '<"row align-items-center"><"table-responsive my-3" rt><"row align-items-center" <"col-md-6" l><"col-md-6" p>><"clear">',
                ajax: {
                "type"   : "GET",
                "url" : '{{ route("provider.review", ["id" => $providerdata->id]) }}',
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
                        data: 'date',
                        name: 'date',
                        title: "{{__('messages.date')}}"
                    },
                    {
                        data: 'rating',
                        name: 'rating',
                        title: "{{__('messages.rating')}}"
                    },
                    {
                        data: 'review',
                        name: 'review',
                        title: "{{__('messages.review')}}"
                    },
                
                ]
                
            });
        });
    </script>
    @endsection
</x-master-layout>

