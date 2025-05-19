<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Order Shippng Pizza</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color:rgb(54, 54, 54);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color:rgb(0, 0, 0);
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            text-align: center;
        }
        .result p {
            margin: 5px 0;
            font-size: 16px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tính Chi Phí Ship Pizza</h1>

        <form method="POST" action="">
            <div class="form-group">
                <label for="ho_ten">Họ và tên:</label>
                <input type="text" id="ho_ten" name="ho_ten" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="sdt">Số điện thoại:</label>
                <input type="text" id="sdt" name="sdt" required>
            </div>
            <div class="form-group">
                <label for="thoi_gian_muon">Thời gian giao muộn (phút):</label>
                <input type="number" id="thoi_gian_muon" name="thoi_gian_muon" min="0" required>
            </div>
            <div class="form-group">
                <label for="so_luong_pizza">Số lượng pizza:</label>
                <input type="number" id="so_luong_pizza" name="so_luong_pizza" min="1" value="1" required>
            </div>
            <button type="submit" name="tinh_toan">Tính toán</button>
        </form>

        <?php
        if (isset($_POST['tinh_toan'])) {
            $ho_ten = $_POST['ho_ten'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $thoi_gian_muon = $_POST['thoi_gian_muon'];
            $so_luong_pizza = $_POST['so_luong_pizza'];

            $gia_ship_moi_pizza = 5.50; 
            if ($thoi_gian_muon >= 10 && $thoi_gian_muon < 20) {
                $gia_ship_moi_pizza = 4.00; 
            } elseif ($thoi_gian_muon >= 20 && $thoi_gian_muon < 30) {
                $gia_ship_moi_pizza = 2.50; 
            } elseif ($thoi_gian_muon >= 30) {
                $gia_ship_moi_pizza = 0.00; 
            }

            $tong_chi_phi_ship = $so_luong_pizza * $gia_ship_moi_pizza;

            echo "<div class='result'>";
            echo "<p><strong>Thông tin người mua:</strong></p>";
            echo "<p>Họ và tên: $ho_ten</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Số điện thoại: $sdt</p>";
            echo "<p>Thời gian giao muộn: $thoi_gian_muon phút</p>";
            echo "<p>Số lượng pizza: $so_luong_pizza</p>";
            echo "<p>Chi phí ship mỗi chiếc: $$gia_ship_moi_pizza</p>";
            echo "<p>Tổng chi phí ship: $$tong_chi_phi_ship</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
