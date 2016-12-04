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

  <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('username','Username') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'username', 'required']) !!}
     @if ($errors->has('username'))
         <span class="help-block">
             <strong>{{ $errors->first('username') }}</strong>
         </span>
     @endif
    </div>
  </div>

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

  <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('password_confirmation','Confirm password') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'confirm password', 'required']) !!}
     @if ($errors->has('password_confirmation'))
         <span class="help-block">
             <strong>{{ $errors->first('password_confirmation') }}</strong>
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

  <div class="form-group{{ $errors->has('phone_number1') ? ' has-error' : '' }}">
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

  <div class="form-group">
      <div class="col-sm-offset-2 col-sm-1">
        {!! Form::submit($submitButtonText,['class' => 'btn-success form-control']) !!}
    </div>
  </div>

</div>
