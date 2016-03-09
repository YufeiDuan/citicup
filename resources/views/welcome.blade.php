<!DOCTYPE html>
<html>
	<head>
		<title>2016花旗杯</title>
		
		<!-- Fonts -->
		<link href='//fonts.useso.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
				<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<script src="/js/jquery.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/welcome.js"></script>

		<link href="{{ asset('/css/docs.min.css') }}" rel="stylesheet">
		<link rel="stylesheet" href="/css/welcome.css" type="text/css" />
	</head>
	<body>
		<div class="">
			<div class="bgimg">
				<div class="box">
					<div class="login_box">
						
						<div class="info">
							@if (count($errors) > 0)
								@foreach ($errors->all() as $error)
								{{ $error }}
								@endforeach
								@endif
						</div>
						
						<form role="form" method="POST" action="{{ url('/auth/login') }}">
							<div class="inputbox">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
									

									<input type="email" name="email" value="{{ old('email') }}" placeholder="邮箱" class="form-control input" style="background-color:#fff">
									<br>

									<input type="password" name="password" placeholder="请输入密码" class="input form-control">

									<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"><span>记住我</span>
									</label>
									<div class="forget">
										<a href="{{url('/pwd/apply')}}">忘记密码</a>
									</div>
								</div>
							</div>
							
							<div class="button">
								<button type="submit" class="btn btn-success btn-block">登录</button>
							</div>
							
						</form>
						<div class="reg">
						<a>没有团队？</a><a href="{{url('/register')}}">立即组建</a>
					</div>
					</div>
				</div>
			</div>
			
		</div>
		  <div class="container bs-docs-container">

      <div class="row">
        <div class="col-md-9 docs" role="main" >
          <div class="bs-docs-section">
              <h1 id="cp-overview" class="page-header">大赛介绍</h1>
              <h2 id="cp-showing">大赛概要</h2>
              <p>为了加强对金融信息化复合型人才的培养，促进中国金融信息科技的快速发展，花旗于2004年4月正式成立了花旗金融信息科技教育项目。“花旗杯”金融创新应用大赛(原“花旗杯”金融与信息技术应用大赛，以下简称“花旗杯”大赛)作为项目的重要组成部分，旨在引导学生在校园阶段即开始重视所学知识与金融产业发展、社会进步相结合。激发学生对科学技术和金融产业的热爱，鼓励通过团队协作，综合运用所学知识，迸发金融创新的奇思妙想，提出具有商业化前景的解决方案。
“花旗杯”大赛自2005年成立至今，在中国政府，教育界及产业界多年来的共同关注与见证下，已经发展成为中国金融信息化领域的标杆性赛事。据不完全统计，已有累计超过12,000多名学生和1,300多名老师报名参赛，55万余名师生通过各种渠道知晓大赛。同时，通过大赛的知识与经验积累，历届参赛同学毕业后，在金融、信息技术等相关行业领域的就业或创业中更是表现不俗。</p>
			<h2 id="cp-background">大赛背景</h2>
			<p>信息技术(IT)是金融服务业发展的基础驱动力。随着中国经济继续开放和发展,一个健康的,有助于中国金融业进步的IT领域对于中国的金融行业和中经济环境同样重要。在当前教育体系下的中国学生缺乏动手的经验，也没有全面意识到技术在金融行业中的重要性。解决上述问题将会有极度益于经济发展。
旨在宣传培养IT人才的重要性，尤其是金融信息化人才的培养，支持中国教育发展，加快金融行业信息技术的健康发展，为长期发展留住人才，花旗金融信息发起了软件类竞赛以鼓励金融信息创新。
				</p>
				<h2 id="cp-main">大赛主旋律</h2>
				<p>创新与完善</p>
				<h2 id="cp-goal">大赛目标</h2>
				<p>引导在校大学生关注科技在金融业的应用，探索运用所学技术解决或改进目前金融业发展过程中所面临的挑战</p>
				<h2 id="cp-influence">大赛影响力</h2>
				<p>大赛及最终获奖学校,带队老师，学生团队和作品名单会在全国相关主流媒体予以报道公布。</p>
				<h2 id="cp-object">参赛对象</h2>
				<p>全国在校优秀大学生</p>
				<h2 id="cp-major">专业</h2>
				<p>专业不限(包括但不限于软件、计算机、经济、信息、金融、管理或语言等各专业)</p>
				<h2 id="cp-schedule">大赛大致日程安排</h2>
				<p>即日起-6月30日	大赛组委会接受在线或人工报名注册<br>
