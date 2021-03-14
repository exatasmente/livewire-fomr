
<div class="relative flex-1">
    <div class="mt-3 text-center sm:mt-5">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{__("Users")}}
        </h3>
    </div>
    <div class="mt-2">
    <ul  class="divide-y divide-gray-200 space-y-1 justify-center">
        @if (count($this->users) == 0)
            <div class="container mx-auto max-w-6xl ">
                <svg  class="h-20 w-20 mx-auto text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <div class="text-center text-1xl text-gray-400 ">
                    <h1>{{__('No Users')}}</h1>
                </div>
            </div>
        @endif
        @foreach($this->users as $user)
            <li class="w-full p-2 justify-start text-left">
                <button wire:click="editUser({{$user->id}})" type="button" class="w-full flex justify-start divide-x space-x-2 divide-gray-200 appearance-none focus:appearance-none focus:outline-none">
                <img class="h-10 w-10 rounded-full" src="{{$user->profileImg}}" alt="" >
                <div class="px-2 text-left truncate">
                    <p class="te text-sm font-medium text-gray-900">{{$user->name}}</p>
                    <p class="text-sm text-gray-500">{{$user->email}}</p>
                </div>
                </button>
            </li>
        @endforeach
    </ul>
    </div>
</div>

