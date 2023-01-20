// var cus_tbody=document.getElementById('cus_tbody');

// cus_tbody.addEventListener('click',function(e){
    

//     }

// )

// $('#cus_tbody').on('click',function(e){
//     let deletebtn=e.target;
//     console.log(deletebtn)

//     if(deletebtn.innerText=='Delete'){
       
//     }
// })

$('#cus_tbody .delete').on('click',function(){
    var cus_id =  $(this).closest("td").attr("id");

   if(cus_id != undefined && cus_id != null){
    let message=confirm("Are You Sure To Delete");

    if(message){
        $.ajax({
            url:'delete_customer.php',
            type:'post',
            data:{c_id:cus_id},
            success:function(response){
                if(response =='fail'){
                    alert('You cannot delete data');
                }
               
            },
            error:function(){
               
            }
    
        })
        $(this).closest("tr").remove();
    }

   }
})