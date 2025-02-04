@extends('components.layout')
@section('content')

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h4 class="card-title">Edit Product</h4>
                  </div>
                </div>
              </div>
              
              <div class="card-body pt-0">
                @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="mb-3 row">
                        <label for="example-email-input" class="col-sm-2 col-form-label text-end">Marque</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="slug" type="text" value="{{ $product->slug }}" placeholder="Exemple : 'Nestlé'" />
                        </div>
                      </div>

                      <div class="mb-3 row">
                        <label for="example-number-input" class="col-sm-2 col-form-label text-end">Prix</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-text"> €</span> 
                            <input 
                              class="form-control" 
                              name="base_price" 
                              type="number" 
                              value="{{ $product->base_price}}"
                              placeholder="Exemple:'20'" 
                              id="example-number-input" 
                              step="0.01" 
                              min="0" 
                              required
                            />
                          </div>
                        </div>
                      </div>
                      

                      <div class="mb-3 row">
                        <label for="category_id" class="col-sm-2 col-form-label text-end">Category:</label>
                        <div class="col-sm-10">
                          <select name="category_id" class="form-select">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                              <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->getTranslation('fr')?->name ?? 
                                   $category->getTranslation('en')?->name ?? 
                                   $category->getTranslation('es')?->name ?? 
                                   'No translation available' }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>

                     <!-- English -->
<div class="translations-section">
  <div class="form-group">
      <label for="translations[en][name]">Name (English):</label>
      <input type="text" 
             class="form-control" 
             name="translations[en][name]" 
             value="{{ old('translations.en.name', 
                        optional($product->translations->firstWhere('language_code', 'en'))->name) }}">
      <input type="hidden" name="translations[en][language_code]" value="en">
  </div>

  <div class="form-group">
      <label for="translations[en][description]">Description (English):</label>
      <textarea class="form-control" 
                name="translations[en][description]" 
                rows="3">{{ old('translations.en.description', 
                           optional($product->translations->firstWhere('language_code', 'en'))->description) }}</textarea>
  </div>
</div>

<!-- French -->
<div class="translations-section">
  <div class="form-group">
      <label for="translations[fr][name]">Name (French):</label>
      <input type="text" 
             class="form-control" 
             name="translations[fr][name]" 
             value="{{ old('translations.fr.name', 
                        optional($product->translations->firstWhere('language_code', 'fr'))->name) }}">
      <input type="hidden" name="translations[fr][language_code]" value="fr">
  </div>

  <div class="form-group">
      <label for="translations[fr][description]">Description (French):</label>
      <textarea class="form-control" 
                name="translations[fr][description]" 
                rows="3">{{ old('translations.fr.description', 
                           optional($product->translations->firstWhere('language_code', 'fr'))->description) }}</textarea>
  </div>
</div>

<!-- Spanish -->
<div class="translations-section">
  <div class="form-group">
      <label for="translations[es][name]">Name (Spanish):</label>
      <input type="text" 
             class="form-control" 
             name="translations[es][name]" 
             value="{{ old('translations.es.name', 
                        optional($product->translations->firstWhere('language_code', 'es'))->name) }}">
      <input type="hidden" name="translations[es][language_code]" value="es">
  </div>

  <div class="form-group">
      <label for="translations[es][description]">Description (Spanish):</label>
      <textarea class="form-control" 
                name="translations[es][description]" 
                rows="3">{{ old('translations.es.description', 
                           optional($product->translations->firstWhere('language_code', 'es'))->description) }}</textarea>
  </div>
</div>
                      <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label text-end">Stock</label>
                        <div class="col-sm-10">
                          <input class="form-control" name="stock" type="number" value="{{ $product->stock }}" />
                        </div>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Current Image</h4>
                        </div>
                        <div class="card-body">
                          @if($product->image_url)
                          <img src="{{ Storage::url($product->image_url) }}" alt="Product Image" style="max-width: 200px;">
                          @endif
                          
                          <div class="d-grid">
                            <p class="text-muted">
                              Choose a new image (optional) - .jpg or .png between 100x100 and 500x500
                            </p>
                            <div class="preview-box d-block justify-content-center rounded border-dashed border-theme-color overflow-hidden p-3">
                            </div>
                            <input type="file" id="input-file" name="image_url" accept="image/*" onchange="{handleChange()}" hidden />
                            <label class="btn-upload btn btn-primary mt-3" for="input-file">Upload New Image</label>
                          </div>
                        </div>
                      </div>

                      <div class="row align-items-center mt-3">
                        <div class="col-sm-12">
                          <button type="submit" style="width: 100%" class="btn btn-primary">
                            Update Product
                          </button>
                        </div>
                      </div>
                    </div>
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