<?php
/**
 * Command.php
 *
 * @package   Ymmtmsys\Command
 * @author    ymmtmsys
 * @copyright Copyright (c) 2012 ymmtmsys
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      https://github.com/ymmtmsys/command
 */
namespace Ymmtmsys\Command;

class Command
{
    /**
     * @var array
     *      Will be filled with every line of output from the command.
     */
    protected $output = array();

    /**
     * @var int
     *      return status of the executed command
     *      will be written to this variable.
     */
    protected $return_var = array();

    /**
     * @param  string $command The command that will be executed.
     * @return The last line from the result of the command.
     */
    public function exec($command)
    {
        return exec($command, $this->output, $this->return_var);
    }

    /**
     * @param  string $name name of property
     * @return mixed value of property
     */
    public function __get($name)
    {
        if (property_exists($this, $name) === true) {
            return $this->$name;
        }

        list($trace) = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace['file'] .  ' on line ' . $trace['line'],
            E_USER_ERROR
        );
    }
}
