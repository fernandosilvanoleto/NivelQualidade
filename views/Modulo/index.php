<div class="dashboard-alinhamento-home-apps col-lg-12 col-md-12 col-sm-12 col-xs-12">
<p><div class="col-md-8">Bem vindo, <?= $UsuarioAtual->NomeUsuario ?></div></p>
<br>
<?php if($UsuarioAtual->TipoUsuario == 'coordenador-curso'): ?>
    <h5>Tipo de Usuário: Coordenador</h5>
<?php else: ?>
    <h5>Tipo de Usuário: Direção Acadêmica</h5>
<?php endif; ?>
<br><br>
<h2><center>Módulo de Nível Elementar de Qualidade</center></h2>
<div class="row">
  <?php if($UsuarioAtual->TipoUsuario == 'coordenador-curso'): ?>
    <div class="col-lg-2">
      <form method="post" action="~/new_elementar/Modulo/coordenadores">
      <input type="hidden" name="curso" value="<?= $professorTeste ?>">  
        <button type="submit" class="btn btn-default" alt="Gerenciar Tabela" style="width: 130px; height: 130px; margin:30px;" 
        title="Gerenciar Tabelas"></button>
      </form>
<h4><center>Editar Tabela</center></h4>
    </div>
  <?php else: ?>
    <div class="col-lg-2">     
        <a href="~/new_elementar/Modulo/direcaoacademica">
          <div class="icone" style="text-align: center; margin:30px;">
            <img src="" alt="Nova Questão" style="width: 130px; height: 130px;" 
            class="img-thumbnail" title="Visualizar em tabela"/>
          </div>  
    </a>
    <h4><center>Visualizar Tabela</center></h4>  
    </div>

  <div class="col-lg-2">
  <a href="~/new_elementar/Relatorios/respostas_sim">
        <div class="icone" style="text-align: center; margin:30px;">
          <img src="" alt="Relatórios" style="width: 130px; height: 130px;"
          class="img-thumbnail" title="Relatórios de professores"/>
        </div>  
  </a>
  <h4><center>Visualizar Relatórios</center></h4> 
</div>
<?php endif; ?> 
</div>
</div>