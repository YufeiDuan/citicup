<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<title>2016花旗杯</title>
		<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		< link rel="shortcut icon" type="image/x-icon" href="{{ asset('/img/xjtu.ico') }}" />

		<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<script src="{{ asset('/js/welcome.js') }}"></script>

		<link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/docs.min.css') }}">
	</head>
	<body>
		<div class="">
			<div class="bgimg">
				<div class="box">
					<div class="login_box">

						@if (count($errors) > 0)
						<script type="text/javascript">
							$(function() {
							  $('#email').attr('title',"{{$errors->first()}}");
							  $("#email").tooltip('show');
							  $('#email').tooltip({
							    trigger: 'manual'
							  })
							  .on('focus', function() {
							    $(this).tooltip('hide');
							  })
							  .on('blur', function() {
							    $(this).tooltip('hide');
							  });
							});
						</script>
						@endif

	
						<div class="inputbox">
							<form role="form" method="POST" action="{{ url('/auth/login') }}"  class="form-horizontal">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">

							<div class="input-group form-group">
						      <div class="input-group-addon">
						      	<i class="glyphicon glyphicon-envelope"></i>
						      </div>
						      <input type="email" id="email" name="email" class="form-control myinput" placeholder="请输入邮箱" value="{{ old('email') }}"  data-toggle="tooltip" title="Tooltip">
						    </div>

						    <div class="input-group form-group">
						      <div class="input-group-addon">
						      	<i class="glyphicon glyphicon-lock"></i>
						      </div>
						      <input type="password" id="password" name="password" class="form-control myinput" placeholder="请输入密码">
						    </div>
						    <div class="form-group">

								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"><span>记住我</span>
									</label>
									<div class="forget">
										<a href="{{url('/pwd/apply')}}">忘记密码</a>
									</div>
								</div>
							</div>
						    <div class="form-group">
								<button type="submit" class="mybtn btn btn-success btn-block">登&nbsp;&nbsp;&nbsp;&nbsp;录</button>
							</div>
							</form>
						</div>

						<div class="reg">
						<span class="noteam">没有团队？</span><a id="reg" href="{{url('/register')}}">立即组建</a>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		  <div class="container bs-docs-container">

      <div class="row">
        <div class="col-md-9 docs" role="main" >
          <div class="bs-docs-section">
          	  <h2 id="comp-news" class="xtitle  page-header">大赛要闻</h2>

              <h2 id="comp-overview" class="xtitle page-header">大赛介绍</h2>
              <h3 id="comp-showing" class="ytitle">大赛概要</h3>
              <p>为了加强对金融信息化复合型人才的培养，促进中国金融信息科技的快速发展，花旗于2004年4月正式成立了花旗金融信息科技教育项目。“花旗杯”金融创新应用大赛(原“花旗杯”金融与信息技术应用大赛，以下简称“花旗杯”大赛)作为项目的重要组成部分，旨在引导学生在校园阶段即开始重视所学知识与金融产业发展、社会进步相结合。激发学生对科学技术和金融产业的热爱，鼓励通过团队协作，综合运用所学知识，迸发金融创新的奇思妙想，提出具有商业化前景的解决方案。</p><p>
“花旗杯”大赛自2005年成立至今，在中国政府，教育界及产业界多年来的共同关注与见证下，已经发展成为中国金融信息化领域的标杆性赛事。据不完全统计，已有累计超过13,000多名学生和1,400多名老师报名参赛，55万余名师生通过各种渠道知晓大赛。同时，通过大赛的知识与经验积累，历届参赛同学毕业后，在金融、信息技术等相关行业领域的就业或创业中更是表现不俗。</p>
			<h3 id="comp-background" class="ytitle">大赛背景</h3>
			<p>信息技术(IT)是金融服务业发展的基础驱动力。随着中国经济继续开放和发展,一个健康的,有助于中国金融业进步的IT领域对于中国的金融行业和中经济环境同样重要。在当前教育体系下的中国学生缺乏动手的经验，也没有全面意识到技术在金融行业中的重要性。解决上述问题将会有极度益于经济发展。
