<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WalletHistory;
use App\Models\Wallet;
use App\Http\Resources\API\WalletHistoryResource;
use App\Http\Resources\API\WalletResource;
use App\Traits\NotificationTrait;

class WalletController extends Controller
{
    use NotificationTrait;
    public function getHistory(Request $request){
        $user_id = $request->user_id ?? auth()->user()->id;
        $wallet_history = WalletHistory::where('user_id',$user_id);
        $per_page = config('constant.PER_PAGE_LIMIT');

        $orderBy = $request->orderby ? $request->orderby: 'asc';

        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' ){
                $per_page = $wallet_history->count();
            }
        }

        $wallet_history = $wallet_history->orderBy('id',$orderBy)->paginate($per_page);
        $items = WalletHistoryResource::collection($wallet_history);

        $response = [
            'pagination' => [
                'total_items' => $items->total(),
                'per_page' => $items->perPage(),
                'currentPage' => $items->currentPage(),
                'totalPages' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem(),
                'next_page' => $items->nextPageUrl(),
                'previous_page' => $items->previousPageUrl(),
            ],
            'data' => $items,
        ];

        return comman_custom_response($response);

    }

    public function walletTopup(Request $request)
     {
        $request->validate([
            'amount' => 'required',
           
        ]);

      $user_id = $request->user_id ?? auth()->user()->id;
  
      $wallet = Wallet::where('user_id', $user_id)->first();

      if (!$wallet) {
          $user = User::where('id',$user_id)->first();

          if ($user && $user->user_type=='user'|| $user->user_type="provider") {
              $wallet = Wallet::create([
                  'title' => $user->display_name,
                  'user_id' => $user->id,
                  'amount' => 0,
              ]);
          } else {
              return comman_custom_response(['error' => 'User not found or invalid user type']);
          }
      }
  
      $wallet->amount += $request->amount;
      $wallet->save();

       $activity_data = [
           'activity_type' => 'wallet_top_up',
           'wallet' => $wallet,
           'top_up_amount' => $request->amount,
           'transaction_type' => $request->transaction_type,
           'transaction_id' => $request->transaction_id,
       ];
       $this->sendNotification($activity_data);

       $response = [
           'message' => trans('messages.wallet_top_up', ['amount' => getPriceFormat($wallet->amount)]),
           'data' => $wallet,
       ];

      return comman_custom_response($response);
    }
    

    public function getwalletlist(Request $request){
        $wallet = Wallet::query();

        if($request->has('status') && !empty($request->status)){

            $wallet = $wallet->where('status',$status);
        }

        $per_page = config('constant.PER_PAGE_LIMIT');

        if( $request->has('per_page') && !empty($request->per_page)){
            if(is_numeric($request->per_page)){
                $per_page = $request->per_page;
            }
            if($request->per_page === 'all' ){
                $per_page = $wallet->count();
            }
        }

        $wallet = $wallet->orderBy('updated_at','desc')->paginate($per_page);
        $items = WalletResource::collection($wallet);

        $response = [
            'pagination' => [
                'total_items' => $items->total(),
                'per_page' => $items->perPage(),
                'currentPage' => $items->currentPage(),
                'totalPages' => $items->lastPage(),
                'from' => $items->firstItem(),
                'to' => $items->lastItem(),
                'next_page' => $items->nextPageUrl(),
                'previous_page' => $items->previousPageUrl(),
            ],
            'data' => $items,
        ];

        return comman_custom_response($response);


    }
    public function store(Request $request)
    {

        if(demoUserPermission()){
            $message = __('messages.demo_permission_denied');
            return comman_message_response($message);
        }
        $data = $request->all();

        $wallet = Wallet::where('user_id',$data['user_id'])->first();
        if($wallet && !$data['id']){
            $message = __('messages.already_provider_wallet');
            return comman_message_response($message,406);
        }
        if($wallet !== null){
            $data['amount'] = $wallet->amount + $request->amount;
        }
        $result = Wallet::updateOrCreate(['id' => $data['id'] ],$data);


        $message = trans('messages.update_form',['form' => trans('messages.wallet')]);
        if($result->wasRecentlyCreated){
            $activity_data = [
                'activity_type' => 'add_wallet',
                'wallet' => $result,
            ];
            $this->sendNotification($activity_data);

            $message = trans('messages.save_form',['form' => trans('messages.wallet')]);
        }else{
            if($wallet->amount  != $data['amount']){
                $activity_data = [
                    'activity_type' => 'update_wallet',
                    'wallet' => $result,
                    'added_amount' =>$request->amount
                ];
                $this->sendNotification($activity_data);

            }
        }

        return comman_message_response($message);
    }
}
