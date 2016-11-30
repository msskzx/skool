<div class="row">
   {!! Form::open(['method'=>'GET', 'url'=>$searchURL, 'role'=>'search']) !!}
    <div class="col-md-12">
     <div class="input-group search-input-group">
        {!! Form::text('search',null,  ['class' => 'form-control', 'placeholder'=>'search', 'required']) !!}
          <span class="input-group-addon">
              <button type="submit">
                  <span class="fa fa-search"></span>
              </button>
          </span>
     </div>
    </div>
  {!! Form::close() !!}
</div>
