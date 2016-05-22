<!doctype html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/export.css" type="text/css" />
</head>
<body>
    <table>
        <tr class="header">
            <th>序号</th>
            <th>队名</th>
            <th>项目名称</th>
            <th>中期报告</th>
            <th>最终作品</th>
            <th>队员姓名</th>
            <th>性别</th>
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
                <td rowspan="{{ $number = $team->members->count() }}">{{ $i+1 }}</td>
                <td rowspan="{{ $number }}">{{ $team->name }}</td>
                <td rowspan="{{ $number }}">{{ $team->title }}</td>
                <td rowspan="{{ $number }}">
                    @if ($team->reportcount()==0)
                        未提交
                    @else
                        已提交
                    @endif
                </td>
                <td rowspan="{{ $number }}">
                    <?php 
                        switch ($team->doccount()[7]): 
                            case 0: echo "未提交"; break; 
                            case 7: echo "已提交"; break; 
                            default: echo "部分提交"; 
                        endswitch; 
                    ?>
                </td>

                @for ($j = 0,$s = $team->members->first(); $j < 1; $j++)
                    <td>
                        @if ($s->leader)
                            <b>{{ $s->name }}</b>
                        @else
                            {{ $s->name }}
                        @endif
                    </td>
                    <td>
                        @if ($s->sex)
                        男
                        @else
                        女
                        @endif
                    </td>
                    <td>{{ $s->univ->name }}</td>
                    <td>{{ $s->college }}</td>
                    <td>
                        <?php 
                        switch ($s->degree): 
                            case 0: echo "专"; break; 
                            case 1: echo "大"; break; 
                            case 2: echo "硕"; break; 
                            case 3: echo "博"; break; 
                        endswitch; 
                        switch ($s->grade): 
                            case 1: echo "一"; break; 
                            case 2: echo "二"; break; 
                            case 3: echo "三"; break; 
                            case 4: echo "四"; break; 
                            case 5: echo "五"; break; 
                            case 6: echo "六"; break; 
                            case 7: echo "七"; break; 
                            case 8: echo "八"; break; 
                        endswitch; 
                    ?>

                    </td>
                    <td><span>{{ $s->id_num }}</span></td>
                    <td><span>{{ $s->phone }}</span></td>
                    <td>{{ $s->email }}</td>
                @endfor
                
                <td rowspan="{{ $number }}">{{ $team->addr}}</td>
                <td rowspan="{{ $number }}">
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
                    <td>
                        @if ($m->leader)
                            <b>{{ $m->name }}</b>
                        @else
                            {{ $m->name }}
                        @endif
                    </td>
                    <td>
                        @if ($m->sex)
                        男
                        @else
                        女
                        @endif
                    </td>
                    <td>{{ $m->univ->name }}</td>
                    <td>{{ $m->college }}</td>
                    <td>
                    <?php 
                        switch ($m->degree): 
                            case 0: echo "专"; break; 
                            case 1: echo "大"; break; 
                            case 2: echo "硕"; break; 
                            case 3: echo "博"; break; 
                        endswitch; 
                        switch ($m->grade): 
                            case 1: echo "一"; break; 
                            case 2: echo "二"; break; 
                            case 3: echo "三"; break; 
                            case 4: echo "四"; break; 
                            case 5: echo "五"; break; 
                            case 6: echo "六"; break; 
                            case 7: echo "七"; break; 
                            case 8: echo "八"; break; 
                        endswitch; 
                    ?>
                    </td>
                    <td><span>{{ $m->id_num }}</span></td>
                    <td><span>{{ $m->phone }}</span></td>
                    <td>{{ $m->email }}</td>

                </tr>
                @endif
                @endforeach

            @endforeach
    </table>
</body>
</html>