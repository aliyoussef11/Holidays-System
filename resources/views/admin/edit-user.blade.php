@extends('design.bootstrap-head')

<div class="container">

  <!-- Modal -->
  <div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center">Edit User</h4>
        </div>
        <div class="modal-body">
          
        <form action="<?php echo "edit/".$email; ?>" method="POST">
        {{ csrf_field() }}
        <label for="">Name</label>
        <input class="date form-control" type="text" name="name" value=<?php echo $name ?>>
        <br>
           
        <label for="">Email</label>
        <input class="date form-control" type="text" name="email" value="<?php echo $email; ?>" readonly>

        <br>
        <div  style="text-align:center;">
        <select id='role' name ="role">
        <option value= 'academic'>Academic</option>
        <option value= 'non-academic'>Non-Academic</option>
        </select>
        </div>
                    
        <button type="submit" name="edit" class="btn btn-success" style="margin-left:260px; margin-top:30px;">Edit</button>
        </form>
        </div>
        </div>
      </div>
    </div>      
  </div>
</div>
