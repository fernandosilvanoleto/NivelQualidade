
<div class="dashboard-alinhamento-home-apps col-lg-12 col-md-12 col-sm-12 col-xs-12">
<center><h1>Relatório do Nível Elementar</h1></center>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<div class="row">  
  <center>
      <a href="~/new_elementar/Modulo/home" 
      class="btn btn-primary btn-lg active" style="width: 280px; margin:50px;" role="button">Início do Módulo</a>
      <a href="~/new_elementar/Relatorios/respostas_sim" 
      class="btn btn-success btn-lg active" style="width: 280px;" role="button">Questões de Sim/Não</a>
  </center>   
</div><br>
<p><h2>Questões referentes as respostas Sim/Não/Parcialmente</h2></p>
<p><h6>Observação: Respostas com respostas "Não" aparecem no gráfico como análise</h6></p><br>

<?php for ($i=0; $i < count($questaoView); $i++) { ?>
<div class="row">    
    <div style="width: 100px; height: 350px;">
    <div id="graficos_professores<?= $i ?>" style="width: 1150px; height: 300px;"></div>
          <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = google.visualization.arrayToDataTable([
                    [' ', 'Sim', 'Parcialmente'],
                    <?php for ($j=0; $j < count($dadosGeral); $j++) { ?>
                        <?php if($questaoView[$i]->NomeQuestao == $dadosGeral[$j]["questao"]): ?>                      
                            ['<?= $dadosGeral["$j"]["curso"] ?>', <?= $dadosGeral[$j]["valorSim"] ?>, <?= $dadosGeral[$j]["valorParcialmente"] ?>],
                        <?php endif; ?>
                    <?php } ?>                                
                  ]);

                  var options = {
                    chart: {
                      title: '<?= $questaoView[$i]->NomeQuestao ?>',
                      subtitle: 'Nível Elementar de Qualidade',
                    }
                  };

                  var chart = new google.charts.Bar(document.getElementById('graficos_professores<?= $i ?>'));

                  chart.draw(data, google.charts.Bar.convertOptions(options));
                }
            </script>
      </div>  
  </div>
<?php } ?>
</div>