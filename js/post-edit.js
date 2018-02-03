var names;

$.ajax({
    url: "check-uniqueness.php",
    success: function(response){
        var data = JSON.parse(response);
        names = data;
    }
});

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
    if (city == "optional") 
        return;
    $.ajax({
        url: "process-edit.php",
        data: {
            'user_id': user_id,
            'name': name,
            'city': city,
            'street': street
        },
        success: function(){
            location.href = "/";
        }
    });
});





// VALIDATION

$.validator.addMethod("notNumber", function(value, element, param) {
           var reg = /[0-9]/;

           if(reg.test(value)){
                return false;
           }else{
                return true;
           }

        }, "Number is not permitted");

$.validator.addMethod("unique", checkingUniqueness, "The name is not unique.");

function checkingUniqueness(value, element) {
    var result;
    names.forEach( function(element) {
        if (element[0] == value)
            result = false;
        else
            result = true;
    });
    return this.optional(element) || result;
}


$("#form-edit").validate({
    rules: {
        form_name: {
            required: true,
            notNumber: true,
            unique: true
        },

        form_city: {
            required: true
        },

        form_address: {
            required: true
        }
    }
});
