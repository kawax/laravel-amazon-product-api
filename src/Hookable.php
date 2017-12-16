<?php

namespace Revolution\Amazon\ProductAdvertising;

use ApaiIO\Operations\OperationInterface;

trait Hookable
{
    /**
     * @var array
     */
    protected $hooks = [];

    /**
     * Add hook
     *
     * @param string   $name
     * @param callable $hook
     *
     * @return void
     */
    public function hook(string $name, callable $hook)
    {
        $this->hooks[$name] = $hook;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function hasHook(string $name)
    {
        return isset($this->hooks[$name]);
    }

    /**
     * @param string             $name
     * @param OperationInterface $operation
     *
     * @return mixed
     */
    public function callHook(string $name, OperationInterface $operation)
    {
        if (!self::hasHook($name)) {
            return $operation;
        }

        $hook = $this->hooks[$name];

        return call_user_func($hook, $operation);
    }
}
