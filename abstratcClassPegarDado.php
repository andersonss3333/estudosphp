<?php

abstract class PegarDado implements pegarDados
{
	protected $url= null,
	//Mantem o ponto inial pra comecar a limitar o diwnload dos dados.
	$comecaEm= 0,
	//Mantém o limite final pra o download do arquivo.
	$ate= null;
	
	private const padrao= '/(https|http)://{1}w{3}\.{1}[a-z0-9]+\.{1}[a-z]{2,3}\.{0,1}[a-z]{0,2}/';
	
	private static $criarRecurso= null;

        function __construct (string $url)
        {
    	     if(empty ($url))
    	{
    		//Por enquanto sem usar as exceptions.
    		echo 'Obrigatorio informar a URL';
    		
    	} else if (preg_match_all(padrao, $url))
        {
        	$this->url= $url;
        	
        } else
        {
        	echo 'Obrigatorio informar uma URL correta';
        }
    }
}
