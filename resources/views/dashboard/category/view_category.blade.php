<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->

        <div class="card mt-2 mb-4  w-95" style="margin-left: 24px;">
            <div class="card-header bg-primary mb-3">
                <h4 class="-mb-2 text-white">Category Page</h4>
            </div>
            <div class="card-body container-fluid py-0 px-4 mt-3">
                <table class="table table-bordered ">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Descriptipn</th>
                            <th scope="col">Status</th>
                            <th scope="col">Popular</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item )
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->slug }}</td>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->status }}</td>
                    <td>{{ $item->popular }}</td>
                    <td>
                        <img src="{{ asset('assets/uploads/category/'. $item->image) }}" alt="Image here" class="cate-image" style="width: 75px">
                    </td>
                    <td>
                       <a href="{{ url('viewCategoryEdit/'. $item->id) }}" class="btn  btn-info">Edit</a>
                       <a href="{{ url('deleteCategory/'. $item->id) }}" class="btn  btn-danger">Delete</a>

                    </td>
                </tr>
                @endforeach

                    </tbody>
                </table>
            </div>
        </div>
</x-layout>
