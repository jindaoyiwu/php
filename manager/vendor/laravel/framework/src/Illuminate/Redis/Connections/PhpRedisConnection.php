<?php

namespace Illuminate\Redis\Connections;

use Redis;
use Closure;
use RedisCluster;
use Illuminate\Contracts\Redis\Connection as ConnectionContract;

/**
 * @mixin \Redis
 * @method int del(array|string $keys)
 * @method null dump($key)
 * @method int expire($key, $seconds)
 * @method int expireat($key, $timestamp)
 * @method array keys($pattern)
 * @method int move($key, $db)
 * @method mixed object($subcommand, $key)
 * @method int persist($key)
 * @method int pexpire($key, $milliseconds)
 * @method int pexpireat($key, $timestamp)
 * @method int pttl($key)
 * @method null randomkey()
 * @method mixed rename($key, $target)
 * @method int renamenx($key, $target)
 * @method array scan($cursor, array $options = null)
 * @method array sort($key, array $options = null)
 * @method int ttl($key)
 * @method mixed type($key)
 * @method int append($key, $value)
 * @method int bitcount($key, $start = null, $end = null)
 * @method int bitop($operation, $destkey, $key)
 * @method null bitfield($key, $subcommand, ...$subcommandArg)
 * @method int bitpos($key, $bit, $start = null, $end = null)
 * @method int decr($key)
 * @method int decrby($key, $decrement)
 * @method int getbit($key, $offset)
 * @method string getrange($key, $start, $end)
 * @method null getset($key, $value)
 * @method int incr($key)
 * @method int incrby($key, $increment)
 * @method string incrbyfloat($key, $increment)
 * @method mixed mset(array $dictionary)
 * @method int msetnx(array $dictionary)
 * @method mixed psetex($key, $milliseconds, $value)
 * @method int setbit($key, $offset, $value)
 * @method int setex($key, $seconds, $value)
 * @method int setrange($key, $offset, $value)
 * @method int strlen($key)
 * @method int hdel($key, array $fields)
 * @method int hexists($key, $field)
 * @method null hget($key, $field)
 * @method array hgetall($key)
 * @method int hincrby($key, $field, $increment)
 * @method string hincrbyfloat($key, $field, $increment)
 * @method array hkeys($key)
 * @method int hlen($key)
 * @method array hscan($key, $cursor, array $options = null)
 * @method int hset($key, $field, $value)
 * @method array hvals($key)
 * @method int hstrlen($key, $field)
 * @method null brpoplpush($source, $destination, $timeout)
 * @method null lindex($key, $index)
 * @method int linsert($key, $whence, $pivot, $value)
 * @method int llen($key)
 * @method null lpop($key)
 * @method int lpush($key, array $values)
 * @method int lpushx($key, array $values)
 * @method array lrange($key, $start, $stop)
 * @method mixed lset($key, $index, $value)
 * @method mixed ltrim($key, $start, $stop)
 * @method null rpop($key)
 * @method null rpoplpush($source, $destination)
 * @method int rpush($key, array $values)
 * @method int rpushx($key, array $values)
 * @method int sadd($key, array $members)
 * @method int scard($key)
 * @method array sdiff(array|string $keys)
 * @method int sdiffstore($destination, array|string $keys)
 * @method array sinter(array|string $keys)
 * @method int sinterstore($destination, array|string $keys)
 * @method int sismember($key, $member)
 * @method array smembers($key)
 * @method int smove($source, $destination, $member)
 * @method null srandmember($key, $count = null)
 * @method int srem($key, $member)
 * @method array sscan($key, $cursor, array $options = null)
 * @method array sunion(array|string $keys)
 * @method int sunionstore($destination, array|string $keys)
 * @method int zcard($key)
 * @method string zcount($key, $min, $max)
 * @method string zincrby($key, $increment, $member)
 * @method array zrange($key, $start, $stop, array $options = null)
 * @method null zrank($key, $member)
 * @method int zrem($key, $member)
 * @method int zremrangebyrank($key, $start, $stop)
 * @method int zremrangebyscore($key, $min, $max)
 * @method array zrevrange($key, $start, $stop, array $options = null)
 * @method null zrevrank($key, $member)
 * @method null zscore($key, $member)
 * @method array zscan($key, $cursor, array $options = null)
 * @method array zrangebylex($key, $start, $stop, array $options = null)
 * @method array zrevrangebylex($key, $start, $stop, array $options = null)
 * @method int zremrangebylex($key, $min, $max)
 * @method int zlexcount($key, $min, $max)
 * @method int pfadd($key, array $elements)
 * @method mixed pfmerge($destinationKey, array|string $sourceKeys)
 * @method int pfcount(array|string $keys)
 * @method mixed pubsub($subcommand, $argument)
 * @method int publish($channel, $message)
 * @method mixed discard()
 * @method null exec()
 * @method mixed multi()
 * @method mixed unwatch()
 * @method mixed watch($key)
 * @method mixed script($subcommand, $argument = null)
 * @method mixed auth($password)
 * @method string echo ($message)
 * @method mixed ping($message = null)
 * @method mixed select($database)
 * @method mixed bgrewriteaof()
 * @method mixed bgsave()
 * @method mixed config($subcommand, $argument = null)
 * @method int dbsize()
 * @method mixed flushall()
 * @method array info($section = null)
 * @method int lastsave()
 * @method mixed save()
 * @method mixed slaveof($host, $port)
 * @method mixed slowlog($subcommand, $argument = null)
 * @method array time()
 * @method int geoadd($key, $longitude, $latitude, $member)
 * @method array geohash($key, array $members)
 * @method array geopos($key, array $members)
 * @method null geodist($key, $member1, $member2, $unit = null)
 * @method array georadius($key, $longitude, $latitude, $radius, $unit, array $options = null)
 * @method array georadiusbymember($key, $member, $radius, $unit, array $options = null)
 */
