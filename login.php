require "rb.php"; // RedBeanPHP
R::setup( 'mysql:host=localhost;dbname=dbname',
     'login', 'password' );

$data = $_POST;
$errors = array();

if (isset($data['do_login'])) { //авторизация
    $user = R::findOne('users', "login = ?", array(
        $data['login']
    ));
    if ($user) {
        if ($data['password'] == $user->password) {
            $_SESSION['logged_user'] = $user;
            header('Location: /');
        } else {
            $errors[] = 'Неверно введён пароль!';
        }
    } else {
        $errors[] = 'Пользователь с таким логином не найден!';
    }
    if (!empty($errors)) {
        exit(array_shift($errors));
    }
}
