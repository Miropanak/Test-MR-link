<div class="panel panel-default">
    <div class="panel-heading">
        {{ $title }}
    </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>Verejná</th>
            <th>Názov</th>
            <th>Študíjny odbor</th>
            @if(!$agent->isMobile())
                <th>Autor</th>
            @endif
            <th>Link</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($activities))
            @foreach($activities as $index=>$value)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>@if($value->public == true)
                            <i class="fa fa-unlock" aria-hidden="true"></i>
                        @else
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        @endif
                    </td>
                    <td>{{ $value->title }}</td>
                    <td>{{ $value->studyField->name }}</td>
                    @if(!$agent->isMobile())
                        <td>{{ $value->author->name }}</td>
                    @endif
                    <td><a href="{{ route('activities/detail', ['id' => $value->id]) }}">Detail</a></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td  colspan="6" align="center">Žiadne aktivity neboli nájdené</td>
            </tr>
        @endif
        </tbody>

    </table>
</div>