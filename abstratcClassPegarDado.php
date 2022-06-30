<?php

abstract class PegarDado implements pegarDados
{
    private $url= '',
    //Mantem o ponto inial pra comecar a limitar o diwnload dos dados.
    $comecaEm= 0,
    //Limite de dados a serem baixados
    $bytes= 0;
  
    private const padrao= '<^htt(ps|p)://(www)?([0-9]{1,6})?([^w]{2}\.)?(m{1}\.)?[a-z0-9-_]+(:[0-9]{2,6})?\.[a-z]{3}(\.[a-z]{2})?\/[a-z0-9]+\/[a-zA-Z0-9%_-]+>';
  
    function __construct (string $url, ?int $tamanhoDownload= 0)
    {
        if(empty ($url))
        {
          //Por enquanto sem usar as exceptions.
          echo 'Obrigatorio informar a URL';
        
        } else if (preg_match_all(self::padrao, $url))
        {
          $this->url= $url;
          $rhis->bytes= $tamanhoDownload;
          
        } else
        {
          echo 'Obrigatorio informar uma URL correta';
        }
    }

    public final function obterDado (): string
    {
        $dados= file_get_contents($this->url,false,null,
        $this->comecaEm, $this->bytes);
        
        return $dados;
    }
}
