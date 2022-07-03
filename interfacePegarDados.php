<?php

declare(strict_types= 1);

namespace estrutura;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

interface PegarDados
{
    public function obterDado (): string;
}
