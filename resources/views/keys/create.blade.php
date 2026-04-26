<x-layout title="{{__('Create new API key')}}" description="{{__('Create a new API key for your application')}}">
    <form action="{{ route('developers.keys.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">{{__('Key Name')}}</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                {{__('Create Key')}}
            </button>
            <a href="{{ route('developers.keys.index') }}" class="btn btn-secondary">
                <i class="fa-solid fa-arrow-left"></i>
                {{__('Back to Keys')}}
            </a>
        </div>
    </form>
</x-layout>
