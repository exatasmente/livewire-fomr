<x-app>
    <x-slot name="title">Add User</x-slot>
    <div class="container max-w-7xl mx-auto sm:px-6 py-4 lg:px-8">
    <livewire:user-form :user="isset($user) ? $user : null"></livewire:user-form>
    </div>
</x-app>