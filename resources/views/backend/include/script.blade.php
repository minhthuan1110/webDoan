<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function () {
        // Alert Delete. Hien xac nhan xoa
        $(".btn-delete").click((e) => {
            let isDelete = confirm("Bạn có chắc chắn muốn xóa?");
            if (!isDelete) {
                e.preventDefault();
            }
        });
    });
</script>
<!-- Optional JavaScript Bootstrap -->
<script src="{{asset('backend/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE App -->
<script src="{{ URL::asset('backend/js/adminlte/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('backend/js/adminlte/demo.js' ) }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('backend/js/adminlte/dashboard.js')}}"></script>
<!-- bs-custom-file-input -->
<script src="{{URL::asset('backend/js/adminlte/input.min.js')}}"></script>
<!-- Select2 -->
<script src="{{URL::asset('backend/js/adminlte/select2.full.min.js')}}"></script>
<!-- Summernote -->
<script src="{{URL::asset('backend/js/adminlte/summernote.min.js')}}"></script>

<script>
    //get file input
    $(function () {
    bsCustomFileInput.init();
    });

    // muntible date.
    $('.date').datepicker({
    multidate: true
    });
    $('.date').datepicker('setDates',)

    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Initialize Select2 Elements
    $('.select2tagging').select2({
        theme: 'classic',
        tags: true,
        tokenSeparators: [';'],
    });
    //Initialize Select2 Elements
    $('.select2cls').select2({
        theme: 'classic',
    });


    // Summernote
    $('#summernote').summernote({
        placeholder: 'Viết nội dung tại đây...',
        tabsize: 2,
        height: 220,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      //tabs
      $( function() {
        $( "#tabs" ).tabs();
    } );

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
    //image form.
    function chooseFile(fileInput){
        if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                var valueInput = $('#exampleInputFile').val();
                $('#image').attr('src', e.target.result);
                $('.img-tour_link').text(valueInput.slice(valueInput.lastIndexOf('\\')+1));
                $('.img-tour_add').removeClass('disabled');
                $('.icon-add_tour').addClass('disabled');
            }
            reader.readAsDataURL(fileInput.files[0]);

        }
    }



</script>

<script>
    const listLink = document.querySelectorAll('.nav-link');

    listLink.forEach((listlinks,index)=>{
        listlinks.onclick=function(){
            const linkActive = document.querySelector('.nav-link.active');
            linkActive.classList.remove("active");
            this.classList.add('active')
        }
    });
</script>
<script>
    var setDefaultActive = function() {
    var path = window.location.pathname;
    var element = $(".nav-item a[href='" + path + "']");
    element.addClass("active");
}

setDefaultActive()
</script>
