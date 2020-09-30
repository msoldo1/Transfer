<div class="form-group pb-2">
    <label for="name">Name:</label>
    <input class="form-control" type="text"  name="name" value="{{ $user->name}}">
    <div class="danger">{{ $errors->first('name')  }}</div>
</div>
<div class="form-group pb-2">
    <label for="phone">Phone:</label>
    <input class="form-control " type="text" name="phone" value="{{ $user->phone }}">
    <div class="danger">{{ $errors->first('phone')  }}</div>
</div>

<div class="form-group pb-2">
    <label for="user_number">ID:</label>
    <input class="form-control " type="text" name="user_number" value="{{ $user->user_number }}">
    <div class="danger">{{ $errors->first('user_number')  }}</div>
</div>
@csrf
