<x-app>
    <x-slot name="title">Add User</x-slot>
    <x-slot name="main">
            <livewire:user.user-form :user="isset($user) ? $user : null"></livewire:user.user-form>
    </x-slot>


</x-app>