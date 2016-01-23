<div class="ladybug" style="position: fixed; bottom: 20px; right: 20px">
    <a class="btn btn-lg btn-social-icon btn-github" data-toggle="modal" data-target="#ladybug">
        <i class="fa fa-bug"></i>
    </a>
</div>

<div class="modal fade" id="ladybug" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="z-index:99999999999">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Report a bug in <strong>{{ $controller }}</strong></h4>
            </div>
            <div class="modal-body">
                {!! BootForm::openHorizontal(['sm' => [4, 8], 'lg' => [2, 10]])->post()->action(route('bug')) !!}

                {!! BootForm::hidden('controller')->value($controller) !!}
                @if(!Auth::user())
                    {!! BootForm::email('Email', 'bugEmail')->required() !!}
                    {!! BootForm::text('Full Name', 'bugName')->required() !!}
                    <hr>
                @endif
                {!! BootForm::text('Title', 'bugTitle')->required() !!}
                {!! BootForm::textarea('Description', 'bugDescription')->rows(3)->required()->style('resizable:vertical;') !!}


                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
                {!! BootForm::close() !!}
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @if(!empty(Session::get('modal')) && Session::get('modal') == true)
        <script>
            $(function() {
                $('#ladybug').modal('show');
            });
        </script>
    @endif
@endsection