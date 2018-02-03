displayUsers();


function displayUsers(){
    $.ajax({
        url: "display-users.php",
        success: function(response){
            var data = JSON.parse(response);
            var node = "";
            data.forEach(function(el){
                var str = "<tr class=\"tr\"><td>" 
                + el[1] + 
                "</td><td>" 
                + el[2] + 
                "</td><td>" 
                + el[3] + 
                "</td><td><a class=\"btn btn-warning edit\" href=\"/edit-post.php?id="
                 + el[0] + 
                 "\">Edit</a><button class=\"btn btn-danger delete\" value=\"" + el[0] + "\" onclick=\"deletePost.call(this)\">Delete</button></td></tr>";
                node += str;
            });
            $(".tbody").append(node);
        }
    });
}

function deletePost(){
    console.log(this);
    var parent = $(this).parent().parent();
    var val = $(this).val();
    
    $("#modal").css({
        "top": "0px",
        "opacity": "1"
    });
    setTimeout(disappearing, 1000);
    $.ajax({
        url: "delete-post.php",
        data: {
            id: val
        },
        success: function(res){
            $(parent).hide();
        }
    });
}

function disappearing(){
    $("#modal").css("opacity", "0");
}

$(".edit").click(function(){
    // $("#modal").css({
    //     "top": "0px",
    //     "opacity": "1"
    // });
    // setTimeout(disappearing, 1000);
    var val = $(this).val();
    $.ajax({
        url: "edit-post.php",
        data: {
            id: val
        },
        success: function(){
            
        }
    });
});