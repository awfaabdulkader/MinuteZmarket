@extends('components.layout')
@section('content')
@php
$skipHeader = true;
@endphp
@include('components.header', ['showLanguageSwitcher' => true])


          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <h4 class="card-title">Table des produits</h4>

                      
                    </div>
                    <!--end col-->
                    <div class="col-auto ms-auto">
                      <div
                        class="bg-primary-subtle p-2 border-dashed border-primary rounded"
                      >
                        <span class="text-primary fw-semibold">Note :</span
                        ><span class="text-primary fw-normal">
                          Si vous souhaitez modifier des données, double-cliquez
                          sur une ligne du tableau.</span
                        >
                      </div>
                    </div>
                    <!--end col-->
                  </div>
                  <!--end row-->
                </div>
                
                <!--end card-header-->
                <div class="card-body pt-0">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="table-light">
                        <tr>
                          <th>Nom du produit</th>
                          <th>Marque</th>
                          <th>prix</th>
                          <th>Catégorie</th>
                          <th>Description</th>
                          <th>Quantité en stock</th>
                          <th>Image</th>
                          <th>Date d'ajout</th>
                          <th class="text-end">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>
                                @php
                                    $translation = optional($product->translations->firstWhere('language_code', $languageCode))
                                        ?? optional($product->translations->firstWhere('language_code', 'fr'));
                                @endphp
                                {{ $translation->name ?? 'No translation available' }}
                            </td>
                            <td>{{ $product->slug }}</td>
                            <td>
                              <?php 
                                  // Force recalculation of discount
                                  $product->calculateDiscountedPrice();
                              ?>
                              @if($product->sale_price)
                                  <del class="text-muted">€{{ number_format($product->base_price, 2) }}</del>
                                  <br>
                                  <span class="text-danger">€{{ number_format($product->sale_price, 2) }}</span>
                                  @foreach($product->discounts as $discount)
                                      @if($discount->is_active && now()->between($discount->start_date, $discount->end_date))
                                          <br>
                                          <small class="text-success">
                                              -{{ $discount->percentage }}% OFF
                                          </small>
                                          @break
                                      @endif
                                  @endforeach
                              @else
                                  €{{ number_format($product->base_price, 2) }}
                              @endif
                          </td>
                            <td>
                                @php
                                    $categoryTranslation = optional(optional($product->category)->translations)
                                        ->firstWhere('language_code', $languageCode)
                                        ?? optional(optional($product->category)->translations)
                                            ->firstWhere('language_code', 'fr');
                                @endphp
                                {{ $categoryTranslation->name ?? 'No category' }}
                            </td>
                            <td>{{ $translation->description ?? 'No description available' }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                @if($product->image_url)
                                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="Product Image" width="100">

                                @endif
                            </td>
                            <td>{{ $product->created_at->format('Y/m/d') }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.products.edit', $product->id) }}">
                                    <i class="las la-pen text-secondary font-16"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent text-secondary">
                                        <i class="las la-trash-alt font-16"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
                      
                   </table>
                   {{$products->links()}}

                  <p>we found<strong> {{$products->count()}}</strong> products</p> 

                   
                  </div>
                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
            </div>
            <!--end col-->
          </div>
         
          
        <footer class="footer text-center text-sm-start d-print-none">
          <div class="container-xxl">
            <div class="row">
              <div class="col-12">
                <div class="card mb-0 rounded-bottom-0">
                  <div class="card-body">
                    <p class="text-muted mb-0">
                      <span
                        class="text-muted d-none d-sm-inline-block float-end"
                        >©
                        <script>
                          document.write(new Date().getFullYear());
                        </script>
                        MinutZMarket</span
                      >
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>
@endsection