<div class = "form-horizontal">

  <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('old_password','Old password') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::password('old_password', ['class' => 'form-control', 'placeholder' => 'old password', 'required']) !!}
     @if ($errors->has('old_password'))
         <span class="help-block">
             <strong>{{ $errors->first('old_password') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('new_password','New password') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::password('new_password', ['class' => 'form-control', 'placeholder' => 'new password', 'required']) !!}
     @if ($errors->has('new_password'))
         <span class="help-block">
             <strong>{{ $errors->first('new_password') }}</strong>
         </span>
     @endif
    </div>
  </div>


  <div class="form-group{{ $errors->has('new_password_confirmation') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('new_password_confirmation','Confirm new password') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::password('new_password_confirmation', ['class' => 'form-control', 'placeholder' => 'new password', 'required']) !!}
     @if ($errors->has('new_password_confirmation'))
         <span class="help-block">
             <strong>{{ $errors->first('new_password_confirmation') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-1">
        {!! Form::submit($submitButtonText,['class' => 'btn-success form-control']) !!}
    </div>
  </div>

</div>
