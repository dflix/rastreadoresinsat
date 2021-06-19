<div class="container"> 

    <h3> Remessa </h3>
    
   
    
    <?php 
    
    $remessa = new \Source\Core\Remessa();
 
    ?>
    
    
    
    <?php 
    $ver = new \Source\Models\Read();
    $ver->ExeRead("app_remessa", "ORDER BY data DESC LIMIT 15");
    $ver->getResult();
    foreach ($ver->getResult() as $remessas) {
    ?>

    <div class="col-md-12 btn btn-success"><a href="./remessa/arquivo.php?arquivo=<?= $remessas["remessa"] ?>" style="text-decoration: none; color:#fff;" target="_blank"> <?= date("d/m/Y",strtotime($remessas["data"])); ?> </a></div>
    <?php } ?>
   
</div>
