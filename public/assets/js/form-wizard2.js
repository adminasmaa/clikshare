document.getElementById("compD").innerHTML = `
	<label class="form-control-label">إسم الشركة<span class="tx-danger">*</span></label> <input class="form-control" id="reName" name="company_name" placeholder="ادخل اسم الشركة" required="" type="text"
		data-parsley-minlength="5"
		data-parsley-minlength-message="يجب ان تتكون اسم الشركة من 5 أحرف او اكثر"
		data-parsley-required
		data-parsley-required-message="إسم الشركة مطلوب">`;

document.getElementById("dFile").innerHTML = `
	<div class="col-12">
		<label class="form-control-label">إسم الشركة في السجل التجاري*<span class="tx-danger">*</span></label>
		<input class="form-control" id="docName" name="company_name_in_cr" placeholder="ادخل اسم الشركة الموجود بالسجل التجاري" required="" type="text"
		data-parsley-required
		data-parsley-required-message="الاسم مطلوب"
		>
	</div>
	<div class="col-md-5 col-lg-6 mg-t-20 mt-5">
		<div class="form-group">
			<div class="form-label">*السجل التجاري</div>
			<div class="custom-file">
				<input type="file" class="custom-file-input" name="cr_document" id="docOne"
				data-parsley-required
				data-parsley-required-message="الملف مطلوب"
				>
				<label class="custom-file-label">اختر الملف</label>
			</div>
		</div>
	</div>
	<div class="col-md-5 col-lg-6 mg-t-20 mt-5">
		<div class="form-group">
			<div class="form-label">*الفاتورة الضريبية</div>
			<div class="custom-file">
				<input type="file" class="form-control" name="vat_document" id="docTow"
				data-parsley-required
				data-parsley-required-message="الملف مطلوب"
				>
				<label for="docTow" class="custom-file-label">اختر الملف</label>
			</div>
		</div>
	</div>`;

