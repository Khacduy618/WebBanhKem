<?php
    function insert_danhmuc($TenDM){
        $sql= "insert into danhmuc(TenDM) values('$TenDM')";
        pdo_execute($sql);
    }
    function loadall_danhmuc(){
        $sql="select * from danhmuc order by DM_ID asc limit 5 , 39";
        $listdm=pdo_query($sql);
        return $listdm;
    }
    function delete_danhmuc($DM_ID){
        $sql="delete from danhmuc where DM_ID=".$DM_ID;
        pdo_execute($sql);
    }
    function loadone_danhmuc($DM_ID){
        $sql="select * from danhmuc where DM_ID=".$DM_ID;
        $dm=pdo_query_one($sql);
        return $dm;
    }
    function update_danhmuc($DM_ID, $TenDM){
        $sql= "update danhmuc set TenDM='".$TenDM."' where DM_ID=".$DM_ID;
        pdo_execute($sql);
    }
    function showdanhmuc($listdanhmuc){
        $html_danhmuc='';
        foreach ($listdanhmuc as $dm) {
            extract($dm);
            $link='../index.php?act=product&DM_ID='.$DM_ID;
            $html_danhmuc.='<li class="cat-list-item"><a href="'.$link.'" class="cat-link">'.$TenDM.'</a></li>';
        }
        return $html_danhmuc;
    }
    function menu_home(){
        $sql="SELECT * FROM danhmuc order by stt asc";
        $menu=pdo_query($sql);
        return $menu;
    }
    function has_child($menu,$DM_ID){
        if (is_array($menu) || is_object($menu)){
        foreach ($menu as $dm) {
            if($dm['home']==$DM_ID){
                return true;
            }
        }
        return false;}
    }
    function render_menus($menu, $parent_id = 0, $level=0){
        if($level==0){
            $result='<ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">';
        }else{
            $result='<ul class="sub-menu">';
        }
        foreach ($menu as $dm) {
            extract($dm);
            if($home == $parent_id){
                if(has_child($menu,$DM_ID)){
                    $result.= '<li class="menu-item menu-item-has-children has-child">';
                    $result.= '<a href="'.$page.'">'.$TenDM.'</a>';  
                }else{
                    $result.= '<li class="menu-item">';
                    $result.= '<a href="'.$page.'">'.$TenDM.'</a>';
                }
               if(has_child($menu,$DM_ID)){
                $result.=render_menus($menu, $DM_ID, $level + 1);
               }
               $result.= '</li>';
            }
        
    }   
        $result.= '</ul>';
        return $result;
    }
    function menu_home1(){
        $sql="SELECT * FROM danhmuc order by menu1 asc";
        $menu=pdo_query($sql);
        return $menu;
    }
    function has_child_1($mn,$DM_ID){
        if (is_array($mn) || is_object($mn)){
        foreach ($mn as $mna) {
            if($mna['home']==$DM_ID){
                return true;
            }
        }
        return false;
    }
    }
    function render_menus_1($mn, $parent_id = 26, $level=0){
        if($level==0){
            $result='<ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">';
        }else{
            $result='<ul class="sub-menu">';
        }
        if (is_array($mn) || is_object($mn)){
        foreach ($mn as $mna) {
            extract($mna);
            if($home == $parent_id){
                if(has_child_1($mn,$DM_ID)){
                    $result.= '<li class="menu-item menu-item-has-children has-child">';
                    $result.= '<a href="'.$page.'">'.$TenDM.'</a>';  
                }else{
                    $result.= '<li class="menu-item">';
                    $result.= '<a href="'.$page.'">'.$TenDM.'</a>';
                }
               if(has_child($mn,$DM_ID)){
                $result.=render_menus_1($mn, $DM_ID, $level + 1);
               }
               $result.= '</li>';
            }
        
    }  } 
        $result.= '</ul>';
        return $result;
    }
    function loadall_danhmuc_nb(){
        $sql = "SELECT * FROM danhmuc order by DM_ID asc LIMIT 25, 5";
        $listdm=pdo_query($sql);
        return $listdm;
    }
    function showdanhmucsp($dmsp){
        $html_danhmuc='';
        foreach ($dmsp as $dm) {
            extract($dm);
            $link='../index.php?act=home&DM_ID='.$DM_ID;
            $html_danhmuc.='<li class="tab-element active"><a href="'.$link.'" class="tab-link">'.$TenDM.'</a></li>';
        }
        return $html_danhmuc;
    }
?>