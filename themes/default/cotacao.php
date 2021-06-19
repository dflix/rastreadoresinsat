
<div class="container backwhite">

    <h2 class="border-bottom"> Cotação  </h2>

    <?php
    $lead = new Source\Core\Leads();
    $lead->Leads();
    ?>

    <script>



        $(function () {

            $(".camposExtras").hide();
            $(".js_rastreador").hide();
            $(".js_seguro").hide();
            $('input[name="tipo"]').change(function () {
                if ($('input[name="tipo"]:checked').val() === "seguro") {
                    $('.js_seguro').show();
                } else {
                    $('.js_seguro').hide();
                }
                if ($('input[name="tipo"]:checked').val() === "rastreador") {
                    $('.js_rastreador').show();
                } else {
                    $('.js_rastreador').hide();
                }
            });

        });
    </script>



    <h3>Solicite tipo de Orçamento </h3>

    <input type="radio" name="tipo" value="seguro" id="seguro" > <label for="seguro" class="btn btn-success"> Rastreador Com Seguro Rodobens </label>

    <input type="radio" name="tipo" value="rastreador" id="rastreador" ><label for="rastreador" class="btn btn-primary"> Rastreamento Via Satélite </label>

    <!--<div class="camposExtras">
        Aqui vem os dados que é para esconder ou aparecer
    </div>-->



    <!--                                                </div>-->

    <div class="row"> 

        <div class="col-lg-12 js_rastreador" id="ocultar"> 
            </br>
            <label class="js_fixa"> Rastreamento Via Satélite </label>
            <p>Preencha o formulário e receba proposta em seu e-mail para proteger seu veículo ou sua frota </p>
            <div class="form-group">
                <form action="" method="post" class="form"> 
                    <div class="form-group"> 
                        <label> Nome </label>
                        <input type="text" name="nome" class="form-control" />
                    </div>
                    <div class="form-group"> 
                        <label> E-mail </label>
                        <input type="text" name="email" class="form-control" />
                    </div>
                    <div class="form-group"> 
                        <label> Telefone </label>
                        <input type="text" name="telefone" class="form-control" />
                    </div>
                    <div class="form-group"> 
                        <label> Especifique suas necessidades </label>
                        <textarea name="mensagem" class="form-control"> </textarea>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="tipo_orcamento" value="rastreamento" />
                        <input type="submit" name="submit" value="RECEBER PROPOSTA" class="btn btn-success" />
                    </div>


                </form>
            </div>
        </div>

        <div class="col-lg-12 js_seguro" id="ocultar"> 
            </br>
            <label class="js_seguro">Rastreador Com Seguro  Rodobens</label> 
            <p>Com Rastreador INSAT instalado em seu veículo, a USEBENS Seguros vai garantir coberturas especiais, preencha formulário abaixo para receber proposta </p>
            <div class="form-group">

                <form action="" method="post">
                    <div class="row">

                        <div class="col-md-12"> 
                            <h3 style="background: #CCC; color:#fff; padding: 10px; margin-top: 10px;"> DADOS PESSOAIS </h3>
                        </div>

                        <div class="col-md-4">
                            <label>NOME </label>
                            <input type="text" class="form-control" name="nome" />
                        </div>
                        <div class="col-md-4"> 
                            <label>EMAIL </label>
                            <input type="text" class="form-control" name="email" />
                        </div>
                        <div class="col-md-4"> 
                            <label>TELEFONE (whatsapp) </label>
                            <input type="text" class="form-control" name="telefone" />
                        </div>

                        <div class="col-md-12"> 
                            <h3 style="background: #CCC; color:#fff; padding: 10px; margin-right: 10px;"> DADOS DO VEÍCULO </h3>
                        </div>

                        <div class="col-md-4"> 
                            <b>Tipo de Veículo </b>
                            <select name="veiculo" id="veiculo"  class="form-control"> 

                                <option value="#"> Selecione o veiculo</option>
                                <option value="motos"> Motos</option>
                                <option value="carros"> Carros</option>
                                <option value="caminhoes"> Caminhão</option>

                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label >MARCA: </label>

                            <select name="marca1" id="marca1"  class="form-control">

                            </select>


                        </div>

                        <div class="form-group col-md-4">
                            <label>MODELO </label>
                            <select name="modelo1" id="modelo1" class="form-control">

                            </select>
                            </label>
                        </div>

                        <div class="form-group col-md-4">
                            <label>ANO:</label>
                            <select name="ano1"  id="ano1" class="form-control"  > 

                            </select>

                        </div>

                        <div class="form-group col-md-4">
                            <label>
                                CODIGO FIPE:</label>
                            <select  name="fipe" id="fipe" class="form-control" >


                            </select>

                        </div>

                        <div class="form-group col-md-4">
                            <label>
                                VALOR:</label>
                            <select  name="valor" id="valor" class="form-control">

                            </select>

                        </div>

                        <div class="col-md-12"> 
                            <h3 style="background: #CCC; color:#fff; padding: 10px; margin-right: 10px;"> DADOS BASICOS DO VEÍCULO </h3>
                        </div>

                        <div class="col-md-4"> 
                            <p> Uso do veículo ? </p>
                            <select class="form-control" name="uso_veiculo"> 
                                <option> Selecione uma das opções </option>
                                <option value="Particular"> Particular </option>
                                <option value="Taxi"> Taxi </option>
                                <option value="Locadora"> Locadora </option>
                                <option value="Aplicativo"> Aplicativo </option>
                                <option value="PCD"> PCD </option>
                                <option value="Blindado"> Blindado </option>
                                <option value="GNV"> GNV </option>
                                <option value="Blindado"> Blindado </option>
                            </select>
                        </div>

                        <div class="col-md-4"> 
                            <p> Combustivel ? </p>
                            <select class="form-control" name="combustivel"> 
                                <option> Selecione uma das opções </option>
                                <option value="Gasolina"> Gasolina </option>
                                <option value="Etanol"> Etanol </option>
                                <option value="Flex"> Flex </option>
                                <option value="Diesel"> Diesel </option>
                                <option value="TetraFull"> TetraFull </option>

                            </select>
                        </div>

                        <div class="col-md-4"> 
                            <p> CEP de pernoite </p>
                            <input type="text" class="form-control" name="cep_pernoite" /> 
                        </div>

                        <div class="col-md-4"> 
                            <p> O veículo é turbo, rebaixado, tunado ou possui outras modificações?    </p>
                            <select class="form-control" name="modificacoes"> 
                                <option> Selecione uma das opções </option>
                                <option value="Não, nenhuma modificação"> Não, nenhuma modificação </option>
                                <option value="Sim, é turbo, rebaixado ou tunado"> Sim, é turbo, rebaixado ou tunado </option>
                                <option value="Sim, chassi remarcado"> Sim, chassi remarcado </option>
                                <option value="Sim, possui outras modificações"> Sim, possui outras modificações </option>


                            </select>
                        </div>

                        <div class="col-md-4"> 
                            <p> O veículo é modificado com Kit Gás (GNV)?    </p>
                            <select class="form-control" name="kit_gas"> 
                                <option> Selecione uma das opções </option>
                                <option value="Sim"> Sim </option>
                                <option value="Não"> Não </option>


                            </select>
                        </div>

                        <div class="col-md-4"> 
                            <p> Qual a relação do Segurado com o Proprietário do veículo?    </p>
                            <select class="form-control" name="relacao_proprietario_segurado"> 
                                <option> Selecione uma das opções </option>
                                <option value="São a mesma pessoa">São a mesma pessoa </option>
                                <option value="Veículo está registrado em nome de empresa de leasing">Veículo está registrado em nome de empresa de leasing </option>
                                <option value="Veículo comprado recentemente e em transferência">Veículo comprado recentemente e em transferência </option>
                                <option value="Veículo em nome de terceiro">Veículo em nome de terceiro </option>

                            </select>
                        </div>

                        <div class="col-md-4"> 
                            <p> Relação entre o segurado e o terceiro ? </p>
                            <select class="form-control" name="relacao_segurado_terceiro"> 
                                <option> Selecione uma das opções </option>
                                <option value="Cônjuge ou União Estável Comprovada">Cônjuge ou União Estável Comprovada </option>
                                <option value="Pais e Filhos ou Enteados">Pais e Filhos ou Enteados </option>
                                <option value="Avós e Netos">Avós e Netos</option>
                                <option value="Irmãos">Irmãos</option>
                                <option value="Primos de primeiro grau">Primos de primeiro grau</option>
                                <option value="Tio e sobrinho de primeiro grau">Tio e sobrinho de primeiro grau</option>
                                <option value=" PJ e Sócio /Adm de Contrato Social/Estatuto"> PJ e Sócio /Adm de Contrato Social/Estatuto</option>
                                <option value="PJ e Diretor da Empresa">PJ e Diretor da Empresa</option>
                                <option value="Espólio do Proprietário Falecido">Espólio do Proprietário Falecido</option>
                                <option value="Outro">Outro</option>

                            </select>
                        </div>

                        <div class="col-md-4"> 
                            <p> Tipo de pessoa do Segurado </p>
                            <select class="form-control" name="segurado"> 
                                <option> Selecione uma das opções </option>


                                <option value="Fisica">Fisica</option>
                                <option value="Juridica">Fisica</option>

                            </select>
                        </div>

                        <div class="col-md-4"> 
                            <p> CPF do Segurado </p>
                            <input type="text" class="form-control" name="cpf_segurado" />
                        </div>

                        <div class="col-md-12"> 
                            <h3 style="background: #CCC; color:#fff; padding: 10px; margin-right: 10px;"> INFORMAÇÕES SOBRE O VEÍCULO </h3>
                        </div>

                        <div class="col-md-4"> 
                            <p> Qual a utilização do veículo? </p>
                            <select class="form-control" name="utilizacao_veiculo"> 
                                <option> Selecione uma das opções </option>
                                <option value="Particular">Particular</option>
                                <option value="Particular Locado">Particular Locado</option>
                                <option value="Motorista de Aplicativo – Uber, Cabify, Pop, Outros">Motorista de Aplicativo – Uber, Cabify, Pop, Outros</option>
                                <option value="Representante Comercial / Vendedor">Representante Comercial / Vendedor</option>
                                <option value="Serviços Técnicos">Serviços Técnicos</option>
                                <option value="Serviços de Entrega">Serviços de Entrega</option>
                                <option value="Compartilhado – Car Sharing">Compartilhado – Car Sharing</option>
                                <option value="Outros">Outros</option>

                            </select>
                        </div>

                        <div class="col-md-4"> 
                            <p> O veículo possui adaptação para pessoa com deficiência (PCD)? </p>
                            <select class="form-control" name="adaptacao_deficiente"> 
                                <option> Selecione uma das opções </option>
                                <option value="Não">Não</option>
                                <option value="Sim, PCD original de fábrica">Sim, PCD original de fábrica</option>
                                <option value="Sim, adaptado para PCD">Sim, adaptado para PCD</option>
                                
                            </select>
                        </div>

                        <div class="col-md-4"> 
                            <p> O veículo é blindado? </p>
                            <select class="form-control" name="veiculo_blindado"> 
                                <option> Selecione uma das opções </option>
                                <option value="Não">Não</option>
                                <option value="Sim">Sim</option>
                               
                            </select>
                        </div>

                        <div class="col-md-12"> 
                            <h3 style="background: #CCC; color:#fff; padding: 10px; margin-right: 10px;"> INFORMAÇÕES SOBRE CONDUTOR </h3>
                        </div>
                        
                       <div class="col-md-4"> 
                            <p> O Segurado é o condutor principal? </p>
                            <select class="form-control" name="segurado_condutor_principal"> 
                                <option> Selecione uma das opções </option>
                                <option value="Não">Não</option>
                                <option value="Sim">Sim</option>
                               
                            </select>
                        </div> 
                        
                       <div class="col-md-4"> 
                            <p> Tipo de Condutor ? </p>
                            <select class="form-control" name="tipo_condutor"> 
                                <option> Selecione uma das opções </option>
                                <option value="Pessoa Física">Pessoa Física</option>
                                <option value="Pessoa Jurídica COM condutor designado ">Pessoa Jurídica COM condutor designado </option>
                                <option value="Pessoa Jurídica SEM condutor designado ">Pessoa Jurídica SEM condutor designado </option>
                               
                            </select>
                        </div> 
                        
                        
                    <div class="col-md-4"> 
                            <p> Data de Nascimento </p>
                            <input type="text" name="data_nascimento" class="form-control" />
                            
                     </div>
                        
                        
                        
                                                
                       <div class="col-md-4"> 
                            <p> Estado Civíl ? </p>
                            <select class="form-control" name="estado_civil"> 
                                <option> Selecione uma das opções </option>
                                <option value="Solteiro">Solteiro</option>
                                <option value="Casado / União estável">Casado / União estável</option>
                                <option value="Divorciado">Divorciado</option>
                                <option value="Viuvo">Viuvo</option>
                                <option value="Separado">Separado</option>
                              
                            </select>
                        </div>
                                                
                       <div class="col-md-4"> 
                            <p> Sexo ? </p>
                            <select class="form-control" name="sexo"> 
                                <option> Selecione uma das opções </option>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                
                              
                            </select>
                        </div>
                                                
                       <div class="col-md-4"> 
                            <p> Possui garagem no local de pernoite do veículo (residência)? </p>
                            <select class="form-control" name="garagem_pernoite_residencia"> 
                                <option> Selecione uma das opções </option>
                                <option value="Sim, com portão automático ou porteiro">Sim, com portão automático ou porteiro</option>
                                <option value="Sim, externo privado e pago">Sim, externo privado e pago</option>
                                <option value="sim, com portão manual">sim, com portão manual</option>
                                <option value="Não ou outro tipo de garagem">Não ou outro tipo de garagem</option>
                            </select>
                        </div>
                                                
                       <div class="col-md-4"> 
                            <p> Possui garagem no trabalho?? </p>
                            <select class="form-control" name="garagem_trabalho"> 
                                <option> Selecione uma das opções </option>
                                <option value="Sim, interno da empresa em local fechado">Sim, interno da empresa em local fechado</option>
                                <option value="Sim, externo a empresa, privado e pago">Sim, externo a empresa, privado e pago</option>
                                <option value="Não ou outro tipo de garagem">Não ou outro tipo de garagem</option>
                                <option value="Não usa para locomoção ao trabalho">Não usa para locomoção ao trabalho</option>
                                <option value="Não trabalha">Não trabalha</option>
                               
                            </select>
                        </div>
                                                
                       <div class="col-md-4"> 
                            <p> Possui garagem no local de estudo? </p>
                            <select class="form-control" name="garagem_estudo"> 
                                <option> Selecione uma das opções </option>
                                <option value="Diurno em garagem privada e fechada – paga">Diurno em garagem privada e fechada – paga</option>
                                <option value="Diurno sem garagem">Diurno sem garagem</option>
                                <option value="Noturno em garagem privada e fechada – paga">Noturno em garagem privada e fechada – paga</option>
                                <option value="Noturno sem garagem ">Noturno sem garagem </option>
                                <option value="Não utiliza o veículo para locomoção ao local de estudo">Não utiliza o veículo para locomoção ao local de estudo</option>
                                <option value="Não estuda">Não estuda</option>
                               
                            </select>
                        </div>
                                                
                       <div class="col-md-4"> 
                            <p> Qual a quilometragem rodada por mês? </p>
                            <select class="form-control" name="quilometragem_rodada_mes"> 
                                <option> Selecione uma das opções </option>
                              
                                <option value="Até 500 km/mês">Até 500 km/mês</option>
                                <option value="Até 1000 km/mês">Até 1000 km/mês</option>
                                <option value="Até 1250 km/mês">Até 1250 km/mês</option>
                                <option value="Até 1500 km/mês">Até 1500 km/mês</option>
                                <option value="Até 1750 km/mês">Até 1750 km/mês</option>
                                <option value="Acima 1750 km/mês">Acima 1750 km/mês</option>
                               
                            </select>
                        </div>
                                                
                       <div class="col-md-4"> 
                            <p> Qual a quilometragem do veiculo? </p>
                            <input type="text" class="form-control" name="quilometragem_veiculo" /> 
                               
                        </div>
                        
                                             <div class="col-md-4"> 
                            <p> Deseja cobertura para outros condutores até 25 anos? </p>
                            <select class="form-control" name="condutores_ate_25_anos"> 
                                <option> Selecione uma das opções </option>
                              
                                <option value="Sim">Sim</option>
                                <option value="Não">Não</option>
                             
                               
                            </select>
                        </div>
                        
                                             <div class="col-md-4"> 
                            <p> Número de Roubos ou Furtos de veículos nos últimos 12 meses? </p>
                            <select class="form-control" name="roubo_12_meses"> 
                                <option> Selecione uma das opções </option>
                              
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4 ou mais">4 ou mais</option>
                             
                               
                            </select>
                        </div>
                        
                        <div class="col-md-12"> 
                            <input type="hidden" name="tipo_orcamento" value="seguro" />
                            <input type="submit" name="submit" value="SOLICITAR PROPOSTA" class="btn btn-success" />
                        </div>

                    </div>
                </form>

            </div>

        </div>
    </div>

