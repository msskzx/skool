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

  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('email','E-mail') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'email', 'required']) !!}
     @if ($errors->has('email'))
         <span class="help-block">
             <strong>{{ $errors->first('email') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('address','Address') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'address', 'required']) !!}
     @if ($errors->has('address'))
         <span class="help-block">
             <strong>{{ $errors->first('address') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('years_of_exp') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('years_of_exp','Years of experience') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('years_of_exp', null, ['class' => 'form-control', 'placeholder' => 'years of experience', 'required']) !!}
     @if ($errors->has('years_of_exp'))
         <span class="help-block">
             <strong>{{ $errors->first('years_of_exp') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('phone_number','Phone Number') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('phone_number', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
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
     {!! Form::number('mobile_number1', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
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
     {!! Form::number('mobile_number2', null, ['class' => 'form-control', 'placeholder' => 'optional']) !!}
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
     {!! Form::date('birth_date', null, ['class' => 'form-control', 'placeholder' => 'birth date', 'required']) !!}
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
