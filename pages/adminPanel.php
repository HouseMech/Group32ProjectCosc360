<!DOCTYPE html>
<html lang="en">

  <?php include '../layouts/global_head_include.php';?>
  <?php include_once "../php/commonFunctions.php"; ?>

  <body>
    <?php include_once '../layouts/header.php';?>

  <div class="main-content">
      <?php include '../layouts/sidebar.php';?>

      <div id="center">

      <?php
        startSession();
      ?>
      <?php if (isAdmin()): ?>
          <h2 id="subHead">Admin panel</h2>
          <table class="admin-table">
            <tr>
              <th>userName</th>
              <th>firstName</th>
              <th>lastName</th>
              <th>email</th>
              <th>Admin</th>
            </tr>
          <?php
            $conn = createConnection();
            $stmt = "SELECT * FROM blogUser;";
            $results = mysqli_query($conn, $stmt);
            while ($row = mysqli_fetch_assoc($results))
            {
              echo "<tr>";
              echo "<td>".$row['userName']."</td>";
              echo "<td>".$row['firstName']."</td>";
              echo "<td>".$row['lastName']."</td>";
              echo "<td>".$row['email']."</td>";
              echo "<td>".$row['isAdmin']."</td>";
              echo "</tr>";
            }
          ?>
        </table>

      <?php else: ?>
        <h1>You do not have access to this page</h1>
      <?php endif ?>
      </div>
  </div>
  <?php include '../layouts/footer.php';?>
  </body>
</html>
