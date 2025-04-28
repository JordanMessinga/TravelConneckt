@extends("home_layout")
@section("content")

<div class="flex flex-col items-center justify-center text-center p-10 bg-gradient-to-b from-blue-50 to-white rounded-3xl shadow-2xl">
    <div class="bg-green-100 p-4 rounded-full mb-4 animate-bounce">
      <svg class="w-12 h-12 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
      </svg>
    </div>
    <h1 class="text-3xl font-bold text-blue-800 mb-2">Booking Confirmed!</h1>
    <p class="text-gray-600 mb-8">Almost there, complete your details to get your ticket.</p>
  </div>

  
  <div class="justify-center text-center backdrop-blur-sm bg-white/70 border border-gray-200 rounded-2xl p-6 my-8 shadow-md">
    <h2 class="text-2xl font-semibold mb-4 text-blue-700">Trip Summary</h2>
    <div class="space-y-2 text-gray-700">
      <p><span class="font-medium">From:</span> {{ $trajet->departure }}</p>
      <p><span class="font-medium">To:</span> {{$trajet->arrival}}</p>
      <p><span class="font-medium">Departure:</span> {{ $trajet->departure_date }}</p>
      <p><span class="font-medium">Agency:</span> {{ $trajet->agency->name }}</p>
      <p><span class="font-medium">Class:</span> {{ $trajet->category->name }}</p>
      <p><span class="font-medium">Price:</span> <span class="text-green-600 font-bold">{{ $trajet->price }} FCFA</span></p>
    </div>
  </div>

  {{--form--}}
  <div class="flex justify-center items-center min-h-screen bg-gradient-to-b from-blue-50 to-white p-6">
    <form class="w-full max-w-md space-y-6 bg-white/70 backdrop-blur-md p-8 rounded-2xl shadow-xl">
      <h2 class="text-2xl font-bold text-center text-blue-800 mb-6">Complete Your Booking</h2>
  
      <div class="relative">
        <input type="text" placeholder="Full Name" class="w-full p-4 pl-12 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
        <div class="absolute top-4 left-4 text-gray-400">
          <i class="fas fa-user"></i>
        </div>
      </div>
  
      <div class="relative">
        <input type="tel" placeholder="Phone Number" class="w-full p-4 pl-12 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
        <div class="absolute top-4 left-4 text-gray-400">
          <i class="fas fa-phone"></i>
        </div>
      </div>
  
      <div class="relative">
        <input type="email" placeholder="Email (optional)" class="w-full p-4 pl-12 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
        <div class="absolute top-4 left-4 text-gray-400">
          <i class="fas fa-envelope"></i>
        </div>
      </div>
  
      <div class="relative">
        <input type="number" placeholder="Number of Tickets" class="w-full p-4 pl-12 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
        <div class="absolute top-4 left-4 text-gray-400">
          <i class="fas fa-ticket-alt"></i>
        </div>
      </div>
  
      <div class="space-y-2">
        <h3 class="font-semibold text-gray-700">Payment Method</h3>
        <div class="grid grid-cols-2 gap-4">
          <button type="button" class="flex items-center justify-center p-3 bg-yellow-400 text-white rounded-xl hover:bg-yellow-500 transition">
            <i class="fas fa-mobile-alt mr-2"></i> Mobile Money
          </button>
          <button type="button" class="flex items-center justify-center p-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
            <i class="fas fa-credit-card mr-2"></i> Card
          </button>
        </div>
      </div>
  
      <button type="submit" class="w-full py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-2xl text-lg transition shadow-lg">
        Confirm and Pay
      </button>
  
      <p class="text-center text-gray-400 text-xs mt-4">
        By confirming, you agree to our <a href="#" class="underline hover:text-blue-600">Terms</a> and <a href="#" class="underline hover:text-blue-600">Policies</a>.
      </p>
    </form>
  </div>
  

  

  

@endsection