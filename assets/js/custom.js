$(document).ready(function(){
$("select#city").change(function(){console.log("option changed");sub_total=$(".theiaStickySidebar .summary-wrap >div:nth-child(1) >div:nth-child(2)").html().split('$')[1];sub_total=parseFloat(sub_total).toFixed(2);if(sub_total>=300){fee=0;$(".theiaStickySidebar .summary-wrap >div:nth-child(2) >div:nth-child(2)").html("Free");}else {fee=parseFloat($(this).val().split("_")[1]).toFixed(2);$(".theiaStickySidebar .summary-wrap >div:nth-child(2) >div:nth-child(2)").html("$"+fee);}$("#subtotal_extra_charge").val(parseInt(fee));
total=parseFloat(sub_total)+parseFloat(fee);total=total.toFixed(2);if($(".summary-wrap .cart_total_wrap .cart_total").length)
$(".summary-wrap .cart_total_wrap .cart_total").html("$"+total);else $(".theiaStickySidebar .summary-wrap").append(`<div class="row cart_total_wrap bold"><div class="col-md-6 col-xs-6  text-right">Total</div><div class="col-md-6 col-xs-6  text-right cart_total">$`+total+`</div></div>`);
$.ajax({url:ajax_url,data:{fee:fee},type:'post',success:function(res){console.log(res);}})})
if($("#sau_merchant_upload_file").exists()){sau_merchant_progress=$("#sau_merchant_upload_file").data("progress");sau_merchant_progress=$("."+sau_merchant_progress);sau_merchant_preview=$("#sau_merchant_upload_file").data("preview");sau_merchant_field=$("#sau_merchant_upload_file").data("field");console.log(sau_merchant_field);var uploader=new ss.SimpleUpload({button:'sau_merchant_upload_file',url:"/image/uploadFile/?"+"method=get&field="+sau_merchant_field+"&preview="+sau_merchant_preview,name:'uploadfile',responseType:'json',allowedExtensions:['jpg','jpeg','png','gif'],maxSize:image_limit_size,onExtError:function(filename,extension){uk_msg(js_lang.invalid_file_ext,"warning");},onSizeError:function(filename,fileSize){uk_msg(js_lang.invalid_file_size,"warning");},onSubmit:function(filename,extension){busy(true);this.setProgressBar(sau_merchant_progress);},onComplete:function(filename,response){busy(false);if(!response){uk_msg(js_lang.upload_failed);return false;}else{dump(response);if(response.code==1){$("."+sau_merchant_preview).html(response.details.preview_html);}else{uk_msg(response.msg);}}}});}
$(document).on("click",".sau_remove_file",function(){preview=$(this).data("preview");$("."+preview).html('');});
});
$(window).scroll(function(){
    if($("#cat_tabs").length>0){
        var cate_header = $("#cat_tabs");
        var scroll = $(window).scrollTop();
        if (scroll >= 335) cate_header.addClass('fixed');
        else cate_header.removeClass('fixed');
    }
});
window.addEventListener('orientationchange', function(e){
    if($("#cat_tabs").length>0){
        var cate_header = $("#cat_tabs");
        var scroll = $(window).scrollTop();
        if (scroll >= 335) cate_header.addClass('fixed');
        else cate_header.removeClass('fixed');
    }
});