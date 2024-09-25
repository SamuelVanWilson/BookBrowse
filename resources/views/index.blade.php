<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <main class="container">
      <article>
          <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
              <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Title of a longer featured blog post</h1>
                <p class="lead my-3">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
              </div>
            </div>
          
            <div class="row mb-2">
              {{ $data->links() }}
              <div class="dropdown my-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/">All</a></li>
                    @foreach ($category as $item)
                      <li><a class="dropdown-item" href="/?category={{ $item->nama }}">{{ $item->nama }}</a></li>
                    @endforeach
                </ul>
              </div>
              @forelse ($data as $book)
                <div class="col-md-6">
                  <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                      <strong class="d-inline-block mb-2 text-primary">{{ $book->category->nama }}</strong>
                      <h3 class="mb-1">{{ $book['judul'] }}</h3>
                      <h5 class="fs-6">{{ $book->pencipta->nama }}</h5>
                      <div class="mb-1 text-muted">{{ $book['created_at']->diffForHumans() }}</div>
                      <p class="card-text mb-auto fs-6">{{ Str::limit($book['sinopsis'], 100) }}</p>
                      <a href="{{ route('preview', $book['judul']) }}" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                      @if (!empty($book['cover']))
                        <img src="{{ asset('storage/cover/' . $book['cover']) }}" alt="" width="200" height="250" style="object-fit: cover">
                      @else
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Cover</text></svg>
                      @endif
                    </div>
                  </div>
                </div>
              @empty
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Buku Kosong</strong> Mungkin Buku Yang Kamu Cari Tidak Ada
                </div>
              @endforelse
              {{ $data->links() }}
            </div>
          
      </article>
  </main>
</x-layout>