
<div class="relative flex-1 px-4 sm:px-6 ">
    <div class="mt-3 text-center sm:mt-5">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Clientes
        </h3>
    </div>
    <div class="mt-2">
    @foreach($this->users as $user)
        <ul wire:click="editUser({{$user->id}})" class="divide-y divide-gray-200">
            <li class="py-4 flex">
                <img class="h-10 w-10 rounded-full" src="{{$user->profileImg}}" alt="">
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">#{{$user->id}}</p>
                    <p class="text-sm font-medium text-gray-900">{{$user->name}}</p>
                    <p class="text-sm text-gray-500">{{$user->email}}</p>
                </div>
            </li>
        </ul>
    @endforeach
    </div>
</div>

