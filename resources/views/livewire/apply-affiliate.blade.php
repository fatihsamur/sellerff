<div class="flex mt-5">
    <div class="w-full relative text-gray-700">
        <input name="affiliate_code" wire:model="affiliate_code" type="text" class="form-control py-3 px-4 w-full bg-gray-200 border-gray-200 pr-10 placeholder-theme-13"
            placeholder="Üyelik Kodu">
        <i class="w-4 h-4 hidden absolute-sm my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
    </div>
    <button wire:click="checkAffCodeValidity()" class="btn btn-primary ml-2">Uygula</button>
</div>
