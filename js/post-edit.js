$(document).ready(function () {
    $("#sel1").change(function () {
        var val = $(this).val();
        if (val == "optional") return;
        $.ajax({
            url: 'response-streets.php',
            data: {id: val},
            success: function(response){
                var res = JSON.parse(response);
                var node = "";
                res.forEach(function(item){
                    node += '<option value="' + item[0] + '">' + item[1] + '</option>';
                });
                $("#sel2").html(node);
            }
        });
    });
});

$("#edit").click(function(){
    var user_id = $("#user_id").val();
    var name = $("#name").val();
    var city = $("#sel1").val();
    var street = $("#sel2").val();
    
    $.ajax({
        url: "process-edit.php",
        data: {
            'user_id': user_id,
            'name': name,
            'city': city,
            'street': street
        },
        success: function(resp){
            console.log(resp);
        },
        complete: function(){
            $(".success").show();
        }
    });
});



// VALIDATION

jQuery.validator.addMethod("notNumber", function(value, element, param) {
           var reg = /[0-9]/;

           if(reg.test(value)){
                return false;
           }else{
                return true;
           }

        }, "Number is not permitted");

jQuery.validator.addMethod("unique", checkingUniqueness, "The name is not unique.");

function checkingUniqueness(value, element) {

   $.ajax({
        url: 'check-uniqueness.php',
        data: {
            name: value
        },
        async: false,
        success: function(resp){
            return Boolean(resp);
        },
        complete: function(){
            
        }
    });
}


$("#form_edit").validate({
    rules: {
        form_name: {
            required: true,
            notNumber: true,
        },

        form_city: {
            required: true
        },

        form_address: {
            required: true
        }
    }
});
