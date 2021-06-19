
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5ee2605daf41c40012be9344&product=inline-share-buttons" async="async"></script>

<header class="container backwhite" itemprop="about"> 

    
    <?php 
    
    $url = $_SERVER['HTTP_HOST'] . $_SERVER["REQUEST_URI"];
     
     $tratar = explode("/", $url);
     
   // var_dump($tratar);
     
     $read = new Source\Models\Read();
     $read->ExeRead("app_post", "WHERE slug = :a", "a={$tratar["2"]}");
     $read->getResult();
     
     if(empty($read->getResult())){
        echo "<h3> Erro 404 </h3><p>Desculpe, esta página pode ter sido removida do servidor :( </p>"; 
     }else{
    
    ?>
    
    <img src="<?=CONF_URL_BASE ?>/admin/uploads/<?= $read->getResult()[0]["imagem"]?>" alt="<?= $read->getResult()[0]["title"]?>" title="<?= $read->getResult()[0]["title"]?>" width="100%" /> 
    
    <?= $read->getResult()[0]["content"]?>
    
    <hr>
    <div class="row">
        <div class="col-md-6">
    <h2 class="text-center" style="color:orange;">Faça Cotação Online, receba informações em seu e-mail agora </h2>
        </div>
        <div class="col-md-6" align="center">
    <h1 class="btn btn-success"  align="center"> <a href="<?=CONF_URL_BASE ?>/cotacao" style="text-decoration: none; color:#fff;"> Cotação Online , Clique Aqui </a> </h1>
    
    <h3 class="border-bottom"> Faça Cotação por Whatsapp</h3>
      <p><a href=" https://api.whatsapp.com/send?phone=5511938045312" style="text-decoration:none; color:#999; font-size: 1.2em;" target="_blank" > <i class="fab fa-whatsapp"></i> Whatsapp </a> </p> 
        </div>
    </div>

    
    <h5 class="border-bottom text-center"> Compartilhe nas redes sociais </h5>
<div class="sharethis-inline-share-buttons"></div>
      </header>
      

     <?php } ?>
             
      
   
  