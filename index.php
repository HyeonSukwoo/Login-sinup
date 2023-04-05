<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
</head>
<body>
	<h1>로그인</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" accept-charset="UTF-8">
		<label for="email">이메일</label>
		<input type="email" id="email" name="email" required><br>
		<label for="password">비밀번호</label>
		<input type="password" id="password" name="password" required><br>
		<input type="submit" value="로그인">
	</form>
	<a href='signup.php'>회원가입</a>
	<?php
	// 폼이 제출되면 회원 정보를 처리하는 코드
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// 데이터베이스 연결
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "mydb";

		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}

		// 이메일과 비밀번호 데이터 가져오기
		$email = $_POST["email"];
		$passwd = $_POST["password"];

		// SQL 쿼리 실행
		$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$passwd'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			echo "로그인 성공";
		} else {
			echo "<script>alert('아이디나 비밀번호가 올바르지 않습니다.');</script>";
		}
		$conn->close();
	}
	?>
</body>
</html>
