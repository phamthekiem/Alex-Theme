jQuery(function($){
    function setStep(n){
        $("#position_box li").removeClass("active").eq(n-1).addClass("active");
        $("#form_box form").toggle(n === 1);
        $(".submittable").toggle(n === 2);
        $(".step-3").toggle(n === 3);
    }

    // Validate từng input
    function validateForm(){
        let valid = true;
        $("#applyform [name]").each(function(){
            let $field = $(this);
            let val = $.trim($field.val());
            $field.next(".error").remove();

            if($field.attr("name")==="name" && !val){
                valid=false; $field.after("<span class='error'>必須項目です</span>");
            }
            if($field.attr("name")==="email" && !val){
                valid=false; $field.after("<span class='error'>必須項目です</span>");
            }
            if($field.attr("name")==="email-confirm" && val!==$("[name='email']").val()){
                valid=false; $field.after("<span class='error'>メール一致しません</span>");
            }
            if($field.attr("name")==="content" && !val){
                valid=false; $field.after("<span class='error'>必須項目です</span>");
            }
            if($field.attr("name")==="phone" && val && (val.length<9 || val.length>11)){
                valid=false; $field.after("<span class='error'>9〜11桁の数字で入力してください</span>");
            }
        });
        return valid;
    }

    // Step1 → Step2
    $("#applyform .submit").on("click", function(e){
        e.preventDefault();
        if(!validateForm()) return;

        // Fill dữ liệu vào Step2
        $("#applyform").find("input, textarea").each(function(){
            var name = $(this).attr("name");
            var val = $(this).val();
            $(".submittable input[name='"+name+"']").val(val);
            $(".submittable td[data-field='"+name+"']").text(val);
        });
        $("form#confirmform").addClass("formActiveConfirm");
        setStep(2);
        window.scrollTo({ top: $("#form_box").offset().top-20, behavior:"smooth" });
    });

    // Back to Step1
    $(".h_back").on("click", function(e){
        e.preventDefault();
        setStep(1);
    });

    // Step2 → Step3 (sau khi submit thành công)
    if(new URLSearchParams(window.location.search).get("contact")==="success"){
        setStep(3);
    } else {
        setStep(1);
    }
});
