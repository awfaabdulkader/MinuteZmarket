
@extends('components.layout')
@section('content')
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <h4 class="card-title">Table des Categories</h4>

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
                  <p class="color-gray">we found<strong> {{$categories->count()}}</strong> items</p> 

                  <!--end row-->
                </div>

                <!--end card-header-->
                <div class="card-body pt-0">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class="table-light">
                        <tr>
                          <th>Id</th>
                          <th>Category Name (EN)</th>
                          <th>Category Name (FR)</th>
                          <th>Category Name (ES)</th>
                          <th>image (ES)</th>

                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($categories as $category)
                        <tr>
                          <td>{{$category->id}}</td>
                          <td>{{$category->getTranslation('en')?->name ?? '-'}}</td>
                          <td>{{$category->getTranslation('fr')?->name ?? '-'}}</td>
                          <td>{{$category->getTranslation('es')?->name ?? '-'}}</td>
                          <td>
                            @if($category->image)
                                <img src="{{ asset('storage/' . $category->image) }}" alt="Product Image" width="100">

                            @endif
                        </td>
                          <td class="text-end">
                            <div class="d-flex justify-content-end gap-2">
                              <a href="{{ route('categories.edit', $category->id) }}" 
                                 class="btn btn-sm btn-soft-primary">
                                <i class="las la-pen text-secondary font-16"></i>
                              </a>
                              
                              <form action="{{ route('categories.destroy', $category->id) }}" 
                                    method="POST" 
                                    class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-soft-danger">
                                  <i class="las la-trash text-secondary font-16"></i>
                                </button>
                              </form>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                        
                      </tbody>
                                          </table>

                                          {{$categories->links()}}
                                </div> 

                </div>
                <!--end card-body-->
              </div>
              <!--end card-->
            </div>
            <!--end col-->
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