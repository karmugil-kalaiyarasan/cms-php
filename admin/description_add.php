<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['description'] )
  {
    
    $query = 'INSERT INTO description (
        title,
        description
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Description has been added successfully' );
    
  }
  
  header( 'Location: description.php' );
  die();
  
}

?>

<h2>Add Description Information</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="description">Description:</label>
  <input type="text" name="description" id="description">
        
  <br>
    
    
  <input type="submit" value="Add Description">
  
</form>

<p><a href="description.php"><i class="fas fa-arrow-circle-left"></i> Return to Descriptions List</a></p>


<?php

include( 'includes/footer.php' );

?>