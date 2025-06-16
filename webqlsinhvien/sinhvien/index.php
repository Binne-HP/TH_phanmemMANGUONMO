<?php
include 'db.php';

$limit = 4;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Lấy danh sách sinh viên kèm tên ngành
$sql = "SELECT sv.*, nh.TenNganh FROM SinhVien sv 
        JOIN NganhHoc nh ON sv.MaNganh = nh.MaNganh 
        LIMIT $start, $limit";
$students = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

// Đếm tổng số sinh viên
$total = $pdo->query("SELECT COUNT(*) FROM SinhVien")->fetchColumn();
$total_pages = ceil($total / $limit);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <style>
        * {
            box-sizing: border-box;
            transition: all 0.3s ease-in-out;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #8e44ad, #f1c40f);
            margin: 0;
            padding: 40px;
            color: #333;
            animation: fadeIn 0.8s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h2 {
            text-align: center;
            font-size: 36px;
            color: #fff;
            margin-bottom: 30px;
            animation: slideIn 0.6s ease;
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .add-btn {
            display: block;
            width: fit-content;
            margin: 0 auto 30px auto;
            padding: 12px 24px;
            background: #6c5ce7;
            color: white;
            font-weight: bold;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }

        .add-btn:hover {
            background: #a29bfe;
            transform: scale(1.08);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
        }

        th {
            background-color: #6c5ce7;
            color: white;
            padding: 16px;
            text-align: center;
            font-size: 16px;
        }

        td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #f2f2f2;
        }

        tr {
            transition: background 0.4s ease;
        }

        tr:hover {
            background-color: #f6f0ff;
            transform: scale(1.01);
        }

        img {
            width: 70px;
            border-radius: 50%;
            box-shadow: 0 3px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        img:hover {
            transform: scale(1.2);
        }

        .actions a {
            margin: 0 5px;
            font-size: 20px;
            text-decoration: none;
            color: #6c5ce7;
            transition: transform 0.3s, color 0.3s;
        }

        .actions a:hover {
            transform: rotate(8deg) scale(1.3);
            color: #d63031;
        }

        .pagination {
            margin-top: 30px;
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            margin: 0 6px;
            padding: 10px 16px;
            border-radius: 50px;
            background-color: #f4f4f4;
            color: #6c5ce7;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }

        .pagination a:hover {
            background-color: #6c5ce7;
            color: white;
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            td, th {
                font-size: 13px;
                padding: 10px;
            }

            .add-btn {
                padding: 10px 18px;
                font-size: 14px;
            }

            img {
                width: 50px;
            }
        }
    </style>
</head>
<body>

<h2>📋 Danh sách sinh viên</h2>
<a class="add-btn" href="create.php">➕ Thêm sinh viên</a>

<table>
    <tr>
        <th>Mã SV</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Ngành</th>
        <th>Ảnh</th>
        <th>Thao tác</th>
    </tr>
    <?php foreach ($students as $sv): ?>
    <tr>
        <td><?= $sv['MaSV'] ?></td>
        <td><?= htmlspecialchars($sv['HoTen']) ?></td>
        <td><?= $sv['GioiTinh'] ?></td>
        <td><?= date('d/m/Y', strtotime($sv['NgaySinh'])) ?></td>
        <td><?= $sv['TenNganh'] ?></td>
        <td><img src="<?= $sv['Hinh'] ?>" alt="Ảnh SV"></td>
        <td class="actions">
            <a href="detail.php?id=<?= $sv['MaSV'] ?>" title="Xem chi tiết">👁</a>
            <a href="edit.php?id=<?= $sv['MaSV'] ?>" title="Chỉnh sửa">✏️</a>
            <a href="delete.php?id=<?= $sv['MaSV'] ?>" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">🗑</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<div class="pagination">
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <a href="?page=<?= $i ?>"><?= $i ?></a>
    <?php endfor; ?>
</div>

</body>
</html>
