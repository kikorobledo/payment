<x-app-layout>

    <div class="max-w-5xl mx-auto px-4 lg:px-8 py-12">

        @foreach ($articles as $article)

            <article class="card mb-2">

                <img src="{{ $article->image}}" class="h-72 w-full object-cover object-center" alt="">

                <div class="card-body ">

                    <h1 class="font-bold text-xl mb-2">
                        <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                    </h1>

                    <div class="text-gray-700">{{ $article->extract }}</div>

                </div>

            </article>

        @endforeach

        <div>

            {{ $articles->links() }}

        </div>

    </div>

</x-app-layout>
