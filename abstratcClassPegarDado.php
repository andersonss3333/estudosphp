<?php

abstract class PegarDado implements pegarDados
{
	protected $url= null,
	//Mantem o ponto inial pra comecar a limitar o diwnload dos dados.
	$comecaEm= 0,
	//Mantém o limite final pra o download do arquivo.
	$ate= null;
	
	private static $criarRecurso= null;

    function __construct (string $url)
    {
    	if(empty ($url))
    	{
    		//Por enquanto sem usar as exceptions.
    		echo 'Obrigatorio informar a URL';
    		
    	} else
        {
        	$this->url= $url;
        }
    }
	
	public final function obterDados (string $url): string
    {
    	
    }
}
