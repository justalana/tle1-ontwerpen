<x-site-layout>
    <form action="{{ route('mails.store') }}" method="post">
        @csrf
        <button type="submit" class="button-primary">Send Email</button>
    </form>
</x-site-layout>
