<?php

final class BuscarDados extends PegarDado
{
  public final function obterDados (): string
  {
    return $this->obterDado();
  }
}
