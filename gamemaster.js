setInterval(function(){
    $.ajax({
        url: "get_answer.php",
        method: "POST",
        data: "id="+$.cookie('question'),
        success: function(data){
            if(data!=""){
                $("#question").show();
                $("#answer").text("A : "+data);
            }
        }
    });
},1000);