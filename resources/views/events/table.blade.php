<div class="panel panel-default">
    <div class="panel-heading">{{ $title or ''}}</div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Názov</th>
            <th>Autor</th>
            <th>Link</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($all_events))
            @foreach($all_events as $index=>$event)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{$event->header}}</td>
                    <td>{{$event->user->name}}</td>
                    <td><a href="{{ route('events/detail', ['id' => $event->id]) }}">Detail</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td  colspan="4" align="center">Žiadne udalosti neboli nájdené</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>