<?php
$customerList = array(
    "0" => array("name" => "Mai Văn Hoàn", "birthdate" => "1983/08/20", "address" => "Hà Nội", "image" => "images/img1.jpg"),
    "1" => array("name" => "Nguyễn Văn Nam", "birthdate" => "1983/08/21", "address" => "Bắc Giang", "image" => "images/img2.jpg"),
    "2" => array("name" => "Nguyễn Thái Hòa", "birthdate" => "1983/08/22", "address" => "Nam Định", "image" => "images/img3.jpg"),
    "3" => array("name" => "Trần Đăng Khoa", "birthdate" => "1983/08/17", "address" => "Hà Tây", "image" => "images/img4.jpg"),
    "4" => array("name" => "Nguyễn Đình Thi", "birthdate" => "1983/08/19", "address" => "Hà Nội", "image" => "images/img5.jpg"),
)
?>
<?php
function searchByDate($customers, $from_date, $to_date)
{
    if (empty($from_date) && empty($to_date)) {
        return $customers;
    }
    $filtered_customers = [];
    foreach ($customers as $customer) {
        if (!empty($from_date) && (strtotime($customer["birthdate"]) < strtotime($from_date)))
            continue;
        if (!empty($to_date) && (strtotime($customer["birthdate"]) > strtotime($to_date)))
            continue;
        $filtered_customers[] = $customer;
    }
    return $filtered_customers;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="doc">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client List</title>
    <style type="text/css">
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        #from, #to {
            width: 200px;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            padding: 12px 10px 12px 10px;
        }

        #submit {
            border-radius: 2px;
            padding: 10px 32px;
            font-size: 16px;
        }

        .profile {
            height: 60px;
            width: 80px;
            overflow: hidden;
        }

        .profile img {
            width: 100%;
        }
    </style>
</head>
<body>
<?php
$from_date = NULL;
$to_date = NULL;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $from_date = $_POST["from"];
    $to_date = $_POST["to"];
}
$filtered_customers = searchByDate($customerList, $from_date, $to_date);
?>
<form action="" method="post">
    From:<input type="text" id="from" name="from" placeholder="yyyy/mm/dd"/>
    To:<input type="text" id="to" name="to" placeholder="yyyy/mm/dd"/>
    <input type="submit" id="submit" value="Filter"/>
</form>

<table border="0">
    <caption><h2>Danh sách khách hàng</h2></caption>
    <tr>
        <th>STT</th>
        <th>Tên</th>
        <th>Ngày sinh</th>
        <th>Địa chỉ</th>
        <th>Ảnh</th>
    </tr>
    <?php if (count($filtered_customers) === 0): ?>
        <tr>
            <td colspan="5" class="message" style="text-align: center">Không tìm thấy khách hàng</td>
        </tr>
    <?php endif; ?>
    <?php foreach($filtered_customers as $index => $customer): ?>
        <tr>
            <td><?php echo $index + 1; ?></td>
            <td><?php echo $customer["name"]; ?></td>
            <td><?php echo $customer["birthdate"] ?></td>
            <td><?php echo $customer["address"]; ?></td>
            <td><div class="profile"><image src="<?php echo $customer['image']; ?>"></div></td>
        </tr>
    <?php endforeach; ?>
</table>
</body>
</html>