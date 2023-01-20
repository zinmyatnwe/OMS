/*var deletebtn=document.querySelector('.delete');
deletebtn.addEventListener('click',function(){
let message=confirm("Are you sure to delete");
if(message){
    let id=$(this).parent('td').attr('id');
    $.ajax({
        url:'delete_category.php',
        type:'post',
        data:{id:id},
        success:function(respinse){
            console.log(response);
        },
        error:function(){

        }

    })
}
})*/
var cat_tbody=document.querySelector('#cat_tbody');
cat_tbody.addEventListener('click',function(e){
    let deletebtn=e.target;
    if(e.target.innerText=='Delete'){
        let message=confirm("Are You Sure To Delete");
        let tr=deletebtn.parentNode.parentNode;
        if(message){
            let id=deletebtn.parentNode.getAttribute('id');
            $.ajax({
                url:'delete_category.php',
                type:'post',
                data:{id:id},
                success:function(response){
                   // console.log("success");
                    if(response=='fail'){
                        alert('You cannot delete data');
                    }
                    else{
                        tbody.removeChild(tr);
                    }
                   
                },
                error:function(){
        
                }
        
            })
        }
    
       
    }

    }

)





// var tbody=document.querySelector('#');
// tbody.addEventListener('click',function(e){
//     let deletebtn=e.target;
//     console.log(deletebtn);
//     if(e.target.innerText=='Delete'){
//         let message=confirm("Are You Sure To Delete");
//         let tr=deletebtn.parentNode.parentNode;
//         if(message){
//             let id=deletebtn.parentNode.getAttribute('id');
//             $.ajax({
//                 url:'delete_product.php',
//                 type:'post',
//                 data:{id:id},
//                 success:function(response){
//                    // console.log("success");
//                     if(response=='fail'){
//                         alert('You cannot delete data');
//                     }
//                     else{
//                         tbody.removeChild(tr);
//                     }
                   
//                 },
//                 error:function(){
                   

        
//                 }
        
//             })
//         }
    
       
//     }

//     }

// )





