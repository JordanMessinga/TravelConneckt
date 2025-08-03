@extends("home_layout")
@section("content")

<div class="flex flex-col items-center justify-center text-center p-10 bg-gradient-to-b from-blue-50 to-white rounded-3xl shadow-2xl">

    <h1 class="text-3xl font-bold text-blue-900 mb-2">Booking Confirmed!</h1>
    <p class="text-gray-600 mb-8">Almost there, complete your details to get your ticket.</p>
  </div>


 <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-blue-50 to-white p-6">
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full max-w-5xl">

    <!-- Résumé (on le met d'abord maintenant) -->
    <div class="bg-gray-100/50 p-6 rounded-2xl shadow-lg space-y-6 flex flex-col justify-between">
      <div class="space-y-4">
        <h2 class="text-2xl font-bold text-center text-blue-900">Trip Summary</h2>

        <div class="space-y-3">
          <div class="flex items-center space-x-3 w-full p-3 border rounded-xl">
            <i class="fas fa-map-marker-alt text-blue-900"></i>
            <p><span class="font-medium font-semibold">From:</span> {{ $trajet->departure }}</p>
          </div>

          <div class="flex items-center space-x-3 w-full p-3 border rounded-xl">
            <i class="fas fa-location-arrow text-blue-900"></i>
            <p><span class="font-medium font-semibold">To:</span> {{$trajet->arrival}}</p>
          </div>

          <div class="flex items-center space-x-3 w-full p-3 border rounded-xl">
            <i class="fas fa-calendar-alt text-blue-900"></i>
            <p><span class="font-medium font-semibold">Departure:</span> {{ $trajet->departure_date }}</p>
          </div>

          <div class="flex items-center space-x-3 w-full p-3 border rounded-xl">
            <i class="fas fa-building text-blue-900"></i>
            <p><span class="font-medium font-semibold">Agency:</span> {{ $trajet->agency->name }}</p>
          </div>

          <div class="flex items-center space-x-3 w-full p-3 border rounded-xl">
            <i class="fas fa-chair text-blue-900"></i>
            <p><span class="font-medium font-semibold">Class:</span> {{ $trajet->category->name }}</p>
          </div>

          <div class="flex items-center space-x-3 w-full p-3 border rounded-xl">
            <i class="fas fa-money-bill-wave text-blue-900"></i>
            <p><span class="font-medium font-semibold">Price:</span> <span class="text-green-600 font-bold">{{ $trajet->price }} FCFA</span>
              
            </p>
          </div>
        </div>
      </div>

      
    </div>

    <!-- Formulaire (on le met après maintenant) -->

    <form action="{{ route('create_reservation', $trajet->id) }}" method="POST" class="w-full bg-gray-100/50 p-6 rounded-2xl shadow-lg space-y-5">
      @csrf
      <h2 class="text-2xl font-bold text-center text-blue-900 mb-2">Complete Your Booking</h2>

      <input type="text" name="full_name" placeholder="Full Name" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none" required>
      <input type="tel" name="phone" placeholder="Phone Number" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none" required>
      <input type="email" name="email" placeholder="Email (optional)" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
      <input type="number" name="num_tickets" placeholder="Number of Tickets" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none" value="1" min="1" required>

      <div>
        <h3 class="font-semibold text-center text-blue-900 mb-2">Payment Method</h3>
        <div class="grid grid-cols-2 gap-3">
          <a href="{{route("mobile_paiement",$trajet->id) }}" class="flex items-center justify-center p-3 bg-yellow-400 text-white rounded-xl hover:bg-yellow-500 transition">
            <i class="fas fa-mobile-alt mr-2"></i> Mobile Money
          </a>
          <a href="{{route("card_paiement",$trajet->id) }}" class="flex items-center justify-center p-3 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition">
            <i class="fas fa-credit-card mr-2"></i> Card
          </a>
        </div>
      </div>

      <button type="submit" class="w-full py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-xl text-lg transition shadow-md">
        Confirm and Pay
      </button>

      <p class="text-center text-gray-400 text-xs mt-2">
        By confirming, you agree to our <a href="#" class="underline hover:text-blue-600">Terms</a> and <a href="#" class="underline hover:text-blue-600">Policies</a>.
      </p>
    </form>

  </div>
</div>

  

  

@endsection