class PhpRedisConnection extends Connection implements ConnectionContract
{
    /**
     * Create a new PhpRedis connection.
     *
     * @param  \Redis  $client
     * @return void
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Returns the value of the given key.
     *
     * @param  string  $key
     * @return string|null
     */
    public function get($key)
    {
        $result = $this->command('get', [$key]);

        return $result !== false ? $result : null;
    }

    /**
     * Get the values of all the given keys.
     *
     * @param  array  $keys
     * @return array
     */
    public function mget(array $keys)
    {
        return array_map(function ($value) {
            return $value !== false ? $value : null;
        }, $this->command('mget', [$keys]));
    }

    /**
     * Determine if the given keys exist.
     *
     * @param  dynamic  $keys
     * @return int
     */
    public function exists(...$keys)
    {
        $keys = collect($keys)->map(function ($key) {
            return $this->applyPrefix($key);
        })->all();

        return $this->executeRaw(array_merge(['exists'], $keys));
    }

    /**
     * Set the string value in argument as value of the key.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @param  string|null  $expireResolution
     * @param  int|null  $expireTTL
     * @param  string|null  $flag
     * @return bool
     */
    public function set($key, $value, $expireResolution = null, $expireTTL = null, $flag = null)
    {
        return $this->command('set', [
            $key,
            $value,
            $expireResolution ? [$flag, $expireResolution => $expireTTL] : null,
        ]);
    }

    /**
     * Set the given key if it doesn't exist.
     *
     * @param  string  $key
     * @param  string  $value
     * @return int
     */
    public function setnx($key, $value)
    {
        return (int) $this->command('setnx', [$key, $value]);
    }

    /**
     * Get the value of the given hash fields.
     *
     * @param  string  $key
     * @param  dynamic  $dictionary
     * @return array
     */
    public function hmget($key, ...$dictionary)
    {
        if (count($dictionary) === 1) {
            $dictionary = $dictionary[0];
        }

        return array_values($this->command('hmget', [$key, $dictionary]));
    }

