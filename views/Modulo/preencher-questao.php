<div class="dashboard-alinhamento-home-apps col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="row content-head">
    <div class="column medium-centered medium-19 large-18">
        <center><h1 class="content-head_title" itemprop="headline">
        Responder a nova questao
        </h1></center>
    </div>
</div>

<form method="post" action="~/new_elementar/Modulo/preencherQuestao">
<div class="zui-wrapper">
<div class="zui-scroller">    
    <table class="zui-table" id="idtabela">
          <thead>          
            <tr>
            <th class="zui-sticky-td">Professores/Novas Questões</th>
              <?php if(isset($questaoResposta) && !empty($questaoResposta)): ?>
                <?php foreach ($questaoResposta as $questao): ?>
                  <th style="text-align: center;"><?= $questao->NomeQuestao ?></th>
                <?php endforeach; ?>                  
              <?php endif; ?>                    
            </tr>         
          </thead>
          <tbody>
            <?php foreach ($professoresResposta as $professor): ?>
            <tr>
            <td class="zui-sticky-col"><?= $professor->NomeProfessor ?></td>			
                <?php foreach ($questaoResposta as $questaoAdd): ?>                
                    <td id="myP" contenteditable="true">
                    <?php if($questaoAdd->AnaliseGrafico == 0): ?>
                            <center><select class="form-control" style="width: 100px;" name="respostaQuestaoElementar[]">
                                    <option value="Sim">Sim</option>                                
                                    <option value="Não">Não</option>                                                                    
                            </select></center>                            
                    <?php endif; ?>
                    <?php if($questaoAdd->AnaliseGrafico == 1): ?>
                            <center><select class="form-control" style="width: 100px;" name="respostaQuestaoElementar[]">
                                    <option value="Sim">Sim</option>                                
                                    <option value="Não">Não</option>
                                    <option value="Parcialmente">Parcialmente</option>                                                                    
                            </select></center>                            
                    <?php endif; ?>
                    <?php if($questaoAdd->AnaliseGrafico == 2): ?>
                            <input type="text" name="respostaQuestaoElementar[]" value=" ">                            
                    <?php endif; ?>
                            <input type="hidden" name="IDQuestao[]" value="<?= $questaoAdd->OIDQuestao ?>">
                            <input type="hidden" name="IDProfessorElementar[]" value="<?= $professor->OIDProfessorElementar ?>">
                            <input type="hidden" name="IDProfessorConecta[]" value="<?= $professor->IDProfessorConecta ?>">
                            <input type="hidden" name="AnaliseGrafico[]" value="<?= $questaoAdd->AnaliseGrafico ?>">
                    </td>              
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
              left: -50px;
              height: 53px;                        
              position: absolute;
              top: auto;
              width: 190px;                
          }
          .zui-table .zui-sticky-td {
              border-left: solid 1px #DDEFEF;
              border-right: solid 1px #DDEFEF;
              left: -50px;                        
              position: absolute;
              top: auto;
              width: 190px;                
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
</div>