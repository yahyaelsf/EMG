<form action="{{ route('admin.numbers.store') }}" method="post">

    @csrf

    @isset($number)
        <input type="hidden" name="pk_i_id" value="{{ $number->getKey() }}"/>
    @endisset

    <x-localizable-inputs :inputs="$inputs" :item="$number">
    </x-localizable-inputs>







    <div class="d-flex justify-content-end">
        <button type="submit" class="btn" style="background-color: #f90000 ; color :#fff">@lang('buttons.save')</button>
        <button type="button" class="btn btn-secondary ml-2" data-dismiss="modal">@lang('buttons.close')</button>
    </div>

</form>
