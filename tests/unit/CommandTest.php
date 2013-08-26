<?php
require_once realpath(__DIR__ . '/../../vendor/autoload.php');

use Ymmtmsys\Command\Command;

class CommandTest extends \PHPUnit_Framework_TestCase
{
    public $obj;

    public function setUp()
    {
        $this->obj = new Command;
    }

    /**
     * @test
     */
    public function commandSuccess()
    {
        $command = 'echo hello';
        $res = $this->obj->exec($command);

        $this->assertSame('hello', $res);
        $this->assertSame(array('hello'), $this->obj->output);
        $this->assertSame(0, $this->obj->return_var);
    }

    /**
     * @test
     */
    public function commandFailure()
    {
        $command = 'exit 123';
        $res = $this->obj->exec($command);

        $this->assertSame('', $res);
        $this->assertSame(array(), $this->obj->output);
        $this->assertSame(123, $this->obj->return_var);
    }

    /**
     * @test
     */
    public function consistencyOfTheOutputVariable()
    {
        $command = 'echo hello';

        for ($i = 0; $i < 2; $i++) {
            $this->obj->exec($command);
        }

        $this->assertSame(array('hello'), $this->obj->output);
        $this->assertSame(0, $this->obj->return_var);
    }
}
