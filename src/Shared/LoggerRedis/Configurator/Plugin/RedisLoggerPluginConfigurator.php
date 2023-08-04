<?php

/**
 * @SuppressWarnings(PHPMD)
 * @phpcs:ignoreFile
 * Everon logger configuration file. Auto-generated.
 */

declare(strict_types=1);

namespace Everon\Shared\LoggerRedis\Configurator\Plugin;

use DateTime;
use DateTimeZone;
use Throwable;
use UnexpectedValueException;

use function array_filter;
use function array_key_exists;
use function array_keys;
use function array_replace_recursive;
use function in_array;
use function sort;

use const ARRAY_FILTER_USE_KEY;
use const SORT_STRING;

class RedisLoggerPluginConfigurator implements \Everon\Logger\Contract\Configurator\PluginConfiguratorInterface
{
    use \Everon\Shared\Logger\Configurator\MonologLevelConfiguratorTrait;

    public const PLUGIN_CLASS = 'pluginClass';
    public const PLUGIN_FACTORY_CLASS = 'pluginFactoryClass';
    public const SHOULD_BUBBLE = 'shouldBubble';
    public const KEY = 'key';
    public const CAP_SIZE = 'capSize';
    public const REDIS_CONNECTION = 'redisConnection';

    protected const METADATA = [
        'pluginClass' => [
            'type' => 'string',
            'default' => \Everon\LoggerRedis\Plugin\Redis\RedisLoggerPlugin::class,
            'mappingPolicy' => [],
            'mappingPolicyValue' => 'pluginClass',
        ],
        'pluginFactoryClass' => [
            'type' => 'string',
            'default' => null,
            'mappingPolicy' => [],
            'mappingPolicyValue' => 'pluginFactoryClass',
        ],
        'shouldBubble' => [
            'type' => 'bool',
            'default' => true,
            'mappingPolicy' => [],
            'mappingPolicyValue' => 'shouldBubble',
        ],
        'key' => ['type' => 'string', 'default' => null, 'mappingPolicy' => [], 'mappingPolicyValue' => 'key'],
        'capSize' => ['type' => 'int', 'default' => 0, 'mappingPolicy' => [], 'mappingPolicyValue' => 'capSize'],
        'redisConnection' => [
            'type' => 'popo',
            'default' => \Everon\Shared\LoggerRedis\Configurator\Plugin\RedisConnectionConfigurator::class,
            'mappingPolicy' => [],
            'mappingPolicyValue' => 'redisConnection',
        ],
    ];

    protected array $updateMap = [];
    protected ?string $pluginClass = \Everon\LoggerRedis\Plugin\Redis\RedisLoggerPlugin::class;

    /** Defines custom plugin factory to be used to create a plugin */
    protected ?string $pluginFactoryClass = null;

    /** Whether the messages that are handled can bubble up the stack or not */
    protected bool $shouldBubble = true;

    /** The key name to push records to */
    protected ?string $key = null;

    /** Number of entries to limit list size to, 0 = unlimited */
    protected ?int $capSize = 0;

    /** Redis connection related settings */
    protected ?RedisConnectionConfigurator $redisConnection = null;

    protected function setupDateTimeProperty($propertyName): void
    {
        if (self::METADATA[$propertyName]['type'] === 'datetime' && $this->$propertyName === null) {
            $value = self::METADATA[$propertyName]['default'] ?: 'now';
            $datetime = new DateTime($value);
            $timezone = self::METADATA[$propertyName]['timezone'] ?? null;
            if ($timezone !== null) {
                $timezone = new DateTimeZone($timezone);
                $datetime = new DateTime($value, $timezone);
            }
            $this->$propertyName = $datetime;
        }
    }

    public function isNew(): bool
    {
        return empty($this->updateMap) === true;
    }

    public function listModifiedProperties(): array
    {
        $sorted = array_keys($this->updateMap);
        sort($sorted, SORT_STRING);
        return $sorted;
    }

    public function modifiedToArray(): array
    {
        $data = $this->toArray();
        $modifiedProperties = $this->listModifiedProperties();

        return array_filter($data, function ($key) use ($modifiedProperties) {
            return in_array($key, $modifiedProperties);
        }, ARRAY_FILTER_USE_KEY);
    }

