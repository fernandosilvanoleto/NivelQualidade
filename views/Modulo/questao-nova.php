<div class="dashboard-alinhamento-home-apps col-lg-12 col-md-12 col-sm-12 col-xs-12">
<div class="row content-head">
    <div class="column medium-centered medium-19 large-18">
        <center><h1 class="content-head_title" itemprop="headline">
        Adicionar nova questão!
        </h1></center>
    </div>
</div>
<div class="col-lg-8">
<form method="post" action="~/new_elementar/Modulo/novaQuestao">
    <div class="form-group">
        <label for="Questão">Questão<span class="required"></span></label>
            <input type="text" name="questao" id="questao" class="form-control">
    </div>
    <div class="form-group" width="20px">
        <label for="Analise">Questão que contém respostas:<span class="required"></span></label>
        <select class="form-control" name="analise">
            <option value="0">Sim ou Não</option>
            <option value="1">Sim, Não ou Parcialmente</option>
            <option value="2">Livre</option>         
        </select>
    </div>
    <div class="form-group">
        <label for="Descrição">Descrição<span class="required"></span></label>
            <textarea class="form-control" rows="3" name="descricao"></textarea>
    </div>
    <button type="submit" class="btn btn-success" style="width: 150px; height: 45px; margin:70px;">Adicionar Questão</button>
    <button type="reset" class="btn btn-danger" style="width: 150px; height: 45px;" onclick="location.href='~/new_elementar/Modulo/home';">Cancelar</button>
</form>
</div>
</div>