@extends("admin.layout_admin")
@section("content")
<center>
<div class="w-2/3 rounded-md p-5">
    
    <div class="text-center">
        <h1>create city</h1>
    </div>

<form method="POST" action="{{ route("city_post") }}" class="bg-white w-full p-4 text-start">
    @csrf
    <div>
    <label for="">City</label>
    <input type="text" name="city_name" class="w-full border border-gray-200 rounded-md">
    </div>
    <div class="flex justify-end mt-5">
        <button class="p-2 bg-blue-950 text-white rounded-md" type="submit">submit</button>
    </div>
</form>
</div>
</center>
@endsection
