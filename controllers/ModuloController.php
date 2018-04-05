<?php
define('second_bar', '');
class ModuloController extends LoggedController
{
  public function home(){
  try {
      //FALTAR IDENTIFICAR O USUÁRIO QUE LOGOU
      //E pegar os dados como: Nome - OIDUsuario
      $id_USUARIO = "920D9B20-8651-4D79-B433-59C828F8FB6A";
      $csTest = "Departamento de Computação";
      $usuario = UsuariosElementar::buscarUsuarioElementar($id_USUARIO);
      $this->_set("UsuarioAtual", $usuario);
      $this->_set("professorTeste", $csTest);   
      return $this->_view("index");
      
  } catch (Exception $ex) {
              $this->_flash('danger', $ex->getMessage());
              return $this->_redirect("~/new_elementar/Modulo/home");
        }
  }

  public function postTest(){
    if(is_post) {
      pre($_POST);         
      exit();
      $this->_flash('success', "Usuário cadastrado com sucesso!");
      return $this->_redirect("~/new_elementar/Modulo/home");
    }
  }

  public function salvarRespostas(){//OK
  try {
      if(is_post){   
        $respostasView = $_POST['respostasViewElementar'];
        $professoresView = $_POST['professoresViewElementar'];
        $questaoView = $_POST['questaoViewElementar'];
        $IDrespostaView = $_POST['respostaIDViewElementar'];      
        for($i=0; $i < count($respostasView); $i++){
            $respNivel = $respostasView[$i];
            $profNivel = $professoresView[$i];
            $IdQuestaoNivel = $questaoView[$i];
            $IDresposta =  $IDrespostaView[$i];          
            $update = UsuariosElementar::updateRespostas($IdQuestaoNivel, $profNivel, $respNivel, $IDresposta);                   
        }        
          return $this->_redirect("~/new_elementar/Modulo/home");
      }
    } catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");
      }
  }
  

  public function coordenadores(){//Verificar a questão do Login do Usuário para seleção do curso do Coordenador
  try {
    if(is_post){
      $cursoUsuario = $_POST['curso'];
    
      $questoesController = UsuariosElementar::allQuestoesElementar();
      $professoresController = UsuariosElementar::allProfessoresElementar($cursoUsuario);
      $respostasController = UsuariosElementar::allRespostasElementar();   
        
      $this->_set("questoes_cursosView", $questoesController);
      $this->_set("professores_cursosView", $professoresController);
      $this->_set("respostas_cursosView", $respostasController);
      $this->_set("cursoUsuarioAtual", $cursoUsuario);         
      return $this->_view("tabela-elementar");
    }
  }
    catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");
      }
  }

  public function direcaoacademica ()
  {
      try {
          if(is_post){
                $cursoUsuarioNAE = $_POST['curso'];                           
                                
                $questoesNAE = UsuariosElementar::allQuestoesElementar();
                $professoresNAE = UsuariosElementar::allProfessoresElementar($cursoUsuarioNAE);
                $respostasNAE = UsuariosElementar::allRespostasElementar();
                $cursoNAE = UsuariosElementar::CursoElementar();

                $this->_set("cursosController", $cursoNAE);                 
                $this->_set("cursoUsuarioAtual", $cursoUsuarioNAE);                
                $this->_set("questoesController", $questoesNAE);
                $this->_set("professoresController", $professoresNAE);
                $this->_set("respostasController", $respostasNAE);    
                return $this->_view("tabela-direcao-academica");
          }
          else{

                $curso = "Administração";
               
                $questoes = UsuariosElementar::allQuestoesElementar();
                $professores = UsuariosElementar::allProfessoresElementar($curso);
                $respostas = UsuariosElementar::allRespostasElementar();
                $cursoNAE = UsuariosElementar::CursoElementar();

                $this->_set("cursosController", $cursoNAE);
                $this->_set("cursoUsuarioAtual", $curso);
                $this->_set("questoesController", $questoes);
                $this->_set("professoresController", $professores);
                $this->_set("respostasController", $respostas);  
                return $this->_view("tabela-direcao-academica"); 
          }
  }
    catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");
      }
  }

  public function novaQuestao(){//verificar a inserção NÃO ESTÁ FUNCIONANDO: PRECISA ALTERAR A PROPRIEDADE DE INT PARA VARCHAR
  try {
          if(is_post){            
            $questaoNova = $_POST['questao'];
            $analiseNova = $_POST['analise'];
            $descricaoNova = $_POST['descricao'];
            $preenchida = "Nao";
            $addQuestao = UsuariosElementar::insertQuestaoElementar($questaoNova,$descricaoNova,$analiseNova,$preenchida);
            $tipoUser = "coordenador-curso";
            $atualizarCoord = UsuariosElementar::updateCoordenadorNovaQuestao($tipoUser);
            $this->_flash('success', "Questão cadastrada com sucesso!");
            return $this->_redirect("~/new_elementar/Modulo/home");
          } else{
            $questaoNova = "fernando";
            $this->_set("nova", $questaoNova);
            return $this->_view("questao-nova");
          }
  }
    catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");
      }
  }

  public function preencherQuestao(){//verificação a atualização de tudo e o usuario elementar
    try{
      if(is_post){
          $idCoordenador = "FWE-WWW";
          $resposta = $_POST['respostaQuestaoElementar'];
          $questao = $_POST['IDQuestao'];
          $codigoProfElementar = $_POST['IDProfessorElementar'];
          $codigoProfConecta = $_POST['IDProfessorConecta'];
          $analise = $_POST['AnaliseGrafico'];
            for ($i=0; $i < count($resposta); $i++) { 
              $respostaQuestao = $resposta[$i];
              $respostaIDQuestao = $questao[$i];
              $respostaIDProfElementar = $codigoProfElementar[$i];
              $respostaIDProfConecta = $codigoProfConecta[$i];
              $respostaAnalise = $analise[$i];              
              $updateResposta = UsuariosElementar::updateNovasRespostas($respostaIDQuestao, $respostaIDProfElementar, $respostaIDProfConecta, $respostaQuestao, $respostaAnalise);
              $updateQuestao = UsuariosElementar::updateQuestaoPreenchida($respostaIDQuestao);
              }
              $updateCoordenador = UsuariosElementar::updateCoordenadorQuestao($idCoordenador);              
              return $this->_redirect("~/new_elementar/Modulo/home");
          
      } else {
                
          $cursoUsuario = "Departamento de Computação";
          $professoresQuestao = UsuariosElementar::allProfessoresElementar($cursoUsuario);
          $questoesNaoPreenc = UsuariosElementar::QuestoesNaoPreenchida();
        
          $this->_set("questaoResposta", $questoesNaoPreenc);
          $this->_set("professoresResposta", $professoresQuestao);
          return $this->_view("preencher-questao");
      }
    }
    catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");
      }
  }
  
}
