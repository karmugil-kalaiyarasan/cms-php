<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM skills
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Skills method has been deleted' );
  
  header( 'Location: skills.php' );
  die();
  
}

$query = 'SELECT *
  FROM skills';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Skills</h2>

<table>
  <tr>
  <th></th>
    <th align="center">ID</th>
    <th align="left">Name</th>
    <th></th>
    <th align="left">Icon</th>
    <th align="left">Favourite</th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
    <td align="center">
        <img src="image.php?type=project&id=<?php echo $record['id']; ?>&width=300&height=300&format=inside">
      </td>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['name']; ?></td>
      <td align="center"><a href="skills_photo.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-camera"></i>Photo</a></td>
      <td align="center"><?php echo $record['icon']; ?></td>
      <td align="center"><?php echo $record['favourite']; ?></td>
      <td align="center"><a href="skills_edit.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-pencil"></i>Edit</a></td>
      <td align="center">
        <a href="skills.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this skill?');"><i class="fa-solid fa-trash"></i>Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="skills_add.php"><i class="fas fa-plus-square"></i> Add skill</a></p>


<?php

include( 'includes/footer.php' );

?>