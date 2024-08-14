<?php
include 'db_connect.php';

// 로그인 폼에서 데이터 가져오기
$username = $_POST['username'];
$password = $_POST['password'];

// 데이터베이스에서 사용자 정보 확인
$sql = "SELECT password FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($hashed_password_from_db);
$stmt->fetch();

if ($hashed_password_from_db && password_verify($password, $hashed_password_from_db)) {
    echo "로그인에 성공하였습니다.";
    // 로그인 후 리디렉션 또는 세션 시작 등 추가 작업
    header("Location: welcome.html");
} else {
    echo "아이디 또는 비밀번호가 잘못되었습니다.";
}

$stmt->close();
$conn->close();

