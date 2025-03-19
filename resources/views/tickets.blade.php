<x-layout>

    @if(session('redirect_code'))
        <script>
            window.location.href = "{{ route('code') }}";
        </script>
    @endif
    <div class="flex md:justify-start justify-center m-8 font-bold md:text-3xl text-2xl text-white md:ml-36">
        <p>Biletlerim</p>
    </div>

    <livewire:ticket/>

</x-layout>
