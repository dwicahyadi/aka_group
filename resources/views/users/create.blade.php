@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Tambah User</h2>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-style mb-30">
        <h6 class="mb-25">Form</h6>
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="input-style-1">
                    <label for="name">Nama</label>
                    <input type="text" @error('name') class="form-control is-invalid" @enderror name="name"
                                                     id="name" value="{{ old('name') }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                </div>

                <div class="input-style-1">
                    <label for="email">Email</label>
                    <input type="email" @error('email') class="form-control is-invalid" @enderror name="email"
                           id="email" value="{{ old('email') }}" required>
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="select-style-1">
                    <label for="role">Role Sistem</label>
                    <div class="select-position">
                        <select type="text" @error('role') class="form-control is-invalid" @enderror name="role"
                                id="role" value="{{ old('role') }}" required>
                            <option value="operator">Operator</option>
                            <option value="admin">admin</option>
                        </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    </div>
                    @enderror
                </div>

                <div class="input-style-1">
                    <label for="name">Password</label>
                    <input type="text" @error('password') class="form-control is-invalid" @enderror name="password"
                           id="password" value="{{ old('password') }}" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                </div>

                <div class="col-12">
                    <div class="
                            button-group
                            d-flex
                            justify-content-center
                            flex-wrap
                          ">
                        <button class="main-btn primary-btn btn-hover m-2">
                            Save
                        </button>
                        <a href="{{ route('driver.index') }}" class="main-btn danger-btn-outline m-2">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>
    </div>
@endsection
