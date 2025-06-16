<?php
include 'db.php';

// Kiểm tra nếu có ID hợp lệ được truyền vào
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Thử kiểm tra xem sinh viên có tồn tại không
    $stmt = $pdo->prepare("SELECT * FROM SinhVien WHERE MaSV = ?");
    $stmt->execute([$id]);
    $sv = $stmt->fetch();

    if ($sv) {
        // Nếu có sinh viên, tiến hành xoá
        $deleteStmt = $pdo->prepare("DELETE FROM SinhVien WHERE MaSV = ?");
        $deleteStmt->execute([$id]);

        // Kiểm tra có xoá thành công không (số dòng bị ảnh hưởng)
        if ($deleteStmt->rowCount() > 0) {
            header('Location: index.php?msg=deleted');
            exit;
        } else {
            echo "❌ Không thể xóa sinh viên. Vui lòng thử lại.";
        }
    } else {
        echo "❌ Sinh viên không tồn tại.";
    }
} else {
    echo "❌ Không có mã sinh viên hợp lệ.";
}
