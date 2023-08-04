<?php

declare(strict_types = 1);

namespace Everon\LoggerRedis\Plugin\Redis;

use Everon\Logger\Contract\Plugin\LoggerPluginInterface;
use Everon\Shared\LoggerRedis\Configurator\Plugin\RedisLoggerPluginConfigurator;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\RedisHandler;
use Monolog\Logger;
use Redis;

class RedisLoggerPlugin implements LoggerPluginInterface
{
    public function __construct(protected RedisLoggerPluginConfigurator $configurator) {}

    public function canRun(): bool
    {
        return $this->configurator->hasKey();
    }

    public function buildHandler(): HandlerInterface
    {
        $this->validate();

        return new RedisHandler(
            $this->buildRedis(),
            (string)$this->configurator->getKey(),
            Logger::toMonologLevel($this->configurator->getLogLevel()),
            (bool)$this->configurator->shouldBubble(),
            (int)$this->configurator->getCapSize(),
        );
    }

    public function validate(): void
    {
        $this->configurator->requireKey();
        $this->configurator->requireLogLevel();
        $this->configurator->requireCapSize();
        $this->configurator->requireLogLevel();

        $this->configurator->requireRedisConnection()->requireHost();
        $this->configurator->requireRedisConnection()->requirePort();
        $this->configurator->requireRedisConnection()->requireTimeout();
        $this->configurator->requireRedisConnection()->requireRetryInterval();
        $this->configurator->requireRedisConnection()->requireReadTimeout();
    }

    protected function buildRedis(): Redis
    {
        $redis = new Redis();

        if ($this->configurator->requireRedisConnection()->getPersistentId() !== null) {
            /* @phpstan-ignore-next-line */
            $redis->pconnect(
                (string)$this->configurator->requireRedisConnection()->getHost(),
                (int)$this->configurator->requireRedisConnection()->getPort(),
                (float)$this->configurator->requireRedisConnection()->getTimeout(),
                $this->configurator->requireRedisConnection()->getPersistentId(),
                $this->configurator->requireRedisConnection()->getRetryInterval(),
                (float)$this->configurator->requireRedisConnection()->getReadTimeout(),
            );
        }
        else {
            $redis->connect(
                (string)$this->configurator->requireRedisConnection()->getHost(),
                (int)$this->configurator->requireRedisConnection()->getPort(),
                (float)$this->configurator->requireRedisConnection()->getTimeout(),
                null,
                $this->configurator->requireRedisConnection()->getRetryInterval(),
                (float)$this->configurator->requireRedisConnection()->getReadTimeout(),
            );
        }

        if ($this->configurator->requireRedisConnection()->hasPassword()) {
            $redis->auth($this->configurator->requireRedisConnection()->requirePassword());
        }

        return $redis;
    }
}
