<x-app-layout>

<div class="min-h-screen bg-violet-50">

    <div class="max-w-5xl mx-auto py-10">

        {{-- HEADER --}}
        <div class="flex justify-between items-center mb-10">

            <h1 class="text-5xl font-light text-fuchsia-700">
                Kontak Anda
            </h1>

            <div class="flex gap-4">

                <a
                    href="/dashboard"
                    class="border border-fuchsia-500 text-fuchsia-600 hover:bg-fuchsia-500 hover:text-white transition px-6 py-3 rounded-2xl"
                >
                    ← Menu
                </a>

                <button
                    onclick="document.getElementById('modal').classList.remove('hidden')"
                    class="bg-gradient-to-r from-fuchsia-500 to-violet-600 hover:from-fuchsia-600 hover:to-violet-700 text-white px-8 py-3 rounded-2xl shadow-lg transition"
                >
                    + Tambah Kontak
                </button>

            </div>

        </div>



        {{-- LIST KONTAK --}}
        @foreach($contacts as $item)

            <div
                class="bg-white border border-fuchsia-100 rounded-3xl p-6 mb-6 shadow-md hover:shadow-xl hover:scale-[1.02] transition flex gap-6 items-center"
            >

                {{-- FOTO --}}
                <div
                    class="w-20 h-20 rounded-full bg-gradient-to-r from-fuchsia-500 to-violet-600 text-white text-4xl flex items-center justify-center shadow"
                >
                    {{ strtoupper(substr($item->contact->name,0,1)) }}
                </div>


                {{-- DATA --}}
                <div>

                    <div class="text-3xl font-bold text-gray-800">
                        {{ $item->name }}
                    </div>

                    <div class="text-gray-500 text-lg">
                        {{ $item->contact->phone }}
                    </div>

                    <div class="text-fuchsia-600 mt-2 font-medium">
                        🟢 Terdaftar
                    </div>

                </div>

            </div>

        @endforeach

    </div>



    {{-- MODAL TAMBAH KONTAK --}}
    <div
        id="modal"
        class="hidden fixed inset-0 bg-black/50 flex justify-center items-center z-50"
    >

        <form
            method="POST"
            action="/contacts/add"
            class="bg-white border border-fuchsia-200 p-8 rounded-3xl w-[500px] shadow-2xl"
        >

            @csrf

            <h2 class="text-4xl text-fuchsia-700 font-semibold mb-8">
                Tambah Kontak
            </h2>


            {{-- Nama --}}
            <input
                type="text"
                name="name"
                placeholder="Nama Kontak"
                class="w-full border border-fuchsia-200 focus:border-fuchsia-500 focus:ring-fuchsia-500 rounded-xl p-4 mb-5"
                required
            >


            {{-- Nomor HP --}}
            <input
                type="text"
                name="phone"
                placeholder="Nomor HP"
                class="w-full border border-fuchsia-200 focus:border-fuchsia-500 focus:ring-fuchsia-500 rounded-xl p-4"
                required
            >


            {{-- Tombol --}}
            <div class="flex gap-4 mt-8">

                {{-- Batal --}}
                <button
                    type="button"
                    onclick="document.getElementById('modal').classList.add('hidden')"
                    class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 py-4 rounded-xl font-semibold transition"
                >
                    Batal
                </button>


                {{-- Simpan --}}
                <button
                    type="submit"
                    class="flex-1 bg-gradient-to-r from-fuchsia-500 to-violet-600 hover:from-fuchsia-600 hover:to-violet-700 text-white py-4 rounded-xl font-semibold shadow transition"
                >
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

</x-app-layout>