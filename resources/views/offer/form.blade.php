<input type="hidden" name="company_id" />
<input type="hidden" name="customer_id" />
<div class="form-group pb-2">
    <label for="start">Start Point:</label>
    <input class="form-control" type="text"  name="start" value="{{old('start') ?? $offer->start}} ">
    <div class="danger">{{ $errors->first('start')  }}</div>
</div>
<div class="form-group pb-2">
    <label for="destination">Destination:</label>
    <input class="form-control " type="text" name="destination" value="{{ old('destination') ?? $offer->destination}}">
    <div class="danger">{{ $errors->first('destination')  }}</div>
</div>
<div class="form-group pb-2">
    <label for="price">Price:</label>
    <input class="form-control" type="text"  name="price" value="{{old('price') ?? $offer->price}} ">
    <div class="danger">{{ $errors->first('price')  }}</div>
</div>
<div class="form-group">
    <label for="active">Date</label>
    <input class="form-control" type="date" name="date" value="{{ old('date') ?? $offer->date }}" >
</div>
<div class="form-group">
    <label for="truck_id">Truck</label>
    <select name="truck_id" id="truck_id" class="form-control">
        <option value="" selected disabled>Select truck</option>
        @foreach($trucks as $truck)
            <option value="{{ $truck->id }}" {{ $truck->id == $offer->truck_id ? 'selected' : '' }}>{{ $truck->brand }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="driver_id">Driver</label>
    <select name="driver_id" id="driver_id" class="form-control">
        <option value="" selected disabled>Select driver</option>
        @foreach($drivers as $driver)
            @if($driver->active == 1)
            <option value="{{ $driver->id }}" {{ $driver->id == $offer->driver_id ? 'selected' : '' }}>{{ $driver->name }}</option>
            @endif
        @endforeach
    </select>
</div>
@csrf
