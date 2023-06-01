<?php

namespace App\Jobs\front;

use App\Mail\front\ContactPage;
use PhpAmqpLib\Connection\AMQPLazyConnection;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use Mail;
class SendMessageJob
{
    protected $recipientEmail;
    protected $subject;
    protected $body;

    public function __construct($recipientEmail, $subject, $body)
    {
        $this->recipientEmail = $recipientEmail;
        $this->subject = $subject;
        $this->body = $body;
    }

    public function handle()
    {
        // Send the email
        $this->sendEmail();

        // Publish a message to RabbitMQ containing the email data
        $this->publishMessageToRabbitMQ();
    }

    protected function sendEmail()
    {
        Mail::send([], [], function ($message) {
            $message->to($this->recipientEmail)
                ->subject($this->subject)
                ->text($this->body);
        });
    }

    protected function publishMessageToRabbitMQ()
    {
        $emailData = [
            'recipientEmail' => $this->recipientEmail,
            'subject' => $this->subject,
            'body' => $this->body,
        ];

        $connection = new AMQPLazyConnection(
            config('queue.connections.rabbitmq.host'),
            config('queue.connections.rabbitmq.port'),
            config('queue.connections.rabbitmq.user'),
            config('queue.connections.rabbitmq.password'),
            config('queue.connections.rabbitmq.vhost')
        );

        $channel = $connection->channel();
        $channel->queue_declare('my_queue', false, false, false, false);

        $message = new AMQPMessage(json_encode($emailData), [
            'content_type' => 'application/json',
            'delivery_mode' => AMQPMessage::DELIVERY_MODE_PERSISTENT,
        ]);

        $channel->basic_publish($message, '', 'my_queue');

        $channel->close();
        $connection->close();
    }
}
