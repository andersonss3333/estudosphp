<?php

interface pegarDados
{

	public function obterDados (string $url): string;
	
	//A função retornará uma closure, para ser usada  a callback necessaria para limitar o download dos dados.
	public function dividirDadosClosure(): closure;
}
