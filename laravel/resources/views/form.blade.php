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

    Add Teacher
   	 </title>
   	 </head>
   	 <body>
      <a href="<?= URL::to('/teachers') ?>">Back </a> 
      <form action="<?= URL::to('save') ?>" method="post">

      <input type="hidden" name="_method" value="PUT">
       <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <table style="width: 50%;margin: auto;overflow: auto;text-align: left">
          <center><p style="color:red">{{ $errors->first('teacher_name')}}</p>
          <p style="color:red">{{ $errors->first('phone_no')}}</p>
          </center>
          <tr>
            
            <td>Teacher Name:</td>
            <td><input type="text" name="teacher_name" class="text" /></td>

          </tr>
           <tr>
            
            <td>Gender:</td>
            <td>
             
             <select name="gender" class="text">
              <option value="0">Male</option>
              <option value="1">Female</option>
             </select>
            </td>

          </tr>
           <tr>
            
            <td>Phone Number</td>
            <td><input type="text" name="phone_no" class="text" /></td>

          </tr>

          <tr>
            
            <td>Password</td>
            <td><input type="password" name="password" class="text" /></td>

          </tr>

          <tr>
            
            <td></td>
            <td><input type="submit" name="save" value="Save_Record" class="text" /></td>

          </tr>
               

           	</table>

           </form>
           	</body>
 </html>	
           
          
