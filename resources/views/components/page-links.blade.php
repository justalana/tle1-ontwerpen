@props(['items'])

<div id="pageLinksContainer">

    <div id="previousLinkContainer">
        <a href="{{ $items->previousPageUrl() }}" class="{{ $items->onFirstPage() ? 'disabled' : '' }} button-pink"><< Vorige pagina</a>
    </div>

    <div id="numberedLinkContainer">

        @foreach($items->getUrlRange(1, $items->lastPage()) as $pageNumber => $pageUrl)
            <a href="{{ $pageUrl }}" class="{{ ($pageNumber === $items->currentPage()) ? 'selected' : '' }}">{{ $pageNumber }}</a>
        @endforeach

    </div>

    <div id="nextLinkContainer">
        <a href="{{ $items->nextPageUrl() }}" class="{{ ($items->currentPage() === $items->lastPage()) ? 'disabled' : '' }} button-pink">Volgende pagina >></a>
    </div>

</div>
