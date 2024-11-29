<?php

namespace App\Notifications;

use App\Broadcasting\CustomWebhook;
// use App\Broadcasting\OneSingleChannel;
use App\Mail\MailMailableSend;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use App\Models\NotificationTemplate;
use App\Broadcasting\FcmChannel;

class CommonNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $type;

    public $data;

    public $subject;

    public $notification;

    public $notification_message;

    public $notification_link;

    public $appData;

    public $custom_webhook;

    /**
     * Create a new notification instance.
     */
    public function __construct($type, $data)
    {

        $this->type = $type;
        $this->data = $data;
        $this->notification_message = $this->data['message'] != '' ? $this->data['message'] : __('messages.default_notification_body');

        $this->notification = NotificationTemplate::where('type', $this->type)->with('defaultNotificationTemplateMap')->first();
        $this->subject = $this->notification->defaultNotificationTemplateMap->subject;
        $this->notification_link = $this->notification->defaultNotificationTemplateMap->notification_link;
        foreach ($this->data as $key => $value) {
            $this->subject = str_replace('[[ '.$key.' ]]', $this->data[$key], $this->subject);
            $this->notification_message = str_replace('[[ '.$key.' ]]', $this->data[$key], $this->notification_message);
            $this->notification_link = str_replace('[[ '.$key.' ]]', $this->data[$key], $this->notification_link);
        }

        $this->subject = $this->subject != '' ? $this->subject : 'None';
        $this->notification_message = $this->notification_message != '' ? $this->notification_message : __('messages.default_notification_body');

        $this->appData = $this->notification->channels;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        $notificationSettings = $this->appData;
        $notification_settings = [];
        $notification_access = isset($notificationSettings[$this->type]) ? $notificationSettings[$this->type] : [];
        if (isset($notificationSettings)) {
            foreach ($notificationSettings as $key => $notification) {
                if ($notification) {

                    switch ($key) {

                        case 'PUSH_NOTIFICATION':
                            array_push($notification_settings, FcmChannel::class);

                            break;

                        case 'IS_CUSTOM_WEBHOOK':
                                array_push($notification_settings, CustomWebhook::class);

                            break;

                        case 'IS_MAIL':
                                array_push($notification_settings, 'mail');

                            break;
                    }
                }
            }
        }

        return array_merge($notification_settings, ['database']);
    }

    // public function toOneSignal($notifiable)
    // {
    //     $msg = $this->subject;
    //     if (! isset($msg) && $msg == '') {
    //         $msg = __('message.notification_body');
    //     }
    //     $type = 'booking';
    //     if (isset($this->data['type']) && $this->data['type'] !== '') {
    //         $type = $this->data['type'];
    //     }
    //     $app_id = ENV('ONESIGNAL_API_KEY');
    //     $rest_api_key = ENV('ONESIGNAL_REST_API_KEY');
    //     if($notifiable->user_type == 'user'){
    //         $app_id = ENV('ONESIGNAL_API_KEY');
    //         $rest_api_key = ENV('ONESIGNAL_REST_API_KEY');
    //     }
    //     if($notifiable->user_type == 'provider'){
    //         $app_id = ENV('ONESIGNAL_APP_ID_PROVIDER');
    //         $rest_api_key = ENV('ONESIGNAL_REST_API_KEY_PROVIDER');
    //     }

    //     $heading = $this->subject;
    //     $fields = array(
    //         'app_id' => $app_id,
    //         'include_player_ids' => $notifiable->playerids->pluck('player_id'),
    //         'data' => [
    //             'type' => $this->subject,
    //             'additional_data' => $this->data,
    //             'id' => $this->data['id'],
    //         ],
    //         'headings' => [
    //             'en' => $heading,
    //         ],
    //         'contents' => [
    //             'en' => $msg,
    //         ],
    //     );

    //     $fields = json_encode($fields);
    //     $ch = curl_init();

    //     curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/json; charset=utf-8',
    //         "Authorization:Basic $rest_api_key"
    //     ));
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //     curl_setopt($ch, CURLOPT_HEADER, FALSE);
    //     curl_setopt($ch, CURLOPT_POST, TRUE);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    //     $response = curl_exec($ch);
    //     curl_close($ch);
    // }

    /**
     * Get mail notification
     *
     * @param  mixed  $notifiable
     * @return MailMailableSend
     */
    public function toMail($notifiable)
    {
        $email = '';

        if (isset($notifiable->email)) {
            $email = $notifiable->email;
        } else {
            $email = $notifiable->routes['mail'];
        }
        return (new MailMailableSend($this->notification, $this->data, $this->type))->to($email)
            ->bcc(isset($this->notification->bcc) ? json_decode($this->notification->bcc) : [])
            ->cc(isset($this->notification->cc) ? json_decode($this->notification->cc) : [])
            ->subject($this->subject);
    }

    public function toFcm($notifiable)
    {

        $msg = $this->data['message'];
        if (! isset($msg) && $msg == '') {
            $msg = __('message.notification_body');
        }
        $type = 'booking';
        if (isset($this->data['type']) && $this->data['type'] !== '') {
            $type = $this->data['type'];
        }
        $heading = $this->subject;

        return fcm([
            'to'=>'/topics/user_'.$notifiable->id,
            'collapse_key' => 'type_a',
            'notification' => [
                'body' =>  $msg,
                'title' => $heading ,
            ],
            'data' => [
            'type' => $this->subject,
            'additional_data' => $this->data
            ],
        ]);
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->data;

    }
}
