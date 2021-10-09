
let name=document.getElementById("name");
let email=document.getElementById("email");
let mobile=document.getElementById("mobile");
let password=document.getElementById("password");
let avatar=document.getElementById("avatar");

let form=document.querySelector("form");

function validation(){
if(name.value.trim()===""){
onError(name,"Name can not be empty");
}
else{
onSuccess(name);
}

if(email.value.trim()===""){
        onError(email,"Email cannot be empty");
    }else{
        if(!isValidEmail(email.value.trim())){
            onError(email,"Email is not valid");
        }else{
            onSuccess(email);
        }
    }

    if(mobile.value.trim()===""){
        onError(mobile,"Phone no can not be empty");
    }else{
        if(!phn(mobile.value.trim())){
            onError(mobile,"Phone no must be 11 digit or Invalid");
        }else{
            onSuccess(mobile);
        }
    }

 if(password.value.trim()===""){
onError(password,"password can not be empty");
}
else{
onSuccess(password);
}

if(avatar.value.trim()===""){
onError(avatar,"Avatar can not be empty");
}
else{
onSuccess(avatar);
}

}




function onSuccess(input){
    let parent=input.parentElement;
    let messageEle=parent.querySelector("p");
    messageEle.style.visibility="hidden"; 
    parent.classList.remove("errors");
    parent.classList.add("success"); 
}

function onError(input,msg){
    let parent=input.parentElement;
    let messageEle=parent.querySelector("p");
    messageEle.style.visibility="visible";
    messageEle.innerText=msg;  
    parent.classList.add("errors");
    parent.classList.remove("success");
}
 
function isValidEmail(email){
   return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}


function phn(mobile){
    return /^(?:\+88|88)?(01[3-9]\d{8})$/.test(mobile);
}

//Store brand ajax request
$(document).ready(function () {
    $(document).on('submit','#add-user-form',function (e) {
        e.preventDefault();
        validation();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: '/admin/adduser',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function (data) {              
                $('#name').val('');
                $('#email').val('');
                $('#mobile').val('');
                $('#password').val('');   
                $('#avatar').val('');       
                
                toastr.options = {
                    "timeOut": "3000",
                    "closeButton": true,

                };
                toastr['success']('User Successfully Added');
                appendTableRow(data);
            },
            error: function (error) {
                console.log(error);
            }
        })
    });
});

//delete
$(document).ready(function () {
    $(document).on('click', '.userDelete', function (e) {

        e.preventDefault();
        let id = $(this).attr('data-id');
        let tableRow=$(this).parent().parent();
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn-d',
              cancelButton: 'cancel'
            },
            buttonsStyling: false
          })
          
          swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: `/admin/user/delete/${id}`,
                    success: (data) => {
                        $(tableRow).remove();
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                          )
                      
                    },
                 
                })
                
            
            }
            else if (
                result.dismiss === Swal.DismissReason.cancel
              ) {
                swalWithBootstrapButtons.fire(
                  'Cancelled',
                  'Your file is safe :)',
                  'error'
                )
              }

          })
});

});

function appendTableRow(data) {
    $('tbody').append(`
        <tr data-id="${data.id}">
        <td class="name">
        <img src="\\uploads\\user_image\\${data.avatar}" alt="avatar"/>
        <span>${data.name}</span>
      </td>
           <td>${data.email}</td>
           <td class="manage">
           <i data-id="${data.id}" class="fas fa-trash userDelete" style="font-size: 20px; color:red;"></i>
           </td>
        </tr>
    `);
}