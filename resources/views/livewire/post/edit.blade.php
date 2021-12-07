<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header">
                <p class="card-title">Edit Post</p>
            </div>
            <div class="card-body p-4">
                <form wire:submit.prevent="update">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input wire:model="title" name="title" type="text" id="title"
                            class="form-control @error('title') is-invalid @enderror" placeholder="Title">
                        @error('title')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">content</label>
                        <textarea name="content" id="content" cols="30" rows="10"
                            class="form-control @error('content') is-invalid @enderror" wire:model="content"
                            placeholder="Content"></textarea>
                        @error('content')
                        <small class="text-danger">
                            {{$message}}
                        </small>
                        @enderror
                    </div>
                    <div class="mb-3 d-grid md-block">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-danger mt-2">Reset</button>
                        <a href="/" class="btn btn-primary mt-2">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
