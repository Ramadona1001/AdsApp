@if ($errors->any())
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card card-danger" @if(\Lang::getLocale() == 'ar') style="text-align: right;padding:10px;" @else style="padding:10px;" @endif>
            <div class="body text-danger">
                <h4 class="card-title">{{ transWord('Please fix errors') }}</h4>
                @foreach ($errors->all() as $error)
                    <p class="card-text">{{ $error }}</p>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
