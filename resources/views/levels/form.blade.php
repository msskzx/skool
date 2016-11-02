<div class = "form-horizontal">

  <div class="form-group{{ $errors->has('school_id') ? ' has-error' : '' }}">
    <div class = "control-label col-md-1">
      {!! Form::label('school_id','School ID:') !!}
    </div>
   <div class = "col-md-11">
     {!! Form::number('school_id', null, ['class' => 'form-control', 'placeholder' => 'Enter school ID', 'required']) !!}

     @if ($errors->has('school_id'))
         <span class="help-block">
             <strong>{{ $errors->first('school_id') }}</strong>
         </span>
     @endif

    </div>
  </div>

  <div class="form-group">
      <div class="col-sm-offset-1 col-sm-2">
        {!! Form::submit($submitButtonText,['class' => 'btn-success form-control']) !!}
    </div>
  </div>

</div>
