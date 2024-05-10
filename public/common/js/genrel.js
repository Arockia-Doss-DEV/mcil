$('.datepicker-mci').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true,
    keyboardNavigation : true ,
});

function loaddata2(data, formID){
 	$.each(data.data, function( key, val ) {
		var $el = $('form#'+formID+' [name="'+key+'"]'),
		type = $el.attr('type');

		switch(type){
			case 'checkbox':
				if(val == 1){
					$el.attr('checked', 'checked');
				}
				break;
			case 'radio':
				$el.filter('[value="'+val+'"]').attr('checked', 'checked');
				break;
			case 'select':
				$el.filter('[value="'+val+'"]').attr('selected', 'selected');
				break;
			default:
				$el.val(val);
		}
	});
}

function loaddata(data){
	$.each(data.data, function( key, val ) {
		var $el = $('form#form-edit-releaving [name="'+key+'"]'),
		type = $el.attr('type');

		console.log($el);

		switch(type){
			case 'checkbox':
				if(val == 1){
					$el.attr('checked', 'checked');
				}
				break;
			case 'radio':
				$el.filter('[value="'+val+'"]').attr('checked', 'checked');
				break;
			default:
				$el.val(val);
		}
	});
}

$('.get-ci-data').click(function(e){
    $('#form-editCI')[0].reset();
    $('#editCIModel').modal('show');
});

$(document).on("click",".get-ci-data",function() {
    $('#form-editCI')[0].reset();
    $('#editCIModel').modal('show');
});

// function preloader_init(){
//     $('#overlay').fadeIn();
// }
// function preloader_off(){
//     $('#overlay').fadeOut();
// }


// function mcilfundsetdefault(){

// 	var fund_value = $("#mcil_fund_gobal").val();
// 	axios.get(SITE_URL+'mcilfunds/setDefaultFund?id='+fund_value).then(function (response) {

// 		setTimeout(location.reload.bind(location), 1500);
        
//     })
//     .catch(function (error) {
//     	setTimeout(location.reload.bind(location), 1500);
//     }); 	
// }

// function mcilfundsetdefault2(){

// 	var fund_value = $("#mcil_fund_gobal2").val();
// 	axios.get(SITE_URL+'mcilfunds/setDefaultFund?id='+fund_value).then(function (response) {

// 		setTimeout(location.reload.bind(location), 1500);
        
//     })
//     .catch(function (error) {
//     	setTimeout(location.reload.bind(location), 1500);
//     }); 	
// }


function load_state(id, country_id, default_state){

    var html_code = '';
    $.ajax({
        url: SITE_URL+'selectBoxStateList?country_id='+country_id,
        type:"GET",
        success: function(data) {
        	var state = data.data;
        	$('#'+id).empty();
            for (var key in state) {
                if (state.hasOwnProperty(key)) {
                    html_code += '<option value="'+key+'" >'+state[key]+'</option>';
                }
            }
            $('#'+id).html(html_code);
            $('#'+id).val(default_state);
        }
    });
}



// function load_state_json_data(id, country_id, default_state){
//     var html_code = '';
//     $.getJSON(SITE_URL+'js/state.json', function(data){

//         $.each(data, function(key, value){
            
//             if(value.country_id == country_id){
//                 html_code += '<option value="'+value.id+'">'+value.name+'</option>';
//             }
//         });
//         $('#'+id).html(html_code);
//         $('#'+id).val(default_state);
//     });
// }
