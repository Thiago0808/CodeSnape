<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Adicionar <small>Novo Trecho</small></h1>
    </div>
    
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Nome do Trecho:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Titulo" name="titulo" maxlength="24">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Linguagem</label>
            <select class="form-control" id="exampleFormControlSelect1" name="linguagem">
                <option>HTML</option>
                <option>CSS</option>
                <option>PHP</option>
                <option>JavaScript</option>
                <option>MySQL</option>
                <option>TypeScript</option>
                <option>Python</option>
                <option>Java</option>
                <option>C</option>
                <option>C++</option>
                <option>C#</option>
                <option>Ruby</option>
                <option>Go</option>
                <option>Rust</option>
                <option>Kotlin</option>
                <option>Shell</option>
                <option>Bash</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Trecho</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="10" name="texto"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>

