<x-layout title="{{__('API Keys')}}" description="{{__('Manage your API keys')}}">
    <div class="mb-4">
        <a class="btn btn-neutral" href="{{ route('developers.keys.create') }}">
            <i class="fa-solid fa-plus"></i>
            {{__('Create New Key')}}
        </a>
    </div>

    @if (session('new_token'))
        <dialog class="modal" open>
            <div class="modal-box">
                <h3 class="text-lg font-bold">{{__('New API Key created')}}</h3>
                <p class="py-4">{{__('Your new API key is:')}}</p>
                <div class="mb-4">
                    <input type="text" class="input input-bordered w-full" value="{{ session('new_token') }}" readonly>
                </div>

                <p class="text-sm text-base-content/50">{{__('Please copy this key now. You won\'t be able to see it again!')}}</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn">
                            {{__('Close')}}
                    </form>
                </div>
            </div>
        </dialog>
    @endif

    <table class="table">
        <thead>
        <tr>
            <th>{{__('Key Name')}}</th>
            <th>{{__('Created At')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @forelse($tokens as $key)
            <tr>
                <td>{{ $key->name }}</td>
                <td>{{ $key->created_at->format('Y-m-d H:i:s') }}</td>
                <td>
                    <form action="{{ route('developers.keys.destroy', $key) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            {{__('Delete')}}
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">{{__('No API keys found.')}}</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</x-layout>
