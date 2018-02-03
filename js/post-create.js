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

$("#post").click(function(){
    var name = $("#name").val();
    var city = $("#sel1").val();
    var street = $("#sel2").val();

    // if (!name || !city || !street) return false;
    
    $.ajax({
        url: "post-data.php",
        data: {
            'name': name,
            'city': city,
            'street': street
        },
        success: function(resp){
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


$("#form_create").validate({
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