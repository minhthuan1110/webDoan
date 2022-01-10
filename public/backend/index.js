/*
|-----------------------------------------------------------------------
| Load dữ liệu trang Index. Xử lí action Delete.
|-----------------------------------------------------------------------
| File này chạy cho tất cả các trang index trong Backend.
*/

// load du lieu khi moi vao trang
$(document).ready(() => {
    var id = $("table").find("tbody").attr("id");
    var name = id.slice(id.lastIndexOf("-") + 1);
    LoadData(name);
    // setInterval(() => LoadData(name), 900000);

    // tim kiem - filter
    $("#search").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(`#list-${name} tr`).filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

// ham de load du lieu
function LoadData(name) {
    $.ajax({
        type: "GET",
        url: route(`admin.${name}.index_data`),
        dataType: "json",
        success: (response) => {
            var str = "";
            $.each(response, (index, value) => {
                var ur = route(`admin.${name}.edit`, value.id);
                str += "<tr>";

                // switch (name) {
                //     case "tag":
                //         str += `<td>${response.name}</td>
                //                 <td>${response.created_at}</td>`;
                //         break;
                //     case "slider":
                //         break;
                //     default:
                //         break;
                // }

                if (name == "slider") {
                    str += `<td>
                            ${value.title}
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img src="{{ URL::asset('${value.image_path}') }}" alt="image slider"
                                        style="width:50%">
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                            <p>${value.created_at}</p>
                        </td>
                        <td class="project-state">`;
                    if (value.display === 1) {
                        str += `<a href="#"><span class="badge badge-success">Hiển thị</span></a>`;
                    } else {
                        str += `<a href="#"><span class="badge badge-warning">Ẩn</span></a>`;
                    }
                    str += `</td>`;
                }

                // if (name == "location") {
                //     str += `<td>${value.area}<td>`;
                // }
                // if (name == "promotion") {
                //     str += `<td>${value.amount}<td>`;
                // }
                // if (name == "tour") {
                //     str += `<td>${value.area}<td>`;
                //     str += `<td>${value.location}<td>`;
                // }
                // if (name == "image") {
                //     str += `<div><img src="{{ asset(${value.image_path}) }}" onError="this.onerror=null;this.src='{{ url("/images/placeholder600x600.png") }}';" alt="Tour image"></div>`;
                // }

                str += `<td class="project-actions text-right">
                            <a class="btn btn-info btn-sm" href="${ur}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                            <a class="btn btn-danger btn-sm" href="javascript::void(0)" onclick="confirmDelete('${name}', ${value.id})">
                                <i class="fas fa-trash">
                                </i>
                                Delete
                            </a>
                        </td>`;
                str += "</tr>";
            });
            $(`table tbody #list-${name}`).html(str);
        },
    });
}

// xac nhan Xoa
function confirmDelete(name, id) {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: route(`admin.${name}.delete`, id),
                type: "GET",
                success: (response) => {
                    Swal.fire(response.title, response.msg, response.stt);
                    LoadData(name);
                },
                error: (xhr, ajaxOptions, thrownError) => {
                    Swal.fire("Delete failed!", "Please try again.", "error");
                    LoadData(name);
                },
            });
        }
    });
}

// Generate code
$("#btn-generate-code").click(function(e) {
    e.preventDefault();
    $.ajax({
        type: "GET",
        url: route(`generate_code`, 10),
        success: (response) => {
            $("input[name=code]").val(response);
        },
    });
});


