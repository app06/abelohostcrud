@if($graphLabels && $graphValues)
    <div class="chart" data-labels="{{$graphLabels}}" data-values="{{$graphValues}}">
        <canvas id="chart" width="500" height="300"></canvas>
    </div>
@else
    <div class="alert alert-info">Нет данных</div>
@endif
