<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

if( isset( $_GET['delete'] ) )
{
  
  $query = 'DELETE FROM education
    WHERE id = '.$_GET['delete'].'
    LIMIT 1';
  mysqli_query( $connect, $query );
    
  set_message( 'Education method has been deleted' );
  
  header( 'Location: education.php' );
  die();
  
}

$query = 'SELECT *
  FROM education';
$result = mysqli_query( $connect, $query );

?>

<h2>Manage Educations</h2>

<table>
  <tr>
    <th align="center">ID</th>
    <th align="left">Title</th>
    <th align="left">Name</th>
    <th align="left">Description</th>
    <th align="left">Start date</th>
    <th align="left">End date</th>
  </tr>
  <?php while( $record = mysqli_fetch_assoc( $result ) ): ?>
    <tr>
      <td align="center"><?php echo $record['id']; ?></td>
      <td align="center"><?php echo $record['title']; ?></td>
      <td align="center"><?php echo $record['name']; ?></td>
      <td align="center"><?php echo $record['description']; ?></td>
      <td align="center"><?php echo $record['startdate']; ?></td>
      <td align="center"><?php echo $record['enddate']; ?></td>
      <td align="center"><a href="education_edit.php?id=<?php echo $record['id']; ?>"><i class="fa-solid fa-pencil"></i>Edit</a></td>
      <td align="center">
        <a href="education.php?delete=<?php echo $record['id']; ?>" onclick="javascript:confirm('Are you sure you want to delete this education?');"><i class="fa-solid fa-trash"></i>Delete</a>
      </td>
    </tr>
  <?php endwhile; ?>
</table>

<p><a href="education_add.php"><i class="fas fa-plus-square"></i> Add education</a></p>


<?php

include( 'includes/footer.php' );

?>