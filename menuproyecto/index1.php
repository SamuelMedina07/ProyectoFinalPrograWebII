<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú</title>
  <link rel="stylesheet" href="navbar.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
  <header class="header_main">
    <nav class="navbar_main">
      <div class="navbar_data">
        <div id="navbar_toggle">
          <span class="material-symbols-rounded navbar_toggle_menu">menu</span>
          <i class="material-symbols-rounded navbar_toggle_close">close</i>
        </div>
        <a href="#" class="navbar_logo">
          <span class="material-symbols-rounded">eco</span> Menu
        </a>
      </div>

      <div class="navbar_menu" id="navbar_menu">
     

      <section id="navbar_profile">
       
        
        <div class="navbar_profile_child">
          <div class="navbar_profile_child_title">
            <span class="material-symbols-rounded navbar_profile_icons">favorite</span>
            <span class="navbar_profile_name">favorito</span>
          </div>
        </div>
        <div class="navbar_profile_child">
          <div class="navbar_profile_child_title">
            <span class="material-symbols-rounded navbar_profile_icons">shopping_bag</span>
            <span class="navbar_profile_name">Compras</span>
          </div>
        </div>
        <div id="navbar_profile_account" class="navbar_profile_child">
        
        <div id="navbar_account_icon" class="navbar_profile_child_title" onclick="window.location.href='php/perfil.php';" style="cursor: pointer;">
        
            <span class="material-symbols-rounded navbar_profile_icons">person</span>
            <span class="navbar_profile_name">Perfil</span>

          </div>


          <div id="navbar_account_dropdown" class="hide_dropdown">
            <a href="/Profile/profile.html" id="navbar_account_dropdown_login" class="dropList">LOGIN/SIGNUP</a>
            <a href="/Profile/signup.html" class="dropList">Gift Cards</a>
            <a href="#" class="dropList">Coupons</a>
            <a href="#" class="dropList">Saved Address</a>
            <a href="#" class="dropList">Saved Cards</a>
          </div>
        </div>
      </section>
    </nav>
  </header>
</body>
</html>
