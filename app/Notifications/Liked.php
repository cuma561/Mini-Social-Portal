<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;

class Liked extends Notification
{
    use Queueable;

    protected $content;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', 'https://laravel.com')
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $user_link = '<a href="' . url('users/' . Auth::id()) . '">' . Auth::user()->name . '</a>';

        if (is_null($this->content['comment'])) {
            $post_link = '<a href="' . url('posts/' . $this->content['post']->id) . '">Twój post</a>';
            $message = 'Użytkownik ' . $user_link . ' polubił ' . $post_link;
        } else {
            $comment_link = '<a href="' . url('posts/' . $this->content['post']->id . '#comment_id' . $this->content['comment']->id) . '">Twój komentarz</a>';
            $message = 'Użytkownik ' . $user_link . ' polubił ' . $comment_link;
        }

        return [
            'message' => $message,
        ];
    }
}
