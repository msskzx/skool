<div class = "form-horizontal">

  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('title','Title') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'title', 'required']) !!}
     @if ($errors->has('title'))
         <span class="help-block">
             <strong>{{ $errors->first('title') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('question') ? ' has-error' : '' }}">
    <div class = "control-label col-md-2">
      {!! Form::label('question','Question') !!}
    </div>
   <div class = "col-md-10">
     {!! Form::textarea('question', null, ['class' => 'form-control', 'placeholder' => 'question', 'required']) !!}
     @if ($errors->has('question'))
         <span class="help-block">
             <strong>{{ $errors->first('question') }}</strong>
         </span>
     @endif
    </div>
  </div>

  <div class="form-group{{ $errors->has('course_id') ? ' has-error' : '' }}">
    <div class = "col-md-2 control-label">
      {!! Form::label('course_id','Course') !!}
    </div>
    <div class = "col-md-10">
      {!! Form::select('course_id', $courses, null, ['class' => 'form-control', 'placeholder' => 'course...', 'required']) !!}
      @if ($errors->has('course_id'))
          <span class="help-block">
             <strong>{{ $errors->first('course_id') }}</strong>
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
