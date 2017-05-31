<?php 
require "gestion_posts.php";
$mydb = new Post("localhost", "root", "", "projetapp");
$post = new Post("localhost", "root", "", "projetapp", 4);
echo $post->title;

if ($_POST) {   
  $mydb->create($_POST, "posts");
  echo '<ul class="list-group">
    <li class="list-group-item list-group-item-success">Votre catégorie a été ajouter</li>
  </ul>';
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title></title>
  </head>
  <body>
    <main>
      <form class="form-horizontal" method="POST">
        <fieldset>
          <!-- Form Name -->
          <legend>Post</legend>

          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="title">Titre</label>
            <div class="col-md-4">                     
              <textarea class="form-control" id="title" name="title">Titre</textarea>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="picture">Image</label>  
            <div class="col-md-4">
            <input id="picture" name="picture" type="text" placeholder="Url Image" class="form-control input-md">
              
            </div>
          </div>

          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="description">Description</label>
            <div class="col-md-4">                     
              <textarea class="form-control" id="description" name="description">Description</textarea>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="category_id">Catégorie</label>
            <div class="col-md-4">
              <select id="category_id" name="category_id" class="form-control">
                <?php 

                $category = $mydb->read(array("name","id"), "category", array("1"=>"1"));
                foreach ($category as $value) {
                  echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                }

                

                 ?>
              </select>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="">Valider</label>
            <div class="col-md-4">
              <button id="" name="" class="btn btn-primary" type="submit">Valider</button>
            </div>
          </div>
        </fieldset>
      </form>
      <form class="form-horizontal" method="POST">
        <fieldset>
          <!-- Form Name -->
          <legend>Post</legend>

          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="title">Titre</label>
            <div class="col-md-4">                     
              <textarea class="form-control" id="title" name="title"> <?= $post->title?> </textarea>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="picture">Image</label>  
            <div class="col-md-4">
            <input id="picture" name="picture" type="text" placeholder="Url Image" class="form-control input-md" value=" <?= $post->title?> ">
              
            </div>
          </div>

          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="description">Description</label>
            <div class="col-md-4">                     
              <textarea class="form-control" id="description" name="description"> <?= $post->description?> </textarea>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="category_id">Catégorie</label>
            <div class="col-md-4">
              <select id="category_id" name="category_id" class="form-control">
                <?php 

                $category = $mydb->read(array("name","id"), "category", array("1"=>"1"));
                foreach ($category as $value) {
                  echo '<option value="' . $value["id"] . '">' . $value["name"] . '</option>';
                }

                

                 ?>
              </select>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="">Valider</label>
            <div class="col-md-4">
              <button id="" name="" class="btn btn-primary" type="submit">Valider</button>
            </div>
          </div>
        </fieldset>
      </form>
    </main>
  </body>
</html>