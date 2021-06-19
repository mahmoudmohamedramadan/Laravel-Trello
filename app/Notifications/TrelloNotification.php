<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use NotificationChannels\Trello\TrelloChannel;
use NotificationChannels\Trello\TrelloMessage;

class TrelloNotification extends Notification
{
    use Queueable;

    /**
     * The data of notified card
     *
     * @var array
     */
    private $dataCard;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($dataCard)
    {
        $this->dataCard = $dataCard;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [
            TrelloChannel::class,
        ];
    }

    public function toTrello($notifiable)
    {
        return TrelloMessage::create()
            ->name($this->dataCard["name"])
            ->description($this->dataCard["description"])
            ->top($this->dataCard["top"])
            ->due($this->dataCard["date"]);
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
