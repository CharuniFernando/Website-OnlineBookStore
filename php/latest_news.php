<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../Online_BookStore/css/style_css.css" />
  <link rel="stylesheet" href="../Online_BookStore/css/style.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />

  <title>Online Book Store | SLIIT</title>
</head>

<body>
  <!-- Header -->
  <div class="header">
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <a href="index.html">
            <img src="images\EbookStore-Logo.png" alt="EbookStore-Logo" />
          </a>
        </div>

        <!-- Nav Bar -->
        <nav>
          <ul id="MenuItems">
            <li><a href="home.html">Home</a></li>
            <li><a href="latest_news.php">Latest News</a></li>
            <li><a href="book_store.php">Book Store</a></li>
            <li><a href="e-books.html">E-Books</a></li>
            <li><a href="about_us.html">About Us</a></li>
            <li><a href="account.html">User Account</a></li>
          </ul>
        </nav>

        <a href="cart.html">
          <img src="images/cart.png" alt="Shoping Cart" width="28px" height="28px" style="margin-left: 10px; margin-top: 5px" />
        </a>
        <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
      </div>

      <div class="row">
        <div class="col-2">
          <h1>
            The Books Lover<br />
            Read all About it!
          </h1>
          <h5>"Bookshops are places of magical discoveries and the rediscovery of past pleasures"</h5><br>
          <p>“Bookstores, like libraries, are the physical manifestation of the wide world’s longest, most thrilling conversation.”</p>
        </div>

        <div class="col-2">
          <img src="images/header-pic.png" alt="Header Pic" />
        </div>
      </div>
    </div>
  </div>

  <!-- Latest news and Discount -->
  <div class="categories">
    <h2 class="title">Latest news and Discount</h2>

    <div class="small-container">
      <div class="row">
        <div class="col-3">
          <img src="images/Book 1.jpg" alt="Book 1" />
        </div>
        <div class="col-3">
          <img src="images/Book 2.jpg" alt="Book 2" />
        </div>
        <div class="col-3">
          <img src="images/Book 3.jpg" alt="Book 3" />
        </div>
      </div>
    </div>
  </div>

  <!-- Latest Books -->
  <div class="small-container">
    <h2 class="title">Latest Books</h2>
    <div class="row">
      <?php
      include 'config.php';

      // Retrieve the latest 4 books from the 'books' table
      $select_latest_books = mysqli_query($conn, "SELECT * FROM `books` ORDER BY bid DESC LIMIT 4") or die('Query failed');

      while ($latest_book = mysqli_fetch_assoc($select_latest_books)) {
      ?>
        <div class="col-4">
          <a href="book-detail.php?bid=<?php echo $latest_book['bid']; ?>">
            <img src="uploaded_images/<?php echo $latest_book['image']; ?>" alt="<?php echo $latest_book['name']; ?>" />
          </a>
          <br>
          <a href="book-detail.php?bid=<?php echo $latest_book['bid']; ?>">
            <h5><?php echo $latest_book['name']; ?></h5>
          </a>
          <br>
          <p>Rs.<?php echo $latest_book['price']; ?></p>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <!-- New & Coming soon -->
  <h2 class="title">New & Coming Soon - AUGUST 2023 RELESED</h2>
  <div class="small-container">
    <h2 class="title">Coming Soon</h2>
    <div class="row">
      <?php
      $select_upcoming_books = mysqli_query($conn, "SELECT * FROM `books` WHERE is_coming_soon = 1 LIMIT 4");
      if ($select_upcoming_books) {
        if (mysqli_num_rows($select_upcoming_books) > 0) {
          while ($fetch_upcoming_books = mysqli_fetch_assoc($select_upcoming_books)) {
      ?>
            <div class="col-4">
              <img src="images/<?php echo $fetch_upcoming_books['image']; ?>" alt="<?php echo $fetch_upcoming_books['name']; ?>" />
              <br>
              <h5><?php echo $fetch_upcoming_books['name']; ?></h5>
              <br>
              <p>Rs.<?php echo $fetch_upcoming_books['price']; ?></p>
            </div>
      <?php
          }
        } else {
          echo '<p>No upcoming books found.</p>';
        }
      } else {
        echo "Error: " . mysqli_error($conn);
      }
      ?>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <div class="container">
      <div class="row">
        <div class="footer-col-1">
          <h3>Download Our App</h3>
          <p>Download App for Android and iOS mobile phones.</p>
          <div class="app-logo">
            <img src="images/Playstore.png" />
            <img src="images/Applestore.png" />
          </div>
        </div>
        <div class="footer-col-2">
          <img src="images/EbookStore-Logo-footer.png" />
          <p>
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Reiciendis, Lorem ipsum dolor sit amet.
          </p>
        </div>
        <div class="footer-col-3">
          <h3>Useful Links</h3>
          <ul>
            <li>Terms of Services</li>
            <li>Branch network</li>
            <li>Shipping and Returns</li>
            <li>Payment Policy</li>
          </ul>
        </div>
        <div class="footer-col-4">
          <h3>Follow us</h3>
          <ul>
            <li>Facebook</li>
            <li>Youtube</li>
            <li>Instagram</li>
            <li>Twitter</li>
          </ul>
        </div>
      </div>
      <hr />
      <p class="copyright">
        Copyright 2023 @ Online Book Store
      </p>
    </div>
  </div>

  <!-- JavaScript for toggle menu -->
  <script>
    var MenuItems = document.getElementById("MenuItems");
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
      if (MenuItems.style.maxHeight == "0px") {
        MenuItems.style.maxHeight = "200px";
      } else {
        MenuItems.style.maxHeight = "0px";
      }
    }
  </script>
</body>
</html>
