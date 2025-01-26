<div class="card">
  <div class="card-body">
    <h5 class="card-title">
        <a href="{{ route('property.show', ['slug'=>$property->getSlug(),'property'=>$property->id]) }}">{{ $property->title }}</a>
    </h5>
    <p class="card-text">{{ $property->surface }}-{{ $property->city }}({{ $property->postal_code }})</p>
    <div class="text-primary fw-bold fs-4">
        {{ number_format($property->price, thousands_separator:' ')  }} FCFA
    </div>
  </div>
</div>
