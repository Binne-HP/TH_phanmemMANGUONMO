<?php
include 'db.php';
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT sv.*, nh.TenNganh FROM SinhVien sv JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh WHERE MaSV = ?");
$stmt->execute([$id]);
$sv = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sinh viên</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #333;
            padding: 40px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease;
        }

        h2 {
            text-align: center;
            color: #2d3436;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }

        img {
            display: block;
            margin: 20px auto;
            border-radius: 8px;
            max-width: 100%;
            height: auto;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        a.back-link {
            display: block;
            text-align: center;
            margin-top: 25px;
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            background: #0984e3;
            padding: 12px 24px;
            border-radius: 30px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            transition: background 0.3s, transform 0.2s;
        }

        a.back-link:hover {
            background: #74b9ff;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="container">
    <h2>📄 Chi tiết sinh viên</h2>
    <p><strong>Mã SV:</strong> <?= $sv['MaSV'] ?></p>
    <p><strong>Họ tên:</strong> <?= $sv['HoTen'] ?></p>
    <p><strong>Giới tính:</strong> <?= $sv['GioiTinh'] ?></p>
    <p><strong>Ngày sinh:</strong> <?= date('d/m/Y', strtotime($sv['NgaySinh'])) ?></p>
    <p><strong>Ngành:</strong> <?= $sv['TenNganh'] ?></p>
    <img src="<?= $sv['Hinh'] ?>" alt="Ảnh sinh viên">
    <a class="back-link" href="index.php">⬅ Quay lại danh sách</a>
</div>

</body>
</html>
