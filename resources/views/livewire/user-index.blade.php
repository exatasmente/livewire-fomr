
<div class="relative flex-1">
    <div class="mt-3 text-center sm:mt-5">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{__("Users")}}
        </h3>
    </div>
    <div class="mt-2">
    <ul  class="divide-y divide-gray-200 space-y-1 justify-center">
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