    protected function setupPopoProperty($propertyName): void
    {
        if (self::METADATA[$propertyName]['type'] === 'popo' && $this->$propertyName === null) {
            $popo = self::METADATA[$propertyName]['default'];
            $this->$propertyName = new $popo;
        }
    }

    public function requireAll(): self
    {
        $errors = [];

        try {
            $this->requirePluginClass();
        }
        catch (Throwable $throwable) {
            $errors['pluginClass'] = $throwable->getMessage();
        }
        try {
            $this->requirePluginFactoryClass();
        }
        catch (Throwable $throwable) {
            $errors['pluginFactoryClass'] = $throwable->getMessage();
        }
        try {
            $this->requireShouldBubble();
        }
        catch (Throwable $throwable) {
            $errors['shouldBubble'] = $throwable->getMessage();
        }
        try {
            $this->requireKey();
        }
        catch (Throwable $throwable) {
            $errors['key'] = $throwable->getMessage();
        }
        try {
            $this->requireCapSize();
        }
        catch (Throwable $throwable) {
            $errors['capSize'] = $throwable->getMessage();
        }
        try {
            $this->requireRedisConnection();
        }
        catch (Throwable $throwable) {
            $errors['redisConnection'] = $throwable->getMessage();
        }

        if (empty($errors) === false) {
            throw new UnexpectedValueException(
                implode("\n", $errors)
            );
        }

        return $this;
    }

    public function fromArray(array $data): self
    {
        $metadata = [
            'pluginClass' => 'pluginClass',
            'pluginFactoryClass' => 'pluginFactoryClass',
            'shouldBubble' => 'shouldBubble',
            'key' => 'key',
            'capSize' => 'capSize',
            'redisConnection' => 'redisConnection',
        ];



        foreach ($metadata as $name => $mappedName) {
            $meta = self::METADATA[$name];
            $value = $data[$mappedName] ?? $this->$name ?? null;
            $popoValue = $meta['default'];

            if ($popoValue !== null && $meta['type'] === 'popo') {
                $popo = new $popoValue;

                if (is_array($value)) {
                    $popo->fromArray($value);
                }

                $value = $popo;
            }

            if ($meta['type'] === 'datetime') {
                if (($value instanceof DateTime) === false) {
                    $datetime = new DateTime($data[$name] ?? $meta['default'] ?: 'now');
                    $timezone = $meta['timezone'] ?? null;
                    if ($timezone !== null) {
                        $timezone = new DateTimeZone($timezone);
                        $datetime = new DateTime($data[$name] ?? self::METADATA[$name]['default'] ?: 'now', $timezone);
                    }
                    $value = $datetime;
                }
            }

            if ($meta['type'] === 'array' && isset($meta['itemIsPopo']) && $meta['itemIsPopo']) {
                $className = $meta['itemType'];

                $valueCollection = [];
                foreach ($value as $popoKey => $popoValue) {
                    $popo = new $className;
                    $popo->fromArray($popoValue);

                    $valueCollection[] = $popo;
                }

                $value = $valueCollection;
            }

            $this->$name = $value;
            if (array_key_exists($mappedName, $data)) {
                $this->updateMap[$name] = true;
            }
        }

        return $this;
    }

    public function fromMappedArray(array $data, ...$mappings): self
    {
        $result = [];
        foreach (self::METADATA as $name => $propertyMetadata) {
            $mappingPolicyValue = $propertyMetadata['mappingPolicyValue'];
            $inputKey = $this->mapKeyName($mappings, $mappingPolicyValue);
            $value = $data[$inputKey] ?? null;

            if (self::METADATA[$name]['type'] === 'popo') {
                $popo = self::METADATA[$name]['default'];
                $value = $this->$name !== null
                    ? $this->$name->fromMappedArray($value ?? [], ...$mappings)
                    : (new $popo)->fromMappedArray($value ?? [], ...$mappings);
                $value = $value->toArray();
            }

            $result[$mappingPolicyValue] = $value;
        }

        $this->fromArray($result);

        return $this;
    }

