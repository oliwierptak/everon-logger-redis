<?php

/**
 * Everon logger configuration file. Auto-generated.
 */

declare(strict_types=1);

namespace Everon\Logger\Configurator\Plugin;

use UnexpectedValueException;

class RedisConnectionConfigurator implements \Everon\Logger\Contract\Configurator\PluginConfiguratorInterface
{
    protected const SHAPE_PROPERTIES = [
        'host' => 'null|string',
        'logLevel' => 'null|string',
        'password' => 'null|string',
        'persistentId' => 'null|string',
        'pluginClass' => 'null|string',
        'pluginFactoryClass' => 'null|string',
        'port' => 'null|int',
        'readTimeout' => 'null|float',
        'retryInterval' => 'null|int',
        'shouldBubble' => 'null|bool',
        'timeout' => 'null|float',
    ];

    protected const METADATA = [
        'host' => ['type' => 'string', 'default' => null],
        'logLevel' => ['type' => 'string', 'default' => 'debug'],
        'password' => ['type' => 'string', 'default' => null],
        'persistentId' => ['type' => 'string', 'default' => null],
        'pluginClass' => ['type' => 'string', 'default' => \Everon\Logger\Plugin\Redis\RedisLoggerPlugin::class],
        'pluginFactoryClass' => ['type' => 'string', 'default' => null],
        'port' => ['type' => 'int', 'default' => 6379],
        'readTimeout' => ['type' => 'float', 'default' => 0.0],
        'retryInterval' => ['type' => 'int', 'default' => 0],
        'shouldBubble' => ['type' => 'bool', 'default' => true],
        'timeout' => ['type' => 'float', 'default' => 0.0],
    ];

    /** The key name to push records to */
    protected ?string $host = null;

    /** The minimum logging level at which this handler will be triggered */
    protected ?string $logLevel = 'debug';
    protected ?string $password = null;
    protected ?string $persistentId = null;
    protected ?string $pluginClass = \Everon\Logger\Plugin\Redis\RedisLoggerPlugin::class;

    /** Defines custom plugin factory to be used to create a plugin */
    protected ?string $pluginFactoryClass = null;
    protected ?int $port = 6379;
    protected ?float $readTimeout = 0.0;
    protected ?int $retryInterval = 0;

    /** Whether the messages that are handled can bubble up the stack or not */
    protected ?bool $shouldBubble = true;
    protected ?float $timeout = 0.0;
    protected array $updateMap = [];

    /**
     * The key name to push records to
     */
    public function setHost(?string $host): self
    {
        $this->host = $host; $this->updateMap['host'] = true; return $this;
    }

    /**
     * The key name to push records to
     */
    public function getHost(): ?string
    {
        return $this->host;
    }

    /**
     * The key name to push records to
     */
    public function requireHost(): string
    {
        if (static::METADATA['host']['type'] === 'popo' && $this->host === null) {
            $popo = static::METADATA['host']['default'];
            $this->host = new $popo;
        }

        if ($this->host === null) {
            throw new UnexpectedValueException('Required value of "host" has not been set');
        }
        return $this->host;
    }

    public function hasHost(): bool
    {
        return $this->host !== null || ($this->host !== null && array_key_exists('host', $this->updateMap));
    }

    /**
     * The minimum logging level at which this handler will be triggered
     */
    public function setLogLevel(?string $logLevel): self
    {
        $this->logLevel = $logLevel; $this->updateMap['logLevel'] = true; return $this;
    }

    /**
     * The minimum logging level at which this handler will be triggered
     */
    public function getLogLevel(): ?string
    {
        return $this->logLevel;
    }

    /**
     * The minimum logging level at which this handler will be triggered
     */
    public function requireLogLevel(): string
    {
        if (static::METADATA['logLevel']['type'] === 'popo' && $this->logLevel === null) {
            $popo = static::METADATA['logLevel']['default'];
            $this->logLevel = new $popo;
        }

        if ($this->logLevel === null) {
            throw new UnexpectedValueException('Required value of "logLevel" has not been set');
        }
        return $this->logLevel;
    }

