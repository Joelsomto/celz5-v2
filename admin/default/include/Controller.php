<?php
require_once('Crud.php');

class Controller
{
    private $crud;

    public function __construct()
    {
        $this->crud = new Crud();
    }

    public function getCrud() {
        return $this->crud;
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
            $query = "SELECT COUNT(*) FROM users WHERE email = :email AND role = 'A'";

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
                return false;
            } else {
                // Handle database query error
                throw new Exception("Unexpected query result");
            }
        } catch (Exception $e) {
            // Handle any exceptions that may occur during database interaction
            error_log("Database error: " . $e->getMessage()); // Log the error for debugging
            return false; // Return false to indicate a failure
        }
    }
    
    


    public function getCategories()
    {
        $query = "SELECT * FROM `categories`";
        return $this->crud->read($query);
    }


    public function createCategories($data)
    {
        $table = "categories";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }

    public function createService($data)
    {
        $table = "services";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }
    public function createPrograms($data)
    {
        $table = "programs";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }
    
//     public function getServices()
//     {
//         $query = "SELECT 
//     s.service_id,
//     s.title,
//     s.description,
//     s.start_time,
//     s.end_time,
//     s.service_link,
//     s.backup_service_link,
//     s.status,
//     s.created_at,
//     s.updated_at,
//     c.category,
//     COALESCE(SUM(v.viewers), 0) AS total_viewers
// FROM 
//     services s
// LEFT JOIN 
//     viewers v ON s.service_id = v.service_id
// LEFT JOIN
//     categories c ON s.category_id = c.cat_id
// GROUP BY 
//     s.service_id
// ORDER BY 
//     s.created_at DESC;

// ORDER BY s.created_at DESC
// LIMIT 10 OFFSET 0; -- Fetch 10 records starting from the first
// ";
//         return $this->crud->read($query);
//     }



    public function getServices($start = 0, $length = 10, $searchValue = null) {
        $query = "
            SELECT 
                s.service_id, 
                s.title, 
                s.description, 
                s.start_time, 
                s.end_time, 
                s.service_link, 
                s.backup_service_link, 
                s.status, 
                s.created_at, 
                s.updated_at, 
                c.category, 
                COALESCE(SUM(v.viewers), 0) AS total_viewers
            FROM 
                services s
            LEFT JOIN 
                viewers v ON s.service_id = v.service_id
            LEFT JOIN 
                categories c ON s.category_id = c.cat_id
            WHERE 
                1=1
                " . (!empty($searchValue) ? "AND (s.title LIKE :search OR s.description LIKE :search)" : "") . "
            GROUP BY 
                s.service_id
            ORDER BY 
                s.created_at DESC
            LIMIT " . (int)$start . ", " . (int)$length;

        $params = [];

        if (!empty($searchValue)) {
            $params[':search'] = '%' . $searchValue . '%';
        }

        return $this->crud->read($query, $params);
    }

    public function getOngoingServices($start = 0, $length = 10, $searchValue = null) {
        $query = "
            SELECT 
                s.service_id, 
                s.title, 
                s.description, 
                s.start_time, 
                s.end_time, 
                s.service_link, 
                s.backup_service_link, 
                s.status, 
                s.created_at, 
                s.updated_at, 
                c.category, 
                COALESCE(SUM(v.viewers), 0) AS total_viewers
            FROM 
                services s
            LEFT JOIN 
                viewers v ON s.service_id = v.service_id
            LEFT JOIN 
                categories c ON s.category_id = c.cat_id
            WHERE 
                s.status = 'active' -- Only include active services
                -- AND (s.start_time IS NULL OR NOW() >= s.start_time)
                -- AND (s.end_time IS NULL OR NOW() <= s.end_time)
                " . (!empty($searchValue) ? "AND (s.title LIKE :search OR s.description LIKE :search)" : "") . "
            GROUP BY 
                s.service_id
            ORDER BY 
                s.created_at DESC
            LIMIT " . (int)$start . ", " . (int)$length;

        $params = [];

        if (!empty($searchValue)) {
            $params[':search'] = '%' . $searchValue . '%';
        }

        return $this->crud->read($query, $params);
    }
    public function getServicesById($service_id)
    {
        $query = "SELECT * FROM services WHERE service_id = :service_id";
        
        $params = array('service_id' => $service_id);
    
        return $this->crud->read($query, $params);
    }
    public function updateService($service_id, $title, $description, $category_id, $start_time, $end_time, $service_link, $backup_service_link, $status, $slug)
    {
        // Prepare the update SQL query
        $query = "UPDATE services SET 
                    title = :title,
                    description = :description, 
                    start_time = :start_time, 
                    end_time = :end_time, 
                    service_link = :service_link,
                    backup_service_link = :backup_service_link, 
                    status = :status, 
                    slug = :slug,
                    category_id = :category_id,
                    updated_at = NOW() 
                  WHERE service_id = :service_id";
    
        $params = [
            ':service_id' => $service_id,
            ':title' => $title,
            ':description' => $description,
            ':start_time' => $start_time,
            ':end_time' => $end_time,
            ':service_link' => $service_link,
            ':backup_service_link' => $backup_service_link,
            ':status' => $status,
            ':slug' => $slug,
            ':category_id' => $category_id
        ];
    
        return $this->crud->update($query, $params); 
    }
    
    public function getServiceByIdForViewServicePage($service_id)
    {
        $query = "
            SELECT 
                s.service_id,
                s.title,
                s.description,
                s.start_time,
                s.end_time,
                s.service_link,
                s.backup_service_link,
                s.category_id,
                s.status,
                s.slug,
                s.created_at AS service_created_at,
                s.updated_at AS service_updated_at,
                COALESCE(SUM(v.viewers), 0) AS total_viewers
            FROM 
                services s
            LEFT JOIN 
                viewers v ON s.service_id = v.service_id
            WHERE 
                s.service_id = :service_id
            GROUP BY 
                s.service_id
        ";
    
        // Parameters for the query
        $params = array('service_id' => $service_id);
    
        // Execute the query and return the result
        return $this->crud->read($query, $params);
    }
    public function getParticipantsByServiceId($service_id)
    {
        $query = "
            SELECT 
                u.*,
                v.*
            FROM 
                viewers v
            JOIN 
                users u ON v.user_id = u.user_id
            WHERE 
                v.service_id = :service_id
        ";

        $params = array('service_id' => $service_id);

        return $this->crud->read($query, $params);
    }

    public function getChurches()
    {
        $query = "SELECT * FROM `churches` ";
        return $this->crud->read($query);

    }
    public function getBlogCategories()
    {
        $query = "SELECT * FROM `blog_categories` ";
        return $this->crud->read($query);
    }
    public function getTags()
    {
        $query = "SELECT * FROM `tags` ";
        return $this->crud->read($query);
    }

    public function blog_media($data)
    {
        $table = "blog_media";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }
    public function posts($data)
    {
        $table = "posts";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }
    public function post_tags($data)
    {
        $table = "post_tags";
        $lastInsertedId = $this->crud->create($data, $table);
        return $lastInsertedId;
    }

    public function updateServiceStatus($service_id, $status)
    {
        try {
            $query = "UPDATE `services` SET `status` = :status WHERE `service_id` = :service_id";
            $params = array(':status' => $status, ':service_id' => $service_id);
    
            return $this->crud->update($query, $params);
        } catch (Exception $e) {
            return false;
        }
    }
    
}
