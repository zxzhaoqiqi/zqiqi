<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo ($title); ?></title>
        <!--移动端设置-->
        <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
        
        <link rel="stylesheet" href="/zqiqi.cn/Public/Home/Mobile/font/iconfont.css">
        <link rel="stylesheet" type="text/css" href="/zqiqi.cn/Public/Home/Mobile/css/common.css"/>
        <link rel="stylesheet" type="text/css" href="/zqiqi.cn/Public/Home/Mobile/css/index.css"/>
        <script src="/zqiqi.cn/Public/Home/Mobile/js/jquery-2.1.0.js" type="text/javascript" charset="utf-8"></script>
        <script src="/zqiqi.cn/Public/Home/Mobile/js/index.js" type="text/javascript" charset="utf-8" defer="defer"></script>
    </head>
    <body>
    <!--头部-->
    <script type="text/javascript">
        $(function () {
            $('main').css({'margin-top' : $('header').height() + 'px'});
        })
    </script>
        <header>
            <div class="w100">
                <nav>
                    <div class="container nav-box">
                        <div id="logo">
                            <a href="/zqiqi.cn/Public/Home/Mobile/index.html"><img src="/zqiqi.cn/Public/Home/Mobile/img/logo.png" alt="" /></a>
                        </div>
                        <ul class="big-nav">
                            <li <?php if(MODULE_NAME == 'Home' and CONTROLLER_NAME == 'Index' and ACTION_NAME == 'index'): ?>class="bg-red"<?php endif; ?>>
                                <a href="<?php echo U('Index/index');?>">首页</a>
                            </li>
                            <?php
 $cateData = M('Category')->where('pid=0')->select(); foreach ($cateData as $k => $v) { $cateData[$k]['total'] = M('Article')->where(array('category_cid'=>$v['cid']))->count(); $cateData[$k]['son'] = M('Category')->where(array('pid'=>$v['cid']))->select(); } foreach ($cateData as $field) : ?>
<li <?php if($_GET['cid'] == $field['cid']): ?>class="bg-red"<?php endif; ?>>
                                    <a href="<?php echo U('List/index',array('cid'=>$field['cid']));?>"><?php echo ($field["cname"]); ?></a>
                                </li>
<?php endforeach ?> 
                            
                        </ul>
                        <div class="nav-toggle">
                                <i class="icon iconfont">&#xe696;</i>
                        </div>
                    </div>
                    <div class="nav-display-box">
                        <ul class="first-ul">
                            <li <?php if(MODULE_NAME == 'Home' and CONTROLLER_NAME == 'Index' and ACTION_NAME == 'index'): ?>class="bg-red"<?php endif; ?>>
                                <a href="<?php echo U('Index/index');?>">首页</a>
                            </li>
                           
                            <?php
 $cateData = M('Category')->where('pid=0')->select(); foreach ($cateData as $k => $v) { $cateData[$k]['total'] = M('Article')->where(array('category_cid'=>$v['cid']))->count(); $cateData[$k]['son'] = M('Category')->where(array('pid'=>$v['cid']))->select(); } foreach ($cateData as $field) : ?>
<li <?php if($_GET['cid'] == $field['cid']): ?>class="current_page_item"<?php endif; ?>>
                                    <a href="<?php echo U('List/index',array('cid'=>$field['cid']));?>"><?php echo ($field["cname"]); ?></a>
                                    <?php if($field['son']): ?><ul class="hover-show">
                                            <?php if(is_array($field['son'])): foreach($field['son'] as $key=>$v): ?><li><a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo ($v["cname"]); ?></a></li><?php endforeach; endif; ?>
                                        </ul><?php endif; ?>
                                </li>
