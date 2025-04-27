<?php

require_once('Crud.php');

class Controller
{
    private $crud;

    public function __construct()
    {
        $this->crud = new Crud();
    }

    public function registerUser($data)
    {
        $table = "users";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }
    public function isUserRegistered($email, $conn)
    {
        try {
            $query = "SELECT COUNT(*) FROM users WHERE email = :email";

            $stmt = $conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            $count = $stmt->fetchColumn();

            return $count > 0;
        } catch (PDOException $e) {
            // Handle database query errors here
            return false;
        }
    }
    public function verifyUser($email)
    {
        $sql = "SELECT * FROM users WHERE email = :email";
        $params = array(':email' => $email);

        try {
            $result = $this->crud->read($sql, $params);
            if ($result && count($result) === 1) {
                $row = $result[0]; // Get the first row
                return $row; // Return user data
            } elseif ($result && count($result) === 0) {
                // User not found
                return "User not found";
            } else {
                // Handle database query error
                return "Database error";
            }
        } catch (Exception $e) {
            // Handle any exceptions that may occur during database interaction
            return "Error: " . $e->getMessage();
        }
    }

    public function getChurches()
    {
        $query = "SELECT * FROM `churches`";
        return $this->crud->read($query);
    }

    public function getCategories()
    {
        $query = "SELECT * FROM `categories`";
        return $this->crud->read($query);
    }
    public function getServices()
    {
        $query = "SELECT * FROM `services` WHERE status = 'active'";
        return $this->crud->read($query);
    }
    public function getServicesWithSlug($slug)
    {
        $query = "SELECT * FROM services WHERE slug = :slug";
        $params = array(':slug' => $slug);

        return $this->crud->read($query, $params);
    }
    public function getServicesWithId($service_id)
    {
        $query = "SELECT * FROM services WHERE service_id = :service_id";
        $params = array(':service_id' => $service_id);

        return $this->crud->read($query, $params);
    }

    public function getUpComingPrograms()
    {
        $query = "SELECT * FROM programs WHERE CURDATE() <= end_date ORDER BY start_date ASC";
        return $this->crud->read($query);
    }

    public function registrations($data)
    {
        $table = "registrations";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }
    public function isProgramRegistered($user_id, $program_id)
    {
        $query = "SELECT COUNT(*) as count FROM registrations 
                  WHERE user_id = :user_id AND program_id = :program_id";
        $params = array(':user_id' => $user_id, ':program_id' => $program_id);
        $result = $this->crud->read($query, $params);
        return $result[0]['count'] > 0;
    }

    public function contact_messages($data)
    {
        $table = "contact_messages";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }
    public function submitComments($data)
    {
        $table = "comments";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }

    public function submitReply($data)
    {
        $table = "comments";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }

    public function getComments($service_id)
    {
        $query = "
            SELECT 
                c.comment_id,
                c.service_id,
                c.parent_id,
                c.comment_text,
                c.created_at,
                u.title,
                u.first_name
            FROM 
                comments c
            JOIN 
                users u 
            ON 
                c.user_id = u.user_id
            WHERE 
                c.service_id = :service_id
                AND DATE(c.created_at) = CURDATE()
            ORDER BY 
                c.created_at DESC;
        ";

        $params = [':service_id' => $service_id];

        try {
            return $this->crud->read($query, $params);
        } catch (Exception $e) {
            error_log("Error fetching comments: " . $e->getMessage());
            return false; // Return false in case of error
        }
    }

    public function getReplies($parent_id)
    {
        $query = "
            SELECT 
                c.comment_id,
                c.service_id,
                c.parent_id,
                c.comment_text,
                c.created_at,
                u.title,
                u.first_name
            FROM 
                comments c
            JOIN 
                users u 
            ON 
                c.user_id = u.user_id
            WHERE 
                c.parent_id = :parent_id
            ORDER BY 
                c.created_at ASC;
        ";

        $params = [':parent_id' => $parent_id];

        try {
            return $this->crud->read($query, $params);
        } catch (Exception $e) {
            error_log("Error fetching replies: " . $e->getMessage());
            return false;
        }
    }


