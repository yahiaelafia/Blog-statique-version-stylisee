  <?php
  class Users {
    private  $conn ;



  public function __construct($db) {
        $this->conn = $db;
    }



    public function register($username, $email, $password) {
        try {
            $query = "INSERT INTO users (username, email, password) 
                        VALUES (:username, :email, :password)";
            $stmt = $this->conn->prepare($query);
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashed);

            if($stmt->execute()) {
                return true;
            }
            return false;

        } catch(PDOException $e) {

            return false;   
        }
    }

    public function login($email, $password) {
        try {
            $query = "SELECT id, username, password  FROM users WHERE email = :email";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':email', $email);
            $stmt->execute();


            if ($stmt->rowCount() > 0) {
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                if (password_verify($password, $row['password'])) {
                    return $row;
                }
            }
            return false;
        } catch(PDOException $e) {
            return false;
        }
    }
      }