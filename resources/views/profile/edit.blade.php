<x-app-layout>

<div class="min-h-screen bg-purple-50 py-8">

    <div class="max-w-2xl mx-auto">

        {{-- EDIT PROFIL --}}
        <div class="bg-white rounded-3xl shadow-lg p-8 border border-purple-100">

            <h2 class="text-3xl font-bold text-purple-700 mb-6">
                Edit Profil
            </h2>

            @include('profile.partials.update-profile-information-form')

        </div>



        {{-- UBAH PASSWORD --}}
        <div class="bg-white rounded-3xl shadow-lg p-8 mt-8 border border-purple-100">

            <h2 class="text-3xl font-bold text-purple-700 mb-6">
                Ubah Password
            </h2>

            @include('profile.partials.update-password-form')

        </div>



        {{-- LOGOUT & HAPUS AKUN --}}
        <div class="bg-white rounded-3xl shadow-lg p-8 mt-8 border border-purple-100">

            <div class="grid grid-cols-2 gap-5">

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                >
                    @csrf

                    <button
                        type="submit"
                        class="w-full py-3 rounded-xl bg-purple-300 hover:bg-purple-400 text-white font-semibold transition"
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