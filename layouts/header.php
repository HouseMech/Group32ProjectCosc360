<header id="masthead">
  <table>
    <tr>
      <td id="menuTitle">
        <h1>MyBlogPost</h1>
        <input type="text" placeholder="Search...">
    </tr>
    <tr>
      <td>
        <div id="menu">
          <a id="active-item" href="pages/index.php"><em>Home</em></a>
          <!-- Display (Sign In / Profile / Sign Out) buttons depending on user login status. -->
          <script>
            $.ajax({
             url: 'php/index.php',
               success: function (response) {
                 var button = $(response);
                 $('#menu').append(button);
               }
            });
          </script>
        </div>
      </td>
    </tr>
  </table>
</header>
