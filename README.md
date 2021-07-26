# EveronLoggerRedis

A plugin with Redis handler for [EveronLogger](https://github.com/oliwierptak/everon-logger).
 
## Configuration

- Configurator

    `Everon\Logger\Configurator\Plugin\RedisLoggerPluginConfigurator`
    
- Redis Connection Configurator

    `Everon\Logger\Configurator\Plugin\RedisConnectionConfigurator`
 
- Default Options

    ```php
    'pluginClass' => \Everon\Logger\Plugin\Redis\RedisLoggerPlugin::class,
    'pluginFactoryClass' => null,
    'logLevel' => 'debug',
    'shouldBubble' => true,
    'key' => null,
    'capSize' => 0,
    'redisConnection' => null,
    ```
  
- Default Options for `RedisConnectionConfigurator`

    ```php
    'host' => null,
    'port' => 6379,
    'timeout' => 0.0,
    'password' => null,
    'persistentId' => null,
    'retryInterval' => 0,
    'readTimeout' => 0.0,
    ```

- Plugin

  `Everon\Logger\Plugin\Redis\RedisLoggerPlugin`

- Usage

    ```php
    use Everon\Logger\Configurator\Plugin\LoggerConfigurator;
    use Everon\Logger\Configurator\Plugin\RedisLoggerPluginConfigurator;
    use Everon\Logger\EveronLoggerFacade;
  
    $redisPluginConfigurator = (new RedisLoggerPluginConfigurator())
        ->setLogLevel('debug')
        ->setKey('foo-bar-queue');
  
    $redisPluginConfigurator->getRedisConnection()
        ->setHost('redis.host')
        ->setPort(6379)
        ->setTimeout(10);
  
    $configurator = (new LoggerConfigurator)
        ->setName('everon-logger-example')
        ->addPluginConfigurator($redisPluginConfigurator);
  
    $logger = (new EveronLoggerFacade)->buildLogger($configurator);
    
    $logger->info('lorem ipsum');
    ```

## Requirements

- PHP v8.x

_Note_: Use v2.x for compatibility with PHP v7.4.

## Installation

```
composer require everon/logger-redis
```
