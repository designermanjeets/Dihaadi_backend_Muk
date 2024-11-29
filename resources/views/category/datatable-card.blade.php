<a href="{{ route('category.detail', $data->id) }}" >
    <div class="card text-center bg-light circle-clip-effect rounded-3">
        <div class="card-body category-card">
            <div class="img-bg d-inline-block rounded-3">
            <img src="{{ getSingleMedia($data,'category_image', null) }}" alt="icon" class="img-fluid avatar-70">
            <!-- <img id="category_image_preview" src="{{getSingleMedia($data,'category_image')}}" alt="icon" class="img-fluid avatar-70"> -->
        </div>
        <h5 class="categories-name text-capitalize mt-4 mb-2 line-count-1">{{ $data->name }}</h5>
        <p class="categories-desc mb-0 text-capitalize line-count-2">{{ $data->description }}</p>
    </div>
</div>
</a>
