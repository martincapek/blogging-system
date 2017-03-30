<?php

namespace App\Events;

use App\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Cache;

class AddLastPostHandler
{
    use InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function handle(Post $post)
    {


        if (Cache::get('lastSawPosts')) {
            $lastSawPosts = Cache::get('lastSawPosts');
        } else {
            $lastSawPosts = [];
        }


        if (count($lastSawPosts) < 2) {
            array_push($lastSawPosts, $post->id);
        } else {
            if (!in_array($post->id, $lastSawPosts)) {
                array_pop($lastSawPosts);
                array_push($lastSawPosts, $post->id);
            } else {
                $position = array_search($post->id, $lastSawPosts);

                unset($lastSawPosts[$position]);

                array_unshift($lastSawPosts, $post->id);

            }

        }



        Cache::put('lastSawPosts', $lastSawPosts, config('cache.expiration'));

    }
}