<?php endforeach ?>
                        </ul>   
                    </div>
                    
                </nav>
            </div>
        </header>
        <!--头部结束-->

        <!--主体-->
        <main>
            <div class="container">
                <!--文章-->
                <div class="w66 left">
                    <article>
                        <div class="article">
                            <!-- 首页文章 -->
                            <block name="list_art">                            <?php if(is_array($artData)): foreach($artData as $key=>$v): if($v): ?><div class="border">
                                    <section>
                                        <h1><?php echo ($v["title"]); ?></h1>
                                                                                <div class="tips">
                                            <?php if(is_array($v['tag']['tname'])): foreach($v['tag']['tname'] as $key=>$val): ?><span class="btn-black btn  tip">
                                                    <i class="icon iconfont">&#xe6c5;</i> 
                                                    <a href="<?php echo U('List/index',array('tid'=>$v[tag]['tid'][$key]));?>" target="_block"><?php echo ($val); ?></a>
                                                </span><?php endforeach; endif; ?>
                                            <span class="con-time" style="padding: 0 10px;">发表时间：<?php echo (date('Y-m-d',$v['sendtime'])); ?></span>
                                            <span class="con-author">作者：<?php echo ($v['author']); ?></span>
                                           <!--  <span class="con-click" style="padding-left: 10px;">浏览次数：<?php echo ($v['click']); ?></span> -->
                                        </div>
                                        <a href="<?php echo U('Content/index',array('aid'=>$v['aid']));?>" class="border-img" target="_black"><img src="/zqiqi.cn/<?php echo ($v["thumb"]); ?>" alt=""/></a>
                                        <div class="box-content">
                                            <p class="content arc"><?php echo ($v["digest"]); ?></p></p>
                                            
                                        </div>
                                        <a href="<?php echo U('Content/index',array('aid'=>$v['aid']));?>" class="btn btn-more read-more" target="_black">
                                            阅读更多
                                            <span class="read"><?php echo ($v["click"]); ?></span>
                                        </a>
                                    </section>
                                </div><?php endif; endforeach; endif; ?>
                            <!-- 首页文章结束 -->
                        </div>
                    </article>
                </div>
                <!--文章结束-->
             <!--右侧-->
                <div class="right w33">
                    <asid>
                        <div class="">
                            <!-- <div class="border login">
                                <section>
                                    <div class="title">
                                        <div class="lefts">
                                            请登录
                                        </div>
                                    </div>
                                    <form action="" method="" class="login-form">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="icon iconfont">&#xe726;</i>
                                                </div>
                                                <input type="text" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon">
                                                    <i class="icon iconfont">&#xe6e1;</i>
                                                </div>
                                                <input type="password" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-black btn-left" name="submit" type="submit">登录</button>
                                            <a href="" class="btn btn-black btn-right">注册</a>
                                        </div>
                                    </form>
                                        
                                </section>
                            </div>
                            <div class="border serch ">
                                <section>
                                    <input type="text" name="serch" id="" value="" placeholder="请输入..."/>
                                    <div class="right-serch">
                                        <a href="" class="btn btn-more btn-serch"><i class="icon iconfont">&#xe6ac;</i></a>
                                    </div>
                                </section>
                            </div> -->
                            <div class="border hot-art">
                                <section>
                                    <div class="title">
                                        <div class="lefts">
                                            <i class="icon iconfont">&#xe6eb;</i>
                                            <span>最新文章</span>
                                        </div>
                                        <div class="rights">
                                            <i class="icon iconfont less" onclick="shou('.art')">&#xe6a5;</i>
                                            <i class="icon iconfont more" >&#xe6a6;</i>
                                            <i class="icon iconfont close">&#xe6b7;</i>
                                        </div>
                                    </div>
                                    <ul class="art">
                                        <?php
 $artData = M('Article')->order('sendtime desc')->limit(6)->select(); foreach ($artData as $k => $field) : ?>
<li>
                                            <span class="date"><?php echo (date("m",$field["sendtime"])); ?> <strong><?php echo (date("d",$field["sendtime"])); ?></strong></span>
                                            <a href="<?php echo U('Content/index',array('aid'=>$field['aid']));?>"><?php echo ($field["title"]); ?></a>
                                            <span class="btn  btn-read" style="padding: 0 8px"><?php echo ($field["click"]); ?></span>
                                        </li>
