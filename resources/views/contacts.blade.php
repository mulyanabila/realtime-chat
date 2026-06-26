<x-app-layout>

<div class="min-h-screen bg-pink-50">

    <div class="max-w-5xl mx-auto py-10">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-10">

            <h1 class="text-5xl font-light text-pink-600">
                Kontak Anda
            </h1>

            <div class="flex gap-4">

                <a
                    href="/dashboard"
                    class="border border-pink-500 text-pink-600 px-6 py-3 rounded-2xl"
                >
                    ← Menu
                </a>

                <button
                    onclick="document.getElementById('modal').classList.remove('hidden')"
                    class="bg-gradient-to-r from-pink-600 to-purple-600 text-white px-8 py-3 rounded-2xl"
                >
                    + Tambah Kontak
                </button>

            </div>

        </div>



        {{-- LIST KONTAK --}}
        @foreach($contacts as $item)

            <div
                class="bg-white rounded-3xl p-6 mb-6 shadow flex gap-6 items-center"
            >

                <div
                    class="w-20 h-20 rounded-full bg-gradient-to-r from-pink-500 to-purple-600 text-white text-4xl flex items-center justify-center"
                >
                    {{ strtoupper(substr($item->contact->name,0,1)) }}
                </div>

                <div>

                    <div class="text-3xl font-bold">
                        {{ $item->name }}
                    </div>

                    <div class="text-gray-500">
                        {{ $item->contact->phone }}
                    </div>

                    <div class="text-gray-600 mt-2">
                        🟢 Terdaftar
                    </div>

                </div>

            </div>

        @endforeach

    </div>



    {{-- MODAL TAMBAH KONTAK --}}
    <div
        id="modal"
        class="hidden fixed inset-0 bg-black/50 flex justify-center items-center"
    >

        <form
            method="POST"
            action="/contacts/add"
            class="bg-white p-8 rounded-3xl w-[500px]"
        >

            @csrf

            <h2 class="text-4xl mb-8">
                Tambah Kontak
            </h2>


            {{-- Nama --}}
            <input
                type="text"
                name="name"
                placeholder="Nama Kontak"
                class="w-full border rounded-xl p-4 mb-5"
                required
            >


            {{-- Nomor HP --}}
            <input
                type="text"
                name="phone"
                placeholder="Nomor HP"
                class="w-full border rounded-xl p-4"
                required
            >


            {{-- Tombol --}}
            <div class="flex gap-4 mt-8">

                {{-- Menu / Batal --}}
                <button
                    type="button"
                    onclick="document.getElementById('modal').classList.add('hidden')"
                    class="flex-1 bg-gray-300 hover:bg-gray-400 text-black py-4 rounded-xl font-semibold"
                >
                    Menu
                </button>


                {{-- Simpan --}}
                <button
                    type="submit"
                    class="flex-1 bg-gradient-to-r from-pink-600 to-purple-600 text-white py-4 rounded-xl font-semibold"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>