    public function toArray(): array
    {
        $metadata = [
            'pluginClass' => 'pluginClass',
            'pluginFactoryClass' => 'pluginFactoryClass',
            'shouldBubble' => 'shouldBubble',
            'key' => 'key',
            'capSize' => 'capSize',
            'redisConnection' => 'redisConnection',
        ];

        $data = [];

        foreach ($metadata as $name => $mappedName) {
            $value = $this->$name;

            if (self::METADATA[$name]['type'] === 'popo') {
                $popo = self::METADATA[$name]['default'];
                $value = $this->$name !== null ? $this->$name->toArray() : (new $popo)->toArray();
            }

            if (self::METADATA[$name]['type'] === 'datetime') {
                if (($value instanceof DateTime) === false) {
                    $datetime = new DateTime(self::METADATA[$name]['default'] ?: 'now');
                    $timezone = self::METADATA[$name]['timezone'] ?? null;
                    if ($timezone !== null) {
                        $timezone = new DateTimeZone($timezone);
                        $datetime = new DateTime($this->$name ?? self::METADATA[$name]['default'] ?: 'now', $timezone);
                    }
                    $value = $datetime;
                }

                $value = $value->format(self::METADATA[$name]['format']);
            }

            if (self::METADATA[$name]['type'] === 'array' && isset(self::METADATA[$name]['itemIsPopo']) && self::METADATA[$name]['itemIsPopo']) {
                $valueCollection = [];
                foreach ($value as $popo) {
                    $valueCollection[] = $popo->toArray();
                }

                $value = $valueCollection;
            }

            $data[$mappedName] = $value;
        }



        return $data;
    }

    public function toMappedArray(...$mappings): array
    {
        return $this->map($this->toArray(), $mappings);
    }

    protected function map(array $data, array $mappings): array
    {
        $result = [];
        foreach (self::METADATA as $name => $propertyMetadata) {
            $value = $data[$propertyMetadata['mappingPolicyValue']];

            if (self::METADATA[$name]['type'] === 'popo') {
                $popo = self::METADATA[$name]['default'];
                $value = $this->$name !== null ? $this->$name->toMappedArray(...$mappings) : (new $popo)->toMappedArray(...$mappings);
            }

            $key = $this->mapKeyName($mappings, $propertyMetadata['mappingPolicyValue']);
            $result[$key] = $value;
        }

        return $result;
    }

    protected function mapKeyName(array $mappings, string $key): string
    {
        static $mappingPolicy = [];

        if (empty($mappingPolicy)) {

            $mappingPolicy['none'] =
                static function (string $key): string {
                    return $key;
                };

            $mappingPolicy['lower'] =
                static function (string $key): string {
                    return mb_strtolower($key);
                };

            $mappingPolicy['upper'] =
                static function (string $key): string {
                    return mb_strtoupper($key);
                };

            $mappingPolicy['snake-to-camel'] =
                static function (string $key): string {
                    $stringTokens = explode('_', mb_strtolower($key));
                $camelizedString = array_shift($stringTokens);
                foreach ($stringTokens as $token) {
                    $camelizedString .= ucfirst($token);
                }

                return $camelizedString;
                };

            $mappingPolicy['camel-to-snake'] =
                static function (string $key): string {
                    $camelizedStringTokens = preg_split('/(?<=[^A-Z])(?=[A-Z])/', $key);
                if ($camelizedStringTokens !== false && count($camelizedStringTokens) > 0) {
                    $key = mb_strtolower(implode('_', $camelizedStringTokens));
                }

                return $key;
                };

        }

        foreach ($mappings as $mappingIndex => $mappingType) {
            if (!array_key_exists($mappingType, $mappingPolicy)) {
                continue;
            }

            $key = $mappingPolicy[$mappingType]($key);
        }

        return $key;
    }

    public function toArrayLower(): array
    {
        return $this->toMappedArray('lower');
    }

    public function toArrayUpper(): array
    {
        return $this->toMappedArray('upper');
    }

    public function toArraySnakeToCamel(): array
    {
        return $this->toMappedArray('snake-to-camel');
    }

    public function toArrayCamelToSnake(): array
    {
        return $this->toMappedArray('camel-to-snake');
    }

    public function getPluginClass(): ?string
    {
        return $this->pluginClass;
    }

    public function hasPluginClass(): bool
    {
        return $this->pluginClass !== null;
    }

    public function requirePluginClass(): string
    {
        $this->setupPopoProperty('pluginClass');
        $this->setupDateTimeProperty('pluginClass');

        if ($this->pluginClass === null) {
            throw new UnexpectedValueException('Required value of "pluginClass" has not been set');
        }
        return $this->pluginClass;
    }

