<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

include( 'includes/header.php' );

?>

<ul id="dashboard">
<li>
    <a href="contact.php">
      Manage Contact
    </a>
  </li>
  <li>
    <a href="projects.php">
      Manage Projects
    </a>
  </li>
  <li>
    <a href="background.php">
      Manage Background
    </a>
  </li>
  <li>
    <a href="users.php">
      Manage Users
    </a>
  </li>
  <li>
    <a href="skills.php">
      Manage Skills
    </a>
  </li>
  <li>
    <a href="description.php">
      Manage Descriptions
    </a>
  </li>
  <li>
    <a href="education.php">
      Manage Educations
    </a>
  </li>
  <li>
    <a href="logout.php">
      Logout
    </a>
  </li>
</ul>

<?php

include( 'includes/footer.php' );

?>
