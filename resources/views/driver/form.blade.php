<input type="hidden" name="user_id" />
<div class="form-group pb-2">
    <label for="name">Name:</label>
    <input class="form-control" type="text"  name="name" value="{{old('name') ?? $driver->name}}">
    <div class="danger">{{ $errors->first('name')  }}</div>
</div>
<div class="form-group pb-2">
    <label for="phone">Phone:</label>
    <input class="form-control " type="text" name="phone" value="{{ old('phone') ?? $driver->phone }}">
    <div class="danger">{{ $errors->first('phone')  }}</div>
</div>

<div class="form-group">
    <label for="active">Status</label>
    <select name="active" id="active" class="form-control">
        <option value="" disabled>Select driver status</option>
        <option value="1">Working</option>
        <option value="2">On Vacation</option>
    </select>
</div>
@csrf
