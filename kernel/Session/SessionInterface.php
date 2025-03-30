<?php

namespace App\Kernel\Session;

interface SessionInterface
{
    public function set($key, $value): void;
    public function get($key, $default = null);
    public function getFlash($key, $default = null): array;
    public function has($key): bool;
    public function delete($key): void;
    public function destroy(): void;
}
