@auth
    <x-app-layout>
        @include('blogs.lists')
    </x-app-layout>
@else
    <x-welcome-layout>
        @include('blogs.lists')
    </x-welcome-layout>
@endauth

