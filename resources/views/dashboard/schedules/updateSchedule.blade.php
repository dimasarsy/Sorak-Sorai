@extends('dashboard.layouts.app')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Schedule Update</h1>
</div>

<div class="card shadow mb-4">
    <div class="col-lg-10">
        <div class="card-body">
            <!-- <img src="{{ Storage::url("/image"."/".$schedule->image) }}" alt="Schedule Image" class="card-img-top p-1"> -->
            <form class="p-3" action="/dashboard/updateSchedule/{{ $schedule->id }}"
                method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')


                <div class="mb-3">
                    <label for="name" class="form-label">Schedule Name</label>
                    <input id="name" name="name" type="text" autocomplete="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $schedule->name) }}" autofocus>
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <label for="vip" class="block text-sm font-medium text-gray-700 mb-2">VIP</label>
                <select id="inlineFormCustomSelect" name="vip" autocomplete="vip" class="form-select form-select-md ">
                    @if(old('vip', $schedule->vip) == 1))    
                        <option selected value="{{ old('vip', $schedule->vip) }}">YES</option>
                        <option value="0">NO</option>
                    @elseif(old('vip', $schedule->vip) == 0))
                        <option selected value="{{ old('vip', $schedule->vip) }}">NO</option>
                        <option value="1">YES</option>
                    @endif
                </select><br>

                <label for="price" class="form-label">Price</label>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Rp. </span>
                    <input id="price" name="price" type="text" autocomplete="price" class="form-control @error('price') is-invalid @enderror" rows="3" value="{{ old('price', $schedule->price) }}">
                    @error('price')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input id="description" type="hidden" name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description', $schedule->description) }}">
                    <trix-editor input="description"></trix-editor>
                    @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>


                <label for="image" class="form-label">Schedule Image</label>
                <div class="mb-3">
                    <input type="hidden" name="old-image" value="{{ $schedule->image }}">
                    @if($schedule->image)
                    <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" src="{{ asset('storage/' . $schedule->image) }}" alt="">
                    @else
                    <img class="rounded-md border border-gray-200 hidden mb-3 overflow-hidden" id="img-preview" alt="">
                    @endif
                    <input id="image" name="image" type="file" class="form-control @error('image') is-invalid @enderror" onchange="previewImage();">
                    @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div><hr><h5>Date & Time</h5><br>

                <div class="form-floating my-3">
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                        placeholder="Date" name="date" value="{{ old('date', $schedule->date) }}">
                    <label for="date">Schedule Date</label>
                    @error('date')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating my-3">
                    <input type="time" class="form-control @error('starttime') is-invalid @enderror" id="starttime"
                        placeholder="starttime" name="starttime" value="{{ old('starttime', $schedule->starttime) }}">
                    <label for="starttime">Start Time</label>
                    @error('starttime')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="form-floating my-3">
                    <input type="time" class="form-control @error('endtime') is-invalid @enderror" id="endtime"
                        placeholder="endtime" name="endtime" value="{{ old('endtime', $schedule->endtime) }}">
                    <label for="endtime">End Time</label>
                    @error('endtime')
                    <div class="invalid-feedback mb-3">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit" name="update">Update</button>
            </form>
        </div>
    </div>
</div>

<script>

    function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>
@endsection
