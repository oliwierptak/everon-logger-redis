<?php

/**
 * Everon logger configuration file. Auto-generated.
 */

declare(strict_types=1);

namespace Everon\Logger\Configurator\Plugin;

use UnexpectedValueException;

class RedisLoggerPluginConfigurator implements \Everon\Logger\Contract\Configurator\PluginConfiguratorInterface
{
    protected const SHAPE_PROPERTIES = [
        'capSize' => 'null|int',
        'key' => 'null|string',
        'logLevel' => 'null|string',
        'pluginClass' => 'null|string',
        'pluginFactoryClass' => 'null|string',
        'redisConnection' => \Everon\Logger\Configurator\Plugin\RedisConnectionConfigurator::class,
        'shouldBubble' => 'null|bool',
    ];

    protected const METADATA = [
        'capSize' => ['type' => 'int', 'default' => 0],
        'key' => ['type' => 'string', 'default' => null],
        'logLevel' => ['type' => 'string', 'default' => 'debug'],
        'pluginClass' => ['type' => 'string', 'default' => \Everon\Logger\Plugin\Redis\RedisLoggerPlugin::class],
        'pluginFactoryClass' => ['type' => 'string', 'default' => null],
        'redisConnection' => [
            'type' => 'popo',
            'default' => \Everon\Logger\Configurator\Plugin\RedisConnectionConfigurator::class,
        ],
        'shouldBubble' => ['type' => 'bool', 'default' => true],
    ];

    /** Number of entries to limit list size to, 0 = unlimited */
    protected ?int $capSize = 0;

    /** The key name to push records to */
    protected ?string $key = null;

    /** The minimum logging level at which this handler will be triggered */
    protected ?string $logLevel = 'debug';
    protected ?string $pluginClass = \Everon\Logger\Plugin\Redis\RedisLoggerPlugin::class;

    /** Defines custom plugin factory to be used to create a plugin */
    protected ?string $pluginFactoryClass = null;

    /** Redis connection related settings */
    protected ?RedisConnectionConfigurator $redisConnection = null;

    /** Whether the messages that are handled can bubble up the stack or not */
    protected ?bool $shouldBubble = true;
    protected array $updateMap = [];

    /**
     * Number of entries to limit list size to, 0 = unlimited
     */
    public function setCapSize(?int $capSize): self
    {
        $this->capSize = $capSize; $this->updateMap['capSize'] = true; return $this;
    }

    /**
     * Number of entries to limit list size to, 0 = unlimited
     */
    public function getCapSize(): ?int
    {
        return $this->capSize;
    }

    /**
     * Number of entries to limit list size to, 0 = unlimited
     */
    public function requireCapSize(): int
    {
        $this->setupPopoProperty('capSize');

        if ($this->capSize === null) {
            throw new UnexpectedValueException('Required value of "capSize" has not been set');
        }
        return $this->capSize;
    }

    public function hasCapSize(): bool
    {
        return $this->capSize !== null;
    }

    /**
     * The key name to push records to
     */
    public function setKey(?string $key): self
    {
        $this->key = $key; $this->updateMap['key'] = true; return $this;
    }

    /**
     * The key name to push records to
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * The key name to push records to
     */
    public function requireKey(): string
    {
        $this->setupPopoProperty('key');

        if ($this->key === null) {
            throw new UnexpectedValueException('Required value of "key" has not been set');
        }
        return $this->key;
    }

    public function hasKey(): bool
    {
        return $this->key !== null;
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

    /**
     * Redis connection related settings
     */
    public function setRedisConnection(?RedisConnectionConfigurator $redisConnection): self
    {
        $this->redisConnection = $redisConnection; $this->updateMap['redisConnection'] = true; return $this;
    }

    /**
     * Redis connection related settings
     */
    public function getRedisConnection(): ?RedisConnectionConfigurator
    {
        return $this->redisConnection;
    }

    /**
     * Redis connection related settings
     */
    public function requireRedisConnection(): RedisConnectionConfigurator
    {
        $this->setupPopoProperty('redisConnection');

        if ($this->redisConnection === null) {
            throw new UnexpectedValueException('Required value of "redisConnection" has not been set');
        }
        return $this->redisConnection;
    }

    public function hasRedisConnection(): bool
    {
        return $this->redisConnection !== null;
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

    #[\JetBrains\PhpStorm\ArrayShape(self::SHAPE_PROPERTIES)]
    public function toArray(): array
    {
        $data = [
            'capSize' => $this->capSize,
            'key' => $this->key,
            'logLevel' => $this->logLevel,
            'pluginClass' => $this->pluginClass,
            'pluginFactoryClass' => $this->pluginFactoryClass,
            'redisConnection' => $this->redisConnection,
            'shouldBubble' => $this->shouldBubble,
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
            $this->requireCapSize();
        }
        catch (\Throwable $throwable) {
            $errors['capSize'] = $throwable->getMessage();
        }
        try {
            $this->requireKey();
        }
        catch (\Throwable $throwable) {
            $errors['key'] = $throwable->getMessage();
        }
        try {
            $this->requireLogLevel();
        }
        catch (\Throwable $throwable) {
            $errors['logLevel'] = $throwable->getMessage();
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
            $this->requireRedisConnection();
        }
        catch (\Throwable $throwable) {
            $errors['redisConnection'] = $throwable->getMessage();
        }
        try {
            $this->requireShouldBubble();
        }
        catch (\Throwable $throwable) {
            $errors['shouldBubble'] = $throwable->getMessage();
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