    public function getUserDetails($user_id)
    {
        $query = "SELECT * FROM users WHERE user_id = :user_id LIMIT 1";
        $params = [':user_id' => $user_id];
        return $this->crud->read($query, $params);
    }

    // public function viewers($data)
    // {
    //     $table = "viewers";
    //     $lastInsertedId = $this->crud->create($data, $table);
    //     return $lastInsertedId;
    // }

    public function viewers($data)
    {
        $table = "viewers";

        // Check if a row already exists for the given service_id and user_id
        $existingViewer = $this->crud->read(
            "SELECT * FROM $table WHERE service_id = :service_id AND user_id = :user_id",
            ['service_id' => $data['service_id'], 'user_id' => $data['user_id']]
        );

        if ($existingViewer) {
            // If a record exists, update the viewers count by adding the new viewers
            $data['viewers'] += $existingViewer[0]['viewers']; // Add new viewers to existing viewers
            $this->crud->update(
                $table,
                ['viewers' => $data['viewers']],
                ['service_id' => $data['service_id'], 'user_id' => $data['user_id']]
            );
        } else {
            // If no record exists, insert a new record
            $this->crud->create($data, $table);
        }

        return true; // Return true to indicate success
    }


    public function programTime()
    {
        $currentTimestamp = time();
        $readableTime = date("Y-m-d H:i:s", $currentTimestamp);

        $query = "SELECT * FROM programs WHERE program_date > :readableTime ORDER BY program_date DESC LIMIT 1";
        $params = array(':readableTime' => $readableTime);

        // Assuming $this->crud->read() uses prepared statements and parameter binding
        return $this->crud->read($query, $params);
    }
    public function getVodPrograms()
    {

        $query = "SELECT * 
        FROM programs 
        WHERE program_type = 'vod'
        ORDER BY program_id DESC
        ;
        ";
        return $this->crud->read($query);
    }

    public function vodIndex()
    {
        $query = "SELECT * 
        FROM programs 
        WHERE program_type = 'vod'
        ORDER BY program_id ASC
        LIMIT 2;
        ";
        return $this->crud->read($query);
    }

    public function salvation($data)
    {
        $table = "salvation";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }

    public function get_group()
    {
        $query = "SELECT * FROM `alzarse_group` ";
        return $this->crud->read($query);
    }

    public function alzarse_register($data)
    {
        $table = "alzarse_register";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }



    public function getPrograms_spainish()
    {
        $query = "SELECT * 
        FROM programs_spainish
        WHERE program_type = 'livestream'
        ORDER BY program_id DESC
        LIMIT 1;
        ";
        return $this->crud->read($query);
    }
    public function getCourses()
    {
        $query = "SELECT * FROM `courses`";
        return $this->crud->read($query);
    }



    public function testimonies($data)
    {
        $table = "testimonies";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }

    public function prayer_request($data)
    {
        $table = "prayer_request";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }
    // public function newsletters($data)
    // {
    //     $table = "newsletters";
    //     $lastInsertedId = $this->crud->create($data, $table);
    //     return $lastInsertedId;
    // }
    public function newsletters($data)
    {
        $email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);

        if (!$email) {
            echo json_encode(['status' => 'invalid', 'message' => 'Please enter a valid email address.']);
            return;
        }

        // Check if the email already exists
        $query = "SELECT * FROM newsletters WHERE email = :email";
        $params = ['email' => $email];
        $existingSubscriber = $this->crud->read($query, $params);

        if ($existingSubscriber) {
            echo json_encode(['status' => 'exists', 'message' => 'This email is already subscribed.']);
            return;
        }

        // Insert new subscriber (adjusted this line)
        $insertData = ['email' => $email];
        $table = "newsletters";
        $insert = $this->crud->create($insertData, $table);  // Correct parameter order

        if ($insert) {
            echo json_encode(['status' => 'success', 'message' => 'You have successfully subscribed to our newsletter!']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Something went wrong. Please try again.']);
        }
    }


