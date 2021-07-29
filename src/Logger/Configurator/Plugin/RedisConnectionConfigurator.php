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
        $this->setupPopoProperty('host');

        if ($this->host === null) {
            throw new UnexpectedValueException('Required value of "host" has not been set');
        }
        return $this->host;
    }

    public function hasHost(): bool
    {
        return $this->host !== null;
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
        $this->setupPopoProperty('logLevel');

        if ($this->logLevel === null) {
            throw new UnexpectedValueException('Required value of "logLevel" has not been set');
        }
        return $this->logLevel;
    }

    public function hasLogLevel(): bool
    {
        return $this->logLevel !== null;
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
        $this->setupPopoProperty('password');

        if ($this->password === null) {
            throw new UnexpectedValueException('Required value of "password" has not been set');
        }
        return $this->password;
    }

    public function hasPassword(): bool
    {
        return $this->password !== null;
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
        $this->setupPopoProperty('persistentId');

        if ($this->persistentId === null) {
            throw new UnexpectedValueException('Required value of "persistentId" has not been set');
        }
        return $this->persistentId;
    }

    public function hasPersistentId(): bool
    {
        return $this->persistentId !== null;
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
        $this->setupPopoProperty('pluginClass');

        if ($this->pluginClass === null) {
            throw new UnexpectedValueException('Required value of "pluginClass" has not been set');
        }
        return $this->pluginClass;
    }

    public function hasPluginClass(): bool
    {
        return $this->pluginClass !== null;
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
        $this->setupPopoProperty('pluginFactoryClass');

        if ($this->pluginFactoryClass === null) {
            throw new UnexpectedValueException('Required value of "pluginFactoryClass" has not been set');
        }
        return $this->pluginFactoryClass;
    }

    public function hasPluginFactoryClass(): bool
    {
        return $this->pluginFactoryClass !== null;
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
        $this->setupPopoProperty('port');

        if ($this->port === null) {
            throw new UnexpectedValueException('Required value of "port" has not been set');
        }
        return $this->port;
    }

    public function hasPort(): bool
    {
        return $this->port !== null;
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
        $this->setupPopoProperty('readTimeout');

        if ($this->readTimeout === null) {
            throw new UnexpectedValueException('Required value of "readTimeout" has not been set');
        }
        return $this->readTimeout;
    }

    public function hasReadTimeout(): bool
    {
        return $this->readTimeout !== null;
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
        $this->setupPopoProperty('retryInterval');

        if ($this->retryInterval === null) {
            throw new UnexpectedValueException('Required value of "retryInterval" has not been set');
        }
        return $this->retryInterval;
    }

    public function hasRetryInterval(): bool
    {
        return $this->retryInterval !== null;
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
        $this->setupPopoProperty('shouldBubble');

        if ($this->shouldBubble === null) {
            throw new UnexpectedValueException('Required value of "shouldBubble" has not been set');
        }
        return $this->shouldBubble;
    }

    public function hasShouldBubble(): bool
    {
        return $this->shouldBubble !== null;
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
        $this->setupPopoProperty('timeout');

        if ($this->timeout === null) {
            throw new UnexpectedValueException('Required value of "timeout" has not been set');
        }
        return $this->timeout;
    }

    public function hasTimeout(): bool
    {
        return $this->timeout !== null;
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

    public function listModifiedProperties(): array
    {
        return array_keys($this->updateMap);
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

    protected function setupPopoProperty($propertyName): void
    {
        if (static::METADATA[$propertyName]['type'] === 'popo' && $this->$propertyName === null) {
            $popo = static::METADATA[$propertyName]['default'];
            $this->$propertyName = new $popo;
        }
    }
}
