<?php
require 'db_connection.php';
require 'utilities.php';
// Function to add a blog post
function addPost($pdo, $title, $image_url, $description, $detail_page) {
    try {
        // Sanitize input
        $title = htmlspecialchars(strip_tags($title));
        $image_url = htmlspecialchars(strip_tags($image_url));
        $description = htmlspecialchars(strip_tags($description));
        $detail_page = htmlspecialchars(strip_tags($detail_page));

        // Prepare SQL statement
        $sql = "INSERT INTO blog_posts (title, image_url, description, detail_page) VALUES (:title, :image_url, :description, :detail_page)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':image_url', $image_url);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':detail_page', $detail_page);

        // Execute the statement
        return $stmt->execute();
    } catch (PDOException $e) {
        error_log("Error adding blog post: " . $e->getMessage());
        return false;
    }
}


// Function to delete a blog post
function deletePost($pdo, $id) {
    $sql = "DELETE FROM blog_posts WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}


function editPost($pdo, $id, $title, $image_url, $description, $detail_page) {
    try {
        // Prepare statement
        $stmt = $pdo->prepare("UPDATE blog_posts SET title = ?, image_url = ?, description = ?, detail_page = ? WHERE id = ?");
        // Bind parameters
        $stmt->bindParam(1, $title);
        $stmt->bindParam(2, $image_url);
        $stmt->bindParam(3, $description);
        $stmt->bindParam(4, $detail_page);
        $stmt->bindParam(5, $id);
        // Execute the statement
        $stmt->execute();
        // Check if the update was successful
        if ($stmt->rowCount() > 0) {
            return true; // Return true if the update was successful
        } else {
            return false; // Return false if no rows were affected
        }
    } catch (PDOException $e) {
        // Handle any errors that occur during the process
        echo "Error: " . $e->getMessage();
        return false; // Return false in case of any errors
    }
}

function getPosts() {
    global $pdo;

    try {
        // Prepare and execute the SQL query
        $sql = "SELECT * FROM blog_posts";
        $stmt = $pdo->query($sql);

        // Fetch all rows as associative array
        $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Close the cursor to free up resources
        $stmt->closeCursor();

        // Return the fetched posts
        return $posts;
    } catch (PDOException $e) {
        // Handle the error, or return an appropriate response
        error_log("Error fetching posts: " . $e->getMessage());
        return false;
    }
}

// Function to get a single blog post by ID
function getPostById($id) {
    global $conn;
    $id = validate_input($id);
    $sql = "SELECT * FROM blog_posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->fetch_assoc();
}

// Fungsi menambah detail blog post
function addBlogPostDetail($blog_post_id, $section_title, $section_content) {
    global $pdo;
    $blog_post_id = intval($blog_post_id);
    $section_title = clean_input($section_title);
    $section_content = clean_input($section_content);
    
    $sql = "INSERT INTO blog_post_details (blog_post_id, section_title, section_content) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$blog_post_id, $section_title, $section_content]);
}

// Fungsi mengedit detail blog post
// Fungsi mengedit detail blog post
function editBlogPostDetail($id, $title, $content, $image_url) {
    global $pdo;

    // Prepare the SQL statement
    $stmt = $pdo->prepare("UPDATE blog_post_details SET title = ?, content = ?, image_url = ? WHERE id = ?");

    // Bind the parameters
    $stmt->bindParam(1, $title, PDO::PARAM_STR);
    $stmt->bindParam(2, $content, PDO::PARAM_STR);
    $stmt->bindParam(3, $image_url, PDO::PARAM_STR);
    $stmt->bindParam(4, $id, PDO::PARAM_INT);

    // Execute the statement and return the result
    return $stmt->execute();
}


// Fungsi mengambil detail blog post berdasarkan blog_post_id
function getBlogPostDetails($blog_post_id) {
    global $pdo;
    $blog_post_id = intval($blog_post_id);
    
    $sql = "SELECT * FROM blog_post_details WHERE blog_post_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$blog_post_id]);
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
