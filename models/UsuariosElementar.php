<?php

class UsuariosElementar extends FswBaseManager
{
  
  //exemplo
  public static function singleByLoginESenha($login, $senha) {
		$sql = 'SELECT * FROM view_usuario_pessoa WHERE Login = ? AND Senha = ?';
		$usuario = self::db()->exec($sql, array($login, $senha))->fetch();
        return $usuario;
	}

//function home()
	public static function buscarUsuarioElementar($identificacao)
	{
		try{
			$sql = "SELECT * FROM NivelElementar.dbo.UsuarioElementar WHERE IDUsuarioConecta = ?";
			$coordenador = self::db()->exec($sql, array($identificacao))->fetch();
			return $coordenador;
		}catch (Exception $ex) {
            throw new Exception($ex);
        }
	}

//function salvarRespostas()
	public static function updateRespostas($questao, $professor, $resposta, $idresposta)
	{
		try
		{
			$sql = 'UPDATE NivelElementar.dbo.Respostas SET RespostaQuestao = ? WHERE IDQuestao = ? AND IDProfConecta = ? AND OIDResposta = ?';
			$cont = self::db()->exec($sql, array($resposta, $questao, $professor, $idresposta))->rowCount();
            return $cont;
		}catch (Exception $ex) {
            throw new Exception($ex);
        }
	}

//function coordenadores()
	public static function allQuestoesElementar() {
		$sql = "SELECT * FROM NivelElementar.dbo.Questoes";
		$QuestoesAll = self::db()->exec($sql)->fetchAll();
		return $QuestoesAll;
	}

	public static function allProfessoresElementar($curso) {//usa também na function preencherQuestao
		$sql = "SELECT * FROM NivelElementar.dbo.Professor_Elementar WHERE CursoProfessor = ?";
		$ProfessoresAll = self::db()->exec($sql, array($curso))->fetchAll();
		return $ProfessoresAll;
	}

	public static function allRespostasElementar() {//testar a seleção por curso... Igual ao de allProfessorElementar
		$sql = "SELECT * FROM NivelElementar.dbo.Respostas";
		$RespostasAll = self::db()->exec($sql)->fetchAll();
		return $RespostasAll;
	}

//function direcaoacademica()
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

//function novaQuestao()
	public static function insertQuestaoElementar($questao, $descricao, $analise, $preenchida)
	{
		try
		{
			$sql = "INSERT INTO NivelElementar.dbo.Questoes (NomeQuestao, DescricaoQuestao, AnaliseGrafico, Preenchida) VALUES (?, ?, ?, ?)";
			$result = self::db()->exec($sql, array($questao, $descricao, $analise, $preenchida))->rowCount();
			return $result;
		} catch (Exception $ex) {
            throw new Exception($ex);
        }
	}

	public static function updateCoordenadorNovaQuestao($tipoUser)
	{
		try
		{
			$updateCoord = "UPDATE NivelElementar.dbo.UsuarioElementar SET NovaQuestao = 'Sim' WHERE TipoUsuario = ?";
        	$result = self::db()->exec($updateCoord, array($tipoUser))->rowCount();
			return $result;
		} catch (Exception $ex) {
            throw new Exception($ex);
        }
	}
	

//function preencherQuestao()
	public static function QuestoesNaoPreenchida (){
		$sql = "SELECT * FROM NivelElementar.dbo.Questoes WHERE Preenchida = 1";
		$dados = self::db()->exec($sql)->fetchAll();
		return $dados;
	}

	public static function updateNovasRespostas($IDQuestao, $IDProfElementar, $IDProfConecta, $respostaQuestao, $Analise)
	{
		try
		{
			$sql = "INSERT INTO NivelElementar.dbo.Respostas (IDQuestao, IDProfessorElementar, IDProfConecta, RespostaQuestao, AnaliseGraficoRes) VALUES (?,?,?,?,?); ";
			$cont = self::db()->exec($sql, array($IDQuestao, $IDProfElementar, $IDProfConecta, $respostaQuestao, $Analise))->rowCount();
            return $cont;
		}catch (Exception $ex) {
            throw new Exception($ex);
        }
	}

	public static function updateQuestaoPreenchida($idQues)
	{
		try
		{
			$update = "UPDATE NivelElementar.dbo.Questoes SET Preenchida = 0 WHERE OIDQuestao = ?";
        	$result = self::db()->exec($update, array($idQues))->rowCount();
			return $result;
		} catch (Exception $ex) {
            throw new Exception($ex);
        }
	}

	public static function updateCoordenadorQuestao($idCoorde)
	{
		try
		{
			$sql = 'UPDATE NivelElementar.dbo.UsuarioElementar SET NovaQuestao = 0 WHERE IDUsuarioConecta = ?';
        	$result = self::db()->exec($sql, array($idCoorde))->rowCount();
			return $result;
		} catch (Exception $ex) {
            throw new Exception($ex);
        }
	}

//function lista_professores()
	public static function allProfessoresElementarAll() {
		$sql = "SELECT * FROM NivelElementar.dbo.Professor_Elementar";
		$ProfessoresElementar = self::db()->exec($sql)->fetchAll();
		return $ProfessoresElementar;
	}

	public static function allProfessoresConecta() {
		$sql = "SELECT * FROM PortalEnsino.dbo.ViewCursoFuncionario";
		$ProfessoresConecta = self::db()->exec($sql)->fetchAll();
		return $ProfessoresConecta;
	}




	


//exemplos de SQL
	public static function allResp2 (){
		$sql = "SELECT * FROM Respostas_Nivel r INNER JOIN Professor_Nivel p ON r.Id_ProfessorElementar = p.Id_Professor
		INNER JOIN Questao_Nivel q ON r.Id_QuestaoElementar = q.Id_Questao";
		$cursosAll = self::db()->exec($sql)->fetchAll();
        return $cursosAll;
	}

	public static function allCursos() {
		$sql = "SELECT * FROM Nivel_Elementar";
		$cursosAll = self::db()->exec($sql)->fetchAll();
        return $cursosAll;
	}

	public static function updateElementar($IdResposta, $IdQuestao, $IdProfessor, $resposta)
	{
		self::db('elementar')->beginTransaction();
		$sql = "UPDATE Respostas_Nivel SET Resposta_Elementar = ? WHERE Id_Resposta = ? AND Id_QuestaoElementar = ? AND Id_ProfessorElementar = ?";
        $query = self::db('elementar', null)->exec($sql, array($resposta, $IdResposta, $IdQuestao, $IdProfessor))->rowCount();
		if ($query == 1) {
            self::db('elementar')->commit();
        } else {
            self::db('elementar')->rollBack();
        }
        return $query;
	}	
}
?>
