{{-- select option của select2 --}}
<script>
    $(function() {
        // Initialize Select2 elements
        $('.select2').select2();

        // Initialize Select2 Bootstrap4 elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    });
</script>

{{-- jquery validate --}}
<script>
    $(document).ready(function() {

        // load header, footer
        $.get("/social-element",
            function (data, textStatus, jqXHR) {
                console.log(data);
                let emailLink = $('.link-email'),
                phoneLink = $('.link-phone'),
                addressLink = $('.link-address'),
                twLink = $('.link-twitter'),
                pinLink = $('.link-pinterest'),
                fbLink = $('.link-facebook'),
                insLink = $('.link-instagram'),
                ytbLink = $('.link-youtube');

                emailLink.attr('href', 'mailto:' + data.email);
                emailLink.children('span').text(data.email);
                phoneLink.attr('href', 'tel:' + data.phone);
                phoneLink.children('span').text(data.phone);
                addressLink.children('span').text(data.address);
                twLink.attr('href', data.twitter);
                pinLink.attr('href', data.pinterest);
                fbLink.attr('href', data.facebook);
                insLink.attr('href', data.instagram);
                ytbLink.attr('href', data.youtube);

                $('.address-1').text(data.address2);
                $('.address-2').text(data.address3);
                $('.address-3').text(data.address4);
            },
        );

        $('#login-form').validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                }
            },
            errorPlacement: function(error, element) {
                switch (element.attr('name')) {
                    case 'email':
                    case 'password':
                        error.insertBefore(element);
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });

        $('#register-form').validate({
            rules: {
                name: "required",
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 6,
                },
                re_password: {
                    // equalTo: "#password",
                    required: true,
                    minlength: 6,
                },
            },
            errorPlacement: function(error, element) {
                switch (element.attr('name')) {
                    case 'name':
                    case 'email':
                    case 'password':
                    case 're_password':
                        error.insertBefore(element);
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>
<script>
    const selected = document.querySelector(".filter-selected")
    const optionContainer = document.querySelector(".filter__list")
    const listOption = document.querySelectorAll(".filter__item")

    const selectedLocation = document.querySelector(".filter-selected-location")
    const ContainerLocation = document.querySelector(".filter__list-location")
    const listOptionLocation = document.querySelectorAll(".filter__item-location")


    selected.addEventListener("click", () => {
        optionContainer.classList.add("active");
    });
    listOption.forEach(o => {
        o.addEventListener("click", () => {
            selected.innerHTML = o.querySelector(".filter__item-month").innerHTML;
            optionContainer.classList.remove("active");
        })
    });
</script>

<!-- Jquery Validation -->
<script src="{{ URL::asset('backend/jquery-validation-1.19.3/dist/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('backend/jquery-validation-1.19.3/dist/additional-methods.min.js') }}"></script>
<!-- vietour js -->
<script src="{{ URL::asset('frontend/js/main.js') }}"></script>
<script src="{{ URL::asset('frontend/js/detail_tour/detail_tour.js') }}"></script>
<script src="{{ URL::asset('frontend/js/contact_us_js/contact_us.js') }}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD54ImUCEQ9aYBDgXVomjGIBdqdX93k3Z0&callback=initMap&callback=initMap">
</script>
<script type="text/javascript" src="{{ URL::asset('frontend/js/sweetalert2.all.min.js') }}"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script> -->
<script type="text/javascript">
    // -----------------update javascipt---------------------
// hàm auto slile show.
  actionSlideShow({
     form:'#form1',
     elementShowClass:'.container__slide-item',
     iterationTime :8000,
  })

  actionSlideShow({
     form:'#form2',
     elementShowClass:'.container__slide-item',
     iterationTime :9000,
  })

  actionSlideShow({
     form:'#form3',
     elementShowClass:'.container__slide-item',
     iterationTime :11000,
  })

//   Effect...
  effectImg({
      listItemImage:'.action-img',
      previewBox:'.previews-img',
      prevewImg:'.show-img-detai-tour'
  })
  effectImg({
      listItemImage:'.action-img1',
      previewBox:'.previews-img',
      prevewImg:'.show-img-detai-tour'
  })

  //image form.
  function chooseFile(fileInput){
        if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();
            reader.onload= function(e){
                // var valueInput = $('#exampleInputFile').val();
                $('#img-orther-update').attr('src', e.target.result);
                // $('.img-tour_link').text(valueInput.slice(valueInput.lastIndexOf('\\')+1));
                $('.img-orther-from').removeClass('none');
                $('.input-img-orther-data').addClass('none');
            }
            reader.readAsDataURL(fileInput.files[0]);

        }
    }
</script>





<script>
    const buyBtns = document.querySelectorAll('.js-account')
    const modal =  document.querySelector(".modal")
    const modalClose = document.querySelector('.js-modal-close')
    const modalContainer = document.querySelector('.modal-container')

    // hàm hiển thị modal đăng nhập (thêm class open vào modal)
    function showModal(){
        modal.classList.add('open')
    }
    // hàm ẩn modal  (loại bỏ class open ra khỏi modal)
    function hideModal(){
        modal.classList.remove('open')
    }

    for (const buyBtn of buyBtns) {
        buyBtn.addEventListener('click', showModal)
    }
    modalClose.addEventListener('click', hideModal)

    modalContainer.addEventListener('click', function (event) {
        event.stopPropagation()
    });

    var onChange = document.querySelectorAll('.form-header__action');
  var onChange1 = document.querySelectorAll('.form-body');
  for(var i=0; i<onChange.length;i++){
    const addactive = onChange1[i];
    onChange[i].onclick = function(){
      var onChange1 = document.querySelector('.form-body.active');
      for(var i=0; i<onChange.length;i++){
        onChange[i].classList.remove('active');
        onChange1.classList.remove('active');
      }
      this.classList.add('active');
      addactive.classList.add('active');
    }
  }
</script>
