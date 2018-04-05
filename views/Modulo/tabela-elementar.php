<div class="dashboard-alinhamento-home-apps col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h2><center>Preencher questões referentes as funcionalidades dos professores!</center></h2>

        <a href="~/new_elementar/Modulo/home" 
        class="btn btn-primary success btn-lg active" style="width: 180px; height: 45px;" role="button">Início do Módulo</a>

<div class="col-lg-12">
    <h1><center>Curso: <?= $cursoUsuarioAtual ?></center></h1><br>

<input type="text" class="form-control" id="myFilterProfessor" onkeyup="myFunction()" placeholder="Filtrar professor..." title="Filtrar professor">
     
<form method="post" action="~/new_elementar/Modulo/salvarRespostas">
<div class="zui-wrapper">
<div class="zui-scroller">   
    <table class="zui-table" id="idtabela">
          <thead>          
            <tr>
            <th class="zui-sticky-td">Professores/Questões</th>
              <?php if(isset($questoes_cursosView) && !empty($questoes_cursosView)): ?>
                <?php foreach ($questoes_cursosView as $questoesView): ?>
                    <?php if($questoesView->Preenchida == 0): ?>
                        <th style="text-align: center;"><?= $questoesView->NomeQuestao ?></th>
                    <?php endif; ?>
                <?php endforeach; ?>                  
              <?php endif; ?>                    
            </tr>         
          </thead>
          <tbody>
            <?php foreach ($professores_cursosView as $professorView): ?>
            <tr>
            <td class="zui-sticky-col"><?= $professorView->NomeProfessor ?></td>			
                <?php foreach ($respostas_cursosView as $respostaView): ?>
                        <?php if($professorView->IDProfessorConecta == $respostaView->IDProfConecta): ?>
                            <?php if($professorView->CursoProfessor == $respostaView->CursoResposta): ?>                                        <!--Fazer esse tratamento no SQL: selecionar professor e resposta de um curso somente-->
                            <?php if($respostaView->AnaliseGraficoRes == 0): ?>
                                <td>
                                    <center><select class="form-control" style="width: 100px;" name="respostasViewElementar[]">
                                        <option value="<?= $respostaView->RespostaQuestao ?>"><?= $respostaView->RespostaQuestao ?></option>
                                        <?php if($respostaView->RespostaQuestao == "Sim"): ?>
                                            <option value="Não">Não</option>                            
                                        <?php else: ?>
                                            <option value="Sim">Sim</option>
                                        <?php endif; ?>                                       
                                    </select></center>
                                    <input type="hidden" name="professoresViewElementar[]" value="<?= $professorView->IDProfessorConecta ?>">
                                    <input type="hidden" name="questaoViewElementar[]" value="<?= $respostaView->IDQuestao ?>">
                                    <input type="hidden" name="respostaIDViewElementar[]" value="<?= $respostaView->OIDResposta ?>">
                                </td>
                            <?php endif; ?>
                            <?php if($respostaView->AnaliseGraficoRes == 1): ?>
                                <td>
                                    <center><select class="form-control" style="width: 100px;" name="respostasViewElementar[]">
                                        <option value="<?= $respostaView->RespostaQuestao ?>"><?= $respostaView->RespostaQuestao ?></option>
                                        <?php if($respostaView->RespostaQuestao == "Sim"): ?>
                                            <option value="Não">Não</option>
                                            <option value="Parcialmente">Parcialmente</option>                            
                                        <?php endif; ?>
                                        <?php if($respostaView->RespostaQuestao == "Não"): ?>
                                            <option value="Sim">Sim</option>
                                            <option value="Parcialmente">Parcialmente</option>                            
                                        <?php endif; ?>
                                        <?php if($respostaView->RespostaQuestao == "Parcialmente"): ?>
                                            <option value="Sim">Sim</option>
                                            <option value="Não">Não</option>                            
                                        <?php endif; ?>                                         
                                    </select></center>
                                    <input type="hidden" name="professoresViewElementar[]" value="<?= $professorView->IDProfessorConecta ?>">
                                    <input type="hidden" name="questaoViewElementar[]" value="<?= $respostaView->IDQuestao ?>">
                                    <input type="hidden" name="respostaIDViewElementar[]" value="<?= $respostaView->OIDResposta ?>">
                                </td>
                            <?php endif; ?>
                            <?php if($respostaView->AnaliseGraficoRes == 2): ?>
                                <td id="myP" contenteditable="true">
                                        <input type="text" style="Border:0; text-align: center;" name="respostasViewElementar[]" value="<?= $respostaView->RespostaQuestao ?>">                                
                                        <input type="hidden" name="professoresViewElementar[]" value="<?= $professorView->IDProfessorConecta ?>">
                                        <input type="hidden" name="questaoViewElementar[]" value="<?= $respostaView->IDQuestao ?>">
                                        <input type="hidden" name="respostaIDViewElementar[]" value="<?= $respostaView->OIDResposta ?>">
                                </td>
                            <?php endif; ?>
                            <?php if($respostaView->AnaliseGraficoRes == 3): ?>
                                <td style="text-align: center;"></center><?= $respostaView->RespostaQuestao ?></center>
                                        <input type="hidden" style="Border:0; text-align: center;" name="respostasViewElementar[]" value="<?= $respostaView->RespostaQuestao ?>">                                
                                        <input type="hidden" name="professoresViewElementar[]" value="<?= $professorView->IDProfessorConecta ?>">
                                        <input type="hidden" name="questaoViewElementar[]" value="<?= $respostaView->IDQuestao ?>">
                                        <input type="hidden" name="respostaIDViewElementar[]" value="<?= $respostaView->OIDResposta ?>">
                                </td>
                            <?php endif; ?>
                           <?php endif; ?> 
                        <?php endif; ?>
                <?php endforeach; ?>                                     
            </tr>
            <?php endforeach; ?>
          </tbody>
      </table>
      
