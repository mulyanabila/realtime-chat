<section class="w-full">

    {{-- TOMBOL HAPUS AKUN --}}
    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="
        w-full
        py-3
        rounded-xl
        bg-gradient-to-r
        from-red-500
        to-pink-600
        hover:opacity-90
        text-white
        font-semibold
        shadow-lg
        transition
        "
    >
        Hapus Akun
    </button>


    {{-- MODAL --}}
    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >

        <form
            method="POST"
            action="{{ route('profile.destroy') }}"
            class="p-8"
        >

            @csrf
            @method('DELETE')

            <h2 class="text-2xl font-bold text-red-600 mb-3">

                Hapus Akun

            </h2>

            <p class="text-gray-600 mb-6">

                Apakah Anda yakin ingin menghapus akun ini?

                <br><br>

                Semua data, kontak, dan pesan akan dihapus secara permanen.

                Masukkan password untuk melanjutkan.

            </p>


            {{-- PASSWORD --}}
            <x-input-label
                for="password"
                :value="__('Password')"
                class="text-purple-700 font-semibold"
            />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="
                mt-2
                block
                w-full
                rounded-xl
                border-purple-300
                focus:border-purple-500
                focus:ring-purple-500
                "
                placeholder="Masukkan Password"
            />

            <x-input-error
                :messages="$errors->userDeletion->get('password')"
                class="mt-2"
            />


            {{-- BUTTON --}}
            <div class="flex justify-end gap-4 mt-8">

                <button
                    type="button"
                    x-on:click="$dispatch('close')"
                    class="
                    px-6
                    py-3
                    rounded-xl
                    bg-gray-200
                    hover:bg-gray-300
                    transition
                    "
                >
                    Batal
                </button>


                <button
                    type="submit"
                    class="
                    px-6
                    py-3
                    rounded-xl
                    bg-gradient-to-r
                    from-red-500
                    to-pink-600
                    hover:opacity-90
                    text-white
                    font-semibold
                    transition
                    "
                >
                    Hapus Akun
                </button>

            </div>

        </form>

    </x-modal>

</section>