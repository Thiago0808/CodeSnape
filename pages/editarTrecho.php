<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Adicionar <small>Novo Trecho</small></h1>
    </div>
    
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Trecho:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" name="titulo" value="<?=$t->titulo?>">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Linguagem</label>
            <select class="form-control" id="exampleFormControlSelect1" name="linguagem" >
                <option>HTML</option>
                <option <?php if($t->linguagem == "CSS"){echo "selected";}?> >CSS</option>
                <option <?php if($t->linguagem == "PHP"){echo "selected";}?> >PHP</option>
                <option <?php if($t->linguagem == "JavaScript"){echo "selected";}?> >JavaScript</option>
                <option <?php if($t->linguagem == "MySQL"){echo "selected";}?> >MySQL</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Trecho</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="texto"><?=$t->texto?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

