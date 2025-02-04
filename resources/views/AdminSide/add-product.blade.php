
@extends('components.layout')
@section('content')

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h4 class="card-title">Textual Inputs</h4>
                  </div>
                  <!--end col-->
                </div>
                <!--end row-->
              </div>
              <!--end card-header-->
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3 row align-items-center">
                      <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                                          </div>



                    <div class="mb-3  row">
                      <label for="example-email-input" class="col-sm-2 col-form-label text-end">Marque</label>
                      <div class="mb-3 col-sm-10">
                        <input class="form-control"  name="slug" type="text" placeholder="Exemple : 'Nestlé'"
                          id="example-email-input" />
                      </div>

                      <div class="mb-3 row">
                        <label for="example-number-input" class="col-sm-2 col-form-label text-end">Prix</label>
                        <div class="col-sm-10">
                          <div class="input-group">
                            <span class="input-group-text">€</span> <!-- Add the currency symbol here -->
                            <input 
                              class="form-control" 
                              name="base_price" 
                              type="number" 
                              placeholder="Exemple : '20'" 
                              id="example-number-input" 
                              step="0.01" 
                              min="0" 
                              required
                            />
                          </div>
                        </div>
                      </div>
                      
                      
                    </div>
                    <div class="mb-3 row">
                      <label for="category_id" class="col-sm-2 col-form-label text-end">Category:</label>
                      <div class="col-sm-10">
                        <select name="category_id"
                          class="form-select border border-gray-300 text-gray-700 p-2 rounded-md"
                          aria-label="Category Select">
                          <option value="">Select Category</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                              {{ $category->getTranslation('fr')?->name ?? 
                                 $category->getTranslation('en')?->name ?? 
                                 $category->getTranslation('es')?->name ?? 
                                 'No translation available' }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="mb-3 row">
                     <!-- English Translation -->
<input type="hidden" name="translations[en][language_code]" value="en">
<div class="mb-3 row">
  <label for="translations[en][name]" class="col-sm-2 col-form-label text-end">Name (EN)</label>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="translations[en][name]" placeholder="Name in English" required>
  </div>
</div>
<div class="mb-3 row">
  <label for="translations[en][description]" class="col-sm-2 col-form-label text-end">Description (EN)</label>
  <div class="col-sm-10">
    <textarea class="form-control" name="translations[en][description]" placeholder="Description in English"></textarea>
  </div>
</div>

<!-- French Translation -->
<input type="hidden" name="translations[fr][language_code]" value="fr">
<div class="mb-3 row">
  <label for="translations[fr][name]" class="col-sm-2 col-form-label text-end">Name (FR)</label>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="translations[fr][name]" placeholder="Nom en Français" required>
  </div>
</div>
<div class="mb-3 row">
  <label for="translations[fr][description]" class="col-sm-2 col-form-label text-end">Description (FR)</label>
  <div class="col-sm-10">
    <textarea class="form-control" name="translations[fr][description]" placeholder="Description en Français"></textarea>
  </div>
</div>

<!-- Spanish Translation -->
<input type="hidden" name="translations[es][language_code]" value="es">
<div class="mb-3 row">
  <label for="translations[es][name]" class="col-sm-2 col-form-label text-end">Name (ES)</label>
  <div class="col-sm-10">
    <input class="form-control" type="text" name="translations[es][name]" placeholder="Nombre en Español" required>
  </div>
</div>
<div class="mb-3 row">
  <label for="translations[es][description]" class="col-sm-2 col-form-label text-end">Description (ES)</label>
  <div class="col-sm-10">
    <textarea class="form-control" name="translations[es][description]" placeholder="Descripción en Español"></textarea>
  </div>
</div>
                  </div>
                  <!--end col-->
                  <div class="mb-3 row">
                    <label for="example-number-input" class="col-sm-2 col-form-label text-end">Quantité en Stock
                    </label>
                    <div class="col-sm-10">
                      <input class="form-control" name="stock" type="number" placeholder="Exemple : '42'"
                        id="example-number-input" />
                    </div>
                  </div>
                </div>
                  <div class="col-md-6 col-lg-6">
                    <div class="card">
                      <div class="card-header">
                        <div class="row align-items-center">
                          <div class="col">
                            <h4 class="card-title">Choisir la Photo Produit </h4>
                          </div>
                          <!--end col-->


                        </div>
                        <!--end row-->
                      </div>
                      <!--end card-header-->
                      <div class="card-body pt-0">
                        <div class="d-grid">
                          <p class="text-muted">
                            Veuillez choisir une image de votre produit .jpg ou .png entre 100x100 et 500x500
                          </p>
                          <div
                            class="preview-box d-block justify-content-center rounded border-dashed border-theme-color overflow-hidden p-3">
                          </div>
                          <input type="file" id="input-file" name="image_url" accept="image/*"
                            onchange="{handleChange()}" hidden />
                          <label class="btn-upload btn btn-primary mt-3"   for="input-file">Upload Image</label>
                        </div>
                      </div>
                      <!--end card-body-->
                    </div>
                    <!--end card-->
                    <div class="row align-items-center ">
                      <div class="col-sm-12">
                        <button type="submit" style="width: 100%" class="btn btn-primary">
                          Ajouter
                        </button>
                      </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create category </h4>
                </div>
                <div class="card-body">
                    <form action="{{route('categories.store') }}" 
                          method="POST" 
                          class="needs-validation" 
                          enctype="multipart/form-data"
                          novalidate>
                        @csrf
                    

                      
                       

                        <div class="row">
                          <div class="row mb-4">
                            <!-- Image Upload Section -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header bg-light">
                                        <h5 class="mb-0">Category Image</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Upload Image</label>
                                            <input type="file" 
                                                   class="form-control @error('image') is-invalid @enderror" 
                                                   name="image" 
                                                   accept="image/*">
                                            @error('image')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                   required>
                                            @error('translations.1.name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                       
                                    </div>

                                    <!-- spanish Translation -->
                            <div class="col-md-6">
                              <div class="card">
                                  <div class="card-header bg-light">
                                      <h5 class="mb-0">Es Version</h5>
                                  </div>
                                  <div class="card-body">
                                      <input type="hidden" 
                                             name="translations[2][language_code]" 
                                             value="es">
                                      
                                      <div class="mb-3">
                                          <label class="form-label">Name (es)</label>
                                          <input type="text" 
                                                 class="form-control @error('translations.2.name') is-invalid @enderror" 
                                                 name="translations[2][name]"  
                                                 required>
                                          @error('translations.2.name')
                                              <div class="invalid-feedback">{{ $message }}</div>
                                          @enderror
                                      </div>

                                     
                                  </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary">
                                  Create Category
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            </div>
                @endsection