@props(['id'])

<dialog id="modal_{{$id}}" {{ $attributes->class(['modal modal-bottom sm:modal-middle']) }}>
    <div class="modal-box">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        {{$slot}}
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
