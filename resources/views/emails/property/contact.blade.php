<x-mail::message>
# Nouvelle demande de contact

une nouvelle demande de contact a ete fait pour le bien <a href="{{ route('property.show', ['slug'=>$property->getSlug(),'property'=>$property]) }}">{{ $property->tittle }}</a>
- Prenom: {{ $data['firstname'] }}
- Nom: {{ $data['lastname'] }}
- Telephone: {{ $data['phone_number'] }}
- Email: {{ $data['email'] }}

**Message**<br>
{{ $data['message'] }}

<x-mail::button :url="''">
Button Text
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
