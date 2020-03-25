<form action="{{URL::to('update-post')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div><label>Restaurant</label>
        <select name="restaurant_id" id="">
            @foreach(\App\Restaurant::all() as $restaurant)
                <option value="{{$restaurant->id}}">{{$restaurant->name}}</option>
            @endforeach
        </select>
    </div>
    <div><label>File</label><input type="file" name="file"></div>
    <div><input type="submit"></div>
</form>