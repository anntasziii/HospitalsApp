<div wire:ignore.self class="modal fade" id="addTypeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLable">ADD TYPE</h5>
                <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="storeType">
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Type Name</label>
                        <input style="border-radius: 5px" type="text" wire:model.defer="name" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label>Type Slug</label>
                        <input style="border-radius: 5px" type="text" wire:model.defer="slug" class="form-control">
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-2">Status (Checked = Hidden, UnChacked = Visible)</label><br />
                        <div class="checkbox-wrapper-7">
                            <input class="tgl tgl-ios" id="cb2-7" wire:model.defer="status" type="checkbox"/>
                            <label class="tgl-btn" for="cb2-7">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 10px">Close</button>
                    <button type="submit" class="btn text-white btn-primary" style="border-radius: 10px">Save</button>
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
                <h5 class="modal-title" id="exampleModalLable">UPDATE TYPE</h5>
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
                            <input style="border-radius: 5px" type="text" wire:model.defer="name" class="form-control">
                            @error('name') <small class="text-danger">{{$message}}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Type Slug</label>
                            <input style="border-radius: 5px" type="text" wire:model.defer="slug" class="form-control">
                            @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label>Status</label> <br />
                            <input type="checkbox" wire:model.defer="status" style="width:70px; height=70px;"/> Checked = Hidden, Un-Checked = Visible
                            @error('status') <small class="text-danger">{{$message}}</small> @enderror
                        </div> --}}

                        <div class="mb-3" >
                            <label class="mb-2">Status (Checked = Hidden, UnChecked = Visible)</label><br />
                            <div class="checkbox-wrapper-7">
                                <input class="tgl tgl-ios" id="cb2-7" type="checkbox" wire:model.defer="status" style="width:70px; height:70px;"/>
                                <label class="tgl-btn" for="cb2-7"></label>
                                @error('status') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 10px">Close</button>
                        <button type="submit" class="btn text-white btn-primary" style="border-radius: 10px">Update</button>
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
                        <a>Are you sure? Are you want to delete this data?</a>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal" style="border-radius: 10px">Close</button>
                        <button type="submit" class="btn btn-primary" style="border-radius: 10px">Yes. Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