    public function getBlogPosts($limit = 10, $offset = 0)
    {
        $query = "SELECT p.post_id, p.title, p.slug, p.content, p.published_at, 
                         COALESCE(GROUP_CONCAT(DISTINCT CONCAT(bm.file_path, '|', bm.file_name, '|', bm.file_type) SEPARATOR ';'), '') AS media
                  FROM posts p
                  LEFT JOIN blog_media bm ON p.post_id = bm.post_id
                  WHERE p.status = 'published'
                  GROUP BY p.post_id
                  ORDER BY p.published_at DESC
                  LIMIT :limit OFFSET :offset";
    
        $params = [
            'limit' => (int)$limit,  // Cast to integer
            'offset' => (int)$offset // Cast to integer
        ];
    
        return $this->crud->read($query, $params);
    }
    
    public function GetRecentAnnouncements($limit = 10, $offset = 0)
    {
        $query = "SELECT p.post_id, p.title, p.slug, p.content, p.excerpt, p.published_at,
                         COALESCE(GROUP_CONCAT(DISTINCT CONCAT(bm.file_path, '|', bm.file_name, '|', bm.file_type) SEPARATOR ';'), '') AS media
                  FROM posts p
                  LEFT JOIN blog_media bm ON p.post_id = bm.post_id
                  WHERE p.status = 'published'
                  AND (
                      p.post_id IN (
                          SELECT pc.post_id 
                          FROM post_categories pc
                          JOIN blog_categories bc ON pc.category_id = bc.category_id
                          WHERE bc.name = 'Announcements'
                      )
                      OR p.post_id IN (
                          SELECT pt.post_id 
                          FROM post_tags pt
                          JOIN tags t ON pt.tag_id = t.tag_id
                          WHERE t.name = 'Announcements'
                      )
                  )
                  GROUP BY p.post_id
                  ORDER BY p.published_at DESC
                  LIMIT :limit OFFSET :offset";
    
        $params = [
            'limit' => (int)$limit,  // Cast to integer
            'offset' => (int)$offset // Cast to integer
        ];
    
        return $this->crud->read($query, $params);
    }
    
    public function countBlogPosts()
    {
        $query = "SELECT COUNT(*) AS total FROM posts WHERE status = 'published'";
        $result = $this->crud->read($query);
        return $result[0]['total'] ?? 0;
    }
        
    public function getPostsByFilter($postSlug = null, $categorySlug = null, $tagSlug = null)
    {
        $query = "SELECT p.post_id, p.title, p.slug AS post_slug, p.content, p.published_at, 
                         GROUP_CONCAT(DISTINCT CONCAT(c.name, '|', c.slug) ORDER BY c.name ASC SEPARATOR ', ') AS categories,
                         GROUP_CONCAT(DISTINCT CONCAT(t.name, '|', t.slug) ORDER BY t.name ASC SEPARATOR ', ') AS tags,
                         COALESCE(GROUP_CONCAT(DISTINCT CONCAT(bm.file_path, '|', bm.file_name, '|', bm.file_type) SEPARATOR ';'), '') AS media
                  FROM posts p
                  LEFT JOIN post_categories pc ON p.post_id = pc.post_id
                  LEFT JOIN blog_categories c ON pc.category_id = c.category_id
                  LEFT JOIN post_tags pt ON p.post_id = pt.post_id
                  LEFT JOIN tags t ON pt.tag_id = t.tag_id
                  LEFT JOIN blog_media bm ON p.post_id = bm.post_id
                  WHERE p.status = 'published'";
    
        // Dynamically add conditions
        $conditions = [];
        $params = [];
    
        if ($postSlug) {
            $conditions[] = "p.slug = :post_slug"; // Filter by post slug
            $params['post_slug'] = $postSlug;
        }
        if ($categorySlug) {
            $conditions[] = "c.slug = :category_slug"; // Filter by category slug
            $params['category_slug'] = $categorySlug;
        }
        if ($tagSlug) {
            $conditions[] = "t.slug = :tag_slug"; // Filter by tag slug
            $params['tag_slug'] = $tagSlug;
        }
    
        // If conditions exist, append them
        if (!empty($conditions)) {
            $query .= " AND " . implode(" AND ", $conditions);
        }
    
        // Group by post
        $query .= " GROUP BY p.post_id ORDER BY p.published_at DESC";
    
        // Debugging
        error_log("Query: " . $query);
        error_log("Parameters: " . print_r($params, true));
    
        return $this->crud->read($query, $params);
    }
    
    
    
