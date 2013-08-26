Comand
======

Command to facilitate the execution of external programs in unit testing.

[![Build Status](https://secure.travis-ci.org/ymmtmsys/command.png)](http://travis-ci.org/ymmtmsys/command)

Example
-------


```PHP
<?php
use Ymmtmsys\Command\Command;

class Foo
{
    public function __construct($cmd) // $cmd is a Command instance
    {
        $this->cmd = $cmd;
    }

    public function bar()
    {
        // before process ...

        $this->cmd->exec($command);

        // after process  ...
    }
}

class FooTest extends \PHPUnit_Framework_TestCase
{
    public function testBar()
    {
        $mock_cmd = this->getMock('Command', array('exec'));

        $obj = new Foo($mock_cmd);

        $obj->bar();

        // Assertions
    }
}
```

Copyright
---------

Copyright (c) 2012 ymmtmsys. See LICENSE for further details.
