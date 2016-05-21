<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/export.css" type="text/css" />
</head>
<body>
    <table>
        <tr>
            <th>序号</th>
            <th>队名</th>
            <th>项目名称</th>
            <th>中期报告</th>
            <th>最终作品</th>
            <th>队员姓名</th>
            <th>学校</th>
            <th>学院</th>
            <th>年级</th>
            <th>身份证号码</th>
            <th>手机</th>
            <th>邮箱</th>
            <th>证书邮寄地址</th>
            <th>指导老师</th>
        </tr>
        @foreach ($teams as $i=>$team)

            <tr>        
                <td rowspan="{{ $team->members->count() }}">{{ $i+1 }}</td>
                <td rowspan="{{ $team->members->count() }}">{{ $team->name }}</td>
                <td rowspan="{{ $team->members->count() }}">{{ $team->title }}</td>
                <td rowspan="{{ $team->members->count() }}">{{ $team->reportcount() }}</td>
                <td rowspan="{{ $team->members->count() }}">{{ $team->doccount()[7] }}</td>

                @for ($j = 0,$s = $team->members->first(); $j < 1; $j++)
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->univ->name }}</td>
                    <td>{{ $s->college }}</td>
                    <td>{{ $s->degree.$s->grade }}</td>
                    <td><span>{{ $s->id_num }}</span></td>
                    <td>{{ $s->phone }}</td>
                    <td>{{ $s->email }}</td>
                @endfor
                
                <td rowspan="{{ $team->members->count() }}">{{ $team->addr}}</td>
                <td rowspan="{{ $team->members->count() }}">
                    @foreach ($team->teachers as $t)
                        {{$t->name.'('.$t->univ->name.$t->college.')'}}<br>
                    @endforeach
                </td>
            </tr>


                @foreach ($team->members as $mc=>$m)
                @if($mc!=0)
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>{{ $m->name }}</td>
                    <td>{{ $m->univ->name }}</td>
                    <td>{{ $m->college }}</td>
                    <td>{{ $m->degree.$m->grade }}</td>
                    <td><span>{{ $m->id_num }}</span></td>
                    <td>{{ $m->phone }}</td>
                    <td>{{ $m->email }}</td>

                </tr>
                @endif
                @endforeach

            @endforeach
        


    </table>
</body>
</html>