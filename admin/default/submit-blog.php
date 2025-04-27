<?php
require_once('include/Session.php');
require_once('include/Functions.php');
require_once('include/Crud.php');
require_once("include/Controller.php");

$Controller = new Controller();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $categories = $_POST['category'] ?? [];
        $tags = $_POST['tags'] ?? [];
        $author_id = $_SESSION['admin_id']; // Replace with the actual user session ID
        $status = $_POST['status'] ?? 'draft'; // Default to draft if no status is provided

        // Generate a slug
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-')) ?: uniqid('post-');

        // Insert into posts table
        $postData = [
            'title' => $title,
            'slug' => $slug,
            'content' => $content,
            'author_id' => $author_id,
            'status' => $status
        ];

        // If published, add the current timestamp to published_at
        if ($status == 'published') {
            $postData['published_at'] = date('Y-m-d H:i:s');
        }

        $postId = $Controller->posts($postData);

        if (!$postId) {
            throw new Exception("Failed to create post.");
        }

        $crudInstance = $Controller->getCrud();

        // Insert categories into post_categories table
        if (!empty($categories)) {
            foreach ($categories as $categoryId) {
                $crudInstance->create(['post_id' => $postId, 'category_id' => $categoryId], 'post_categories');
            }
        }

        // Insert tags into post_tags table
        if (!empty($tags)) {
            foreach ($tags as $tagId) {
                $Controller->post_tags(['post_id' => $postId, 'tag_id' => $tagId]);
            }
        }

        // Handle Media Upload
        if (!empty($_FILES['media']['name'][0])) {
            $uploadDir = 'uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true); // Create the directory if it doesn't exist
            }

            foreach ($_FILES['media']['name'] as $key => $filename) {
                $tmpName = $_FILES['media']['tmp_name'][$key];
                $fileType = $_FILES['media']['type'][$key];
                $fileSize = $_FILES['media']['size'][$key];

                // Ensure file is uploaded properly
                if (empty($tmpName) || !file_exists($tmpName)) {
                    throw new Exception("Failed to upload file: $filename");
                }

                // Validate file is an image (jpg, jpeg, png, gif)
                $allowedMimeTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!in_array($fileType, $allowedMimeTypes)) {
                    throw new Exception("Invalid file format for $filename. Only jpg, jpeg, png, and gif are allowed.");
                }

                // Set max file size
                $maxFileSize = 5 * 1024 * 1024; // 5MB
                if ($fileSize > $maxFileSize) {
                    throw new Exception("File $filename exceeds the maximum allowed size of 5MB.");
                }

                // Generate a unique file name
                $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $uniqueFileName = uniqid() . '_' . basename($filename);

                // Convert .jpg to .jpeg
                if ($fileExtension === 'jpg') {
                    $uniqueFileName = str_replace('.jpg', '.jpeg', $uniqueFileName);
                    $fileType = 'image/jpeg'; // Update MIME type to image/jpeg
                }

                $filePath = $uploadDir . $uniqueFileName;

                // Move the uploaded file
                if (move_uploaded_file($tmpName, $filePath)) {
                    // Insert media details into the database
                    $Controller->blog_media([
                        'post_id' => $postId,
                        'file_name' => $uniqueFileName,
                        'file_path' => $filePath,
                        'file_type' => $fileType // Store the actual MIME type
                    ]);
                } else {
                    throw new Exception("Failed to move uploaded file: $filename");
                }
            }
        }

        $_SESSION['successMsg'] = $status == 'draft' ? "Blog saved to Draft!" : "Blog Published Successfully!";
        header('Location: create-post.php');
        exit();
    } catch (Exception $e) {
        $_SESSION['errorMsg'] = "Error: " . $e->getMessage();
        header('Location: create-post.php');
        exit();
    }
}

?>