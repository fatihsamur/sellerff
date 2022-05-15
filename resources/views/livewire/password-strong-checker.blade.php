<div>
    <input name="password" type="password" wire:model.debounce.200ms="password" class="intro-x login__input form-control py-3 px-4 border-gray-300 block mt-4"
        placeholder="Şifre">
    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror


    <div class="intro-x w-full grid grid-cols-12 gap-4 h-1 mt-3">

      @for ($i = 0; $i < 4; $i++)
      @if ($i <= $score)
      <div class="col-span-3 h-full rounded bg-theme-9"></div>
      @else
      <div class="col-span-3 h-full rounded bg-gray-200 dark:bg-dark-2"></div>
      @endif
      @endfor


    </div>
    <a href="" class="intro-x text-gray-600 block mt-2 text-xs sm:text-sm">Güvenli Şifre Nedir ?</a>
    @foreach ($errors->all() as $error)
    <div class="text-sm text-red-600">{{$error}}
      @if(!$loop->last), @endif
    </div>
    @endforeach


</div>
