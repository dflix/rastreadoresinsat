<?php 
require '../vendor/autoload.php';

$dados = new Source\Models\Read();
$dados->ExeRead("app_contratos", "WHERE id = :a", "a={$_GET["contrato"]}");
$dados->getResult();

$cliente = new Source\Models\Read();
$cliente->ExeRead("app_prevenda", "WHERE id = :a", "a={$_GET["cliente"]}");
$cliente->getResult();
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contrato INSAT</title>
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
        
        <div class="cem"><?= $dados->getResult()[0]["termos"]; ?> </div>
        
         <div class="clear"> </div>
        <div class="dez"> </div>
        <div class="quarenta" style="border-bottom:1px solid #fff;"> 
            </br></br></br></br>
            <div class="cem"> </div>
            <?= $cliente->getResult()[0]["nome"] ?></br> CPF/CNPJ <?= $cliente->getResult()[0]["cpf_cnpj"] ?>
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
