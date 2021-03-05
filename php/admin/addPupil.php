<?php

require '../generate.php';
require ('../connectToDB.php');

$id_grade = $_POST['id_grade'];
$last_name = $_POST['last_name'];
$name = $_POST['name'];
$middle_name = $_POST['middle_name'];

$username = '';
do {
  $username = generateUsername(10);
  $sql_username_search = "SELECT username FROM users WHERE username = '{$username}' LIMIT 1;";
  $search_result = mysqli_query($link, $sql_username_search);
} while(mysqli_num_rows($search_result) != 0);
  
$password = generatePassword(15);
  
$sql_insert_user = "INSERT users(username, password, role) VALUES ('{$username}', '{$password}', 'pupil');";
$insert_user_result = mysqli_query($link, $sql_insert_user);

$sql_get_user_id = "SELECT id_user FROM users WHERE username = '{$username}';";
$id_user = mysqli_fetch_array(mysqli_query($link, $sql_get_user_id))['id_user'];

$sql_insert_pupil = "INSERT pupil(id_user, id_grade, last_name, name, middle_name) ".
                        "VALUES ({$id_user}, {$id_grade}, '{$last_name}', '{$name}', '{$middle_name}');";

$insert_pupil_result = mysqli_query($link, $sql_insert_pupil);



$sql_get_pupils = "SELECT * FROM pupil WHERE id_grade = {$id_grade};";
$pupils_data = mysqli_query($link, $sql_get_pupils);

$output = '';
while($row = mysqli_fetch_array($pupils_data))
{
  $output .= '
    <tr>
      <th scope="row">'.$row["last_name"].' '.$row["name"].' '.$row["middle_name"].'</th>
      <td><button type="submit" class="remove_button" title="Click to remove the pupil" value="'.$row["id_pupil"].'">&times;</button></td>
    </tr>';
}
echo $output;
?>