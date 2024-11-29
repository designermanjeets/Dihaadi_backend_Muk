<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Payment;
use App\Models\Role;
use Yajra\DataTables\DataTables;
use App\Http\Requests\UserRequest;
use Hash;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use App\Models\Setting;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = [
            'status' => $request->status,
        ];
        $pageTitle = __('messages.list_form_title',['form' => __('messages.customer')] );
        $assets = ['datatable'];
        $auth_user = authSession();
        if($request->status === 'all'){
            $pageTitle = __('messages.list_form_title',['form' => __('messages.all_user')] );
        }else if($request->status === 'unverified'){
            $pageTitle = __('messages.list_form_title',['form' => __('messages.unverified')] );
        }
        $list_status = $request->status;
        return view('customer.index', compact('list_status','pageTitle','assets','auth_user','filter'));
    }



   public function index_data(DataTables $datatable, Request $request)
{
    $query = User::query();
    $filter = $request->filter;

    if (isset($filter)) {
        if (isset($filter['column_status'])) {
            $query->where('status', $filter['column_status']);
        }
    }
    if (auth()->user()->hasAnyRole(['admin'])) {
        $query->withTrashed();
    }
    if ($request->list_status == 'all') {
        $query->whereNotIn('user_type', ['admin', 'demo_admin']);
    } else if ($request->list_status == 'unverified') {

        $usertype=['user','provider','handyman'];

        $query->whereIn('user_type', $usertype)->where('is_email_verified', 0);
    } else {
        $query->where('user_type', 'user');
    }

    $datatable = $datatable->eloquent($query)
        ->addColumn('check', function ($row) {
            return '<input type="checkbox" class="form-check-input select-table-row" id="datatable-row-' . $row->id . '"  name="datatable_ids[]" value="' . $row->id . '" data-type="user" onclick="dataTableRowCheck(' . $row->id . ',this)">';
        })
        ->editColumn('display_name', function ($query) {
            return view('customer.user', compact('query'));
        })
        ->editColumn('status', function ($query) {
            if ($query->status == '0') {
                $status = '<span class="badge badge-inactive">' . __('messages.inactive') . '</span>';
            } else {
                $status = '<span class="badge badge-active">' . __('messages.active') . '</span>';
            }
            return $status;
        })
        ->editColumn('address', function($query) {
            return ($query->address != null && isset($query->address)) ? $query->address : '-';
        })
        ->editColumn('created_at', function($query) {
            $sitesetup = Setting::where('type','site-setup')->where('key', 'site-setup')->first();
            $datetime = $sitesetup ? json_decode($sitesetup->value) : null;
           
            $formattedDate =  optional($datetime)->date_format && optional($datetime)->time_format
            ? date(optional($datetime)->date_format, strtotime($query->created_at)) . ' / ' . date(optional($datetime)->time_format, strtotime($query->created_at))
            : $query->created_at;
            return $formattedDate;
        })
        ->editColumn('is_email_verified', function ($query) {
            $disabled = $query->trashed() ? 'disabled': '';
            $reloadScript = '<script>$(document).on("change", ".change_status", function() { location.reload(); });</script>';
            return '<div class="custom-control custom-switch custom-switch-text custom-switch-color custom-control-inline">
                <div class="custom-switch-inner">
                    <input type="checkbox" class="custom-control-input  change_status" data-type="user_verify_email" data-name="is_email_verified" '.($query->is_email_verified ? "checked" : "").'  '.$disabled.' value="'.$query->id.'" id="'.$query->id.'" data-id="'.$query->id.'">
                    <label class="custom-control-label" for="'.$query->id.'" data-on-label="" data-off-label=""></label>
                </div>
            </div>'. $reloadScript;
        });
    if ($request->list_status !== 'unverified') {
        $datatable->addColumn('action', function ($user) {
            return view('customer.action', compact('user'))->render();
        });
    }

    $datatable->addIndexColumn()
        ->rawColumns(['check', 'display_name', 'action', 'status','is_email_verified']);

    return $datatable->toJson();
}

    /* bulck action method */
    public function bulk_action(Request $request)
    {
        $ids = explode(',', $request->rowIds);

        $actionType = $request->action_type;

        $message = 'Bulk Action Updated';

        switch ($actionType) {
            case 'change-status':
                $branches = User::whereIn('id', $ids)->update(['status' => $request->status]);
                $message = 'Bulk Customer Status Updated';
                break;

            case 'delete':
                User::whereIn('id', $ids)->delete();
                $message = 'Bulk Customer Deleted';
                break;
                            
            case 'restore':
                User::whereIn('id', $ids)->restore();
                $message = 'Bulk Customer Restored';
                break;
            
            case 'permanently-delete':
                User::whereIn('id', $ids)->forceDelete();
                $message = 'Bulk Customer Permanently Deleted';
                break;

            case 'restore':
                User::whereIn('id', $ids)->restore();
                $message = 'Bulk Provider Restored';
                break;
                
            case 'permanently-delete':
                User::whereIn('id', $ids)->forceDelete();
                $message = 'Bulk Provider Permanently Deleted';
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
        $id = $request->id;
        $auth_user = authSession();

        $customerdata = User::find($id);
        $pageTitle = __('messages.update_form_title',['form'=> __('messages.user')]);
        $roles = Role::where('status',1)->orderBy('name','ASC');    
        $roles = $roles->get();
        
        if($customerdata == null){
            $pageTitle = __('messages.add_button_form',['form' => __('messages.user')]);
            $customerdata = new User;
        }
        
        return view('customer.create', compact('pageTitle' ,'customerdata' ,'auth_user','roles' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $data = $request->all();
        $id = $data['id'];
        $data['user_type'] = $data['user_type'] ?? 'user';

        $data['display_name'] = $data['first_name']." ".$data['last_name'];
        // Save User data...
        if($id == null){
            $data['password'] = bcrypt($data['password']);
            $user = User::create($data);
        }else{
            $user = User::findOrFail($id);
            $user->removeRole($user->user_type);
            $user->fill($data)->update();
        }
        $user->assignRole($data['user_type']);
        $message = __('messages.update_form',[ 'form' => __('messages.user') ] );
		if($user->wasRecentlyCreated){
			$message = __('messages.save_form',[ 'form' => __('messages.user') ] );
		}

		return redirect(route('user.index'))->withSuccess($message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth_user = authSession();
        $customerdata = User::find($id);
        if(empty($customerdata))
        {
            $msg = __('messages.not_found_entry',['name' => __('messages.user')] );
            return redirect(route('user.index'))->withError($msg);
        }
        $customer_pending_trans  = Payment::where('customer_id', $id)->where('payment_status','pending')->get();
        $pageTitle = __('messages.view_form_title',['form'=> __('messages.user')]);
        return view('customer.view', compact('pageTitle' ,'customerdata' ,'auth_user','customer_pending_trans' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $user = User::find($id);
        $msg = __('messages.msg_fail_to_delete',['item' => __('messages.user')] );
        
        if($user != '') { 
            $user->delete();
            $msg = __('messages.msg_deleted',['name' => __('messages.user')] );
        }
        if(request()->is('api/*')) {
            return comman_message_response($msg);
		}
        return comman_custom_response(['message'=> $msg, 'status' => true]);
    }
    public function action(Request $request){
        if(demoUserPermission()){
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $id = $request->id;
        $user = User::withTrashed()->where('id',$id)->first();
        $msg = __('messages.not_found_entry',['name' => __('messages.user')] );
        if($request->type == 'restore') {
            $user->restore();
            $msg = __('messages.msg_restored',['name' => __('messages.user')] );
        }
        if($request->type === 'forcedelete'){
            $user->forceDelete();
            $msg = __('messages.msg_forcedelete',['name' => __('messages.user')] );
        }
        if(request()->is('api/*')) {
            return comman_message_response($msg);
		}
        return comman_custom_response(['message'=> $msg , 'status' => true]);
    }


    public function getChangePassword(Request $request){
        $id = $request->id;
        $auth_user = authSession();

        $customerdata = User::find($id);
        $pageTitle = __('messages.change_password',['form'=> __('messages.change_password')]);
        return view('customer.changepassword', compact('pageTitle' ,'customerdata' ,'auth_user'));
    }

    public function changePassword(Request $request)
    {
        if (demoUserPermission()) {
            return  redirect()->back()->withErrors(trans('messages.demo_permission_denied'));
        }
        $user = User::where('id', $request->id)->first();
        
        if ($user == "") {
            $message = __('messages.user_not_found');
            return comman_message_response($message, 400);
        }

        $validator = \Validator::make($request->all(), [
            'old' => 'required|min:8|max:255',
            'password' => 'required|min:8|confirmed|max:255',
        ]);

        if ($validator->fails()) {
            if ($validator->errors()->has('password')) {
                $message = __('messages.confirmed',['name' => __('messages.password')]);
                return redirect()->route('user.changepassword', ['id' => $user->id])->with('error', $message);
            }
            return redirect()->route('user.changepassword', ['id' => $user->id])->with('errors', $validator->errors());
        }

        $hashedPassword = $user->password;

        $match = Hash::check($request->old, $hashedPassword);

        $same_exits = Hash::check($request->password, $hashedPassword);
        if ($match) {
            if ($same_exits) {
                $message = __('messages.old_new_pass_same');
                return redirect()->route('user.changepassword',['id' => $user->id])->with('error', $message);
            }

            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();
            $message = __('messages.password_change');
            return redirect()->route('user.index')->withSuccess($message);
        } else {
            $message = __('messages.valid_password');
            return redirect()->route('user.changepassword',['id' => $user->id])->with('error', $message);
        }
    }

    public function userLogin(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = \Auth::user();

        if($request->login == 'user_login' && $user->user_type === 'user'){
            return redirect(RouteServiceProvider::FRONTEND);
        } 
        elseif($request->login == 'user_login' && $user->user_type !== 'user') {
            Auth::logout();
            return redirect()->back()->withErrors(['message' => 'You are not allowed to log in from here.']);
        }
        else{
            return redirect(RouteServiceProvider::HOME);
        }
    }
}
