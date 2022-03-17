<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['name'] and $_POST['description'] and $_POST['startdate'] and $_POST['enddate'] )
  {
    
    $query = 'INSERT INTO education (
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
         "'.mysqli_real_escape_string( $connect, $_POST['enddate'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Education has been added successfully' );
    
  }
  
  header( 'Location: education.php' );
  die();
  
}

?>

<h2>Add Education Information</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="name">Name:</label>
  <input type="text" name="name" id="name">
        
  <br>
    
  <label for="description">Description:</label>
  <input type="text" name="description" id="description">
        
  <br>
    
  <label for="startdate">Start Date:</label>
  <input type="date" name="startdate" id="startdate">
  
  <br>

  <label for="enddate">End Date:</label>
  <input type="date" name="enddate" id="enddate">
  
  <br>
    
  <input type="submit" value="Add Skill">
  
</form>

<p><a href="education.php"><i class="fas fa-arrow-circle-left"></i> Return to Educations List</a></p>


<?php

include( 'includes/footer.php' );

?>