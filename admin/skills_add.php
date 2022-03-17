<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['name'] ) )
{
  
  if( $_POST['name'] and $_POST['icon'] and $_POST['favourite'] )
  {
    
    $query = 'INSERT INTO skills (
        name,
        icon,
        favourite
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['name'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['icon'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['favourite'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Skill has been added successfully' );
    
  }
  
  header( 'Location: skills.php' );
  die();
  
}

?>

<h2>Add Skill Information</h2>

<form method="post">
  
  <label for="name">Skill name:</label>
  <input type="text" name="name" id="name">
    
  <br>
        
  <br>
    
  <label for="icon">Icon:</label>
  <input type="text" name="icon" id="icon">
        
  <br>
    
  <label for="favourite">Favourite:</label>
    <select name="favourite" id="favourite">
        <option value="1">Yes</option>
        <option value="2">No</option>
    </select>
        
  <br>
    
  <input type="submit" value="Add Skill">
  
</form>

<p><a href="skills.php"><i class="fas fa-arrow-circle-left"></i> Return to Skills List</a></p>


<?php

include( 'includes/footer.php' );

?>