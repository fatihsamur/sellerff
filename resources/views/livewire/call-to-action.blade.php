<div>
  @if(session()->get('show-prime-message') != 'deactived' )
    <div>
        <div id="best_offer" class="alert alert-secondary alert-dismissible show flex items-center justify-center"
            role="alert">
            <i data-feather="alert-triangle" class="w-6 h-6 mr-2"></i>
            Prime Hizmetlerinden Yararlanabilmek için lütfen &#160;
            <a href="{{url("settings/plans")}}" class="btn btn-sm btn-primary  mr-1">Üyeliğinizi Prime'a Yükseltin</a>
            <button  wire:click="closeBanner()" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <i data-feather="x"
                    class="w-4 h-4"></i> </button>
        </div>
    </div>
    @endif


</div>