<?php endforeach ?>
                                    </ul>
                                </section>
                            </div>
                            <!--标签-->
                            <div class="border tags-cloud">
                                <section>
                                    <ul class="nav-pills">
                                        <li><a href="javascript:;" class="bgred">热门分类</a></li>
                                        <li><a href="javascript:;">热门标签</a></li>
                                        <li><a href="javascript:;">友情链接</a></li>
                                    </ul>
                                    <div class="bottom">
                                        <div id="" class="tags-cloud-show category">
                                            <ul>
                                                <?php
 $cateData = M('Category')->where('pid=0')->select(); foreach ($cateData as $k => $v) { $cateData[$k]['total'] = M('Article')->where(array('category_cid'=>$v['cid']))->count(); $cateData[$k]['son'] = M('Category')->where(array('pid'=>$v['cid']))->select(); } foreach ($cateData as $field) : ?>
<li>
                                                        <a href="<?php echo U('List/index',array('cid'=>$field['cid']));?>"><?php echo ($field["cname"]); ?></a>
                                                    </li>
                                                    <!-- <?php if($field['son']): if(is_array($field['son'])): foreach($field['son'] as $key=>$v): ?><li><a href="<?php echo U('List/index',array('cid'=>$v['cid']));?>"><?php echo ($v["cname"]); ?></a></li><?php endforeach; endif; endif; ?> -->
<?php endforeach ?>
                                            </ul>
                                        </div>
                                        <div id="" class="tags-cloud-show tag">
                                            <?php  $tagData = M('Tag')->select(); foreach ($tagData as $k => $v) { $tagData[$k]['count'] = M('ArticleTag')->where(array('tag_tid'=>$v['tid']))->count(); } foreach ($tagData as $k => $field): ?>
<a href="<?php echo U('List/index',array('tid'=>$field['tid']));?>" class="btn btn-read" style="font-size:12px;margin-right:20px;margin-bottom:10px;"><?php echo ($field["tname"]); ?>(<?php echo ($field["count"]); ?>)</a>
<?php endforeach ?>    
                                        </div>
                                        <div id="" class="tags-cloud-show link">
                                            <ul>
                                                <li><a href="">Bootstrap3</a></li>
                                                <li><a href="">WordPress</a></li>
                                                <li><a href="">Zanblog</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!--标签结束-->
                        </div>
                    </asid>
                </div>
                <!--右侧结束-->
            </div>
        </main>
        <!--主体结束-->
</block> 
<!--底部-->
        <footer>
            <div class="w100 foot">
                <div class="container center">
                    <p>ICP证：豫ICP备16006040号
联系邮箱：1352726123@qq.com</p>
                </div>
            </div>
        </footer>
        <!--底部结束-->
        <!-- 返回顶部 -->
        <div id="to-top" ><i class="iconfont to-top">&#xe6a5;</i></div>
        <style type="text/css">
            #to-top{
                text-align: center;
                display: none;
                width: 50px;
                height: 50px;
                /*background: url('/zqiqi.cn/Public/Home/Mobile/img/to-top.png') no-repeat;*/
                background: #D9534F;
                border-radius: 50%;
                position: fixed;
                bottom: 50px;
                right: 50px;
                transition: all 1s;
                -webkit-transition:all 1s;
                -moz-transition:all 1s;
                -o-transition:all 1s; 
            }
            #to-top .to-top{
                font-weight: 600;
                line-height: 48px;
                font-size: 40px;
            }
            #to-top:hover{
                transform: rotateY(360deg);
                -webkit-transform: rotateY(360deg);
                -moz-transform: rotateY(360deg);
                -o-transform: rotateY(360deg); 
            }
        </style>
        <script type="text/javascript">
            $('#to-top').click(function () {
                $('html,body').animate({
                    scrollTop : 0
                },1000)
            })
            var fix_nav = function () {
                var scrollTop = $(window).scrollTop();
                if(scrollTop > 0){
                    $('#to-top').css('display','block');
                }else{
                    $('#to-top').css('display','none');
                }
            }
            $(window).scroll(function () {
                fix_nav();
            })
        </script>
        <!-- 返回顶部结束 -->
    </body>
</html>