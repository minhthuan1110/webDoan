
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
    <style>
        .email-wrap {
            width: 100%;
            padding: 20px 40px;
        }
        .email-wrap__text{
            font-size: 1.2rem;
            font-weight: 600;
            text-transform: uppercase;
            color:  #02acea;
        }
        .text-notice {
            font-weight: 600;
            color: #000;
        }
        .info-tour{
            width: 100%;
            text-align: center;
        }
        .wonder-bill{
            margin-top: 10px;
        }
        .logo-mail {
            width: 100%;
            text-align: right;
        }
        .logo-mail a img {
            width: 200px;
        }
    </style>
<div class="email-wrap">
        <h2 class="email-wrap__title">Thank you for using service !</h2>
        <p>Tour name: <b>Cùng nhau khám phá Sapa Vùng đất của núi non hùng vĩ</b></p>
        <h3 style="border-bottom: 1px solid #ddd; padding-bottom: 5px; color: #02acea;">Booking detail</h3>
        <p class="email-wrap__text">Thông tin đơn hàng mã: <span>greaff</span></p>
        <table class="table" style="background-color: #efefef">
            <thead  style="background-color:#02acea;color: #fff;">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Ticket Type</th>
                <th scope="col">Slot</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Adult</td>
                <td>1244</td>
                <td>1233</td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Youth</td>
                <td>2123</td>
                <td>12313</td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Child</td>
                <td>3432</td>
                <td>12313</td>
                </tr>
                <tr>
                <th scope="row">4</th>
                <td>Young Child</td>
                <td>3432</td>
                <td>12313</td>
                </tr>
            </tbody>
            <tfoot>
              <tr>
                <th align="right">Total</th>
                <td align="left"></td>
                <td align="left">Total Slot: <span class='text-notice'>1224</span></td>
                <td align="left">Total Price:  <span class='text-notice'>50000</span></td>
              </tr>
            </tfoot>
    </table>
    <div class="info-tour"><a href="#"  class="btn btn-info">Chi tiết tour taị Vietour</a></div>
    <p class="wonder-bill">Mọi thắc mắc xin liên hệ <a href="#">https//:vietour.com</a> để biết thêm chi tiết </p>
    <div class="logo-mail">
        <a href="#"><img src="{{ URL::asset('frontend/img/logo.png') }}" alt="logo"></a>
    </div>
    <h4>Thank you again !</h4>

</div>
</body>
</html>
