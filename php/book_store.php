<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Online_BookStore/css/style_css.css"/>
    <link rel="stylesheet" href="../Online_BookStore/css/style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" />

    <title>Online Book Store | SLIIT </title>
    
   
   
  </head>

  <body>
    <!------------------ Header ------------------>
    <div class="container">
      <div class="navbar">
        <div class="logo">
          <a href="index.html">
            <img src="images/EbookStore-Logo.png" alt="EbookStore-Logo" />
          </a>
        </div>
    <!----------  Nav Bar ------------------>
    <nav>
      <ul id="MenuItems">
        <li><a href="home.html">Home</a></li>
			        <li><a href="latest_news.php">Latest News</a></li>
              <li><a href="book_store.php">Book Store</a></li>
			        <li><a href="e-books.html">E-Books</a></li>
              <li><a href="about_us.html">About Us</a></li>
              <li><a href="contact_us.html">Contact Us</a></li>
              <li><a href="account.html">User Account</a></li>
      </ul>
    </nav>
    <a href="cart.html">
      <img
        src="images/cart.png"
        alt="Shoping Cart"
        width="28px"
        height="28px"
        style="margin-left: 10px; margin-top: 5px"
      />
    </a>
    <img src="images/menu.png" class="menu-icon" onclick="menutoggle()" />
  </div>
  
    <div class="small-container">
      <div class="row row-2">
        <h2>All Ebooks</h2>
        <select>
          <option>Default sorting</option>
          <option>Sort by price</option>
          <option>Sort by popularity</option>
          <option>Sort by rating</option>
          <option>Sort by sale</option>
        </select>
      </div>
	
	<div class="book-store">
  <?php  
            include 'config.php';
            $select_books = mysqli_query($conn, "SELECT * FROM `books` WHERE is_coming_soon = 0 ") or die('query failed');
            if(mysqli_num_rows($select_books) > 0){
                
            while($fetch_books = mysqli_fetch_assoc($select_books)){
        ?>
    <div class="book">
      <div class="book-image">
      <a href="book-detail.php?bid=<?php echo $fetch_books['bid']; ?>">
            <img src="uploaded_images/<?php echo $fetch_books['image']; ?>" alt=""/>
      </a>
      </div>
      <div class="book-details">
        <h4 class="book-title"><?php echo $fetch_books['name']; ?></h4>
        <p class="book-price">Rs.<?php echo $fetch_books['price']; ?></p>
      </div>
    </div>
    <?php
      }
    }else{
      echo '<p class="empty">no products added yet!</p>';
    }
        
    ?>
  <!-- Repeat the above book div for each book -->
  </div>


	  <!-- ---------------------Youtube Video------------------- -->
    <div class="youtube-container">
      <div class="youtube-row">
        <div class="col-2">
          <h2>5 Books You Must Read If You're Serious About Success</h2>
        </div>
        <div class="col-2">
          <iframe
            id="youtubevideo"
            width="560"
            height="315"
            src="https://www.youtube.com/embed/LqJBXtG9xxk"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </div>
    

	  <!-- -->
      <div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594;</span>
      </div>
    </div>


    <!-- ---------------------footer------------------- -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col">
            <h3>Download Our App</h3>
            <p>Download App for Android and ios mobile phone.</p>
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
              <li>Twitterr</li>
            </ul>
          </div>
        </div>
        <hr />
        <p class="copyright">Copyright 2023 @ Online Book Store</p>
      </div>
    </div>
    <!-- ---------Javascript for toggle menu------------- -->
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
 
