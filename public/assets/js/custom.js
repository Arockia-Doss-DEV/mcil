var showConsoleLog = 1;
$('.select2').select2();
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function checkImageInRemovedImage(image) {
    removedImages = $("#removedImages").val();
    if(removedImages != "" && removedImages != undefined) {
        var removedImagesArray = removedImages.split(",");
        if($.inArray(image, removedImagesArray) != -1) {
            removedImagesArray.splice( $.inArray(image, removedImagesArray), 1 );
            $("#removedImages").val(removedImagesArray.join(','));
        }
    }
}

function addRemovedImage(image) {
    removedImages = $("#removedImages").val();
    console.log(removedImages);
    if(removedImages != "" && removedImages != undefined) {
        images = removedImages.split(',');
        console.log($.inArray(image, images));
        if($.inArray(image, images) === -1) {
            $("#removedImages").val( $("#removedImages").val() + "," + image );
        }
    } else {
        $("#removedImages").val(image);
    }
}

$(document).ready(function() {

if (window.File && window.FileList && window.FileReader) {
    $(document).on('change', 'input.multiplefile', function (e) {
    //$(".multiplefileblock .multiplefile").on("change", ".multiplefile.last", function(e) {
    //$(".dynamic-uploaded-image").remove();
      var documentNames = [];
      var files = e.target.files,
      filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i];
        var fileName = f.name;
        var fileReader = new FileReader();
        fileReader.fileName = fileName;
        fileReader.onload = (function(e) {
          var file = e.target;
          //console.log(e.target);
          if($("#isunder_document_name").length > 0) {
            documentNames.push(e.target.fileName);
          } else {
                $("#upload_area_panel").removeClass("one-image-uploaded");
                if($("input.newattachmentfile").length == 1) {
                  $("#upload_area_panel").addClass("one-image-uploaded");
                }
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp', 'tiff', 'eps'];
                var pdfExtension = ['pdf', 'pdfs'];
                var splitedImageExtensions = e.target.fileName.split(".").pop();
                if ($.inArray(splitedImageExtensions.toLowerCase(), fileExtension) >= 0) {
                       showImage = "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\" data-name=\"" + e.target.fileName + "\" />" ;
                       showImage += "<span class='attachedfilename' >"+e.target.fileName+"</span>";
                }
                else if ($.inArray(splitedImageExtensions.toLowerCase(), pdfExtension) >= 0) {
                       showImage = "<img class=\"attachThumb\" src='"+window.baseUrl+"/Assets/images/icon_pdf.svg' title=\"" + file.name + "\" data-name=\"" + e.target.fileName + "\" />" ;
                       showImage += "<span class='attachedfilename' >"+e.target.fileName+"</span>";
                } else {
                      showImage = "<img class=\"attachThumb\" src='"+window.baseUrl+"/Assets/images/document-with-paperclip.svg' title=\"" + file.name + "\" data-name=\"" + e.target.fileName + "\" />" ;
                      showImage += "<span class='attachedfilename' >"+e.target.fileName+"</span>";
                }
                checkImageInRemovedImage(e.target.fileName);

                $("<span class=\"dynamic-uploaded-image col-md-3\" data-name=\"" + e.target.fileName + "\" >" +
                  showImage+
                  "<span class=\"dynamic-uploaded-image-remove currentlyuploaded\"><img class='deleteicon' src='"+window.baseUrl+"/Assets/images/delete.svg' /></span>" +
                  "</span>").insertAfter("#upload_dynamic_images_here");
                $(".dynamic-uploaded-image-remove.currentlyuploaded").click(function(){
                  console.log($(this).parent(".dynamic-uploaded-image").attr('data-name'))
                  addRemovedImage($(this).parent(".dynamic-uploaded-image").attr('data-name'))
                  $(this).parent(".dynamic-uploaded-image").remove();
                });
          }
        });
        fileReader.readAsDataURL(f);
      }
      console.log(documentNames);
      $(".customattachmentfile").removeClass('last').removeAttr("id");
      $('<input type="file" name="attachments[]" multiple="" class="custom-file-input customattachmentfile multiplefile last" id="validatedCustomFile" >').insertAfter("#upload_dynamic_files_here");
    });
  } else {
    alert("Your browser doesn't support to File API")
  }

});

function togglePw(htmlID) {
	$text = $("#"+htmlID).attr('type') == "text" ? "password" : "text";
	$("#"+htmlID).attr('type', $text );
	if($text == "text") {
		$("#"+htmlID+"_i").removeClass("fa-eye-slash").addClass("fa-eye");
	}else {
		$("#"+htmlID+"_i").addClass("fa-eye-slash").removeClass("fa-eye");
	}
}

