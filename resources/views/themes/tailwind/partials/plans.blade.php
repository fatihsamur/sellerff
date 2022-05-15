<div class="flex flex-wrap mx-auto mt-12 justify-center text-center">
  @foreach (Wave\Model\Plan::all() as $plan)
  @php $features = explode(',', $plan->features); @endphp
  <div class=" @if($loop->index!=0)ml-4 @endif   intro-y box flex flex-col lg:flex-row mt-5">

    <div class="intro-y flex-1 px-5 py-16">
      <i data-feather="credit-card" class="block w-12 h-12 text-theme-1 dark:text-theme-10 mx-auto"></i>
      <div class="text-xl font-medium text-center mt-10 @if ($plan->default){{ 'border-wave-400 text-wave-500' }}@else{{ 'border-gray-900 text-gray-800' }}@endif rounded">{{ $plan->name }}
      </div>
      <ul class="flex flex-col space-y-2.5 items-center">
        @foreach ($features as $feature)
        <li class="relative ">

          <span class="flex items-center">
            <svg class="w-4 h-4 mr-3 text-green-500 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"></path>
            </svg>

            <span>
              {{ $feature }}
            </span>
          </span>
        </li>
        @endforeach
      </ul>
      <div class="text-gray-600 dark:text-gray-400 px-10 text-center mx-auto mt-2">{{ $plan->description }}
      </div>
      <div class="flex justify-center">
        <div class="relative text-5xl font-semibold mt-8 mx-auto"> <span class="absolute text-2xl top-0 left-0 text-gray-600 -ml-4">$</span> {{ $plan->price }}
        </div>
      </div>
      <a data-plan="{{ $plan->plan_id }}" href="{{ url('register') }}" class="btn btn-rounded-primary py-3 px-4 block mx-auto mt-8 @if ($plan->default){{ ' bg-gradient-to-r from-wave-600 to-indigo-500 hover:from-wave-500 hover:to-indigo-400' }}@else{{ 'bg-gray-800 hover:bg-gray-700 active:bg-gray-900 focus:border-gray-900 focus:shadow-outline-gray' }}@endif ">
        @subscribed($plan->slug)
        Bu Plana Abonesiniz
        @notsubscribed
        @subscriber
        Geçiş Yap
        @notsubscriber
        Hemen Başlayın
        @endsubscriber
        @endsubscribed
      </a>
    </div>

  </div>



  @endforeach
</div>
