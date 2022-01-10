$(document).ready(function() {
    var tourId = $("input[name=tour_id]").val();
    var csrf = $('meta[name="csrf-token"]').attr("content");
    // noi dung cua form moi se duoc tao khi an nut .add-form
    var form = `
    <div class="card card-info">
                            <div class="card-header">
                                <div class="card-title">Thêm kế hoạch</div>
                                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                            </div>
                            <form action="${route(
                                "admin.tour.plan.store"
                            )}" method="POST">
                            <input type="hidden" name="_token" value="${csrf}">
                                <div class="card-body">
                                    <input type="hidden" name="tour_id" value="${tourId}">
                                    <div class="form-group col-sm-12">
                                        <label for="inputDay">Ngày</label>
                                        <input type="number" id="inputDay" name="day" class="form-control" min="1"
                                            required placeholder="Nhập ngày của tour">
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <label for="summernote">Nội dung</label>
                                        <textarea id="summernote" name="content" class="form-control" rows="5" required
                                            placeholder="Nhập nội dung kế hoạch"></textarea>
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <label for="inputNote">Ghi chú</label>
                                        <textarea id="inputNote" name="note" class="form-control" rows="2"
                                            placeholder="Nhập ghi chú"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit"
                                            class="btn btn-sm btn-success float-right btn-save-plan">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
    `;

    // add them form khi nhan vao nut .add-form
    $(".add-form").click((e) => {
        e.preventDefault();
        $("#list-plan").append(form);
    });
    // xoa form khi click vao nut .delete-form
    // $("#list-plan").on("click", ".delete-form", (e) => {
    //     e.preventDefault();
    //     $(this)
    //         .parent("div")
    //         .parent("div")
    //         .parent("form")
    //         .parent("div")
    //         .remove();
    // });
});

// Ham tao mot toast co ban
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});

// load lai plan sau khi store, update, delete
function loadPlan(tourId) {
    $.ajax({
        type: "GET",
        url: route(`admin.tour.plan.index_data`, tourId),
        // data: "data",
        dataType: "json",
        success: (response) => {
            var str = "";
            $.each(response, function(index, value) {
                //  code form html
            });
            $("element").html(str);
        },
        error: () => {
            let str = "<div><p>Load failed!</p></div>";
            $("element").html(str);
        },
    });
}

// them moi plan
function storePlan(tourId) {
    $.ajax({
        type: "POST",
        url: route(`admin.tour.plan.store`, tourId),
        data: {
            tour_id: tourId,
            day: $("input[name=day]").val(),
            content: $("textarea[name=content]").val(),
            note: $("input[name=note]").val(),
        },
        dataType: "json",
        success: (response) => {
            Toast.fire({
                icon: response.stt,
                title: response.title,
            });
            loadPlan(tourId);
        },
        error: (response) => {
            Toast.fire({
                icon: response.stt,
                title: response.title,
            });
            loadPlan(tourId);
        },
    });
}

// cap nhat plan
function updatePlan(tourId, planId) {
    $.ajax({
        type: "POST",
        url: route(`admin.tour.plan.update`, planId),
        // data: "data",
        dataType: "json",
        success: (response) => {
            Toast.fire({
                icon: response.stt,
                title: response.title,
            });
            loadPlan(tourId);
        },
        error: (response) => {
            Toast.fire({
                icon: response.stt,
                title: response.title,
            });
            loadPlan(tourId);
        },
    });
}

// Xoa plan
function deletePlan(tourId, planId) {
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
                type: "GET",
                url: route(`admin.tour.plan.delete`, planId),
                // data: "data",
                dataType: "json",
                success: (response) => {
                    Swal.fire(response.title, response.msg, response.stt);
                    loadPlan(tourId);
                },
                error: () => {
                    Swal.fire("Delete failed!", "Please try again.", "error");
                    loadPlan(tourId);
                },
            });
        }
    });
}