
$(document).ready(function(){
	$("#0").prop("checked", true);
	$('#hiddenInput').val($("#0").parent().text());


});


$(".clickable").click(function(){
    if($(this).find("input:first").prop("checked")){
        $(this).find("input:first").prop("checked", false);
    } else {
        $(this).find("input:first").prop("checked", true);
    }

    $('#hiddenInput').val($(this).find("label:first").text());
});

$(".check").click(function(event){
 event.stopPropagation();
});

function checkRadio(){
	if($('input:radio:checked').length > 0){
		return true;
	}
	return false;
}

function confirmAtualizar(){
    if($('input:radio:checked').length > 0){
        return confirm('Você tem certeza que deseja gravar as alterações?');;
    }
    return false;
}

function checkCheckbox(){
    if($('input:checked').length > 0){
        return true;
    }
    return false;

}

function checkDeletar(){
    if($('input:checked').length > 0){
        return confirm('Você tem certeza que deseja apagar as questões?');
    }
    return false;

}

// Função retirada de https://www.sanwebe.com/2013/03/addremove-input-fields-dynamically-with-jquery
$(document).ready(function() {
    var max_fields      = 1000; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append("<div class='row-fluid header'><div class='input-group'><span class='input-group-addon'><input type='radio' name='altCorreta' value='"+x+"'></span><input class='form-control' type='text' placeholder='Alternativa "+x+"' name='resposta"+x+"'><span class='input-group-btn'><button class='remove_field btn btn-danger' role='button'><span class='glyphicon glyphicon-remove-sign remove_field' aria-hidden='true'></span></button></span></div></div>"); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        
        e.preventDefault(); 
        $(this).parents('.row-fluid').remove();
    })
});

