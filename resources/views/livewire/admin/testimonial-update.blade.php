<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">New Testimonials</h3>
            </div>
            <!-- /.card-header -->
            @if (session()->has('add_message'))<div class="alert alert-success">{{ session('add_message') }}</div> @endif
            <!-- form start -->
            <form wire:submit.prevent="store()" wire:ignore>
              <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="title">
                  @error('title') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Details </label>
                    <textarea maxlength="300" class="form-control" wire:model="details">
                        {{$details}}
                        </textarea>
                    @error('details') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="name">
                  @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Designation</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="designation">
                  @error('designation') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Rating</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="rating">
                  @error('rating') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputFile"> Picture</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="pic">
                        <label class="custom-file-label" for="exampleInputFile">Upload Cover Photo</label>
                        @error('pic') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>
                
                

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.card -->

        </div>
        <!--/.col (left) -->

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


  @push('summernote')
  <script>
    $('.summernote').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('details', contents);
            }
        }
    });
  </script>
      
  @endpush