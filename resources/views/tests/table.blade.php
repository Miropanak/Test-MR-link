<div class="panel panel-default">
    <div class="panel-heading">
        {{ $title }}
    </div>
    <table class="table table-hover">
        <thead>
            <tr class="row">
                <th class="col-2">#</th>
                <th class="col-4">Názov</th>
                @if(!$agent->isMobile())
                    <th class="col-4">Autor</th>
                @endif
                <th class="col-2">Akcia</th>
            </tr>
        </thead>
        <tbody>
        @if(isset($tests))
            @foreach($tests as $key=>$value)
                <tr class="row text-left">
                    <td class="col-2">{{ $key+1 }}</td>
                    <td class="col-4">{{ $value->title }}</td>
                    @if(!$agent->isMobile())
                        <td class="col-4">{{ $value->activity->author->name }}</td>
                    @endif
                    <td class="col-2"><a href="{{ route('test/run', ['id' => $value->id]) }}">Spustiť</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td  colspan="4" align="center">Žiadne testy neboli nájdené</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>