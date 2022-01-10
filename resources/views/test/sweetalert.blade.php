<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div class="day la div to nhat">

        <div class="div nay la 1 dong phia tren cac thong bao">
            <a href="javascript::void()" class="markAsReadAll">Danh dau tat ca la da doc</a>
        </div>

        <ul class="div o giua hien cac thong bao" id="notifications">
            {{--  --}}
        </ul>

        <div class="div nay la 1 dong phia duoi cac thong bao">
            <a href="javascript::voi()" class="deleteAllNotification">Xoa tat ca</a>
        </div>

    </div>

    <script>
        $(document).ready(function () {
            loadNotification();
            loadFooter();
        });
        $('.markAsReadAll').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "/notification/mark-as-read-all",
                dataType: "json",
                success: function (response) {
                    loadNotification();
                }
            });
        });
        $('.markAsRead').click(function (e) {
            e.preventDefault();
            var notificationId = $(this).data('notify-id');
            $.ajax({
                type: "GET",
                url: `/notification/mark-as-read/${notificationId}`,
                dataType: "json",
                success: function (response) {
                    loadNotification();
                }
            });
        });
        $('.deleteAllNotification').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: "/notification/delete-all",
                dataType: "json",
                success: (response) => {
                    loadNotification();
                }
            });
        });
        $('.deleteNotification').click(function (e) {
            e.preventDefault();
            var notificationId = $(this).data('notify-id');
            $.ajax({
                type: "GET",
                url: `/notification/delete/${notificationId}`,
                dataType: "json",
                success: function (response) {
                    loadNotification();
                }
            });
        });

        function loadNotification() {
            $.ajax({
                type: "GET",
                url: "/notification",
                dataType: "json",
                success: (response) => {
                    var str = "";
                    $.each(response, function (indexInArray, valueOfElement) {
                        str += `<li>
                            <a href="{{ url('/booking/detail/${valueOfElement.data.code}') }}">${valueOfElement.data.content}</a>
                            <span>${valueOfElement.created_at}</span>
                            <a href="javascript::void()" data-notify-id="${valueOfElement.id}" class="markAsRead">Da doc</a>
                            <a href="javascript::void()" data-notify-id="${valueOfElement.id}" class="deleteNotify">Xoa</a>
                            </li>`;
                    });
                    $('#notifications').html(str);
                }
            });
        }

        function loadFooter() {
            $.ajax({
                type: "GET",
                url: "/footer-data",
                dataType: "json",
                success: function (response) {
                    // lay element roi add vao thuoc tinh href cua the <a></a>
                    // response.facebook
                    // response.youtube
                    // response.instagram
                    // response.twitter
                    // response.pinterest
                }
            });
        }
    </script>


    @include('sweetalert::alert')
</body>

</html>
