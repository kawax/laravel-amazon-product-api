<?php

namespace Revolution\Amazon\ProductAdvertising;

trait Hookable
{
    protected array $hooks = [];

    /**
     * Add hook.
     */
    public function hook(string $name, callable $hook): void
    {
        $this->hooks[$name] = $hook;
    }

    public function hasHook(string $name): bool
    {
        return isset($this->hooks[$name]);
    }

    public function callHook(string $name, $request): mixed
    {
        if (! $this->hasHook($name)) {
            return $request;
        }

        $hook = $this->hooks[$name];

        return call_user_func($hook, $request);
    }
}
