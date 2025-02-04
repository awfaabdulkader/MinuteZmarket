@extends('components.layout')
@section('content')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $category->id) }}" 
                              method="POST" 
                              class="needs-validation" 
                              enctype="multipart/form-data"
                              novalidate>
                            @csrf
                            @method('PUT')
                            
      
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="card">
                                  <div class="card-header">
                                    <h4 class="card-title">Current Image</h4>
                                  </div>
                                  <div class="flex">
                                    
                                  </div>
                                <!-- French Translation -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <h5 class="mb-0">French Version</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" 
                                                   name="translations[0][language_code]" 
                                                   value="fr">
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Name (French)</label>
                                                <input type="text" 
                                                       class="form-control @error('translations.0.name') is-invalid @enderror" 
                                                       name="translations[0][name]" 
                                                       value="{{ $category->getTranslation('fr')?->name }}"
                                                       required>
                                                @error('translations.0.name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- English Translation -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <h5 class="mb-0">English Version</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" 
                                                   name="translations[1][language_code]" 
                                                   value="en">
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Name (English)</label>
                                                <input type="text" 
                                                       class="form-control @error('translations.1.name') is-invalid @enderror" 
                                                       name="translations[1][name]"
                                                       value="{{ $category->getTranslation('en')?->name }}"  
                                                       required>
                                                @error('translations.1.name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                <!-- Spanish Translation -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-light">
                                            <h5 class="mb-0">Spanish Version</h5>
                                        </div>
                                        <div class="card-body">
                                            <input type="hidden" 
                                                   name="translations[2][language_code]" 
                                                   value="es">
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Name (Spanish)</label>
                                                <input type="text" 
                                                       class="form-control @error('translations.2.name') is-invalid @enderror" 
                                                       name="translations[2][name]"
                                                       value="{{ $category->getTranslation('es')?->name }}"  
                                                       required>
                                                @error('translations.2.name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="card-body">
                                              @if($category->image)
                                              <img src="{{ Storage::url($category->image) }}" alt="category Image" style="max-width: 200px;">
                                              @endif
                                              
                                              <div class="d-grid">
                                                <p class="text-muted">
                                                  Choose a new image (optional) - .jpg or .png between 100x100 and 500x500
                                                </p>
                                                <div class="preview-box d-block justify-content-center rounded border-dashed border-theme-color overflow-hidden p-3">
                                                </div>
                                                <input type="file" id="input-file" name="image" accept="image/*" onchange="{handleChange()}" hidden />
                                                <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload New Image</label>
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Category
                                </button>
                                <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      <footer class="footer text-center text-sm-start d-print-none">
        <div class="container-xxl">
          <div class="row">
            <div class="col-12">
              <div class="card mb-0 rounded-bottom-0">
                <div class="card-body">
                  <p class="text-muted mb-0">
                    <span class="text-muted d-none d-sm-inline-block float-end">©
                      <script>
                        document.write(new Date().getFullYear());
                      </script>
                      MinutZMarket
                    </span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>


 @endsection