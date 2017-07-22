<div class="lang">
    <input type="checkbox" class="lang__toggle" id="lang__toggle">
    <ul>
        @foreach ($languages as $key => $language)
        <li class="{{ $key == $locale ? 'active' : '' }}">
            <a href="/{{ $key }}/">{{ $key }}</a>
        </li>
        @endforeach
    </ul>
    <label for="lang__toggle"></label>
</div>
