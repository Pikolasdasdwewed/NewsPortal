<?php
class modelAdmin {

    public static function userAuthentication() {
        if (isset($_SESSION['sessionId'])) return true;

        if (!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $pass  = (string)$_POST['password'];

            if (!$email) return false;

            $db = new Database();
            $user = $db->getOne('SELECT * FROM users WHERE email = "'.addslashes($email).'" LIMIT 1');

            if (!$user) return false;

            // password в БД должен быть хэш (как обычно). Если вдруг нет — оставил fallback.
            $ok = false;
            if (!empty($user['password']) && password_verify($pass, $user['password'])) $ok = true;
            if (!$ok && !empty($user['password']) && $pass === $user['password']) $ok = true;

            if ($ok) {
                $_SESSION['sessionId'] = session_id();
                $_SESSION['userId']    = $user['id'];
                $_SESSION['username']  = $user['username'];
                $_SESSION['status']    = $user['status'];
                return true;
            }
        }

        return false;
    }

    public static function userLogout() {
        unset($_SESSION['sessionId'], $_SESSION['userId'], $_SESSION['username'], $_SESSION['status']);
        session_destroy();
    }
}
?>
