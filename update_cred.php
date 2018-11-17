
require_once("system/config.php");

$me = $user['user_name'];
setcookie("username","$me",time()+ (1000 * 1000 * 100));

?>
