<?php
/**
 * Created by PhpStorm.
 * User: janaka
 * Date: 07/03/19
 * Time: 1:25 PM
 */

namespace App\Support;

use Pusher\Pusher;


/**
 * Class Socket
 * @package App\Support
 */
class Socket
{
    /**
     * @param array $data
     * @param string $event
     * @param string $channel
     * @throws \Pusher\PusherException
     */
    public function push(array $data, string $event, string $channel)
    {
        $options = array(
            'cluster' => config('broadcasting.connections.pusher.options.cluster'),
            'useTLS' => true
        );
        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            $options
        );

        $pusher->trigger($channel, $event, $data);
    }
}
