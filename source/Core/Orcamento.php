<?php


namespace Source\Core;

class Orcamento {
    
    private $filtro;
    
    public function __construct() {
        $filtro = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        
        $this->filtro = $filtro;
    }
    
    public function enviarEmail() {
        
        if($this->filtro["modo"] == "email"){
            
           $view = new \Source\Models\View(__DIR__ . "/../../themes/views/email");
           $message = $view->render("mail", [
               "message" => $this->filtro["mensagem"]
               
           ]);
            
            $email = new \Source\Support\Email();
            $email->bootstrap(
                    $this->filtro["assunto"], 
                    $message, 
                    $this->filtro["destinatario"], 
                    $this->filtro["nome"])->send($this->filtro["remetente"]);
            
            if($email->send()){
                echo "<div class=\"alert alert-success col-md-12\" role=\"alert\">
                <h5>Orçamento Enviado com Sucesso </h5>  </div>";
                
                $Dados = [
                    "user_id" => $_SESSION["user_id"],
                    "nome" => $this->filtro["nome"],
                    "email" => $this->filtro["destinatario"],
                    "modo" => "email",
                    "mensagem" => $this->filtro["mensagem"],
                    "date" => date("Y-m-d H:i:s")
                ];
                
                $cad = new \Source\Models\Create();
                $cad->ExeCreate("app_orcamento", $Dados);
                
               //var_dump($Dados);
                
            }else{
                echo "<div class=\"alert alert-success col-md-12\" role=\"alert\">
                <h5>Erro ao enviar mensagem </h5>  </div>"; 
            }
 
           // var_dump($this->filtro);
        }
    }
    
    public function whatsapp() {
        
        if($this->filtro["modo"] == "whatsapp"){
            
            $Dados = [
                "nome" => $this->filtro["nome"],
                "user_id" => $_SESSION["user_id"],
                "telefone" => $this->filtro["telefone"],
                "mensagem" => $this->filtro["mensagem"],
                "modo" => "whatsapp",
                "date" => date("Y-m-d H:i:s")     
            ];
            
            $cad = new \Source\Models\Create();
            $cad->ExeCreate("app_orcamento", $Dados);
            $cad->getResult();
            
            if($cad->getResult()){
               echo "<div class=\"alert alert-success col-md-12\" role=\"alert\">
                <h5>Mensagem criada com sucesso .</h5>  </div>";  
            }else{
               echo "<div class=\"alert alert-danger col-md-12\" role=\"alert\">
                <h5>Erro ao criar mensagem .</h5>  </div>";    
            }
            
            
           // var_dump($this->filtro , $Dados);
        }
        
    }
    
    
    
}
