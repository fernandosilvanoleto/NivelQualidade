<?php

class RelatoriosElementar extends FswBaseManager
{
    public static function allRespostasElementar() {
        try {
		$sql = "SELECT * FROM NivelElementar.dbo.Respostas";
		$respostasAll = self::db()->exec($sql)->fetchAll();
		return $respostasAll;
        } catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");      
    }
	}

    public static function allQuestoesElementar() {
       try {
		$sql = "SELECT * FROM NivelElementar.dbo.Questoes";
		$questoesAll = self::db()->exec($sql)->fetchAll();
		return $questoesAll;
        } catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");      
    }
	}

    public static function CursoElementar() {
       try {
		$sql = "SELECT CursoResposta FROM NivelElementar.dbo.Respostas group by CursoResposta";
		$curso = self::db()->exec($sql)->fetchAll();
		return $curso;
        } catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");      
    }
	}

    public static function QuestoesRelatorio() {
       try {
		$sql = "SELECT NomeQuestao FROM NivelElementar.dbo.Questoes WHERE AnaliseGrafico = 0 ";
		$questao = self::db()->exec($sql)->fetchAll();
		return $questao;
        } catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");      
    }
	}

    public static function QuestoesRelatorioParcial() {
       try {
		$sql = "SELECT NomeQuestao FROM NivelElementar.dbo.Questoes WHERE AnaliseGrafico = 1 ";
		$questao = self::db()->exec($sql)->fetchAll();
		return $questao;
        } catch (Exception $ex) {
            $this->_flash('danger', $ex->getMessage());
            return $this->_redirect("~/new_elementar/Modulo/home");      
    }
	}
}
?>