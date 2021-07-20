@extends('design.bootstrap-head')

<div class="container">

  <!-- Modal -->
  <div class="modal show" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="text-align:center">Edit Holiday</h4>
        </div>
        <div class="modal-body">
          
        <form action=<?php echo "edit/academic-holiday/".$date; ?> method="POST">
        {{ csrf_field() }}
        <label for="">Name</label>
        <input class="date form-control" type="text" name="role" value=<?php echo $role ?> readonly>
        <br>
           
        <label for="">Title</label>
        <input class="date form-control" type="text" name="title" value="<?php echo $title; ?>">

        <br>
        <label for="">Enter The Reasons Of Your Holiday</label>
        <input type="text" class="form-control" name="details" placeholder="Enter the Reason" required/><br /><br />

        <label for="">Previous Date: <?php echo $date ?></label>
        <input type="date" class="form-control" name="date"  value=<?php echo $date; ?>/><br />
                    
        <button type="submit" name="edit" class="btn btn-success" style="margin-left:260px; margin-top:30px;">Edit</button>
        </form>
        </div>
        </div>
      </div>
    </div>      
  </div>
</div>