    /**
     * Set the given hash fields to their respective values.
     *
     * @param  string  $key
     * @param  dynamic  $dictionary
     * @return int
     */
    public function hmset($key, ...$dictionary)
    {
        if (count($dictionary) === 1) {
            $dictionary = $dictionary[0];
        } else {
            $input = collect($dictionary);

            $dictionary = $input->nth(2)->combine($input->nth(2, 1))->toArray();
        }

        return $this->command('hmset', [$key, $dictionary]);
    }

    /**
     * Set the given hash field if it doesn't exist.
     *
     * @param  string  $hash
     * @param  string  $key
     * @param  string  $value
     * @return int
     */
    public function hsetnx($hash, $key, $value)
    {
        return (int) $this->command('hsetnx', [$hash, $key, $value]);
    }

    /**
     * Removes the first count occurrences of the value element from the list.
     *
     * @param  string  $key
     * @param  int  $count
     * @param  mixed  $value
     * @return int|false
     */
    public function lrem($key, $count, $value)
    {
        return $this->command('lrem', [$key, $value, $count]);
    }

    /**
     * Removes and returns the first element of the list stored at key.
     *
     * @param  dynamic  $arguments
     * @return array|null
     */
    public function blpop(...$arguments)
    {
        $result = $this->command('blpop', $arguments);

        return empty($result) ? null : $result;
    }

    /**
     * Removes and returns the last element of the list stored at key.
     *
     * @param  dynamic  $arguments
     * @return array|null
     */
    public function brpop(...$arguments)
    {
        $result = $this->command('brpop', $arguments);

        return empty($result) ? null : $result;
    }

    /**
     * Removes and returns a random element from the set value at key.
     *
     * @param  string  $key
     * @param  int|null  $count
     * @return mixed|false
     */
    public function spop($key, $count = null)
    {
        return $this->command('spop', [$key]);
    }

    /**
     * Add one or more members to a sorted set or update its score if it already exists.
     *
     * @param  string  $key
     * @param  dynamic  $dictionary
     * @return int
     */
    public function zadd($key, ...$dictionary)
    {
        if (is_array(end($dictionary))) {
            foreach (array_pop($dictionary) as $member => $score) {
                $dictionary[] = $score;
                $dictionary[] = $member;
            }
        }

        $key = $this->applyPrefix($key);

        return $this->executeRaw(array_merge(['zadd', $key], $dictionary));
    }

    /**
     * Return elements with score between $min and $max.
     *
     * @param  string  $key
     * @param  mixed  $min
     * @param  mixed  $max
     * @param  array  $options
     * @return array
     */
    public function zrangebyscore($key, $min, $max, $options = [])
    {
        if (isset($options['limit'])) {
            $options['limit'] = [
                $options['limit']['offset'],
                $options['limit']['count'],
            ];
        }

        return $this->command('zRangeByScore', [$key, $min, $max, $options]);
    }

    /**
     * Return elements with score between $min and $max.
     *
     * @param  string  $key
     * @param  mixed  $min
     * @param  mixed  $max
     * @param  array  $options
     * @return array
     */
    public function zrevrangebyscore($key, $min, $max, $options = [])
    {
        if (isset($options['limit'])) {
            $options['limit'] = [
                $options['limit']['offset'],
                $options['limit']['count'],
            ];
        }

        return $this->command('zRevRangeByScore', [$key, $min, $max, $options]);
    }

    /**
     * Find the intersection between sets and store in a new set.
     *
     * @param  string  $output
     * @param  array  $keys
     * @param  array  $options
     * @return int
     */
    public function zinterstore($output, $keys, $options = [])
    {
        return $this->command('zinterstore', [$output, $keys,
            $options['weights'] ?? null,
            $options['aggregate'] ?? 'sum',
        ]);
    }

