<?php
    include "../../config/database.php";
    session_start();

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // handle register  
    if(isset($_POST['register'])){

        // Kiểm tra sự trùng lặp của username hoặc email
        $checkStmt = $conn->prepare("SELECT * FROM user WHERE username = ? OR email = ?");
        if ($checkStmt === false) {
            die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
        }

        $checkStmt->bind_param("ss", $username, $email);
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // Kiểm tra xem username hay email đã tồn tại
            $user = $checkResult->fetch_assoc();
            if ($user['username'] === $username) {
                header("Location: ../../?action=account&error=Tên người dùng đã tồn tại");
                exit();
            } elseif ($user['email'] === $email) {
                header("Location: ../../?action=account&error=Email đã được sử dụng");
                exit();
            }
        }else{
            $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
            if ($stmt === false) {
                die('Chuẩn bị câu lệnh thất bại: ' . $conn->error);
            }

            $stmt->bind_param("sss", $username, $email, $password);

            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                header("Location: ../../");
                exit();
            } else {
                echo "Lỗi khi insert dữ liệu: " . $stmt->error;
            }

            $checkStmt->close();
            $stmt->close();
        }

        
    } else if (isset($_POST['login'])) {
        $usernameLogin = $_POST["usernameLogin"];
        $passwordLogin = $_POST["passwordLogin"];

        $stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $usernameLogin, $passwordLogin);

        $stmt->execute();
        $stmt->close();

        $stmt2 = $conn->prepare("SELECT user_id, role FROM user WHERE username = ? AND password = ?");

        $stmt2->bind_param("ss", $usernameLogin, $passwordLogin);
        $stmt2->execute();
        $result = $stmt2->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc(); 
            $_SESSION['username'] = $usernameLogin;
            $_SESSION['user_id'] = $user['user_id']; 
            $_SESSION['role'] = $user['role']; 
            if($_SESSION['role']){
                echo $_SESSION['role'];
            }else{
                echo "Không có quyền";
            }
            
            echo $_SESSION['user_id'];
            echo $_SESSION['username'];
            if ($user['role'] == 1) {
                header("Location: ../../admin/index_admin.php"); // Chuyển đến trang admin
                exit();
            } else {
                header("Location: ../../"); 
                exit();
            }
        }else{
            header("Location: ../../?action=account&error-login=Tên đăng nhập hoặc mật khẩu không đúng");
        }
        $stmt2->close();
    }

    $conn->close();
?>