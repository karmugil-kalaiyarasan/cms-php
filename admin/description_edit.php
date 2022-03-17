<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: description.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['description'] )
  {
    
    $query = 'UPDATE description SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Description has been updated' );
    
  }

  header( 'Location: description.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM description
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: description.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Description</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
  
  <br>
  
  <label for="description">Description:</label>
  <input type="text" name="description" id="description" value="<?php echo htmlentities( $record['description'] ); ?>">
  
  <br>
  
  
  <input type="submit" value="Edit Description">
  
</form>

<p><a href="description.php"><i class="fas fa-arrow-circle-left"></i> Return to Description List</a></p>


<?php

include( 'includes/footer.php' );

?>