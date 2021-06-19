<?PHP 
session_start();
require "./vendor/autoload.php";
?>
<!doctype html>
<html lang="pt-br" itemscope itemtype="https://schema.org/WebSite">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" >-->
    <link rel="stylesheet" href="<?=CONF_URL_BASE ?>/_cdn/node_modules/bootstrap/dist/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?=CONF_URL_BASE ?>/_cdn/css/bootstrap-custom.css" />
    <link rel="stylesheet" href="<?=CONF_URL_BASE ?>/_cdn/css/estilo.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" >
   
    <?php 
    $tag = new \Source\Models\Tags();
    //$tag->includesTag();
    ?>

     <meta name="google-site-verification" content="Wk8zuqbtniyd7bX_BLo1fNwp0YMlkF8s5JahSIKTyWc" />
     
     <link rel="shortcut icon" href="<?=CONF_URL_BASE ?>/assets/image/favicon.png" />
     <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-178295610-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-178295610-1');
</script>

  </head>
  <body>
       <div class="container-fluid bg-topo text-white topo"> 
           <div class="container"> 
               <div class="row"> 
                   <div class="col-md-6">
                       <h5 class="text-white">Rastreadores Insat </h5>
                    <p> <i class="fab fa-whatsapp"></i> (11)93804-5312</p> 
                   
                   </div>
                   <div class="col-md-6 texto-social">
                       <i class="fab fa-facebook fontesocial"></i> 
                       <i class="fab fa-instagram fontesocial"></i>
                   </div>
               </div>
           </div>
       </div>
      <header class="container-fluid bg-warning">
         
<nav class="navbar navbar-expand-lg navbar-light bg-warning static-top">
  <div class="container">
      <?php 
      $logo = new Source\Models\Read();
      $logo->ExeRead("app_logo", "WHERE id = :a", "a=1");
      $logo->getResult();
      ?>
      <a class="navbar-brand" href="<?=CONF_URL_BASE ?>">
          <h1 class="homeh1">Rastreadores Via Satélite Insat </h1>
          <img src="<?=CONF_URL_APP ?>/uploads/<?= $logo->getResult()[0]["logo"] ?>" width="100" alt="">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="<?=CONF_URL_BASE ?>/">Home
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <?php
        $pagina = new Source\Models\Read();
        $pagina->ExeRead("app_post", "WHERE categoria = :a", "a=pagina");
        $pagina->getResult();
        foreach ($pagina->getResult() as $pg) {
//        ?>
        <li class="nav-item">
          <a class="nav-link" href="<?=CONF_URL_BASE ?>/<?= $pg["slug"] ?>"><?= $pg["pagina"] ?></a>
        </li>
        <?php  } ?>
 <li class="nav-item dropdown">
     <?php 
     $categoria = new Source\Models\Read();
     $categoria->ExeRead("app_post_categ", "ORDER BY id DESC" );
     $categoria->getResult();
     foreach ($categoria->getResult() as $cat) {

     ?>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $cat["categoria"] ?>
        </a>
     
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <?php
            $pcat = new Source\Models\Read();
            $pcat->ExeRead("app_post", "WHERE categoria = :a", "a={$cat["slug"]}");
            $pcat->getResult();
            foreach ($pcat->getResult() as $vpcat) {
            ?>
          <a class="dropdown-item" href="<?=CONF_URL_BASE ?>/<?= $vpcat["slug"] ?>"><?= $vpcat["pagina"] ?></a>
            <?php  } ?>
        
        </div>
      </li>
      
     <?php } ?>
      
       <li class="nav-item">
          <a class="nav-link" href="<?=CONF_URL_BASE ?>/blog">Blog</a>
        </li>
<!--       <li class="nav-item">
          <a class="nav-link" href="<?=CONF_URL_BASE ?>/produtos">Produtos</a>
        </li>-->
        <?php 
        if(!empty($_SESSION["carrinho"])){
        ?>
        
        
                        <a class="btn btn-info btn-sm ml-3" href="<?=CONF_URL_BASE ?>/carrinho">
                    <i class="fa fa-shopping-cart"></i> Carrinho
                    <span class="badge badge-light">3</span>
                </a>
        <?php } ?>
        <?php 
        if(!empty($_SESSION["nivel"])){
        ?>
               <li class="nav-item">
          <a class="nav-link" href="<?=CONF_URL_BASE ?>/pedidos"> Minhas Cobranças</a>
        </li>
        <?php  } ?>
        <li>
        <a href="<?=CONF_URL_BASE ?>/entrar"><button type="button" class="btn btn-warning "><i class="fas fa-tachometer-alt"></i> Admin</button></a>
        </li>
        <li>
        <a href="<?=CONF_URL_BASE ?>/entrar_cliente"><button type="button" class="btn btn-success "><i class="fas fa-user"></i> Area do Cliente</button></a>
        </li>   
      </ul>
    </div>
  </div>
</nav>
      
      </header>   
    
  <?php 
  $rota = new \Source\Models\Rota();
  ?>
    
      
            
      <footer class="container-fluid bg-topo" itemscope itemtype="https://schema.org/WPFooter" > 
          
         
          
          <div class="container" > 
              <div class="row"> 
              
                  <div class="col-md-4" itemprop="accessModeSufficient"> 
                      <h4 class="border-bottom" style="color:#fff;">INSTITUCIONAL </h4>
                      
                      <p><a href="<?= CONF_URL_BASE ?>" style="text-decoration: none; color:#fff;"> Home</a></p>
                      <p><a href="<?= CONF_URL_BASE ?>/blog" style="text-decoration: none; color:#fff;"> Blog</a></p>
                      <?php 
                      $read = new \Source\Models\Read();
                      $read->ExeRead("app_post", "WHERE categoria = :a", "a=pagina");
                      $read->getResult();
                      foreach ($read->getResult() as $footer) {
 
                      ?>
                      <p><a href="<?= CONF_URL_BASE ?>/<?= $footer["slug"] ?>" style="text-decoration: none; color:#fff;"> <?= $footer["pagina"] ?></a></p>
                      <?php  } ?>
               
                  </div>
                  <div class="col-md-4"> 
                      <h4 class="border-bottom" style="color:#fff;">CONTATO </h4>
                      <p><a href=" https://api.whatsapp.com/send?phone=5511938045312" style="text-decoration:none; color:#999;" target="_blank" > <i class="fab fa-whatsapp"></i> Whatsapp</p> </a>
                  <p style="color:#fff;"> (11) 93804-5312 </p>
<!--                  <p style="color:#fff;"> (11)9 4700-4525 </p>-->
                  
                  <p style="color:#fff;"> <i class="fas fa-at"></i> contato@sistemasinsat.com.br </p>
                  </div>
                  <div class="col-md-4"> 
                      <h4 class="border-bottom" style="color:#fff;">SOCIAL </h4>
                      <p style="color:#fff;"> <i class="fab fa-youtube"></i> Youtube </p>
                      <p style="color:#fff;"> <i class="fab fa-instagram fontesocial"></i> Instagran</p>
                      <p style="color:#fff;"> <i class="fab fa-facebook fontesocial"></i>  Facebook</p>
                  </div>
              </div>
          
                       
          </div>
      </footer>
      
      <script src="<?=CONF_URL_BASE ?>/_cdn/node_modules/jquery/dist/jquery.min.js"></script> 
      <script src="<?= CONF_URL_BASE ?>/_cdn/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"> </script>



  </body>
</html>