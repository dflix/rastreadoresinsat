<?php
session_start();
include '../vendor/autoload.php';

//var_dump($_POST["palavra"]);
?>


 <div class="col-md-12" >
                </br>
               
                        <?php
                        $filtro = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$_SESSION["busca"] = $filtro["palavra"];
                        
//                        $atual = filter_input(INPUT_GET, 'atual', FILTER_VALIDATE_INT);
//                        $pager = new Source\Support\Pager("./?p=cliente&atual=", "Primeiro", "Ultimo", "1");
//                        $pager->ExePager($atual, 5);

                        $read = new Source\Models\Read();
                        $read->ExeRead("app_prevenda", "WHERE nome LIKE '%' :a '%' OR cpf_cnpj LIKE '%' :a '%' OR placa LIKE '%' :a '%' OR equipamento LIKE '%' :a '%' OR chip LIKE '%' :a '%' OR status LIKE '%' :a '%' ", 
                                "a={$_SESSION["busca"]}");
                        $read->getResult();
                        if($read->getResult()){
                            echo " <table class=\"table\"> 
                    <thead class=\"bg-dark\" style=\"color:#fff;\"> 
                        <tr>

                            <th>Inicio </th>
                            <th>Cliente </th>
                            <th>Documento</th>
                            <th>Placa </th>
                            <th>Modelo </th>
                            <th>Equipamento </th>
                            <th>Chip </th>
                            <th>Status </th>
                           
                            <th>Contratos </th>
                            <th>Cobranças </th>
                            <th>Atendimentos </th>
                            <th>DOC </th>
                         
                            <th>Editar </th>
                            <th>Excluir </th>

                        </tr>
                    </thead>

                    <tbody> ";
                            
                            
                        foreach ($read->getResult() as $cliente):
                            ?>
                            
                <td><?= date("d/m/Y",strtotime($cliente["inicio"])); ?>  </td>
                                <td><?= $cliente["nome"] ?>  </td>
                                <td><?= $cliente["cpf_cnpj"] ?> </td>
                               <!-- Modal Pedidos -->
                                <td>
 
                                 <?= $cliente["placa"] ?>   
                                </td>
                                
                                
                                <td>
                                    
                                <?= $cliente["modelo"] ?>
                                </td>
                                <td>
                                    
                                <?= $cliente["equipamento"] ?>
                                </td>
                                <td>
                                    
                                <?= $cliente["chip"] ?>
                                </td>
                                <td>
                                    
                                <?= $cliente["status"] ?>
                                </td>
                                
                         
               
                                
                                <td> 
                                    <p class="btn btn-info"><a href="adesao.php?id=<?= $cliente["id"] ?>" style="text-decoration:none; color:#fff;" target="_blank"> Adesão </a> </p>
                                    <hr>
                                    <p class="btn btn-primary"><a href="contrato_insat.php?cliente=<?= $cliente["id"] ?>&contrato=<?= $cliente["id_contrato"] ?>" style="text-decoration:none; color:#fff;" target="_blank"> Contrato </a> </p>
                                </td>
                                
                                <td>
                                                    <?php      
                                     $fatura = new Source\Models\Read();
              $fatura->ExeRead("app_faturas", "WHERE cliente_id = :a", "a={$cliente["id"]}");
              $fatura->getResult();
              if(!empty($fatura->getResult())){
                  $botao = "btn btn-success";
              }else{
                   $botao = "btn btn-danger";
              }
                ?>           
                                <!-- Button trigger modal -->
<button type="button" class="<?= $botao ?>" data-toggle="modal" data-target="#exampleModal<?= $cliente["id"] ?>">
  COBRANÇAS
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?= $cliente["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title <?= $cliente["id"] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
           <form method="post" action="" id="receita" class="form">
                                                <input type="hidden" name="modo" value="entrada" />
                                                <div class="col-lg-12"> 
                                                    <p><i class="fas fa-pen-fancy" aria-hidden="true"></i>Descrição </p>
                                                    <input type="text" name="descricao" placeholder="Descrição do Lançamento" value="Cliente ID <?= $cliente["id"] ?> / <?= $cliente["nome"] ?> " class="form-control" />
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6"> 
                                                        </br>
                                                        <p><i class="far fa-money-bill-alt " ></i> Valor </p>
                                                      
                                                        <input type="text" name="valor" id="valor" class="form-control" />
                                                        
                                                     
                                                    </div>
                                                    <div class="col-lg-6"> 
                                                        </br>
                                                        <p><i class="fa fa-table" aria-hidden="true"></i> Data </p>
                                                        <input type="date" id="date" name="vencimento_em"  class="form-control input-datepicker" />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6"> 
                                                        </br>
                                                        <p><i class="fa fa-book" ></i> Carteira </p>
                                                        <select name="carteira_id" class="form-control"> 
                                                            <?php 
                                                            $cart = new Source\Models\Read();
                                                            $cart->ExeRead("app_carterias", "ORDER BY wallet DESC");
                                                            $cart->getResult();
                                                            
                                                            foreach ($cart->getResult() as $forcarteira):
                                                            ?>

                                                            <option value="<?= $forcarteira["wallet"] ?>"><?= $forcarteira["wallet"] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        </select>

                                                    </div>
                                                    <div class="col-lg-6"> 
                                                        </br>
                                                        <label><i class="fas fa-retweet"></i> Categoria </label>
                                                        <select name="categoria_id" class="form-control"> 
                                                            <?php 
                                                            
                                                            $cat = new Source\Models\Read();
                                                            $cat->ExeRead("app_categorias", "WHERE type = :a", "a=renda");
                                                            $cat->getResult();
                                                            foreach ($cat->getResult() as $forrenda):
                                                       
                                                            ?>

                                                            <option value="<?= $forrenda["id"] ?>"><?= $forrenda["name"] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                </br>
                                                <h3> Repetições </h3>

                                                <div class="col-md-12">


                                                    <div class="col-lg-12 col-md-12"> 

                                                        <label><i class="fas fa-retweet"></i> Repetição </label>
                                                        </br>




                                                        <script>



                                                            $(function () {

                                                                $(".camposExtras").hide();
                                                                $(".js_fixa").hide();
                                                                $(".js_parcelas").hide();
                                                                $('input[name="tipo"]').change(function () {
                                                                    if ($('input[name="tipo"]:checked').val() === "Fixa") {
                                                                        $('.js_fixa').show();
                                                                    } else {
                                                                        $('.js_fixa').hide();
                                                                    }
                                                                    if ($('input[name="tipo"]:checked').val() === "Parcela") {
                                                                        $('.js_parcelas').show();
                                                                    } else {
                                                                        $('.js_parcelas').hide();
                                                                    }
                                                                });

                                                            });
                                                        </script>



                                                        <input type="radio" name="tipo" value="Unica" class="form" >  Unica

                                                        <input type="radio" name="tipo" value="Fixa" >  Fixa 

                                                        <input type="radio" name="tipo" value="Parcela" > Parcela

                                                        <!--<div class="camposExtras">
                                                            Aqui vem os dados que é para esconder ou aparecer
                                                        </div>-->

                                                    </div>                                       

                                                </div>

                                                <div class="row"> 

                                                    <div class="col-lg-12 js_fixa" id="ocultar"> 
                                                        </br>
                                                        <label class="js_fixa"> Fixas </label>
                                                        <select name="js_fixa" class="form-control"> 
                                                            <option value="0">Selecione periodo  </option>
                                                            <option value="mensal">Mensal </option>
                                                            <option value="anual">Anual </option>

                                                        </select>
                                                    </div>

                                                    <div class="col-lg-12 js_parcelas" id="ocultar"> 
                                                        </br>
                                                        <label class="js_parcelas"> Parcelas </label>
                                                        <select name="js_parcelas" class="form-control"> 
                                                            <?php for ($i = 0; $i < 80; $i++) { ?>
                                                                <option value="<?= $i; ?>"><?= $i; ?> </option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>


                                                </div>
                                                </br>
                                                
                                                <input type="hidden" name="cliente" value="<?= $cliente["nome"] ?>" />
                                                <input type="hidden" name="cliente_id" value="<?= $cliente["id"] ?>" />
                                                <input type="submit" name="submit" value="LANÇAR RECEITAS" class="btn btn-success" />
                                                       </form>

          </br>          </br>
      

          
          <table class="table"> 
              <thead> 
              <th> Vencimento </th>
              <th> Valor </th>
              <th> Status </th>
              <th> Boleto </th>
              
              </thead>
              
              
                 <tbody> 
              
              <?php 
              $fatura = new Source\Models\Read();
              $fatura->ExeRead("app_faturas", "WHERE cliente_id = :a", "a={$cliente["id"]}");
              $fatura->getResult();
              foreach ($fatura->getResult() as $value) {

              ?>
 
                  <tr>
                      <td> <?= date("d/m/Y" , strtotime($value["vencimento_em"]))  ?> </td>
                      <td>  <?= number_format($value["valor"] / 100, 2, ",", ".")  ?> </td>
              <td>  <?php 
                      if($value["status"] == "unpaid"){
                          echo "<div class='alert alert-danger'> Aberto </div>";
                      }
                      if($value["status"] == "paid"){
                          echo "<div class='alert alert-success'> PAgo </div>";
                      }
                      ?> </td>
              <td> Link do Boleto </td>
                  </tr>
                  <?php } ?>
               
                 
                  
              </tbody>
          
          </table>
          
      </div>
      <div class="modal-footer">
<!--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
                                
                                
                                </td>
                                <td>
                                
                                    <!-- Button trigger modal -->
<button type="button" class="btn btn-dark" data-toggle="modal" data-target="#ModalAtendimento<?= $cliente["id"] ?>">
  Atendimento
</button>

<!-- Modal -->
<div class="modal fade" id="ModalAtendimento<?= $cliente["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal Atendimento <?= $cliente["id"] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <form method="post" action="" class="form"> 
              <div class="form-group"> 

                  <input type="hidden" name="cliente_id" value="<?= $cliente["id"] ?>"  />                  
                  <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>"  />
                  <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s") ?>"  />
              </div>
              <div class="form-group"> 
                  <label> Ocorrência</label>
                  <textarea name="ocorrencia" class="form-control"> </textarea>
              </div>
              <div class="form-group"> 
                  <input type="submit" name="cadastrar" class="btn btn-success" />
              </div>
              
          </form>
          
          <table class="table"> 
          
              <thead> 
                  <tr> 
                      <th>Data </th>
                      <th>Ocorrencia </th>
                      <th>Atendente </th>
                  </tr>
              </thead>
              
              <tbody> 
                  
                  <?php 
                  $atendimento = new Source\Models\Read();
                  $atendimento->ExeRead("app_atendimento", "WHERE cliente_id = :a", "a={$cliente["id"]}");
                  $atendimento->getResult();
                  foreach ($atendimento->getResult() as $atende) {
                  ?>
                  <tr> 
                      <td><?= date( "d/m/Y H:i:s", strtotime($atende["data"]))  ?> </td>
                      <td><?= $atende["ocorrencia"] ?> </td>
                      <td><?php $atende["user_id"];
                      
                      $nome = new Source\Models\Read();
                      $nome->ExeRead("usuarios", "WHERE id = :a", "a={$atende["user_id"]}");
                      $nome->getResult();
                      
                      echo $nome->getResult()[0]["first_name"] . " " . $nome->getResult()[0]["last_name"] ;
                      ?> </td>
                  </tr>
                  <?php } ?>
                  
              
              </tbody>
          
          </table>
       
      </div>
      <div class="modal-footer">
<!--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
                                
                                
                                </td>
                                
                                <td> 
                                
                                
                                <!-- Button trigger modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#ModalDoc<?= $cliente["id"] ?>">
  Doc
</button>

<!-- Modal -->
<div class="modal fade" id="ModalDoc<?= $cliente["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Cliente ID <?= $cliente["id"] ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          
          <form name="form" action="" method="post" enctype="multipart/form-data" >
             <div class="form-group"> 
                    <p> Upload de Documentos</p>
                <input type="file" name="image" class="form-control" />
                </div>
              <div class="form-group"> 
                  <input type="hidden" name="cliente_id" value="<?= $cliente["id"] ?>" />
                  <input type="submit" name="ENVIAR ARQUIVO" class="btn btn-success" />
              </div>
          
          </form>
          
          <div class="row"> 
              
              <?php 
              $doc = new Source\Models\Read();
              $doc->ExeRead("app_documento", "WHERE cliente_id = :a", "a={$cliente["id"]}");
              $doc->getResult();
              
              foreach ($doc->getResult() as $documento) {

              ?>
          
              <div class="col-md-4"> 
                  <a href="<?= CONF_URL_BASE ?>/admin/uploads/<?= $doc->getResult()[0]["arquivo"] ?>" target="_blank">  <img src="<?= CONF_URL_BASE ?>/admin/uploads/<?= $doc->getResult()[0]["arquivo"] ?>" /> </a>
              
              </div>
              
              <?php } ?>
          
          </div>
          
      </div>
      <div class="modal-footer">
<!--        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>-->
      </div>
    </div>
  </div>
</div>
                                
                                
                                
                                </td>
                               
                              <td><p class="btn btn-info"><a style="text-decoration: none; color:#fff;" href="./?p=prevenda&edit=<?= $cliente["id"] ?>">Editar</a></p> </td>
                                <td><p class="btn btn-danger"><a style="text-decoration: none; color:#fff;" href="./?p=cliente&delete=<?= $cliente["id"] ?>">Excluir</a></p> </td>
                            </tr>
                        <?php endforeach; ?> 


                    </tbody>

                </table>
                
                        <?php } ?>
                
                Sua busca retornou <b> <?= $read->getRowCount(); ?> </b> Resultados.

            </div>
        </div>


    </div> 
    
    
    


