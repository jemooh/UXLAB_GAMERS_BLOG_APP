<html>

   <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   	 <title>

     Display Teacher
   	 </title>
   	 </head>
   	 <body>
        <table class="table table-striped">
          <thead>
           <th>Teacher ID </th>
           <th>Teacher Name </th>
           <th>Gender </th>
           <th>Phone Number </th>
           <th>Action </th>
           <th><a href="<?= URL::to('/form') ?>">Add Teacher </a> </th>

          </thead>
          <tbody>

           <?php

           $Teacher = DB::table('teachers')->get();
           foreach ($Teacher as $row) {
            $gender = $row->gender;
            if ($gender==0){

                 $gender = "Male";
            }else
            {
                 $gender = "Female";
            }

           	?>
           	<tr>
           		<td><?php echo $row->id ?> </td>
           		<td><?php echo $row->teacher_name ?> </td>
           		<td><?php echo $gender ?> </td>
           		<td><?php echo $row->phone_no ?> </td>
           		<td>

                 <a class="btn btn-default btn-sm" href="<?= URL::to('EditTeacher',array($row->id)) ?>">
                    <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</a>
                 <a  class="btn btn-danger btn-sm" href="<?= URL::to('DeleteTeacher',array($row->id)) ?>">
                   <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                   Delete</a>

           		</td>
           	</tr>
           	<?php } ?>
           	</tbody>
           	</table>
           	</body>
 </html>
