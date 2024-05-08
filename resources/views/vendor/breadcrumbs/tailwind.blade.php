@unless ($breadcrumbs->isEmpty())
    <nav class="hidden md:flex px-2 breadcrumbs flex-1">
        <ol class="font-bold sm:text-sm text-primary">
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url)
                    <li>
                        <a href="{{ $breadcrumb->url }}">
                            {{ $breadcrumb->title }}
                        </a>
                    </li>
                @else
                    <li>
                        {{ $breadcrumb->title }}
                    </li>
                @endif

            @endforeach
        </ol>
    </nav>
@endunless