旨在宣传培养IT人才的重要性，尤其是金融信息化人才的培养，支持中国教育发展，加快金融行业信息技术的健康发展，为长期发展留住人才，花旗金融信息发起了软件类竞赛以鼓励金融信息创新。
				</p>
				<h3 id="comp-main" class="ytitle">大赛主旋律</h3>
				<p>创新与完善</p>
				<h3 id="comp-goal" class="ytitle">大赛目标</h3>
				<p>引导在校大学生关注科技在金融业的应用，探索运用所学技术解决或改进目前金融业发展过程中所面临的挑战。</p>
				<h3 id="comp-influence" class="ytitle">大赛影响力</h3>
				<p>大赛及最终获奖学校,带队老师，学生团队和作品名单会在全国相关主流媒体予以报道公布。</p>
				<h3 id="comp-object" class="ytitle">参赛对象</h3>
				<p>全国在校优秀大学生</p>
				<h3 id="comp-major" class="ytitle">专业</h3>
				<p>专业不限(包括但不限于软件、计算机、经济、信息、金融、管理或语言等各专业)</p>
				<h3 id="comp-schedule" class="ytitle">大赛大致日程安排</h3>
				<table class="table" id="schedule">
					<tr>
						<td>即日起至7月15日</td>
						<td>大赛组委会接受在线或人工报名注册</td>
					</tr>
					<tr>
						<td>8月12日前</td>
						<td>提交项目中期报告（以确认继续参赛资格）</td>
					</tr>					
					<tr>
						<td>9月16日前(以提交时间或邮戳为准)</td>
						<td>提交完整参赛作品</td>
					</tr>					
					<tr>
						<td>10月1日-10月15日</td>
						<td>大赛作品首轮评选</td>
					</tr>
					<tr>
						<td>10月20日(暂定)</td>
						<td>首轮评选揭晓</td>
					</tr>
					<tr>
						<td>11月17日-11月20日(暂定)</td>
						<td>现场决赛及颁奖典礼</td>
					</tr>
				</table>
				<h3 id="comp-reward" class="ytitle">奖励设置</h3>
				<table class="table" id="schedule">
					<tr>
						<th style="width:120px;">奖项</th>
						<th style="width:400px;">奖励</th>
						<th>数量</th>
					</tr>
					<tr>
						<td>一等奖</td>
						<td>证书＋10,000美金/团队</td>
						<td>1团队</td>
					</tr>
					<tr>
						<td>二等奖</td>
						<td>证书＋5,000美金/团队</td>
						<td>2团队</td>
					</tr>
					<tr>
						<td>三等奖</td>
						<td>证书＋1,500美金/团队</td>
						<td>5团队</td>
					</tr>
					<tr>
						<td>最佳金融创意奖</td>
						<td>证书＋1,000美金/团队</td>
						<td>1团队</td>
					</tr>
					<tr>
						<td>最佳技术完成奖</td>
						<td>证书＋1,000美金/团队</td>
						<td>1团队</td>
					</tr>
					<tr>
						<td>最佳移动应用奖</td>
						<td>证书＋1,000美金/团队</td>
						<td>1团队</td>
					</tr>
					<tr>
						<td>最具投资潜力奖</td>
						<td>经上海市大学生科技创业基金会考察并准予加入“雏鹰计划”(RMB20万免息免抵押创业贷款)、或“雄鹰计划”(RMB50万创业资金+创业服务)