    public function setPluginClass(?string $pluginClass): self
    {
        $this->pluginClass = $pluginClass; $this->updateMap['pluginClass'] = true; return $this;
    }

    /**
     * Defines custom plugin factory to be used to create a plugin
     */
    public function getPluginFactoryClass(): ?string
    {
        return $this->pluginFactoryClass;
    }

    public function hasPluginFactoryClass(): bool
    {
        return $this->pluginFactoryClass !== null;
    }

    /**
     * Defines custom plugin factory to be used to create a plugin
     */
    public function requirePluginFactoryClass(): string
    {
        $this->setupPopoProperty('pluginFactoryClass');
        $this->setupDateTimeProperty('pluginFactoryClass');

        if ($this->pluginFactoryClass === null) {
            throw new UnexpectedValueException('Required value of "pluginFactoryClass" has not been set');
        }
        return $this->pluginFactoryClass;
    }

    /**
     * Defines custom plugin factory to be used to create a plugin
     */
    public function setPluginFactoryClass(?string $pluginFactoryClass): self
    {
        $this->pluginFactoryClass = $pluginFactoryClass; $this->updateMap['pluginFactoryClass'] = true; return $this;
    }

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    public function shouldBubble(): ?bool
    {
        return $this->shouldBubble;
    }

    public function hasShouldBubble(): bool
    {
        return $this->shouldBubble !== null;
    }

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    public function requireShouldBubble(): bool
    {
        $this->setupPopoProperty('shouldBubble');
        $this->setupDateTimeProperty('shouldBubble');

        if ($this->shouldBubble === null) {
            throw new UnexpectedValueException('Required value of "shouldBubble" has not been set');
        }
        return $this->shouldBubble;
    }

    /**
     * Whether the messages that are handled can bubble up the stack or not
     */
    public function setShouldBubble(bool $shouldBubble): self
    {
        $this->shouldBubble = $shouldBubble; $this->updateMap['shouldBubble'] = true; return $this;
    }

    /**
     * The key name to push records to
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    public function hasKey(): bool
    {
        return $this->key !== null;
    }

    /**
     * The key name to push records to
     */
    public function requireKey(): string
    {
        $this->setupPopoProperty('key');
        $this->setupDateTimeProperty('key');

        if ($this->key === null) {
            throw new UnexpectedValueException('Required value of "key" has not been set');
        }
        return $this->key;
    }

    /**
     * The key name to push records to
     */
    public function setKey(?string $key): self
    {
        $this->key = $key; $this->updateMap['key'] = true; return $this;
    }

    /**
     * Number of entries to limit list size to, 0 = unlimited
     */
    public function getCapSize(): ?int
    {
        return $this->capSize;
    }

    public function hasCapSize(): bool
    {
        return $this->capSize !== null;
    }

    /**
     * Number of entries to limit list size to, 0 = unlimited
     */
    public function requireCapSize(): int
    {
        $this->setupPopoProperty('capSize');
        $this->setupDateTimeProperty('capSize');

        if ($this->capSize === null) {
            throw new UnexpectedValueException('Required value of "capSize" has not been set');
        }
        return $this->capSize;
    }

    /**
     * Number of entries to limit list size to, 0 = unlimited
     */
    public function setCapSize(?int $capSize): self
    {
        $this->capSize = $capSize; $this->updateMap['capSize'] = true; return $this;
    }

    /**
     * Redis connection related settings
     */
    public function getRedisConnection(): ?RedisConnectionConfigurator
    {
        return $this->redisConnection;
    }

    public function hasRedisConnection(): bool
    {
        return $this->redisConnection !== null;
    }

    /**
     * Redis connection related settings
     */
    public function requireRedisConnection(): RedisConnectionConfigurator
    {
        $this->setupPopoProperty('redisConnection');
        $this->setupDateTimeProperty('redisConnection');

        if ($this->redisConnection === null) {
            throw new UnexpectedValueException('Required value of "redisConnection" has not been set');
        }
        return $this->redisConnection;
    }

    /**
     * Redis connection related settings
     */
    public function setRedisConnection(?RedisConnectionConfigurator $redisConnection): self
    {
        $this->redisConnection = $redisConnection; $this->updateMap['redisConnection'] = true; return $this;
    }
}