function triggerFormCreateUpdate(modalId, htmlId) {
  event.preventDefault();
  $("#"+modalId).modal('show');
  $("#"+modalId+"_loadModalDatas").html("");
  var loadUrl = $("#"+htmlId).attr('href');
    $(".global-popup-loader").show();
    $.ajax({
      url: loadUrl,
      method: "GET",
      data: "",
      success: function(data){
        $("#"+modalId+"_loadModalDatas").html(data);
        if(data.status == 200) {
          $("#"+modalId+"_loadModalDatas").html(data);
        }
        $(".global-popup-loader").hide();
      },
      error: function(e) {
          console.log(e);
          $(".global-popup-loader").hide();
      }

    });
}

function deleteUpload(id, htmlid) {
  event.preventDefault()
  if (confirm('Are you sure want to delete?')) {
      $(".global-popup-loader").show();
      $.ajax({
        url: window.Laravel.siteBaseUrl + "/ajax/delete/upload",
        method: 'GET',
        type: 'GET',
        data: "id="+id,
        success: function(data){
          if(data.status == 200) {
            $("#"+htmlid).remove();
          }
          $(".global-popup-loader").hide();
        },
        error: function(e) {
            console.log(e);
            $(".global-popup-loader").hide();
        }

      });
  } 
}


function deleteItem(id, htmlid) {
	event.preventDefault()
	console.log($("#"+htmlid).attr('href'));
	if (confirm('Are you sure want to delete?')) {
      $(".global-popup-loader").show();
    	$.ajax({
	      url: $("#"+htmlid).attr('href'),
	      method: 'DELETE',
	      type: 'DELETE',
	      data: "",
	      success: function(data){
	        if(data.status == 200) {
	        	window.location.reload();
	        }
          $(".global-popup-loader").hide();
	      },
	      error: function(e) {
	          console.log(e);
            $(".global-popup-loader").hide();
	      }

	    });
	} 
}

function states(val, htmlid, sId) {
      $(".global-popup-loader").show();
      $.ajax({
        url: window.Laravel.siteBaseUrl + "/ajax/states/by/country",
        method: 'GET',
        type: 'GET',
        data: "country="+val+"&sId="+sId,
        success: function(data){
          console.log(data);
          $("#"+htmlid).html(data.data);
          $(".global-popup-loader").hide();
        },
        error: function(e) {
            console.log(e);
            $(".global-popup-loader").hide();
        }

      });
}

function showBtnLoader(htmlID) {
	$("#"+htmlID+" .btn-name").addClass("d-none");
	$("#"+htmlID+" .spinner-border").removeClass("d-none");
}

function convertToProgress(buttonId, formId) {
  $("#"+buttonId).addClass("disabled").addClass("btn-progress");
}

function hideModal(htmlid)
{
  $("#"+htmlid).modal("hide");
  console.log($("#"+htmlid).text());
}

function removeErrorClass() {
  $(".form-control").removeClass('has-error');
  $(".help-error").remove();
}
function submitCurrentFrom(formId, buttonId) {
  event.preventDefault();

  var formData = new FormData($('#'+formId)[0]);
  $("#"+buttonId).addClass("disabled").addClass("btn-progress");
  var requestFormat = $("#_request_format").val();
  var modalId = $("#_request_modal").val();
  var requestForm = $("#_request_form").val();
  removeErrorClass();
  $.ajax({
        url: $("#"+formId).attr('action'),
        method: $("#"+formId).attr('method'),
        data: formData,
        processData: false,
        contentType: false,
        success: function(data){
          if(showConsoleLog) {
            console.log(data);
          }
          $("#"+buttonId).removeClass("disabled").removeClass("btn-progress");
          if(requestFormat == 'index') {
            $("#dynamic_table_results").html(data.indexview);
          }
          $("#"+modalId).modal('hide');
          window.location.reload();

        },
        error: function(e) {
            if(showConsoleLog) {
              console.log(e);
            }
            var errors = e.responseJSON.errors;
            $.each(errors, function(key, error) {

                var errorMessage = "";
                $.each(error, function(key, errorname) {
                  console.log(errorname);
                  errorMessage += "<span class='help-error'>"+errorname+"</span>";
                }); 
                $("#"+formId+" #"+key).addClass("has-error").after(errorMessage);
            });

            $("#"+buttonId).removeClass("disabled").removeClass("btn-progress");
        }

  });
}

 function uploadPayoutForm(loop) {
    $("#FileUpload_"+loop).click();
   }

function submitPayoutForm(loop) {
  $(".global-popup-loader").show();
  //console.log(new FormData($('#FormFileUpload_'+loop)[0]))
  var fd = new FormData($('#FormFileUpload_'+loop)[0]);
  $.ajax({
        url: $('#FormFileUpload_'+loop).attr("data-action"),
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (res) {
            console.log(res);
            $(".global-popup-loader").hide();
            if(res.status == 200) {
              window.location.reload();
            }
            // do something with the result
        }, error: function (error) {
          console.log(error);
          $(".global-popup-loader").hide();
        }
    });
}