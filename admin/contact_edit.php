<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: contact.php' );
  die();
  
}

if( isset( $_POST['email'] ) )
{
  
  if( $_POST['email'] and $_POST['phone'] )
  {
    
    $query = 'UPDATE contact SET
      email = "'.mysqli_real_escape_string( $connect, $_POST['email'] ).'",
      phone = "'.mysqli_real_escape_string( $connect, $_POST['phone'] ).'"

      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    set_message( 'Contact has been updated' );
    
  }

  header( 'Location: contact.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM contact
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: contact.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

?>

<h2>Edit Contact</h2>

<form method="post">
  
  <label for="name">Email:</label>
  <input type="text" name="email" id="email" value="<?php echo htmlentities( $record['email'] ); ?>">
    
  <br>
  
  <label for="phone">Phone:</label>
  <input type="text" name="phone" id="phone" value="<?php echo htmlentities( $record['phone'] ); ?>">
 
  <br>
  
  <input type="submit" value="Edit Contact">
  
</form>

<p><a href="contact.php"><i class="fas fa-arrow-circle-left"></i> Return to Contact List</a></p>


<?php

include( 'includes/footer.php' );

?>