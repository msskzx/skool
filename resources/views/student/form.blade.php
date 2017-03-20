<div class = "form-horizontal">

  <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('first_name','First Name') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'first name', 'required']) !!}
     @if ($errors->has('first_name'))
         <span class="help-block">
             <strong>{{ $errors->first('first_name') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('middle_name') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('middle_name','Middle Name') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'middle name', 'required']) !!}
     @if ($errors->has('middle_name'))
         <span class="help-block">
             <strong>{{ $errors->first('middle_name') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('last_name','Last Name') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'last name', 'required']) !!}
     @if ($errors->has('last_name'))
         <span class="help-block">
             <strong>{{ $errors->first('last_name') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('gender','Gender') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::select('gender',['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control', 'placeholder' => 'gender', 'required']) !!}
     @if ($errors->has('gender'))
         <span class="help-block">
             <strong>{{ $errors->first('gender') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('SSN') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('SSN','SSN') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('SSN', null, ['class' => 'form-control', 'placeholder' => 'social security number', 'required']) !!}
     @if ($errors->has('SSN'))
         <span class="help-block">
             <strong>{{ $errors->first('SSN') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('grade') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('grade','Grade') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::selectRange('grade', 1, 12, null, ['class' => 'form-control', 'placeholder' => 'grade']) !!}
     @if ($errors->has('grade'))
         <span class="help-block">
             <strong>{{ $errors->first('grade') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('birth_date','Birth Date') !!}
    </div>
  <div class = "col-md-10">
     {!! Form::date('birth_date', null, ['class' => 'form-control', 'placeholder' => 'birth_date']) !!}
     @if ($errors->has('birth_date'))
         <span class="help-block">
             <strong>{{ $errors->first('birth_date') }}</strong>
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
