<div>
    <div class="flex justify-center pb-4 px-4">
        <h1 class="text-lg pb-4">Add steps if required.</h1>

        <span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer"></span>
    </div>

    @foreach($steps as $step)
    <div class="flex justify-center pb-2" wire:key="{{$step}}">
        <input type="text" name="step[]" class="py-2 px-2 border-purple-50 rounded" placeholder="Describe steps here" >
        <span class="fas fa-times p-2 text-red-400 cursor-pointer" wire:click="remove({{$step}})"></span>
    </div>
    @endforeach
</div>
