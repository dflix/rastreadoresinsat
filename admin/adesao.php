<?php 
require '../vendor/autoload.php';

$dados = new Source\Models\Read();
$dados->ExeRead("app_prevenda", "WHERE id = :a", "a={$_GET["id"]}");
$dados->getResult();
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Adeão INSAT</title>
        <style> 
        .dez{ width: 10%; float: left; border-bottom: 1px solid #ccc;}
        .quinze{ width: 15%; float: left; border-bottom: 1px solid #ccc;}
        .vinte{ width: 20%; float: left;border-bottom: 1px solid #ccc;}
        .vintecinco{ width: 25%; float: left;border-bottom: 1px solid #ccc;}
        .trinta{ width: 30%; float: left;border-bottom: 1px solid #ccc;}
        .quarenta{ width: 40%; float: left;border-bottom: 1px solid #ccc;}
        .cinquenta{ width: 50%; float: left;border-bottom: 1px solid #ccc;}
        .sessenta{ width: 60%; float: left;border-bottom: 1px solid #ccc;}
        .setentacinco{ width: 75%; float: left;border-bottom: 1px solid #ccc;}
        .oitenta{ width: 80%; float: left;border-bottom: 1px solid #ccc;}
        .noventa{ width: 90%; float: left;border-bottom: 1px solid #ccc;}
        .cem{ width: 100%; float: left;border-bottom: 1px solid #ccc;}
        .clear{clear: both;}
        </style>
    </head>
    <body>
      
        <div class="vintecinco">
            <img src="../admin/uploads/images/2020/07/sistemas-insat-logo-1596142152.png" width="200" style="padding:13px;" />
        </div>
        <div class="setentacinco">
            <h5 style="text-align: right;">INSAT COM E SERVIÇOS DE SEGURANÇA ELETRÔNICA LTDA </h5> 
            <p style="text-align: right; font-size: 1em;">CNPJ: 20.716.660/0001-80</p>
        
        </div>
        <div class="clear"> </div>
        <div class="cinquenta"> 
            <b>Nome </b>
            <p> <?= $dados->getResult()[0]["nome"] ?> </p>
        </div>
        <div class="vintecinco"> 
            <b>CPF /CNPJ </b>
            <p> <?= $dados->getResult()[0]["cpf_cnpj"] ?> </p>
        </div>
        <div class="vintecinco"> 
            <b>RG /IE </b>
            <p> <?= $dados->getResult()[0]["rg_ie"] ?> </p>
        </div>
        <div class="clear"> </div>
               <div class="vintecinco"> 
            <b>TELEFONE </b>
            <p> <?= $dados->getResult()[0]["telefone"] ?> </p>
        </div>
               <div class="vintecinco"> 
            <b>CELULAR </b>
            <p> <?= $dados->getResult()[0]["celular"] ?> </p>
        </div>
               <div class="cinquenta"> 
            <b>EMAIL </b>
            <p> <?= $dados->getResult()[0]["email"] ?> </p>
        </div>
        <div class="clear"> </div>
        <div class="cem" style="background: #888; color:#fff; "> 
            <h4 >ENDEREÇO </h4>
        </div>
               <div class="dez"> 
            <b>CEP </b>
            <p> <?= $dados->getResult()[0]["caixa_postal"] ?> </p>
        </div>
               <div class="oitenta"> 
            <b>LOGRADOURO </b>
            <p> <?= $dados->getResult()[0]["logradouro"] ?> </p>
        </div>
               <div class="dez"> 
            <b>Nº </b>
            <p> <?= $dados->getResult()[0]["numero"] ?> </p>
        </div>
        <div class="clear"> </div>
                       <div class="quarenta"> 
            <b>COMPLEMENTO </b>
            <p> <?= $dados->getResult()[0]["complemento"] ?> </p>
        </div>
                       <div class="vinte"> 
            <b>BAIRRO </b>
            <p> <?= $dados->getResult()[0]["bairro"] ?> </p>
        </div>
                       <div class="vinte"> 
            <b>CIDADE </b>
            <p> <?= $dados->getResult()[0]["cidade"] ?> </p>
        </div>
                       <div class="vinte"> 
            <b>UF </b>
            <p> <?= $dados->getResult()[0]["uf"] ?> </p>
        </div>
        
        <div class="clear"> </div>
        <div class="cem" style="background: #888; color:#fff;"> 
            <h4>DADOS DO VEÍCULO </h4>
        </div>
          <div class="dez"> 
            <b>VEICULO </b>
            <p> <?= $dados->getResult()[0]["veiculo"] ?> </p>
        </div>
          <div class="vinte"> 
            <b>MARCA </b>
            <p> <?= $dados->getResult()[0]["marca"] ?> </p>
        </div>
          <div class="trinta"> 
            <b>MODELO </b>
            <p> <?= $dados->getResult()[0]["modelo"] ?> </p>
        </div>
          <div class="vinte"> 
            <b>ANO </b>
            <p> <?= $dados->getResult()[0]["ano"] ?> </p>
        </div>
          <div class="vinte"> 
            <b>COR </b>
            <p> <?= $dados->getResult()[0]["cor"] ?> </p>
        </div>
        <div class="clear"> </div>
         <div class="vinte"> 
            <b>PLACA </b>
            <p> <?= $dados->getResult()[0]["placa"] ?> </p>
        </div>
         <div class="vinte"> 
            <b>CHASSI </b>
            <p> <?= $dados->getResult()[0]["chassi"] ?> </p>
        </div>
         <div class="vinte"> 
            <b>RENAVAM </b>
            <p> <?= $dados->getResult()[0]["renavam"] ?> </p>
        </div>
         <div class="vinte"> 
            <b>FIPE</b>
            <p> <?= $dados->getResult()[0]["fipe"] ?> </p>
        </div>
         <div class="vinte"> 
            <b>VALOR</b>
            <p> <?= $dados->getResult()[0]["valor"] ?> </p>
        </div>
        <div class="clear"> </div>
         <div class="cem" style="background: #888; color:#fff;"> 
            <h4>PLANO </h4>
        </div>
          <div class="vinte"> 
            <b>PLANO</b>
            <p> <?= $dados->getResult()[0]["plano"] ?> </p>
        </div>
          <div class="cinquenta"> 
            <b>DESCRIÇÂO</b>
            <p> <?= $dados->getResult()[0]["descricao_plano"] ?> </p>
        </div>
          <div class="quinze"> 
            <b>MENSAL</b>
            <p> <?= $dados->getResult()[0]["mensalidade"] ?> </p>
        </div>
          <div class="quinze"> 
            <b>ASSISTÊNCIA 24HS</b>
            <p> <?= $dados->getResult()[0]["assistencia"] ?> </p>
        </div>
        <div class="clear"> </div>
        <div class="dez"> </div>
        <div class="quarenta" style="border-bottom:1px solid #fff;"> 
            </br></br></br></br>
            <div class="cem"> </div>
            <?= $dados->getResult()[0]["nome"] ?></br> CPF/CNPJ <?= $dados->getResult()[0]["cpf_cnpj"] ?>
        </div>
        <div class="dez"> </div>
        <div class="quarenta" style="border-bottom:1px solid #fff;"> 
         </br></br></br></br>
            <div class="cem"> </div>
            INSAT COM E SERVIÇOS DE SEGURANÇA ELETRÔNICA LTDA</br>
            CNPJ: 20.716.660/0001-80
        </div>
        
    </body>
</html>
