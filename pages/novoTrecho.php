<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Add <small>New Snippet</small></h1>
    </div>
    
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Snippet Name:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Name" name="titulo" maxlength="24" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Languages:</label>
            <select id="multi-select-language" name="linguagem[]" multiple required>
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
                <option>React</option>
                <option>React Native</option>
                <option>Ruby</option>
                <option>Rust</option>
                <option>Shell</option>
                <option>TypeScript</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Tags:</label>
            <select id="multi-select-tag" name="tag[]" multiple>
                <?php foreach ($tags as $tag): ?>
                    <option value="<?= $tag->id ?>"><?= $tag->tag ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Snippet</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="texto" required></textarea>
        </div>
        <button type="submit" class="btn btn-dark">Save</button>
    </form>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('multi-select-language');
    const choices = new Choices(element, {
      removeItemButton: true,
      searchEnabled: true,
      placeholderValue: 'Select the languages',
      noResultsText: 'No result',
      itemSelectText: '',
    });
  });

  document.addEventListener('DOMContentLoaded', function () {
    const element = document.getElementById('multi-select-tag');
    const choices = new Choices(element, {
      removeItemButton: true,
      searchEnabled: true,
      placeholderValue: 'Select the tags',
      noResultsText: 'No result',
      itemSelectText: '',
    });
  });
</script>