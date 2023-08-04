# EveronLoggerRedis

A plugin with Redis handler for [EveronLogger](https://github.com/oliwierptak/everon-logger).
 
## Configuration

- Configurator

    `Everon\Shared\LoggerRedis\Configurator\Plugin\RedisLoggerPluginConfigurator`
    
- Redis Connection Configurator

    `Everon\Shared\LoggerRedis\Configurator\Plugin\RedisConnectionConfigurator`
 
- Default Options

    ```php
    'pluginClass' => \Everon\LoggerRedis\Plugin\Redis\RedisLoggerPlugin::class,
    'pluginFactoryClass' => null,
    'logLevel' => \Monolog\Level::Debug,
    'shouldBubble' => true,
    'key' => null,
    'capSize' => 0,
    'redisConnection' => \Everon\Shared\LoggerRedis\Configurator\Plugin\RedisConnectionConfigurator,
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

  `Everon\LoggerRedis\Plugin\Redis\RedisLoggerPlugin`

- Usage

    ```php
    use Everon\Shared\Logger\Configurator\Plugin\LoggerConfigurator;
    use Everon\Shared\LoggerRedis\Configurator\Plugin\RedisLoggerPluginConfigurator;
    use Everon\Logger\EveronLoggerFacade;
  
    $redisPluginConfigurator = (new RedisLoggerPluginConfigurator())
      ->setLogLevel(\Monolog\Level::Info)
      ->setKey('foo-bar-queue');
  
    $redisPluginConfigurator->requireRedisConnection()
      ->setPersistentId('persistent-connection')
      ->setHost('redis.host')
      ->setReadTimeout(0.5)
      ->setRetryInterval(3)
      ->setTimeout(10);
  
    $configurator = (new LoggerConfigurator)
      ->setName('everon-logger-example')
      ->add($redisPluginConfigurator);
  
    $logger = (new EveronLoggerFacade)->buildLogger($configurator);
    
    $logger->info('lorem ipsum');
    ```

## Requirements

- PHP v8.1.x
- Monolog v3.x

## Installation

```
composer require everon/logger-redis
```
