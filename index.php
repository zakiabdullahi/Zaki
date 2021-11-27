<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AJax</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <h1 class="fs-10 text-center">Users Info</h1>
        <div class="col-sm-8">
          <button class="btn btn-success" id="addNew">Add New Student</button>
          <table class="table" id="StudentTable">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Class</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>


            </tbody>
          </table>
        </div>

        <div class="modal" tabindex="-1" id="StudentModal">
   <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">User Info </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <form   id="StudentForm">
           
           <div class="form-group m-2">
             <input type="text" name="id" id="id" class="form-control" placeholder="enter your id">
           </div>
           <div class="form-group m-2">
             <input type="text" name="name" id="name" class="form-control" placeholder="enter your Name">
           </div>

           <div class="form-group m-2">
              <input type="text" name="class" id="class" class="form-control" placeholder="enter your Class">
           </div>

           <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
         </form>
      </div>
     
    </div>
  </div>
</div>

      </div>
    </div>












    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>
