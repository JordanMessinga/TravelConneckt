@extends("admin.layout_admin")
@section("content")
 <div>
    <div class="mt-5 w-full flex justify-end">
        <a href="{{ route("create_city") }}">
        <button class="mr-4 bg-blue-950 text-white p-3 rounded-md">Create City</button>
        </a>
    </div>
    <table class="mt-5 bg-white w-full p-4 rounded-md">
        <thead>
            <tr>
                <td>N/S</td>
                <td>Name</td>
            </tr>
        </thead>
        <tbody>
            @foreach($cities as $city)
            <tr>
                <td>{{$city->id}}</td>
                <td>{{$city->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@endsection