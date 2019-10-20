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
                <th class="col-4">Začiatok</th>
            @endif
            <th class="col-2">Stav</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($exams))
            @foreach($exams as $key=>$value)
                <tr class="row text-left">
                    <td class="col-2">{{ $key+1 }}</td>
                    <td class="col-4">{{ $value->name }}</td>
                    @if(!$agent->isMobile())
                        <td class="col-4">{{ $value->startDate }}</td>
                    @endif
                    <td class="col-2">
                        @if($value->startDate <= date("Y-m-d h:i:s", time()))
                            @if(!$value->taken)
                            <a href="{{ route('exams/run', ['id' => $value->id]) }}">Spustiť</a>
                            @else {{ $value->correctAnswers }}/{{ $value->questions }}
                            @endif
                        @else Nedostupný
                        @endif
                    </td>
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