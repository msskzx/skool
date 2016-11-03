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
      {!! Form::label('email','E-mail:') !!}
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

  <div class="form-group{{ $errors->has('main_language') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('main_language','Main Language:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('main_language', null, ['class' => 'form-control', 'placeholder' => 'Enter main language', 'required']) !!}
     @if ($errors->has('main_language'))
         <span class="help-block">
             <strong>{{ $errors->first('main_language') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('address','Address:') !!}
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
      {!! Form::label('phone_number1','Phone Number 1:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('phone_number1', null, ['class' => 'form-control', 'placeholder' => 'Enter your phone number', 'required']) !!}
     @if ($errors->has('phone_number1'))
         <span class="help-block">
             <strong>{{ $errors->first('phone_number1') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('phone_number2') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('phone_number2','Phone Number 2:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('phone_number2', null, ['class' => 'form-control', 'placeholder' => 'Enter your phone number', 'required']) !!}
     @if ($errors->has('phone_number2'))
         <span class="help-block">
             <strong>{{ $errors->first('phone_number2') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('fees') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('fees','Fees:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::number('fees', null, ['class' => 'form-control', 'placeholder' => 'Enter fees', 'required']) !!}
     @if ($errors->has('fees'))
         <span class="help-block">
             <strong>{{ $errors->first('fees') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('type','Type:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Enter school\'s type', 'required']) !!}
     @if ($errors->has('type'))
         <span class="help-block">
             <strong>{{ $errors->first('type') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('general_info') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('general_info','General Info:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('general_info', null, ['class' => 'form-control', 'placeholder' => 'Enter general info', 'required']) !!}
     @if ($errors->has('general_info'))
         <span class="help-block">
             <strong>{{ $errors->first('general_info') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('mission') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('mission','Mission:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('mission', null, ['class' => 'form-control', 'placeholder' => 'Enter school\'s mission', 'required']) !!}
     @if ($errors->has('mission'))
         <span class="help-block">
             <strong>{{ $errors->first('mission') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('vision') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('vision','Vision:') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('vision', null, ['class' => 'form-control', 'placeholder' => 'Enter school\'s vision', 'required']) !!}
     @if ($errors->has('vision'))
         <span class="help-block">
             <strong>{{ $errors->first('vision') }}</strong>
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
