<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM description
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Description method has been deleted' );
  
  header( 'Location: description.php' );
  die();
  
}

$query = 'SELECT *
  FROM description';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Descriptions</h2>

<table>
  <tr>
  <th></th>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="left">Description</th>
    <th></th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
    <td align="center">
        <img src="image.php?type=project&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['title']; ?></td>
      <td align="center"><?php echo $record['description']; ?></td>
      <td align="center"><a href="skills_photo.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-camera"></i>Photo</a></td>
      <td align="center"><a href="description_edit.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-pencil"></i>Edit</a></td>
      <td align="center">
        <a href="description.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this description?');"><i class="fa-solid fa-trash"></i>Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="description_add.php"><i class="fas fa-plus-square"></i> Add description</a></p>


<?php

include( 'includes/footer.php' );

?>