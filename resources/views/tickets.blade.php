<x-layout>

    @if(session('redirect_code'))
        <script>
            window.location.href = "{{ route('code') }}";
        </script>
    @endif
    <div class="flex justify-start m-8 font-semibold text-xl text-gray-500 border-b-2 border-solid ">
        <p>Biletlerim</p>
    </div>

    <livewire:ticket/>

</x-layout>
