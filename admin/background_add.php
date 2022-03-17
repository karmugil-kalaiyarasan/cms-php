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
    
    $query = 'INSERT INTO background (
        title,
        name,
        description,
        startdate,
        enddate
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['startdate'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['enddate'] ).'",
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Background has been added successfully' );
    
  }
  
  header( 'Location: background.php' );
  die();
  
}

?>

<h2>Add Background Information</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="email" id="email">
    
  <br>
  
  <label for="name">Name:</label>
  <input type="text" name="phone" id="phone">
        
  <br>

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

  <label for="startdate">Start Date:</label>
  <input type="startdate" name="startdate" id="startdate">
  
  <br>

  <label for="enddate">End Date:</label>
  <input type="enddate" name="enddate" id="enddate">
  
  <br>
    
  <input type="submit" value="Add Background">
  
</form>

<p><a href="background.php"><i class="fas fa-arrow-circle-left"></i> Return to Background List</a></p>


<?php

include( 'includes/footer.php' );

?>