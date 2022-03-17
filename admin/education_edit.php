<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: education.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['name'] and $_POST['description'] and $_POST['startdate'] and $_POST['enddate'] )
  {
    
    $query = 'UPDATE education SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      description = "'.mysqli_real_escape_string( $connect, $_POST['description'] ).'",
      startdate = "'.mysqli_real_escape_string( $connect, $_POST['startdate'] ).'",
      enddate = "'.mysqli_real_escape_string( $connect, $_POST['enddate'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been updated' );
    
  }

  header( 'Location: education.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM education
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: education.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Education</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
  
  <br>
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
  
  <br>
  
  <label for="description">Description:</label>
  <input type="text" name="description" id="description" value="<?php echo htmlentities( $record['description'] ); ?>">
  
  <br>
  
  <label for="startdate">Start date:</label>
  <input type="date" name="startdate" id="startdate" value="<?php echo htmlentities( $record['startdate'] ); ?>">

  <br>
  <label for="enddate">End date:</label>
  <input type="date" name="enddate" id="enddate" value="<?php echo htmlentities( $record['enddate'] ); ?>">
 
  <br>
  
  
  <input type="submit" value="Edit Education">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Education List</a></p>


<?php

include( 'includes/footer.php' );

?>