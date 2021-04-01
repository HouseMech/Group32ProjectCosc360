<!DOCTYPE html>
<html lang="en">
  <?php include '../layouts/global_head_include.php';?>

  <body>
  <?php include '../layouts/header.php';?>

  <!-- Display sidebar depending on user login status. (Show if logged in, hide if not)-->
  <?php include '../layouts/sidebar.php';?>

  <div id="center">
    <form method="POST" action="../php/newPost.php" id="newPost-form" enctype="multipart/form-data">
      <fieldset>
        <label for="pTitle">Post Title:*</label>
        <br/>
        <input name="pTitle" id="pTitle" type="text" required/>
        <br/>
        <label for="pDesc">Post Description:*</label>
        <br/>
        <textarea id="pDesc" name="pDesc" rows="4" cols="50" required></textarea>
        <br/>
        <label for="pTags">Post Topic:</label>
        <br/>
        <input name="pTags" id="pTags" type="text" />
        <br/>
        <!-- Only allow .jpeg/ .jpg images to be uplaoded for simplicity. -->
        <label for="pImg">Upload Image <i>(.jpg)</i>:</label>
        <br/>
        <input type="file" id="pImg" name="pImg" accept="image/jpeg">
        <br/>
        <p id="commentText">
        <input type="checkbox" id="pComments" name="pComments" value="1" checked/>
        Allow Comments
        </p>
        <br/>
        <input type="submit" value="POST" name="pSubmit" id="pSubmit"/>
      </fieldset>
    </form>
  </div>

  <?php include '../layouts/footer.php';?>
  </body>
</html>
