<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_POST['email'] ) )
{
  
  if( $_POST['email'] and $_POST['phone'] )
  {
    
    $query = 'INSERT INTO contact (
        email,
        phone
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['phone'] ).'"
      )';
    mysqli_query( $connect, $query );
    
    set_message( 'Contact has been added successfully' );
    
  }
  
  header( 'Location: contact.php' );
  die();
  
}

?>

<h2>Add Contact Information</h2>

<form method="post">
  
  <label for="email">email:</label>
  <input type="text" name="email" id="email">
    
  <br>
  
  <label for="phone">Phone Number:</label>
  <input type="text" name="phone" id="phone">
        
  <br>
    
  <input type="submit" value="Add Contact">
  
</form>

<p><a href="contact.php"><i class="fas fa-arrow-circle-left"></i> Return to contact List</a></p>


<?php

include( 'includes/footer.php' );

?>