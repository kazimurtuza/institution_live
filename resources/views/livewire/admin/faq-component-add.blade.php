<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">New Faq</h3>
            </div>
            <!-- /.card-header -->
            @if (session()->has('add_message'))<div class="alert alert-success">{{ session('add_message') }}</div> @endif
            <!-- form start -->
            <form wire:submit.prevent="store()" wire:ignore>
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Catrgory</label>
                  <select class="form-control" wire:model="cat_name">
                    <option>Select Category</option>
                    @foreach ($all_categories as $category)
                      <option value="{{$category->id}}">{{$category->category_name}}</option>
                    @endforeach
                    
                    
                  </select>
                  
                  @error('cat_name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Question</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" wire:model="question">
                    @error('question') <span class="error">{{ $message }}</span> @enderror
                  </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Answer </label>
                    <textarea class="summernote form-control" wire:model="answer">
                      {{ $this->answer }}
                        </textarea>
                    @error('answer') <span class="error">{{ $message }}</span> @enderror
                </div>
                

                 
                

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
                @this.set('answer', contents);
            }
        }
    });
  </script>
      
  @endpush