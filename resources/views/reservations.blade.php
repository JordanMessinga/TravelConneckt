@extends("home_layout")
@section("content")

<div class="container mx-auto px-4 py-8">
    <div class="bg-gray-100/50 rounded-lg shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-blue-900 mb-4">My Reservations</h1>
        <p class="text-gray-600">View and manage your travel tickets</p>
    </div>

    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    @if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
        <p>{{ session('error') }}</p>
    </div>
    @endif

    @if(Auth::check())
        @if(isset($reservations) && count($reservations) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($reservations as $reservation)
                <!-- Single Reservation Card -->
                <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                    <div class="bg-blue-900 text-white p-4">
                        <div class="flex justify-between items-center">
                            <h2 class="text-xl font-bold">{{ $reservation->trajet->departure }} to {{ $reservation->trajet->arrival }}</h2>
                            <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">Confirmed</span>
                        </div>
                    </div>
                    
                    <div class="p-4 space-y-3">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-calendar-alt text-blue-900"></i>
                            <div>
                                <p class="text-sm text-gray-500">Departure Date</p>
                                <p class="font-medium">{{ $reservation->trajet->departure_date }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-building text-blue-900"></i>
                            <div>
                                <p class="text-sm text-gray-500">Agency</p>
                                <p class="font-medium">{{ $reservation->trajet->agency->name }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-chair text-blue-900"></i>
                            <div>
                                <p class="text-sm text-gray-500">Class</p>
                                <p class="font-medium">{{ $reservation->trajet->category->name }}</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-money-bill-wave text-green-600"></i>
                            <div>
                                <p class="text-sm text-gray-500">Price</p>
                                <p class="font-medium text-green-600">{{ $reservation->trajet->price }} FCFA</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-200 p-4 bg-gray-50">
                        <div class="flex justify-between">
                            <span class="text-sm text-gray-500">Reservation ID: #{{ $reservation->id }}</span>
                            <span class="text-sm text-gray-500">Booked on: {{ $reservation->created_at->format('M d, Y') }}</span>
                        </div>
                    </div>
                    
                    <div class="p-4 flex space-x-2">
                        <a href="{{ route('download_ticket', $reservation->id) }}" class="flex-1 bg-blue-900 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition">
                            <i class="fas fa-download mr-2"></i> Download Ticket
                        </a>
                        <a href="{{ route('trajet_details', $reservation->trajet->id) }}" class="flex-1 bg-gray-200 text-gray-800 text-center py-2 rounded-lg hover:bg-gray-300 transition">
                            <i class="fas fa-info-circle mr-2"></i> Details
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="bg-gray-100/50 rounded-lg shadow-lg p-8 text-center">
                <div class="flex justify-center mb-4">
                    <i class="fas fa-ticket-alt text-5xl text-blue-900"></i>
                </div>
                <h2 class="text-2xl font-bold text-gray-700 mb-2">No Reservations Found</h2>
                <p class="text-gray-600 mb-6">You haven't made any travel reservations yet.</p>
                <a href="{{ route('home') }}" class="inline-block bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                    Browse Available Trips
                </a>
            </div>
        @endif
    @else
        <div class="bg-white rounded-lg shadow-lg p-8 text-center">
            <div class="flex justify-center mb-4">
                <i class="fas fa-user-lock text-5xl text-gray-300"></i>
            </div>
            <h2 class="text-2xl font-bold text-gray-700 mb-2">Login Required</h2>
            <p class="text-gray-600 mb-6">Please login to view your reservations.</p>
            <a href="{{ route('login') }}" class="inline-block bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                Login Now
            </a>
        </div>
    @endif
</div>

@endsection