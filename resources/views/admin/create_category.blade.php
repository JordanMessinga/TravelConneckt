@extends("admin.layout_admin")
@section("content")
<center>
<div class="w-2/3 rounded-md p-5">
    
    <div class="text-center">
        <h1>create Category</h1>
    </div>

<form method="POST" action="{{ route("post_category") }}" class="bg-white w-full p-4 text-start">
    @csrf
    <div>
    <label for="">name</label>
    <input type="text" name="name" class="w-full border border-gray-200 rounded-md">
    </div>
    <label for="">Agency</label>
    <select name="agency" id="" class="w-full p-2 border border-gray-200">
        @foreach ($agencies as $agency )
            <option value="{{ $agency->id }}">{{$agency->name.", ".$agency->city->name}}</option>
        @endforeach
    </select>

    <div class="flex justify-end mt-5">
        <button class="p-2 bg-blue-950 text-white rounded-md" type="submit">submit</button>
    </div>
</form>
</div>
</center>
@endsection
