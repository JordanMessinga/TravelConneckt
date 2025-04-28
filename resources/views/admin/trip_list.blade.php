@extends("admin.layout_admin")
@section("content")
 <div>
    <div class="mt-5 w-full flex justify-end">
        <a href="{{ route("create_trip") }}">
        <button class="mr-4 bg-blue-950 text-white p-3 rounded-md">Create Trip</button>
        </a>
        <a href="{{ route("create_category") }}">
        <button class="mr-4 bg-blue-800 text-white p-3 rounded-md">Create Category</button>
        </a>
    </div>
    <h1 class="mt-4">List of categories</h1>
     <table class="mt-5 bg-white w-full p-4 rounded-md">
    
        <thead>
            <tr>
                <td>N/S</td>
                <td>Name</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category )
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h1 class="mt-4">List of trips</h1>
    <table class="mt-5 bg-white w-full p-4 rounded-md">
        <thead>
            <tr>
                <td>N/S</td>
                <td>departure</td>
                <td>arrival</td>
                <td>max_places</td>
                <td>status</td>
                <td>Category</td>
                <td>departure date/time</td>
                <td>agency</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($trips as $trip )
                
                <tr>
                    <td>{{$trip->id}}</td>
                    <td>{{$trip->departure}}</td>
                    <td>{{$trip->arrival}}</td>
                    <td>{{$trip->max_places}}</td>
                    <td>{{$trip->status ? "available":"unavailable"}}</td>
                    <td>{{$trip->category->name}}</td>
                    <td>{{$trip->departure_date}}</td>
                    <td>{{$trip->agency->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
 </div>
@endsection