<?php

namespace Eschrade\PusherLogger;

use Zend\Log\Writer\AbstractWriter;
use Eschrade\PusherAware\PusherAware;
class PusherAdapter extends AbstractWriter implements PusherAware
{

    const CHANNEL_LOG       = 'logger';
    const CHANNEL_COMMAND   = 'command';
    
    const EVENT_LOG         = 'log';
    
    protected $pusher;
    
    public function setPusher(\Pusher $pusher)
    {
        $this->pusher = $pusher;
    }

    protected function doWrite( array $event)
    {
        $result = $this->pusher->trigger([self::CHANNEL_LOG], self::EVENT_LOG, $event);
        if (!$result) {
            throw new PusherLoggerException('Unable to send message');
        }
    }
    
}