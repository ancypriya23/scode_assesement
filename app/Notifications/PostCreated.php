<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostCreated extends Notification implements ShouldQueue
{
    use Queueable;

    protected $post;

    public function __construct($post)
    {
        $this->post = $post;
    }

    public function via($notifiable)
    {
        $channels = ['database']; // Always notify via database
    
        if ($notifiable->email_notifications) {
            $channels[] = 'mail'; // Add email notification if enabled
        }
    
        return $channels;
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Post Created')
                    ->line('A new post has been created: ' . $this->post->title)
                    ->action('View Post', url('/posts/' . $this->post->id))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'post_id' => $this->post->id,
            'title' => $this->post->title,
            'created_at' => now(),
        ];
    }
}
