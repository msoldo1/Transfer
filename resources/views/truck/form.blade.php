<div class="form-group pb-2">
    <label for="brand">Brand:</label>
    <input class="form-control" type="text"  name="brand" value="{{old('brand') ?? $truck->brand}}">
    <div class="danger">{{ $errors->first('brand')  }}</div>
</div>
<div class="form-group pb-2">
    <label for="capacity">Capacity:</label>
    <input class="form-control" type="text"  name="capacity" value="{{old('capacity') ?? $truck->capacity}}">
    <div class="danger">{{ $errors->first('capacity')  }}</div>
</div>
<div class="form-group pb-2">
    <label for="type">Type:</label>
    <input class="form-control " type="text" name="type" value="{{ old('type') ?? $truck->type}}">
    <div class="danger">{{ $errors->first('type')  }}</div>
</div>
@csrf
