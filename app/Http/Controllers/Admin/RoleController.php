<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Yajra\DataTables\DataTables;
use App\Models\User;
use App\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

    }



    public function index_data(DataTables $datatable,Request $request)
    {
        $query = Role::query();
        $filter = $request->filter;

        if (isset($filter)) {
            if (isset($filter['column_status'])) {
                $query->where('status', $filter['column_status']);
            }
        }
        $query = $query->newQuery()->whereNotIn('name',['admin','demo_admin']);
        
        return $datatable->eloquent($query)
            ->addColumn('check', function ($row) {
                return '<input type="checkbox" class="form-check-input select-table-row"  id="datatable-row-'.$row->id.'"  name="datatable_ids[]" value="'.$row->id.'" onclick="dataTableRowCheck('.$row->id.')">';
            })
            ->addColumn('action', function($role){
                return view('role.action',compact('role'))->render();
            })
            ->addIndexColumn()
            ->rawColumns(['action',  'check'])
            ->toJson();
    }

    /* bulck action method */
    public function bulk_action(Request $request)
    {
        $ids = explode(',', $request->rowIds);

        $actionType = $request->action_type;

        $message = 'Bulk Action Updated';
        switch ($actionType) {
            case 'change-status':
                $branches = Role::whereIn('id', $ids)->update(['status' => $request->status]);
                $message = 'Bulk Role Status Updated';
                break;

            case 'delete':
                Role::whereIn('id', $ids)->delete();
                $message = 'Bulk Role Deleted';
                break;

            default:
                return response()->json(['status' => false, 'message' => 'Action Invalid']);
                break;
        }

        return response()->json(['status' => true, 'message' => 'Bulk Action Updated']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }


    public function rolePermission(Request $request){
        $tabpage = $request->tabpage;
        $auth_user = authSession();
        $user_id = $auth_user->id;
        $user_data = User::find($user_id);
       
        switch ($tabpage) {
            case 'role':
                
                $filter = [
                    'status' => $request->status,
                ];
                $pageTitle = trans('messages.list_form_title',['form' => trans('messages.role')] );
                $auth_user = authSession();
                $assets = ['datatable'];
                $data  = view('role.index', compact('user_data','tabpage','pageTitle','auth_user','assets','filter'))->render();
                break;

            case 'permission':
                $permission = Permission::orderBy('name','ASC')->whereNull('parent_id')->with('subpermission')->get();
                $pageTitle = trans('messages.list_form_title',['form' => trans('messages.permission')  ]);
        
                $roles = Role::where('status',1)->orderBy('name','ASC');
                if(!\Auth::user()->hasRole('admin')){
                    $roles->where('name','!=','admin');
                }
                $roles = $roles->get();
        
                $auth_user = authSession();
                $data  = view('permission.index', compact('user_data','tabpage','roles','permission','pageTitle','auth_user'))->render();
                break;
            default:
                $data  = view('role.index',compact('user_data','tabpage','pageTitle','auth_user','assets','filter'))->render();
                break;
        }
        return response()->json($data);
    }
}