</div>

<script>



    $(function () {

        $('select[name=veiculo]').change(function () {
            $.post("<?= CONF_URL_BASE ?>/admin/marca.php",
                    {veiculo: $(this).val()},
                    function (veiculo) {

                        $('select[name=marca1]').html(veiculo)

                    })
        });

        $('select[name=marca1]').change(function () {
            $.post("<?= CONF_URL_BASE ?>/admin/modelo.php",
                    {marca: $(this).val()},
                    function (marca) {

                        $('select[name=modelo1]').html(marca)

                    })
        });

        $('select[name=modelo1]').change(function () {
            $.post("<?= CONF_URL_BASE ?>/admin/ano.php",
                    {modelo: $(this).val()},
                    function (modelo) {

                        $('select[name=ano1]').html(modelo)

                    })
        });

        $('select[name=ano1]').change(function () {
            $.post("<?= CONF_URL_BASE ?>/admin/ano.php",
                    {modelo: $(this).val()},
                    function (modelo) {

                        $('select[name=fipe]').html(modelo)

                    })
        });

        $('select[name=ano1]').change(function () {
            $.post("<?= CONF_URL_BASE ?>/admin/codigofipe.php",
                    {fipe: $(this).val()},
                    function (fipe) {

                        $('select[name=fipe]').html(fipe)

                    })
        });

        $('select[name=ano1]').change(function () {
            $.post("<?= CONF_URL_BASE ?>/admin/preco.php",
                    {valor: $(this).val()},
                    function (valor) {

                        $('select[name=valor]').html(valor)

                    })
        });

        $('select[name=plano]').change(function () {
            $.post("<?= CONF_URL_BASE ?>/admin/plano_desc.php",
                    {plano: $(this).val()},
                    function (plano) {

                        $('select[name=plano_desc]').html(plano)

                    })
        });

        $('select[name=plano]').change(function () {
            $.post("<?= CONF_URL_BASE ?>/admin/plano_valor.php",
                    {plano: $(this).val()},
                    function (plano) {

                        $('select[name=plano_valor]').html(plano)

                    })
        });





    });





</script>