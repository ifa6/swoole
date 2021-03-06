<?php
/**
 * Created by PhpStorm.
 * User: janhuang
 * Date: 16/1/18
 * Time: 下午9:47
 * Github: https://www.github.com/janhuang
 * Coding: https://www.coding.net/janhuang
 * SegmentFault: http://segmentfault.com/u/janhuang
 * Blog: http://segmentfault.com/blog/janhuang
 * Gmail: bboyjanhuang@gmail.com
 * WebSite: http://www.janhuang.me
 */

include __DIR__ . '/../vendor/autoload.php';

use FastD\Swoole\Server\Server;

class DemoServer extends Server
{
    /**
     * @param \swoole_server $server
     * @param int $fd
     * @param int $from_id
     * @param string $data
     * @return mixed
     */
    public function doWork(\swoole_server $server, int $fd, int $from_id, string $data)
    {
        $server->send($fd, $data, $from_id);
        $server->close($fd);
    }

    /**
     * @param \swoole_server $server
     * @param string $data
     * @param array $client_info
     */
    public function doPacket(\swoole_server $server, string $data, array $client_info)
    {
        // TODO: Implement doPacket() method.
    }
}

DemoServer::run([
    'ports' => [
        [
            'host' => '0.0.0.0',
            'port' => '9999',
            'sock' => SWOOLE_SOCK_TCP,
        ],
        [
            'host' => '0.0.0.0',
            'port' => '9998',
            'sock' => SWOOLE_SOCK_TCP,
        ],
    ]
]);

/**
 * 以上写法和以下写法效果一致
 *
 * $test = new DemoServer([
 *  'ports' => [
 *      [
 *          'host' => '0.0.0.0',
 *          'port' => '9999',
 *          'sock' => SWOOLE_SOCK_TCP,
 *      ],
 *      [
 *          'host' => '0.0.0.0',
 *          'port' => '9998',
 *          'sock' => SWOOLE_SOCK_TCP,
 *      ],
 *  ]
 * ]);
 * $test->start();
 */
