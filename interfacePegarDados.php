<?php

declare(strict_types= 1);

init_set('display_errors', 1);
init_set('display_startup_errors', 1);
error_reporting(E_ALL);

interface pegarDados
{
    public function obterDado (): string;
}
