$(".delete").click(function(){
    $("#modal").css({
        "top": "0px",
        "opacity": "1"
    });
    setTimeout(disappearing, 1000);
    var val = $(this).val();
    $.ajax({
        url: "delete-post.php",
        data: {
            id: val
        },
        success: function(){
            
        }
    });
});

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