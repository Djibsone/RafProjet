function confirmation(){
    
    return confirm('Voulez-vous vraiment supprimer ?')
}

//edit user
$(document).on("click", ".edit", function(e) {
    e.preventDefault();
 //alert('ok');
    $('#editEmployeeModal').modal('show');
    var user_id = $(this).attr('data-id');  
    $('#id_u').val(user_id);

    $.ajax({
        url: "../controllers/getUserController.php",
        type: "post",
        data: {id:user_id},
        dataType: 'json',
        success: function(data){
            $('#nom').val(data.nom);
            $('#prenom').val(data.prenom);
            $('#email').val(data.email);
            $('#password').val(data.password);

            // var dataResult = JSON.parse(data);
            // $('#nom').val(dataResult.nom);
            // $('#prenom').val(dataResult.prenom);
            // $('#email').val(dataResult.email);
            // $('#password').val(dataResult.password);
        }
    });
});

//update user
$(document).on('click','#update',function(e) {
    e.preventDefault();
    // var data = $("#update_form").serialize();
    var id_u = $('#id_u').val();
    var nom = $('#nom').val();
    var prenom = $('#prenom').val();
    var email = $('#email').val();
    var password = $('#password').val();

    if (nom === "" || prenom === "" || email === "" || password === "" ) {
        // $('#err').css("display", "block");
        // setTimeout(() => {
        //     $('#err').css("display", "none");
        // }, 3000);
        // return
        alert('Champs sont vides');
        return
        	
    } else {

        $.ajax({
            url: "../controllers/userController.php",
            type: "post",
            //data: data,
            data: {
                id:id_u,
                nom:nom,
                prenom:prenom,
                email:email,
                password:password,
            },
            dataType: 'json',
            success: function(data){
                if(data.statusCode==200){
                    //$('#editEmployeeModal').modal('hide');
                    alert('Data updated successfully !');
                    location.replace('../');						
                }
                else if(data.statusCode==201){
                       alert(data);
                }
            }
        });
    }
});

//   Delete user ajax

$(document).on("click", ".delete", function(e) { 
    e.preventDefault();

    //$('#deleteEmployeeModal').modal('show');
    var user_id = $(this).attr("data-id");
    	$('#id_d').val(user_id);
        
});

$(document).on("click", "#delete", function(e) {
    e.preventDefault();

    var user_id_del = $('#id_d').val();
    $.ajax({
        url:"../controllers/userDelete.php",
        type: 'post',
        data:{
            id:user_id_del
        },
        dataType: 'json',
        // success: function(){
        //     alert('Data deleted successfully !');
        //     location.reload();
        // }
        success:function(data){
            if (data.statusCode==200) {
                alert('Data deleted successfully !'); 
                location.reload();	
            } else {
                alert('Error of Data deleted !');
            }
            
        }
    });
});