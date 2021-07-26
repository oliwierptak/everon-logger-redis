<?php

declare(strict_types = 1);

namespace Everon\Logger\Plugin\Redis;

use Everon\Logger\Configurator\Plugin\RedisLoggerPluginConfigurator;
use Everon\Logger\Contract\Plugin\LoggerPluginInterface;
use JetBrains\PhpStorm\Pure;
use Monolog\Handler\HandlerInterface;
use Monolog\Handler\RedisHandler;
use Monolog\Logger;
use Redis;

class RedisLoggerPlugin implements LoggerPluginInterface
{
    public function __construct(protected RedisLoggerPluginConfigurator $configurator)
    {
    }

    #[Pure] public function canRun(): bool
    {
        return $this->configurator->hasKey();
    }

    public function buildHandler(): HandlerInterface
    {
        return new RedisHandler(
            $this->buildRedis(),
            $this->configurator->getKey(),
            Logger::toMonologLevel($this->configurator->getLogLevel()),
            $this->configurator->shouldBubble(),
            $this->configurator->getCapSize(),
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
            $redis->pconnect(
                $this->configurator->requireRedisConnection()->getHost(),
                $this->configurator->requireRedisConnection()->getPort(),
                $this->configurator->requireRedisConnection()->getTimeout(),
                $this->configurator->requireRedisConnection()->getPersistentId(),
                $this->configurator->requireRedisConnection()->getRetryInterval(),
                $this->configurator->requireRedisConnection()->getReadTimeout()
            );
        }
        else {
            $redis->connect(
                $this->configurator->requireRedisConnection()->getHost(),
                $this->configurator->requireRedisConnection()->getPort(),
                $this->configurator->requireRedisConnection()->getTimeout(),
                null,
                $this->configurator->requireRedisConnection()->getRetryInterval(),
                $this->configurator->requireRedisConnection()->getReadTimeout()
            );
        }

        if ($this->configurator->requireRedisConnection()->hasPassword()) {
            $redis->auth($this->configurator->requireRedisConnection()->requirePassword());
        }

        return $redis;
    }
}
