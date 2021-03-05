<?php

require '../generate.php';
require ('../connectToDB.php');


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
  
$sql_insert_user = "INSERT users(username, password, role) VALUES ('{$username}', '{$password}', 'teacher');";
$insert_user_result = mysqli_query($link, $sql_insert_user);

$sql_get_user_id = "SELECT id_user FROM users WHERE username = '{$username}';";
$id_user = mysqli_fetch_array(mysqli_query($link, $sql_get_user_id))['id_user'];

$sql_insert_teacher = "INSERT teacher(id_user, last_name, name, middle_name) ".
                        "VALUES ({$id_user}, '{$last_name}', '{$name}', '{$middle_name}');";
$insert_teacher_result = mysqli_query($link, $sql_insert_teacher);


$output = '';
$sql_select = "SELECT * FROM teacher;";
$select_result = mysqli_query($link, $sql_select);
while($row = mysqli_fetch_array($select_result))
{
  $output .= '
    <tr>
      <th scope="row"><button class="list_button title="Click to add a lesson" value="'.$row["id_teacher"].'">'.$row["last_name"].' '.$row["name"].' '.$row["middle_name"].'</button></th>
      <td><button type="submit" class="remove_button" title="Click to remove the theacher" value="'.$row["id_teacher"].'">&times;</button></td>
    </tr>';
}
echo $output;
?>