</div>
</div>
    <br><br>
    <center>  
      <button type="submit" class="btn btn-primary" style="width: 120px; margin:70px;">Salvar Tabela</button>
      <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg" style="width: 120px;">Cancelar</button>
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            Desejar cancelar?
            <br><br>
            <button type="reset" class="btn btn-danger" data-toggle="modal" data-target=".bs-example-modal-lg" style="width: 120px;" onclick="location.href='~/new_elementar/Modulo/home';">Sim</button>            
            <br><br>
            </div>
        </div>        
        </div>
    </center>      
</form>             
</div>
</div>

<script type="text/javascript">
      var x = document.getElementById("myP").contentEditable;       
      function myFunction() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("myFilterProfessor");
        filter = input.value.toUpperCase();
        table = document.getElementById("idtabela");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
        }

        $(document).ready(function () {
        $("#btnExport").click(function () {
            $("#idtabela").btechco_excelexport({
                containerid: "idtabela"
               , datatype: $datatype.Table
               , filename: 'sample'
            });
            });
        });
</script>

<style>
          .zui-table {
              border: none;
              border-right: solid 1px #DDEFEF;
              border-collapse: separate;
              border-spacing: 0;
              font: normal 13px Arial, sans-serif;
          }
          .zui-table thead th {
              background-color: #DDEFEF;
              border: none;
              color: #336B6B;
              padding: 10px;
              text-align: left;
              text-shadow: 1px 1px 1px #fff;
              white-space: nowrap;
          }
          .zui-table tbody td {
              border-bottom: solid 1px #DDEFEF;
              color: #333;
              padding: 9px;
              text-shadow: 1px 1px 1px #fff;
              white-space: nowrap;
          }
          .zui-wrapper {
              position: relative;
          }
          .zui-scroller {
              margin-left: 141px;
              overflow-x: scroll;
              overflow-y: visible;
              padding-bottom: 5px;
              width: 1000px;
          }
          .zui-table .zui-sticky-col {
              border-left: solid 1px #DDEFEF;
              border-right: solid 1px #DDEFEF;
              left: -80px;
              height: 53px;                        
              position: absolute;
              top: auto;
              width: 220px;                
          }
          .zui-table .zui-sticky-td {
              border-left: solid 1px #DDEFEF;
              border-right: solid 1px #DDEFEF;
              left: -80px;                        
              position: absolute;
              top: auto;
              width: 220px;                
          }
          #myFilterProfessor {
            background-repeat: no-repeat;
            width: 50%;
            left: -100px;
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            }       
</style>
