<x-app>
    <x-slot name="title">Add User</x-slot>
    <x-slot name="main">
            <livewire:user.user-form :user="isset($user) ? $user : null"></livewire:user.user-form>
    </x-slot>
    <x-slot name="right">
        <livewire:user.user-index></livewire:user.user-index>
    </x-slot>

</x-app>