<?php
/**
 * Phergie (http://phergie.org)
 *
 * @link http://github.com/phergie/phergie-irc-connection for the canonical source repository
 * @copyright Copyright (c) 2008-2014 Phergie Development Team (http://phergie.org)
 * @license http://phergie.org/license Simplified BSD License
 * @package Phergie\Irc
 */

namespace Phergie\Irc\Tests;

use Phergie\Irc\Connection;

/**
 * Tests for \Phergie\Irc\Connection.
 *
 * @category Phergie
 * @package Phergie\Irc
 */
class ConnectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Instance of the class being tested
     *
     * @var \Phergie\Irc\Connection
     */
    protected $connection;

    /**
     * Instantiates the class being tested.
     */
    protected function setUp()
    {
        $this->connection = new Connection;
    }

    /**
     * Tests configuration via the constructor.
     */
    public function testConstructor()
    {
        $serverHostname = 'serverHostname';
        $serverPort = 6668;
        $password = 'password';
        $nickname = 'nickname';
        $username = 'username';
        $servername = 'servername';
        $realname = 'realname';
        $options = array('foo' => 'bar');

        $connection = new Connection(array(
            'serverHostname' => $serverHostname,
            'serverPort' => $serverPort,
            'password' => $password,
            'nickname' => $nickname,
            'username' => $username,
            'servername' => $servername,
            'realname' => $realname,
            'options' => $options,
        ));

        $this->assertSame($serverHostname, $connection->getServerHostname());
        $this->assertSame($serverPort, $connection->getServerPort());
        $this->assertSame($password, $connection->getPassword());
        $this->assertSame($nickname, $connection->getNickname());
        $this->assertSame($username, $connection->getUsername());
        $this->assertSame($servername, $connection->getServername());
        $this->assertSame($realname, $connection->getRealname());
        $this->assertSame($options['foo'], $connection->getOption('foo'));
    }

    /**
     * Tests setServerHostname().
     */
    public function testSetServerHostname()
    {
        $this->connection->setServerHostname('hostname');
        $this->assertSame('hostname', $this->connection->getServerHostname());
    }

    /**
     * Tests getServerHostname().
     */
    public function testGetServerHostname()
    {
        $this->assertNull($this->connection->getServerHostname());
    }

    /**
     * Tests setServerPort().
     */
    public function testSetServerPort()
    {
        $this->connection->setServerPort(6668);
        $this->assertSame(6668, $this->connection->getServerPort());
    }

    /**
     * Tests getServerPort().
     */
    public function testGetServerPort()
    {
        $this->assertSame(6667, $this->connection->getServerPort());
    }

    /**
     * Tests setPassword().
     */
    public function testSetPassword()
    {
        $this->connection->setPassword('password');
        $this->assertSame('password', $this->connection->getPassword());
    }

    /**
     * Tests getPassword().
     */
    public function testGetPassword()
    {
        $this->assertNull($this->connection->getPassword());
    }

    /**
     * Tests setNickname().
     */
    public function testSetNickname()
    {
        $this->connection->setNickname('nickname');
        $this->assertSame('nickname', $this->connection->getNickname());
    }

    /**
     * Tests getNickname().
     */
    public function testGetNickname()
    {
        $this->assertNull($this->connection->getNickname());
    }

    /**
     * Tests setUsername().
     */
    public function testSetUsername()
    {
        $this->connection->setUsername('username');
        $this->assertSame('username', $this->connection->getUsername());
    }

    /**
     * Tests getUsername().
     */
    public function testGetUsername()
    {
        $this->assertNull($this->connection->getUsername());
    }

    /**
     * Tests setHostname().
     */
    public function testSetHostname()
    {
        $this->connection->setHostname('hostname');
        $this->assertSame('hostname', $this->connection->getHostname());
    }

    /**
     * Tests getHostname().
     */
    public function testGetHostname()
    {
        $this->assertSame('0', $this->connection->getHostname());
    }

    /**
     * Tests setServername().
     */
    public function testSetServername()
    {
        $this->connection->setServername('servername');
        $this->assertSame('servername', $this->connection->getServername());
    }

    /**
     * Tests getServername().
     */
    public function testGetServername()
    {
        $this->assertSame('*', $this->connection->getServername());
    }

    /**
     * Tests setRealname().
     */
    public function testSetRealname()
    {
        $this->connection->setRealname('realname');
        $this->assertSame('realname', $this->connection->getRealname());
    }

    /**
     * Tests getRealname().
     */
    public function testGetRealname()
    {
        $this->assertNull($this->connection->getRealname());
    }

    /**
     * Tests setOption().
     */
    public function testSetOption()
    {
        $this->connection->setOption('foo', 'bar');
        $this->assertSame('bar', $this->connection->getOption('foo'));

        $this->connection->setOption('foo', 'baz');
        $this->assertSame('baz', $this->connection->getOption('foo'));

        $this->connection->setOption('bar', 'bay');
        $this->assertSame('bay', $this->connection->getOption('bar'));
    }

    /**
     * Tests getMask().
     */
    public function testGetMask()
    {
        $this->connection->setNickname('MyNick');
        $this->connection->setUsername('MyIdent');
        $this->connection->setServerHostname('server.int');

        $this->assertSame('MyNick!MyIdent@server.int', $this->connection->getMask());
    }

    /**
     * Tests getOption().
     */
    public function testGetOption()
    {
        $this->assertNull($this->connection->getOption('foo'));
        $this->assertNull($this->connection->getOption('bar'));
    }

    /**
     * Tests setData(), getData() and clearData().
     */
    public function testDataFunctions()
    {
        $this->assertNull($this->connection->getOption('foo'));
        $this->assertNull($this->connection->getOption('bar'));

        $this->connection->setData('foo', 'bar');
        $this->assertSame('bar', $this->connection->getData('foo'));

        $this->connection->setData('foo', 'baz');
        $this->assertSame('baz', $this->connection->getData('foo'));

        $this->connection->setData('bar', 'quux');
        $this->assertSame('quux', $this->connection->getData('bar'));

        $this->connection->clearData();
        $this->assertNull($this->connection->getData('foo'));
        $this->assertNull($this->connection->getData('bar'));
    }

    public function testFluentInterface()
    {
        $this->assertSame($this->connection, $this->connection->setServerHostname('hostname'));
        $this->assertSame($this->connection, $this->connection->setServerPort(6668));
        $this->assertSame($this->connection, $this->connection->setPassword('password'));
        $this->assertSame($this->connection, $this->connection->setNickname('nickname'));
        $this->assertSame($this->connection, $this->connection->setUsername('username'));
        $this->assertSame($this->connection, $this->connection->setHostname('hostname'));
        $this->assertSame($this->connection, $this->connection->setServername('servername'));
        $this->assertSame($this->connection, $this->connection->setRealname('realname'));
        $this->assertSame($this->connection, $this->connection->setOption('foo', 'bar'));
        $this->assertSame($this->connection, $this->connection->setData('foo', 'bar'));
    }
}
