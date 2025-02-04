
@extends('components.layout')

@section('content')

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row align-items-center">
                  <div class="col">
                    <h4 class="card-title">Create Discount</h4>
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

                <form action="{{ route('discounts.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="name" class="form-label">Discount Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="type" class="form-label">Discount Type</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="percentage" {{ old('type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                <option style="display: none;" value="fixed" {{ old('type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="percentage" class="form-label">Value</label>
                            <input type="number" class="form-control" id="percentage" name="percentage" value="{{ old('percentage') }}" step="0.01" required>
                        </div>
                        <div class="col-md-6">
                            <label for="applies_to" class="form-label">Applies To</label>
                            <select class="form-select" id="applies_to" name="applies_to" required>
                                <option value="all">All Products</option>
                                <option value="category">Specific Category</option>
                                <option value="product">Specific Products</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="start_date" class="form-label">Start Date</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="end_date" class="form-label">End Date</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}" required>
                        </div>
                    </div>

                    <!-- Category Selection (Hidden by default) -->
                    <div id="category_selection" class="mb-3" style="display: none;">
                        <label class="form-label">Select Category</label>
                        <select class="form-select" name="category_ids[]">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
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
                            <option value="{{ $product->id }}">
                                {{ $product->translations->first()?->name ?? 'Untranslated Product' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', '1') == '1' ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Create Discount</button>
                        <a href="{{ route('discounts.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
              </div>
              <!--end card-body-->
            </div>
            <!--end card-->
          </div>
          <!--end col-->
       
          @endsection

