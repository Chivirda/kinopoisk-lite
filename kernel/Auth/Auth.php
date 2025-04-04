<?php

namespace App\Kernel\Auth;

use App\Kernel\Database\DatabaseInterface;
use App\Kernel\Session\SessionInterface;

class Auth implements AuthInterface
{
    public function __construct(
        private DatabaseInterface $database,
        private SessionInterface $session
    ) {
    }

    public function attempt(string $email, string $password): bool
    {
        //TODO:
    }

    public function logout(): void
    {
        //TODO:
    }

    public function check(): bool
    {
        //TODO:
    }
    public function user(): ?array
    {
        //TODO:
    }
}