    /**
     * Find the union between sets and store in a new set.
     *
     * @param  string  $output
     * @param  array  $keys
     * @param  array  $options
     * @return int
     */
    public function zunionstore($output, $keys, $options = [])
    {
        return $this->command('zunionstore', [$output, $keys,
            $options['weights'] ?? null,
            $options['aggregate'] ?? 'sum',
        ]);
    }

    /**
     * Execute commands in a pipeline.
     *
     * @param  callable|null  $callback
     * @return \Redis|array
     */
    public function pipeline(callable $callback = null)
    {
        $pipeline = $this->client()->pipeline();

        return is_null($callback)
            ? $pipeline
            : tap($pipeline, $callback)->exec();
    }

    /**
     * Execute commands in a transaction.
     *
     * @param  callable|null  $callback
     * @return \Redis|array
     */
    public function transaction(callable $callback = null)
    {
        $transaction = $this->client()->multi();

        return is_null($callback)
            ? $transaction
            : tap($transaction, $callback)->exec();
    }

    /**
     * Evaluate a LUA script serverside, from the SHA1 hash of the script instead of the script itself.
     *
     * @param  string  $script
     * @param  int  $numkeys
     * @param  mixed  $arguments
     * @return mixed
     */
    public function evalsha($script, $numkeys, ...$arguments)
    {
        return $this->command('evalsha', [
            $this->script('load', $script), $arguments, $numkeys,
        ]);
    }

    /**
     * Evaluate a script and return its result.
     *
     * @param  string  $script
     * @param  int  $numberOfKeys
     * @param  dynamic  $arguments
     * @return mixed
     */
    public function eval($script, $numberOfKeys, ...$arguments)
    {
        return $this->command('eval', [$script, $arguments, $numberOfKeys]);
    }

    /**
     * Subscribe to a set of given channels for messages.
     *
     * @param  array|string  $channels
     * @param  \Closure  $callback
     * @return void
     */
    public function subscribe($channels, Closure $callback)
    {
        $this->client->subscribe((array) $channels, function ($redis, $channel, $message) use ($callback) {
            $callback($message, $channel);
        });
    }

    /**
     * Subscribe to a set of given channels with wildcards.
     *
     * @param  array|string  $channels
     * @param  \Closure  $callback
     * @return void
     */
    public function psubscribe($channels, Closure $callback)
    {
        $this->client->psubscribe((array) $channels, function ($redis, $pattern, $channel, $message) use ($callback) {
            $callback($message, $channel);
        });
    }

    /**
     * Subscribe to a set of given channels for messages.
     *
     * @param  array|string  $channels
     * @param  \Closure  $callback
     * @param  string  $method
     * @return void
     */
    public function createSubscription($channels, Closure $callback, $method = 'subscribe')
    {
        //
    }

    /**
     * Flush the selected Redis database.
     *
     * @return void
     */
    public function flushdb()
    {
        if (! $this->client instanceof RedisCluster) {
            return $this->command('flushdb');
        }

        foreach ($this->client->_masters() as [$host, $port]) {
            tap(new Redis)->connect($host, $port)->flushDb();
        }
    }

    /**
     * Execute a raw command.
     *
     * @param  array  $parameters
     * @return mixed
     */
    public function executeRaw(array $parameters)
    {
        return $this->command('rawCommand', $parameters);
    }

    /**
     * Disconnects from the Redis instance.
     *
     * @return void
     */
    public function disconnect()
    {
        $this->client->close();
    }

    /**
     * Apply prefix to the given key if necessary.
     *
     * @param  string  $key
     * @return string
     */
    private function applyPrefix($key)
    {
        $prefix = (string) $this->client->getOption(Redis::OPT_PREFIX);

        return $prefix.$key;
    }

    /**
     * Pass other method calls down to the underlying client.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return parent::__call(strtolower($method), $parameters);
    }
}
