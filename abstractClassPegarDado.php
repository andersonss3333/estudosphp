<?php

abstract class PegarDado implements pegarDados
{
	protected $url= null,
	//Mantem o ponto inicial pra comecar a limitar o download dos dados.
	$comecaEm= 0,
	//Mantém o limite final pra o download do arquivo.
	$ate= null;
	
	private static $criarRecurso= null;
	
	public final function obterDados (string $url): string
        {
    	
        }
}
