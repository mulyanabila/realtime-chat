<section class="w-full">

    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="w-full py-3 rounded-xl bg-pink-500 hover:bg-pink-600 text-white font-semibold"
    >
        Hapus Akun
    </button>

    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable
    >

        <form
            method="POST"
            action="{{ route('profile.destroy') }}"
            class="p-6"
        >
            @csrf
            @method('DELETE')

            <h2 class="text-xl font-bold mb-2">
                Hapus Akun
            </h2>

            <p class="text-gray-600 mb-5">
                Masukkan password untuk menghapus akun secara permanen.
            </p>

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="w-full"
                placeholder="Password"
            />

            <x-input-error
                :messages="$errors->userDeletion->get('password')"
                class="mt-2"
            />

            <div class="flex justify-end gap-3 mt-6">

                <x-secondary-button
                    x-on:click="$dispatch('close')"
                >
                    Batal
                </x-secondary-button>

                <x-danger-button>
                    Hapus Akun
                </x-danger-button>

            </div>

        </form>

    </x-modal>

</section>