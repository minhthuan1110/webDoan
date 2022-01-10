// =========================date_jquery======================
// $(document).ready(function() {
//     var minDate=new Date();
//     $("#datepicker").datepicker({
//         showAnim:'drop',
//         numberOfMonth:1,
//         minDate:minDate,
//         dateFormat:'dd/mm/yy',
//     });
// });
//======================header page detail product.===============
const translate = document.querySelectorAll(".translate");
const big_title = document.querySelector(".slider-text");
const header = document.querySelector("#header");
const section = document.querySelector("section");
const headerDetailBlog = document.querySelector(".search-ordering-list");
const opacity = document.querySelectorAll(".opacity");
let header_height = header.offsetHeight;
let section_height = section.offsetHeight;

window.addEventListener("scroll", () => {
    let scroll = window.pageYOffset;
    
        translate.forEach((element) => {
            let speed = element.dataset.speed;
            element.style.transform = `translateY(${scroll * speed}px)`;
            big_title.style.opacity = -scroll / (header_height / 2) + 1;
        });
});

$(function(){
    const hour = document.querySelector('#hr');
    const minute = document.querySelector('#mn');
    const second = document.querySelector('#sc');
        function time(){
            let day = new Date();
            let hh = day.getHours() * 30;
            let mm = day.getMinutes() * 6;
            let ss = day.getSeconds() * 6;
            let hourTime = hh + mm / 12;
            if(hour== null ){
                
            }else{
                hour.style.transform = `rotateZ(${hourTime}deg)`;
                minute.style.transform = `rotateZ(${mm}deg)`;
                second.style.transform = `rotateZ(${ss}deg)`;
            }
        }
    setInterval(time, 1000);

});



$(function() {
    var onlyThisDates =$("#datepicker").attr("date-number");
    var minDate = new Date();
    $("#datepicker").datepicker({
        defaultDate: new Date(),
        showAnim: 'drop',
        numberOfMonth: 1,
        minDate: minDate,
        dateFormat: 'dd/mm/yy',
        beforeShowDay: function(date) {
            var disabled = true, // date enabled by default
                // get the number of days in current month
                numOfDays = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
                var dt_ddmmyyyy = date.getDate() + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();
            if (numOfDays % 4 == 0)
                disabled = (onlyThisDates.indexOf(dt_ddmmyyyy) != -1) // for even-days months, disable the even dates
            else disabled = (onlyThisDates.indexOf(dt_ddmmyyyy) != -1) //for odd - days months, disable the odd dates
            return [disabled, ""]
        }

    });
});

// =====================tabs============================

const tabLink = document.querySelectorAll(".tablinks");
const panes = document.querySelectorAll(".tabcontent");

// for(var i = 0; i < tabLink.length; i++ ) {
//     tabLink[i].onclick = function () {
//         tabLink.classList.toggle('active_page')
//     }
// }
tabLink.forEach((tabs, index) => {
    const showPan = panes[index];
    tabs.onclick = function() {
        const tabLinkview = document.querySelector(".tablinks.active_page");
        const panesView = document.querySelector(".tabcontent.active_page");

        tabLinkview.classList.remove("active_page");
        panesView.classList.remove("active_page");

        this.classList.add("active_page");
        showPan.classList.add("active_page");
    };
});


//==================================show img====================

function effectImg(data){
    const listImg= $(data.listItemImage);
    const preViewBox=document.querySelector(data.previewBox);
    const prevewImg= preViewBox.querySelector('.show-img-detai-tour');
    const closeIcon= preViewBox.querySelector('.icons');
    const currentImg = preViewBox.querySelector('.currents-i');
    const totalImg = preViewBox.querySelector('.total-imgs');
 
    const shadowImg = document.querySelector('.shawdow2-show-img');
     for(var i=0 ;i<listImg.length;i++) {
         totalImg.innerText=listImg.length;
         let newIndex = i;
         let clickImgIndex;
         listImg[i].onclick = function (){
             clickImgIndex= newIndex;
             function preView(){
                 currentImg.innerText=newIndex+1;
                 clickImgIndex= newIndex;
                
                 let selectedImgUrl = listImg[clickImgIndex].querySelector('.img-detail_list_tour').src;
                //  console.log(selectedImgUrl);
                 prevewImg.src = selectedImgUrl;
             }
             const prevBtn = document.querySelector('.previews');
             const nextBtn = document.querySelector('.nexts');
             prevBtn.onclick = () => {
                 newIndex--;
                 if (newIndex == 0) {
                     preView();
                     prevBtn.style.display = 'none'
                 } else {
                     preView();
                     nextBtn.style.display = 'block';
                 }
             }
             nextBtn.onclick = () => {
                 newIndex++;
                 if (newIndex >=listImg.length - 1) {
                     preView();
                     nextBtn.style.display = 'none'
                 } else {
                     preView();
                     prevBtn.style.display = 'block';
                 }
 
             }
             preView();
             preViewBox.classList.add('shows');
             shadowImg.style.display = 'block';
             shadowImg.onclick=()=>{
                 newIndex = clickImgIndex;
                 prevBtn.style.display = 'block';
                 nextBtn.style.display = 'block'
                 preViewBox.classList.remove('shows');
                 shadowImg.style.display = 'none';
             }
             closeIcon.onclick = () => {
                 newIndex = clickImgIndex;
                 prevBtn.style.display = 'block';
                 nextBtn.style.display = 'block';
                 preViewBox.classList.remove('shows');
                 shadowImg.style.display = 'none';
 
             }
         }
     }
 }


// ==========================date=====
$(document).ready(function() {
    var minDate = new Date();
    $("#datepicker").datepicker({
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        dateFormat: "MM yy",
        onClose: function(dateText, inst) {
            $(this).datepicker(
                "setDate",
                new Date(inst.selectedYear, inst.selectedMonth, 1)
            );
        },
    });
});

$(function() {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 500,
        values: [75, 300],
        slide: function(event, ui) {
            $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
        },
    });
    $("#amount").val(
        "$" +
        $("#slider-range").slider("values", 0) +
        " - $" +
        $("#slider-range").slider("values", 1)
    );
});