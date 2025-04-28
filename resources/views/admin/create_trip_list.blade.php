@extends("admin.layout_admin")
@section("content")
<center>
<div class="w-2/3 rounded-md p-5">
    
    <div class="text-center">
        <h1>create Trip</h1>
    </div>

<form method="POST" action="{{ route("trip_post") }}" class="bg-white w-full p-4 text-start">
    @csrf
    <div>
    <label for="">Departure</label>
    <input name="departure" type="text" class="w-full border border-gray-200 rounded-md">
    </div>
    <div>
    <label for="">arrival	</label>
    <input name="arrival" type="text" class="w-full border border-gray-200 rounded-md">
    </div>
    <div>

    <label for="departure_date">Date et heure de départ :</label>
    <input type="datetime-local" id="departure_date" name="departure_date" class="w-full border border-gray-200 rounded-md">

    </div>
    <div>
    <label for="">max_places</label>
    <input name="max_places" type="number" class="w-full border border-gray-200 rounded-md">
    </div>
    <div>
    <label for="">Price</label>
    <input name="price" type="number" class="w-full border border-gray-200 rounded-md">
    </div>

    <div>
        <label for="">status</label>
        <select name="status" id="" class="w-full p-2 border border-gray-200">
          
                <option value="1">available</option>
                <option value="0">Unavailable</option>

                   </select>
    </div>
    <div>
        <label for="">Category</label>
        <select name="category" id="" class="w-full p-2 border border-gray-200">
            @foreach ($categories as $category )
                <option value="{{ $category->id }}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="">Agency</label>
        <select name="agency" id="" class="w-full p-2 border border-gray-200">
            @foreach ($agencies as $agency )
                <option value="{{ $agency->id }}">{{$agency->name.", ".$agency->city->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="flex justify-end mt-5">
        <button class="p-2 bg-blue-950 text-white rounded-md">submit</button>
    </div>
</form>
</div>
</center>
@endsection
