<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form class="w-75 m-auto" method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
        @csrf
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <a href="{{ route('admin.index') }}" class="btn btn-danger btn-sm my-3">Batal Tambah</a>
        <div class="row mb-4">
          <div class="col">
            <div data-mdb-input-init class="form-floating">
              <input type="text" name="judul" id="form6Example1" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul') }}"/>
              <label class="form-label" for="form6Example1">Judul Buku</label>
              @error('judul')
                <div class="invalid-feedback">
                  <p class="text-danger">{{ $message }}</p>
                </div>
              @enderror
            </div>
          </div>
          <div class="col">
            <div data-mdb-input-init class="form-floating">
              <input type="text" name="penulis" id="form6Example2" class="form-control @error('penulis') is-invalid @enderror" value="{{ old('penulis') }}"/>
              <label class="form-label" for="form6Example2">Penulis</label>
              @error('penulis')
                <div class="invalid-feedback">
                  <p class="text-danger">{{ $message }}</p>
                </div>
              @enderror
            </div>
          </div>
        </div>
      
        <!-- Text input -->
        <div data-mdb-input-init class="form-floating mb-4">
          <input type="text" name="nama-penerbit" id="form6Example3" class="form-control @error('nama-penerbit') is-invalid @enderror" value="{{ old('nama-penerbit') }}"/>
          <label class="form-label" for="form6Example3">Nama Penerbit</label>
          @error('nama-penerbit')
            <div class="invalid-feedback">
              <p class="text-danger">{{ $message }}</p>
            </div>
          @enderror
        </div>
      
        <!-- Text input -->
        <div data-mdb-input-init class="form-floating mb-4">
          <input type="number" name="tahun-terbit" id="form6Example4" class="form-control @error('tahun-terbit') is-invalid @enderror" value="{{ old('tahun-terbit') }}"/>
          <label class="form-label" for="form6Example4">Tahun Terbit</label>
          @error('tahun-terbit')
            <div class="invalid-feedback">
              <p class="text-danger">{{ $message }}</p>
            </div>
          @enderror
        </div>

        <!-- File input -->
        <div data-mdb-input-init class="form-floating mb-4">
          <input type="file" name="cover" id="form6Example5" class="form-control @error('cover') is-invalid @enderror"/>
          <label class="form-label" for="form6Example5">Cover</label>
          @error('cover')
            <div class="invalid-feedback">
              <p class="text-danger">{{ $message }}</p>
            </div>
          @enderror
        </div>
      
        <!-- Message input -->
        <div data-mdb-input-init class="form-floating mb-4">
          <textarea class="form-control h-25 @error('sinopsis') is-invalid @enderror" name="sinopsis" id="form6Example7" rows="4">{{ old('sinopsis') }}</textarea>
          <label class="form-label" for="form6Example7">Sinopsis</label>
          @error('sinopsis')
            <div class="invalid-feedback">
              <p class="text-danger">{{ $message }}</p>
            </div>
          @enderror
        </div>
      
        <!-- Checkbox -->
          <div data-mdb-input-init class="form-floating mb-4">
            <select class="form-select @error('category') is-invalid @enderror" name="category" id="form6Example6" aria-label="Default select example">
                @foreach ($category as $item)
                    <option value="{{ $item->nama }}" {{ old('category') == $item->nama ? 'selected' : '' }}>{{ $item->nama }}</option>
                @endforeach
            </select>
            <label class="form-label" for="form6Example6">Category</label>
            @error('category')
              <div class="invalid-feedback">
                <p class="text-danger">{{ $message }}</p>
              </div>
            @enderror
          </div>
      
        <!-- Submit button -->
        <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Tambah Buku</button>
      </form>
</x-layout>