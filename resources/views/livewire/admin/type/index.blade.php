
 <div>
    @include('livewire.admin.type.modal-form')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        Types List
                        <a href="#" data-bs-toggle="modal" data-bs-target="#addTypeModal" class="btn btn-primary btn-sm float-end">Add Type</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($types as $type)
                                <tr>
                                    <td>{{$type->id}}</td>
                                    <td>{{$type->name}}</td>
                                     <td>
                                        @if($type->category)
                                            {{$type->category->name}}
                                        @else
                                            No Category
                                        @endif
                                    </td>
                                    <td>{{$type->slug}}</td>
                                    <td>{{$type->status == '1' ? 'hidden':'visible'}}</td>
                                    <td>
                                        <a href="#" wire:click="editType({{ $type->id }})" data-bs-toggle="modal" data-bs-target="#updateTypeModal" class="btn btn-sm btn-success">Edit</a>
                                        <a href="#" wire:click="deleteType({{ $type->id }})" data-bs-toggle="modal" data-bs-target="#deleteTypeModal" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">No Types Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div>
                        {{ $types->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {
            $('#addTypeModal').modal('hide');
            $('#updateTypeModal').modal('hide');
            $('#deleteTypeModal').modal('hide');
        });
    </script>
@endpush
