<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TestimonialPageMessage extends Notification
{
    use Queueable;

    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Отзыв клиента на сайте')
            ->greeting(' ')
            ->line('На сайте оставлен отзыв клиента ' . mb_strtoupper($this->data['name']) . ' :')
            ->line('… ' . $this->data['text'] . ' …')
            ->line('Поблагодарить за отзыв: <a href="mailto:' . $this->data['email'] . '">' . $this->data['email'] . '</a>'  )
            ->action('Перейти в админку ?', url('/admin') )
            ->salutation('С приветом, я, Вадим Кулешов :)');
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
