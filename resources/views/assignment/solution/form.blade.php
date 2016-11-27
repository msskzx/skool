<div class = "form-horizontal">

  <div class="form-group{{ $errors->has('solution') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('solution','Solution') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::textarea('solution', null, ['class' => 'form-control', 'placeholder' => 'solution', 'required']) !!}
     @if ($errors->has('solution'))
         <span class="help-block">
             <strong>{{ $errors->first('solution') }}</strong>
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
