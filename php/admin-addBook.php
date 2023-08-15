<?php
include 'config.php';

$message = array(); // Initialize an empty array for messages

if(isset($_POST['add_book'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_images/'.$image;
    $description = $_POST['description'];
    $category = $_POST['category'];
    $is_coming_soon = isset($_POST['is_coming_soon']) ? 1 : 0;

    $select_book_name = mysqli_query($conn, "SELECT name FROM `books` WHERE name = '$name'") or die('query failed');

    if(mysqli_num_rows($select_book_name) > 0){
        $message[] = 'Product name already added';
    }else{
        $add_book_query = mysqli_query($conn, "INSERT INTO `books`(name, price, image, description, category, is_coming_soon) VALUES('$name', '$price', '$image','$description', '$category', '$is_coming_soon')") or die('query failed');

        if($add_book_query){
            if($image_size > 2000000){
                $message[] = 'Image size is too large';
            }else{
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'Book added successfully!';
            }
        }else{
            $message[] = 'Book could not be added!';
        }
    }
}


if(isset($_POST['update_book'])){
    $update_b_id = $_POST['update_b_id'];
    $update_name = $_POST['update_name'];
    $update_price = $_POST['update_price'];

    mysqli_query($conn, "UPDATE `books` SET name = '$update_name', price = '$update_price' WHERE bid = '$update_b_id'") or die('query failed');

    $update_image = $_FILES['update_image']['name'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_folder = 'uploaded_images/'.$update_image;
    $update_old_image = $_POST['update_old_image'];

    if(!empty($update_image)){
        if($update_image_size > 2000000){
            $message[] = 'Image file size is too large';
        }else{
            mysqli_query($conn, "UPDATE `books` SET image = '$update_image' WHERE bid = '$update_b_id'") or die('query failed');
            move_uploaded_file($update_image_tmp_name, $update_folder);
            unlink('uploaded_images/'.$update_old_image);
        }
    }

    header('location: admin-addBook.php');
}


if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_image_query = mysqli_query($conn, "SELECT image FROM `books` WHERE bid = '$delete_id'") or die('query failed');
    $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
    $image_file = 'uploaded_images/'.$fetch_delete_image['image'];
    unlink($image_file);
    mysqli_query($conn, "DELETE FROM `books` WHERE bid = '$delete_id'") or die('query failed');
    header('location:admin-addBook.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin-addBook.css">
    <title>Admin || Add Books</title>
</head>
<body>
    
    <?php include 'adminHeader.php'; ?>
    
    <div class="add-product">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>Add Book</h3>
            <label for="name">Book Name:</label>
            <input type="text" name="name" id="name" class="box" placeholder="Enter book name" required>

            <label for="price">Book Price:</label>
            <input type="number" min="0" name="price" id="price" class="box" placeholder="Enter book price" required>

            <label for="image">Book Image:</label>
            <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/png" class="box" required>

            <label for="logText">Book Description:</label>
            <textarea id="logText" name="description" rows="10" cols="50"></textarea><br><br>

            <label for="category">Book Category:</label>
            <select name="category" id="category" class="box">
                <option value="Fiction">Fiction</option>
                <option value="Mystery/Thriller">Mystery/Thriller</option>
                <option value="Science Fiction/Fantasy">Science Fiction/Fantasy</option>
                <option value="Romance">Romance</option>
                <option value="Biography/Memoir">Biography/Memoir</option>
            </select>

            <label for="is_coming_soon">Coming Soon:</label>
            <input type="checkbox" name="is_coming_soon" id="is_coming_soon" value="1">


            <input type="submit" value="Add Product" name="add_book" class="btn">
        </form>
    </div>

    <!-- show Added Books  -->
    <section class="show-books">
        <div class="box-container">
            <?php
            $select_books = mysqli_query($conn, "SELECT * FROM `books`") or die('query failed');
            if(mysqli_num_rows($select_books) > 0){
                while($fetch_books = mysqli_fetch_assoc($select_books)){
            ?>
            <div class="box">
                <img src="uploaded_images/<?php echo $fetch_books['image']; ?>" alt="" style="width: 100%;">
                <div class="name"><?php echo $fetch_books['name']; ?></div>
                <div class="price">$<?php echo $fetch_books['price']; ?>/-</div>
                <a href="admin-addBook.php?update=<?php echo $fetch_books['bid']; ?>" class="option-btn">update</a>
                <a href="admin-addBook.php?delete=<?php echo $fetch_books['bid']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
            </div>
            <?php
                }
            }else{
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
        </div>
    </section>

    <!-- update book -->
    <section class="edit-book-form">
    <?php
    if(isset($_GET['update'])){
        $update_id = $_GET['update'];
        $update_query = mysqli_query($conn, "SELECT * FROM `books` WHERE bid = '$update_id'") or die('query failed');
        if(mysqli_num_rows($update_query) > 0){
            while($fetch_update = mysqli_fetch_assoc($update_query)){
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="update_b_id" value="<?php echo $fetch_update['bid']; ?>">
        <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
        <img src="uploaded_img/<?php echo $fetch_update['image']; ?>" alt="">
        <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" class="box" required placeholder="enter product name">
        <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" class="box" required placeholder="enter product price">
        <input type="file" class="box" name="update_image" accept="image/jpg, image/jpeg, image/png">
        <input type="submit" value="update" name="update_book" class="btn">
        <a href="admin-addBook.php?cancel"><input type="button" value="cancel" id="close-update" class="option-btn"></a>
    </form>
    <?php
            }
        }
    }else{
        echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
    }
    ?>
</section>

</body>
</html>
