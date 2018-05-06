<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination {

    private $query_str='';

    //初始化
    function initialize($params = array())
    {
        parent::initialize($params);
        if(isset($params['query_str'])){
            $this->query_str = '?'.$params['query_str'];
        }

    }
    /**
     * Generate the pagination links
     *
     * @access	public
     * @return	string
     */
    function create_my_links()
    {
        $pages = ($this->total_rows%$this->per_page===0)?(floor($this->total_rows/$this->per_page)):(floor($this->total_rows/$this->per_page)+1);
        $page_num = intval($pages);
        if($page_num<=1){
            return '';
        }
        $page = $this->cur_page;
        $result = '<em>共'.$this->total_rows.'条</em>';
        //第一页
        if($page==1){
            $result = $result.'<span class="this_page">首页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.$this->query_str.'" data-value="1">首页</a>';
        }
        //上一页
        if($page==1){
            $result = $result.'<span class="this_page">上一页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'/'.($page-1).$this->query_str.'" data-value="'.($page-1).'">上一页</a>';
        }

        if ($page_num>5){
            if ($page<3){
                $j = 1;
                $n = 5;
            }else{
                if($page +2>$page_num){
                    $j = $page_num-4;
                    if ($j<=0) $j=1;
                    $n = $page_num;
                }else{
                    $j = $page-2;
                    if ($j<=0) $j=1;
                    $n =  $page+2;
                }
            }
        }else{
            $j = $page-2;
            if ($j<=0) $j=1;
            $n =  $page+2;
            if ($n>$page_num) $n=$page_num;
        }
        //中间展示的数据
        for($i=$j;$i<=$n;$i++){
            if($i==$page){
                $result = $result.'<span class="this_page">'.$i.'</span>';
            }else{
                $result = $result.'<a href="'.$this->base_url.'/'.$i.$this->query_str.'" data-value="'.$i.'">'.$i.'</a>';
            }
        }
        //下一页
        if($page==$page_num){
            $result = $result.'<span class="this_page">下一页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'/'.($page+1).$this->query_str.'" data-value="'.($page+1).'">下一页</a>';
        }
        //最后一页
        if($page==$page_num){
            $result = $result.'<span class="this_page">尾页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'/'.$page_num.$this->query_str.'" data-value="'.$page_num.'">尾页</a>';
        }
        return $result;
    }

    function create_links(){
        $pages = ($this->total_rows%$this->per_page===0)?(floor($this->total_rows/$this->per_page)):(floor($this->total_rows/$this->per_page)+1);
        $page_num = intval($pages);
        if($page_num<=1){
            return '';
        }
        $page = $this->cur_page;
        $result = '<em>共'.$this->total_rows.'条</em>';
        //第一页
        if($page==1){
            $result = $result.'<span class="this_page">首页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'.html" data-value="1">首页</a>';
        }
        //上一页
        if($page==1){
            $result = $result.'<span class="this_page">上一页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'-'.($page-1).'.html" data-value="'.($page-1).'">上一页</a>';
        }

        if ($page_num>5){
            if ($page<3){
                $j = 1;
                $n = 5;
            }else{
                if($page +2>$page_num){
                    $j = $page_num-4;
                    if ($j<=0) $j=1;
                    $n = $page_num;
                }else{
                    $j = $page-2;
                    if ($j<=0) $j=1;
                    $n =  $page+2;
                }
            }
        }else{
            $j = $page-2;
            if ($j<=0) $j=1;
            $n =  $page+2;
            if ($n>$page_num) $n=$page_num;
        }
        //中间展示的数据
        for($i=$j;$i<=$n;$i++){
            if($i==$page){
                $result = $result.'<span class="this_page">'.$i.'</span>';
            }else{
                $result = $result.'<a href="'.$this->base_url.'-'.$i.'.html" data-value="'.$i.'">'.$i.'</a>';
            }
        }
        //下一页
        if($page==$page_num){
            $result = $result.'<span class="this_page">下一页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'-'.($page+1).'.html" data-value="'.($page+1).'">下一页</a>';
        }
        //最后一页
        if($page==$page_num){
            $result = $result.'<span class="this_page">尾页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'-'.$page_num.'.html" data-value="'.$page_num.'">尾页</a>';
        }
        return $result;
    }

    //公告列表
    function create_notice_links($notice_type=''){
        $pages = ($this->total_rows%$this->per_page===0)?(floor($this->total_rows/$this->per_page)):(floor($this->total_rows/$this->per_page)+1);
        $page_num = intval($pages);
        if($page_num<=1){
            return '';
        }
        $page = $this->cur_page;
        $result = '<em>共'.$this->total_rows.'条</em>';
        $s_type = '';
        if($notice_type){
            $s_type = '-'.$notice_type;
        }
        //第一页
        if($page==1){
            $result = $result.'<span class="this_page">首页</span>';
        }else{
            if(!$notice_type){
                $result = $result.'<a href="'.$this->base_url.'.html" data-value="1">首页</a>';
            }else{
                $result = $result.'<a href="'.$this->base_url.'-1-'.$notice_type.'.html" data-value="1">首页</a>';
            }
        }
        //上一页
        if($page==1){
            $result = $result.'<span class="this_page">上一页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'-'.($page-1).$s_type.'.html" data-value="'.($page-1).'">上一页</a>';
        }

        if ($page_num>5){
            if ($page<3){
                $j = 1;
                $n = 5;
            }else{
                if($page +2>$page_num){
                    $j = $page_num-4;
                    if ($j<=0) $j=1;
                    $n = $page_num;
                }else{
                    $j = $page-2;
                    if ($j<=0) $j=1;
                    $n =  $page+2;
                }
            }
        }else{
            $j = $page-2;
            if ($j<=0) $j=1;
            $n =  $page+2;
            if ($n>$page_num) $n=$page_num;
        }
        //中间展示的数据
        for($i=$j;$i<=$n;$i++){
            if($i==$page){
                $result = $result.'<span class="this_page">'.$i.'</span>';
            }else{
                $result = $result.'<a href="'.$this->base_url.'-'.$i.$s_type.'.html" data-value="'.$i.'">'.$i.'</a>';
            }
        }
        //下一页
        if($page==$page_num){
            $result = $result.'<span class="this_page">下一页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'-'.($page+1).$s_type.'.html" data-value="'.($page+1).'">下一页</a>';
        }
        //最后一页
        if($page==$page_num){
            $result = $result.'<span class="this_page">尾页</span>';
        }else{
            $result = $result.'<a href="'.$this->base_url.'-'.$page_num.$s_type.'.html" data-value="'.$page_num.'">尾页</a>';
        }
        return $result;
    }

    function create_admin_links()
    {
//        $this->full_tag_open = '<div class="ui right floated pagination menu">';
//        $this->full_tag_close = '</div>';
        $this->num_tag_open = '<li>';
        $this->num_tag_close = "</li>";
        $this->next_tag_open = '<li>';
        $this->next_tag_close = "</li>";
        $this->prev_tag_open = '<li>';
        $this->prev_tag_close = "</li>";
        $this->first_tag_open = '';
        $this->first_tag_close = "";
        $this->last_tag_open = '<a class="icon item">';
        $this->last_tag_close = "</a>";
        $this->cur_tag_open = '<a class="icon item active">';
        $this->cur_tag_close = "</a>";


        // If our item count or per-page total is zero there is no need to continue.
        if ($this->total_rows == 0 OR $this->per_page == 0)
        {
            return '';
        }

        // Calculate the total number of pages
        $num_pages = ceil($this->total_rows / $this->per_page);

        // Is there only one page? Hm... nothing more to do here then.
        if ($num_pages == 1)
        {
            return '';
        }

        // Set the base page index for starting page number
        if ($this->use_page_numbers)
        {
            $base_page = 1;
        }
        else
        {
            $base_page = 0;
        }

        // Determine the current page number.
        $CI =& get_instance();

        if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
        {
            if ($CI->input->get($this->query_string_segment) != $base_page)
            {
                $this->cur_page = $CI->input->get($this->query_string_segment);

                // Prep the current page - no funny business!
                $this->cur_page = (int) $this->cur_page;
            }
        }
        else
        {
            if ($CI->uri->segment($this->uri_segment) != $base_page)
            {
                $this->cur_page = $CI->uri->segment($this->uri_segment);

                // Prep the current page - no funny business!
                $this->cur_page = (int) $this->cur_page;
            }
        }

        // Set current page to 1 if using page numbers instead of offset
        if ($this->use_page_numbers AND $this->cur_page == 0)
        {
            $this->cur_page = $base_page;
        }

        $this->num_links = (int)$this->num_links;

        if ($this->num_links < 1)
        {
            show_error('Your number of links must be a positive number.');
        }

        if ( ! is_numeric($this->cur_page))
        {
            $this->cur_page = $base_page;
        }

        // Is the page number beyond the result range?
        // If so we show the last page
        if ($this->use_page_numbers)
        {
            if ($this->cur_page > $num_pages)
            {
                $this->cur_page = $num_pages;
            }
        }
        else
        {
            if ($this->cur_page > $this->total_rows)
            {
                $this->cur_page = ($num_pages - 1) * $this->per_page;
            }
        }

        $uri_page_number = $this->cur_page;

        if ( ! $this->use_page_numbers)
        {
            $this->cur_page = floor(($this->cur_page/$this->per_page) + 1);
        }

        // Calculate the start and end numbers. These determine
        // which number to start and end the digit links with
        $start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
        $end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

        // Is pagination being used over GET or POST?  If get, add a per_page query
        // string. If post, add a trailing slash to the base URL if needed
        if ($CI->config->item('enable_query_strings') === TRUE OR $this->page_query_string === TRUE)
        {
            $this->base_url = rtrim($this->base_url).'&amp;'.$this->query_string_segment.'=';
        }
        else
        {
            $this->base_url = rtrim($this->base_url, '/') .'/';
        }

        // And here we go...
        $output = '';
//        $output .= '<li class="am-disabled"><a href="#">共'.$this->total_rows.'条</a></li>';;
        $output .= '<div class="ui right floated pagination menu">';
        if  ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1))
        {
            $first_url = ($this->first_url == '') ? $this->base_url : $this->first_url;
//            $output .= $this->first_tag_open.'<a '.$this->anchor_class.'href="'.$first_url.'">'.$this->first_link.'</a>'.$this->first_tag_close;
            $output .= '<a class="icon item" href="'.$first_url.'"><i class="left chevron icon"></i></a>';
        }

        // Render the "previous" link
        if  ($this->prev_link !== FALSE AND $this->cur_page != 1)
        {
            if ($this->use_page_numbers)
            {
                $i = $uri_page_number - 1;
            }
            else
            {
                $i = $uri_page_number - $this->per_page;
            }

            if ($i == 0 && $this->first_url != '')
            {
//                $output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
            }
            else
            {
                $i = ($i == 0) ? '' : $this->prefix.$i.$this->suffix;
//                $output .= $this->prev_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$i.'">'.$this->prev_link.'</a>'.$this->prev_tag_close;
            }

        }

        // Render the pages
        if ($this->display_pages !== FALSE)
        {
            // Write the digit links
            for ($loop = $start -1; $loop <= $end; $loop++)
            {
                if ($this->use_page_numbers)
                {
                    $i = $loop;
                }
                else
                {
                    $i = ($loop * $this->per_page) - $this->per_page;
                }

                if ($i >= $base_page)
                {
                    if ($this->cur_page == $loop)
                    {
                        $output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
                    }
                    else
                    {
                        $n = ($i == $base_page) ? '' : $i;

                        if ($n == '' && $this->first_url != '')
                        {
//                            $output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->first_url.'">'.$loop.'</a>'.$this->num_tag_close;
                            $output .= '<a class="item" href="'.$this->first_url.'">'.$loop.'</a>';
                        }
                        else
                        {
                            $n = ($n == '') ? '' : $this->prefix.$n.$this->suffix;
//                            $output .= $this->num_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$n.'">'.$loop.'</a>'.$this->num_tag_close;
                            $output .= '<a class="item" href="'.$this->base_url.$n.'">'.$loop.'</a>';
                        }
                    }
                }
            }
        }

        // Render the "next" link
//        if ($this->next_link !== FALSE AND $this->cur_page < $num_pages)
//        {
//            if ($this->use_page_numbers)
//            {
//                $i = $this->cur_page + 1;
//            }
//            else
//            {
//                $i = ($this->cur_page * $this->per_page);
//            }
//
//            $output .= $this->next_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->next_link.'</a>'.$this->next_tag_close;
//        }

        // Render the "Last" link
        if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages)
        {
            if ($this->use_page_numbers)
            {
                $i = $num_pages;
            }
            else
            {
                $i = (($num_pages * $this->per_page) - $this->per_page);
            }
//            $output .= $this->last_tag_open.'<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->last_link.'</a>'.$this->last_tag_close;
            $output .='<a class="icon item" href="'.$this->base_url.$this->prefix.$i.$this->suffix.'"><i class="right chevron icon"></i></a>';


        }

        // Kill double slashes.  Note: Sometimes we can end up with a double slash
        // in the penultimate link so we'll kill all double slashes.
        $output = preg_replace("#([^:])//+#", "\\1/", $output);

        // Add the wrapper HTML if exists
//        $output = $this->full_tag_open.$output.$this->full_tag_close;
        $output .='</div>';
        return $output;
    }

}