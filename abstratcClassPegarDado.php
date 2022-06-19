<?php

abstract class PegarDado implements pegarDados
{
	private $url= null,
	//Mantem o ponto inial pra comecar a limitar o diwnload dos dados.
	$comecaEm= 0,
	//Mantém o limite final pra o download do arquivo.
	$ate= 0,
        //Valor inicial pra os dados baixados
        $dados= 0;

        //Limite de dados a serem baixados
        private const bytes= 1000;
	
	private const padrao= '/^htt(ps|p)://w{3}[0-9]{0,8}\.[a-z0-9]+(:[0-9]{2,8})?\.[a-z]{2,3}(\.[a-z]{0,2})?(\/[a-z0-9]+\.[a-z]{2,8})?/';
	
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
