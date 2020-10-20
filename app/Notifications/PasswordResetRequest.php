<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordResetRequest extends Notification implements ShouldQueue
{
    use Queueable;
    protected $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        if(app()->environment()=='production'){
            $baseURL = 'https://testuj.sk';
        } else {
            $baseURL = 'https://databanka.site';
        }

        $url = $baseURL . '/password/find/'.$this->token;
        return (new MailMessage)
        ->line('Tento email ste dostali z dôvodu žiadosti o zmenu hesla.')
        ->action('Zmena hesla', url($url))
        ->line('Ak ste nežiadali o zmenu hesla, žiadna ďalšia akcia nie je potrebná.');
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