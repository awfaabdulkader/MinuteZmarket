@extends('components.layout')
@section('content')

<div class="container-fluid px-4">
  <h1 class="mt-4">Edit Discount</h1>

  <div class="card mb-4">
      <div class="card-header">
          <div class="row align-items-center">
              <div class="col">
                  <h4 class="card-title">Edit Discount</h4>
              </div>
              <!--end col-->
              <div class="col-auto ms-auto">
                  <div class="bg-primary-subtle p-2 border-dashed border-primary rounded">
                      <span class="text-primary fw-semibold">Note :</span>
                      <span class="text-primary fw-normal">
                          Modifiez les informations du discount ci-dessous.
                      </span>
                  </div>
              </div>
              <!--end col-->
          </div>
          <!--end row-->
      </div>
      <!--end card-header-->
      <div class="card-body pt-0">
          @if($errors->any())
              <div class="alert alert-danger">
                  <ul class="mb-0">
                      @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          <form action="{{ route('discounts.update', $discount->id) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                  <div class="col-md-6">
                      <label for="name" class="form-label">Discount Name</label>
                      <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $discount->name) }}" required>
                  </div>
                  <div class="col-md-6">
                      <label for="type" class="form-label">Discount Type</label>
                      <select class="form-select" id="type" name="type" required>
                        <option value="percentage" 
                        {{ (old('type') == 'percentage') ? 'selected' : ((($discount->type ?? '') == 'percentage') ? 'selected' : '') }}>
                        Percentage
                    </option>
                    <option value="fixed" 
                        {{ (old('type') == 'fixed') ? 'selected' : ((($discount->type ?? '') == 'fixed') ? 'selected' : '') }}>
                        Fixed Amount
                    </option>
                    
                      </select>
                  </div>
              </div>

              <div class="row mb-3">
                  <div class="col-md-6">
                      <label for="percentage" class="form-label">Value</label>
                      <input type="number" class="form-control" id="percentage" name="percentage" value="{{ old('percentage', $discount->percentage) }}" step="0.01" required>
                  </div>
                  <div class="col-md-6">
                      <label for="applies_to" class="form-label">Applies To</label>
                      <select class="form-select" id="applies_to" name="applies_to" required>
                          <option value="all" {{ old('applies_to', $discount->applies_to) == 'all' ? 'selected' : '' }}>All Products</option>
                          <option value="category" {{ old('applies_to', $discount->applies_to) == 'category' ? 'selected' : '' }}>Specific Category</option>
                          <option value="product" {{ old('applies_to', $discount->applies_to) == 'product' ? 'selected' : '' }}>Specific Products</option>
                      </select>
                  </div>
              </div>

              <div class="row mb-3">
                  <div class="col-md-6">
                      <label for="start_date" class="form-label">Start Date</label>
                      <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $discount->start_date ? $discount->start_date->format('Y-m-d') : '') }}" required>
                  </div>
                  <div class="col-md-6">
                      <label for="end_date" class="form-label">End Date</label>
                      <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $discount->end_date ? $discount->end_date->format('Y-m-d') : '') }}" required>
                  </div>
              </div>

              <!-- Category Selection (Hidden by default) -->
              <div id="category_selection" class="mb-3" style="display: none;">
                  <label class="form-label">Select Category</label>
                  <select class="form-select" name="category_ids[]">
                      @foreach($categories as $category)
                          <option value="{{ $category->id }}" {{ in_array($category->id, old('category_ids', $discount->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                              {{ $category->translations->first()?->name ?? 'Untranslated Category' }}
                          </option>
                      @endforeach
                  </select>
              </div>

              <!-- Product Selection (Hidden by default) -->
              <div id="product_selection" class="mb-3" style="display: none;">
                  <label class="form-label">Select Products</label>
                  <select class="form-select" name="product_ids[]" multiple>
                      @foreach($products as $product)
                          <option value="{{ $product->id }}" {{ in_array($product->id, old('product_ids', $discount->products->pluck('id')->toArray())) ? 'selected' : '' }}>
                              {{ $product->translations->first()?->name ?? 'Untranslated Product' }}
                              (€{{ number_format($product->base_price, 2) }})
                          </option>
                      @endforeach
                  </select>
              </div>

              <div class="mb-3">
                  <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $discount->is_active) == '1' ? 'checked' : '' }}>
                      <label class="form-check-label" for="is_active">Active</label>
                  </div>
              </div>

              <div class="mb-3">
                  <button type="submit" class="btn btn-primary">Update Discount</button>
                  <a href="{{ route('discounts.index') }}" class="btn btn-secondary">Cancel</a>
              </div>
          </form>
      </div>
      <!--end card-body-->
  </div>
  <!--end card-->
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