    public function getBlogPostsByFilter($categorySlug = null, $tagSlug = null, $limit = 6, $offset = 0)
{
    $query = "SELECT p.post_id, p.title, p.slug AS post_slug, p.content, p.published_at,
                     COALESCE(GROUP_CONCAT(DISTINCT CONCAT(bm.file_path, '|', bm.file_name, '|', bm.file_type) SEPARATOR ';'), '') AS media
              FROM posts p
              LEFT JOIN blog_media bm ON p.post_id = bm.post_id
              LEFT JOIN post_categories pc ON p.post_id = pc.post_id
              LEFT JOIN blog_categories c ON pc.category_id = c.category_id
              LEFT JOIN post_tags pt ON p.post_id = pt.post_id
              LEFT JOIN tags t ON pt.tag_id = t.tag_id
              WHERE p.status = 'published'";

    // Filter conditions
    $conditions = [];
    $params = [];

    if ($categorySlug) {
        $conditions[] = "c.slug = :category_slug";
        $params['category_slug'] = $categorySlug;
    }

    if ($tagSlug) {
        $conditions[] = "t.slug = :tag_slug";
        $params['tag_slug'] = $tagSlug;
    }

    if (!empty($conditions)) {
        $query .= " AND " . implode(" AND ", $conditions);
    }

    // Add pagination
    $query .= " GROUP BY p.post_id ORDER BY p.published_at DESC LIMIT :limit OFFSET :offset";
    $params['limit'] = (int) $limit;
    $params['offset'] = (int) $offset;

    return $this->crud->read($query, $params);
}

    public function countFilteredPosts($categorySlug = null, $tagSlug = null)
    {
        $query = "SELECT COUNT(DISTINCT p.post_id) AS total FROM posts p
                LEFT JOIN post_categories pc ON p.post_id = pc.post_id
                LEFT JOIN blog_categories c ON pc.category_id = c.category_id
                LEFT JOIN post_tags pt ON p.post_id = pt.post_id
                LEFT JOIN tags t ON pt.tag_id = t.tag_id
                WHERE p.status = 'published'";

        $conditions = [];
        $params = [];

        if ($categorySlug) {
            $conditions[] = "c.slug = :category_slug";
            $params['category_slug'] = $categorySlug;
        }

        if ($tagSlug) {
            $conditions[] = "t.slug = :tag_slug";
            $params['tag_slug'] = $tagSlug;
        }

        if (!empty($conditions)) {
            $query .= " AND " . implode(" AND ", $conditions);
        }

        $result = $this->crud->read($query, $params);
        return $result[0]['total'] ?? 0;
    }

    public function getRecentPosts() {
        $query = "SELECT p.post_id, p.title, p.slug, p.created_at, 
                GROUP_CONCAT(bm.file_path ORDER BY bm.file_path ASC) AS media
            FROM posts p
            LEFT JOIN blog_media bm ON p.post_id = bm.post_id
            WHERE p.status = 'published'
            GROUP BY p.post_id, p.title, p.slug, p.created_at
            ORDER BY p.published_at DESC 
            LIMIT 4;
            ";
        return $this->crud->read($query);
    }
    public function getRecentPostsForIndex() {
        $query = "SELECT p.post_id, p.title, p.slug, p.created_at, 
        GROUP_CONCAT(bm.file_path ORDER BY bm.file_path ASC) AS media
        FROM posts p
        LEFT JOIN blog_media bm ON p.post_id = bm.post_id
        WHERE p.status = 'published'
        GROUP BY p.post_id, p.title, p.slug, p.created_at
        ORDER BY p.published_at DESC 
        LIMIT 3;
        ";
        return $this->crud->read($query);
    }
    


}
