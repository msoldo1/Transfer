<input type="hidden" name="company_id" />
<input type="hidden" name="customer_id" />
<div class="form-group pb-2">
    <label for="price">Price:</label>
    <input class="form-control" type="text"  name="price" value="{{old('price')}}">
    <div class="danger">{{ $errors->first('price')  }}</div>
</div>
<div class="form-group pb-2">
    <label for="start">Start Point:</label>
    <input class="form-control" type="text"  name="start" value="{{old('start')}}">
    <div class="danger">{{ $errors->first('start')  }}</div>
</div>
<div class="form-group pb-2">
    <label for="destination">Destination:</label>
    <input class="form-control " type="text" name="destination" value="{{ old('destination') }}">
    <div class="danger">{{ $errors->first('destination')  }}</div>
</div>
<div class="form-group">
    <label for="active">Date</label>
    <input class="form-control" type="date" name="date" >
</div>
@csrf
