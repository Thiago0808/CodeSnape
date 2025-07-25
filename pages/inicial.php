
<div class="row">

  <div class="col-lg-12">
    <h1 class="page-header">Meus Trechos <small>Encontre seus códigos rapidamente</small></h1>
  </div>
  <form action="" method="post">
    <div class="form-group">
      <label for="exampleFormControlInput1">Filtrar por Nome:</label>
      <input type="text" class="short-input form-control" id="exampleFormControlInput1" placeholder="Titulo" name="titulo" maxlength="24"
        value="<?php echo isset($_POST['titulo']) ? htmlspecialchars($_POST['titulo']) : ''; ?>">
    </div>
    <div class="form-group">
      <label for="exampleFormControlSelect1">Filtrar por Linguagens:</label>
      <select id="multi-select-language" name="linguagem[]" multiple>
        <option <?php if(in_array("Bash", $filtroLinguagens)) echo "selected"; ?>>Bash</option>
        <option <?php if(in_array("C", $filtroLinguagens)) echo "selected"; ?>>C</option>
        <option <?php if(in_array("C#", $filtroLinguagens)) echo "selected"; ?>>C#</option>
        <option <?php if(in_array("C++", $filtroLinguagens)) echo "selected"; ?>>C++</option>
        <option <?php if(in_array("CSS", $filtroLinguagens)) echo "selected"; ?>>CSS</option>
        <option <?php if(in_array("Go", $filtroLinguagens)) echo "selected"; ?>>Go</option>
        <option <?php if(in_array("HTML", $filtroLinguagens)) echo "selected"; ?>>HTML</option>
        <option <?php if(in_array("Java", $filtroLinguagens)) echo "selected"; ?>>Java</option>
        <option <?php if(in_array("JavaScript", $filtroLinguagens)) echo "selected"; ?>>JavaScript</option>
        <option <?php if(in_array("Kotlin", $filtroLinguagens)) echo "selected"; ?>>Kotlin</option>
        <option <?php if(in_array("MySQL", $filtroLinguagens)) echo "selected"; ?>>MySQL</option>
        <option <?php if(in_array("PHP", $filtroLinguagens)) echo "selected"; ?>>PHP</option>
        <option <?php if(in_array("Python", $filtroLinguagens)) echo "selected"; ?>>Python</option>
        <option <?php if(in_array("React", $filtroLinguagens)) echo "selected"; ?>>React</option>
        <option <?php if(in_array("React Native", $filtroLinguagens)) echo "selected"; ?>>React Native</option>
        <option <?php if(in_array("Ruby", $filtroLinguagens)) echo "selected"; ?>>Ruby</option>
        <option <?php if(in_array("Rust", $filtroLinguagens)) echo "selected"; ?>>Rust</option>
        <option <?php if(in_array("Shell", $filtroLinguagens)) echo "selected"; ?>>Shell</option>
        <option <?php if(in_array("TypeScript", $filtroLinguagens)) echo "selected"; ?>>TypeScript</option>
      </select>
    </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Filtrar por Tags:</label>
        <select id="multi-select-tag" name="tag[]" multiple>
            <?php foreach ($tags as $tag): ?>
                <option <?php if(in_array("$tag->id", $filtroTags)) echo "selected"; ?> value="<?= $tag->id ?>"><?= $tag->tag ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
      <button type="submit" class="btn btn-dark">Filtrar</button>
    </div>
  </form>
  

</div>

<hr>
<div class="row">

  <?php
  $tagsMap = [];
  foreach ($tags as $tag) {
      $tagsMap[$tag->id] = $tag;
  }

  foreach ($trechos as $t){
    echo "<div class='col-md-4 portfolio-item'>";
      echo "<code class='code_inicial'>$t->texto</code>";
      echo "<h3><a href='?p=verTrecho&id=$t->id'>$t->titulo</a></h3>";
      echo "<p>$t->linguagens</p>";

      
      if (!empty($t->tag_ids)) {
        foreach ($t->tag_ids as $tagId) {
          if (isset($tagsMap[$tagId])) {
            $tagObj = $tagsMap[$tagId];
            echo "<h4 class='tag tag-pequena' style='background-color: {$tagObj->color}'>" . htmlspecialchars($tagObj->tag) . "</h4>";
          }
        }
      }

      echo "<div class='botoes'>";
        echo "<a href='?p=deletarTrecho&id=$t->id'><button type='button' class='btn btn-dark'>Deletar</button></a>";
        echo "<a href='?p=editarTrecho&id=$t->id'><button type='button' class='btn btn-outline-dark'>Editar</button></a>";
      echo "</div>";  
    echo "</div>";
  }
  ?>

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

