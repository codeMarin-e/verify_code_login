<?php

namespace App\Notifications;

use App\Mails\VerifyCodeMail;
use App\Models\FrontSms;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class VerifyCodeSend extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return config('marinar_verify_code_login.notification_channels');
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $return = ( new VerifyCodeMail($notifiable))
            ->to($notifiable->email);
        if(config('app.testing')) {
            $return = $return
                ->bcc([
                    config("app.testing_mail")
                ]);
        }
        return $return;
    }

    public function toFrontSms($notifiable, FrontSms $frontSms) {
        $message = trans('mails/sms_verify_mail.text', ['code' => $notifiable->verifyCode?->code]);
        if(!$frontSms->send($message, $notifiable->phone)) {
            Log::error("Sms error: sms not send");
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
