

@extends("home_layout")
@section("content")
   
<section class="container mx-auto py-10 text-center">
    <div class="relative mb-8">
        <h2 class="text-2xl md:text-4xl font-bold text-blue-900">Book Your Trip Hassle Free</h2>
        
    </div>

    <div class="bg-gray-100/50 p-8 rounded-xl shadow-lg max-w-4xl mx-auto border border-blue-100">
        <form action="{{ route('filter') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- From Field -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-bus text-blue-800"></i>
                    </div>
                    <input type="text" name="from" placeholder="From: Yaoundé"
                           class="pl-10 w-full p-3 bg-white border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                    @if($errors->has("from"))
                        <p class="mt-1 text-red-600 text-sm flex items-center">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i>
                            {{ $errors->first("from") }}
                        </p>
                    @endif
                </div>
                
                <!-- To Field -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-location-dot text-blue-800"></i>
                    </div>
                    <input type="text" name="to" placeholder="To: Douala"
                           class="pl-10 w-full p-3 bg-white border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                    @if($errors->has("to"))
                        <p class="mt-1 text-red-600 text-sm flex items-center">
                            <i class="fa-solid fa-circle-exclamation mr-1"></i>
                            {{ $errors->first("to") }}
                        </p>
                    @endif
                </div>
                
                <!-- Date Field -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fa-solid fa-calendar-days text-blue-800"></i>
                    </div>
                    <input type="date" name="date"
                           class="pl-10 w-full p-3 bg-white border border-blue-200 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200">
                </div>
            </div>
            
            <!-- Search Button -->
            <button class="bg-blue-900 text-white px-10 py-3 rounded-lg
                          hover:bg-blue-800 transform hover:scale-105
                          transition-all duration-200 font-bold text-lg shadow-md">
                <i class="fa-solid fa-magnifying-glass mr-2"></i> Find My Trip
            </button>
        </form>
    </div>
</section>
<section class="container mx-auto py-8">
  @if ($ftrips)
    <div class="relative mb-10">
      <h1 class="text-center text-3xl font-bold text-blue-900">Search Results</h1>
      
    </div>
  @endif
  
  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
    @foreach ($ftrips as $trip)
      <div class="bg-gray-100/50 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100">
        <!-- Agency Header with Gradient -->
        <div class=" p-4">
          <h1 class="text-blue-900 font-bold text-xl flex items-center">
            <i class="fa-solid fa-building mr-2"></i>
            {{$trip->agency->name}}
          </h1>
        </div>
        
        <!-- Trip Details -->
        <div class="p-5">
          <div class="flex items-center justify-between">
            <!-- Departure Info -->
            <div class="text-center">
              <div class="text-gray-500 text-sm uppercase tracking-wide">From</div>
              <h2 class="font-bold text-xl text-gray-800">
                {{$trip->departure}}
              </h2>
              
            </div>
            
            <!-- Trip Direction Indicator -->
            <div class="flex-1 px-4 flex flex-col items-center">
              <div class="w-full flex items-center justify-center">
                <div class="h-0.5 flex-1 bg-gradient-to-r from-blue-300 to-indigo-500"></div>
                <div class="mx-2 text-indigo-600">
                  <i class="fa-solid fa-bus text-xl transform "></i>
                </div>
                <div class="h-0.5 flex-1 bg-gradient-to-r from-indigo-500 to-purple-500"></div>
              </div>
              <span class="mt-2 text-sm text-gray-500">{{$trip->category->name}}</span>

              <div class="mt-2 bg-blue-100 text-blue-800 rounded-full px-3 py-1 text-sm">
                {{$trip->departure_date}}
              </div>

            </div>
            
            <!-- Arrival Info -->
            <div class="text-center">
              <div class="text-gray-500 text-sm uppercase tracking-wide">To</div>
              <h2 class="font-bold text-xl text-gray-800">
                {{$trip->arrival}}
              </h2>
            </div>
          </div>
          
          <!-- Price and Buy Button -->
          <div class="mt-6 flex justify-between items-center">
            <div class="text-2xl font-bold text-indigo-900">
              {{ number_format($trip->price) }} <span class="text-sm font-normal">XAF</span>
            </div>
          </div>
          
          <!-- Buy Button (Separate Row) -->
          <div class="mt-4 text-center">
            <a href="{{route('trajet_details',$trip->id)}}"
               class="inline-block bg-blue-900 text-white px-8 py-3 rounded-lg
                      hover:from-blue-700 hover:to-indigo-800 transform hover:scale-105
                      transition-all duration-200 font-bold text-lg w-full">
              <i class="fa-solid fa-ticket mr-2"></i> BUY TICKET
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
  
  @if(count($ftrips) == 0 && request()->isMethod('post'))
    <div class="bg-blue-50 border-l-4 border-blue-500 text-blue-700 p-4 rounded shadow-md">
      <div class="flex items-center">
        <i class="fa-solid fa-circle-info mr-3 text-blue-500 text-xl"></i>
        <p>No trips found matching your search criteria. Please try different dates or destinations.</p>
      </div>
    </div>
  @endif
</section>


