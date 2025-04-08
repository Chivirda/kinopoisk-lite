<?php

namespace App\Kernel\Session;

class Session implements SessionInterface
{
    public function __construct()
    {
        session_start();
    }

    public function set($key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get($key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public function getFlash($key, $default = null): array|string
    {
        $value = $this->get($key, $default);
        $this->delete($key);

        return $value;
    }

    public function has($key): bool
    {
        return isset($_SESSION[$key]);
    }

    public function delete($key): void
    {
        unset($_SESSION[$key]);
    }

    public function destroy(): void
    {
        session_destroy();
    }
}
