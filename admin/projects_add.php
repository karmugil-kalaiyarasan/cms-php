<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['description'] )
  {
    
    $query = 'INSERT INTO projects (
        name,
        description,
        githuburl,
        hostingurl
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['githuburl'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['hostingurl'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Project has been added successfully' );
    
  }
  
  header( 'Location: projects.php' );
  die();
  
}

?>

<h2>Add Project</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#description' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="githuburl">Github URL:</label>
  <input type="text" name="githuburl" id="githuburl">
  
  <br>

  <br>
  
  <label for="hostingurl">Hosting URL:</label>
  <input type="text" name="hostingurl" id="hostingurl">
  
  <br>
  
  <input type="submit" value="Add Project">
  
</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>