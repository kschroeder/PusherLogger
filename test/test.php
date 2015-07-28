<?php

require_once '../vendor/autoload.php';

if (!file_exists('config.php')) {
    die('Please create a config.php file that creates a properly defined Pusher object called $pusher and places it in the global scope.  <?php $pusher = new Pusher("123123", "12312, "123123"); ?>.  You can probably just copy it from your Pusher PHP example source page.');
}

require_once 'config.php';

$adapter = new Eschrade\PusherLogger\PusherAdapter();
$adapter->setPusher($pusher);
$logger = new Zend\Log\Logger();
$logger->addWriter($adapter);
$logger->debug('This is a test debug');
$logger->crit('This is a test crit');
$logger->err('This is a test error');
$logger->notice('This is a test notice');
$logger->warn('This is a test warn');
$logger->info('This is a test info');
