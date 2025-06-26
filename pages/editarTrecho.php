<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Editar <small>Trecho</small></h1>
    </div>
    
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Trecho:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" name="titulo" value="<?=$t->titulo?>" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Linguagens:</label>
            <select id="multi-select-language" name="linguagem[]" multiple required>
                <option <?php if(in_array("Bash", $selecionadas)) echo "selected"; ?>>Bash</option>
                <option <?php if(in_array("C", $selecionadas)) echo "selected"; ?>>C</option>
                <option <?php if(in_array("C#", $selecionadas)) echo "selected"; ?>>C#</option>
                <option <?php if(in_array("C++", $selecionadas)) echo "selected"; ?>>C++</option>
                <option <?php if(in_array("CSS", $selecionadas)) echo "selected"; ?>>CSS</option>
                <option <?php if(in_array("Go", $selecionadas)) echo "selected"; ?>>Go</option>
                <option <?php if(in_array("HTML", $selecionadas)) echo "selected"; ?>>HTML</option>
                <option <?php if(in_array("Java", $selecionadas)) echo "selected"; ?>>Java</option>
                <option <?php if(in_array("JavaScript", $selecionadas)) echo "selected"; ?>>JavaScript</option>
                <option <?php if(in_array("Kotlin", $selecionadas)) echo "selected"; ?>>Kotlin</option>
                <option <?php if(in_array("MySQL", $selecionadas)) echo "selected"; ?>>MySQL</option>
                <option <?php if(in_array("PHP", $selecionadas)) echo "selected"; ?>>PHP</option>
                <option <?php if(in_array("Python", $selecionadas)) echo "selected"; ?>>Python</option>
                <option <?php if(in_array("Ruby", $selecionadas)) echo "selected"; ?>>Ruby</option>
                <option <?php if(in_array("Rust", $selecionadas)) echo "selected"; ?>>Rust</option>
                <option <?php if(in_array("Shell", $selecionadas)) echo "selected"; ?>>Shell</option>
                <option <?php if(in_array("TypeScript", $selecionadas)) echo "selected"; ?>>TypeScript</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tags:</label>
            <select id="multi-select-tag" name="tag[]" multiple>
                <?php foreach ($tags as $tag): ?>
                    <option <?php if(in_array("$tag->id", $t->tags)) echo "selected"; ?> value="<?= $tag->id ?>"><?= $tag->tag ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Trecho</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="texto" ><?=$t->texto?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('multi-select-language');
    const choices = new Choices(element, {
      removeItemButton: true,
      searchEnabled: true,
      placeholderValue: 'Selecione as linguagens',
      noResultsText: 'Nenhum resultado',
      itemSelectText: '',
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('multi-select-tag');
    const choices = new Choices(element, {
      removeItemButton: true,
      searchEnabled: true,
      placeholderValue: 'Selecione as tags',
      noResultsText: 'Nenhum resultado',
      itemSelectText: '',
    });
  });
</script>

