<div class="page-title-wrap mb-3 p-3">
    <h2 class="page-title">{{__('messages.handyman_detail')}}</h2>
</div>


<div class="mb-3 ms-2">
    <ul class="nav nav--tabs nav--tabs__style2 provider-detail-tab">
        <li class="nav-item {{request()->routeIs('handyman.detail') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('handyman.detail',$handymandata->id) }}"> {{__('messages.overview')}}</a>
        </li>
       
        <li class="nav-item {{request()->routeIs('handymanpayout.show') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('handymanpayout.show',$handymandata->id) }}">{{__('messages.list_form_title',['form' => __('messages.provider_payout')])}}</a>
        </li>
       
    </ul>
</div>