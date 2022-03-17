<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: projects.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['description'] )
  {
    
    $query = 'UPDATE projects SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
      githuburl = "'.mysqli_real_escape_string( $connect, $_POST['githuburl'] ).'",
      hostingurl = "'.mysqli_real_escape_string( $connect, $_POST['hostingurl'] ).'"

      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Project has been updated' );
    
  }

  header( 'Location: projects.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM projects
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: projects.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Project</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
    
  <br>
  
  <label for="description">Description:</label>
  <textarea type="text" name="description" id="description" rows="5"><?php echo htmlentities( $record['description'] ); ?></textarea>
  
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
  <input type="text" name="githuburl" id="githuburl" value="<?php echo htmlentities( $record['githuburl'] ); ?>">
        
  <br>

  <br>
  
  <label for="hostingurl">Hosting URL:</label>
  <input type="text" name="hostingurl" id="hostingurl" value="<?php echo htmlentities( $record['hostingurl'] ); ?>">
        
  <br>
  
  <input type="submit" value="Edit Project">
  
</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>