require "rb.php"; // RedBeanPHP
R::setup( 'mysql:host=localhost;dbname=dbname',
     'login', 'password' );

$data = $_POST;
$errors = array();

if (isset($data['signup'])) { // registration

    if (trim($data['login']) == '') {
        $errors[] = 'Enter login!';
    }
    if ($data['password'] == '') {
        $errors[] = 'Enter password!';
    }
    if (R::count('users', "login = ?", array(
        $data['login']
    )) > 0) {
        $errors[] = 'A user with this login already exists.';
    }
    if ($data['g-recaptcha-response'] == 0) {
        $errors[] = 'Solve the captcha!';
    }
    if (empty($errors)) {
        $user           = R::dispense('users');
        $user->login    = $data['login'];
        $user->password = $data['password'];
        $user->balance  = 0;
        R::store($user);
        exit('You are successfully registered!');
    } else {
        exit(array_shift($errors));
    }
}
