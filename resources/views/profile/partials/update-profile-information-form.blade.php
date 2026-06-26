<section>

    <header class="mb-6">

        <p class="text-gray-500 mt-1">
            Perbarui informasi akun Anda.
        </p>

    </header>

    <form
        id="send-verification"
        method="POST"
        action="{{ route('verification.send') }}"
    >
        @csrf
    </form>


    <form
        method="POST"
        action="{{ route('profile.update') }}"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf
        @method('PATCH')


        {{-- FOTO PROFIL --}}
        <div>

            <x-input-label
                for="photo"
                :value="__('Foto Profil')"
            />

            <div class="mt-3 mb-4">

                @if($user->photo)

                    <img
                        src="{{ asset('storage/'.$user->photo) }}"
                        class="w-28 h-28 rounded-full object-cover border"
                    >

                @else

                    <div
                        class="w-28 h-28 rounded-full bg-green-500 flex items-center justify-center text-white text-4xl font-bold"
                    >
                        {{ strtoupper(substr($user->name,0,1)) }}
                    </div>

                @endif

            </div>

            <input
                type="file"
                name="photo"
                id="photo"
                class="block w-full border rounded-xl p-3"
            >

            <x-input-error
                class="mt-2"
                :messages="$errors->get('photo')"
            />

        </div>



        {{-- NAMA --}}
        <div>

            <x-input-label
                for="name"
                :value="__('Nama')"
            />

            <x-text-input
                id="name"
                name="name"
                type="text"
                class="mt-2 block w-full"
                :value="old('name',$user->name)"
                required
                autofocus
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('name')"
            />

        </div>



        {{-- TENTANG --}}
        <div>

            <x-input-label
                for="status"
                :value="__('Tentang')"
            />

            <x-text-input
                id="status"
                name="status"
                type="text"
                class="mt-2 block w-full"
                :value="old('status',$user->status)"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('status')"
            />

        </div>



        {{-- TELEPON --}}
        <div>

            <x-input-label
                for="phone"
                :value="__('Telepon')"
            />

            <x-text-input
                id="phone"
                name="phone"
                type="text"
                class="mt-2 block w-full"
                :value="old('phone',$user->phone)"
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('phone')"
            />

        </div>



        {{-- EMAIL --}}
        <div>

            <x-input-label
                for="email"
                :value="__('Email')"
            />

            <x-text-input
                id="email"
                name="email"
                type="email"
                class="mt-2 block w-full"
                :value="old('email',$user->email)"
                required
            />

            <x-input-error
                class="mt-2"
                :messages="$errors->get('email')"
            />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())

                <div class="mt-3">

                    <p class="text-sm text-gray-600">

                        Email belum diverifikasi.

                        <button
                            form="send-verification"
                            class="text-pink-500 underline"
                        >
                            Kirim ulang verifikasi
                        </button>

                    </p>

                </div>

            @endif

        </div>



        {{-- TOMBOL SIMPAN --}}
        <div>

            <button
                type="submit"
                class="
                w-full
                py-3
                rounded-xl
                text-white
                font-semibold
                bg-gradient-to-r
                from-pink-500
                to-purple-600
                hover:opacity-90
                "
            >

                Simpan Profil

            </button>

        </div>



        @if(session('status')=='profile-updated')

            <p class="text-green-600 text-center">

                Profil berhasil diperbarui.

            </p>

        @endif

    </form>

</section>