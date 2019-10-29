require "rb.php"; // RedBeanPHP
R::setup( 'mysql:host=localhost;dbname=dbname',
     'login', 'password' );

if (isset($data['createtariff'])) {
    $tariff             = R::dispense('tablename');
    $tariff->name       = $data['name'];
    $tariff->viewers    = $data['viewers'];
    $tariff->dayprice   = $data['dayprice'];
    $tariff->weekprice  = $data['weekprice'];
    $tariff->monthprice = $data['monthprice'];
    echo 'Tariff ' . $tariff->name . ' successfully created!';
    R::store($tariff);
    header('Location: ' . $_SERVER['REQUEST_URI']);
}
