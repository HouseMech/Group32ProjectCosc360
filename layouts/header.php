<header id="navbar" class="header-container">
  <div class="header-title">
    <h1>MyBlogPost</h1>
  </div>
  <div class="header-options">
    <div class="header-input">
      <input type="text" placeholder="Search...">
    </div>

    <div id="menu" class="header-button">
      <a id="menuItem" href="index.php">Home</a>
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
  </div>
</header>
