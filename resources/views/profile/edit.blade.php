<x-app-layout>

<div class="max-w-2xl mx-auto py-8">

    {{-- EDIT PROFIL --}}
    <div class="bg-white rounded-2xl shadow p-8">

        <h2 class="text-2xl font-bold mb-6">
            Edit Profil
        </h2>

        @include('profile.partials.update-profile-information-form')

    </div>



    {{-- UBAH PASSWORD --}}
    <div class="bg-white rounded-2xl shadow p-8 mt-8">

        <h2 class="text-2xl font-bold mb-6">
            Ubah Password
        </h2>

        @include('profile.partials.update-password-form')

    </div>



    {{-- LOGOUT & HAPUS AKUN --}}
    <div class="bg-white rounded-2xl shadow p-8 mt-8">

    <div class="grid grid-cols-2 gap-5">

        <form
            method="POST"
            action="{{ route('logout') }}"
        >
            @csrf

            <button
                type="submit"
                class="w-full py-3 rounded-xl bg-gray-300 hover:bg-gray-400"
            >
                Logout
            </button>

        </form>

        @include('profile.partials.delete-user-form')

    </div>

</div>

    </div>

</div>

</x-app-layout>