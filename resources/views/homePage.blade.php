

@extends("home_layout")
@section("content")
   
<section class="container mx-auto p-6 text-center">
    <h2 class="text-2xl md:text-4xl font-bold text-blue-900 mb-6 animate-pulse">Book Your Trip Hassle Free</h2>

    <div class="bg-[rgb(255,255,255,0.7)] p-6 rounded-lg shadow-md flex flex-wrap justify-center gap-4 w-full">
        <div class="flex flex-col">
        <div class="flex gap-2">
        <form action="{{ route("filter") }}" method="POST" class="flex flex-wrap justify-center gap-4">
            @csrf
        <input type="text" name="from" placeholder="From: Yaoundé" class="border p-2 rounded w-40">
        @if($errors->has("from"))
            <span class="text-red-500">{{ $errors->first("from") }}</span>
        @endif
        <input type="text" name="to" placeholder="To: Douala" class="border p-2 rounded w-40">
        @if($errors->has("to"))
            <span class="text-red-500">{{ $errors->first("to") }}</span>
        @endif
        <input type="date" name="date" class="border p-2 rounded w-40">
    </div>   
    {{--<div class="flex gap-2">

    <label for="">Imminent departure:</label>        <input type="radio">

    <label for="">Price:</label>        <input type="radio">

    <label for="">Agency</label>
        <select name="agency" id="" class="flex w-40 p-2 border border-gray-200">
            @foreach ($agencies as $agency )

            <option value="{{ $agency->id }}">{{$agency->name.", ".$agency->city->name}}</option>
                
            @endforeach
        </select>

    </div>--}}
    </div>
        <button class="bg-blue-900 text-white px-6 py-2 rounded-lg hover:bg-blue-800">Search</button>
        </form>
    </div>
</section>
  <section class="container mx-auto ">
     
@if ($ftrips)
    
<h1 class="text-center text-xl font-bold text-blue-900">Results:</h1>
@endif


        
    <div class="grid grid-cols-2 gap-2 w-full">
    @foreach ($ftrips as $trip )
            
    <div class="bg-gray-100/50 rouded-md p-4 rounded-sm  w-full ">
        <div class="w-full flex">
        <h1 class="font-bold py-2">{{$trip->agency->name}}</h1>
        </div>
        <div class="flex gap-8">
            <div>
                <h2 class="font-semibold">
                {{$trip->departure }}</h2>
                <div class="my-4">
                    <h2>{{$trip->departure_date}}</h2>
                    </div>
            </div>
            <div class="flex w-1/2 justify-between">
                <div>
                    <i class="fa-solid fa-chevron-right font-bold"></i>
                </div>
                <div>
                        <p class="font-semibold"> {{$trip->arrival}}</p>
                    <h2 class="my-4">{{$trip->category->name}}</h2>
                </div>
                <div>
                    <h2 class="font-bold">{{ $trip->price }}XAF </h2>
                    <a href="{{route("trajet_details",$trip->id) }}" class="bg-blue-700 rounded-md px-3 py-1 text-white my-2 hover:bg-blue-950 transition-all duration-200">BUY</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </div>
  </section>


<section class="container mx-auto p-6 w-full">
    <h3 class="text-xl md:text-2xl font-semibold mb-4 text-center text-blue-900">Other Trip Options Available</h3>

    <div class="grid grid-cols-2 gap-2 w-full">
        @foreach ($trips as $trip )
            
        <div class="bg-gray-100/50 rouded-md p-4 rounded-sm  w-full ">
            <div class="w-full flex">
            <h1 class="font-bold py-2">{{$trip->agency->name}}</h1>
            </div>
            <div class="flex gap-8">
                <div>
                    <h2 class="font-semibold">
                    {{$trip->departure }}</h2>
                    <div class="my-4">
                        <h2>{{$trip->departure_date}}</h2>
                        </div>
                </div>
                <div class="flex w-1/2 justify-between">
                    <div>
                        <i class="fa-solid fa-chevron-right font-bold"></i>
                    </div>
                    <div>
                            <p class="font-semibold"> {{$trip->arrival}}</p>
                        <h2 class="my-4">{{$trip->category->name}}</h2>
                    </div>
                    <div>
                        <h2 class="font-bold">{{ $trip->price }}XAF </h2>
                        <a href="{{route("trajet_details",$trip->id) }}" class="bg-blue-700 rounded-md px-3 py-1 text-white my-2 hover:bg-blue-950 transition-all duration-200">BUY</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection

