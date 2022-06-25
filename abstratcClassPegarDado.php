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
	
	private const padrao= '/^htt(ps|p)://((www)?[0-9]{0,6}\.)?[a-z0-9]+(:[0-9]{2,8})?\.[a-z]{2,3}(\.[a-z]{0,2})?(\/[a-z0-9]+\.[a-z]{2,8})?/';
	
	private $criarRecurso= null;

        function __construct (string $url)
        {
    	     if(empty ($url))
    	{
    		//Por enquanto sem usar as exceptions.
    		echo 'Obrigatorio informar a URL';
    		
    	} else if (preg_match_all(self::padrao, $url))
        {
        	$this->url= $url;
                $this->criarRecurso= curl_init();
        	
        } else
        {
        	echo 'Obrigatorio informar uma URL correta';
        }
    }

	public final function obterDados (string $url): string
    {
        $baixar= $this->baixar();
        
    	curl_setopt($this->criarRecurso, CURLOPT_BUFFERSIZE, 256);
    	curl_setopt($this->criarRecurso, CURLOPT_SSL_VERIFYHOST, FALSE);
    	curl_setopt($this->criarRecurso, CURLOPT_WRITEFUNCTION, $baixar);
    	curl_setopt($this->criarRecurso, CURLOPT_RETURNTRANSFER, 1);
    	
        curl_exec($this->criarRecurso);

        $b= $baixar('', '');

    	curl_close($this->criarRecurso);
    
        return $b;

    	
    }
    
    private function baixar (): closure
    {
    	$dados= $this->dados;
    	
    	$baixarDados= function ($curl, string $dado) use ($dados)
    	{
    		$baixados= strlen($dados) + strlen($dado);
    	
    	if ($baixados >= self::bytes)
    	{
    		$dados .= substr($dado, $this->$comecarEm, self::bytes - strlen($dados));
    		
    		return $dados;
    		
    	} else
        {
        	 $dados .= $dado;
        	
        	return $dado;
        }
    	};
    	
    	return $baixarDados;
    }
}
