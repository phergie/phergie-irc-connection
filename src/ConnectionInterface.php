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
 * Data structure for information related to a client connection per the IRC
 * protocol as described in RFC 1459.
 *
 * @category Phergie
 * @package Phergie\Irc
 * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1
 */
interface ConnectionInterface
{
    /**
     * Sets the hostname of the server.
     *
     * @param string $hostname
     */
    public function setServerHostname($hostname);

    /**
     * Returns the hostname of the server.
     *
     * @return string
     */
    public function getServerHostname();

    /**
     * Sets the port on which the server is running.
     *
     * @param int $port
     */
    public function setServerPort($port);

    /**
     * Returns the port on which the server is running.
     *
     * The recommended return value for this method if no port is explicitly set is 6667.
     *
     * @return int
     * @link http://www.irc-wiki.org/Internet_Relay_Chat#Protocol
     */
    public function getServerPort();

    /**
     * Sets the connection password.
     *
     * @param string $password
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_1
     */
    public function setPassword($password);

    /**
     * Returns the connection password.
     *
     * @return string
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_1
     */
    public function getPassword();

    /**
     * Sets the user's nickname.
     *
     * @param string $nickname
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_2
     */
    public function setNickname($nickname);

    /**
     * Returns the user's nickname.
     *
     * @return string
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_2
     */
    public function getNickname();

    /**
     * Sets the user's username.
     *
     * @param string $username
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_3
     */
    public function setUsername($username);

    /**
     * Returns the user's username.
     *
     * @return string
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_3
     */
    public function getUsername();

    /**
     * Sets the user's hostname.
     *
     * @param string $hostname
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_3
     */
    public function setHostname($hostname);

    /**
     * Returns the user's hostname.
     *
     * @return string
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_3
     */
    public function getHostname();

    /**
     * Sets the user's server name.
     *
     * @param string $servername
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_3
     */
    public function setServername($servername);

    /**
     * Returns the user's server name.
     *
     * @return string
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_3
     */
    public function getServername();

    /**
     * Sets the user's real name.
     *
     * @param string $realname
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_3
     */
    public function setRealname($realname);

    /**
     * Returns the user's real name.
     *
     * @return string
     * @link http://irchelp.org/irchelp/rfc/chapter4.html#c4_1_3
     */
    public function getRealname();

    /**
     * Sets an implementation-specific connection option.
     *
     * @param string $name Option name
     * @param mixed $value Option value
     */
    public function setOption($name, $value);

    /**
     * Returns an implementation-specific connection option.
     *
     * @param string $name Option name
     * @return mixed
     */
    public function getOption($name);

    /**
     * Sets a runtime connection data field.
     *
     * @param string $name Data key
     * @param mixed $value Data value
     */
    public function setData($name, $value);

    /**
     * Returns a runtime connection data field.
     *
     * @param string $name Data key
     * @return mixed
     */
    public function getData($name);

    /**
     * Clears all runtime connection data.
     */
    public function clearData();

    /**
     * Returns a formatted connection "mask".
     *
     * @return string
     */
    public function getMask();
}
