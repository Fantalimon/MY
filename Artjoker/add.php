<?php
include_once 'autoload.php';

$name = '';
$email = '';
$Territory = '';
$RayonsTowns = '';
$Rayons = '';
$Towns = '';
$SMT='';
$response = [];

$name = isset($_POST['name']) ? htmlspecialchars(strip_tags(trim($_POST['name']))) : '';
$email = isset($_POST['email']) ? htmlspecialchars(strip_tags(trim($_POST['email']))) : '';
$Territory = isset($_POST['Territory']) ? htmlspecialchars(strip_tags(trim($_POST['Territory']))) : '';
$Towns = isset($_POST['Towns']) ? htmlspecialchars(strip_tags(trim($_POST['Towns']))) : '';
$RayonsTowns = isset($_POST['RayonsTowns']) ? htmlspecialchars(strip_tags(trim($_POST['RayonsTowns']))) : '';
$Rayons = isset($_POST['Rayons']) ? htmlspecialchars(strip_tags(trim($_POST['Rayons']))) : '';
$SMT = isset($_POST['SMT']) ? htmlspecialchars(strip_tags(trim($_POST['SMT']))) : '';


if (($name and $email and $Territory ) == '') {
    die();
} else {
    $userData = [
        'name' => $name,
        'email' => $email,
        'territory' => $Territory . ' ' . $Rayons . ' ' . $Towns . ' ' . $RayonsTowns . ' ' . $SMT,
    ];
    $user = new Addusers($userData);
    $result = $user->getByEmail();
    if ($email !== $result['email']) {
        $save = $user->save();
        $response['newUser'] = $userData;
    } else {
        $response['oldUser'] = $result;
    }
}
echo json_encode($response);
