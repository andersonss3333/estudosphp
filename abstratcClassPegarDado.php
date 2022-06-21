<?php

abstract class PegarDado implements pegarDados
{
	private $url= null,
	//Mantem o ponto inial pra comecar a limitar o diwnload dos dados.
	$comecaEm= 0,
	//Mantém o limite final pra o download do arquivo.
	$ate= 0,
        //Valor inicial pra os dados baixados
        $dados= '';

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
    		
    	} else if (preg_match_all(PegarDado::padrao, $url))
        {
        	$this->url= $url;
        	
        } else
        {
        	echo 'Obrigatorio informar uma URL correta';
        }
    }

	public final function obterDados (string $url): string
    {
    	$this->criarRecurso= curl_init($url);
    	curl_setopt($this->criarRecurso, CURLOPT_BUFFERSIZE, 256);
    	curl_setopt($this->criarRecurso, CURLOPT_SSL_VERIFYHOST, false);
    	curl_setopt($this->criarRecurso, CURLOPT_WRITEFUNCTION, $this->baixar);
    	curl_setopt($this->criarRecurso, CURLOPT_RETURNTRANSFER, true);
    	
    	return $this->baixar('','');
    	
    }
    
    private function baixar (object $curl, string $dado): string|int
    {
    	$baixados= strlen($this->$dados) + ($dado);
    	
    	if ($baixados >= bytes)
    	{
    		$this->$dados .= substr($dado, $this->$comecarEm, bytes - strlen($this->$dados));
    		
    		return $this->$dados;
    		
    	} else
        {
        	$this->$dados .= $dado;
        	
        	return $dado;
        }
    }

}
