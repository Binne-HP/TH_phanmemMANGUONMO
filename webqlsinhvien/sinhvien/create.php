<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                           VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $_POST['MaSV'], $_POST['HoTen'], $_POST['GioiTinh'],
        $_POST['NgaySinh'], $_POST['Hinh'], $_POST['MaNganh']
    ]);
    header('Location: index.php');
    exit;
}

$nganhs = $pdo->query("SELECT * FROM NganhHoc")->fetchAll();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #8e44ad, #f1c40f);
            padding: 40px;
            color: #333;
        }

        h2 {
            text-align: center;
            font-size: 32px;
            color: white;
            margin-bottom: 30px;
        }

        form {
            background: white;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.6s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            margin-top: 15px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ccc;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #8e44ad;
            outline: none;
        }

        button {
            background: #6c5ce7;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            display: block;
            margin: 20px auto 0;
        }

        button:hover {
            background: #a29bfe;
            transform: scale(1.05);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2>➕ Thêm sinh viên mới</h2>

<form method="post">
    <label for="MaSV">Mã SV</label>
    <input name="MaSV" id="MaSV" type="text" required>

    <label for="HoTen">Họ tên</label>
    <input name="HoTen" id="HoTen" type="text" required>

    <label for="GioiTinh">Giới tính</label>
    <select name="GioiTinh" id="GioiTinh" required>
        <option value="Nam">Nam</option>
        <option value="Nữ">Nữ</option>
    </select>

    <label for="NgaySinh">Ngày sinh</label>
    <input name="NgaySinh" id="NgaySinh" type="date" required>

    <label for="Hinh">Hình ảnh (URL)</label>
    <input name="Hinh" id="Hinh" type="text" required>

    <label for="MaNganh">Ngành học</label>
    <select name="MaNganh" id="MaNganh" required>
        <?php foreach ($nganhs as $ng): ?>
            <option value="<?= $ng['MaNganh'] ?>"><?= $ng['TenNganh'] ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit">💾 Lưu sinh viên</button>
</form>

<a class="back-link" href="index.php">← Quay lại danh sách</a>

</body>
</html>
