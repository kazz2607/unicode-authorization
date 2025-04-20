<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MailNotification extends Notification
{
    use Queueable;

    private $data = null;
    private $mailer = null;
    public function __construct($data, $mailer)
    {
        $this->data = $data;
        $this->mailer = $mailer->toArray();
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Thông tin bảng lương - '.$this->data[0])
                    ->greeting($this->mailer['title'])
                    ->view('emails.mailer.index', [
                        'data' => $this->data,
                        'email' => $this->mailer,
                    ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
