
$(document).ready(function () {

    $("#signin").click(function (e) {
        console.log("signin Button Clicked");
        e.preventDefault();

        let email = $('#email').val();
        let password = $('#password').val();
        console.log(email);
        console.log(password);
        mydata = {email:email,password:password};
        console.log(mydata);
        $.ajax({
            url: "operations/logincheck.php",
            method: "POST",
            data: JSON.stringify(mydata), // Convert Object to String
            success: function (data) {
                console.log(data);
                if (data == 1) {
                    location.href ='index.php?page=home';
                } else if (data == 2) {
                    $('#login-form').prepend('<div class="alert alert-danger">Username or password is incorrect.</div>')
                    end_load();
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error: ", status, error);
                console.error("Response: ", xhr.responseText);
            }
        });
    });

    // function showdata(){
    //     $.ajax({
    //         url: "retrive.php",
    //         method: "GET",
    //         dataType: "json",
    //         success: function(data){
    //             // console.log(data);    // data[1].name

    //             let output = '';
    //             for(let i=0; i<data.length; i++){
    //                 output += `
    //                 <tr>
    //                     <td>${data[i].id}</td>
    //                     <td>${data[i].name}</td>
    //                     <td>${data[i].email}</td>
    //                     <td>${data[i].password}</td>
    //                     <td>
    //                         <button class="btn btn-sm btn-warning btn-edit" data-sid='${data[i].id}'>Edit</button>
    //                         <button class="btn btn-sm btn-danger btn-del" data-sid='${data[i].id}'>Delete</button>
    //                     </td>
    //                 </tr>
    //                 `;
    //             }
    //             $('#tbody').html(output);
    //         }
    //     })
    // }
    
  

    

    

    // $("#tbody").on("click",".btn-del",function(){
    //     console.log("Delete Button Clicked");
    //     let id= $(this).attr("data-sid");
    //     // console.log(id);
    //     mydata = {sid:id};
    //     mythis = this;
    //     $.ajax({
    //         url:"delete.php",
    //         method:"POST",
    //         data : JSON.stringify(mydata),
    //         success:function(data){
    //             console.log(data);
    //             msg = "<div class='alert alert-dark mt-3'>" + data + "</div>";
    //             $("#msg").html(msg);
    //             // showdata();
    //             $(mythis).closest('tr').remove();
    //         }
    //     })
    // })

    // $("#tbody").on("click",".btn-edit",function(){
    //     console.log("Edit Button Clicked");
    //     let id= $(this).attr("data-sid");
    //     // console.log(id);
    //     mydata = {sid:id};
    //     $.ajax({
    //         url:"edit.php",
    //         method:"POST",
    //         dataType:"json",
    //         data : JSON.stringify(mydata),
    //         success:function(data){
    //             console.log(data);
    //             $("#stuid").val(data.id);
    //             $("#nameid").val(data.name);
    //             $("#emailid").val(data.email);
    //             $("#passwordid").val(data.password);
    //         }
    //     })
    // })

});
