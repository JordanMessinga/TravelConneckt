@extends("home_layout")
@section("content")

<div class="container mx-auto px-4 py-8">
    <div class="bg-gray-100/50 rounded-lg shadow-lg p-6 mb-8">
        <h1 class="text-3xl font-bold text-blue-900 mb-4">My Profile</h1>
        <p class="text-gray-600">View and update your personal information</p>
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

    @if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Profile Information Card -->
        <div class="md:col-span-2">
            <div class="bg-gray-100/50 rounded-lg shadow-lg overflow-hidden">
                <div class="bg-blue-900 text-white p-4">
                    <h2 class="text-xl font-bold">Profile Information</h2>
                </div>
                
                <form action="{{ route('profile.update') }}" method="POST" class="p-6 space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
                            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" name="phone" id="phone" value="{{ Auth::user()->phone ?? '' }}" 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                            <textarea name="address" id="address" rows="3" 
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ Auth::user()->address ?? '' }}</textarea>
                        </div>
                    </div>
                    
                    <div class="pt-4">
                        <button type="submit" class="w-full md:w-auto px-6 py-3 bg-blue-900 text-white font-medium rounded-lg hover:bg-blue-800 transition">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Sidebar -->
        <div>
            <!-- Profile Summary Card -->
            <div class="bg-gray-100/50 rounded-lg shadow-lg overflow-hidden mb-6">
                <div class="bg-blue-900 text-white p-4">
                    <h2 class="text-xl font-bold">Account Summary</h2>
                </div>
                
                <div class="p-6 space-y-4">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-24 h-24 rounded-full bg-blue-100 flex items-center justify-center">
                            <i class="fas fa-user-circle text-5xl text-blue-900"></i>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-lg font-semibold">{{ Auth::user()->name }}</h3>
                        <p class="text-gray-500">{{ Auth::user()->email }}</p>
                    </div>
                    
                    <div class="pt-2">
                        <p class="text-sm text-gray-500">Member since: {{ Auth::user()->created_at->format('M Y') }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Password Change Card -->
            <div class="bg-gray-100/50 rounded-lg shadow-lg overflow-hidden">
                <div class="bg-blue-900 text-white p-4">
                    <h2 class="text-xl font-bold">Change Password</h2>
                </div>
                
                <form action="{{ route('profile.password') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Current Password</label>
                        <input type="password" name="current_password" id="current_password" 
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <input type="password" name="password" id="password" 
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    
                    <div class="pt-2">
                        <button type="submit" class="w-full px-4 py-2 bg-blue-900 text-white font-medium rounded-lg hover:bg-blue-800 transition">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection