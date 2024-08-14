<?php
include 'db_connect.php';

// 회원가입 폼에서 데이터 가져오기
$username = $_POST['username'];
$password = $_POST['password'];

// 패스워드 해싱
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 데이터베이스에 사용자 정보 저장
$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashed_password);

if ($stmt->execute()) {
    echo "회원가입이 성공적으로 완료되었습니다.";
    // 회원가입 후 리디렉션
    header("Location: login.html");
} else {
    echo "회원가입에 실패하였습니다. 다시 시도해주세요.";
}

$stmt->close();
$conn->close();
