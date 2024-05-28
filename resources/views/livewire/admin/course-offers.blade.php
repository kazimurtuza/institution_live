<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Course Offers Page</h3>
            </div>
            <!-- /.card-header -->
            @if (session()->has('add_message'))<div class="alert alert-success">{{ session('add_message') }}</div> @endif
            <!-- form start -->
            <form wire:submit.prevent="store()" wire:ignore>
              <div class="card-body">
              <div class="form-group">
                  <label for="exampleInputEmail1">Page Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="name">
                  @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">First Section </label>
                    <textarea class="first_section form-control" wire:model="first_section">
                        {{$first_section}}
                        </textarea>
                    @error('first_section') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Course Type One</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="type_one">
                  @error('type_one') <span class="error">{{ $message }}</span> @enderror
                </div>
                {{-- <div class="form-group">
                  <label for="exampleInputEmail1">Course Level One</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="level_one">
                  @error('level_one') <span class="error">{{ $message }}</span> @enderror
                </div> --}}
                <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="level_one">
                <div class="form-group">
                  <label for="exampleInputEmail1">Course Subject One </label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="sub_one">
                  @error('sub_one') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Course Fee One</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="fee_one">
                  @error('fee_one') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Course Type Two</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="type_two">
                    @error('type_two') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Course Level Two</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="level_two">
                    @error('level_two') <span class="error">{{ $message }}</span> @enderror
                  </div> --}}
                  <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="level_two">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Subject Two </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="sub_two">
                    @error('sub_two') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Fee Two</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="fee_two">
                    @error('fee_two') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Type Three</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="type_three">
                    @error('type_three') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  {{-- <div class="form-group">
                    <label for="exampleInputEmail1">Course Level Three</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="level_three">
                    @error('level_three') <span class="error">{{ $message }}</span> @enderror
                  </div> --}}
                  <input type="hidden" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="level_three">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Subject Three </label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="sub_three">
                    @error('sub_three') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Course Fee Three</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="fee_three">
                    @error('fee_three') <span class="error">{{ $message }}</span> @enderror
                  </div>
                
                <div class="form-group">
                    <label for="exampleInputEmail1">Last Section </label>
                    <textarea class="last_section form-control" wire:model="last_section">
                        {{$last_section}}
                        </textarea>
                    @error('last_section') <span class="error">{{ $message }}</span> @enderror
                </div>
                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Title</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="meta_title">
                    @error('meta_title') <span class="error">{{ $message }}</span> @enderror
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Meta Description</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="meta_details">
                    @error('meta_details') <span class="error">{{ $message }}</span> @enderror
                  </div>
                
                <div class="form-group">
                    <label for="exampleInputFile"> Page Banner</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" wire:model="page_banner">
                        <label class="custom-file-label" for="exampleInputFile">Upload Page Banner</label>
                        @error('page_banner') <span class="error">{{ $message }}</span> @enderror
                      </div>
                      
                    </div>
                  </div>
                
                  <div wire:loading wire:target="page_banner" style="color:red"> Uploading  Page Banner---</div> <br/><br/> 

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
    $('.last_section').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('last_section', contents);
            }
        }
    });
    $('.first_section').summernote({
        height: 200,
        callbacks: {
            onChange: function(contents, $editable) {
                @this.set('first_section', contents);
            }
        }
    });
  </script>
      
  @endpush