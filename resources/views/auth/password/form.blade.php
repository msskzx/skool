<div class = "form-horizontal">

  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('password','Password') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'password', 'required']) !!}
     @if ($errors->has('password'))
         <span class="help-block">
             <strong>{{ $errors->first('password') }}</strong>
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