    public function hasLogLevel(): bool
    {
        return $this->logLevel !== null || ($this->logLevel !== null && array_key_exists('logLevel', $this->updateMap));
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password; $this->updateMap['password'] = true; return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function requirePassword(): string
    {
        if (static::METADATA['password']['type'] === 'popo' && $this->password === null) {
            $popo = static::METADATA['password']['default'];
            $this->password = new $popo;
        }

        if ($this->password === null) {
            throw new UnexpectedValueException('Required value of "password" has not been set');
        }
        return $this->password;
    }

    public function hasPassword(): bool
    {
        return $this->password !== null || ($this->password !== null && array_key_exists('password', $this->updateMap));
    }

    public function setPersistentId(?string $persistentId): self
    {
        $this->persistentId = $persistentId; $this->updateMap['persistentId'] = true; return $this;
    }

    public function getPersistentId(): ?string
    {
        return $this->persistentId;
    }

    public function requirePersistentId(): string
    {
        if (static::METADATA['persistentId']['type'] === 'popo' && $this->persistentId === null) {
            $popo = static::METADATA['persistentId']['default'];
            $this->persistentId = new $popo;
        }

        if ($this->persistentId === null) {
            throw new UnexpectedValueException('Required value of "persistentId" has not been set');
        }
        return $this->persistentId;
    }

    public function hasPersistentId(): bool
    {
        return $this->persistentId !== null || ($this->persistentId !== null && array_key_exists('persistentId', $this->updateMap));
    }

    public function setPluginClass(?string $pluginClass): self
    {
        $this->pluginClass = $pluginClass; $this->updateMap['pluginClass'] = true; return $this;
    }

    public function getPluginClass(): ?string
    {
        return $this->pluginClass;
    }

    public function requirePluginClass(): string
    {
        if (static::METADATA['pluginClass']['type'] === 'popo' && $this->pluginClass === null) {
            $popo = static::METADATA['pluginClass']['default'];
            $this->pluginClass = new $popo;
        }

        if ($this->pluginClass === null) {
            throw new UnexpectedValueException('Required value of "pluginClass" has not been set');
        }
        return $this->pluginClass;
    }

    public function hasPluginClass(): bool
    {
        return $this->pluginClass !== null || ($this->pluginClass !== null && array_key_exists('pluginClass', $this->updateMap));
    }

    /**
     * Defines custom plugin factory to be used to create a plugin
     */
    public function setPluginFactoryClass(?string $pluginFactoryClass): self
    {
        $this->pluginFactoryClass = $pluginFactoryClass; $this->updateMap['pluginFactoryClass'] = true; return $this;
    }

    /**
     * Defines custom plugin factory to be used to create a plugin
     */
    public function getPluginFactoryClass(): ?string
    {
        return $this->pluginFactoryClass;
    }

    /**
     * Defines custom plugin factory to be used to create a plugin
     */
    public function requirePluginFactoryClass(): string
    {
        if (static::METADATA['pluginFactoryClass']['type'] === 'popo' && $this->pluginFactoryClass === null) {
            $popo = static::METADATA['pluginFactoryClass']['default'];
            $this->pluginFactoryClass = new $popo;
        }

        if ($this->pluginFactoryClass === null) {
            throw new UnexpectedValueException('Required value of "pluginFactoryClass" has not been set');
        }
        return $this->pluginFactoryClass;
    }

    public function hasPluginFactoryClass(): bool
    {
        return $this->pluginFactoryClass !== null || ($this->pluginFactoryClass !== null && array_key_exists('pluginFactoryClass', $this->updateMap));
    }

    public function setPort(?int $port): self
    {
        $this->port = $port; $this->updateMap['port'] = true; return $this;
    }

    public function getPort(): ?int
    {
        return $this->port;
    }

    public function requirePort(): int
    {
        if (static::METADATA['port']['type'] === 'popo' && $this->port === null) {
            $popo = static::METADATA['port']['default'];
            $this->port = new $popo;
        }

        if ($this->port === null) {
            throw new UnexpectedValueException('Required value of "port" has not been set');
        }
        return $this->port;
    }

    public function hasPort(): bool
    {
        return $this->port !== null || ($this->port !== null && array_key_exists('port', $this->updateMap));
    }

    public function setReadTimeout(?float $readTimeout): self
    {
        $this->readTimeout = $readTimeout; $this->updateMap['readTimeout'] = true; return $this;
    }

    public function getReadTimeout(): ?float
    {
        return $this->readTimeout;
    }

    public function requireReadTimeout(): float
    {
        if (static::METADATA['readTimeout']['type'] === 'popo' && $this->readTimeout === null) {
            $popo = static::METADATA['readTimeout']['default'];
            $this->readTimeout = new $popo;
        }

        if ($this->readTimeout === null) {
            throw new UnexpectedValueException('Required value of "readTimeout" has not been set');
        }
        return $this->readTimeout;
    }

    public function hasReadTimeout(): bool
    {
        return $this->readTimeout !== null || ($this->readTimeout !== null && array_key_exists('readTimeout', $this->updateMap));
    }

    public function setRetryInterval(?int $retryInterval): self
    {
        $this->retryInterval = $retryInterval; $this->updateMap['retryInterval'] = true; return $this;
    }

    public function getRetryInterval(): ?int
    {
        return $this->retryInterval;
    }

    public function requireRetryInterval(): int
    {
        if (static::METADATA['retryInterval']['type'] === 'popo' && $this->retryInterval === null) {
            $popo = static::METADATA['retryInterval']['default'];
            $this->retryInterval = new $popo;
        }

        if ($this->retryInterval === null) {
            throw new UnexpectedValueException('Required value of "retryInterval" has not been set');
        }
        return $this->retryInterval;
    }

    public function hasRetryInterval(): bool
    {
        return $this->retryInterval !== null || ($this->retryInterval !== null && array_key_exists('retryInterval', $this->updateMap));
    }

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    public function setShouldBubble(?bool $shouldBubble): self
    {
        $this->shouldBubble = $shouldBubble; $this->updateMap['shouldBubble'] = true; return $this;
    }

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    public function shouldBubble(): ?bool
    {
        return $this->shouldBubble;
    }

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    public function requireShouldBubble(): bool
    {
        if (static::METADATA['shouldBubble']['type'] === 'popo' && $this->shouldBubble === null) {
            $popo = static::METADATA['shouldBubble']['default'];
            $this->shouldBubble = new $popo;
        }

        if ($this->shouldBubble === null) {
            throw new UnexpectedValueException('Required value of "shouldBubble" has not been set');
        }
        return $this->shouldBubble;
    }

    public function hasShouldBubble(): bool
    {
        return $this->shouldBubble !== null || ($this->shouldBubble !== null && array_key_exists('shouldBubble', $this->updateMap));
    }

    public function setTimeout(?float $timeout): self
    {
        $this->timeout = $timeout; $this->updateMap['timeout'] = true; return $this;
    }

    public function getTimeout(): ?float
    {
        return $this->timeout;
    }

    public function requireTimeout(): float
    {
        if (static::METADATA['timeout']['type'] === 'popo' && $this->timeout === null) {
            $popo = static::METADATA['timeout']['default'];
            $this->timeout = new $popo;
        }

        if ($this->timeout === null) {
            throw new UnexpectedValueException('Required value of "timeout" has not been set');
        }
        return $this->timeout;
    }

    public function hasTimeout(): bool
    {
        return $this->timeout !== null || ($this->timeout !== null && array_key_exists('timeout', $this->updateMap));
    }

    #[\JetBrains\PhpStorm\ArrayShape(self::SHAPE_PROPERTIES)]
    public function toArray(): array
    {
        $data = [
            'host' => $this->host,
            'logLevel' => $this->logLevel,
            'password' => $this->password,
            'persistentId' => $this->persistentId,
            'pluginClass' => $this->pluginClass,
            'pluginFactoryClass' => $this->pluginFactoryClass,
            'port' => $this->port,
            'readTimeout' => $this->readTimeout,
            'retryInterval' => $this->retryInterval,
            'shouldBubble' => $this->shouldBubble,
            'timeout' => $this->timeout,
        ];

        array_walk(
            $data,
            function (&$value, $name) use ($data) {
                $popo = static::METADATA[$name]['default'];
                if (static::METADATA[$name]['type'] === 'popo') {
                    $value = $this->$name !== null ? $this->$name->toArray() : (new $popo)->toArray();
                }
            }
        );

        return $data;
    }

    public function fromArray(#[\JetBrains\PhpStorm\ArrayShape(self::SHAPE_PROPERTIES)] array $data): self
    {
        foreach (static::METADATA as $name => $meta) {
            $value = $data[$name] ?? $this->$name ?? null;
            $popoValue = $meta['default'];

            if ($popoValue !== null && $meta['type'] === 'popo') {
                $popo = new $popoValue;

                if (is_array($value)) {
                    $popo->fromArray($value);
                }

                $value = $popo;
            }

            $this->$name = $value;
            $this->updateMap[$name] = true;
        }

        return $this;
    }

    public function isNew(): bool
    {
        return empty($this->updateMap) === true;
    }

    public function requireAll(): self
    {
        $errors = [];

        try {
            $this->requireHost();
        }
        catch (\Throwable $throwable) {
            $errors['host'] = $throwable->getMessage();
        }
        try {
            $this->requireLogLevel();
        }
        catch (\Throwable $throwable) {
            $errors['logLevel'] = $throwable->getMessage();
        }
        try {
            $this->requirePassword();
        }
        catch (\Throwable $throwable) {
            $errors['password'] = $throwable->getMessage();
        }
        try {
            $this->requirePersistentId();
        }
        catch (\Throwable $throwable) {
            $errors['persistentId'] = $throwable->getMessage();
        }
        try {
            $this->requirePluginClass();
        }
        catch (\Throwable $throwable) {
            $errors['pluginClass'] = $throwable->getMessage();
        }
        try {
            $this->requirePluginFactoryClass();
        }
        catch (\Throwable $throwable) {
            $errors['pluginFactoryClass'] = $throwable->getMessage();
        }
        try {
            $this->requirePort();
        }
        catch (\Throwable $throwable) {
            $errors['port'] = $throwable->getMessage();
        }
        try {
            $this->requireReadTimeout();
        }
        catch (\Throwable $throwable) {
            $errors['readTimeout'] = $throwable->getMessage();
        }
        try {
            $this->requireRetryInterval();
        }
        catch (\Throwable $throwable) {
            $errors['retryInterval'] = $throwable->getMessage();
        }
        try {
            $this->requireShouldBubble();
        }
        catch (\Throwable $throwable) {
            $errors['shouldBubble'] = $throwable->getMessage();
        }
        try {
            $this->requireTimeout();
        }
        catch (\Throwable $throwable) {
            $errors['timeout'] = $throwable->getMessage();
        }

        if (empty($errors) === false) {
            throw new UnexpectedValueException(
                implode("\n", $errors)
            );
        }

        return $this;
    }
}
