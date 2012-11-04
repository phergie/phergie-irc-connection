<?php
/**
 * Phergie (http://phergie.org)
 *
 * @link http://github.com/phergie/phergie-irc-connection for the canonical source repository
 * @copyright Copyright (c) 2008-2012 Phergie Development Team (http://phergie.org)
 * @license http://phergie.org/license New BSD License
 * @package Phergie\Irc
 */

namespace Phergie\Irc;

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
        $this->assertNull($this->connection->getHostname());
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
        $this->assertNull($this->connection->getServername());
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
     * Tests getOption().
     */
    public function testGetOption()
    {
        $this->assertNull($this->connection->getOption('foo'));
        $this->assertNull($this->connection->getOption('bar'));
    }
}
