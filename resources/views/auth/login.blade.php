<x-guest-layout>
    <x-authentication-card>
       

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            
                <img class="mx-auto h-13 w-15" src="/build/assets/LOGO.png" >
                <h2 class="mt-5 mb-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Portal CentroLab</h2>
            
          
            
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

           
            <div class="flex items-center justify-end mt-4">
              
                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>



