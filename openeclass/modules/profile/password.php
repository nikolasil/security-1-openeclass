<?PHP
/*========================================================================
*   Open eClass 2.3
*   E-learning and Course Management System
* ========================================================================
*  Copyright(c) 2003-2010  Greek Universities Network - GUnet
*  A full copyright notice can be read in "/info/copyright.txt".
*
*  Developers Group:	Costas Tsibanis <k.tsibanis@noc.uoa.gr>
*			Yannis Exidaridis <jexi@noc.uoa.gr>
*			Alexandros Diamantidis <adia@noc.uoa.gr>
*			Tilemachos Raptis <traptis@noc.uoa.gr>
*
*  For a full list of contributors, see "credits.txt".
*
*  Open eClass is an open platform distributed in the hope that it will
*  be useful (without any warranty), under the terms of the GNU (General
*  Public License) as published by the Free Software Foundation.
*  The full license can be read in "/info/license/license_gpl.txt".
*
*  Contact address: 	GUnet Asynchronous eLearning Group,
*  			Network Operations Center, University of Athens,
*  			Panepistimiopolis Ilissia, 15784, Athens, Greece
*  			eMail: info@openeclass.org
* =========================================================================*/

/**
 * Index
 *
 * @author Evelthon Prodromou <eprodromou@upnet.gr>
 * @version $Id: password.php,v 1.9 2008-09-17 08:01:05 traptis Exp $
 *
 * @abstract Password change component
 *
 */
$require_login = true;
$helpTopic = 'Profile';
$require_valid_uid = TRUE;

include '../../include/baseTheme.php';


include '../../kerberosclan/csrf_utils.php';
if (!isset($_SESSION['password_first_entry'])) {
	$csrf_token = start_csrf_session('password_csrf_token');
	$_SESSION['password_first_entry'] = true;
} else {
	if (
		isset($_REQUEST['submit']) ||
		isset($_REQUEST['changePass'])
	) {
		echo 'checked password';
		$csrf_token = check_csrf_attack('password_csrf_token', $_REQUEST['csrf_token']);
	}
	$csrf_token = get_sessions_csrf_token('password_csrf_token');
}




$nameTools = $langChangePass;
$navigation[] = array("url" => "../profile/profile.php", "name" => $langModifProfile);

check_uid();
$tool_content = "";
$passurl = $urlSecure . 'modules/profile/password.php';

if (isset($submit) && isset($changePass) && ($changePass == "do")) {

	if (empty($_REQUEST['password_form']) || empty($_REQUEST['password_form1']) || empty($_REQUEST['old_pass'])) {
		header("location:" . $passurl . "?msg=3");
		exit();
	}

	if ($_REQUEST['password_form1'] !== $_REQUEST['password_form']) {
		header("location:" . $passurl . "?msg=1");
		exit();
	}


	$query = "SELECT `nom`,`prenom` ,`username`,`email`,`am` FROM `user`WHERE `user_id`=?";

	$connection = mysqli_connect('db', 'root', '1234');
	mysqli_set_charset($connection, "utf8");
	mysqli_select_db($connection, $mysqlMainDb);
	$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_param(
		$statement,
		"i",
		$_SESSION["uid"]
	);
	mysqli_stmt_execute($statement);
	$result = mysqli_stmt_get_result($statement);
	$myrow = mysqli_fetch_array($result);


	if ((strtoupper($_REQUEST['password_form1']) == strtoupper($myrow['nom']))
		|| (strtoupper($_REQUEST['password_form1']) == strtoupper($myrow['prenom']))
		|| (strtoupper($_REQUEST['password_form1']) == strtoupper($myrow['username']))
		|| (strtoupper($_REQUEST['password_form1']) == strtoupper($myrow['email']))
		|| (strtoupper($_REQUEST['password_form1']) == strtoupper($myrow['am']))
	) {
		header("location:" . $passurl . "?msg=2");
		exit();
	}
	mysqli_stmt_close($statement);
	mysqli_close($connection);

	//all checks ok. Change password!
	$query = "SELECT `password` FROM `user` WHERE `user_id`=?";

	$connection = mysqli_connect('db', 'root', '1234');
	mysqli_set_charset($connection, "utf8");
	mysqli_select_db($connection, $mysqlMainDb);
	$statement = mysqli_stmt_init($connection);
	mysqli_stmt_prepare($statement, $query);
	mysqli_stmt_bind_param(
		$statement,
		"i",
		$_SESSION["uid"]
	);
	mysqli_stmt_execute($statement);
	$result = mysqli_stmt_get_result($statement);
	$myrow = mysqli_fetch_array($result);

	mysqli_stmt_close($statement);
	mysqli_close($connection);


	$old_pass = md5($_REQUEST['old_pass']);
	$old_pass_db = $myrow['password'];
	$new_pass = md5($_REQUEST['password_form']);

	if ($old_pass == $old_pass_db) {

		$query = "UPDATE `user` SET `password` = ? WHERE `user_id` = ?";

		$connection = mysqli_connect('db', 'root', '1234');
		mysqli_set_charset($connection, "utf8");
		mysqli_select_db($connection, $mysqlMainDb);
		$statement = mysqli_stmt_init($connection);
		mysqli_stmt_prepare($statement, $query);
		mysqli_stmt_bind_param(
			$statement,
			"si",
			$new_pass,
			$myUserId
		);
		mysqli_stmt_execute($statement);

		$result = mysqli_stmt_get_result($statement);
		mysqli_stmt_close($statement);
		mysqli_close($connection);

		header("location:" . $passurl . "?msg=4");
		exit();
	} else {
		header("location:" . $passurl . "?msg=5");
		exit();
	}
}

