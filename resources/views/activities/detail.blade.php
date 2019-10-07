@extends('layouts.app')

@section('title',$activity->title)

@section('content')

    <div class="container">

        <div class="row" style="min-height:100px">
            <div class="col-md-8">
                <h1>
                    @if($activity->public == true)
                        <i class="fa fa-unlock" aria-hidden="true"></i>
                     @else
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    @endif

                    {{ $activity->title }}


                </h1>

            </div>

            <div class="col-md-4  hidden-sm">
                <p style="text-align:right;padding-top:20px"> {{ $activity->created_at }} <br/> {{$activity->studyField->name}}
                    ({{ $activity->studyField->code }})
                @if($activity->validated == true)
                    <br/>Zvalidovaná
                @endif
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">{!! $activity->content !!}</div>
                </div>
            </div>
        </div>

        <div class="panel panel-default" style="padding:20px">
            <div class="row">
                <div class="col-md-12">
                    <h3>Zoznam jednotiek</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @if($activity->public == true || Auth::user()->id == $activity->author->id || $registered == true)
                        @foreach ($activity->units as $unit)
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <div class="row" style="line-height:200%">
                                            <div class="col-md-8">
                                                <a data-toggle="collapse" href="#collapse{{$unit->id}}">{{$unit->title}}</a>
                                            </div>
                                            <div class="col-md-4 hidden-sm">
                                                @if(Auth::user()->id == $unit->activity->author->id)
                                                    <a class="pull-right" href="{{ route('units/edit', ['id' => $unit->id]) }}">
                                                        <button type="button" class="btn btn-success" title="Upraviť jednotku">
                                                            <i class="far fa-edit"></i>
                                                        </button>
                                                    </a>
                                                @endif
                                                    <a class="pull-right" href="{{ route('test/run', ['id' => $unit->id]) }}" style="margin-right: 10px">
                                                        <button type="button" class="btn btn-primary"  title="Spustiť informatívne testovanie">
                                                            <i class="fa fa-question"></i>
                                                        </button>
                                                    </a>
                                                    @if(Auth::user()->id == $unit->activity->author->id)
                                                    <form class="pull-right" method="POST"
                                                          action="{{ route('units.delete', $unit->id) }}"
                                                          onsubmit="return confirm('Chcete odstrániť jednotku z aktivity?');">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit"class="btn btn-danger" style="margin-right:10px" title="Odstrániť jednotku z aktivity">
                                                            <i class="far fa-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                    @endif
                                            </div>
                                        </div>
                                    </h4>
                                </div>
                                <div id="collapse{{$unit->id}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <p>{{$unit->description}}</p>
                                        <ul class="list-group">
                                            @foreach ($unit->events as $e)
                                                <form class="delete"
                                                      action="{{ route('unitsEvent.delete', ['id' => $unit->id, 'event_id' => $e->id]) }}"
                                                      method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <li class="list-group-item">
                                                        <a href="{{ route('events/detail', ['id' => $e->id]) }}">{{$e->header}}</a>
                                                        @if(Auth::user()->id == $activity->author->id)
                                                            <button type="submit"
                                                                    onclick="return confirm('Chcete odstrániť udalosť z jednotky?')"
                                                                    class="btn btn-danger"
                                                                    id="buttonDelete"
                                                                    style="margin-left:20px">

                                                                    <i class="far fa-trash-alt"></i>
                                                            </button>
                                                        @endif
                                                    </li>
                                                </form>
                                            @endforeach
                                        </ul>
                                        @if(Auth::user()->id == $activity->author->id)
                                            <a href="{{ route('events/new/unit', ['unit_id' => $unit->id]) }}">
                                                <button type="button" class="btn btn-success">Pridať novú udalosť</button>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if ( count($activity->units) == 0)
                            <span>V tejto aktivite sa nenachádzajú žiadne jednotky</span>
                        @endif
                    @endif
                </div>
            </div>
        </div>


        @if(Auth::user()->id == $activity->author->id )
        <div class="row">
            <div class="col-md-12">

                <a href="{{ route('units.new', ['activity_id' => $activity->id]) }}">
                    <button type="button" class="btn btn-success">Pridať novú jednotku</button>
                </a>

                <a href="/activities/edit/{{$activity->id}}" style="padding-left:0px">
                    <button type="button" class="btn btn-success">
                        <i class="far fa-edit"></i> Upraviť
                    </button>
                </a>

                @if($activity->validated == false)
                    <div style="float:right">
                        <form class="form-inline col-md-2" method="POST"
                              action="{{ route('activities.delete', $activity->id) }}"
                              onsubmit="return confirm('Ste si istý, že chcete vymazať vzdelávaciu aktivitu?');">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger">
                                    <i class="fa fa-trash-alt"></i> Vymazať
                                </button>
                            </div>
                        </form>
                    </div>
                @endif


            </div>
        </div>

        @elseif($activity->public == true)
            <div style="display: flex; justify-content: space-between">
                <form style="margin-right: 15px" class="form" method="post"
                             action="{{ route('activities.subscribe', $activity->id) }}">

                    {{ csrf_field() }}
                    <div class="form-group">


                        @if ($registered == false)
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-sign-in-alt"></i>&nbsp Prihlásiť
                            </button>
                        @else
                            <button type="submit" class="btn btn-danger">
                                <i class="far fa-times-circle"></i>&nbsp Odhlásiť
                            </button>
                        @endif

                    </div>
                </form>
                @if($activity->validated == false && (Auth::user()->id_user_types == 5 || Auth::user()->id_user_types == 6))
                    <form class="form" method="post"
                          action="{{ route('activities.validate', $activity->id) }}">

                        {{ csrf_field() }}

                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-thumbs-up"></i>&nbsp Validovať
                            </button>

                    </form>
                @endif
            </div>
        @endif

        @if(Auth::user()->id == $activity->author->id)

            <div class="row" style="padding-top:20px">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Zoznam prihlásených študentov</div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Meno</th>
                                    <th>E-mail</th>
                                    <th>Zruš registráciu</th>

                                </tr>
                            </thead>
                            <tbody>

                            @foreach($activity->subscriber as $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->name }}</td>
                                    <td>{{ $v->email }}</td>

                                        <td>
                                            <form action="{{ route('activities.expel', ['activity_id' => $activity->id]) }}" method="post">
                                                {{ csrf_field() }}

                                                <button type="submit" value="{{$v->id}}" class="btn btn-danger" name="data-name">Odhlásiť</button>

                                            </form>
                                        </td>
                                </tr>
                            @endforeach


                            </tbody>

                        </table>

                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('activities.invite', ['activity_id' => $activity->id]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <select id="select_users" name="select_users[]" class="form-control" multiple="multiple" style="width:50%">
                                    @foreach($users as $u)
                                        <option value="{{ $u->id }}">{{ $u->name }}</option>
                                    @endforeach
                                </select>

                                <button class="btn btn-success" type="submit">Pozvať</button>
                        </div>

                    </form>

                </div>
            </div>



        @endif

    </div>

@endsection

