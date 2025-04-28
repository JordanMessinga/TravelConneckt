@extends("admin.layout_admin")
@section("content")
 <div>
    <div class="mt-5 w-full flex justify-end">
        <a href="{{ route("create_agency") }}">
        <button class="mr-4 bg-blue-950 text-white p-3 rounded-md">Create Agency</button>
        </a>
    </div>
    <table class="mt-5 bg-white w-full p-4 rounded-md">
        <thead>
            <tr>
                <td>N/S</td>
                <td>Name</td>
                <td>City</td>
                <td>Phone</td>
                <td>email</td>
            </tr>
        </thead>
        <tbody>
            @foreach($agencies as $agency)
            <tr>
                <td>{{$agency->id}}</td>
                <td>{{$agency->name}}</td>
                <td>{{$agency->city->name}}</td>
                <td>{{$agency->phone}}</td>
                <td>{{$agency->email}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@endsection