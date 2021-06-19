<?php
header("Content-type: text/html; charset=utf-8");

require '../../vendor/autoload.php';

// +----------------------------------------------------------------------+
// | BoletoPhp - Vers�o Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo est� dispon�vel sob a Licen�a GPL dispon�vel pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc� deve ter recebido uma c�pia da GNU Public License junto com     |
// | esse pacote; se n�o, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora��es de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo�o Prado Maia e Pablo Martins F. Costa                |
// |                                                                      |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------------+
// | Equipe Coordena��o Projeto BoletoPhp: <boletophp@boletophp.com.br>         |
// | Desenvolvimento Boleto Santander-Banespa : Fabio R. Lenharo                |
// +----------------------------------------------------------------------------+


// ------------------------- DADOS DIN�MICOS DO SEU CLIENTE PARA A GERA��O DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formul�rio c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE



$verifica = new \Source\Models\Read();
$verifica->ExeRead("app_faturas", "WHERE id = :a", "a={$_GET["id"]}");
$verifica->getResult();



$mes = $verifica->getResult()[0]["valor"];
$mes = number_format($mes / 100, 2, ".", ".");

$data = date("d/m/Y" , strtotime($verifica->getResult()[0]["vencimento_em"]));

//nome do cliente
$nome = new \Source\Models\Read();
$nome->ExeRead("app_clientes", "WHERE cliente_id = :a", "a={$verifica->getResult()[0]["cliente_id"]}");
$nome->getResult();

//endereço do cliente
$enderecos = new \Source\Models\Read();
$enderecos->ExeRead("app_enderecos", "WHERE cliente_id = :a", "a={$verifica->getResult()[0]["cliente_id"]}");
$enderecos->getResult();

$dias_de_prazo_para_pagamento = 0;
$taxa_boleto = 0.00;
//$data_venc = date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 
$data_venc = $data ; // Prazo de X dias OU informe data: "13/04/2006"; 
$valor_cobrado = $mes; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');


$dadosboleto["nosso_numero"] = $verifica->getResult()[0]["nosso_numero"];  // Nosso numero sem o DV - REGRA: M�ximo de 7 caracteres!
$dadosboleto["numero_documento"] = $verifica->getResult()[0]["id"];	// Num do pedido ou nosso numero
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y", strtotime($verifica->getResult()[0]["vencimento_em"])); // Data de emiss�o do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com v�rgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $nome->getResult()[0]["nome"];
$dadosboleto["endereco1"] = $enderecos->getResult()[0]['logradouro'] . "Nº " . $enderecos->getResult()[0]['numero'] ;
$dadosboleto["endereco2"] = $enderecos->getResult()[0]['cidade'] . " " . $enderecos->getResult()[0]['uf'] . "CEP " . $enderecos->getResult()[0]['uf'] ;

// INFORMACOES PARA O CLIENTE
$dadosboleto["demonstrativo1"] = "INSAT RASTREDORES";
$dadosboleto["demonstrativo2"] = "Mensalidade referente serviço de rastreamenro<br>Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
$dadosboleto["demonstrativo3"] = "BoletoPhp - http://www.rastreadoresinsat.com";
$dadosboleto["instrucoes1"] = "- Sr. Caixa, cobrar multa de 2% apos o vencimento";
$dadosboleto["instrucoes2"] = "- Receber até 30 dias apos o vencimento";
$dadosboleto["instrucoes3"] = "- Mora Multa 0.33 ao dia";
$dadosboleto["instrucoes4"] = "Em caso de duvidas entre em contato conosco: contato@sistemasinsat.com.br";

// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURA��O DO SEU BOLETO --------------- //


// DADOS PERSONALIZADOS - SANTANDER BANESPA
$dadosboleto["codigo_cliente"] = "0618799"; // C�digo do Cliente (PSK) (Somente 7 digitos)
$dadosboleto["ponto_venda"] = "399"; // Ponto de Venda = Agencia
$dadosboleto["carteira"] = "101";  // Cobran�a Simples - SEM Registro
$dadosboleto["carteira_descricao"] = "COBRANÇA SIMPLES - CSR";  // Descri��o da Carteira

// SEUS DADOS
$dadosboleto["identificacao"] = "INSAT Rastreadores";
$dadosboleto["cpf_cnpj"] = "20716660000180";
$dadosboleto["endereco"] = "Rua Itajuibe, 545";
$dadosboleto["cidade_uf"] = "São Paulo / SP";
$dadosboleto["cedente"] = "INSAT COMERCIO E SERVICOS DE S";

// N�O ALTERAR!
include("include/funcoes_santander_banespa.php"); 
include("include/layout_santander_banespa.php");
?>
