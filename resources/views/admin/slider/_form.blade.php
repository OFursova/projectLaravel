<div class="form-group">
    {!! Form::label('name', 'Slider Item Name: ') !!}
    {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('img', 'Image: ') !!}
    <div class="input-group">
        <span class="input-group-btn">
            <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
            <i class="fa fa-picture-o"></i> Choose
           </a>
        </span>
    <input id="thumbnail" class="form-control" type="text" name="img" value="@isset($slider) {{$slider->img}} @endisset">
    </div>
    <div id="holder" style="margin-top:15px;max-height:100px;">
    @isset($slider)
    <img src="{{$slider->img}}" alt="{{$slider->name}}" style="max-height:100px">
    @endisset
  </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Slider Item Description: ') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('button_text', 'Button Text: ') !!}
  {!! Form::text('button_text', null, ['class'=>'form-control'. ($errors->has('button_text') ? ' is-invalid' : '')]) !!}
  @error('button_text')
      <div class="invalid-feedback">{{$message}}</div>
  @enderror
</div>
<div class="form-group">
  {!! Form::label('button_url', 'Slider Item Link: ') !!}
  {!! Form::text('button_url', null, ['class'=>'form-control']) !!}
</div>

<button class="btn btn-primary">Save</button>