//Show message if exists
if (isset($msg)) {

	switch ($msg) {

		case 1: { //passwords do not match
				$message = $langPassTwo;
				$urlText = "";
				$type = "caution_small";
				break;
			}

		case 2: { //pass too easy
				$message = $langPassTooEasy . ": <strong>" . substr(md5(date("Bis") . $_SERVER['REMOTE_ADDR']), 0, 8) . "</strong>";
				$urlText = "";
				$type = "caution_small";
				break;
			}

		case 3: { // admin tools
				$message = $langFields;
				$urlText = "";
				$type = "caution_small";
				break;
			}

		case 4: { //password successfully changed
				$message = $langPassChanged;
				$urlText = $langHome;
				$type = "success_small";
				break;
			}

		case 5: { //wrong old password entered
				$message = $langPassOldWrong;
				$urlText = "";
				$type = "caution_small";
				break;
			}

		case 6: { //not acceptable characters in password
				$message = $langInvalidCharsPass;
				$urlText = "";
				$type = "caution_small";
				break;
			}

		default:
			die("invalid message id");
	}
	$tool_content .=  "<p class=\"$type\">$message<br><a href=\"$urlServer\">$urlText</a></p><br/>";
}

if (!isset($changePass)) {
	$tool_content .= "
<form method=\"post\" action=\"$passurl?submit=yes&changePass=do\">
	<input type='hidden' name='csrf_token' value=$csrf_token>
  <table width=\"99%\">
  <tbody>
  <tr>
    <th width=\"220\" class='left'>$langOldPass</th>
    <td><input class='FormData_InputText' type=\"password\" size=\"40\" name=\"old_pass\" value=\"\"></td>
    </tr>
   <tr>
     <th class='left'>$langNewPass1</th>
     <td>";

	$tool_content .= "<input class='FormData_InputText' type=\"password\" size=\"40\" name=\"password_form\" value=\"\"></td>
   </tr>
   <tr>
     <th width=\"150\" class='left'>$langNewPass2</th>
     <td><input class='FormData_InputText' type=\"password\" size=\"40\" name=\"password_form1\" value=\"\"></td>
    </tr>
	<tr>
      <th>&nbsp;</th>
      <td><input type=\"Submit\" name=\"submit\" value=\"$langModify\"></td>
    </tr>
	</tbody>
    </table>

</form>
   ";
}

draw($tool_content, 1);
