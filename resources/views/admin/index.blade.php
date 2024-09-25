<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <article class="w-75 m-auto">
        <div class="d-flex align-items-center">
            <a href="{{ route('admin.create') }}" class="btn btn-success my-3">Tambah Data</a>
            <div class="dropdown mx-2">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Category
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="/">All</a></li>
                    @foreach ($category as $item)
                        <li><a class="dropdown-item" href="admin?category={{ $item->nama }}">{{ $item->nama }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        {{ $data->links() }}
        <div class="row row-cols-1 row-cols-md-3 g-4 my-3">
            @forelse ($data as $book)
                <div class="col">
                    <div class="card h-100">
                    @if (!empty($book['cover']))
                        <img src="{{ asset('storage/cover/' . $book['cover']) }}" alt="" width="100%" height="180" style="object-fit: cover">
                    @else
                        <svg class="bd-placeholder-img" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Cover" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Cover</text></svg>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $book['judul'] }}</h5>
                        <p><a href="admin?category={{ $book['category']->nama }}">{{ $book['category']->nama }}</a> - <a href="admin?caegory={{ $book['pencipta']->nama }}">{{ $book['pencipta']->nama }}</a></p>
                        <p class="card-text">{{ Str::limit($book['sinopsis'], 80) }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.edit', $book['judul']) }}" class="btn btn-sm btn-primary">Edit</a>
                            <form action="{{ route('admin.destroy', $book['judul']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Updated at {{ $book['created_at']->diffForHumans() }}</small>
                    </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Buku Kosong</strong> Mungkin Buku Yang Kamu Cari Tidak Ada
                </div>
            @endforelse
        </div>
        {{ $data->links() }}
    </article>
</x-layout>