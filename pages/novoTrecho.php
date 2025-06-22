<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Adicionar <small>Novo Trecho</small></h1>
    </div>
    
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Trecho:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" name="titulo" maxlength="24" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Linguagem</label>
            <select id="multi-select" name="linguagem[]" multiple required>
                <option>Bash</option>
                <option>C</option>
                <option>C#</option>
                <option>C++</option>
                <option>CSS</option>
                <option>Go</option>
                <option>HTML</option>
                <option>Java</option>
                <option>JavaScript</option>
                <option>Kotlin</option>
                <option>MySQL</option>
                <option>PHP</option>
                <option>Python</option>
                <option>Ruby</option>
                <option>Rust</option>
                <option>Shell</option>
                <option>TypeScript</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Trecho</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="texto" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Salvar</button>
    </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('multi-select');
    const choices = new Choices(element, {
      removeItemButton: true,
      searchEnabled: true,
      placeholderValue: 'Selecione as linguagens',
      noResultsText: 'Nenhum resultado',
      itemSelectText: '',
    });
  });
</script>