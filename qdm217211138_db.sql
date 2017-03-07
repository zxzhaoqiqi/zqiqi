/*
Navicat MySQL Data Transfer

Source Server         : zqiqi.cn
Source Server Version : 50173
Source Host           : qdm217211138.my3w.com:3306
Source Database       : qdm217211138_db

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2016-04-12 20:53:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `zqiqi_article`
-- ----------------------------
DROP TABLE IF EXISTS `zqiqi_article`;
CREATE TABLE `zqiqi_article` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(150) NOT NULL DEFAULT '',
  `click` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `sendtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
  `thumb` varchar(255) NOT NULL DEFAULT '',
  `digest` varchar(255) NOT NULL DEFAULT '',
  `author` varchar(20) NOT NULL DEFAULT '',
  `user_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '所属用户uid',
  `category_cid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类cid',
  `is_recyle` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`aid`),
  KEY `fk_article_user_idx` (`user_uid`),
  KEY `fk_article_category1_idx` (`category_cid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of zqiqi_article
-- ----------------------------
INSERT INTO `zqiqi_article` VALUES ('1', '一杯浓浓的咖啡', '10', '1451401249', '0', 'Uploads/Uploads/1229/56829f74b4886.jpg', '公元10世纪先后，在非洲埃塞俄比亚高原的土地上，有一名牧羊人名叫卡尔。某天，他看到他的一群山羊突然都显得兴奋无比，有反常态。他觉得非常奇怪，于是细心的观察起它们，最终发现这群山羊兴奋的原因是因为吃了树上红色的果实。充满好奇的卡尔忍不住也尝试了一些，发现自己也感到精神的振奋、爽快。于是，他开始采摘这些不可思议的红色果实并把它们带回了家。回家以后，他试着煎煮这些红果子，满室的芳香，熬成的汁液喝下以后更是精神振奋、神清气爽。卡尔把他的发现分享给他的邻居们，最终这种果实的神奇效力也就因此流传了开来，渐渐地它成为了', '雨莜', '0', '5', '0');
INSERT INTO `zqiqi_article` VALUES ('2', '若是如果', '8', '1451401677', '0', 'Uploads/Uploads/1229/5682a18006884.jpg', '每一个懦弱的人总渴望一份刻骨的爱情，可是自己的不勇敢，就将彼此划为了不同世界的两个人。总是想得到你，想在每个早晨看见你的笑，想在每个夜晚对你轻语晚安，想在每个梦中有你相伴。越是想要，却总是在远离。', '七七', '0', '10', '0');
INSERT INTO `zqiqi_article` VALUES ('3', '当你在远方的时候', '15', '1451401821', '0', 'Uploads/Uploads/1229/5682a219a6947.jpg', '你总追寻抓不住的东西 不属于一个、你所在的时空里 当你在另一个世界、另一度空间 我亦无法触及你的身影 我于是将源源不断的思念 化作这喧嚣世界里的', '七七', '0', '7', '0');
INSERT INTO `zqiqi_article` VALUES ('4', '窗外的世界', '12', '1451401991', '0', 'Uploads/Uploads/1229/5682a2bb1eae9.jpg', '看窗外的世界，听秋意徐徐的声音，静穆轻盈的风声，舞动着轻柔的秀发，晃动着泛黄的树叶；柔发轻舞，落叶飞下，燃起几片秋思。在这忽虚忽实的世界里，是谁 在风中驻立，等待着另一份期待；风轻云淡的日子，真情不会忘记，坚守最初的言语，', '雨莜', '0', '8', '0');
INSERT INTO `zqiqi_article` VALUES ('5', '甜甜的苦井茬', '13', '1451402595', '0', 'Uploads/Uploads/1229/5682a50c08e9b.jpg', '茶如人生，淡中有味，虚怀若谷，怡然自得。喝出了苦和甜，清和涩。人生就是一本书，谱写出了成功和失败，幸福和快乐。人生必有一知己无话不谈，无话不说。人生何求？就像一杯茶、一本书、一知己……', '七七', '0', '6', '0');
INSERT INTO `zqiqi_article` VALUES ('6', '不一样的烟火', '31', '1451402896', '0', 'Uploads/Uploads/1229/5682a66a94dc3.jpg', '一个人的一生，就是一座有了年岁的城墙，用无数个青翠的日月堆砌而成。日子是一砖一瓦，生命是一梁一柱。城墙里，因为生活，因为情感，而充盈丰满。阡陌红尘，独自前行，青萝拂衣，清风绕袖；寂静的在自己的世界里，安稳的成长，不辜负人生大好韶光；品茶听雨，清静从容；因为我们的一生俯瞰苍穹，渺若尘浮。', '七七', '0', '4', '0');

-- ----------------------------
-- Table structure for `zqiqi_article_data`
-- ----------------------------
DROP TABLE IF EXISTS `zqiqi_article_data`;
CREATE TABLE `zqiqi_article_data` (
  `content` text COMMENT '文章内容',
  `article_aid` int(10) unsigned NOT NULL,
  KEY `fk_article_data_article1_idx` (`article_aid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章数据表';

-- ----------------------------
-- Records of zqiqi_article_data
-- ----------------------------
INSERT INTO `zqiqi_article_data` VALUES ('<p>童年的回忆 <br/>童年似一杯浓浓的咖啡,暖到你心窝,童年似一杯淡淡的茶,让你回味；童年似暴风雨的彩虹；五颜六色,炫丽无比；童年又似\r\n那晚霞后的余光,那么让人怀念；又似那弯弯的小路,让你成长.风儿不可能将这温馨的回忆给吹掉；雨儿不可能把这一件一件感人的旋律掩没,只有可爱的阳光将\r\n它照射,将它保存.<br/>回想那一件件儿时不起眼的事儿来,事虽然小,但那些回忆是那样觉得感动,因为有了这些回忆才能让自己不断进步,不断追断求,这\r\n样才能成长起来,童年总叫人回想.回想那五彩缤纷的梦,回想起那丫丫学语的时候,回想起刚学走路的时候,第一次踏上舞台的时候,第一次叫出父母时,第一\r\n次.那一刻刻,那一个个镜头,霎时间浮现在你的眼前.<br/>那是一个无法忘记的回忆,无法忘记的童年,第一次背起了新书包上学的那一天,终干能和别的孩\r\n子一样上学,对我而言这就是我的历史性的一刻,父母拿着照相机把这最开心最难忘的模样拍照下来,这也成了父亲和母亲最安慰的一项,这也成了家里最快乐的写\r\n照,这难忘的一刻,这么美好这么甜美,它一直在我脑海里浮现.可是美好的只是过去的,在温长的日子里,一次次磨练后,把软弱的自己磨练得像钢一样坚硬,学\r\n习的压力,没有人会知道,没有人会可怜,在那树叶落光的秋天里,只有苦熬的干劲,只有失去了的快乐,这就是苦的.儿时在百花齐放的春天,拥有着,美好梦想\r\n的童年,一晃而过.<br/>至今在现实的残酷面前不会掉泪,泪都是会被那乌云所掩盖.儿时的泪是那么软弱,那么小气.童年的梦是五颜六色的,像百花齐放般\r\n的美好,让人回味,让人忘返,那时没有任何忧虑,没有任何烦恼.童年的梦又如在夜空中,那么宽阔,那么宁静,童年的梦又如无数的星星,它们只会眨着眼,诚\r\n实和从容………无数的星星如无数的梦 ,灌入了小小的脑袋中,从此我思考着无数的问题.<br/>蓝天下的成长,夜空中的梦想又如在沙滩上堆积起一座座小小\r\n的城堡,堆积起在蓝色海边的梦;儿是总是喜欢在榕树下玩耍,又喜欢在那静静地坐着,听着老人讲那古老的故事,那时的梦是绿色的;儿时总是喜欢在老家门前坐\r\n着,在落叶的秋天里欣赏那一片片穿着金色的叶子在漫天飞舞,那时的梦是金黄色的.儿时总是喜欢做梦,在梦里走着找不到出口迷宫,一次一次地被锁在迷宫里,\r\n心里那么迷茫,在现实生活中,激起我斗志时,那时那梦是火一般的颜色……… <br/>回忆让世界一切万物变得安静,让人变得放松,让人感到温暖,让你回想起遥远而不遥远的梦,让你回想起在雨中,那雨儿是跳动的旋律.当你摔倒时,一种力量在看着你,让你回想起在蓝天下放飞纸飞机,放飞你一个个让你期待的梦.<br/>时钟只有前进,不可能倒退.童年只有回味和回忆……..<br/>童年只有回忆,梦只有创造,将来只有拼搏………..<br/>童年以是过去的事了,只有回忆起那点点滴滴的事,只有积累更多的经验,这路才能走得更远更宽.每个人都拥有自己五彩缤纷的童年 ,童年是人生最珍贵的东西,它是你一生的开始,拥有着它那你就拥有一生,我们应该好好地珍惜它.<br/>梦常常都会变化着,梦是人一生中追求的目标,只有奋斗和拼搏,那才会梦想成真,那才会成为现实.<br/>… <br/>只有回忆一切都会让你觉得美好……</p>', '1');
INSERT INTO `zqiqi_article_data` VALUES ('<p>以为过去了，就不在会想起。</p><p>以为不珍惜，就不在会心疼。</p><p>以为不拥有，就不在会怀念……</p><p>可是……</p><p>两年以前，不曾会想到你的离去会是永远的离别。两年以前只是会偷偷的看你离去是多么的无觉。只怪自己没有告白的勇气，让爱从时光中溜走。</p><p>无论自己多么勇敢的幻想，多么没有底限的梦到你。可是那依然只是幻想的童话，现实摆在你我之间，像一层枷锁。</p><p>每一个懦弱的人总渴望一份刻骨的爱情，可是自己的不勇敢，就将彼此划为了不同世界的两个人。总是想得到你，想在每个早晨看见你的笑，想在每个夜晚对你轻语晚安，想在每个梦中有你相伴。越是想要，却总是在远离。</p><p>习惯了你的认真伴随我的傻呆，习惯了你的暖笑陪伴我的孤冷，习惯了我的世界有你的渗透。当我习惯了一切，却不能习惯没有你的一切。</p><p>离开的日子留存在夏天的午后，我却在秋天的落日中依然想念着你，思念覆盖了我的夏，忧伤了我的秋，我却发现，依然在落雪的日子爱的还是你。</p><p>你说，若是有缘便会相聚。</p><p>我说，有缘又何必要分离。</p><p>两年，不能改变什么的。</p><p>两年，却可以改变缘。</p><p>你的转身，我俯身抱头没有挽留。</p><p>如今，我想到你，却不能拥抱你。</p><p>如果那个阳光明媚的午后我抱住了你，也许你不会离开，可那也只是也许。</p><p>可是，我只想大声告诉你，你一直在我世界里，太多的过去难以忘记，太心疼你，才选择不放弃也不勉强。</p><p>只是，我再也不懂你的心……</p><p><br/></p>', '2');
INSERT INTO `zqiqi_article_data` VALUES ('<p>当你在远方的时候<br/>每一缕的牵挂和忧愁<br/>都凝固在岁月和时光里<br/>真情和友谊<br/>不曾随岁月消逝殆尽<br/>你渴望去触及那美好<br/>你渴望去倾听<br/>你总追寻抓不住的东西<br/>不属于一个、你所在的时空里<br/>当你在另一个世界、另一度空间<br/>我亦无法触及你的身影<br/>我于是将源源不断的思念<br/>化作这喧嚣世界里的<br/>这催促着我、差使我机械般前进的这世界里<br/>最无力、也最无休无止、欲说还休的温柔<br/>你未曾见过我、<br/>未曾知晓一个我的存在<br/>你曾在雨中行走<br/>你从不打伞<br/>你有你的天空<br/>它从不下雨</p>', '3');
INSERT INTO `zqiqi_article_data` VALUES ('<p>看窗外的世界，听秋意徐徐的声音，静穆轻盈的风声，舞动着轻柔的秀发，晃动着泛黄的树叶；柔发轻舞，落叶飞下，燃起几片秋思。在这忽虚忽实的世界里，是谁\r\n在风中驻立，等待着另一份期待；风轻云淡的日子，真情不会忘记，坚守最初的言语，许是只因情真意在，像是夏日里的阳光般灿烂，秋日里一抹夕阳般地绚丽，这\r\n是否同样是你的真实世界？几许哀叹，几些伤愁，流水行云，鸿雁独行，冥想起了什么？行人匆匆，夜色匆匆，没有休止的音符，轻拂的旋律日夜起伏，如何汲取一\r\n丝安宁？初秋的心，秋意的思，秋雨如春雨般地细腻，落在地里，湿润了人的心；单薄的外衣抵挡不了丝丝的凉意，感到寒人，如昙花短暂般的绚烂而后留下的忧\r\n伤，让人怜惜！迷蒙的精彩，淡静的无奈，一个人的思想，一个人的梦，原来一切都是窗外的世界。\r\n &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;\r\n &nbsp; &nbsp; &nbsp; &nbsp;</p><p>已经两天了，整整两天没有联系。<br/>从你说出，如果不爱了，那就分手吧！<br/>不知道如何回答的我，不知道如何收手的我，爱或不爱，其实真的说不出来。这份感情，是内疚是可怜还是真爱，我们都不知道。<br/>从平安夜到圣诞节，从未见面的网友到闺蜜亲人，该有的祝福，该有的礼物，却唯独少了你。有时想，算了，就这样吧，不联系就当分开了，反正彼此都那么累。可偏偏时不时的想起。有人说，这是习惯，不是爱。<br/>你呢？你在干什么呢？<br/>是不是这就是恋爱的人，如此纠结，如此矛盾，如此不可理喻。情愿孤身一人，也不要这样的难受。<br/>别了，我的他。</p>', '4');
INSERT INTO `zqiqi_article_data` VALUES ('<p>李小保是个小有名气的乡土作家，他喜欢把自己写好的文章抑扬顿挫地读给自己的女人听。李小保的朗读悦耳动听，女人听了，就微笑着一个劲地点头。</p><p>　　<img alt=\"甜甜的苦井茶\" src=\"/ueditor/php/upload/image/20151229/1451402533104399.jpg\"/>李小保家住在一个山脚下，靠着李小保微薄的稿酬和种植的一些农作物过着清贫的生活。村里有两口井，一口井离李小保家近，只有两百米；一口井离李小保家远，足足有两公里。近的这口井是苦井，井水有苦涩感；远远的那口井却是甜水井，用井水泡茶，味道香醇无比。</p><p>　　李小保的女人是村里最漂亮的媳妇，自从嫁给了李小保，她就专心侍候起李小保来了。每天早起，她总是挑起那两只水桶，晃晃悠悠地到两公里外的甜水\r\n井挑水去了。这时的李小保也起来了，锻炼了一会儿，吃了早饭，他就开始读书写作了。女人回来后，总忘不了给他一杯热气腾腾的甜水茶。</p><p>　　外面的世界很精彩，渐渐的，许多村里的汉子女人都跑到外面打工去了。每次那些人回来，总会带回许多新鲜的故事和物品，李小保的女人看着人家的日子越过越好，常常低头沉思。李小保见了，总怕女人的心会被那些人带走，就赶紧拉回女人，然后爱怜地摸摸女人的头。</p><p>　　这段时间，李小保的声音突然沙哑了，他把写好的文章读给女人听，可是，声音却变得干巴巴的。女人听了，赶紧摇头，让李小保不要念了。</p><p>　　第二天，李小保又开始了一天的写作。不久，女人进来了，她端给李小保一杯凉水，然后就出去了。李小保正好觉得咽干得厉害，就使劲喝了一口。“呀！”他一下把水给喷了出来，“这水怎么这么苦？是苦井的水啊！”李小保大声叫了起来。他走出门一看，自己的女人已经不见了。</p><p>　　晚上睡觉，他却翻来覆去地睡不着：自己的女人以前都是到远处的甜水井那挑水给我喝，我声音沙哑了，她更应该去挑好水给我喝啊。可她却抄近道挑苦井水给我喝？前几天我就听她示意，她想去外面的世界去看看。难道，她有什么想法？</p><p>　　第二天，他悄悄地注意起自己的女人来了。果然，女人早早就起来了，然后，她就拿起一个竹篮，里面放着一些衣物。“难道，自己的女人想偷偷地逃走？”李小保悄悄地跟在女人后面，想探个究竟。</p><p>　　李小保跟着自己的女人爬到了一个山头。接着，她就取走竹篮子里面的衣物，换上了一件粗布衣裳，提着篮子穿进了茂密的荆棘林。李小保跟着后面，看\r\n着自己的女人在岩石下的一棵小树上采着什么，心里感到十分地纳闷。等女人走了，他就悄悄地来到那岩石下，发现那棵小树是村里唯一的一棵苦茶树。李小保早就\r\n听父亲说过，这苦茶泡苦井水，最能治的就是声音沙哑症。</p><p>　　李小保似乎明白了什么。他赶紧回到家，果然看到自己的女人正把采到的茶叶放进锅里焙干，她的双手布满了细细密密的划痕。李小保知道，女人的手是为了给他采苦茶才被荆棘划伤的。他心一热，眼泪就掉了下来，他上前紧紧搂住妻子，动情地说道：“谢谢你，阿芳……”</p><p>　　女人吓了一跳，回过头来望着李小保，咿呀咿呀地示意着什么。李小保知道：自己的哑妻又在示意，桌子上已经放好了一杯过滤好的甜甜的苦井茶了。</p><p><br/></p>', '5');
INSERT INTO `zqiqi_article_data` VALUES ('<p>文字：素素</p><p>　　黑暗不是阴霾，只是这般静静的深深的清幽着，既非缠绵，也无风雨，又不<a href=\"http://www.duwenzhang.com/huati/youshang/index1.html\">忧伤</a>。</p><p>　　一人静，一丝念，一首歌，脑海里出现一个人，一段<a href=\"http://www.duwenzhang.com/\">故事</a>： 从哲学的意义上来讲，我，也许只是一个个体，然而从<a href=\"http://www.duwenzhang.com/huati/shijian/index1.html\">时间</a>的概念上来看，我，也许就是一朵烟花。</p><p>　　满廊幽寂，夜凉如冰。</p><p>　　空街两旁的樱花树忧伤的飞撒着繁花；花开了，注定花亦会凋落，于是有了碎心愁肠的“清明时节雨纷纷，路上行人欲断魂”的凄冷。</p><p>　　“I am what I am，我永远都爱这样的我；<a href=\"http://www.duwenzhang.com/huati/kuaile/index1.html\">快乐</a>是快乐的方式不只一种，最荣幸是谁都是造物者的光荣。不用闪躲，为我<a href=\"http://www.duwenzhang.com/huati/xihuan/index1.html\">喜欢</a>的<a href=\"http://www.duwenzhang.com/wenzhang/shenghuosuibi/\">生活</a>而活，不用粉墨，就站在光明的角落。我就是我，是颜色不一样的烟火，天空海阔，要做最<a href=\"http://www.duwenzhang.com/huati/jianqiang/index1.html\">坚强</a>的泡沫……”莹润时光，歌声穿梭，<a href=\"http://www.duwenzhang.com/huati/huiyi/index1.html\">回忆</a>仿佛幻影，缱绻播放着曾经淡淡的花絮。</p><p>　　想起小时候，明媚的烟花海，惊天动地的刹那，盛开<a href=\"http://www.duwenzhang.com/huati/meili/index1.html\">美丽</a>而又魔幻的颜色，毫不羞涩的点缀了辽远宁静的天空；偶尔一朵烟花特别庞大，仿佛璀璨了整个世界，又沿着你的身旁轻轻坠落——带着昙花的美，带着燃尽的烟灰，带着<a href=\"http://www.duwenzhang.com/huati/tongnian/index1.html\">童年</a>的岁月不知不觉消失不见。</p><p>　　指尖不经意划过似水流年，把如花美眷的岁月停留在刹那的芬芳；是烟火，是泡沫，也是我——是一朵颜色不一样的烟火！</p><p>　　每个人都想要改变世界，但很少有人想过改变自己；一旦触摸到自己的真实本性，我们将会超越一切，<a href=\"http://www.duwenzhang.com/huati/yongyou/index1.html\">拥有</a>真正强大的力量，因为我们正确无误的定义了自己。</p><p>　　著名摄影师肖全曾说：在我确定了摄影这件事情之后，我知道了自己的确定。首先对自己定义，多么的重要；我们最熟悉的人是自己，最陌生的人往往还是我们自己。</p><p>　　一直不明白，主编<a href=\"http://www.duwenzhang.com/huati/laoshi/index1.html\">老师</a>为什么给我的第一个任务就是写一篇基础散文：我的自画像；热血沸腾的答应两天后交文，直至今日还在拖延，起笔难、动笔难、止笔难。</p><p>　　厅中静静，时光很慢，气氛很恬；无处搁置的回忆，仿佛夜风，柔柔的将落花与春草轻微的触碰缠绵。</p><p>　　无论悲喜，于我，皆不善表述；爱好文字，亦喜欢深深的静默；对镜梳妆，也试图将自己整理得更<a href=\"http://www.duwenzhang.com/huati/wanmei/index1.html\">完美</a>一些，有弯弯的眉，温柔的笑妍，典雅纯净的衣着，却终究少了一丝灵动。</p><p>　　其实，每年只要自己心素有闲便会独自偷偷去拍一本写真集，身材、服装、婉约都会风顺到位，缺陷却年年如是：美丽的公主，低头，<a href=\"http://www.duwenzhang.com/huati/weixiao/index1.html\">微笑</a>，眼睛不要看着印花大理石，看着你对面的王子，好吗？摄影师全程下来，类似的余音，一直会在我的脑海里、拍摄中潺潺徐徐，往往12个小时的写真摄影下来，我才能慢慢适应在岁月面前坦然的婀娜、娉婷。</p><p>　　城市寂静无声。</p><p>　　因为不敢，所以不愿；因为不能，所以不想——总有那么一件事，使我常常不想坦然面对，就仿佛即使自己深度近视亦高调拒绝佩戴眼镜一样；想模糊的\r\n活着，朦胧的应对，从来不敢承认，那是自己的懦弱；其实没有什么，不必隐藏也不必撒谎，在乎我的人，知道我原来最真实的模样：高傲——即使流着疯狂的<a href=\"http://www.duwenzhang.com/huati/yanlei/index1.html\">眼泪</a>也依然要倔强着微笑。</p><p>　　或许，子夜只是色彩斑斓的星河里一朵最阴邃的花朵，而我就是她旁边的那颗高傲的星座，是一枚颜色不一样的烟火。</p><p>　　有时候，很多事情不需要任何理由， 没有原因，不设前提，无关风月，也无阴晴，会情不自禁的蹂躏着伤口，明明很痛却不想说，只想<a href=\"http://www.duwenzhang.com/huati/chenmo/index1.html\">沉默</a>；好似<a href=\"http://www.duwenzhang.com/wenzhang/aiqingwenzhang/\">爱情</a>：爱了就是爱了，没有借口与缘由。</p><p>　　<a href=\"http://www.duwenzhang.com/wenzhang/renshengzheli/\">人生</a>总在祈求圆满，就像我总想掩藏自己的傲慢一样。觉得网络上，个个语带忧伤、情皆彷徨；<a href=\"http://www.duwenzhang.com/huati/xianshi/index1.html\">现实</a>中，人人笑里藏刀、勾心斗角；爱情里，对对思恋缠绕、不苟言笑。吃饱了想睡好，睡好了想住好，住好了想玩好，玩好了想人好；却不知，万事万物顺其自然就好；画到空灵艺始成，能脱俗本是奇，不完美亦是真。太过完美，太过精致，物极必反，那样反倒更令人怵目惊心。</p><p>　　是谁说过：一个人的一生，就是一座有了年岁的城墙，用无数个青翠的日月堆砌而成。日子是一砖一瓦，<a href=\"http://www.duwenzhang.com/huati/shengming/index1.html\">生命</a>是一梁一柱。城墙里，因为生活，因为<a href=\"http://www.duwenzhang.com/\">情感</a>，而充盈丰满。阡陌红尘，独自前行，青萝拂衣，清风绕袖；寂静的在自己的世界里，安稳的<a href=\"http://www.duwenzhang.com/wenzhang/shenghuosuibi/chengzhang/\">成长</a>，不辜负人生大好韶光；品茶听雨，清静从容；因为我们的一生俯瞰苍穹，渺若尘浮。</p><p>　　窗外，除了昏黄的街灯，一望无际皆是看不见的风景。</p><p>　　指尖的风声，吹落在心上；轻语呢喃：随和待人，真诚<a href=\"http://www.duwenzhang.com/huati/shanliang/index1.html\">善良</a>。做最真实的我，是红尘中颜色不一样的烟火。</p><p><br/></p>', '6');

-- ----------------------------
-- Table structure for `zqiqi_article_tag`
-- ----------------------------
DROP TABLE IF EXISTS `zqiqi_article_tag`;
CREATE TABLE `zqiqi_article_tag` (
  `article_aid` int(10) unsigned NOT NULL DEFAULT '0',
  `tag_tid` int(10) unsigned NOT NULL DEFAULT '0',
  KEY `fk_article_tag_article1_idx` (`article_aid`),
  KEY `fk_article_tag_tag1_idx` (`tag_tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='文章标签中间表';

-- ----------------------------
-- Records of zqiqi_article_tag
-- ----------------------------
INSERT INTO `zqiqi_article_tag` VALUES ('1', '1');
INSERT INTO `zqiqi_article_tag` VALUES ('1', '5');
INSERT INTO `zqiqi_article_tag` VALUES ('2', '2');
INSERT INTO `zqiqi_article_tag` VALUES ('2', '5');
INSERT INTO `zqiqi_article_tag` VALUES ('3', '1');
INSERT INTO `zqiqi_article_tag` VALUES ('3', '4');
INSERT INTO `zqiqi_article_tag` VALUES ('4', '2');
INSERT INTO `zqiqi_article_tag` VALUES ('4', '3');
INSERT INTO `zqiqi_article_tag` VALUES ('5', '1');
INSERT INTO `zqiqi_article_tag` VALUES ('5', '3');
INSERT INTO `zqiqi_article_tag` VALUES ('6', '2');
INSERT INTO `zqiqi_article_tag` VALUES ('6', '3');

-- ----------------------------
-- Table structure for `zqiqi_category`
-- ----------------------------
DROP TABLE IF EXISTS `zqiqi_category`;
CREATE TABLE `zqiqi_category` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `cname` varchar(45) NOT NULL DEFAULT '' COMMENT '分类名',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父级id',
  `csort` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '分类排序',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of zqiqi_category
-- ----------------------------
INSERT INTO `zqiqi_category` VALUES ('1', '夕阳下的等待', '0', '100');
INSERT INTO `zqiqi_category` VALUES ('2', '淡淡的紫', '0', '100');
INSERT INTO `zqiqi_category` VALUES ('3', '指尖的绚丽', '0', '100');
INSERT INTO `zqiqi_category` VALUES ('4', '不一样的烟火', '0', '100');
INSERT INTO `zqiqi_category` VALUES ('5', '等风吹', '1', '100');
INSERT INTO `zqiqi_category` VALUES ('6', '发光的树', '1', '100');
INSERT INTO `zqiqi_category` VALUES ('7', '繁华落尽', '2', '100');
INSERT INTO `zqiqi_category` VALUES ('8', '天使的嫁衣', '3', '100');
INSERT INTO `zqiqi_category` VALUES ('9', '飞扬的花火', '3', '100');
INSERT INTO `zqiqi_category` VALUES ('10', '你若安好', '4', '100');
INSERT INTO `zqiqi_category` VALUES ('11', 'PHP', '0', '10');
INSERT INTO `zqiqi_category` VALUES ('12', '前端', '0', '10');
INSERT INTO `zqiqi_category` VALUES ('13', 'Linux', '0', '10');

-- ----------------------------
-- Table structure for `zqiqi_link`
-- ----------------------------
DROP TABLE IF EXISTS `zqiqi_link`;
CREATE TABLE `zqiqi_link` (
  `lid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `lname` char(32) NOT NULL DEFAULT '' COMMENT '友链名称',
  `url` varchar(45) NOT NULL DEFAULT '' COMMENT '友情链接地址',
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk COMMENT='友情链接';

-- ----------------------------
-- Records of zqiqi_link
-- ----------------------------
INSERT INTO `zqiqi_link` VALUES ('1', '白俊遥', 'http://www.baijunyao.com');

-- ----------------------------
-- Table structure for `zqiqi_manage`
-- ----------------------------
DROP TABLE IF EXISTS `zqiqi_manage`;
CREATE TABLE `zqiqi_manage` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `mname` varchar(45) NOT NULL DEFAULT '' COMMENT '管理员名字',
  `password` varchar(45) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(45) NOT NULL DEFAULT '' COMMENT '邮箱',
  `phone` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '0',
  PRIMARY KEY (`mid`),
  UNIQUE KEY `mname_UNIQUE` (`password`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of zqiqi_manage
-- ----------------------------
INSERT INTO `zqiqi_manage` VALUES ('1', 'zhaoqiqi', 'a6d3335e5529b766548b6578d1bec3cc', '', '0');

-- ----------------------------
-- Table structure for `zqiqi_project`
-- ----------------------------
DROP TABLE IF EXISTS `zqiqi_project`;
CREATE TABLE `zqiqi_project` (
  `pid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `pname` varchar(45) NOT NULL DEFAULT '' COMMENT '标题',
  `url` varchar(200) NOT NULL DEFAULT '''''' COMMENT '项目地址',
  `digest` varchar(500) NOT NULL DEFAULT '' COMMENT '项目描述',
  `psort` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '项目排序',
  `list` varchar(45) NOT NULL DEFAULT '' COMMENT '展示图片',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='项目展示';

-- ----------------------------
-- Records of zqiqi_project
-- ----------------------------
INSERT INTO `zqiqi_project` VALUES ('1', '百度糯米', 'ThinkBlog/Project/html/bd/index.html', '百度糯米是来后盾学习期间独立完成的第一个完整的静态页面，项目采用div+css布局，一些简单的hover效果使项目生动许多。\r\n项目历时两天 ，对于刚接触html只有六七天的我来说，进步是非常大的，同时也说明后盾网是有实力做后盾的。', '1', 'Uploads/List/1230/56834a41c5095.png');
INSERT INTO `zqiqi_project` VALUES ('2', '仿京东', 'ThinkBlog/Project/html/jd/index.html', '京东是学完jquery之后用独立完成的一个前端项目，项目采用div加css布局，有渐变效果的大区域轮播和一些小的动画使页面看起来很是生动，各楼层左右无缝轮播的及tab切换代码的复用使得代码更加精简，项目还使用了在线字体，是项目更加灵活更加丰富多彩。', '1', 'Uploads/List/1230/568337a001bdb.png');
INSERT INTO `zqiqi_project` VALUES ('3', 'hd框架 个人博客', 'ThinkBlog/Project/php/blog/index.html', '博客采用HD框架，前台后台页面使用模板，项目前台使用了静态路由有利于搜索引擎的抓取。\r\n后台功能：标签、分类、文章的增删改查，网站配置，友情链接，评论审核\r\n前台功能：头部、尾部、右侧采用公共模板，可以通过标签、分类、模糊查询筛选文章，评论等功能\r\n', '1', 'Uploads/List/1230/568347fdd8c84.png');
INSERT INTO `zqiqi_project` VALUES ('4', 'HD框架 仿联想商城', 'ThinkBlog/Project/php/lenovo/index.html', '项目采用HD框架，前台页面自己布局，后台页面采用框架，历时二十二天。\r\n项目前台功能：列表页可选属性筛选，详情页规格筛选，加入购物车，立即购买，模拟支付，确认订单等功能。前台采用静态路由，公共模板。\r\n项目后台功能：rbac权限，商品、分类、物流、订单管理等功能', '1', 'Uploads/List/1230/568347bf08412.png');

-- ----------------------------
-- Table structure for `zqiqi_tag`
-- ----------------------------
DROP TABLE IF EXISTS `zqiqi_tag`;
CREATE TABLE `zqiqi_tag` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '标签表主键id',
  `tname` varchar(45) NOT NULL DEFAULT '' COMMENT '标签名',
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='标签表';

-- ----------------------------
-- Records of zqiqi_tag
-- ----------------------------
INSERT INTO `zqiqi_tag` VALUES ('1', '微凉');
INSERT INTO `zqiqi_tag` VALUES ('2', '繁华');
INSERT INTO `zqiqi_tag` VALUES ('3', '绚丽');
INSERT INTO `zqiqi_tag` VALUES ('4', '孤独');
INSERT INTO `zqiqi_tag` VALUES ('5', '等待');
INSERT INTO `zqiqi_tag` VALUES ('6', '基础');
INSERT INTO `zqiqi_tag` VALUES ('7', 'MySQL');
INSERT INTO `zqiqi_tag` VALUES ('8', 'Mongodb');
INSERT INTO `zqiqi_tag` VALUES ('9', 'js');
INSERT INTO `zqiqi_tag` VALUES ('10', 'css3');
INSERT INTO `zqiqi_tag` VALUES ('11', 'html5');
INSERT INTO `zqiqi_tag` VALUES ('12', '错误类型');
