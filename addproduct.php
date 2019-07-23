<?php
    $userrole = ['administrator', 'root'];
    include("./security.php");
    include("./connect_db.php");

    echo'
      <form action="index.php?content=create" method="post">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" id="title" placeholder="title">
        </div>
        <div class="form-group">
          <label for="description">Descriptions</label>
          <textarea name="description" class="form-control" id="description" placeholder="descriptions"></textarea>
        </div>
        <div class="form-group">
          <label for="image">Image url</label>
          <input type="text" name="image" class="form-control" id="description" placeholder="url">
        </div>
        <div class="form-group">
          <label for="catagory">Catagory</label>
          <select class="form-control" name="catagory" id="catagory">
            <option>heren</option>
            <option>dames</option>
          </select>
        </div>
        <div class="form-group">
          <label for="subcatagory">Subcatagory</label>
          <select multiple name="subcatagory" class="form-control" id="subcatagory">
            <option>kleding</option>
            <option>schoenen</option>
            <option>accessoires</option>
          </select>
        </div>
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    ';
    exit();

?>
