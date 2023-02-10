<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="card  mt-2 mb-4  w-95" style="margin-left: 24px;">
            <div class="card-header ">
                <h4 class="-mb-2">Edit Category</h4>
            </div>
                <div class="card-body container-fluid py-0 px-4 ">
                    <form action="{{ url('update_category/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row ">
                            <div class="col-md-6 mb-3 ">
                                <label for="name">Name</label>
                                <input type="text" class="form-control border border-gray-200 rounded p-2 w-full" name="name" value="{{ $category->name }}">
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control border border-gray-200 rounded p-2 w-full" name="slug" value="{{ $category->slug }}">
                            </div>
                            <div class="col-md-12  mb-3">
                                <label for="description"> Description </label>
                                <textarea  class="form-control border border-gray-200 rounded p-2 w-full" name="description" rows="3">{{ $category->description }}</textarea>
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" {{ $category->status=="1" ? 'Checked': '' }}>
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="popular">Popular</label>
                                <input type="checkbox" name="popular" {{ $category->popular=="1" ? 'Checked': ''}}>
                            </div>
                            @if ($category->image)
                                <img src="{{ asset('assets/uploads/category/'.$category->image) }}" alt="Category Image">
                            @endif
                            <div class="col-md-12  mb-3">
                                <label for="image">Upload Image</label>
                                <input type="file" class="form-control border border-gray-200 rounded p-2 w-full" name="image">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</x-layout>
