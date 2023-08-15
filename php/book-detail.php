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
    <div class="header">
      <div class="container">
        <div class="navbar">
          <div class="logo">
            <a href="index.html">
              <img src="images\EbookStore-Logo.png" alt="EbookStore-Logo"
            /></a>
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


        <!--  -->

    <div class="small-container single-product">
      <div class="row">
      <?php
          include 'config.php';

          // Check if the book ID is provided in the URL
          if (isset($_GET['bid'])) {
              $bookId = $_GET['bid'];
              $select_book = mysqli_query($conn, "SELECT * FROM `books` WHERE bid = $bookId") or die('Query failed');
      
              if (mysqli_num_rows($select_book) > 0) {
                  $book = mysqli_fetch_assoc($select_book);
                  ?>
                  <div class="col-2">
                      <img src="uploaded_images/<?php echo $book['image']; ?>" alt="<?php echo $book['name']; ?>" width="68%" />
                  </div>
                  <div class="col-2">
                      <p>Home / Ebook</p>
                      <h3><?php echo $book['name']; ?></h3>
                      <h4>Rs.<?php echo $book['price']; ?></h4>
                      <input type="number" value="1" />
                      <a href="cart.html" class="btn">Add To Cart</a>
                      <h3>Book Details <i class="fa fa-indent"></i></h3>
                      <br />
                      <p><?php echo $book['description']; ?></p>
                  </div>
                  <?php
              } else {
                  echo '<p class="empty">Book not found!</p>';
              }
          } else {
              echo '<p class="empty">Invalid book ID!</p>';
          }
      ?>
      </div>
    </div>



    <!-- -------------title----------------- -->
	
    <div class="small-container">
      <div class="row row-2">
        <h2>Related Books</h2>
        <p>View More</p>
      </div>
    </div>
	
    <!-- --------------Product-------------- -->
	
		<div class="small-container">
    <div class="row">
        <?php
        include 'config.php';

        // Retrieve related books from the same category
        $category = $book['category'];
        $select_related_books = mysqli_query($conn, "SELECT * FROM `books` WHERE category = '$category' AND bid != $bookId LIMIT 4") or die('Query failed');

        if(mysqli_num_rows($select_related_books) > 0) {
            while ($related_book = mysqli_fetch_assoc($select_related_books)) {
                ?>
                <div class="col-4">
                    <a href="book-detail.php?bid=<?php echo $related_book['bid']; ?>">
                        <img src="uploaded_images/<?php echo $related_book['image']; ?>" alt="<?php echo $related_book['name']; ?>"/>
                    </a>
                    <br>
                    <a href="book-detail.php?bid=<?php echo $related_book['bid']; ?>">
                        <h5><?php echo $related_book['name']; ?></h5>
                    </a>
                    <br>
                    <p>Rs.<?php echo $related_book['price']; ?></p>
                </div>
                <?php
            }
        } else {
            echo '<p>No related books found.</p>';
        }
        ?>
    </div>
</div>



		
	
    <!-- ---------------------footer------------------- -->
    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="footer-col-1">
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
              <li>Coupons</li>
              <li>Blog Post</li>
              <li>Return Policy</li>
              <li>Join Affiliate</li>
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
        <p class="copyright">Copyright 2020 - EbookStore</p>
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
