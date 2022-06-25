@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> <i class="fas fa-ticket-alt"></i> Add Schedule</h1>
</div>
<div class="card shadow mb-4">
    <div class="col-lg-10">
        <div class="card-body">
            <form class="p-3" action="{{url('/dashboard/addSchedule')}}" method="POST" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="name" class="form-label">Schedule Title</label>
                    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" autofocus>
                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <label for="vip" class="block text-sm font-medium text-gray-700 mb-2">VIP</label>
                <select id="inlineFormCustomSelect" name="vip" autocomplete="vip" class="form-select form-select-md ">
                    <hr>
                    <option value="0">NO</option>
                    <option value="1">YES</option>
                </select><br>

                <label for="price" class="form-label">Price</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                    <input id="price" name="price" type="text" autocomplete="price" class="form-control @error('price') is-invalid @enderror" rows="3" value="{{ old('price') }}">
                    @error('price')<div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input id="description" type="hidden" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                    <trix-editor input="description"></trix-editor>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-group my-3">
                    <label for="image">Schedule Image</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                    @error('image') <div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="form-floating my-3">
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" placeholder="Date" name="date" value="{{ old('date') }}">
                    <label for="date">Schedule Date</label>
                    @error('date')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <input type="time" class="form-control @error('starttime') is-invalid @enderror" id="starttime" placeholder="starttime" name="starttime" value="{{ old('starttime') }}">
                    <label for="starttime">Start Time</label>
                    @error('starttime')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating my-3">
                    <input type="time" class="form-control @error('endtime') is-invalid @enderror" id="endtime" placeholder="endtime" name="endtime" value="{{ old('endtime') }}">
                    <label for="endtime">End Time</label>
                    @error('endtime')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <button class="btn btn-primary" type="submit" name="add">Add</button>
            </form>
        </div>
    </div>
</div>


<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>
@endsection