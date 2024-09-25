<x-layout>
  <x-slot:title>{{ $title }}</x-slot:title>
  <div class="card mb-3 mx-4">
      <div class="col-auto d-none d-lg-block">
        @if (!empty($book['cover']))
          <img src="{{ asset('storage/cover' . $book['cover']) }}" alt="">
        @else
          <svg class="bd-placeholder-img" width="100%" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Cover" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Cover</text></svg>
        @endif
      </div>
      <div class="card-body">
        <h3 class="card-title">{{ $data['judul'] }}</h2>
        <p><a href="">{{ $data['pencipta']->nama }}</a> - <a href="/?category={{ $data['category']->nama }}">{{ $data['category']->nama }}</a></p>
        <p class="card-text">{{ $data['sinopsis'] }}</p>
        <p class="card-text"><small class="text-body-secondary">{{ $data['created_at']->diffForHumans() }}</small></p>
      </div>
      <a href="/" class="mx-3 my-2">Kembali Ke Home</a>
  </div>
</x-layout>