8月1日前	提交项目报告(以确认继续参赛资格)<br>
9月15日前(以提交时间或邮戳为准)	提交完整参赛作品<br>
10月1日-10月15日	大赛作品首轮评选<br>
10月15日(暂定)	首轮评选揭晓<br>
11月19日-11月22日(暂定)	单项奖入围赛、决赛及颁奖典礼</p>
				<h2 id="cp-reward">奖励设置</h2>
				<p>所有参赛学校将根据报名队伍、提交项目报告队伍、提交完整参赛作品队伍、入围决赛队伍的数量，综合排名评选出5所“最佳合作组织奖”学校。 
所有参加并最终成功提交完整作品的团队成员均可获得大赛参赛证明。

前8支队伍将成功晋级现场排名总决赛，并可选派2名队员代表现场参赛，前20其余12支队伍可选派1名队员代表参加单项奖入围赛。以上相关差旅费用均由大赛组委会承担，其他团队成员也可自愿报名现场观摩，但相关差旅费用将自理或由各合作院校自行承担。

前20支队伍，确认资格有效的，由花旗金融信息服务(中国)有限公司(以下简称“花旗金融信息”)向参赛学生和带队老师颁发获奖证书和相应的奖金。奖金将经由各合作学校发放。

前20队伍成员中，计算机、软件和信息管理等相关专业同学，一经面试通过即可获得花旗金融信息实习机会(签订三方协议)，实习结束后公司将根据其表现考虑是否录取。金融和管理等其它相关专业同学，也将被优先推荐至花旗银行人力资源部。</p>

          </div>


        </div>

        
        <div class="col-md-3 scrollspy" role="complementary">
          <nav class="bs-docs-sidebar ">
            <ul class="nav navbar-nav bs-docs-sidenav" id="menu">
            
                <li class="dropdown-toggle" data-toggle="dropdown">
				  <a href="#cp-overview" class="mainmenu">大赛介绍</a>
				  <ul class="nav">
				    <li><a href="#cp-showing">大赛概要</a></li>
				    <li><a href="#cp-background">大赛背景</a></li>
				    <li><a href="#cp-main">大赛主旋律</a></li>
				    <li><a href="#cp-goal">大赛目标</a></li>
				    <li><a href="#cp-influence">大赛影响力</a></li>
				    <li><a href="#cp-object">参赛对象</a></li>
				    <li><a href="#cp-major">专业</a></li>
				    <li><a href="#cp-schedule">大赛大致日程安排</a></li>
				    <li><a href="#cp-reward">奖励设置</a></li>
				    <li><a href="#cp-topic">参赛题目</a></li>
				    <li><a href="#cp-work">参赛作品说明及注意事项</a></li>
				    <li><a href="#cp-rule">竞赛规则</a></li>
				    <li><a href="#cp-item">作品评分项分值</a></li>
				  </ul>
				</li>

				<li class="dropdown-toggle" data-toggle="dropdown">
				  <a href="#overview" class="mainmenu">大赛报名</a>
				  <ul class="nav sub-menu">
				    <li><a href="#showing">大赛概要</a></li>
				    <li><a href="#js-data-attrs">大赛背景</a></li>
				    <li><a href="#js-programmatic-api">大赛主旋律</a></li>
				    <li><a href="#js-noconflict">大赛目标</a></li>
				    <li><a href="#js-events">大赛影响力</a></li>
				    <li><a href="#js-version-nums">参赛对象</a></li>
				    <li><a href="#js-disabled">专业</a></li>
				    <li><a href="#callout-third-party-libs">大赛大致日程安排</a></li>
				    <li><a href="#callout-third-party-libs">奖励设置</a></li>
				    <li><a href="#callout-third-party-libs">参赛题目</a></li>
				    <li><a href="#callout-third-party-libs">参赛作品说明及注意事项</a></li>
				    <li><a href="#callout-third-party-libs">竞赛规则</a></li>
				    <li><a href="#callout-third-party-libs">作品评分项分值</a></li>
				  </ul>
				</li>
				<div style="width:200px;">
					<a class="back-to-top" style="color:#999;font-size:13px;" href="#top">
		              返回顶部
		            </a>
				</div>
              
            </ul>
            
            
          </nav>

        </div>
        
      </div>
    </div>
    <div class="footer">
    	版权所有：西安交通大学软件学院</div>
	</body>
</html>
<!--<div class="title">Laravel 5</div>
<div class="quote">{{ Inspiring::quote() }}</div>-->