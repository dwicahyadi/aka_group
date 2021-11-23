@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center  mb-30">
            <div class="col-md-6">
                <div class="title d-flex align-items-center flex-wrap mb-30">
                    <h2 class="mr-40">Edit Pengemudi</h2>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-style mb-30">
        <h6 class="mb-25">Form</h6>
        <form action="{{ route('tax_officer.update', $tax_officer) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $tax_officer->id }}">
            <div class="row">
                <div class="input-style-1">
                    <label for="name">Name</label>
                    <input type="text" @error('name') class="form-control is-invalid" @enderror name="name"
                                                     id="name" value="{{ old('name') ?? $tax_officer->name  }}" required>
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror

                </div>

                <div class="input-style-1">
                    <label for="phone">Nomor Telepon</label>
                    <input type="text" @error('phone') class="form-control is-invalid" @enderror name="phone"
                           id="phone" value="{{ old('phone') ?? $tax_officer->phone  }}" required>
                    @error('phone')
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
                        <a href="{{ route('tax_officer.index') }}" class="main-btn danger-btn-outline m-2">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </form>
    </div>
@endsection
