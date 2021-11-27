<?php  
include 'conn.php';

header("content-type:application/json");

if(isset($_POST['action'])){
    $action=$_POST['action'];
}

function ReadAll($conn){
    $data=array();
    $message=array();

    $query="select * from students";
    $res=$conn->query($query);

    if($res){

        while($row=$res->fetch_assoc()){
              
            $data []=$row;

        }
        $message=array("status" =>true,"data" =>$data);
    }else{
        $message=array("status" =>false,"data" =>$conn->error);
    }

    echo json_encode($message);
}
function ReadStudentInfo($conn){
    $data=array();
    $message=array();
    $studentid=$_POST['id'];

    $query="select * from students where id='$studentid'";
    $res=$conn->query($query);

    if($res){

        while($row=$res->fetch_assoc()){
              
            $data []=$row;

        }
        $message=array("status" =>true,"data" =>$data);
    }else{
        $message=array("status" =>false,"data" =>$conn->error);
    }

    echo json_encode($message);
}
function DeleteInfo($conn){
    $data=array();
    $message=array();
    $studentid=$_POST['id'];

    $query="Delete  from students where id='$studentid'";
    $res=$conn->query($query);

    if($res){

       
        $message=array("status" =>true,"data" =>"Successfully deleted");
    }else{
        $message=array("status" =>false,"data" =>$conn->error);
    }

    echo json_encode($message);
}

function  RegisterSttudent($conn){

    $studentid=$_POST['id'];
    $studentname=$_POST['name'];
    $studentclass=$_POST['class'];
    $data=array();


    $query="insert into students (id,name,class) values('$studentid','$studentname','$studentclass')";
    $res=$conn->query($query);
    if($res){

        $data=array("status" => true , "data" =>"Successfully Registred");


    }else{
        $data=array("status" => false ,"data" =>$conn->error);

    }



    echo json_encode($data);


   
}
function  UpdateSttudent($conn){

    $studentid=$_POST['id'];
    $studentname=$_POST['name'];
    $studentclass=$_POST['class'];
    $data=array();


    $query="update  students set name='$studentname',class='$studentclass' where id='$studentid'";
    $res=$conn->query($query);
    if($res){

        $data=array("status" => true , "data" =>"Successfully Updated");


    }else{
        $data=array("status" => false ,"data" =>$conn->error);

    }



    echo json_encode($data);


   
}

if(isset($_POST['action'])){
    $action($conn);
}else{
    echo "action required";
}

?>