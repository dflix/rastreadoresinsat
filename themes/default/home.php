<div class="container-fluid main_home" itemprop="about"> 
    <div class="container">
        <div class="row"> 

            <div class="col-md-8 p-4 boxhome"> 

                <h1> Rastreadores INSAT </h1>

                <p>Rastreadores via satélite para veículos, motos, utilitários, caminhões, maquinas agrículas , alta tecnologia via satélite. </p>
                <p>Conheça nossas melhores opções para segurança pessoal, veicular, para frotas e cargas, com rastreadores altamente tecnológicos. </p>
                <p>A Insat , empresa de rastreamento via satélite sempre estará ao seu lado, Protegendo você, sua família e seu patrimônio. </p>
                <p>Nossa meta é oferecer o que há de melhor em soluções , produtos e serviços, para atender e superar às suas expectativas, Este é o nosso compromisso e, por isso, trabalhamos continuamente.

                </p>
            </div>

            <div class="col-md-1"> </div>

            <div class="col-md-3 boxhome2 y-4"> 
                <header class="bg-success text-center p-2"> Atendimento </header>
                <p class="text-white text-center" style="font-size:0.75em; margin-top: 10px;"> e-mail: contato@sistemasinsat.com.br </p>
                <p class="text-white text-center" style="font-size:0.75em; margin-top: 10px;"> whatsapp: (11)93804-5312 </p>
            </div>

        </div>



    </div>


</div>

<section class="box_display container bg-white">

    <div class="blocohome"> 
        <p class="text-center" style="font-size:3em; color:#ccc;"> <i class="fas fa-car-side"></i> </p>
        <h3 style="color:orange;"> Rastreador para Carrros </h3>
        <p> Tenha controle total de seus veículos com rastreadores para carros e utilitários Insat.</p>
    </div>

    <div class="blocohome"> 
        <p class="text-center" style="font-size:3em; color:#ccc;"> <i class="fas fa-motorcycle"></i> </p>
        <h3 style="color:orange;"> Rastreador para Motos </h3>
        <p> Tenha controle total da sua moto com rastreadores para motos da Insat Rastreadores.</p>
    </div>

    <div class="blocohome"> 
        <p class="text-center" style="font-size:3em; color:#ccc;"> <i class="fas fa-truck-moving"></i> </p>
        <h3 style="color:orange;"> Rastreador para Caminhões </h3>
        <p> Tenha controle total do seu caminhão com rastreadores para caminhões da Insat.</p>
    </div>

    <div class="blocohome"> 
        <p class="text-center" style="font-size:3em; color:#ccc;"> <i class="fas fa-users"></i> </p>
        <h3 style="color:orange;"> Rastreador Pessoal </h3>
        <p> Tenha controle da logística e proteção da sua equipe de pessoas, familiares ou animais com o Rastreador Portátil Insat</p>
    </div>

    <div class="blocohome"> 
        <p class="text-center" style="font-size:3em; color:#ccc;"> <i class="fas fa-truck-moving"></i> </p>
        <h3 style="color:orange;"> Rastreador para Frotas </h3>
        <p> Tenha controle da logística e proteção da sua equipe de pessoas, familiares ou animais com o Rastreador Portátil Insat</p>
    </div>

    <div class="blocohome"> 
        <p class="text-center" style="font-size:3em; color:#ccc;"> <i class="fas fa-box"></i> </p>
        <h3 style="color:orange;"> Rastreador para Cargas </h3>
        <p> Tenha controle total das cargas e encomendas com o Rastreador Portátil Insat.
        </p>
    </div>


</section>









<!--      <div class="imgapp"> <img src="./assets/image/home-app.jpg" class="imgapp" /> </div>-->

<div class="container bg-white">
    <?php


    $readBlog = new \Source\Models\Read();
    $readBlog->ExeRead("app_post", "WHERE categoria != :a ORDER BY id DESC", "a=pagina");
    $blog = $readBlog->getResult();

    $readProd = new \Source\Models\Read();
    $readProd->ExeRead("app_prod", "ORDER BY id DESC LIMIT 6");
    $produto = $readProd->getResult();


  
    ?>

</div>



<div class="container-fluid bg-white"> 


    <div class="row">
        <div class="col-lg-11 mx-auto">
            <h5 class="text-center"> Blog </h5>
            <!-- FIRST EXAMPLE ===================================-->
            <div class="row py-5">
                <?php
                foreach ($blog as $valBlog) {
                    ?>  
                    <div class="col-lg-4">
                        <figure class="rounded p-3 bg-white shadow-sm">
                            <img src="<?= CONF_URL_BASE ?>/admin/uploads/<?= $valBlog["imagem"] ?>" alt="" class="w-100 card-img-top">
                            <figcaption class="p-4 card-img-bottom">
                                <h2 class="h5 font-weight-bold mb-2 font-italic"><?= $valBlog["pagina"] ?></h2>
                                <p class="mb-0 text-small text-muted font-italic"><?= $valBlog["description"] ?></p>
                                <buttom class="btn btn-info"><a href="<?= CONF_URL_BASE ?>/<?= $valBlog["slug"] ?>" style="text-decoration: none; color:#fff;"> Saiba Mais ... </a></buttom>
                            </figcaption>
                        </figure>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>


   


</div>








