<div class="card mt-3" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">
        <a href="{{ route('property.show',['slug' => $property->getSlug() , 'property' => $property]) }}">{{ $property->title }}</a>
    </h5>
      <p class="card-text">{{ $property->surface }} m² - {{ $property->city }} {{ $property->postal_code }}</p>
      <div href="#" class="text-primary fw-blod" style="font-size:1.4em">
        {{ number_format($property->price, thousands_separator: ' ') }} DH
    </div>
    </div>
  </div>
