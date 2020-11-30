<?php

declare(strict_types = 1);

namespace EveronLoggerTests\Suit\Acceptance\Plugin\Redis;

use Everon\Logger\Configurator\Plugin\LoggerConfigurator;
use Everon\Logger\Configurator\Plugin\RedisLoggerPluginConfigurator;
use Everon\Logger\Contract\Configurator\LoggerConfiguratorInterface;
use Everon\Logger\EveronLoggerFacade;
use Everon\Logger\Plugin\Redis\RedisLoggerPlugin;
use EveronLoggerTests\Stub\Processor\MemoryUsageProcessorStub;
use EveronLoggerTests\Suit\Configurator\TestLoggerConfigurator;
use PHPUnit\Framework\TestCase;
use Redis;
use function addslashes;
use function array_shift;
use function preg_split;

/**
 * @group acceptance
 */
class RedisLoggerPluginTest extends TestCase
{
    protected const REDIS_QUEUE = 'everon-redis-queue';

    protected Redis $redis;

    protected LoggerConfiguratorInterface $configurator;

    protected EveronLoggerFacade $facade;

    protected string $redisHost;

    protected int $redisPort;

    public function test_should_not_log_without_key(): void
    {
        $logger = $this->facade->buildLogger($this->configurator);

        $logger->debug('foo bar');

        $this->assertEmptyRedis();
    }

    protected function assertEmptyRedis(): void
    {
        $data = $this->getRedis()->lRange(static::REDIS_QUEUE, 0, -1);

        $this->assertEmpty($data);
    }

    public function test_should_not_log_when_level_too_low(): void
    {
        $this->configurator
            ->getConfiguratorByPluginName(RedisLoggerPlugin::class)
            ->setLogLevel('info');

        $logger = $this->facade->buildLogger($this->configurator);

        $logger->debug('foo bar');

        $this->assertEmptyRedis();
    }

    public function test_should_log(): void
    {
        $this->configurator
            ->getConfiguratorByPluginName(RedisLoggerPlugin::class)
            ->setLogLevel('info')
            ->setKey(static::REDIS_QUEUE);

        $logger = $this->facade->buildLogger($this->configurator);

        $logger->info('foo bar');
        $this->assertRedis((new TestLoggerConfigurator())
            ->setMessage('foo bar')
            ->setLevel('info'));

        $logger->warning('foo bar warning');
        $this->assertRedis((new TestLoggerConfigurator())
            ->setMessage('foo bar warning')
            ->setLevel('warning'));
    }

    protected function assertRedis(TestLoggerConfigurator $configurator): void
    {
        $jsonContextString = json_encode($configurator->getContext());
        $jsonExtraString = json_encode($configurator->getExtra());
        $data = $this->getRedis()->lRange(static::REDIS_QUEUE, 0, -1);

        $firstLine = array_shift($data);
        if (empty($data)) {
            $data = [$firstLine];
        }

        foreach ($data as $line) {
            //[2020-11-21T14:25:08.720572+00:00] everon-logger.INFO: foo bar [] []
            $tokens = preg_split('@' . addslashes($configurator->getDelimiter()) . '@', trim($line));
            if (count($tokens) < 2) {
                continue;
            }

            $expected = sprintf(
                '%s: %s %s %s',
                strtoupper($configurator->getLevel()),
                $configurator->getMessage(),
                $jsonContextString,
                $jsonExtraString
            );
            $this->assertEquals($expected, trim($tokens[1]));
        }
    }

    public function test_should_log_context(): void
    {
        $this->configurator
            ->getConfiguratorByPluginName(RedisLoggerPlugin::class)
            ->setLogLevel('info')
            ->setKey(static::REDIS_QUEUE);

        $logger = $this->facade->buildLogger($this->configurator);

        $logger->info('foo bar', ['buzz' => 'lorem ipsum']);

        $this->assertRedis((new TestLoggerConfigurator())
            ->setMessage('foo bar')
            ->setLevel('info')
            ->setContext(['buzz' => 'lorem ipsum']));
    }

    public function test_should_log_context_and_extra(): void
    {
        $this->configurator
            ->addProcessorClass(MemoryUsageProcessorStub::class)
            ->getConfiguratorByPluginName(RedisLoggerPlugin::class)
            ->setLogLevel('info')
            ->setKey(static::REDIS_QUEUE);

        $logger = $this->facade->buildLogger($this->configurator);

        $logger->info('foo bar', ['buzz' => 'lorem ipsum']);

        $this->assertRedis((new TestLoggerConfigurator())
            ->setMessage('foo bar')
            ->setLevel('info')
            ->setContext(['buzz' => 'lorem ipsum'])
            ->setExtra(['memory_peak_usage' => '5 MB']));
    }

    protected function setUp(): void
    {
        $this->redisHost = $_ENV['TEST_REDIS_HOST'];
        $this->redisPort = (int) $_ENV['TEST_REDIS_PORT'];

        $this->getRedis()->flushAll();

        $redisPluginConfigurator = (new RedisLoggerPluginConfigurator())
            ->setPluginClass(RedisLoggerPlugin::class)
            ->setLogLevel('debug');

        $redisPluginConfigurator->getRedisConnection()
            ->setHost($this->redisHost)
            ->setPort($this->redisPort)
            ->setPersistentId('foo-bar')
            ->setReadTimeout(0.0)
            ->setRetryInterval(3)
            ->setTimeout(10)
            ->setPassword('hunter2');

        $this->configurator = new LoggerConfigurator();
        $this->configurator->addPluginConfigurator($redisPluginConfigurator);

        $this->facade = new EveronLoggerFacade();
    }

    public function getRedis(): Redis
    {
        if (empty($this->redis)) {
            $this->redis = new Redis();
            $this->redis->pconnect(
                $this->redisHost,
                $this->redisPort,
                10
            );

            $this->redis->auth('hunter2');
        }

        return $this->redis;
    }
}