(详情参见<a href="http://www.stefg.org">基金会网站</a>)</td>
						<td>若干团队</td>
					</tr>
					<tr>
						<td>优胜奖</td>
						<td>荣誉证书</td>
						<td>12团队</td>
					</tr>
				</table>

			<h2 id="comp-signup" class="xtitle page-header">大赛报名</h2>
				<h3 id="signup-type" class="ytitle">大赛报名方式</h3>
					<ol>
					  <li>学生可自行访问“花旗杯”官方网站，点击“最新消息”中的“大赛报名详情”即可</li>
	font-size:16px;
					  <li>在线浏览并访问2016年“花旗杯”承办单位西安交通大学网站<a class="outlink" href="http://citicup.xjtu.edu.cn">http://citicup,xjtu.edu.cn</a> 进行注册</li>
					</ol>
				<h3 id="contact-info" class="ytitle">组委会联系方式</h3>
					<address>
					  <strong>徐静/陆骞/陈泰然</strong><br>
					  <abbr title="Phone">P:</abbr>&nbsp;021-28960965&nbsp;/&nbsp;28961100&nbsp;/&nbsp;28960898<br>
					  <a href="mailto:citi.cup.alumni@citi.com"><img id="mail" src="/img/mail.png"></a>
					</address>
				<h3 id="comp-guide" class="ytitle">大赛指导机构</h3>
					<p>花旗金融信息科技教育项目顾问委员会</p>
				<h3 id="comp-review" class="ytitle">大赛评审机构</h3>
					<p>“花旗杯”金融创新应用大赛专家评审委员会</p>
				<h3 id="comp-desc" class="ytitle">大赛说明</h3>
					<p>大赛进展通报、大赛详细说明及评选规则请邮件或传真查询大赛组委会。<br>
					花旗金融信息服务(中国)有限公司拥有本次大赛的最终解释权。<br>
					赞助机构：<a class="outlink" href="https://www.citibank.com.cn/">花旗中国</a><br>
					指导单位：<a class="outlink" href="http://www.sheitc.gov.cn/">上海市经济和信息化委员会</a><br>
					主办单位：<a class="outlink" href="http://www.citigroup.com/china/csts/index_cn.html">花旗金融信息服务(中国)有限公司</a><br>
					承办单位：<a class="outlink" href="http://www.xjtu.edu.cn" target="_blank">西安交通大学</a><br>
					协办单位：<a class="outlink" href="http://www.stefg.org">上海市大学生科技创业基金会</a></p>


          </div>


        </div>

        
        <div class="col-md-3 scrollspy" role="complementary">
          <nav class="bs-docs-sidebar ">
            <ul class="nav navbar-nav bs-docs-sidenav" id="menu">
            	<li>
            		<a href="#comp-news" class="mainmenu">大赛要闻</a>
            	</li>
                <li class="dropdown-toggle" data-toggle="dropdown">
				  <a href="#comp-overview" class="mainmenu">大赛介绍</a>
				  <ul class="nav">
				    <li><a href="#comp-showing">大赛概要</a></li>
				    <li><a href="#comp-background">大赛背景</a></li>
				    <li><a href="#comp-main">大赛主旋律</a></li>
				    <li><a href="#comp-goal">大赛目标</a></li>
				    <li><a href="#comp-influence">大赛影响力</a></li>
				    <li><a href="#comp-object">参赛对象</a></li>
				    <li><a href="#comp-major">专业</a></li>
				    <li><a href="#comp-schedule">大赛大致日程安排</a></li>
				    <li><a href="#comp-reward">奖励设置</a></li>
				    
				    {{--<li><a href="#comp-topic">参赛题目</a></li>
				    <li><a href="#comp-work">参赛作品说明</a></li>
				    <li><a href="#comp-rule">竞赛规则</a></li>
				    <li><a href="#comp-item">作品评分项分值</a></li>
				    --}}
				  </ul>
				</li>

				<li class="dropdown-toggle" data-toggle="dropdown">
				  <a href="#comp-signup" class="mainmenu">大赛报名</a>
				  <ul class="nav sub-menu">
				    <li><a href="#signup-type">大赛报名方式</a></li>
				    <li><a href="#contact-info">组委会联系方式</a></li>
				    <li><a href="#comp-guide">大赛指导机构</a></li>
				    <li><a href="#comp-review">大赛评审机构</a></li>
				    <li><a href="#comp-desc">大赛说明</a></li>
				   
				  </ul>
				</li>
				<li id="placeholder">
            		
            	</li>
				<div class="zback">
					<a class="back-to-top" id="back" href="#top">
		              返回顶部
		            </a>
				</div>
              
            </ul>
            
            
          </nav>

        </div>
        
      </div>
    </div>
    <div class="footer">
    	<div class="copyright">
    		版权所有@<a id="se" href="http://se.xjtu.edu.cn">西安交通大学软件学院</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    		地址：陕西省西安市咸宁西路28号&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    		邮编：710049&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
    		陕ICP备05001571号 
		</div>
    </div>
	</body>
</html>