<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
$stmt->execute([$id]);
$sv = $stmt->fetch();

$nganhs = $pdo->query("SELECT * FROM NganhHoc")->fetchAll();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE SinhVien SET HoTen=?, GioiTinh=?, NgaySinh=?, Hinh=?, MaNganh=? WHERE MaSV=?");
    $stmt->execute([
        $_POST['HoTen'], $_POST['GioiTinh'], $_POST['NgaySinh'], $_POST['Hinh'],
        $_POST['MaNganh'], $id
    ]);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sinh viên</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
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
            animation: slideIn 0.5s ease;
        }

        @keyframes slideIn {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
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
            font-size: 16px;
            margin-bottom: 10px;
            transition: border-color 0.3s;
        }

        input:focus,
        select:focus {
            border-color: #2575fc;
            outline: none;
        }

        button {
            background: #1e90ff;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
            display: block;
            margin: 20px auto 0;
        }

        button:hover {
            background: #74b9ff;
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

<h2>✏️ Sửa thông tin sinh viên</h2>

<form method="post">
    <label for="HoTen">Họ tên</label>
    <input name="HoTen" id="HoTen" type="text" value="<?= $sv['HoTen'] ?>" required>

    <label for="GioiTinh">Giới tính</label>
    <select name="GioiTinh" id="GioiTinh" required>
        <option value="Nam" <?= $sv['GioiTinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
        <option value="Nữ" <?= $sv['GioiTinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
    </select>

    <label for="NgaySinh">Ngày sinh</label>
    <input name="NgaySinh" id="NgaySinh" type="date" value="<?= $sv['NgaySinh'] ?>" required>

    <label for="Hinh">Hình ảnh (URL)</label>
    <input name="Hinh" id="Hinh" type="text" value="<?= $sv['Hinh'] ?>" required>

    <label for="MaNganh">Ngành học</label>
    <select name="MaNganh" id="MaNganh" required>
        <?php foreach ($nganhs as $ng): ?>
            <option value="<?= $ng['MaNganh'] ?>" <?= $sv['MaNganh'] == $ng['MaNganh'] ? 'selected' : '' ?>>
                <?= $ng['TenNganh'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">💾 Cập nhật</button>
</form>

<a class="back-link" href="index.php">← Quay lại danh sách</a>

</body>
</html>
