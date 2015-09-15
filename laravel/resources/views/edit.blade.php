<style> 
.text
{
  width: 200px;
  height: 30px;
}
</style>
<html>
  
   <head>

   	 <title>

    Edit Teacher
   	 </title>
   	 </head>
   	 <body>
      <?php
       $row = DB::table('teachers')->where('id',$id)->first();
       ?>


      <a href="<?= URL::to('/teachers') ?>">Back </a> 
      <form action="<?= URL::to('/update') ?>" method="post">

       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <table style="width: 50%;margin: auto;overflow: auto;text-align: left">
          <center><p style="color:red">{{ $errors->first('teacher_name')}}</p>
          <p style="color:red">{{ $errors->first('phone_no')}}</p>
          </center>
          <tr><input type="hidden" value="<?= $row->id ?>" name="id"></tr>
          <tr>
            
            <td>Teacher Name:</td>
            <td><input value="<?= $row->teacher_name?>" type="text" name="teacher_name" class="text" /></td>

          </tr>
           <tr>
            
            <td>Gender:</td>
            <td>
             
             <select name="gender" class="text">
              <option value="0" <?= ($row->gender==0) ?'selected="selected" ':'' ?>>Male</option>
              <option value="1"  <?= ($row->gender==1) ?'selected="selected" ':'' ?>>Female</option>
             </select>
            </td>

          </tr>
           <tr>
            
            <td>Phone Number</td>
            <td><input type="text" value="<?= $row->phone_no?>" name="phone_no" class="text" /></td>

          </tr>

          <tr>
            
            <td></td>
            <td><input type="submit" name="save" value="Update_Record" class="text" /></td>

          </tr>
               

           	</table>

           </form>
           	</body>
 </html>	
           
          
