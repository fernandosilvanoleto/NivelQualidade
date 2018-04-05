<?php
define('second_bar', '');
class RelatoriosController extends LoggedController
{
    public function respostas_sim(){
    try {
        $respostasModel = RelatoriosElementar::allRespostasElementar();
        $questoesModel = RelatoriosElementar::allQuestoesElementar();
        $cursosModel = RelatoriosElementar::CursoElementar();
        $questoesNivelElementar = RelatoriosElementar::QuestoesRelatorio();

        $CursoController = $cursosModel;      
        $dadosController = array();        
        
        for ($i=0; $i < count($CursoController); $i++) { 
            foreach ($questoesModel as $ques):
                        $contSim = 0;           
                        $nomeQuestao = " ";
                        $nomeCurso = " ";
                        foreach ($respostasModel as $resp):
                        if($CursoController[$i]->CursoResposta == $resp->CursoResposta):           
                            if(($ques->OIDQuestao == $resp->IDQuestao) AND ($ques->AnaliseGrafico == $resp->AnaliseGraficoRes)):                                            
                                    if($resp->AnaliseGraficoRes == 0):
                                        if($resp->RespostaQuestao == "Sim"):
                                            $contSim = $contSim + 1;                        
                                        endif;
                                        $nomeQuestao = $ques->NomeQuestao;
                                        $nomeCurso = $resp->CursoResposta;
                                    endif;
                        endif;      
                        endif;                                
                        endforeach;            
                        if($nomeQuestao !== " "):            
                            array_push($dadosController, 
                                array('questao'=> $nomeQuestao,'curso'=>$nomeCurso,'valor'=>$contSim)
                                );                                     
                        endif;          
                    endforeach;
        }  
        $this->_set("dadosGeral", $dadosController);
        $this->_set("questaoView", $questoesNivelElementar);
        return $this->_view("modelo-1");
    
    } catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");      
    }
    }

public function respostas_parciais(){
    try {
        $respostasModel = RelatoriosElementar::allRespostasElementar();
        $questoesModel = RelatoriosElementar::allQuestoesElementar();
        $cursosModel = RelatoriosElementar::CursoElementar();
        $questoesNivelElementar = RelatoriosElementar::QuestoesRelatorioParcial();

        $CursoController = $cursosModel;        
        $dadosController = array();        
        
        for ($i=0; $i < count($CursoController); $i++) { 
            foreach ($questoesModel as $ques):
                        $contSim = 0;
                        $contParcialmente = 0;           
                        $nomeQuestao = " ";
                        $nomeCurso = " ";
                        foreach ($respostasModel as $resp):
                        if($CursoController[$i]->CursoResposta == $resp->CursoResposta):           
                            if(($ques->OIDQuestao == $resp->IDQuestao) AND ($ques->AnaliseGrafico == $resp->AnaliseGraficoRes)):                                            
                                    if($resp->AnaliseGraficoRes == 1):
                                        if($resp->RespostaQuestao == "Sim"):
                                            $contSim = $contSim + 1;
                                            elseif($resp->RespostaQuestao == "Parcialmente"):
                                                $contParcialmente = $contParcialmente + 1;                     
                                        endif;
                                        $nomeQuestao = $ques->NomeQuestao;
                                        $nomeCurso = $resp->CursoResposta;
                                    endif;
                        endif;      
                        endif;                                
                        endforeach;            
                        if($nomeQuestao !== " "):
                            array_push($dadosController, 
                                array('questao'=> $nomeQuestao,'curso'=>$nomeCurso,'valorSim'=>$contSim, 'valorParcialmente'=> $contParcialmente)
                                );                                   
                        endif;          
                    endforeach;
        }
        $this->_set("questaoView", $questoesNivelElementar);
        $this->_set("dadosGeral", $dadosController);       
        return $this->_view("modelo-2");
    
    } catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");      
    }
    }
}