<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM background
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Background has been deleted' );
  
  header( 'Location: background.php' );
  die();
  
}

$query = 'SELECT *
  FROM background';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Background</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="center">Title</th>
    <th align="center">Name</th>
    <th align="center">Description</th>
    <th align="center">Start Date</th>
    <th align="center">End Date</th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="left"> <?php echo htmlentities( $record['title'] ); ?></td>
      <td align="left"> <?php echo htmlentities( $record['name'] ); ?></td>
      <td align="left"> <?php echo htmlentities( $record['description'] ); ?></td>
      <td align="left"> <?php echo htmlentities( $record['startdate'] ); ?></td>
      <td align="left"> <?php echo htmlentities( $record['enddate'] ); ?></td>
      <td align="center"><a href="background_photo.php?id=<?php echo $record['id']; ?>">Photo</i></a></td>
      <td align="center"><a href="background_edit.php?id=<?php echo $record['id']; ?>">Edit</i></a></td>
      <td align="center">
        <a href="background.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this background?');">Delete</i></a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="background_add.php"><i class="fas fa-plus-square"></i> Add Background</a></p>


<?php

include( 'includes/footer.php' );

?>