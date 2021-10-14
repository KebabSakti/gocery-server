<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\AndroidConfig;
use Kreait\Firebase\Messaging\CloudMessage;

class ProsessMessage implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $factory = (new Factory())->withServiceAccount(base_path().'/ayo-belanja-7bc1e-firebase-adminsdk-pxpmr-22cb053bd7.json');

        $messaging = $factory->createMessaging();

        $deviceToken = 'e-_HPfPfSKu6BCcQtzUJB-:APA91bFkGw5Dr_Yvb9H4zaa1XlC7oODqlAZt2wuyN5TPz1u8gQj0QiVuhb8euxN5DHEoTbnIAHNGvVlucFDybJV5rcZNcqU6kAoqQKBAdzxmwiNnEsXJhU2aCY4eE9RgHSuxyJe4qSvX';

        $title = 'This is title config';
        $body = 'This is body config';
        $image = 'https://img.webmd.com/dtmcms/live/webmd/consumer_assets/site_images/article_thumbnails/slideshows/powerhouse_vegetables_slideshow/650x350_powerhouse_vegetables_slideshow.jpg';

        $android = AndroidConfig::fromArray([
            'priority' => 'HIGH',
            'notification' => [
                'title' => $title,
                'body' => $body,
                'image' => $image,
                'tag' => 'tag',
                'color' => '#00c853',
                'default_sound' => true,
                'default_vibrate_timings' => true,
                'default_light_settings' => true,
                'channel_id' => 'DEFAULT_NOTIFICATION_CHANNEL',
                'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
            ],
        ]);

        $message = CloudMessage::withTarget('token', $deviceToken)
                               ->withAndroidConfig($android);

        $messaging->send($message);
    }
}
