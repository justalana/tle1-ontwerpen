<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('http://127.0.0.1:8000')">
Open Hiring
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
Footer
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
