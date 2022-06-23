@extends('layouts.app')

@section('container')

<br><br><br>
<div class="section-title mt-5">
    <h2>Join Vendor</h2>
</div>
<div class="section-title">
    <h5>Store's Profil</h5>
</div>
<div class="joinvendor" style="color:white">
    <div class="row row justify-content-center">
        <div class="col-lg-6">
            <form action="/vendors" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input id="address" name="address" type="text" class="form-control @error('address') is-invalid @enderror"  value="{{ old('address') }}" autofocus>
                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="sosmed" class="form-label">Link Sosmed</label>
                    <input id="sosmed" name="sosmed" type="text" autocomplete="sosmed" class="form-control @error('sosmed') is-invalid @enderror" value="{{ old('sosmed') }}">
                    @error('sosmed') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="mb-3">
                    <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Booth Type</label>
                    <select id="type" name="type_id" autocomplete="type-name" class="form-select form-select-sm ">
                        @foreach($types as $type)
                        @if( old('type_id') == $type->id)
                            <option selected value="{{ $type->id }}">{{ $type->name }}</option>
                            @else
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="picture" class="form-label">Picture</label>
                    <img class="img-preview img-fluid">
                    <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" alt="">
                    <input id="picture" name="picture" type="file" class="form-control @error('picture') is-invalid @enderror" onchange="previewImage();">
                    @error('picture')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                
                <button type="submit" class="btn btn-primary mb-5">Upload Media</button>
        
            </form>
        </div>
    </div>
</div>

<script>

    function previewImage(){
        const picture = document.querySelector('#picture');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(picture.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection