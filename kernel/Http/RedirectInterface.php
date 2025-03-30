<?php

namespace App\Kernel\Http;

interface RedirectInterface
{
    public static function to(string $uri): void;
    public function uri(): string;
    public function method(): string;
    public function input(string $key, $default = null): mixed;
    public function setValidator(Validator $validator): void;
    public function validate(array $rules): bool;
    public function errors(): array;
}
