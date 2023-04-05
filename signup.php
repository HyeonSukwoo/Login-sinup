<!-- 회원가입-->
<!DOCTYPE html>
<html>
<head>
	<title>회원가입</title>
	<style>
		body {
			background-color: #1b1f38;
			font-family: 'Montserrat', sans-serif;
			color: #fff;
			}

			h1 {
			font-size: 3rem;
			text-align: center;
			margin-top: 5rem;
			margin-bottom: 3rem;
			letter-spacing: -0.05rem;
			}

			form {
			max-width: 400px;
			margin: 0 auto;
			background-color: #252b48;
			padding: 3rem;
			border-radius: 0.5rem;
			box-shadow: 0px 0.5rem 1rem rgba(0, 0, 0, 0.2);
			}

			input[type="text"],
			input[type="email"],
			input[type="password"],
			input[type="submit"] {
			width: 100%;
			padding: 0.4rem;
			border: none;
			border-radius: 0.25rem;
			box-shadow: 0px 0.25rem 0.5rem rgba(0, 0, 0, 0.2);
			font-size: 1.125rem;
			margin-bottom: 2rem;
			background-color: #1b1f38;
			color: #fff;
			text-align: center;
			}

			input[type="submit"] {
			background-color: #ff6b6b;
			color: #fff;
			font-size: 1.4rem;
			cursor: pointer;
			transition: all 0.2s ease-in-out;
			text-align: center;
			
			}

			input[type="submit"]:hover {
			background-color: #e35565;
			box-shadow: 0px 0.25rem 0.5rem rgba(0, 0, 0, 0.3);
			}


	</style>
</head>
<body>
	<h1>회원가입</h1>
	<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<input type="text" name="name" placeholder="이름 입력" required>
		<input type="email" name="email" placeholder="이메일 입력" required>
		<input type="password" name="passwd" placeholder="비밀번호 입력" required>
		<input type="submit" value="가입">
	</form>
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

		// 이름과 이메일 데이터 가져오기
		$name = $_POST["name"];
		$email = $_POST["email"];
        $passwd = $_POST["passwd"];

		// SQL 쿼리 실행
		$sql = "INSERT INTO users (name, email,password) VALUES ('$name', '$email','$passwd')";
		if ($conn->query($sql) === TRUE) {
			echo "<script>
					setTimeout(function() {
						alert('회원가입이 완료되었습니다.');
						location.href='index.php';
					}, 50);
				  </script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		
		$conn->close();
	}
	?>
</body>
</html>
