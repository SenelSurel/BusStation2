<div class="shadow-lg grid grid-cols-1 lg:flex lg:justify-self-center items-center text-center gap-2 py-4 lg:flex lg:flex-col bg-gray-600 lg:min-w-[550px] rounded-lg lg:mb-8 lg:p-12">
<div class="text-gray-300 font-semibold text-md border-solid border-b-2 mb-4 w-full lg:flex lg:justify-start">
        <p class="text-bold text-xl">BusStation</p>
    </div>
    <form class="min-w-full border-solid border-2 lg:flex lg:flex-col p-4 rounded-lg border-gray-300 min-h-full space-y-8 items-center" wire:submit.prevent="login">
        @csrf
        <input class="bg-white rounded-lg p-[0.3rem] w-3/4" type="email" wire:model.defer="email" placeholder="E-posta">
        <input class="bg-white rounded-lg p-[0.3rem] w-3/4" type="password" wire:model.defer="password" placeholder="Şifre">
        <button class="bg-yellow-500 hover:bg-yellow-600 py-2 px-4 rounded-full text-gray-100" type="submit">Giriş Yap</button>
        <div class="">
            <p class="text-white">Hesabın yok mu? <a class="text-blue-500 hover:text-blue-300" href="{{route('register-page')}}">Kayıt Ol</a></p>
        </div>
    </form>
</div>
