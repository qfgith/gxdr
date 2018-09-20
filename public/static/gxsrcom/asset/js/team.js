$(function(){
    slideDetail();

    function slideDetail(){
        // 点击下拉详情
        $('.icon_plus').click(function(){
            var $that = $(this);
            var $detail = $that.parents('.container').next();
            var $detailChild = $detail.find('.container');
            var $arrow = $detail.find('.arrow');
            var $col_lg_6 = $that.parent('.col-lg-6');
            var nowIndex = $col_lg_6.index();

            // 判断对应详情是否打开
            if($detail.css('display') === 'none'){
                // 现在是隐藏，即将打开
                // 显示对应索引的内容
                $detailChild.eq(nowIndex).css('display', 'block').siblings('.container').css('display', 'none');

                // 定位箭头
                var left = $col_lg_6.offset().left + 70;
                $arrow.css('left', left + 'px');

                // 旋转小图标
                $that.addClass('open');

                $detail.slideDown();
                return;
            }

            // 现在是打开，即将隐藏
            // 获取已经打开的索引
            var openedIndex = 0;
            $detailChild.each(function(index, el){
                if($(el).css('display') === 'block'){
                    openedIndex = index;
                }
            });

            // 对比两个索引，如果相同，关闭详情，如果不同，隐藏上一次，显示这一次
            if(openedIndex === nowIndex){
                // 旋转小图标
                $that.removeClass('open');

                $detail.slideUp();
                return;
            }

            // 定位箭头
            var left = $col_lg_6.offset().left + 70;
            $arrow.css('left', left + 'px');

            // 旋转小图标
            $col_lg_6.siblings().find('.open').removeClass('open');
            $that.addClass('open');

            $detailChild.eq(nowIndex).fadeIn().siblings('.container').css('display', 'none');
        });
    }
});

// 实现下拉步骤
/*
    1. 点击小图标，判断对应详情是否打开
        1.1 打开：通过这次点击的索引和当前打开的详情的索引对比
            1.1.1 相同：关闭详情
            1.1.2 不相同：隐藏上一次的详情，显示这次的详情
        1.2 关闭：打开详情并显示对应索引的内容
*/
