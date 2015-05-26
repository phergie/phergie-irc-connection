# phergie/phergie-irc-connection

A PHP data structure for containing client connection information per the IRC protocol as described in RFC 1459.

Primarily used by IRC client implementations of the Phergie project.

[![Build Status](https://secure.travis-ci.org/phergie/phergie-irc-connection.png?branch=master)](http://travis-ci.org/phergie/phergie-irc-connection)

## Install

The recommended method of installation is [through composer](http://getcomposer.org).

```JSON
{
    "require": {
        "phergie/phergie-irc-connection": "~2"
    }
}
```

## Design goals

* Minimal dependencies: PHP 5.4.2+
* Simple easy-to-understand API

## Usage

```php
$connection = new \Phergie\Irc\Connection();

$connection
    ->setServerHostname('hostname')
    ->setServerPort(6668)
    ->setPassword('password')
    ->setNickname('nickname')
    ->setUsername('username')
    ->setHostname('hostname')
    ->setServername('servername')
    ->setRealname('realname')
    ->setOption('option', 'value');

echo $connection->getServerHostname();
echo $connection->getServerPort();
echo $connection->getPassword();
echo $connection->getNickname();
echo $connection->getUsername();
echo $connection->getHostname();
echo $connection->getServername();
echo $connection->getRealname();
echo $connection->getOption('option');
```

## Tests

To run the unit test suite:

```
curl -s https://getcomposer.org/installer | php
php composer.phar install
./vendor/bin/phpunit
```

## License

Released under the BSD License. See `LICENSE`.

## Community

Check out #phergie on irc.freenode.net.
