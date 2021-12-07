@section('title', 'Posts')
<div>
    <div class="col-md-12">
        <a href="/post/create" class="btn btn-primary float-end">Add New Post</a>
        <div class="clearfix"></div>

        @if (session()->has('success'))
        <div class="alert alert-success mt-3">
            <strong>Berhasil</strong>
            <p>{{session('success')}}</p>
        </div>
        @endif

        <div class="row mt-3">
            <div class="col-md-6">
                <select wire:model="paginate" class="form-control-sm">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 offset-md-3">
                <input wire:model="search" type="text" class="form-control" placeholder="Search Here..">
            </div>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $index => $post)
                    <tr>
                        <td>{{$posts->firstItem() + $index}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->content}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="/post/{{$post->id}}/edit" class="btn btn-warning">Edit</a>
                                <button wire:click="setIdDelete({{$post}})" data-bs-toggle="modal"
                                    data-bs-target="#deletePost" class="btn btn-danger">Delete</button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id="deletePost">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Post {{$titleDelete}} will be delete</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                    <button wire:click="destroy({{$idDelete}})" type="button" class="btn btn-danger">YES</button>
                </div>
            </div>
        </div>
    </div>
</div>


@push('script')
<script>

</script>
@endpush
