@extends("admin.layout_admin")
@section("content")
<center>
<div class="w-2/3 rounded-md p-5">
    
    <div class="text-center">
        <h1>create Agency</h1>
    </div>

<form method="POST" action="{{ route("agency_post") }}" class="bg-white w-full p-4 text-start">
    @csrf
    <div>
    <label for="">name</label>
    <input type="text" name="name" class="w-full border border-gray-200 rounded-md">
    </div>
    <label for="">City</label>
    <select name="city" id="" class="w-full p-2 border border-gray-200">
        @foreach ($cities as $city )
            <option value="{{ $city->id }}">{{$city->name}}</option>
        @endforeach
    </select>
    <div>
    <label for="">phone</label>
    <input type="phone" name="phone" class="w-full border border-gray-200 rounded-md">
    </div>
    <div>
    <label for="">Email</label>
    <input type="email" name="email"  class="w-full border border-gray-200 rounded-md">
    </div>
    <div class="flex justify-end mt-5">
        <button class="p-2 bg-blue-950 text-white rounded-md" type="submit">submit</button>
    </div>
</form>
</div>
</center>
@endsection
