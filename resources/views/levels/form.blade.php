<div class = "form-horizontal">

  <div class="form-group">
    <div class = "control-label col-md-1">
      {!! Form::label('school_id','School ID:') !!}
    </div>
   <div class = "col-md-11">
     {!! Form::number('school_id', null, ['class' => 'form-control', 'placeholder' => 'Enter school ID', 'required']) !!}
    </div>
  </div>

  @if ($errors->has('school_id'))
    <div class="row">
      <span class="col-md-11 col-md-offset-1">
        <h6 class="alert alert-danger">{{ $errors->first('school_id') }}</h6>
      </span>
    </div>
  @endif

  <div class="form-group">
      <div class="col-sm-offset-1 col-sm-2">
        {!! Form::submit($submitButtonText,['class' => 'btn-success form-control']) !!}
    </div>
  </div>

</div>
