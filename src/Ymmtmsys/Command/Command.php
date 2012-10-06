<?php
namespace Ymmtmsys\Command;

class Command
{
    protected $output = array();

    protected $return_var = array();

    public function exec($command)
    {
        return exec($command, $this->output, $this->return_var);
    }

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