<section class="container mx-auto py-8">
    <div class="relative mb-10">
      <h3 class="text-center text-3xl font-bold text-blue-900">Other Trip Options Available</h3>
      
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 w-full">
        @foreach ($trips as $trip)
          <div class="bg-gray-100/50 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden border border-gray-100">
            <!-- Agency Header with Gradient -->
            <div class=" p-4">
          <h1 class="text-blue-900 font-bold text-xl flex items-center">
            <i class="fa-solid fa-building mr-2"></i>
                {{$trip->agency->name}}
              </h1>
            </div>
            
            <!-- Trip Details -->
            <div class="p-5">
              <div class="flex items-center justify-between">
                <!-- Departure Info -->
                <div class="text-center">
                  <div class="text-gray-500 text-sm uppercase tracking-wide">From</div>
                  <h2 class="font-bold text-xl text-gray-800">
                    {{$trip->departure}}
                  </h2>
                  
                </div>
                
                <!-- Trip Direction Indicator -->
                <div class="flex-1 px-4 flex flex-col items-center">
              <div class="w-full flex items-center justify-center">
                <div class="h-0.5 flex-1 bg-gradient-to-r from-blue-300 to-indigo-500"></div>
                <div class="mx-2 text-indigo-600">
                  <i class="fa-solid fa-bus text-xl transform "></i>
                </div>
                <div class="h-0.5 flex-1 bg-gradient-to-r from-indigo-500 to-purple-500"></div>
              </div>
                  <span class="mt-2 text-sm text-gray-500">{{$trip->category->name}}</span>

                  <div class="mt-2 bg-blue-100 text-blue-800 rounded-full px-3 py-1 text-sm">
                    {{$trip->departure_date}}
                  </div>

                </div>
                
                <!-- Arrival Info -->
                <div class="text-center">
                  <div class="text-gray-500 text-sm uppercase tracking-wide">To</div>
                  <h2 class="font-bold text-xl text-gray-800">
                    {{$trip->arrival}}
                  </h2>
                </div>
              </div>
              
              <!-- Price and Buy Button -->
              <div class="mt-6 flex justify-between items-center">
                <div class="text-2xl font-bold text-indigo-900">
                  {{ number_format($trip->price) }} <span class="text-sm font-normal">XAF</span>
                </div>
              </div>
              
              <!-- Buy Button (Separate Row) -->
              <div class="mt-4 text-center">
                <a href="{{route('trajet_details',$trip->id)}}"
                   class="inline-block bg-blue-900 text-white px-8 py-3 rounded-lg
                          hover:from-blue-700 hover:to-indigo-800 transform hover:scale-105
                          transition-all duration-200 font-bold text-lg w-full">
                  <i class="fa-solid fa-ticket mr-2"></i> BUY TICKET
                </a>
              </div>
            </div>
          </div>
        @endforeach
    </div>
</section>



<section class="container mx-auto px-6 py-16">
    <h2 class="text-4xl font-bold text-center text-blue-900 mb-12">Questions Fréquemment Posées</h2>

    <div class="space-y-4 max-w-3xl mx-auto px-6">
        <div class="bg-gray-100/50  rounded-lg shadow-md overflow-hidden">
            <button class="w-full flex justify-between items-center p-6 text-xl font-semibold  focus:outline-none" onclick="toggleFAQ(this)">
                Comment puis-je acheter mon billet de bus ?
                <svg class="w-6 h-6 transform transition-transform duration-200 rotate-0 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div class="transition-max-height duration-300 ease-in-out overflow-hidden max-h-0" id="answer1">
                <div class="px-6 pb-6 ">
                    <p>
                        Vous pouvez acheter votre billet directement sur notre site web en utilisant notre formulaire de recherche. Sélectionnez votre ville de départ et d'arrivée, les dates, puis choisissez parmi les options de voyage disponibles. Le paiement se fait en ligne via mobile money ou carte de crédit.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-gray-100/50  rounded-lg shadow-md overflow-hidden">
            <button class="w-full flex justify-between items-center p-6 text-xl font-semibold  focus:outline-none" onclick="toggleFAQ(this)">
                Comment savoir si un trajet est fiable ?
                <svg class="w-6 h-6 transform transition-transform duration-200 rotate-0 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div class="transition-max-height duration-300 ease-in-out overflow-hidden max-h-0" id="answer2">
                <div class="px-6 pb-6 ">
                    <p>
                        Nous travaillons exclusivement avec des compagnies de transport reconnues et fiables. Les informations sur chaque trajet, y compris le nom de la compagnie, sont clairement affichées pour vous permettre de faire votre choix en toute confiance.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-gray-100/50  rounded-lg shadow-md overflow-hidden">
            <button class="w-full flex justify-between items-center p-6 text-xl font-semibold  focus:outline-none" onclick="toggleFAQ(this)">
                Y a-t-il une commission lors de l'achat ?
                <svg class="w-6 h-6 transform transition-transform duration-200 rotate-0 " fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div class="transition-max-height duration-300 ease-in-out overflow-hidden max-h-0" id="answer3">
                <div class="px-6 pb-6 ">
                    <p>
                        Une petite commission peut être appliquée pour couvrir les frais de service et les frais de transaction. Le montant total, incluant cette commission, est toujours affiché clairement avant la validation de votre paiement.
                    </p>
                </div>
            </div>
        </div>

    </div>
</section>



<script>
    function toggleFAQ(button) {
        // Récupère l'élément parent (la div de la question)
        const parent = button.parentElement;
        // Récupère l'élément de la réponse
        const answer = button.nextElementSibling;
        // Récupère l'icône SVG
        const icon = button.querySelector('svg');

        // Bascule la classe 'active' sur le parent pour la gestion des états
        parent.classList.toggle('active');

        // Si la réponse est visible, on la cache
        if (answer.classList.contains('max-h-0')) {
            // Déplie la réponse
            answer.classList.remove('max-h-0');
            answer.style.maxHeight = answer.scrollHeight + 'px';
            // Fait pivoter l'icône vers le haut
            icon.classList.remove('rotate-0');
            icon.classList.add('rotate-180');
        } else {
            // Replie la réponse
            answer.style.maxHeight = '0';
            answer.classList.add('max-h-0');
            // Fait pivoter l'icône vers le bas
            icon.classList.remove('rotate-180');
            icon.classList.add('rotate-0');
        }
    }
</script>



@endsection

