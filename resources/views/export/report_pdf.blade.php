<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html">
    <title>Report PDF</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Be Vietnam Pro', sans-serif;
        }
    </style>
</head>

<body>
    <h1>BÁO CÁO DOANH THU</h1>

    <table>
        <thead>
            <tr>
                <th>Ngày</th>
                <th>Số đơn</th>
                <th>Số tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data['stat'] as $dt)
            <tr>
                <td>{{ $dt->date }}</td>
                <td>{{ $dt->number_of_booking }}</td>
                <td>{{ number_format($dt->price, 0, ',', ' ') }}</td>
            </tr>
            @endforeach
            <tr>
                <td></td>
                <td>Tổng số đơn: {{ $data['total_number_of_booking'] }}</td>
                <td>Tổng tiền: {{ number_format($data['total_price'], 0, ',', ' ') }}</td>
            </tr>
        </tbody>
    </table>
    <p>Ngày tạo: {{ date('d-m-Y H:i:s') }}</p>
</body>

</html>
