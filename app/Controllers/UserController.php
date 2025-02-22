<?php
require_once '../core/Controller.php';
require_once '../app/Models/User.php';
class UserController extends Controller
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new User();
    }
    public function register()
    {
        $this->view('auth/register');
    }
    public function login()
    {

        $this->view('auth/login');
    }
    public function store()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            if ($this->userModel->exists($email)) {
                echo "ERROR<a href='/auth/login'>ORQAGA</a></p>";
                return;
            }

            $id = $this->userModel->create($name, $email, $password);

            if ($id) {
                $_SESSION['user_id'] = $id;
                $_SESSION['user_email'] = $email;
                header("Location: /post/index");
                exit();
            } else {
                echo "ERROR<a href='/auth/login'>ORQAGA</a></p>";
            }
        }
    }
    public function Loginstore()
    {
        // session_start(); 

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            $user = $this->userModel->findByEmail($email);

            if (!$user) {
                echo "ERROR<a href='/auth/login'>ORQAGA</a></p>";
                return;
            }

            if (!password_verify($password, $user['password'])) {
                echo "ERROR<a href='/auth/login'>ORQAGA</a></p>";
                return;
            }
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];

            header("Location: /post/index");
            exit();
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /auth/register");
        exit();
    }
}
