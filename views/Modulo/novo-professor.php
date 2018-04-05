<div class="dashboard-alinhamento-home-apps col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="row content-head">
    <div class="column medium-centered medium-19 large-18">
        <center><h1 class="content-head_title" itemprop="headline">
        Novos Professores
        </h1></center>
    </div>
</div>

<form method="post" action="~/new_elementar/Modulo/lista_professores">
<table class="table table-bordered" id="idtabela">
          <thead>          
            <tr>
                
                <th>Nome</th>                              
            </tr>         
          </thead>
          <tbody>            
            <?php foreach ($professoresConecta as $professorConecta): ?>               
                <tr>
                <?php for ($i = 0; $i < count($professoresElementar); $i++) { ?>
                    <?php if($professorConecta->IdFuncionario !== $professoresElementar[$i]->IDProfessorConecta): ?>                   
                        <td id="myP" contenteditable="true">            
                                <?= $professorConecta->Nome ?>   
                        </td>
                    <?php endif; ?>  
                    <?php } ?>                            
                </tr>                     
            <?php endforeach; ?>
          </tbody>
      </table>
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
</div>