loadData();
let actionbtn="Insert";
$("#addNew").click(function(){
    $("#StudentModal").modal("show");
})

$("#StudentForm").submit(function(event){

    event.preventDefault();


    let form_Data=new FormData($("#StudentForm")[0]);

   if(actionbtn == "Insert"){
    form_Data.append("action","RegisterSttudent");

   }else{

    form_Data.append("action","UpdateSttudent");

   }
    

    $.ajax({

        method:"POST",
        dataType:"JSON",
        url:"api.php",
        data:form_Data,
        contentType:false,
        processData:false,

        success:function(data){
            
            let status=data.status;
            let response=data.data;

            alert(response);
            actionbtn ="Insert";
            loadData();
            $("#StudentModal").modal("hide");
            

            $("#StudentForm")[0].reset();


           

        },
        error:function(data){

            console.log(data);

        }
    })
})

function loadData(){
    
   $("#StudentTable tbody").html("");
    let SendingData={
        "action": "ReadAll"
    }

    $.ajax({

        method:"POST",
        dataType:"JSON",
        url:"api.php",
        data:SendingData,

        success:function(data){

            let status=data.status;
            let response=data.data;
            let html='';
            let tr='';


            if(status){

                response.forEach(item =>{
                    tr +="<tr>";
                    for(let i in item){
                       

                        tr +=`<td> ${item[i]} </td>`;
                        
                    }
                    tr +=`<td><a class="btn btn-info  update_info" update_id=${item['id']}><i class="fas fa-edit"></i></a>&nbsp;&nbsp;<a class="btn btn-danger delete_info" delete_id=${item['id']}><i class="fas fa-trash"></i></a></td>`
                    tr +="</tr>";
                })
                $("#StudentTable tbody").append(tr);
                
            }

        },
        error:function(data){
            

        }
    })
}
function FetchData(id){

    let SendingData={
        "action": "ReadStudentInfo",
        "id": id
    }

    $.ajax({

        method:"POST",
        dataType:"JSON",
        url:"api.php",
        data:SendingData,

        success:function(data){

            let status=data.status;
            let response=data.data;
            let html='';
            let tr='';


            if(status){

                 $("#id").val(response[0].id);
                 $("#name").val(response[0].name);
                 $("#class").val(response[0].class);
                $("#StudentModal").modal("show");
                
                actionbtn ="Update";


                
                
            }

        },
        error:function(data){
            

        }
    })
}
function DeleteData(id){

    let SendingData={
        "action": "DeleteInfo",
        "id": id
    }

    $.ajax({

        method:"POST",
        dataType:"JSON",
        url:"api.php",
        data:SendingData,

        success:function(data){

            let status=data.status;
            let response=data.data;
            let html='';
            let tr='';


            if(status){

                alert(response);
                loadData();

                

                
                
            }

        },
        error:function(data){
            

        }
    })
}

$("#StudentTable").on("click","a.update_info",function(){
    let id=$(this).attr("update_id");
    FetchData(id);
})

$("#StudentTable").on("click","a.delete_info",function(){
    let id=$(this).attr("delete_id");
    if(confirm("are you sure To delete?"));
    DeleteData(id);
})

