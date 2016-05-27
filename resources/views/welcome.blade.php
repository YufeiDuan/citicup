<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="renderer" content="webkit">
		<title>2016 CitiCup</title>
		<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
		<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
		<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<script src="{{ asset('/js/welcome.js') }}"></script>

		<link rel="stylesheet" href="{{ asset('/css/welcome.css') }}">
		<link rel="stylesheet" href="{{ asset('/css/docs.min.css') }}">

	</head>
	<body>
		<div class="">
			<div class="logo">
				<img class="ilogo" src="img/citi.png" alt=""/>
				<img class="ilogo" src="img/xjtu.png" alt=""/>
				<img class="ilogo" src="img/cfg.png" alt=""/>
			</div>
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
				<p>全国在校大学生</p>
				<h3 id="comp-major" class="ytitle">专业</h3>
				<p>专业不限(包括但不限于软件、计算机、经济、信息、金融、管理或语言等各专业)</p>
				<h3 id="comp-title" class="ytitle">参赛题目</h3>
				<p>金融信息技术领域相关课题</p>

				<h3 id="comp-schedule" class="ytitle">大赛大致日程安排</h3>
				<table class="table table-bordered" align="center" id="schedule">
					<tr>
						<td>即日起至7月15日</td>
						<td>大赛组委会接受在线注册</td>
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
				<h2 id="comp-rule" class="xtitle page-header">竞赛规则</h2>
				<h3 id="comp-attention" class="ytitle">参赛作品说明及注意事项</h3>
				<ul>
				  <li>由参赛队独立完成的原创软件作品；每个参赛队伍只可递交一份参赛作品</li>
				  <li>参赛作品要有实用价值和无计算机病毒</li>
				  <li>参赛队递交作品时应拥有该作品的全部知识权利，不得有任何侵权行为，并符合相关法律规定，一经发现将被立即取消参赛资格，并自行承担相应责任。获奖后发现者，将取消其所获所有奖项</li>
				  <li>作品必须提供识产权的声明</li>
				</ul>
				<h3 id="comp-document" class="ytitle">参赛作品提交的内容</h3>
				<ul>
				  <li>项目报告(不评分项;以确认继续参赛资格)</li>
				  <li>作品商业计划书(评分项目; 中英文版本，文档格式不限)</li>
				  <li>作品技术文档(评分项目; 中英文版本，格式不限.包括需求文档、测试文档、用户手册、源代码等内容)</li>
				  <li>作品演示(仅决赛阶段评分项目;格式不限，中英文版本)</li>
				  <li>项目花絮(不计分项；Video或照片)</li>
				</ul>
				<p>以上所有文档的模板见报名网站作品上传页面(非要求，仅供参考)</p>
				<h3 id="comp-rating" class="ytitle">大赛作品评选</h3>
				<p>各队可自选适合的项目参赛，根据评委评定得分依次排序。前20团队为优胜团队，可参与单项奖角逐，前八团队晋级决赛。</p>
				<h3 id="comp-final" class="ytitle">现场总决赛</h3>
				<ul>
					<li>第九名至第二十名的团队可以参加单项奖入围赛，由评委代表进行评审，每队可以派一名代表参赛，展示环节时长10分钟，问答环节5分钟，获胜的前两支队伍可以在决赛期间与前八强一起进行最佳金融创意奖、最佳技术完成奖两个单项奖的角逐。</li>
					<li> 第九名至第二十名的团队获胜的前两支队伍在决赛环节可以派两名代表出赛，展示环节时长10分钟，问答环节10分钟。
  					</li>
					<li>前八强团队根据最终得分依次排列前三名(一等奖1名，二等奖2名，三等奖5名)。前八强演讲时间为25分钟由两名同学完成；问答环节为20分钟可以最多由五名同学参加（首先每个队员都要介绍自己在团队中承担的任务），评委可以指定回答队员。</li>
					<li>经评审团商议决定“最佳金融创意奖”获胜团队，该奖项可以空缺</li>
					<li>经评审团商议决定“最佳技术完成奖”获胜团队，该奖项可以空缺</li>
				</ul>
				
				<h3 id="comp-grade" class="ytitle">作品评分项分值</h3>
				<ol>
					<li>
						<b>创新性(20%)</b> 参考点:
						<ul>
							<li>技术进步与使用</li>
							<li>创新方法与效用</li>
							<li>社会与行业影响</li>
						</ul>
					</li>
					<li>
						<b>商业计划(20%)</b> 参考点:
						<ul>
							<li>项目概况</li>
							<li>市场分析</li>
							<li>管理团队</li>
							<li>财务分析</li>
						</ul>
					</li>
					<li>
						<b>IT开发(40%)</b> 参考点:
						<ul>
							<li>需求文档</li>
							<li>测试文档</li>
							<li>用户手册</li>
							<li>源代码</li>
							<li>数据结构</li>
							<li>完整产品或产品原型或演示版本</li>
						</ul>
					</li>
					<li>
						<b>现场陈述及答辩(20%)</b> 参考点:
						<ul>
							<li>商业陈述、技术陈述</li>
							<li>答辩质量</li>
						</ul>
					</li>
				</ol>
				<p>以上四点评分项括号内为该项所占总分权重；而各项之下的参考点描述为评分点参考。</p>
				<h3 id="comp-reward" class="ytitle">奖励设置</h3>
				<ul>
					<li>所有参赛学校将根据报名队伍、提交项目报告队伍、提交完整参赛作品队伍、入围决赛队伍的数量，综合排名评选出5所“最佳合作组织奖”学校。 </li>
					<li>所有参加并最终成功提交完整作品的团队成员均可获得大赛参赛证明。</li>
					<li>前8支队伍将成功晋级现场排名总决赛，并可选派2名队员代表现场参赛，前20其余12支队伍可选派1名队员代表参加单项奖入围赛。以上相关差旅费用均由大赛组委会承担，其他团队成员也可自愿报名现场观摩，但相关差旅费用将自理或由各合作院校自行承担。</li>
					<li>前20支队伍，确认资格有效的，由花旗金融信息服务(中国)有限公司(以下简称“花旗金融信息”)向参赛学生和带队老师颁发获奖证书和相应的奖金。奖金将经由各合作学校发放。</li>
					<li>前20队伍成员中，计算机、软件和信息管理等相关专业同学，一经面试通过即可获得花旗金融信息实习机会(签订三方协议)，实习结束后公司将根据其表现考虑是否录取。金融和管理等其它相关专业同学，也将被优先推荐至花旗银行人力资源部。</li>
				</ul>

				<table class="table table-bordered" align="center" id="schedule">
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
						<td rowspan="3">指导老师奖</td>
						<td>一等奖团队：证书+2,000美金/团队</td>
						<td>1团队</td>
					</tr>
					<tr>
						<td>二等奖团队：证书+1,000美金/团队</td>
						<td>2团队</td>
					</tr>
					<tr>
						<td>三等奖团队：证书+500美金/团队</td>
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
						<td>经上海市大学生科技创业基金会考察并准予加入“雏鹰计划”(RMB20万免息免抵押创业贷款)、或“雄鹰计划” (RMB50万创业资金+创业服务)
