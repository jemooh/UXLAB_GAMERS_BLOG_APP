<h1>Admin Login</h1>

{!! Form::open(array('route'=>'sessions.store')) !!}
<ul>
  
  <li>
		{!!Form::label('teacher_name','Teacher_name:')!!}
		{!!Form::text('teacher_name')!!}
   </li>


     <li>
		{!!Form::label('password','password:')!!}
		{!!Form::text('password')!!}
   </li>
      <li>
      	{!!Form::submit()!!}

      </li>
</ul>
{!! Form::close() !!}