$(function () {
  "use strict";

  $("#wizard1").steps({
    headerTag: "h3",
    bodyTag: "section",
    autoFocus: true,
    titleTemplate:
      '<span class="number">#index#</span> <span class="title">#title#</span>',
    transitionEffect: "slideLeft",
  });

  $(function () {
    let sinD = document.getElementById("sinD");
    let compD = document.getElementById("compD");
    let sinData = document.getElementById("sinData");
    let compData = document.getElementById("compData");
    $(".inputRadio").click(function () {
      if ($(this).is(":checked")) {
        // alert($(this).val());
        if ($(this).val() === "1") {
          document.getElementById("compD").innerHTML = `
				<label class="form-control-label">إسم الشركة<span class="tx-danger">*</span></label> <input class="form-control" id="company_name" name="reName" placeholder="ادخل اسم الشركة" required="" type="text"
					data-parsley-minlength="5"
					data-parsley-minlength-message="يجب ان تتكون اسم الشركة من 5 أحرف او اكثر"
					data-parsley-required
					data-parsley-required-message="إسم الشركة مطلوب">`;

          document.getElementById("dFile").innerHTML = `
				<div class="col-12">
					<label class="form-control-label">إسم الشركة في السجل التجاري<span class="tx-danger">*</span></label>
					<input class="form-control" id="docName" name="company_name_in_cr" placeholder="ادخل اسم الشركة الموجود بالسجل التجاري" required="" type="text"
					data-parsley-required
					data-parsley-required-message="الاسم مطلوب"
					>
				</div>
				<div class="col-md-5 col-lg-6 mg-t-20 mt-5">
					<div class="form-group">
						<div class="form-label">*السجل التجاري</div>
						<div class="custom-file">
						<input type="file" class="custom-file-input" name="cr_document" id="docOne"
						data-parsley-required
						data-parsley-required-message="الملف مطلوب"
						>
						<label class="custom-file-label">اختر الملف</label>
					    </div>
				    </div>
				</div>
				<div class="col-md-5 col-lg-6 mg-t-20 mt-5">
					<div class="form-group">
						<div class="form-label">*الفاتورة الضريبية</div>
						<div class="custom-file">
						<input type="file" class="form-control" name="vat_document" id="docTow"
						data-parsley-required
						data-parsley-required-message="الملف مطلوب"
						>
						<label for="docTow" class="custom-file-label">اختر الملف</label>
					    </div>
					</div>
				</div>`;
        } else {
          document.getElementById(
            "compD"
          ).innerHTML = `<label class="form-control-label">الاسم كاملاً<span class="tx-danger">*</span></label> <input class="form-control" id="reName" name="full_name" placeholder="ادخل الاسم كاملاً" required="" type="text"
				data-parsley-minlength="8"
				data-parsley-minlength-message="يجب ان يتكون الاسم من 8 أحرف او اكثر"
				data-parsley-required
				data-parsley-required-message="الاسم مطلوب"
				>`;

          document.getElementById("dFile").innerHTML = `
				<div class="col-12">
					<label class="form-control-label">الاسم في جواز السفر<span class="tx-danger">*</span></label>
					<input class="form-control" id="docName" name="name_in_passport" placeholder="ادخل الاسم الموجود بالجواز" required="" type="text"
					data-parsley-required
					data-parsley-required-message="الاسم مطلوب"
					>
				</div>
				<div class="col-md-5 col-lg-6 mg-t-20 mt-5">
					<div class="form-group">
						<div class="form-label">*الهوية الوطنية</div>
						<div class="custom-file">
						<input type="file" class="custom-file-input" name="id_document" id="docOne"
						data-parsley-required
						data-parsley-required-message="الملف مطلوب"
						>
						<label class="custom-file-label">اختر الملف</label>
						</div>
					</div>
				</div>
				<div class="col-md-5 col-lg-6 mg-t-20 mt-5">
					<div class="form-group">
						<div class="form-label">*جواز السفر</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" name="passport_document" id="docTow"
							data-parsley-required
							data-parsley-required-message="الملف مطلوب"
							>
							<label class="custom-file-label">اختر الملف</label>
						</div>
					</div>
				</div>
				`;
        }
        $("#reName").parsley().validate();
      }
    });
  });

  $("#wizard2").steps({
    headerTag: "h3",
    bodyTag: "section",
    autoFocus: true,
    titleTemplate:
      '<span class="number">#index#</span> <span class="title">#title#</span>',
    labels: {
      cancel: "Cancel",
      current: "current step:",
      pagination: "Pagination",
      finish: "تسجيل",
      next: "التالي",
      previous: "السابق",
      loading: "Loading ...",
    },
    transitionEffect: "fade",

    onStepChanging: function (event, currentIndex, newIndex) {
      if (currentIndex < newIndex) {
        // Step 1 form validation
        if (currentIndex === 0) {
          return true;
        }
        if (currentIndex === 1) {
          if (
            $("#password").parsley().isValid() &&
            $("#rePassword").parsley().isValid() &&
            $("#aEmail").parsley().isValid()
          ) {
            return true;
          } else {
            $("#password").parsley().validate();
            $("#rePassword").parsley().validate();
            $("#aEmail").parsley().validate();
          }
        }
        if (currentIndex === 2) {
          if (
            $("#reName").parsley().isValid() &&
            $("#compMobile").parsley().isValid() &&
            $("#compPhone").parsley().isValid() &&
            $("#compCountry").parsley().isValid()
          ) {
            return true;
          } else {
            $("#reName").parsley().validate();
            $("#compMobile").parsley().validate();
            $("#compPhone").parsley().validate();
            $("#compCountry").parsley().validate();
          }
        }
        if (currentIndex === 3) {
          if (
            $("#docOne").parsley().isValid() &&
            $("#docTow").parsley().isValid() &&
			$("#docName").parsley().isValid()
          ) {
            return true;
          } else {
            $("#docName").parsley().validate();
			$("#docOne").parsley().validate();
            $("#docTow").parsley().validate();
          }
        }
      } else {
        return true;
      }
    },

    onFinished: function (event, currentIndex) {
        // Submit form input

        var paymentMthodsIds = getPaymentMthodsIds();

        for(let e of paymentMthodsIds){
            let payName = `<option selected value='${e.name}'>${e.pTitle}</option>`
            document.getElementById('payValueHide').innerHTML += payName
            let payType = `<option selected value='${e.typeM}'>${e.typeM}</option>`
            document.getElementById('payTypeHide').innerHTML += payType
        }

		var form = $(this);
        form.submit();

    //   if (
    //     $("#cradNum").parsley().isValid() &&
    //     $("#cardName").parsley().isValid() &&
    //     $("#cardCVV").parsley().isValid() &&
    //     $("#cardMM").parsley().isValid() &&
    //     $("#cardYY").parsley().isValid()
    //   ) {
    //     var form = $(this);

    //     // Submit form input
    //     form.submit();
    //   } else {
    //     $("#cradNum").parsley().validate();
    //     $("#cardMM").parsley().validate();
    //     $("#cardYY").parsley().validate();
    //     $("#cardCVV").parsley().validate();
    //     $("#cardName").parsley().validate();
    //   }
    },
  });
});




const parent = document.getElementById("entries");
parent.style.width = '150px';
parent.style.height = '150px';
parent.style.backgroundColor = 'red';

document.getElementById("newEntry").addEventListener("click", newEntry);

function newEntry() {
	console.log("Clicked")
    var newDiv = document.createElement("div");
    newDiv.style.width = '50px';
    newDiv.style.height = '50px';
    newDiv.textContent = 'Entry';
    newDiv.style.backgroundColor = 'white';
    parent.appendChild(newDiv);
}
