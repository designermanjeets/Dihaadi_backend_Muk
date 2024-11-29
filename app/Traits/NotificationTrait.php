<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\NotificationTemplate;

trait NotificationTrait
{
    function sendNotification($data)
    {
        $sitesetup = \App\Models\Setting::where('type', 'site-setup')->where('key', 'site-setup')->first();
        $app_setting = $sitesetup ? json_decode($sitesetup->value) : null;
        date_default_timezone_set($app_setting->time_zone ?? 'UTC');
        $data['datetime'] = date('Y-m-d H:i:s');
        $admin = User::where('user_type', 'admin')->first();
        $notification_type = $data['activity_type'];

        if (isset($data['booking'])) {
            $booking = $data['booking'];
            $id = $booking->id;
            $providerId = [$booking->provider_id];
            $userId = $booking->customer_id;
        } else if (isset($data['wallet'])) {
            $id = $data['wallet']->id;
            $user_id =  $data['wallet']->user_id;
            $user = User::find($user_id);
            if ($user->user_type == 'provider') {
                $providerId = [$user_id];
            } else if ($user->user_type == 'handyman') {
                $handymanId = [$user_id];
            } else if ($user->user_type == 'user') {
                $userId = $user_id;
            }
            $data['user_id'] = $user_id;
        } else if (isset($data['bid_data'])) {
            $bid_data = $data['bid_data'];
            $id = $bid_data->id;
            $userId = $bid_data->customer_id;
        } else if (isset($data['post_job'])) {
            $post_job = $data['post_job'];
            $id = $post_job->id;
            $providerId = [$post_job->provider_id];
            $userId = $post_job->customer_id;
        }


        switch ($data['activity_type']) {
            case "add_booking":
                $customer_name = $booking->customer->display_name;

                $data['activity_message'] = __('messages.booking_added', ['name' => $customer_name]);
                $data['activity_type'] = __('messages.add_booking');
                $activity_data = [
                    'service_id' => $booking->service_id,
                    'service_name' => isset($booking->service) ? $booking->service->name : '',
                    'customer_id' => $booking->customer_id,
                    'customer_name' => isset($booking->customer) ? $booking->customer->display_name : '',
                    'provider_id' => $booking->provider_id,
                    'provider_name' => isset($booking->provider) ? $booking->provider->display_name : '',
                ];
                break;

            case "assigned_booking":
                $assigned_handyman = handymanNames($booking->handymanAdded);
                $data['activity_message'] = __('messages.booking_assigned', ['name' => $assigned_handyman,'id'=>$booking->id]);
                $data['activity_type'] = __('messages.assigned_booking');
                $handymanId = $booking->handymanAdded->pluck('handyman_id');

                $activity_data = [
                    'handyman_id' => $booking->handymanAdded->pluck('handyman_id'),
                    'handyman_name' => $booking->handymanAdded,
                ];

                break;

            case "transfer_booking":
                $assigned_handyman = handymanNames($booking->handymanAdded);

                $data['activity_type'] = __('messages.transfer_booking');
                $data['activity_message'] = __('messages.booking_transfer', ['name' => $assigned_handyman]);
                $handymanId = $booking->handymanAdded->pluck('handyman_id');
                $activity_data = [
                    'handyman_id' => $booking->handymanAdded->pluck('handyman_id'),
                    'handyman_name' => $booking->handymanAdded,
                ];
                break;

            case "update_booking_status":
                $status = \App\Models\BookingStatus::bookingStatus($booking->status);
                $old_status = \App\Models\BookingStatus::bookingStatus($booking->old_status);
                $data['activity_type'] = __('messages.update_booking_status');
                $data['activity_message'] = __('messages.booking_status_update', ['id'=> $booking->id,'from' => $old_status, 'to' => $status]);
                $handymanId = $booking->handymanAdded ? $booking->handymanAdded->pluck('handyman_id') : null;
                $activity_data = [
                    'reason' => $booking->reason,
                    'status' => $booking->status,
                    'status_label' => $status,
                    'old_status' => $booking->old_status,
                    'old_status_label' => $old_status,
                ];

                break;

            case "cancel_booking":
                $status = \App\Models\BookingStatus::bookingStatus($booking->status);
                $old_status = \App\Models\BookingStatus::bookingStatus($booking->old_status);
                $data['activity_type'] = __('messages.cancel_booking');
                $data['activity_message'] = __('messages.cancel_booking');
                $handymanId = $booking->handymanAdded ? $booking->handymanAdded->pluck('handyman_id') : null;
                $activity_data = [
                    'reason' => $booking->reason,
                    'status' => $booking->status,
                    'status_label' => \App\Models\BookingStatus::bookingStatus($booking->status),
                ];
                break;

            case "payment_message_status":
                $data['activity_type'] = __('messages.payment_message_status');

                $data['activity_message'] = __('messages.payment_message', ['status' => $data['payment_status']]);

                $activity_data = [
                    'activity_type' => $data['activity_type'],
                    'payment_status' => $data['payment_status'],
                    'booking_id' => $data['booking_id'],
                ];
                break;


            case "add_wallet":
                $data['activity_message'] = __('messages.wallet_added', ['amount' => getPriceFormat($data['wallet']->amount)]);
                $activity_data = [
                    'title' => $data['wallet']->title,
                    'user_id' => $data['wallet']->user_id,
                    'provider_name' => isset($data['wallet']->provider) ? $data['wallet']->provider->display_name : '',
                    'amount' => $data['wallet']->amount,
                    'credit_debit_amount' => $data['wallet']->amount,
                ];
                break;

            case "update_wallet":
                $data['activity_message'] = trans('messages.wallet_top_up',['amount' => getPriceFormat($data['added_amount'])]);
                $activity_data = [
                    'title' => $data['wallet']->title,
                    'user_id' => $data['wallet']->user_id,
                    'provider_name' => isset($data['wallet']->provider) ? $data['wallet']->provider->display_name : '',
                    'amount' => $data['wallet']->amount,
                    'credit_debit_amount' => (float)$data['added_amount'],
                ];
                break;

            case "wallet_payout_transfer":
                $data['activity_message'] = __('messages.wallet_amount',['value' => getPriceFormat($data['transfer_amount'])]);
                $activity_data = [
                    'title' => $data['wallet']->title,
                    'user_id' => $data['wallet']->user_id,
                    'provider_name' => isset($data['wallet']->provider) ? $data['wallet']->provider->display_name : '',
                    'amount' => $data['wallet']->amount,
                    'credit_debit_amount' => (float)$data['transfer_amount'],
                ];
                break;

            case "wallet_top_up":

                $data['activity_message'] = trans('messages.wallet_top_up',['amount' => getPriceFormat($data['top_up_amount'])]);
                $activity_data = [
                    'title' => $data['wallet']->title,
                    'user_id' => $data['wallet']->user_id,
                    'provider_name' => isset($data['wallet']->provider) ? $data['wallet']->provider->display_name : '',
                    'amount' => $data['wallet']->amount,
                    'transaction_id' => $data['transaction_id'],
                    'transaction_type' => $data['transaction_type'],
                    'credit_debit_amount' => (float)$data['top_up_amount'],
                ];


                break;

            case "wallet_refund":
                $data['activity_message'] = trans('messages.wallet_refund', ['value' => $data['booking_id']]);
                $activity_data = [
                    'title' => $data['wallet']->title,
                    'user_id' => $data['wallet']->user_id,
                    'amount' => $data['wallet']->amount,
                    'credit_debit_amount' => $data['refund_amount'],
                    'transaction_type' => __('messages.credit'),
                ];
                break;

            case "paid_for_booking":
                $data['activity_message'] = trans('messages.paid_for_booking', ['value' => $data['booking_id']]);
                $activity_data = [
                    'title' => $data['wallet']->title,
                    'user_id' => $data['wallet']->user_id,
                    'amount' => $data['wallet']->amount,
                    'credit_debit_amount' => $data['booking_amount'],
                    'transaction_type' => __('messages.debit'),
                ];
                break;


            case "job_requested":
                $data['activity_message'] = __('messages.post_request_message', ['name' => $post_job->customer->display_name,]);
                $data['activity_type'] =  __('messages.post_request_title');

                $customerLatitude = 50.930557;
                $customerLongitude = -102.80777;
                $radius = 50;
                $providers = \App\Models\ProviderAddressMapping::selectRaw("id, provider_id, address, latitude, longitude,
                                ( 6371 * acos( cos( radians($customerLatitude) ) *
                                cos( radians( latitude ) )
                                * cos( radians( longitude ) - radians($customerLongitude)
                                ) + sin( radians($customerLatitude) ) *
                                sin( radians( latitude ) ) )
                                ) AS distance")
                    ->having("distance", "<=", $radius)
                    ->orderBy("distance", 'asc')
                    ->get();
                $providerId = $providers->pluck('providers.id')->toArray();

                $activity_data = [
                    'post_request_id' => $post_job->post_request_id,
                    'post_job_name' => $post_job->title,
                    'customer_id' => $post_job->customer_id,
                    'customer_name' => isset($post_job->customer) ? $post_job->customer->display_name : '',
                ];
                break;
            case "user_accept_bid":
                $data['activity_message'] = __('messages.bid_accepted_message', ['name' => $post_job->customer->display_name,]);
                $data['activity_type'] =  __('messages.bid_accepted_title');
                $activity_data = [
                    'post_request_id' => $post_job->post_request_id,
                    'customer_id' => $post_job->customer_id,
                    'customer_name' => isset($post_job->customer) ? $post_job->customer->display_name : '',
                ];
                break;
            case "provider_send_bid":
                $data['activity_message'] = __('messages.incomming_bid_message', ['name' =>  $bid_data->provider->display_name, 'price' => getPriceFormat($bid_data->price)]);
                $data['activity_type'] = __('messages.incomming_bid_title', ['name' =>  $bid_data->provider->display_name]);
                $activity_data = [
                    'post_request_id' => $bid_data->post_request_id,
                    'provider_id' => $bid_data->provider_id,
                    'provider_name' => isset($bid_data->provider) ? $bid_data->provider->display_name : '',
                ];
                break;


            case "provider_payout":
                    $id = $data['id'];
                    $providerId = [$data['user_id']];

                    $data['activity_message'] = __('messages.payout_paid',['type' =>'Admin','amount' => getPriceFormat($data['amount'])]);

                    $activity_data = [
                        'user_id' =>$data['user_id'],
                        'amount' => $data['amount'],
                    ];

                break;
            case "handyman_payout":
                    $id = $data['id'];
                    $handymanId = [$data['user_id']];

                    $data['activity_message'] = __('messages.payout_paid',['type' =>'Provider','amount' => getPriceFormat($data['amount'])]);
                    $activity_data = [
                        'user_id' =>$data['user_id'],
                        'amount' => $data['amount'],
                    ];

                break;
            case "subscription_add":
                $id = $data['subscription_data']->id;
                $providerId = [$data['subscription_data']->user_id];
                $data['activity_message'] = __('messages.subscription_added');
                $activity_data = [
                    'user_id' => [$data['subscription_data']->user_id],
                    'title' => $data['subscription_data']->title,
                ];
                break;
            case "resgister":
                $id = $data['user_id'];
                $data['activity_message'] = __('messages.registeration_msg');
                if ($data['user_type'] == 'provider') {
                    $providerId = [$data['user_id']];
                } else if ($data['user_type'] == 'handyman') {
                    $handymanId = [$data['user_id']];
                } else if ($data['user_type'] == 'user') {
                    $userId = $data['user_id'];
                }
                $activity_data = [
                    'user_id' => $data['user_id'],
                    'user_type' => $data['user_type'],
                ];
                break;


            default:
                $activity_data = [];
                break;
        }
        $data['activity_data'] = json_encode($activity_data);
        if (isset($data['booking']) || isset($data['bid_data']) || isset($data['post_job'])) {
            \App\Models\BookingActivity::create($data);
        } else if (isset($data['wallet'])) {
            \App\Models\WalletHistory::create($data);
        }
        $generalsetting = \App\Models\Setting::where('type', 'general-setting')->where('key', 'general-setting')->first();
        $generalsetting = json_decode($generalsetting->value);
        $notification_data = [
            'id'   => $id,
            'type' => $data['activity_type'],
            'message' => $data['activity_message'],
            "ios_badgeType" => "Increase",
            "ios_badgeCount" => 1,
            "notification-type" => $notification_type,
            'logged_in_user_fullname' => $admin ? $admin['display_name'] ?: default_user_name() : '',
            'logged_in_user_role' => $admin ? ucfirst($admin->user_type) ?? '-' : '',
            'company_name' => env('APP_NAME'),
            'company_contact_info' => implode('', [
                $generalsetting->helpline_number . PHP_EOL,
                $generalsetting->inquriy_email,
            ]),
        ];
        if (isset($booking)) {
            $booking_datetime = $booking->date;
            list($date, $time) = explode(' ', $booking_datetime);
            $notification_data['user_name'] = isset($booking->customer) ? $booking->customer->display_name : '';
            $notification_data['booking_services_names'] = isset($booking->service) ? $booking->service->name : '';
            $notification_data['booking_date'] = $date;
            $notification_data['booking_time'] = $time;
            $notification_data['venue_address'] = $booking->address;
            $notification_data['check_booking_type'] = 'booking';
        }

        $mailable = NotificationTemplate::where('type', $notification_type)->with('defaultNotificationTemplateMap')->first();

        if ($mailable != null && $mailable->to != null) {
            $mails = json_decode($mailable->to);

            foreach ($mails as $key => $mailTo) {

                switch ($mailTo) {
                    case 'admin':

                        $admin = \App\Models\User::role('admin')->first();

                        if (isset($admin->email)) {
                            try {
                                $admin->notify(new \App\Notifications\CommonNotification($notification_type, $notification_data));
                            } catch (\Exception $e) {
                                Log::error($e);
                            }
                        }

                        break;

                    case 'provider':
                        if (isset($providerId)) {
                            foreach ($providerId as $id) {
                                $employee = \App\Models\User::find($id);
                                if (isset($employee->email)) {
                                    try {
                                        $employee->notify(new \App\Notifications\CommonNotification($notification_type, $notification_data));
                                    } catch (\Exception $e) {
                                        Log::error($e);
                                    }
                                }
                            }
                        }
                        break;

                    case 'handyman':
                        if (isset($handymanId)) {
                            foreach ($handymanId as $id) {
                                $employee = \App\Models\User::find($id);
                                if (isset($employee->email) && $employee->user_type == 'handyman') {
                                    try {
                                        $employee->notify(new \App\Notifications\CommonNotification($notification_type, $notification_data));
                                    } catch (\Exception $e) {
                                        Log::error($e);
                                    }
                                }
                            }
                        }
                        break;

                    case 'user':
                        if (isset($userId)) {
                            $user = \App\Models\User::find($userId);
                            try {
                                $user->notify(new \App\Notifications\CommonNotification($notification_type, $notification_data));
                            } catch (\Exception $e) {
                                Log::error($e);
                            }
                        }
                        break;
                }
            }
        }
    }
}
