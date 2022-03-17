<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: background.php' );
  die();
  
}

if( isset( $_POST['email'] ) )
{
  
  if( $_POST['email'] and $_POST['phone'] )
  {
    
    $query = 'UPDATE background SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
      startdate = "'.mysqli_real_escape_string( $connect, $_POST['startdate'] ).'",
      enddate = "'.mysqli_real_escape_string( $connect, $_POST['enddate'] ).'"

      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Background has been updated successfully' );
    
  }

  header( 'Location: background.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM background
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: background.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Background</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>
  
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
  
  <label for="startdate">Start date:</label>
  <input type="text" name="startdate" id="startdate" value="<?php echo htmlentities( $record['startdate'] ); ?>">

  <br>
  <label for="enddate">End date:</label>
  <input type="text" name="enddate" id="enddate" value="<?php echo htmlentities( $record['enddate'] ); ?>">
 
  <br>
  
  <input type="submit" value="Edit Contact">
  
</form>

<p><a href="contact.php"><i class="fas fa-arrow-circle-left"></i> Return to Contact List</a></p>


<?php

include( 'includes/footer.php' );

?>