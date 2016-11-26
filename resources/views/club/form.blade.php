<div class = "form-horizontal">

  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('name','Name:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter name', 'required']) !!}
     @if ($errors->has('name'))
         <span class="help-block">
             <strong>{{ $errors->first('name') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('purpose','Purpose:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('purpose', null, ['class' => 'form-control', 'placeholder' => 'Enter purpose', 'required']) !!}
     @if ($errors->has('purpose'))
         <span class="help-block">
             <strong>{{ $errors->first('purpose') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('high_level_id') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('high_level_id','High Level ID') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('high_level_id', null, ['class' => 'form-control', 'placeholder' => 'Enter high level ID', 'required']) !!}
     @if ($errors->has('high_level_id'))
         <span class="help-block">
             <strong>{{ $errors->first('high_level_id') }}</strong>
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
