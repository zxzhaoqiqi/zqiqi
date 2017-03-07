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

    <script type="text/javascript" src="/zqiqi.cn/Public/ueditor1_4_3/third-party/SyntaxHighlighter/shCore.js"></script>
    <link rel="stylesheet" href="/zqiqi.cn/Public/ueditor1_4_3/third-party/SyntaxHighlighter/shCoreDefault.css">
    <script type="text/javascript">
        SyntaxHighlighter.all();
    </script>


        <!--主体-->
        <main>
            <div class="container">
                <!--文章-->
                <div class="w66 left">
                    <article>
                        <div class="article">
                            <!-- 首页文章 -->
                            <block name="content_art">                            <div class="border">
                                <section>
                                    <h1><?php echo ($artData["title"]); ?></h1>
                                                                            <div class="tips">
                                            <?php if(is_array($artData['tag']['tname'])): foreach($artData['tag']['tname'] as $k=>$v): ?><span class="btn-black btn  tip">
                                                    <i class="icon iconfont">&#xe6c5;</i> 
                                                    <a href="<?php echo U('List/index',array('tid'=>$artData[tag]['tid'][$k]));?>"><?php echo ($v); ?></a>
                                                </span><?php endforeach; endif; ?>
                                            <span class="con-time" style="padding: 0 10px;">发表时间：<?php echo (date('Y-m-d',$artData['sendtime'])); ?></span>
                                            <span class="con-author">作者：<?php echo ($artData['author']); ?></span>
                                            <span class="con-click" style="padding-left: 10px;">浏览次数：<?php echo ($artData['click']); ?></span>
                                        </div>

                                    <div class="text-content">
                                        <p class=""><?php echo ($artData["content"]); ?></p></p>
                                    </div>
                                    <?php if($pre OR $next): ?><div class="relation-art">
                                            <?php if($pre): ?><p class="pre">
                                                    <span class="col-1">上一篇</span><a href="<?php echo U('Content/Index',array('aid'=>$pre['aid']));?>"><?php echo ($pre['title']); ?></a>
                                                </p><?php endif; ?>
                                            <?php if($next): ?><p class="next">
                                                    <span class="col-1">上一篇</span><a href="<?php echo U('Content/Index',array('aid'=>$next['aid']));?>"><?php echo ($next['title']); ?></a>
                                                </p><?php endif; ?>
                                        </div><?php endif; ?>
                                </section>
                            </div>
                            <style type="text/css">
                                .text-content{
                                    font-size: 1.4rem;
                                    padding: 2rem 0;
                                }
                                .text-content p{
                                    line-height: 3.0rem;
                                    color: #3d4450;
                                }
                                .relation-art{
                                    font-size: 1.4rem;
                                }
                                .relation-art p{
                                    line-height: 2.5rem;
                                }
                                .relation-art .col-1{
                                    color: #d9534f;
                                }
                            </style>

                            <!-- 首页文章结束 -->
                        </div>
                    </article>
                </div>
                <!--文章结束-->
             <!--右侧-->
                <div class="right w33">
                    <asid>
                        <div class="">
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
                                        <li><a href="javascript:;">热门标签</a></li>
                                    </ul>
                                    <div class="bottom">
                                        <div id="" class="tags-cloud-show tag">
                                            <?php  $tagData = M('Tag')->select(); foreach ($tagData as $k => $v) { $tagData[$k]['count'] = M('ArticleTag')->where(array('tag_tid'=>$v['tid']))->count(); } foreach ($tagData as $k => $field): ?>
<a href="<?php echo U('List/index',array('tid'=>$field['tid']));?>" class="btn btn-read" style="font-size:12px;margin-right:20px;margin-bottom:10px;"><?php echo ($field["tname"]); ?>(<?php echo ($field["count"]); ?>)</a>
<?php endforeach ?>    
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <!--标签结束-->
                            <!--标签-->
                            <div class="border tags-cloud">
                                <section>
                                    <ul class="nav-pills">
                                        <li><a href="javascript:;">友情链接</a></li>
                                    </ul>
                                    <div class="bottom">
                                        <div id="" class="tags-cloud-show link">
                                            <?php
 $linkData = M('Link')->select(); foreach ($linkData as $k => $field) : ?>
<?php if(!empty($field)): ?><ul>
                                                        <li><a href="<?php echo ($field['url']); ?>" target="_block"><?php echo ($field['lname']); ?></a></li>
                                                    </ul><?php endif; ?>
<?php endforeach ?>
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
                cursor: pointer;
            }
            #to-top .to-top{
                font-weight: 600;
                line-height: 48px;
                font-size: 40px;
            }
            #to-top:hover{
                /*transform: rotateY(360deg);
                -webkit-transform: rotateY(360deg);
                -moz-transform: rotateY(360deg);
                -o-transform: rotateY(360deg);*/
                opacity: .7; 
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