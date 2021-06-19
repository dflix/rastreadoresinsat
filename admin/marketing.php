<div class="container-fluid">

        <div class="col-md-6" style="margin-top: 10px;"> 
            <a href="<?= CONF_URL_APP ?>/?p=importar" style="text-decoration: none;color:#fff;">  <div class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> Importar Contatos</div> </a>
        </div>

        <div class="col-md-6" style="margin-top: 10px;"> 
            <a href="<?= CONF_URL_APP ?>/?p=marketing" style="text-decoration: none;color:#fff;">   <div class="subscribe btn btn-primary btn-block rounded-pill shadow-sm"> ENviar</div> </a>
        </div>

      
    <div class="row"> 
    
        <div class="col-md-6"> 
            <h3> Marketing </h3>
            <?php 
            
            $filtro = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            
            if(!empty($filtro)){
                
                $Dados = [
                    "vendedor" => $_SESSION["user_id"],
                    "data" => date("Y-m-d H:i:s"),
                    "enviado" => "1"
                ];
                
                $update = new Source\Models\Update();
                $update->ExeUpdate("app_marketing", $Dados, "WHERE id = :a", "a={$filtro["id"]}");
                
               // var_dump($filtro , $Dados);
            }
            
            $envia = new Source\Models\Read();
            $envia->ExeRead("app_marketing", "WHERE enviado = :a ORDER BY id ASC ", "a=0");
            $envia->getResult();
           echo "Total disponivel <b>" . $envia->getRowCount() . "</b> Contatos";
            
            $proposta = "https://www.youtube.com/watch?v=Pk0kVff_cjk %0A"
                    . " %0A"
                    . "_*RASTREADORES INSAT*_ %0A"

                    . "_* Localização do veiculo via APP *_ %0A"
                    . "_* Alarme anti furto virtual, receba informação em seu celular quando seu veículo for violado *_ %0A"
                    . "_* Histórico de posição e velocidade *_ %0A"
                    . "_* Central de monitoramento 24 Hs *_ %0A"
                    . "_* Opção Rastreador com Seguro pela RodoBens *_ %0A"
                    . "_* Ideal para veiculos, motos, utilitarios, caminhão, frotas, embarcações e maquinas agricolas *_ %0A"
                    . "*Apartir de R$59,00 mensal* %0A"
                    . "https://www.rastreadoresinsat.com";
            ?>
            
<!--            <a href="
               https://web.whatsapp.com/send?phone=55<?= $envia->getResult()[0]["telefone"] ?>&text=<?= $proposta ?>" target="_blank"> <p class="btn btn-success">Enviar Proposta Web Whatsapp </p> </a>
           -->
               
               <form method="post" action="" > 
                   <input type="hidden" name="id" value="<?= $envia->getResult()[0]["id"] ?>" />
                   <input type="hidden" name="telefone" value="<?= $envia->getResult()[0]["telefone"] ?>" />
                   <input type="submit" name="submit" value="SELECIONAR" class="btn btn-primary" />
               </form>
        
        </div>
    
        <div class="col-md-6"> 
            <h3> Enviados <?=$_SESSION["user_id"] ?> </h3>
            
            <table class="table"> 
                
               
                <thead>

                    <tr> 
                        <th> Data </th>
                        <th> Telefone </th>
                        <th> Enviar </th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $ver = new Source\Models\Read();
                     $ver->ExeRead("app_marketing", "WHERE vendedor = :a ORDER BY id DESC LIMIT 10", "a={$_SESSION["user_id"]}");
                 
                     foreach ($ver->getResult() as $value) {

                     ?>
                    <tr> 
                        <td> <?= date("d/m/Y H:i:s", strtotime($value["data"]))  ?> </td>
                        <td> <?= $value["telefone"] ?> </td>
                        <td>             <a href="
               https://web.whatsapp.com/send?phone=55<?= $value["telefone"] ?>&text=<?= $proposta ?>" target="_blank"> <p class="btn btn-success">Enviar Proposta Web Whatsapp </p> </a>
            </td>
                    </tr>
                     <?php } ?>

                </body>
            
            </table>
        
        </div>
    
    
    </div>
    

</div>

