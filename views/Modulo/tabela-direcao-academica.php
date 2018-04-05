<div class="dashboard-alinhamento-home-apps col-lg-12 col-md-12 col-sm-12 col-xs-12">
<h2><center>Respostas do Nível Elementar de Qualidade por curso</center></h2><br>

<div class="row">   
        <form method="post" action="~/new_elementar/Modulo/direcaoacademica">
        <div class="col-md-3">      
           <select class="form-control" style="width: 250px;" name="curso">
                <?php foreach ($cursosController as $cursoSelecao): ?>
                    <option value="<?= $cursoSelecao->CursoResposta ?>"><?= $cursoSelecao->CursoResposta ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2">          
        <button type="submit" class="btn btn-success" style="width: 180px; height: 45px;">Buscar Curso</button>
        </div>
        <div class="col-md-7">
        <center>
        <a href="~/new_elementar/Modulo/home" 
        class="btn btn-primary success btn-lg active" style="width: 180px; height: 45px;" role="button">Início do Módulo</a>
        </center>
        </div>
        </form>
</div><br>
<div class="col-lg-12">
    <h1><center>Curso: <?= $cursoUsuarioAtual ?></center></h1>
<br><br>
<input type="text" class="form-control" id="myFilterProfessor" onkeyup="myFunction()" 
placeholder="Filtrar professor..." title="Filtrar professor">
<div class="zui-wrapper">
<div class="zui-scroller">
        <table class="zui-table" id="idtabela">
          <thead>          
            <tr>
            <th class="zui-sticky-td">Professores/Questões</th>
              <?php if(isset($questoesController) && !empty($questoesController)): ?>
                <?php foreach ($questoesController as $questoesView): ?>
                    <?php if($questoesView->Preenchida == 0): ?>
                        <th style="text-align: center;"><?= $questoesView->NomeQuestao ?></th>
                    <?php endif; ?>
                <?php endforeach; ?>                  
              <?php endif; ?>                    
            </tr>         
          </thead>
          <tbody>
            <?php foreach ($professoresController as $professorView): ?>
            <tr>
            <td class="zui-sticky-col"><?= $professorView->NomeProfessor ?></td>			
                <?php foreach ($respostasController as $respostaView): ?>
                <?php if($professorView->IDProfessorConecta == $respostaView->IDProfConecta): ?>       
                    <td style="text-align: center;"><?= $respostaView->RespostaQuestao ?></td>           
                <?php endif; ?>
                <?php endforeach; ?>                                     
            </tr>
            <?php endforeach; ?>
          </tbody>
      </table>      
</div>
</div>
          
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
              height: 34px;                        
              position: absolute;
              top: auto;
              width: 222px;                
          }
          .zui-table .zui-sticky-td {
              border-left: solid 1px #DDEFEF;
              border-right: solid 1px #DDEFEF;
              left: -80px;
                                      
              position: absolute;
              top: auto;
              width: 222px;                
          }
          #myFilterProfessor {
            background-repeat: no-repeat;
            width: 60%;
            
            font-size: 16px;
            padding: 12px 20px 12px 40px;
            border: 1px solid #ddd;
            margin-bottom: 12px;
            }       
</style>
