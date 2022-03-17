<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: skills.php' );
  die();
  
}

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['icon'] and $_POST['favourite'] )
  {
    
    $query = 'UPDATE skills SET
      name = "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
      icon = "'.mysqli_real_escape_string( $connect, $_POST['icon'] ).'",
      favourite = "'.mysqli_real_escape_string( $connect, $_POST['favourite'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Skill has been updated' );
    
  }

  header( 'Location: skills.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM skills
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: skills.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Skill</h2>

<form method="post">
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name" value="<?php echo htmlentities( $record['name'] ); ?>">
  
  <br>
  
  <label for="icon">Icon:</label>
  <input type="text" name="icon" id="icon" value="<?php echo htmlentities( $record['icon'] ); ?>">
  
  <br>
  
  <label for="favourite">Favourite:</label>
    <select name="favourite" id="favourite">
        <option value="1">Yes</option>
        <option value="2">No</option>
    </select>
        
  <br>
  
  
  <input type="submit" value="Edit Skill">
  
</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Skill List</a></p>


<?php

include( 'includes/footer.php' );

?>