<?php
/**
 * Phergie (http://phergie.org)
 *
 * @link http://github.com/phergie/phergie-irc-connection for the canonical source repository
 * @copyright Copyright (c) 2008-2014 Phergie Development Team (http://phergie.org)
 * @license http://phergie.org/license Simplified BSD License
 * @package Phergie\Irc
 */

namespace Phergie\Irc;

/**
 * Canonical implementation of ConnectionInterface.
 *
 * @category Phergie
 * @package Phergie\Irc
 */
class Connection implements ConnectionInterface
{
    /**
     * Server hostname
     *
     * @var string
     */
    protected $serverHostname;

    /**
     * Server port
     *
     * @var int
     */
    protected $serverPort = 6667;

    /**
     * Connection password
     *
     * @var string
     */
    protected $password;

    /**
     * User's nickname
     *
     * @var string
     */
    protected $nickname;

    /**
     * User's username
     *
     * @var string
     */
    protected $username;

    /**
     * User's hostname under RFC 1459 or the mode under RFC 2812
     *
     * @var string
     */
    protected $hostname = '0';

    /**
     * User's server name under RFC 1459 or an unused parameter under RFC 2812
     *
     * @var string
     */
    protected $servername = '*';

    /**
     * User's real name
     *
     * @var string
     */
    protected $realname;

    /**
     * Implementation-specific connection options
     *
     * @var array
     */
    protected $options = array();

    /**
     * Runtime connection data.
     *
     * @var array
     */
    protected $data = array();

    /**
     * Constructor to accept property values.
     *
     * @param array $config Associative array keyed by property name
     */
    public function __construct(array $config = array())
    {
        foreach ($config as $key => $value) {
            $method = 'set' . $key;
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
        if (isset($config['options']) && is_array($config['options'])) {
            foreach ($config['options'] as $key => $value) {
                $this->setOption($key, $value);
            }
        }
    }

    /**
     * Implements ConnectionInterface::setServerHostname().
     *
     * @param string $hostname
     * @return $this
     * @see \Phergie\Irc\ConnectionInterface::setServerHostname()
     */
    public function setServerHostname($hostname)
    {
        $this->serverHostname = $hostname;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getServerHostname().
     *
     * @return string
     * @see \Phergie\Irc\ConnectionInterface::getServerHostname()
     */
    public function getServerHostname()
    {
        return $this->serverHostname;
    }

    /**
     * Implements ConnectionInterface::setServerPort().
     *
     * @param int $port
     * @return $this
     * @see \Phergie\Irc\ConnectionInterface::setServerPort()
     */
    public function setServerPort($port)
    {
        $this->serverPort = $port;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getServerPort().
     *
     * @return int
     * @see \Phergie\Irc\ConnectionInterface::getServerPort()
     */
    public function getServerPort()
    {
        return $this->serverPort;
    }

    /**
     * Implements ConnectionInterface::setPassword().
     *
     * @param string $password
     * @return $this
     * @see \Phergie\Irc\ConnectionInterface::setPassword()
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getPassword().
     *
     * @return string
     * @see \Phergie\Irc\ConnectionInterface::getPassword()
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Implements ConnectionInterface::setNickname().
     *
     * @param string $nickname
     * @return $this
     * @see \Phergie\Irc\ConnectionInterface::setNickname()
     */
    public function setNickname($nickname)
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getNickname().
     *
     * @return string
     * @see \Phergie\Irc\ConnectionInterface::getNickname()
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * Implements ConnectionInterface::setUsername().
     *
     * @param string $username
     * @return $this
     * @see \Phergie\Irc\ConnectionInterface::setUsername()
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getUsername().
     *
     * @return string
     * @see \Phergie\Irc\ConnectionInterface::getUsername()
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Implements ConnectionInterface::setHostname().
     *
     * @param string $hostname
     * @return $this
     * @see \Phergie\Irc\ConnectionInterface::setHostname()
     */
    public function setHostname($hostname)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getHostname().
     *
     * @return string
     * @see \Phergie\Irc\ConnectionInterface::getHostname()
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * Implements ConnectionInterface::setServername().
     *
     * @param string $servername
     * @return $this
     * @see \Phergie\Irc\ConnectionInterface::setServername()
     */
    public function setServername($servername)
    {
        $this->servername = $servername;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getServername().
     *
     * @return string
     * @see \Phergie\Irc\ConnectionInterface::getServername()
     */
    public function getServername()
    {
        return $this->servername;
    }

    /**
     * Implements ConnectionInterface::setRealname().
     *
     * @param string $realname
     * @return $this
     * @see \Phergie\Irc\ConnectionInterface::setRealname()
     */
    public function setRealname($realname)
    {
        $this->realname = $realname;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getRealname().
     *
     * @return string
     * @see \Phergie\Irc\ConnectionInterface::getRealname()
     */
    public function getRealname()
    {
        return $this->realname;
    }

    /**
     * Implements ConnectionInterface::setOption().
     *
     * @param string $name Option name
     * @param mixed $value Option value
     * @return $this
     */
    public function setOption($name, $value)
    {
        $this->options[$name] = $value;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getOption().
     *
     * @param string $name Option name
     * @return mixed
     */
    public function getOption($name)
    {
        return isset($this->options[$name]) ? $this->options[$name] : null;
    }

    /**
     * Implements ConnectionInterface::setData().
     *
     * @param string $name Data key
     * @param mixed $value Data value
     * @return $this
     */
    public function setData($name, $value)
    {
        $this->data[$name] = $value;

        return $this;
    }

    /**
     * Implements ConnectionInterface::getData().
     *
     * @param string $name Data key
     * @return mixed
     */
    public function getData($name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }

    /**
     * Implements ConnectionInterface::clearData().
     */
    public function clearData()
    {
        $this->data = array();
    }

    /**
     * Returns a formatted connection "mask", in the format
     * nick!user@server
     *
     * This is not guaranteed to be constant for a given connection, or even
     * unique to a single connection, and as such should NOT be used as a key
     * to store connection-specific data. (Use the built-in SplObjectStorage
     * class for this purpose.) However, it is useful for logging and other
     * output functions.
     *
     * @return string
     */
    public function getMask()
    {
        return sprintf(
            '%s!%s@%s',
            $this->nickname,
            $this->username,
            $this->serverHostname
        );
    }
}
