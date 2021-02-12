<div class="form-group">
    {!! Form::label('name', 'Product Name: ') !!}
    {!! Form::text('name', null, ['class'=>'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) !!}
    @error('name')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('slug', 'Product Slug: ') !!}
    {!! Form::text('slug', null, ['class'=>'form-control'. ($errors->has('slug') ? ' is-invalid' : '')]) !!}
    @error('slug')
        <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
<div class="form-group">
    {!! Form::label('description', 'Product Description: ') !!}
    {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
  {!! Form::label('price', 'Product Price: ') !!}
  {!! Form::text('price', null, ['class'=>'form-control'. ($errors->has('price') ? ' is-invalid' : '')]) !!}
  @error('price')
      <div class="invalid-feedback">{{$message}}</div>
  @enderror
</div>
<div class="form-group">
  {!! Form::label('action_price', 'Product Sale Price: ') !!}
  {!! Form::text('action_price', null, ['class'=>'form-control'. ($errors->has('action_price') ? ' is-invalid' : '')]) !!}
  @error('action_price')
      <div class="invalid-feedback">{{$message}}</div>
  @enderror
</div>
<div class="form-group">
  {!! Form::checkbox('recommended', 'recommended') !!}
</div>
<div class="form-group">
  {!! Form::select('category_id', $categories) !!}
</div>
{{-- <div class="form-group">
    {!! Form::label('uploadImg', 'Product Image: ') !!}
    {!! Form::file('uploadImg', ['class'=>'form-control']) !!}
</div> --}}
<div class="input-group">
    <span class="input-group-btn">
      <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
        <i class="fa fa-picture-o"></i> Choose
      </a>
    </span>
    <input id="thumbnail" class="form-control" type="text" name="img" value="@isset($product) {{$product->img}} @endisset">
  </div>
  <div id="holder" style="margin-top:15px;max-height:100px;">
    @isset($product)
    <img src="{{$category->img}}" alt="{{$product->name}}" style="max-height:100px">
    @endisset
  </div>

  <button class="btn btn-primary">Save</button>