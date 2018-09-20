$(function(){
    // 点击展开菜单
    $('.title').click(function(){
        var $that = $(this);

        $that.next().stop().slideToggle();

        // 小图标旋转
        if($that.hasClass('open')){
            $that.removeClass('open');
        }else{
            $that.addClass('open');
        }
    });

    // 表格hover整列变色
    $('.case_table th').hover(hover, unhover);
    $('.case_table td').hover(hover, unhover);

    function hover(){
        var $this = $(this);
        var $caseTable = $this.parents('.case_table');
        var index = $this.index();

        $caseTable.find('th').eq(index).css('background-color', '#fff');
        $caseTable.find('td:nth-child(' + (index + 1) + ')').css('background-color', '#fff');
    }

    function unhover(){
        var $this = $(this);
        var $caseTable = $this.parents('.case_table');
        var index = $(this).index();
        
        $caseTable.find('th').eq(index).css('background-color', 'transparent');
        $caseTable.find('td:nth-child(' + (index + 1) + ')').css('background-color', 'transparent');
    }
});
