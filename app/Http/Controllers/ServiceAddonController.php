<?php

namespace App\Http\Controllers;

use App\Models\ServiceAddon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ServiceAddonRequest;

class ServiceAddonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $filter = [
            'status' => $request->status,
        ];
        $pageTitle = __('messages.list_form_title',['form' => __('messages.service_addon')] );
        $auth_user = authSession();
        $assets = ['datatable'];
        return view('serviceaddon.index', compact('pageTitle','auth_user','assets','filter'));
    }
    public function index_data(DataTables $datatable,Request $request)
    {
        $query = ServiceAddon::query()->ServiceAddon();

        $filter = $request->filter;

        if (isset($filter)) {
            if (isset($filter['column_status'])) {
                $query->where('status', $filter['column_status']);
            }
        }
        if (auth()->user()->hasAnyRole(['admin'])) {
            $query= $query;
        }
        return $datatable->eloquent($query)
            ->addColumn('check', function ($row) {

                return '<input type="checkbox" class="form-check-input select-table-row"  id="datatable-row-'.$row->id.'"  name="datatable_ids[]" value="'.$row->id.'" onclick="dataTableRowCheck('.$row->id.',this)">';
            })
            ->editColumn('status' , function ($query){
                return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                    <div class="custom-switch-inner">
                        <input type="checkbox" class="custom-control-input  change_status" data-type="serviceaddon_status" '.($query->status ? "checked" : "").'  value="'.$query->id.'" id="'.$query->id.'" data-id="'.$query->id.'">
                        <label class="custom-control-label" for="'.$query->id.'" data-on-label="" data-off-label=""></label>
                    </div>
                </div>';
            })
            ->editColumn('name', function($query){
                return '<a class="btn-link btn-link-hover"  href='.route('serviceaddon.create', ['id' => $query->id]).'>'.$query->name.'</a>';
            })

            ->editColumn('service_id', function ($query) {
                return ($query->service_id != null && isset($query->service)) ? $query->service->name : '-';
            })
            ->editColumn('price', function ($query) {
                return ($query->price != null && isset($query->price)) ? getPriceFormat($query->price) : '-';
            })
            ->addColumn('action', function ($serviceaddon) {
                return view('serviceaddon.action', compact('serviceaddon'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'status','name','check','price'])
            ->toJson();
    }

    public function bulk_action(Request $request)
    {
        $ids = explode(',', $request->rowIds);

        $actionType = $request->action_type;

        $message = 'Bulk Action Updated';

        switch ($actionType) {
            case 'change-status':
                $branches = ServiceAddon::whereIn('id', $ids)->update(['status' => $request->status]);
                $message = 'Bulk Category Status Updated';
                break;

            case 'delete':
                ServiceAddon::whereIn('id', $ids)->delete();
                $message = 'Bulk Category Deleted';
                break;

            default:
                return response()->json(['status' => false, 'message' => 'Action Invalid']);
                break;
        }

        return response()->json(['status' => true, 'message' => $message]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $id = $request->id;
        $auth_user = authSession();
        $serviceaddon = ServiceAddon::find($id);
        $pageTitle = trans('messages.update_form_title',['form'=>trans('messages.service_addon')]);
        
        if($serviceaddon == null){
            $pageTitle = trans('messages.add_button_form',['form' => trans('messages.service_addon')]);
            $serviceaddon = new ServiceAddon;
        }
        
        return view('serviceaddon.create', compact('pageTitle' ,'serviceaddon' ,'auth_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceAddonRequest $request)
    {
        //
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();

        $data['created_by'] = auth()->user()->id;
       
        $result = ServiceAddon::updateOrCreate(['id' => $data['id'] ],$data);
        
            storeMediaFile($result,$request->serviceaddon_image, 'serviceaddon_image');
        

        $message = trans('messages.update_form',['form' => trans('messages.service_addon')]);
        if($result->wasRecentlyCreated){
            $message = trans('messages.save_form',['form' => trans('messages.service_addon')]);
        }
        if($request->is('api/*')) {
            $response = [
                'message'=>$message,
            ];
            return comman_custom_response($response);
		}
        return redirect(route('serviceaddon.index'))->withSuccess($message); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceAddon  $serviceAddon
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceAddon $serviceAddon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceAddon  $serviceAddon
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceAddon $serviceAddon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceAddon  $serviceAddon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceAddon $serviceAddon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceAddon  $serviceAddon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $serviceaddon = ServiceAddon::find($id);
        $msg= __('messages.msg_fail_to_delete',['item' => __('messages.service_addon')] );
        
        if($serviceaddon != '') { 
            $serviceaddon->delete();
            $msg= __('messages.msg_deleted',['name' => __('messages.service_addon')] );
        }
        if(request()->is('api/*')){
            return comman_custom_response(['message'=> $msg , 'status' => true]);
        }
        return comman_custom_response(['message'=> $msg, 'status' => true]);
    }
}
