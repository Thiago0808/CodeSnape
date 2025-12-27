<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">Add <small>New Tag</small></h1>
    </div>
    
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Tag Name:</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tag" name="tag" maxlength="24" required>
        </div>

        <div class="form-group">
            <label for="colorPicker">Tag Color:</label>
            <input type="color" class="form-control short-input" id="colorPicker" name="color" value="#000000" required>
        </div>

        <button type="submit" class="btn btn-dark">Save</button>
    </form>
</div>