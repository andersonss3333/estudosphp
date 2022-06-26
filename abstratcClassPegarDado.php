<?php

abstract class PegarDado implements pegarDados
{
    private $url= '',
    //Mantem o ponto inial pra comecar a limitar o diwnload dos dados.
    $comecaEm= 0,
    //Limite de dados a serem baixados
    $bytes= 1000;
  
    private const padrao= '<^htt(ps|p)://((www)?[0-9]{0,6}\.)?[a-z0-9]+(:[0-9]{2,8})?\.[a-z]{2,3}(\.[a-z]{0,2})?(\/[a-z0-9]+\.[a-z]{2,8})?>';
  
    function __construct (string $url)
    {
        if(empty ($url))
        {
          //Por enquanto sem usar as exceptions.
          echo 'Obrigatorio informar a URL';
        
        } else if (preg_match_all(self::padrao, $url))
        {
          $this->url= $url;
          
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
