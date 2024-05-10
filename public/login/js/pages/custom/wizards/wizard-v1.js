

var KTWizardV1 = function () {
	var e, t, r;
	return {
		init: function () {
			var n;
			KTUtil.get("kt_wizard_v1"), e = $("#kt_form"), (r = new KTWizard("kt_wizard_v1", {
				startStep: 1,
				clickableSteps: !0
			})).on("beforeNext", function (e) {
				!0 !== t.form() && e.stop()
			}), r.on("beforePrev", function (e) {
				!0 !== t.form() && e.stop()
			}), r.on("change", function (e) {
				setTimeout(function () {
					KTUtil.scrollTop()
				}, 500)
			}), t = e.validate({
				ignore: ":hidden",
				rules: {
					username: {
						required: !0
					},
					email: {
						required: !0,
						email: !0
					},
					password: {
						required: !0
					},
					name: {
						required: !0
					},
					contact: {
						required: !0
					},
					accept: {
						required: !0
					}
				},
				messages: {
					accept: {
						required: "You must accept the Terms and Conditions agreement!"
					}
				},
				invalidHandler: function (e, t) {
					KTUtil.scrollTop(), swal.fire({
						title: "",
						text: "There are some errors in your submission. Please correct them.",
						type: "error",
						confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
					})
				},
				submitHandler: function (e) {}
			}), (n = e.find('[data-ktwizard-type="action-submit"]')).on("click", function (r) {
				r.preventDefault(), t.form() && (KTApp.progress(n), e.ajaxSubmit({
					success: function () {
						KTApp.unprogress(n), swal.fire({
							title: "",
							text: "The application has been successfully submitted!",
							type: "success",
							confirmButtonClass: "btn btn-secondary"
						})
					}
				}))
			})
		}
	}
}();
jQuery(document).ready(function () {
	KTWizardV1.init()
});
