<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <form class="form-signin w-50 m-auto " action="{{ route('auth.register-proses') }}" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-normal">Admin Verifikasi</h1>
    
        <div class="form-floating mb-2">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" value="{{ old('name') }}" placeholder="Nama Kamu">
          <label for="floatingInput">Username</label>
          @error('name')
            <div class="invalid-feedback">
              <p class="text-danger">{{ $message }}</p>
            </div>
          @enderror
        </div>
        <div class="form-floating mb-2">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" value="{{ old('email') }}" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
          @error('email')
            <div class="invalid-feedback">
              <p class="text-danger">{{ $message }}</p>
            </div>
          @enderror
        </div>
        <div class="form-floating mb-2">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
          @error('password')
            <div class="invalid-feedback">
              <p class="text-danger">{{ $message }}</p>
            </div>
          @enderror
        </div>
        <div class="form-floating">
          <input type="password" name="password_confirmation" class="form-control" id="floatingConfirm" placeholder="Password">
          <label for="floatingConfirm">Confirm Password</label>
        </div>
    
        <div class="form-check text-start my-3">
          <a href="{{ route('auth.login') }}">Masuk Sebagai Admin</a>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Daftar</button>
        <p class="mt-5 mb-3 text-body-secondary">© 2017–2024</p>
      </form>
</x-layout>