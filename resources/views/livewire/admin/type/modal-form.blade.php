<div wire:ignore.self class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Add Type</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeType">
                <div class="modal-body">
                    {{-- <div class="mb-3">
                        <label>Select Category</label>
                        <select wire:model.defer="category_id" required class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $cateItem)
                                <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label>Type Name</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Type Slug</label>
                        <input type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Status</label> <br />
                        <input type="checkbox" wire:model.defer="status"/> Checked = Hidden, Un-Checked = Visible
                        @error('status') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Update --}}
<div wire:ignore.self class="modal fade" id="updateTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Update Type</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form wire:submit.prevent="updateType">
                    <div class="modal-body">
                        {{-- <div class="mb-3">
                            <label>Select Category</label>
                            <select wire:model.defer="category_id" required class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $cateItem)
                                    <option value="{{$cateItem->id}}">{{$cateItem->name}}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div> --}}
                        <div class="mb-3">
                            <label>Type Name</label>
                            <input type="text" wire:model.defer="name" class="form-control">
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Type Slug</label>
                            <input type="text" wire:model.defer="slug" class="form-control">
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Status</label> <br />
                            <input type="checkbox" wire:model.defer="status" style="width:70px; height=70px;"/> Checked=Hidden, Un-Checked=Visible
                            @error('status') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Delete --}}
<div wire:ignore.self class="modal fade" id="deleteTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">Delete Type</h5>
                <button type="button" class="btn-close" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div>
                <form wire:submit.prevent="destroyType">
                    <div class="modal-body">
                        <h4>Are you sure? Are you want to delete this data?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
