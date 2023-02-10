<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="card  mt-2 mb-4  w-95" style="margin-left: 24px;">
            <div class="card-header ">
                <h4 class="-mb-2">Add Product</h4>
            </div>
                <div class="card-body container-fluid py-0 px-4 ">
                    <form action="{{ url('/insert_product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="row ">
                            <div class="col-md-12 mb-3 ">
                                <select class="form-select" name="category_id">
                                    <option value="select">Select a category</option>
                                    @foreach ($category as $item)
                                    <option value="{{$item->id }}">{{ $item->name }}</option>
                                    @endforeach

                                  </select>
                            </div>
                            <div class="col-md-6 mb-3 ">
                                <label for="name">Name</label>
                                <input type="text" class="form-control border border-gray-200 rounded p-2 w-full" name="name" :value="old('name')">
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control border border-gray-200 rounded p-2 w-full" name="slug" :value="old('slug')">
                            </div>
                            <div class="col-md-12  mb-3">
                                <label for="small_description">Small Description </label>
                                <textarea  class="form-control border border-gray-200 rounded p-2 w-full" name="small_description" rows="3" :value="old('small_description')"></textarea>
                            </div>
                            <div class="col-md-12  mb-3">
                                <label for="description"> Description </label>
                                <textarea  class="form-control border border-gray-200 rounded p-2 w-full" name="description" rows="3" :value="old('description')"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="original_price">Original Price</label>
                                <input type="number" class="form-control border border-gray-200 rounded p-2 w-full" name="original_price" :value="old('original_price')">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="selling_price">Selling Price</label>
                                <input type="number" class="form-control border border-gray-200 rounded p-2 w-full" name="selling_price" :value="old('selling_price')">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tac">Tax</label>
                                <input type="number" class="form-control border border-gray-200 rounded p-2 w-full" name="tax" :value="old('tax')">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="qty">Quantity</label>
                                <input type="number" class="form-control border border-gray-200 rounded p-2 w-full" name="qty" :value="old('qty')">
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" :value="old('status')">
                            </div>
                            <div class="col-md-6  mb-3">
                                <label for="trending">Trending</label>
                                <input type="checkbox" name="trending" :value="old('trending')">
                            </div>
                            <div class="col-md-12  mb-3">
                                <label for="image">Upload Image</label>
                                <input type="file"  class="form-control border border-gray-200 rounded p-2 w-full" name="image" :value="old('image')">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

</x-layout>
