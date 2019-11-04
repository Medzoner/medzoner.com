<?php

namespace Tests;

use Monolog\Handler\TestHandler;
use Psr\Log\LoggerInterface;

/**
 * Class TestCommon
 */
class TestCommon
{
    /**
     * @param LoggerInterface $logger
     * @return null|string
     */
    public static function getMessageFromLogger(LoggerInterface $logger): ?string
    {
        $logMessage = null;
        /** @var TestHandler $logHandler */
        foreach ($logger->getHandlers() as $logHandler) {
            if ($logHandler instanceof TestHandler) {
                foreach ($logHandler->getRecords() as $log) {
                    $logMessage .= $log['message'];
                }
            }
        }

        return $logMessage;
    }

    /**
     * @param LoggerInterface $logger
     * @return array
     */
    public static function getLogs(LoggerInterface $logger): array
    {
        $logMessage = [];
        foreach ($logger->getHandlers() as $logHandler) {
            if ($logHandler instanceof TestHandler) {
                foreach ($logHandler->getRecords() as $log) {
                    $logMessage[] = $log['message'];
                }
            }
        }

        return $logMessage;
    }
}
