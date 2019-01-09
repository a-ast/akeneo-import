<?php

namespace Aa\AkeneoImport\CommandHandler\Amqp;

use Aa\AkeneoImport\Transport\Sender;
use Aa\AkeneoImport\ImportCommand\CommandHandlerInterface;
use Aa\AkeneoImport\ImportCommand\CommandBatchInterface;


class AmqpCommandHandler implements CommandHandlerInterface
{
    /**
     * @var Sender
     */
    private $sender;

    public function __construct(Sender $sender)
    {
        $this->sender = $sender;
    }

    public function handle(CommandBatchInterface $commands)
    {
        $this->sender->send($commands);
    }

    public function shouldKeepCommandOrder(): bool
    {
        return false;
    }
}