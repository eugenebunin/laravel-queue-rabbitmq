<?php

namespace VladimirYuldashev\LaravelQueueRabbitMQ\Queue\Connectors;

use Illuminate\Queue\Connectors\ConnectorInterface;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use VladimirYuldashev\LaravelQueueRabbitMQ\Queue\RabbitMQQueue;

class RabbitMQConnector implements ConnectorInterface
{

	/**
	 * Establish a queue connection.
	 *
	 * @param  array $config
	 *
	 * @return \Illuminate\Queue\QueueInterface
	 */
	public function connect(array $config)
	{
		// create connection with AMQP
		$connection = new AMQPStreamConnection($config['host'], $config['port'], $config['login'], $config['password'], $config['vhost'], false, 'AMQPLAIN', null, 'en_US', 3, 60, null, true, 30);

		return new RabbitMQQueue(
			$connection,
			$config
		);
	}
}
