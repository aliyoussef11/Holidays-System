<h4> {{$details['title']}} </h4>
<p> {{$details['body']}} </p>

<?php
// $name = Crypt::encrypt($details['name']); 
//             $role = Crypt::encrypt($details['role']); 
//             $title = Crypt::encrypt($details['title']); 
//             $date = Crypt::encrypt($details['date']); ?>

<!-- <a href="<?php 
// echo "http://127.0.0.1:8000/edit-academic-holiday/".$name."/".$role."/".$title."/".$date; ?> " 
      onclick="confirm ('Are you sure you want edit this Holiday?')" class="btn btn-success">Edit</a> -->

<a href="http://127.0.0.1:8000/delete-academic-holiday/{{$details['name']}}/{{$details['role']}}/{{$details['title']}}/{{$details['date']}}" 
onclick="confirm ('Are you sure you want delete this Holiday?')" class="btn btn-danger">Delete</a>



<h4>Regards!</h4>