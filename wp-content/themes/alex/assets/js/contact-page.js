jQuery(document).ready(function($) {
    // ====== DOM ======
    var stepLis = $("#position_box li");
    var formBox = $("#form_box");
    var form = $("#applyform");
    var submitImg = form.find('input.submit[type="image"]');

    var errBox = $(".errm"); // khối lỗi
    var errBackWrap = (errBox.next().attr("id") === "confirm_btn") ? errBox.next() : $(); // nút quay lại

    var confirmBox = $(".submittable"); // khối xác nhận
    var confirmForm = confirmBox.find("form");
    var confirmSendImg = confirmBox.find('input.submit[type="image"]');
    var confirmBtnsWrap = confirmBox.find("#confirm_btn");

    // đoạn cảm ơn (là <p> cuối cùng trong #form_box)
    var thanksP = formBox.find("p").last();

    // Ẩn mặc định mọi thứ ngoài STEP1
    show(errBox, false);
    show(errBackWrap, false);
    show(confirmBox, false);
    show(thanksP, false);
    setStep(1);

    // Gỡ inline history.back() rồi gán handler quay về STEP1
    $(".h_back").each(function() {
        $(this).removeAttr("onclick").on("click", function(e) {
            e.preventDefault();
            setStep(1);
            $("html, body").animate({ scrollTop: formBox.offset().top - 20 }, 600);
        });
    });

    // ====== Helpers ======
    function show(el, vis){ if(!el.length) return; el.css("display", vis ? "" : "none"); }

    function setStep(n){
        stepLis.each(function(i){
            $(this).toggleClass("active", i === n-1);
        });
        show(form, n === 1);
        show(thanksP, n === 3);
        if (n !== 2){ show(errBox,false); show(errBackWrap,false); show(confirmBox,false); }
    }

    function emailOK(v){ return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v); }
    function onlyDigits(v){ return (v||"").replace(/\D/g,""); }

    function values(){
        return {
            name:  (form.find('input[name="お名前"]').val() || "").trim(),
            kana:  (form.find('input[name="フリガナ"]').val() || "").trim(),
            tel:   onlyDigits(form.find('input[name="電話番号"]').val() || ""),
            email: (form.find('input[name="email"]').val() || "").trim(),
            email2:(form.find('input[name="email2"]').val() || "").trim(),
            body:  (form.find('textarea[name="お問い合わせ内容"]').val() || "").trim()
        };
    }

    function renderErrors(list){
        if (!errBox.length) return;
        errBox.html([
            "<h4>未入力項目があります</h4>",
            list.map(t => `<font color="#ff0000">${t}</font><br>`).join("")
        ].join(""));
    }

    function fillConfirm(nameAttr, val){
        var hidden = confirmBox.find(`input[name="${nameAttr}"]`);
        if (hidden.length) hidden.val(val);
        var td = hidden.closest("td");
        if (td.length){
            td.contents().filter(function(){ return this.nodeType === 3; }).remove();
            td.prepend(document.createTextNode(val || "—"));
        }
    }

    // ====== B1 -> B2 (validate) ======
    function handleConfirm(e){
        e.preventDefault();
        var v = values();
        var errs = [];
        if (!v.name)  errs.push("「お名前」は必須入力項目です。");
        if (!v.email) errs.push("「メールアドレス」は必須入力項目です。");
        if (!v.email2)errs.push("「メールアドレス：確認用」は必須入力項目です。");
        if (!v.body)  errs.push("「お問い合わせ内容」は必須入力項目です。");
        if (v.email && !emailOK(v.email)) errs.push("メールアドレスの形式が正しくありません。");
        if (v.email && v.email2 && v.email !== v.email2) errs.push("メールアドレス確認用が一致しません。");
        if (v.tel && (v.tel.length < 9 || v.tel.length > 11)) errs.push("電話番号は9〜11桁の数字で入力してください。");

        if (errs.length){
            renderErrors(errs);
            setStep(2);
            show(confirmBox, false);
            show(errBox, true);
            show(errBackWrap, true);
            $("html, body").animate({ scrollTop: formBox.offset().top - 20 }, 600);
            return;
        }

        show(errBox, false);
        show(errBackWrap, false);
        fillConfirm("お名前", v.name);
        fillConfirm("フリガナ", v.kana);
        fillConfirm("電話番号", v.tel);
        fillConfirm("email", v.email);
        fillConfirm("お問い合わせ内容", v.body);
        var hEmail2 = confirmBox.find('input[name="email2"]');
        if (hEmail2.length) hEmail2.val(v.email2);

        setStep(2);
        show(confirmBox, true);
        $("html, body").animate({ scrollTop: formBox.offset().top - 20 }, 600);
    }

    submitImg.on("click", handleConfirm);
    form.on("submit", handleConfirm);

    // ====== B2 (XÁC NHẬN) -> B3 ======
    function handleFinalSend(e){
        e.preventDefault();
        show(confirmBox, false);
        setStep(3);
        $("html, body").animate({ scrollTop: formBox.offset().top - 20 }, 600);
    }

    if (confirmSendImg.length) confirmSendImg.on("click", handleFinalSend);
    if (confirmForm.length) confirmForm.on("submit", handleFinalSend);
});
