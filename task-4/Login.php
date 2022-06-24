<?php

class User {

    /**
     * The user name
     *
     * @var string
     */
    protected $name;

    /**
     * Login status.
     *
     * @var bool
     */
    public $isLogged = FALSE;


    /**
     * The session id.
     *
     * @var string|null
     */
    protected $sessionId = null;

    /**
     * User constructor.
     *
     * @param $username
     *  User machine name.
     */
    function __construct($username) {
        $this->name = $username;
    }

    /**
     * User login.
     *
     * @var string $password
     */
    public function logIn($password) {
        if (empty($_COOKIE["SESSION"]) || is_null($this->sessionId)) {
            if ($this->validateCretentials($this->getName(), $password)) {
                $salt = rand();
                $this->sessionId = base64_encode($this->getName() . $salt);
                setcookie("SESSION", $this->sessionId);
                $this->isLogged = true;
            }
        }
        if ($_COOKIE["SESSION"] == $this->sessionId) {
            echo "user is already logged in.";
        }
    }

    /**
     * Get user name.
     *
     * @return string
     */
    public function getName() {
        return $this->name ;
    }

    /**
     * Validate user credentials.
     *
     * @param $user_name
     *   User machine name.
     * @param $password
     *   User password.
     *
     * @return bool
     */
    public function validateCretentials($user_name, $password) {
        return true;
    }

    /**
     * User logout.
     *
     * @var string|null
     */
    public function logOut() {
        $this->isLogged = FALSE;
        $this->sessionId = NULL;
    }
}

$user = new User("username");
$user->logIn( "password");
echo $user->isLogged;
$user->logIn( "password");
$user->logOut();
echo $user->isLogged;
echo $this->sessionId;
