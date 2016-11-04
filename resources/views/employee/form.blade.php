<div class = "form-horizontal">

  <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('first_name','First Name') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Enter your first name', 'required']) !!}
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
     {!! Form::text('middle_name', null, ['class' => 'form-control', 'placeholder' => 'Enter your middle name', 'required']) !!}
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
     {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Enter your last name', 'required']) !!}
     @if ($errors->has('last_name'))
         <span class="help-block">
             <strong>{{ $errors->first('last_name') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('email','E-mail') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter email', 'required']) !!}
     @if ($errors->has('email'))
         <span class="help-block">
             <strong>{{ $errors->first('email') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('username','Username') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'if you already have a username use it otherwise register first', 'required']) !!}
     @if ($errors->has('username'))
         <span class="help-block">
             <strong>{{ $errors->first('username') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('address','Address') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'Enter address', 'required']) !!}
     @if ($errors->has('address'))
         <span class="help-block">
             <strong>{{ $errors->first('address') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('phone_number1') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('phone_number','Phone Number') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('phone_number', null, ['class' => 'form-control', 'placeholder' => 'Enter your phone number(optional)']) !!}
     @if ($errors->has('phone_number'))
         <span class="help-block">
             <strong>{{ $errors->first('phone_number') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('mobile_number1') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('mobile_number1','Mobile Number 1') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('mobile_number1', null, ['class' => 'form-control', 'placeholder' => 'Enter your mobile number', 'required']) !!}
     @if ($errors->has('mobile_number1'))
         <span class="help-block">
             <strong>{{ $errors->first('mobile_number1') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('mobile_number2') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('mobile_number2','Mobile Number 2') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('mobile_number2', null, ['class' => 'form-control', 'placeholder' => 'Enter your mobile number(optional)']) !!}
     @if ($errors->has('mobile_number2'))
         <span class="help-block">
             <strong>{{ $errors->first('mobile_number2') }}</strong>
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

  <div class="form-group{{ $errors->has('birth_date') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('birth_date','Birth Date') !!}
    </div>
  <div class = "col-md-10">
     {!! Form::date('birth_date', '1990-02-12', ['class' => 'form-control', 'placeholder' => 'birth_date']) !!}
     @if ($errors->has('birth_date'))
         <span class="help-block">
             <strong>{{ $errors->first('birth_date') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('school_id') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('school_id','School ID') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('school_id', null, ['class' => 'form-control', 'placeholder' => 'school ID']) !!}
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