(详情参见<a href="http://www.stefg.org">基金会网站</a>)</td>
						<td>若干团队</td>
					</tr>
					<tr>
						<td>优胜奖</td>
						<td>荣誉证书</td>
						<td>12团队</td>
					</tr>
				</table>

			<h2 id="comp-signup" class="xtitle page-header">大赛说明</h2>
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

					<p>版权说明：<br> 
大赛严格遵守中华人民共和国版权法和有关知识产权的法律，大赛提交的作品都应注明真实作者和真实出处，作品版权归参赛队所有。大赛组委会有权在大赛涉及的范围内引用、发布、转载在大赛网站中参赛队公开发布的内容，同时承诺对参赛队各自发布的内容保密。大赛组委会对于参赛队发布的作品的原创性及内容所引发的版权、署名权的异议、纠纷不承担任何责任。媒体转载相应内容须事先与原作者和大赛组委会联系。</p>
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
				    <li><a href="#comp-title">参赛题目</a></li>
				    <li><a href="#comp-schedule">大赛大致日程安排</a></li>
				  </ul>
				</li>
				<li class="dropdown-toggle" data-toggle="dropdown">
				  <a href="#comp-rule" class="mainmenu">竞赛规则及奖励</a>
				  <ul class="nav">
				    <li><a href="#comp-attention">参赛作品说明</a></li>
				    
				    <li><a href="#comp-document">参赛作品提交的内容</a></li>
				    <li><a href="#comp-rating">大赛作品评选</a></li>
				    <li><a href="#comp-final">现场总决赛</a></li>
				    <li><a href="#comp-grade">作品评分项分值</a></li>
				    <li><a href="#comp-reward">奖励设置</a></li>
				  </ul>
				</li>

				<li class="dropdown-toggle" data-toggle="dropdown">
				  <a href="#comp-signup" class="mainmenu">大赛说明</a>
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